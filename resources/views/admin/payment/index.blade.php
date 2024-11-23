@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Payment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Payments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            @if (Session::has('Success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('Success')}}
            </div>
            @endif
            @if (Session::has('Failed'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('Failed')}}
            </div>
            @endif

            <div class="row">
                @foreach ($payments as $payment)
                    <div class="col-md-6">
                        <form action="/admin/payments/{{$payment->id}}" enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$payment->name}}</h3>
                                    @if ($payment_active == $payment->name)
                                        <div class="text-success float-right mb-2">Sedang Aktif <span><i class="fa fa-check"></i></span></div>
                                    @else
                                        <div class="float-right"><a href="/admin/set-payment/{{$payment->name}}" class="btn btn-sm btn-info">Aktifkan</a></div>
                                    @endif
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @foreach (json_decode($payment->detail) as $detail)
                                        @if ($detail->type == 'bool')
                                            <div class="mb-3">
                                                <label for="{{$detail->name}}" class="form-label">{{$detail->label}}</label>
                                                <select class="custom-select" name="{{$detail->name}}">
                                                    <option value="1" @if($detail->value) selected @endif>Ya</option>
                                                    <option value="0" @if(!$detail->value) selected @endif>Tidak</option>
                                                </select>
                                            </div>
                                        @elseif($detail->type == 'string')                                            
                                            <div class="mb-3">
                                                <label for="{{$detail->name}}" class="form-label">{{$detail->label}}</label>
                                                <input type="text" name="{{$detail->name}}" value="{{$detail->value}}" class="form-control" required>
                                            </div>
                                        @else
                                            {!! $detail->value !!}
                                        @endif
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-sm btn-info">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>                    
                @endforeach
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
@endsection
