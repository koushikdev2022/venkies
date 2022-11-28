<html lang="en">
<head>

    <meta charset="utf-8">
    <title>@yield('title') | Venky- </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- plugin css -->
    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
          type="text/css">

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <!-- preloader css -->
    <link rel="stylesheet" href="{{asset('assets/css/preloader.min.css')}}" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <link href="{{asset('abc.css')}} " rel="stylesheet" type="text/css">

</head>

<body class="pace-done ">
<div class="pace pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
         style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity">

    </div>
</div>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    @include('layouts.includes.header')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="card-title">Report</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="datatable-buttons" style="width: 100%;"
                                       class="table table-bordered table-striped">
                                    @if(is_null($value['retailer']))
                                        <thead>
                                        <tr>
                                            <th colspan="4"> Retailer Details</th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                        </tr>
                                        </thead>
                                        @forelse($value['retailer'] as $r)
                                            <tbody>
                                            <tr>
                                                <td>{{ $r->name??'' }}</td>
                                                <td>{{ $r->email?? '' }}</td>
                                                <td>{{ $r->phone?? '' }}</td>
                                                <td>{{ $r->address?? '' }}</td>
                                            </tr>
                                        @empty

                                        @endforelse

                                    @endif
                                    @if(is_null($value['order']) )
                                        <thead>
                                        <tr>
                                            <th colspan="4"> order Details</th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                        </tr>
                                        </thead>
                                        @forelse($value['order'] as $o)
                                            <tbody>
                                            <tr>
                                                <td>{{ $o->retailer?? '' }}</td>
                                                <td>{{ $o->product?? '' }}</td>
                                                <td>{{ $r->quantity?? '' }}</td>
                                            </tr>
                                            @empty

                                            @endforelse
                                            </tbody>
                                            @endif

                                                @if(!is_null($value['leave']) )
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4"> Leave</th>
                                                    </tr>
                                                    <tr>
                                                        <th>From date</th>
                                                        <th>To Date</th>
                                                        <th>Type</th>
                                                        <th>Cause</th>
                                                    </tr>
                                                    </thead>
                                                    @forelse($value['leave'] as $l)
                                                        <tbody>
                                                        <tr>
                                                            <td>{{ date('d-M-Y',strtotime( $l->from)) ?? '' }}</td>
                                                            <td>{{ date('d-M-Y',strtotime( $l->to)) ?? '' }}</td>
                                                            <td>{{ $l->type ?? '' }}</td>
                                                            <td>{{ $l->cause ?? '' }}</td>
                                                        </tr>


                                                        @empty

                                                     @endforelse
                                                        </tbody>
                                                            @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<!-- pace js -->
<script src="{{asset('assets/libs/pace-js/pace.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
<!-- chartjs init -->
<script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
@yield('custom-js')

</body>
</html>
