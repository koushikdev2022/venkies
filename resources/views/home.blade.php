@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">@yield('title')</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-info card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total User</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $response['total_executives'] }}"></span>
                            </h4>
                        </div>

                        <div class="col-4">
                            <div class=""><i class=" fa fa-4x fa-user-secret"></i></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 106px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                    <div class="text-nowrap">
                        <span class="badge bg-soft-success text-success">+$20.9k</span>
                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Retailers</span>
                            <h4 class="mb-3">

                                <span class="counter-value" data-target="{{ $response['total_retailers'] }}">6258</span>
                            </h4>
                        </div>
                        <div class="col-4">
                            <div class=""><i class=" fa fa-4x fa-users"></i></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 106px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                    <div class="text-nowrap">
                        <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Products</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $response['total_products'] }}"></span>
                            </h4>
                        </div>
                        <div class="col-4">
                            <div class=""><i class=" fa fa-4x fa-shopping-basket"></i></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 106px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                    <div class="text-nowrap">
                        <span class="badge bg-soft-success text-success">+$2.8k</span>
                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Orders</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $response['total_orders'] }}">12.57</span>
                            </h4>
                        </div>
                        <div class="col-4">
                            <div id="mini-chart4" data-colors="[&quot;#5156be&quot;]" class="apex-charts mb-2" style="min-height: 50px;">
                                <div class=""><i class=" fa fa-4x fa-cart-plus"></i></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 106px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                    <div class="text-nowrap">
                        <span class="badge bg-soft-success text-success">+2.95%</span>
                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
@endsection
