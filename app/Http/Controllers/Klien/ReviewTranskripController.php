<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\ParameterOrder;
use App\Models\Klien\Review;
use App\Models\Admin\Transaksi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class ReviewTranskripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $review = Review:: 
        rightJoin('order', 'review.id_order', '=', 'order.id_order')
        ->whereNull('id_review')
        ->whereNotNull('durasi_audio')
        ->whereNotNull('path_file_trans')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'klien.id', '=', 'users.id')
        ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                'parameter_order.id_parameter_order')
        ->where("users.id",$user->id)
        ->where('order.tgl_order', '>=', Carbon::now()->subDay()->toDateTimeString())
        ->orderBy('order.id_order')
        ->get();

        $riwayatreview = DB::table('review')
        ->join('order', 'order.id_order', '=', 'review.id_order')
        ->whereNotNull('durasi_audio')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'klien.id', '=', 'users.id')
        ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                'parameter_order.id_parameter_order')
        ->where("users.id",$user->id)
        ->orderBy('order.id_order')
        ->get();


        return view('pages.klien.order.order_transkrip.review',compact('user','review','riwayatreview')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Review $review)
    {
        $this->validate($request,[
            'id_order' => 'required',
            'review_text' => 'required',
            'rating'=>'required'
        ]);

        Review::create([
            'id_order' => $request->id_order,
            'review_text' => $request->review_text,
            'rating'=>$request->rating
        ]);

        return redirect('order-transkrip-review')->with('success', 'Review Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_order)
    {
        $user = Auth::user();

        $order = Order::find($id_order);

        $review = Review:: //join table users and table user_details base from matched id;
                rightJoin('order', 'review.id_order', '=', 'order.id_order')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
                ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                        'parameter_order.id_parameter_order')
                ->where("users.id",$user->id)
                ->where("order.id_order",$order->id_order)
                ->first();


        return view('pages.klien.order.order_transkrip.review',compact('user','order','review')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
