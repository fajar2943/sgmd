@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Voucher</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Voucher</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            
            @if (Session::has('Success'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('Success')}}
            </div>
            @endif
            @if (Session::has('Failed'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('Failed')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add Voucher</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>Plan</th>
                                <th>Validity</th>
                                <th>Bandwidth</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$voucher->login}}</td>
                                <td>{{$voucher->password}}</td>
                                <td>{{$voucher->plan}}</td>
                                <td>{{$voucher->validity}}</td>
                                <td>{{$voucher->bandwidth}}</td>
                                <td>{{$voucher->price}}</td>
                                <td>{{$voucher->type}}</td>
                                <td>{{$voucher->status}}</td>
                                <td>{{date('d-m-Y', strtotime($voucher->created_at))}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#edit{{$loop->iteration}}">
                                        Edit
                                    </button>
                                    <a href="#!" class="btn btn-sm btn-danger mb-2 deleteConfirm" data-url="/admin/vouchers/{{$voucher->id}}">Delete</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit{{$loop->iteration}}" tabindex="-1"
                                        aria-labelledby="edit{{$loop->iteration}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <form action="/admin/vouchers/{{$voucher->id}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="status" value="{{$voucher->status}}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit{{$loop->iteration}}Label">Edit Voucher</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="plan_id" class="form-label">Plan</label>
                                                                    <select name="plan_id" id="plan_id" class="custom-select">
                                                                        @foreach ($plans as $key => $plan)
                                                                            <option value="{{$key}}" @if($voucher->plan == $plan) selected @endif>{{$plan}}</option>                                        
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="login" class="form-label">Login</label>
                                                                    <input type="text" name="login" value="{{$voucher->login}}" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input type="text" name="password" value="{{$voucher->password}}" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="created_at" class="form-label">Created</label>
                                                                    <input type="date" name="created_at" value="{{date('Y-m-d', strtotime($voucher->created_at))}}" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="validity" class="form-label">Validity (Optional)</label>
                                                                    <input type="text" name="validity" value="{{$voucher->validity}}" class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="bandwidth" class="form-label">Bandwidth (Optional)</label>
                                                                    <input type="text" name="bandwidth" value="{{$voucher->bandwidth}}" class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="type" class="form-label">Type (Optional)</label>
                                                                    <input type="text" name="type" value="{{$voucher->type}}" class="form-control">
                                                                </div>
                                                            </div>
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{$vouchers->links('layouts.partials._paginate')}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>


<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1"
    aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Add Voucher</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/vouchers" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="plan_id" class="form-label">Plan</label>
                                <select name="plan_id" id="plan_id" class="custom-select">
                                    @foreach ($plans as $key => $plan)
                                        <option value="{{$key}}">{{$plan}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" value="" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" value="" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="created_at" class="form-label">Created</label>
                                <input type="date" name="created_at" value="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="validity" class="form-label">Validity (Optional)</label>
                                <input type="text" name="validity" value="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="bandwidth" class="form-label">Bandwidth (Optional)</label>
                                <input type="text" name="bandwidth" value="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type (Optional)</label>
                                <input type="text" name="type" value="" class="form-control">
                            </div>
                        </div>
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
    <script>
        $(document).ready(function () {
            @if($errors->has('csv'))
                $('#import').modal('show')
            @endif
        });
    </script>
@endsection
