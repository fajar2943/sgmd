@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            
            @if (request()->inv)
            <div class="alert alert-secondary" role="alert">
                Hasil pencarian nomor {{request()->inv}}, ditemukan {{$orders->count()}} data. <a href="/admin/orders" class="float-sm-right">Reset pencarian</a>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add Order</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>INV</th>
                                <th>Plan</th>
                                <th>Email</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->inv}}</td>
                                <td>{{$order->plan_name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{angka($order->total_payment)}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{tgltime($order->created_at)}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#edit{{$loop->iteration}}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#detail{{$loop->iteration}}">
                                        Detail
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit{{$loop->iteration}}" tabindex="-1"
                                        aria-labelledby="edit{{$loop->iteration}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/admin/orders/{{$order->id}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit{{$loop->iteration}}Label">Edit Order</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="plan" class="form-label">Plan</label>
                                                            <select name="plan" class="custom-select">
                                                                @foreach ($plans as $plan)
                                                                    <option value="{{$plan->name}}" @if($plan->name == $order->plan_name) selected @endif>{{$plan->name}} ({{rupiah($plan->price)}}) - Stok Tersisa {{checkPlan($plan->name, 'Available')}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- modal detail --}}
                                    <div class="modal fade" id="detail{{$loop->iteration}}" tabindex="-1"
                                        aria-labelledby="detail{{$loop->iteration}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detail{{$loop->iteration}}Label">Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tr>
                                                            <td>Login</td>
                                                            <td>{{$order->voucher->login}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td>{{$order->voucher->password}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{$orders->links('layouts.partials._paginate')}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1"
    aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/orders" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="plan" class="form-label">Plan</label>
                        <select name="plan" class="custom-select">
                            @foreach ($plans as $plan)
                                <option value="{{$plan->name}}">{{$plan->name}} ({{rupiah($plan->price)}}) - Stok Tersisa {{checkPlan($plan->name, 'Available')}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            @if (Session::has('Success'))
                Swal.fire({
                    title: '{{Session::get("Success")}}',
                    html: `<strong>Inv: {{Session::get("Inv")}} <br> Login: {{Session::get("Login")}} <br> Password: {{Session::get("Password")}}</strong>`,
                    icon: 'success',
                    confirmButtonText: 'Tutup'
                });
            @endif
            @if (Session::has('Failed'))
                Swal.fire({
                    title: '{{Session::get("Failed")}}',
                    text: 'Paket yang anda pilih telah habis atau tidak tersedia',
                    icon: 'error',
                    confirmButtonText: 'Tutup'
                });
            @endif
        });
    </script>
@endsection
