@extends('layouts.master')
@section('title','Product List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Attendance</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Attendance</h4>
                                    <p class="card-title-desc"> Attendance List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('attendance.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>

                           <div class="card-body">
                               <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                                   <thead>
                                   <tr>
                                       <th>S.No</th>
                                       <th>User Name</th>
                                       <th> Date </th>
                                       <th> Attendane</th>
                                       <th Width="80px">Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @forelse($attendances as $key=>$attendance)
                                       <tr>
                                           <td>{{$key+1}}</td>
                                           <td>{{$attendance->attendance_user_name->name}}</td>
                                           <td>{{$attendance->date}}</td>
                                           <td>{{$attendance->attendance}}</td>
                                           <td class="justify-content-between justify-content-center">
                                               <form action="{{ route('attendance.destroy',$attendance->id) }}" method="Post">
                                                   @csrf
                                                   @method('DELETE')

                                                   <a href="{{route('attendance.edit',$attendance->id)}}" class="btn btn-info justify-content-center"><i class='fa fa-edit'></i></a>

                                                   <button type="submit" class="btn btn-danger justify-content-center"><i class='fa fa-trash'></i></button>
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

