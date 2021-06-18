<?php
namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\Translator\Translator;
use App\Models\Translator\Certificate;
use App\Models\Translator\Master_keahlian;
use App\Models\Translator\Document;
use App\Models\Admin\Seleksi;
use App\Models\KLien\Order;

use Illuminate\Http\Request;
class ToDoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $translator = Translator::where('id', $user->id)->first();
        $order = DB::table('order')
                ->where('id_translator', $translator->id_translator)
                ->get();

        $today = date("Y-m-d");
        
        return view('pages.translator.todo', [
            'order'=>$order,
            'today'=>$today
        ]);
    }

    public function show($id_order)
    {
        
    }
}
?>