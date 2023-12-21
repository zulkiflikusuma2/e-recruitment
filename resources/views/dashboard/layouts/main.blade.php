<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="img/CBI-logo.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom Stylesheet -->
    <link href="/dashboard1/css/style.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/dashboard1/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/dashboard1/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">



    <!-- trix editor-->

    <link rel="stylesheet" type="text/css" href="/dashboard1/css/trix.css">
    <script type="text/javascript" src="/dashboard1/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <link href="/dashboard1/icons/material-design-iconic-font/materialdesignicons.min.css" rel="stylesheet"
        type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!-- Page Wrapper -->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background-color: white">
            <div class="brand-logo">
                <a href="/dashboard">
                    <b class="logo-abbr"><img src="img/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="img/CBI_Logo.svg" alt="" style="width: 100%"></span>
                    <span class="brand-title">
                        <img src="img/CBI_Logo.svg" alt="" style="width: 100%">
                    </span>
                </a>
            </div>
        </div>

        @include('dashboard.layouts.header')
        @include('dashboard.layouts.sidebar')

        <!-- Begin Page Content -->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        @yield('breadcrumb')
                    </ol>
                </div>
            </div>
            @yield('dashboard')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('container')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history">
                @yield('history')
            </div>
        </div>

        <!-- End of Main Content -->

        <!--Footer start
            ***********************************-->
        <div class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>2023 Company, <a href="http://cbi-astra.com">PT Century Batteries
                            Indonesia</a></span></strong>. All Rights
                Reserved
            </div>
        </div>
        <!--**********************************-->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    @include('sweetalert::alert')


    {{-- Scripts --}}

    @yield('scripts')
    <script src="/dashboard1/plugins/common/common.min.js"></script>
    <script src="/dashboard1/js/custom.min.js"></script>
    <script src="/dashboard1/js/settings.js"></script>
    <script src="/dashboard1/js/gleek.js"></script>
    <script src="/dashboard1/js/styleSwitcher.js"></script>
    <script src="login_style/js/main.js"></script>

    {{-- DataTables --}}
    <script src="/dashboard1/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard1/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard1/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


</body>

</html>
