@extends('layouts.master')
@section('title','Product List')
@section('content')
    <!-- start page title -->


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Product List</h3>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial_No</th>
                                    <th>category</th>
                                    <th> Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $key=>$user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->category_id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->price}}</td>
                                        <td>{{$user->description}}</td>
                                        <td><img src="{{$user->image}}" alt=""></td>
                                        <td class="justify-content-between justify-content-center">
                                            <form action="{{ route('product.destroy',$user->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{route('product.edit',$user->id)}}" class="btn btn-info justify-content-center">Edit</a>

                                                <button type="submit" class="btn btn-danger justify-content-center">Delete</button>

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

