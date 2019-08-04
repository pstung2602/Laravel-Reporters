@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Reporters List
    {{--    @parent--}}
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/scroller.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}"/>

    <style>

        #table1_filter {
            margin-bottom: 10px;
        }

    </style>
    <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .ranges li.active {
            color: #fff !important;
        }

    </style>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">

        <!--section starts-->
        <h1>Reporters List</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">DataTables</a>
            </li>
            <li class="active">Advanced Data Tables</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content pl-3 pr-3">
        <h3>Tìm theo ngày</h3>
        <form action="{{route('reporter.filterbydate')}}" method="GET">
            @csrf
            <div class="form-group">
                <input type="date" name="datestart">
                <input type="date" name="dateend">
                <input type="submit">
            </div>
        </form>
        <div class="row">
            <div class="col-lg-12 my-3">
                <div class="card filterable">
                    <div class="card-header bg-primary text-white clearfix  ">
                        <div class="float-left">
                            <div class="caption">
                                <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff"
                                   data-hc="white"></i>
                                TableTools
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                        <table class="table table-striped table-bordered" id="table1" width="100%">
                            <thead>
                            <tr>
                                <th>Post_id</th>
                                <th>User_id</th>
                                <th>Royalty_type</th>
                                <th>
                                    Total_royalty
                                </th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reporters as $key => $reporter)
                                <tr>
                                    <td>{{$reporter->post_id}}</td>
                                    <td>{{$reporter->user_id}}</td>
                                    <td>{{$reporter->royalty_type}}</td>
                                    <td>
                                        {{(\App\Reporter::where('post_id', $reporter->post_id)->sum('royalty'))}}
                                    </td>
                                    <td>{{$reporter->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- row-->
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jeditable/js/jquery.jeditable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.scroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/table-advanced.js') }}"></script>
    <!-- begining of page level js -->
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"
            type="text/javascript"></script>

    <script src="{{ asset('vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/pages/datepicker.js') }}" type="text/javascript"></script>
    <!-- end of page level js -->
    <script>


    </script>
@stop
