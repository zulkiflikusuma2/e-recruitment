<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="/img/CBI-logo.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrer | CBI</title>

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


        <!--**********************************
    Header start
***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                {{ auth()->user()->username }}
                                <i class="fas fa-caret-down blackiconcolor"></i>
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        @can('superadmin')
                                            <li>
                                                <a href="/users"><i class="fa fa-users"></i><span>Kelola User</span></a>
                                            </li>
                                        @endcan
                                        @can('applicant')
                                            <li>
                                                <a href="{{ route('profile.edit') }}"><i class="fa fa-user"></i><span>
                                                        Profil</span></a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a href="{{ route('password.edit') }}"><i class="fa fa-gear"></i><span> Ubah
                                                    Password</span></a>
                                        </li>
                                        <hr class="my-2">
                                        {{-- <li> --}}
                                        {{-- <a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li> --}}
                                        <li>
                                            <a href="/logout"
                                                onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                                <i class="fa fa-arrow-right"></i><span> Keluar</span></a>
                                            <form action="/logout" method="post" id="logout" style="display: none;">
                                                @csrf
                                                @method('post')
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Begin Page Content -->
        <div class="content mt-3" style="margin-left: 15%">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="font-weight-bold text-black" style="text-align: center"> Informasi
                                            Pribadi</h3>
                                    </div>
                                </div>
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('profile.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name"> Nama <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    id="name" name="name" autofocus required
                                                    value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- <input type="hidden" name="slug" id="slug"> --}}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="gender_id">Jenis Kelamin <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="gender_id" name="gender_id"
                                                    @error('gender_id') is-invalid @enderror required
                                                    value="{{ old('gender_id') }}">
                                                    <option disabled selected>Pilih</option>
                                                    @foreach ($genders as $gender)
                                                        @if (old('gender_id') == $gender->id)
                                                            <option value="{{ $gender->id }}" selected>
                                                                {{ $gender->name }}</option>
                                                        @else
                                                            <option value="{{ $gender->id }}">{{ $gender->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="dob">Tanggal Lahir <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date"
                                                    class="form-control @error('dob') is-invalid @enderror"
                                                    id="dob" name="dob" required
                                                    value="{{ old('dob') }}">
                                            </div>
                                            @error('dob')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="address">Alamat <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                                    required>{{ old('address') }}</textarea>
                                            </div>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="edu_id">Pendidikan
                                                Terakhir<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control @error('edu_id') is-invalid @enderror"
                                                    id="edu_id" name="edu_id" required
                                                    value="{{ old('edu_id') }}">
                                                    <option disabled selected>Pilih</option>
                                                    @foreach ($educations as $education)
                                                        @if (old('edu_id') == $education->id)
                                                            <option value="{{ $education->id }}" selected>
                                                                {{ $education->name }}</option>
                                                        @else
                                                            <option value="{{ $education->id }}">
                                                                {{ $education->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('education')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="phone">No Telepon <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control  @error('phone') is-invalid @enderror"
                                                    id="phone" name="phone" required
                                                    value="{{ old('phone') }}">
                                            </div>
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-7 ml-auto">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

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
                <p>Copyright &copy; RSU Ananda Purwokerto 2022 </p>
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
