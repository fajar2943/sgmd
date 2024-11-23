@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Plan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Plan</li>
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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add Plan</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Plan Name</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Detail</th>
                                <th>Available</th>
                                <th>Sold</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$plan->name}}</td>
                                <td>{{$plan->title}}</td>
                                <td>{{$plan->subtitle}}</td>
                                <td>{{$plan->description}}</td>
                                <td>{{$plan->price}}</td>
                                <td>
                                    @foreach (json_decode($plan->detail) as $detail)
                                        -{{$detail}} <br>
                                    @endforeach
                                </td>
                                <td>{{checkPlan($plan->name, 'Available')}}</td>
                                <td>{{checkPlan($plan->name, 'Sold')}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn-edit btn btn-sm btn-primary mb-2" data-no="{{$loop->iteration}}" data-detail="{{$plan->detail}}" data-toggle="modal" data-target="#edit{{$loop->iteration}}">
                                        Edit
                                    </button>
                                    <a href="#!" class="btn btn-sm btn-danger mb-2 deleteConfirm" data-url="/admin/plans/{{$plan->id}}">Delete</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit{{$loop->iteration}}" tabindex="-1"
                                        aria-labelledby="edit{{$loop->iteration}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/admin/plans/{{$plan->id}}" method="post">
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
                                                            <label for="name" class="form-label">Plan Name</label>
                                                            <input type="text" name="name" value="{{$plan->name}}" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Title</label>
                                                            <input type="text" name="title" value="{{$plan->title}}" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="subtitle" class="form-label">Subtitle</label>
                                                            <input type="text" name="subtitle" value="{{$plan->subtitle}}" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="number" name="price" value="{{$plan->price}}" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea name="description" class="form-control" rows="1">{{$plan->description}}</textarea>
                                                        </div>
                                                        <a href="#!" class="newDetail"><i class="fa fas fa-plus"></i> Add New Detail</a>
                                                        <div id="detail{{$loop->iteration}}" class="detail">
                                                            
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
                <h5 class="modal-title" id="addLabel">Add Plan</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/plans" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Plan Name <small> ( harus sama dengan plan voucher )</small></label>
                        <input type="text" name="name" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="title" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="1"></textarea>
                    </div>
                    <a href="#!" id="newDetail"><i class="fa fas fa-plus"></i> Add New Detail</a>
                    <div id="detail" class="detail">

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
            let detail_number = 0;
            $('#newDetail').on('click', function(){
                detail_number++
                showContent('#detail', detail_number);
            });
            
            $('.detail').on('click','.delete_detail', function(){
                $(this).parent().parent().remove();
            });

            let edit_number = 0;
            let no = 0;
            $('.btn-edit').on('click', function(){                
                edit_number = 0;
                no = $(this).data('no');
                let detail = $(this).data('detail');
                $('#detail' + no).empty();
                for(i=0; i < detail.length; i++){
                    edit_number++
                    showContent('#detail' + no, edit_number, detail[i]);
                }
            });
            $('.newDetail').on('click', function(){
                edit_number++
                showContent('#detail' + no, edit_number);
            });
        });

        function showContent(target, number, value = ''){
            $(target).append(`
                <div class="row">
                    <div class="col-10">
                        <div class="mb-3">
                            <label for="detail${number}" class="form-label">Detail ${number}</label>
                            <input type="text" name="detail[${number}]" value="${value}" class="form-control" id="detail${number}"
                                placeholder="Detail ${number}" required>
                        </div>
                    </div>  
                    <div class="col-2">
                        <a href="#!" class="btn btn-sm btn-danger delete_detail" style="margin-top: 2rem"><i class="fa fa-trash"></i></a>
                    </div>               
                </div>
            `);
        }
    </script>
@endsection
