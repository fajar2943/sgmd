@extends('layouts.site')
@section('title')
{{config('app.name')}}
@endsection

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
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
                    <h2>Pilihan Harga Internet Voucher</h2>
                    <p class="p-heading p-large">Anda dapat memilih internet broadband sesuai dengan kebutuhan anda</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                
                    @foreach ($plans as $plan)                        
                        <!-- Card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">{{$plan->title}}</div>
                                <div class="card-subtitle">{{$plan->subtitle}}</div>
                                <hr class="cell-divide-hr">
                                <div class="price">
                                    <span class="currency"></span><span class="value">{{angka($plan->price)}}</span>
                                    <div class="frequency">{{$plan->description}}</div>
                                </div>
                                <hr class="cell-divide-hr">
                                <ul class="list-unstyled li-space-lg">
                                    @foreach (json_decode($plan->detail) as $detail)
                                        <li class="media">
                                            <i class="fas fa-check"></i><div class="media-body">{{$detail}}</div>
                                        </li>                                        
                                    @endforeach
                                </ul>
                                <div class="button-wrapper">
                                    <button class="btn-solid-reg page-scroll" data-toggle="modal" data-target="#planModal-{{$plan->id}}">BELI</button>
                                </div>
                            </div>
                        </div> <!-- end of card -->
                        <!-- end of card -->

                        <!-- Modal -->
                        <div class="modal fade" id="planModal-{{$plan->id}}" tabindex="-1" aria-labelledby="planModal-{{$plan->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="planModal-{{$plan->id}}Label">{{$plan->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="/order" method="post">
                                    <div class="modal-body">
                                            @csrf
                                            <input type="hidden" name="plan" value="{{$plan->name}}">
                                            <div class="mb-3 text-left">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" name="name" value="" placeholder="Masukan Nama Lengkap Anda" class="form-control" required>
                                            </div>
                                            <div class="mb-3 text-left">
                                                <label for="name">Nomor Whatsapp</label>
                                                <input type="text" name="wa" value="" placeholder="Masukan No.Whatsapp Anda" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info">Checkout</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                    @endforeach
                                                 
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
                    <h5>Technology Partner</h5>
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/Mikrotik.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/cisco.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/Fortinet.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/intel.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/HP.png')}}" alt="alternative" width="120">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="{{asset('sgmd/images/Dell.png')}}" alt="alternative" width="120">
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

@section('js')
<script>
    @if (Session::has('Failed'))
        Swal.fire({
            title: "Warning!",
            text: `{{Session::get('Failed')}}`,
            icon: "error",
            confirmButtonColor: "#00bfd8",
        });
    @endif
</script>
@endsection