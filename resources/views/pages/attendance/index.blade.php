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
<div class="table-responsive">
    <table id="datatable-buttons" class="table-condensed table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th>User Name</th>
            <?php for($i = 1; $i <= $days; $i++){ ?>
            <th width="8px">
                <?php echo $i; ?>
            </th>
            <?php }?>
        </tr>
        </thead>
        <tbody>
        @forelse($information as $attend)
            <tr>
                <td>{{ ucfirst($attend['name']) }}</td>
                @php $attendance = $attend['attendance']; @endphp
                @for($i = 1; $i <= $days; $i++)
                    @php $forDate = $year_number.'-'.$month_number.'-'.$i; $recordDate = date('Y-m-d', strtotime($forDate)); $record = $attendance->filter(function ($attendance) use ($recordDate) { return $attendance->created_at->isSameDay($recordDate); }); $count = count($record)-1; $value = $record[$count] ?? array('attendance' => 'a'); @endphp
                    <td>{{ strtoupper($value['attendance']) }}</td>
                @endfor
            </tr>
        @empty
            <tr>
                <td>No User</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

                           </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
{{--    </section>--}}
@endsection

