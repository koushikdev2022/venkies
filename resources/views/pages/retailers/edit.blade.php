@extends('layouts.master')
@section('title','Edit Retailer')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Retailers</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Retailers</li>
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
                            <h4 class="card-title">Retailers</h4>
                            <p class="card-title-desc">Edit Retailers</p>
                        </div>
                        <form action="{{ route('retailer.update',$retailers->id)}}" enctype="multipart/form-data" method="post">
                            @csrf @method('PUT')

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Retailer Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{$retailers['name']}}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="mobile1">Description<span class="text-danger">*</span></label>
                                        <input type="number" name="mobile1" value="{{$retailerss['mobile1']}}" class="form-control @error('mobile1') is-invalid @enderror ">
                                        @error('mobile1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="mobile2">Description<span class="text-danger">*</span></label>
                                        <input type="number" name="mobile2" value="{{$retailerss['mobile1']}}" class="form-control @error('mobile2') is-invalid @enderror ">
                                        @error('mobile2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address1">Description<span class="text-danger">*</span></label>
                                        <input type="text" name="address1" value="{{$retailerss['address1']}}" class="form-control @error('address1') is-invalid @enderror ">
                                        @error('address1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address2">Description<span class="text-danger">*</span></label>
                                        <input type="text" name="address2" value="{{$retailerss['address2']}}" class="form-control @error('address2') is-invalid @enderror ">
                                        @error('address2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city">Description<span class="text-danger">*</span></label>
                                        <input type="text" name="city" value="{{$retailerss['city']}}" class="form-control @error('city') is-invalid @enderror ">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pin">Description<span class="text-danger">*</span></label>
                                        <input type="number" name="pin" value="{{$retailerss['pin']}}" class="form-control @error('pin') is-invalid @enderror ">
                                        @error('pin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="state">Description<span class="text-danger">*</span></label>
                                        <input type="text" name="state" value="{{$retailerss['state']}}" class="form-control @error('state') is-invalid @enderror ">
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="concern_person_name">concern person name<span class="text-danger">*</span></label>
                                        <input type="text" name="concern_person_name" value="{{$retailerss['concern_person_name']}}" class="form-control @error('concern_person_name') is-invalid @enderror ">
                                        @error('concern_person_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="business_type">business type<span class="text-danger">*</span></label>
                                        <input type="text" name="business_type" value="{{$retailerss['business_type']}}" class="form-control @error('business_type') is-invalid @enderror ">
                                        @error('business_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pan">PAN<span class="text-danger">*</span></label>
                                        <input type="text" name="pan" value="{{$retailerss['pan']}}" class="form-control @error('pan') is-invalid @enderror ">
                                        @error('pan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="gst">GST<span class="text-danger">*</span></label>
                                        <input type="text" name="gst" value="{{$retailerss['gst']}}" class="form-control @error('gst') is-invalid @enderror ">
                                        @error('gst')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="aadhar">aadhar<span class="text-danger">*</span></label>
                                        <input type="text" name="aadhar" value="{{$retailerss['aadhar']}}" class="form-control @error('aadhar') is-invalid @enderror ">
                                        @error('aadhar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>



{{--                                    <div class="col-sm-6">--}}
{{--                                        <label for="image">Image <span class="text-danger"></span> </label><br>--}}
{{--                                        <input type="file"  name="image" accept="image/*"  class="form-group">--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
{{--        </div>--}}

{{--    </section>--}}



@endsection
