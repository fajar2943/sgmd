@extends('layouts.site')
@section('title')
{{config('app.name')}}
@endsection

@section('header')
    @include('site._header')
@endsection

@section('content')
    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pilihan Harga Internet Broadband</h2>
                    <p class="p-heading p-large">Anda dapat memilih internet broadband sesuai dengan kebutuhan anda</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Bronze</div>
                            <div class="card-subtitle">Kecepatan Up to 10 Mbps</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency"></span><span class="value">175.000</span>
                                <div class="frequency">Per Bulan</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ideal untuk 3 Perangkat</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Up to 10 Mbps</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Tanpa batas kuota (FUP)</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Jaringan Full Fiber Optic</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Kecepatan stabil</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%20Bronze">DAFTAR</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                        <div class="label">
                            <p class="best-value">Best Value</p>
                        </div>
                            <div class="card-title">Silver</div>
                            <div class="card-subtitle">Kecepatan Up to 20 Mbps</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency"></span><span class="value">225.000</span>
                                <div class="frequency">Per Bulan</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ideal untuk 6 Perangkat</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Up To 20 Mbps</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Tanpa batas kuota (FUP)</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Jaringan Full Fiber Optic</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Kecepatan stabil</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%20Silver">DAFTAR</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Gold</div>
                            <div class="card-subtitle">Kecepatan Up to 30 Mbps</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency"></span><span class="value">325.000</span>
                                <div class="frequency">Per Bulan</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ideal untuk 10 Perangkat</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Up to 30 Mbps</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Tanpa batas kuota (FUP)</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Jaringan Full Fiber Optic</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Kecepatan stabil</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%20Gold">DAFTAR</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Platinum</div>
                            <div class="card-subtitle">Kecepatan Up to 50 Mbps</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency"></span><span class="value">395.000</span>
                                <div class="frequency">Per Bulan</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ideal untuk 15 Perangkat</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Up to 50 Mbps</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Tanpa batas kuota (FUP)</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Jaringan Full Fiber Optic</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Kecepatan stabil</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%20Platinum">DAFTAR</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Bisnis 1</div>
                            <div class="card-subtitle">Kecepatan Up to 100 Mbps</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency"></span><span class="value">-</span>
                                <div class="frequency">Per Bulan</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ideal untuk 20 Perangkat</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Up to 100 Mbps</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Tanpa batas kuota (FUP)</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Jaringan Full Fiber Optic</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Kecepatan stabil</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%Bisnis50M">DAFTAR</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Dedicated</div>
                            <div class="card-subtitle">Kecepatan 200 Mbps</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency"></span><span class="value">-</span>
                                <div class="frequency">Kontrak 1 Tahun</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ideal untuk 50+ Perangkat</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Download/Upload Simetris 1:1</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Tanpa batas kuota (FUP)</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Jaringan Full Fiber Optic</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Kecepatan stabil</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%20Dedicated">DAFTAR</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->          
                                                 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->

    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Partnership :</h5>
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                 <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/rtiga.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/mikrotik.svg')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/cisco.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/hikvision-logo.svg')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/inet.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/pataya.jpg')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/rlradius.png')}}" alt="alternative" width="120">
                                    </div>
                                    </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/zte.png')}}" alt="alternative" width="120">
                                    </div>
                                    </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/HP.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of customers -->
@endsection

@section('detail')
    @include('site._detail')
@endsection