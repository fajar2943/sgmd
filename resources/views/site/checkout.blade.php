@extends('layouts.site')
@section('title')
    Checkout - FamsNet
@endsection
@section('content')
<!-- Header -->
<header class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1>{{$plan->name}}</h1>
                <form action="/order" method="post">
                    @csrf
                    <input type="hidden" name="plan" value="{{$plan->name}}">
                    @error('email')
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                    @enderror
                    <div class="row text-light mt-5 mb-5">
                        <div class="col-lg-4 text-center text-lg-start" data-aos="fade-right">
                            <h4 class="py-1">{{$plan->description}}</h4>
                            <h4 class="py-1">Harga {{rupiah($plan->price)}}</h4>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                            <div class="input-group my-3">
                                <input type="text" name="email" value="{{old('email')}}" class="form-control p-2" placeholder="Masukan Email" aria-label="Recipient's email">
                                <button class="btn-secondary text-light" type="submit">Checkout</button>
                            </div>
                        </div>
                    </div> <!-- end of row -->
                </form>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->
    
@endsection