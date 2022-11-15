@extends('layouts.master')
@section('title','User Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">User</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                                    <h4 class="card-title">User</h4>
                                    <p class="card-title-desc">User List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('user.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th width="80px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key=>$user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td><img src="{{$user->image}}" alt=""></td>
                                        <td>
                                            <input type="checkbox" class="status switch-off-on" id="switch{{ $key+1}}" switch="none"  data-id="{{$user->id}}" @if($user->status) checked="true" @endif />
                                            <label for="switch{{$key+1}}" data-on-label="On" data-off-label="Off"></label>

                                        </td>
                                        <td>
                                            <form action="{{ route('user.destroy',$user->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-info"><i class='fa fa-edit'></i></a>
                                                <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i></button>
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
@endsection
@section('custom-js')
    <script type="text/javascript">
        $(document).on('change', '.switch-off-on', function () {
            const status = $(this).is(":checked")
            const user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/status/update',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    console.log(user_id,status);
                    alert('Status update successfully..!');
                    console.log(data.success)
                }
            });
        })
    </script>
@endsection
