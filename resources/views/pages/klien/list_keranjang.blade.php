@extends('layouts.klien.sidebar_show')
@section('title','List Order')
@section('content')

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <div class="container">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#review" data-toggle="tab">Order</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                    <div class="active tab-pane" id="review">
                    
                    @foreach ($list_order as $orders)
                    @if(empty($orders->transaksi->id_transaksi))
                        
                        <div class="card">
                        <div class="card-header">
                            <p class="font-weight-bold text-muted">No. Order {{$orders->created_at->format('Y-m-d')}} - {{$orders->id_order}}</p>
                        </div>

                        <div class="card-body">
                            <table width="250px">
                            <tr>
                                <td><p class="font-weight-bold">Jenis Order</p><td>
                                <td><p class="font-weight"> {{$orders->menu}} </p></td>
                            </tr>
                            <tr>
                                <td><p class="font-weight-bold">Jenis Layanan</p><td>
                                    @if(!empty($orders->jenis_layanan))
                                        <td><p class="font-weight">{{$orders->jenis_layanan}}</p></td>
                                            @else(empty($orders->jenis_layanan))
                                            <td><p class="font-weight">{{$orders->parameterjenislayanan->p_jenis_layanan}}</p></td>
                                    @endif
                            </tr>
                            <tr>
                                <td><p class="font-weight-bold">Harga</p><td>
                                @if(!empty($orders->harga))
                                <td><p class="font-weight">{{$orders->harga}}</p></td>
                                @else(empty($orders->harga))
                                <td><p class="font-weight">{{$orders->parameter_order->p_harga}}</p></td>
                                @endif
                            </tr>
                            </table>
                            <td>
                            <div class="text-right">
                                <a href="/menu-pembayaran" type="button" class="btn btn-success">Lanjutkan Transaksi</a>
                            </div>
                            </td> 
                            </div>
                        </div>
                        @else
                        @endif
                        @endforeach
                    </div>
                @endsection