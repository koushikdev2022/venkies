@extends('layouts.master')
@section('title','On Boarding')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{route('boarding.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Create On Boarding</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" required class="form-control @error('title') is-invalid @enderror ">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" required id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror "></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label for="file">Image <span class="text-danger">*</span></label><br>
                                        <input type="file" accept="image/*" required name="img" class="mt-lg-1 @error('img') as @enderror">
                                        @error('img')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
