<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | CBI</title>

    <!-- Tabler CSS files  -->
    <link href="./dist/css/tabler.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1674944402" rel="stylesheet" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body>

    <div class="row g-0 flex-fill px-1 py-1 mb-auto">
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-full vh-90" style="background-image: url(img/home_cbi.png)"></div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <h2 class="h3 text-center mb-3">
                    Register
                </h2>
                <form action="/register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Nama Lengkap"
                            value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('username')
                        <small>{{ $message }}</small>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror

                    <div class="input-group mb-0">
                        <input type="password" name="password" class="form-control" id="inputPassword"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                    <br>

                    <div class="input-group mb-0">
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                            placeholder="Password konfirmasi" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <small>{{ $message }}</small>
                    @enderror
                    <br>

                    <input type="checkbox" onclick="myFunction()">Tampilkan Password
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                            <p class=" mt-2 b-1">
                                Sudah memiliki akun?<a href="/login"> Login</a>
                            </p>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    {{-- footer --}}
    <div class="container-fluid mt-5 pt-5">

        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-end p-3" style="background-color: #6351ce">
                <!-- Left -->
                <div class="me-3">
                    <span>Follow Us On:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="text-white me-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="text-white me-3">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container  text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Century Batteries Indonesia</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                Jl. Mitra Raya Selatan I Blok E/No. 17-18 <br>
                                Parung Mulya, Ciampel<br>
                                Kawasan KIM - Karawang <br><br>
                                <strong>Telp:</strong> (62-21)
                                29488812<br>
                                <strong>Email:</strong> contact@incoe.astra.co.id<br>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="http://cbi-astra.com/product-catalog/" class="text-white">Catalogue</a>
                            </p>
                            <p>
                                <a href="http://cbi-astra.com/company-profile/?lang=id" class="text-white">CBI
                                    Website</a>
                            </p>
                            <p>
                                <a href="http://cbi-astra.com/company-profile/" class="text-white">Company Profil</a>
                            </p>
                            <p>
                                <a href="http://cbi-astra.com/corporate-culture-2/" class="text-white">Corporate
                                    Culture</a>
                            </p>
                            <p>
                                <a href="http://cbi-astra.com/acknowledge-certificate/"
                                    class="text-white">Certification
                                    Recognition</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="/#services" class="text-white">Apply</a></li>
                            </p>
                            <p>
                                <a href="/#product" class="text-white">Product</a></li>
                            </p>
                            <p>
                                <a href="/#about" class="text-white">About Us</a></li>
                            </p>
                            <p>
                                <a href="/#contact" class="text-white">Contact Us</a></li>
                            </p>
                            <p>
                                <a href="/#hero" class="text-white">Dashboard</a></li>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><i class="fas fa-home mr-3"></i> Jl.
                                Mitra Raya Selatan I Blok E/No. 17-18, Kawasan KIM - Karawang 41363</p>
                            <p><i class="fas fa-envelope mr-3"></i> contact@incoe.astra.co.id</p>
                            <p><i class="fas fa-phone mr-3"></i> (62-21)
                                29488812</p>
                            <p><i class="fas fa-print mr-3"></i> (62-21) 29488815</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                &copy; Copyright <strong><span>2023 Company, PT Century Batteries Indonesia</span></strong>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>
    <!-- End of .container -->
    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message }}')
        </script>
    @endif

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}')
        </script>
    @endif
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <script src="./dist/js/tabler.min.js?1674944402" defer></script>
    <script src="./dist/js/demo.min.js?1674944402" defer></script>
</body>

</html>
