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

                               <table class="table-responsive table-condensed table-striped table-hover table-bordered">
                                   <thead>
                                   <tr>
                                       <th>Executive</th>
                                       <?php for($i = 1; $i <= 17; $i++){ ?>
                                       <th>
                                           <?php echo $i; ?>
                                       </th>
                                       <?php }?>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @forelse($final as $attend)
                                       <tr>
                                           <td>{{ $attend['name'] }}</td>
                                           <?php
                                           for($i = 1; $i < 17; $i++){
                                           $make_date = date("Y-m")."-".$i;
                                           $set_attendance_for_day=false;
                                           $attendance_for_day ="-";
                                           foreach($attend['attendance'] as $att){
                                               if(date('Y-m-d',strtotime($att['date'])) == date('Y-m-d',strtotime($make_date))){

                                                   $datested = $att['attendance']=='Present'?"P":"A";
                                               }
                                           }
                                           ?>
                                           <td width="30">
                                               {{ $datested }}
                                           </td>

                                           <?php }?>
                                       </tr>
                                   @empty
                                       <tr>
                                           <td>No Salesman</td>
                                       </tr>
                                   @endforelse
                                   </tbody>
                               </table>


{{--                               <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">--}}
{{--                                   <thead>--}}
{{--                                   <tr>--}}
{{--                                       <th>S.No</th>--}}
{{--                                       <th>User Name</th>--}}
{{--                                       <th> Date </th>--}}
{{--                                       <th> Attendane</th>--}}
{{--                                       <th Width="80px">Action</th>--}}
{{--                                   </tr>--}}
{{--                                   </thead>--}}
{{--                                   <tbody>--}}
{{--                                   @forelse($attendances as $key=>$attendance)--}}
{{--                                       <tr>--}}
{{--                                           <td>{{$key+1}}</td>--}}
{{--                                           <td>{{$attendance->attendance_user_name->name}}</td>--}}
{{--                                           <td>{{$attendance->date}}</td>--}}
{{--                                           <td>{{$attendance->attendance}}</td>--}}
{{--                                           <td class="justify-content-between justify-content-center">--}}
{{--                                               <form action="{{ route('attendance.destroy',$attendance->id) }}" method="Post">--}}
{{--                                                   @csrf--}}
{{--                                                   @method('DELETE')--}}

{{--                                                   <a href="{{route('attendance.edit',$attendance->id)}}" class="btn btn-info justify-content-center"><i class='fa fa-edit'></i></a>--}}

{{--                                                   <button type="submit" class="btn btn-danger justify-content-center"><i class='fa fa-trash'></i></button>--}}
{{--                                               </form>--}}
{{--                                           </td>--}}
{{--                                       </tr>--}}
{{--                                   @empty--}}

{{--                                   @endforelse--}}
{{--                                   </tbody>--}}

{{--                               </table>--}}
                           </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
{{--    </section>--}}
@endsection

