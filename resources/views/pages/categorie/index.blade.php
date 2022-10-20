@extends('layouts.master')
@section('title','category Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Boarding</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Boarding List</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Category</h4>
                                    <p class="card-title-desc">Category List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('categorie.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial_No</th>
                                    <th> Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $key=>$cat)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$cat->name}}</td>

                                        <td><img src="{{$cat->image}}" alt=""></td>
                                        <td>
                                            <form action="{{ route('categorie.destroy',$cat->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{route('categorie.edit',$cat->id)}}" class="btn btn-info">Edit</a>

                                                <button type="submit" class="btn btn-danger">Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
{{--    </section>--}}
@endsection

