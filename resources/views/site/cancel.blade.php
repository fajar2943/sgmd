@extends('layouts.site')
@section('title')
    Cancel - FamsNet
@endsection
@section('content')

<!-- Header -->
<header class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1>Pesanan {{$order->inv}} dibatalkan</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->


<!-- Basic -->
<div class="ex-basic-1 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="text-box mt-5 mb-5 p-4">
                    <h2 class="mb-5">pesanan anda telah dibatalkan.</h2>
                    <div class="text-center">
                        <a class="btn btn-tertiary" href="/#plans">Beli Voucher Lain</a>
                    </div>
                </div> <!-- end of text-box -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->
    
@endsection