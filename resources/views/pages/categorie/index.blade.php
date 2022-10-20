@extends('layouts.master')
@section('title','Doctor List')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Category</h3>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial_No</th>
                                    <th>Category Name</th>
{{--                                    <th>Image</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $key=>$category)
                                    <tr>
                                        <td>{{intval($key)+1}}</td>
                                        <td>{{$category->name}}</td>

                                        <td><img src="{{$category->image}}" alt=""></td>
                                        <td>
                                            <form action="{{ route('categorie.destroy',$category->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')

                                                    <a href="{{route('categorie.edit',$category->id)}}" class="btn btn-info">Edit</a>

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
