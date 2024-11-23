@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimoni</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Testimoni</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            
            @if (Session::has('Success'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('Success')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add Testimoni</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$testi->name}}</td>
                                <td>{{$testi->description}}</td>
                                <td>@lang("messages.gender.".$testi->gender)</td>
                                <td><img src="{{$testi->image()}}" alt="" width="100"></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn-edit btn btn-sm btn-primary mb-2" data-no="{{$loop->iteration}}" data-toggle="modal" data-target="#edit{{$loop->iteration}}">
                                        Edit
                                    </button>
                                    <a href="#!" class="btn btn-sm btn-danger mb-2 deleteConfirm" data-url="/admin/testimonials/{{$testi->id}}">Delete</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit{{$loop->iteration}}" tabindex="-1"
                                        aria-labelledby="edit{{$loop->iteration}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/admin/testimonials/{{$testi->id}}" method="post" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit{{$loop->iteration}}Label">Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" name="name" value="{{$testi->name}}" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea name="description" class="form-control" rows="1">{{$testi->description}}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gender" class="form-label">Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="male" @if($testi->gender == 'male') selected @endif>@lang("messages.gender.male")</option>
                                                                <option value="female" @if($testi->gender == 'female') selected @endif>@lang("messages.gender.female")</option>
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
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
                <h5 class="modal-title" id="addLabel">Add Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/testimonials" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="1" required>{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="work" class="form-label">Work</label>
                        <select name="gender" class="form-control">
                            <option value="male" @if(old('gender') == 'male') selected @endif>@lang("messages.gender.male")</option>
                            <option value="female" @if(old('gender') == 'female') selected @endif>@lang("messages.gender.female")</option>
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
    <script>
        $(document).ready(function () {
            @if($errors->has('image') && !$errors->has('id'));
                $('#add').modal('show')
            @endif
            @error('id')
                $('#edit{{$message}}').modal('show')
            @enderror
        });
    </script>
@endsection
