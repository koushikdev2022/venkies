@extends('layouts.master')
@section('title','On Boarding')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class=" fa fa-users">&nbsp</i>Edit Boarding</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">On Boarding</li>
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
                        <form action="{{ route('boarding.update',$boarding->id)}}" enctype="multipart/form-data" method="post">
                            @csrf @method('PUT')
                            <div class="card-header">
                                <h3 class="card-title">Edit Boarding</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" required class="form-control @error('title') is-invalid @enderror" value="{{$boarding['title']}}">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" required id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror ">{{$boarding['description']}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label for="file">Image </label><br>
                                        <input type="file" name="img" class="mt-lg-1 @error('img') is-invalid @enderror"  >
                                        @error('img')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
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
