@extends('layouts.site')
@section('title')
{{config('app.name')}}
@endsection

@section('head')    
    <script src="{{$js_url}}"></script>
@endsection

@section('header')
    <!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1><span class="turquoise">Invoice</span> <small>#{{$order->inv}}</small></h1>
                        <div class="row" style="font-size: 14pt">
                            <div class="col-6 mb-2 text-left" style="font-weight: bold;">Nama Paket</div>
                            <div class="col-6 mb-2 text-left">{{$order->voucher->plan}}</div>
                            <div class="col-6 mb-2 text-left" style="font-weight: bold;">Nama Pelanggan</div>
                            <div class="col-6 mb-2 text-left">{{$order->name}}</div>
                            <div class="col-6 mb-2 text-left" style="font-weight: bold;">Nomor Whatsapp</div>
                            <div class="col-6 mb-2 text-left">{{$order->wa}}</div>
                            <div class="col-6 mb-2 text-left" style="font-weight: bold;">Harga</div>
                            <div class="col-6 mb-2 text-left">{{rupiah($order->total_payment)}}</div>
                        </div>
                        <br>
                        <button class="btn-solid-lg page-scroll" id="pay-button">Bayar Sekarang</button>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('sgmd/images/header-teamwork.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->
@endsection

@section('js')
<script>
    $('#pay-button').on('click', function(){
        checkout.process('{{$order->snap_token}}', {
            defaultLanguage: "id", //opsional pengaturan bahasa
            successEvent: function(result){
            // tambahkan fungsi sesuai kebutuhan anda
                console.log('success');
                console.log(result);
                location.reload();
            },
            pendingEvent: function(result){
            // tambahkan fungsi sesuai kebutuhan anda
                console.log('pending');
                console.log(result);
                alert('Payment Pending');
                location.reload();
            },
            errorEvent: function(result){
            // tambahkan fungsi sesuai kebutuhan anda
                console.log('error');
                console.log(result);
                alert('Payment Error');
                location.reload();
            },
            closeEvent: function(result){
            // tambahkan fungsi sesuai kebutuhan anda
                console.log('customer closed the popup without finishing the payment');
                console.log(result);
                alert('customer closed the popup without finishing the payment');
                location.reload();
            }
        });
    });
</script>
@endsection