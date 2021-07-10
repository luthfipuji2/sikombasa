<?php
namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Models\Translator\Translator;
use App\Models\Translator\Certificate;
use App\Models\Translator\Master_keahlian;
use App\Models\Translator\Document;
use App\Models\Admin\Seleksi;
use App\Models\Admin\Transaksi;
use App\Models\Admin\DistribusiFee;

use App\Models\User;

use Illuminate\Http\Request;
class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $translator = Translator::where('id', $user->id)->first();
        $order = DB::table('order')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'klien.id', '=', 'users.id')
        ->leftJoin('revisi', 'order.id_order', '=', 'revisi.id_order')
        ->leftJoin('transaksi', 'order.id_order', '=', 'transaksi.id_order')
        ->leftJoin('distribusi_fee', 'transaksi.id_transaksi', '=', 'distribusi_fee.id__transaksi')
        ->select('order.created_at', 
                 'order.menu', 
                 'users.email', 
                 'users.name', 
                 'order.text', 
                 'order.nama_dokumen', 
                 'order.tipe_offline', 
                 'transaksi.nominal_transaksi', 
                 'order.id_translator',
                 'order.id_order',
                 'order.path_file_trans',
                 'order.text_trans',
                 'revisi.pesan_revisi',
                 'revisi.path_file_revisi',
                 'revisi.text_revisi',
                 'distribusi_fee.bukti_fee_trans',
                 'transaksi.id_transaksi',
                 'distribusi_fee.id_fee')
        ->where('id_translator', $translator->id_translator)
        ->get();

        return view('pages.translator.account', [
            'order'=>$order,
            'user'=>$user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            
        ]);

        if(!empty($request->password)){
            $this->validate($request,[
                'password' => 'sometimes|min:8',
            ]);

            User::where('id', $user->id)->update([
                'password' => Hash::make($request ['password'])
            ]);
        }

        if($request->hasFile('profile_photo_path')){

            // $profile_photo_path = $request->file('profile_photo_path');
            // $nm_pp = $profile_photo_path->getClientOriginalName();
            // $path = $profile_photo_path->storeAs('public/images', $nm_pp);
            
            $request->file('profile_photo_path')->move('images/',
            $request->file('profile_photo_path')->getClientOriginalName()); //Memindahkan request photo ke folder image

            $currentPhoto = $user->profile_photo_path;

            $userPhoto = public_path('images/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }


            User::where('id', $user->id)
                    ->update([
                        'profile_photo_path'    => $request->file('profile_photo_path')->getClientOriginalName()
                        // 'profile_photo_path'    => $path
            ]);
        }

        User::where('id', $user->id)
                    ->update([
                        'name'    => $request->name,
                        'email'     => $request->email,
                    ]);

        return redirect('/account-translator')->with('success', 'Profile anda berhasil diubah');
    }

    public function downloadBukti($id_fee){

        $fee = DistribusiFee::find($id_fee);

        $bukti_fee = $fee->bukti_fee_trans;

        $pathToFile = public_path('fee/').$bukti_fee;
        
        return response()->download($pathToFile);
    }

}

?>