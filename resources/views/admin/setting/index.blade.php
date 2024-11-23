@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengaturan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Pengaturan</li>
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
                <div class="col-md-8">
                    <form action="/admin/settings" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pengaturan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{$settings->where('name', 'email')->value('value')}}" class="form-control" id="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" value="{{$settings->where('name', 'phone')->value('value')}}" class="form-control" id="phone" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="wa" class="form-label">WA</label>
                                            <input type="number" name="wa" value="{{$settings->where('name', 'wa')->value('value')}}" class="form-control" id="wa" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="open" class="form-label">Open</label>
                                            <input type="text" name="open" value="{{$settings->where('name', 'open')->value('value')}}" class="form-control" id="open" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="fb" class="form-label">FB</label>
                                            <input type="text" name="fb" value="{{$settings->where('name', 'fb')->value('value')}}" class="form-control" id="fb" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="x" class="form-label">Twitter (X)</label>
                                            <input type="text" name="x" value="{{$settings->where('name', 'x')->value('value')}}" class="form-control" id="x" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ig" class="form-label">IG</label>
                                            <input type="text" name="ig" value="{{$settings->where('name', 'ig')->value('value')}}" class="form-control" id="ig" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" value="{{$settings->where('name', 'address')->value('value')}}" class="form-control" id="address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="wa_token" class="form-label">WA Token</label>
                                            <input type="text" name="wa_token" value="{{$settings->where('name', 'wa_token')->value('value')}}" class="form-control" id="wa_token" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-sm btn-info">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="/admin/settings/password" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Kata Sandi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Password Lama</label>
                                    <input type="password" name="old_password" value="" class="form-control" placeholder="Masukan Password Lama" id="old_password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Password Baru</label>
                                    <input type="password" name="new_password" value="" placeholder="Password Baru" class="form-control" id="new_password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="confirm_password" value="" placeholder="Ketik Ulang Password Baru" class="form-control" id="confirm_password" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-sm btn-info">Ubah Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
@endsection
