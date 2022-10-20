@extends('layouts.master')
@section('title','ON Boarding')
@section('content')



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-sm-6">
                                <h3 class="card-title">ON Boarding</h3>
                            </div>
                            <div class="col-sm-12">
                                <span class="card-title btn btn-primary float-right "><a href="{{route('boarding.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($boardings as $key=> $on_boarding)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$on_boarding->title}}</td>
                                        <td>{{$on_boarding->description}}</td>
                                        <td> <img src="{{$on_boarding->image}}" height="80px" width="100"></td>
                                        <td>
                                            <form action="{{ route('boarding.destroy',$on_boarding->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('boarding.edit',$on_boarding->id)}}" class="btn btn-info">Edit</a>
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
        </div>

    </section>

@endsection
