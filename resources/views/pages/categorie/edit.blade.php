@extends('layouts.master')
@section('title','Edit Category')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class=" fa fa-users">&nbsp</i>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('categorie.update',$categories->id)}}" enctype="multipart/form-data" method="post">
                            @csrf @method('PUT')
                            <div class="card-header">
                                <h3 class="card-title">Create Category </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Category Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{$categories['name']}}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    {{--                                    <div class="col-sm-6">--}}
                                    {{--                                        <label for="image">Image <span class="text-danger"></span> </label><br>--}}
                                    {{--                                        <input type="file"  name="image" accept="image/*"  class="form-group">--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection
