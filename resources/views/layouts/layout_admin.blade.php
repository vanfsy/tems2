<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title></title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('back/gvendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('back/gvendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('back/gvendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('back/gvendor/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('back/css/custom.css')}}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ URL::asset('back/gvendor/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('back/gvendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('back/gvendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('back/gvendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('back/gvendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('back/gvendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Colorpicker -->
    <link href="{{ URL::asset('back//gvendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('back/css/multi-select.css') }}"/>

    <script src="{{ URL::asset('back/gvendor/jquery/dist/jquery.min.js') }}"></script>

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/building" class="site_title">Tems</a>
                </div>

                <div class="clearfix"></div>

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-user"></i> 物件管理 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('admin/user')}}">物件一覧</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                By <a href="http://miraiga-lab.com/" target="_blank">吉田順平</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- jQuery -->
<script src="{{ URL::asset('back/gvendor/jquery/dist/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('back/gvendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('back/gvendor/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ URL::asset('back/gvendor/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ URL::asset('back/gvendor/Chart.js/dist/Chart.min.js') }}"></script>
<!-- jQuery Sparklines -->
<script src="{{ URL::asset('back/gvendor/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- Flot -->
<script src="{{ URL::asset('back/gvendor/Flot/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ URL::asset('back/gvendor/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ URL::asset('back/gvendor/DateJS/build/date.js') }}"></script>
<!-- bootstrap-daterangepicker -->

<script src="{{ URL::asset('back/gvendor/moment/min/moment.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/moment/min/moment-with-locales.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ja.min.js"></script>

<script src="{{ URL::asset('back/gvendor/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js') }}"></script>

<!-- Custom Theme Scripts -->

<script src="{{ URL::asset('back/gvendor/validator/validator.js') }}"></script>
<!-- Parsley -->
<script src="{{ URL::asset('back/gvendor/parsleyjs/dist/parsley.min.js') }}"></script>
<!-- starrr -->
<script src="{{ URL::asset('back/gvendor/starrr/dist/starrr.js') }}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('back/gvendor/select2/dist/js/select2.full.min.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ URL::asset('back/gvendor/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ URL::asset('back/gvendor/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/google-code-prettify/src/prettify.js') }}"></script>
<!-- Dropzone.js -->
<script src="{{ URL::asset('back/gvendor/dropzone/dist/min/dropzone.min.js') }}"></script>
<!-- Bootstrap Colorpicker -->
<script src="{{ URL::asset('back/gvendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ URL::asset('back/gvendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('back/gvendor/pdfmake/build/vfs_fonts.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('back/js/custom.js') }}"></script>
<script>
    $(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $("table tbody").sortable({
            handle: ".handle",
            axis: "y",
            opacity: "0.8",
            placeholder: "ph",
            update: function (ev, ui) {
                $.ajax({
                    url: '{{ url('/admin/slider/sorting') }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        model: $(this).data('model'),
                        sortitems: $(this).sortable('serialize')
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) // 接続が失敗
                    {
                        alert("更新に失敗しました。もう一度お試しください。");
                        location.reload();
                    }
                });
            }
        });

        $('.datetimepicker').datetimepicker();
    });
</script>
</body>
</html>
