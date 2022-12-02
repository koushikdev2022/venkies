@extends('layouts.master')
@section('title','ON Boarding')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Boarding</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Boarding </li>
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
                                    <h4 class="card-title">Boarding</h4>
                                    <p class="card-title-desc">Boarding List</p>
                                </div>
                                <div class="col-sm-6 ">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('boarding.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>


                        </div>

                        <div class="card-body">
                            <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th width="80px">Action</th>
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
                                                <a href="{{route('boarding.edit',$on_boarding->id)}}" class="btn btn-info"><i class='fa fa-edit'></i></a>
                                                <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                                            </form>
                                        </td>s
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
