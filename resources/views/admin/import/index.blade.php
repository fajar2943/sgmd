@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Import</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Import</li>
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
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#import">Import CSV</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama File</th>
                                <th>Total Import</th>
                                <th>Total Rollback</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imports as $import)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$import->file_name}}</td>
                                <td>{{$import->total_import}}</td>
                                <td>{{$import->total_rollback}}</td>
                                <td>{{$import->status}}</td>
                                <td>{{tgltime($import->created_at)}}</td>
                                <td>
                                    @if ($import->status == 'Rollback')
                                        <small class="text-success">Rollback Berhasil</small>
                                    @else
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#edit{{$import->id}}">
                                            Rollback
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{$import->id}}" tabindex="-1"
                                            aria-labelledby="edit{{$import->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="/admin/imports/{{$import->id}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="status" value="Rollback">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="edit{{$import->id}}Label">Rollback</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin ingin melakukan rollback?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Rollback Sekarang</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>                                        
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{$imports->links('layouts.partials._paginate')}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>


<!-- Modal -->
<div class="modal fade" id="import" tabindex="-1"
    aria-labelledby="importLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importLabel">Import Voucher</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/imports" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="csv" class="form-label">File CSV</label>
                        <input type="file" name="csv" value="">
                        @error('csv')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
