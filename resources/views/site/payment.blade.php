@extends('layouts.site')
@section('title')
{{config('app.name')}}
@endsection

@section('head')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="{{$snap_url}}"
        data-client-key="{{$client_key}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->    
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
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$order->snap_token}}', {
            onSuccess: function (result) {
                /* You may add your own implementation here */
                // alert("payment success!");
                // window.location.href = '/invoice/{{$order->code}}';
                location.reload();
                // console.log(result);
            },
            onPending: function (result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                // console.log(result);
            },
            onError: function (result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                location.reload();
            },
            onClose: function () {
                location.reload();
            }
        })
    });
</script>
@endsection