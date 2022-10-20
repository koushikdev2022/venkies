@extends('layouts.backend.master')
@section('title','Doctor List')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class=" fa fa-users">&nbsp</i>Doctor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Doctor List</li>
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
                        <div class="card-header row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Doctor</h3>
                            </div>
                            @can('doctor-create')
                                {{--                            <div class="col-sm-6">--}}
                                {{--                                <span class="card-title btn btn-primary float-right"><a href="{{route('doctor.create')}}" class=" text-white">Create Doctor</a></span>--}}
                                {{--                            </div>--}}
                            @endcan
                        </div>

                        <div class="card-body">
                            <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial_No</th>
                                    <th>Doctor Name</th>
                                    <th>Description</th>
                                    <th>Qualification</th>
                                    <th>Experience</th>
                                    <th>Speciality</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($doctors as $key=>$doctor)
                                    <tr>
                                        <td>{{intval($key)+1}}</td>
                                        <td>{{$doctor->doctor_name}}</td>
                                        <td>{{$doctor->description}}</td>
                                        <td>{{$doctor->qualification}}</td>
                                        <td>{{$doctor->experience}}</td>
                                        <td>{{$doctor->speciality}}</td>
                                        <td><img src="{{$doctor->image}}" alt=""></td>
                                        <td>
                                            <form action="{{ route('doctor.destroy',$doctor->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                @can('doctor-edit')
                                                    <a href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-info">Edit</a>
                                                @endcan
                                                @can('doctor-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                @endcan
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
