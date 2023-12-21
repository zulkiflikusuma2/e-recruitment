<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Carrer | CBI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets_tabler/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets_tabler/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets_tabler/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets_tabler/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets_tabler/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets_tabler/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets_tabler/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets_tabler/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><img src="img/CBI_logo.svg" width="250" alt="Logo Perusahaan"></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Perusahaan</a></li>
                    <li><a class="nav-link scrollto" href="#services">Lowongan Pekerjaan</a></li>
                    <li><a class="nav-link scrollto" href="#product">Produk</a></li>
                    <li><a class="nav-link scrollto" href="#contact">kontak Kami</a></li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login / Daftar') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-primary" href="/dashboard">
                                    {{ __('Dashboard') }}
                                </a>
                                <a class="dropdown-item text-danger" href="/logout"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout').submit();">

                                    {{ __('Logout') }}
                                </a>


                                <form id="logout" action="/logout" method="POST" class="d-none">
                                    @csrf
                                    @method('post')
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-1 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>E-RECRUITMENT</h1>
                    <h2>PT CENTURY BATTERIES INDONESIA</h2>
                    <h3>Kami Memberikan Kesempatan Anda Untuk Bergabung Bersama Tim Kami</h3>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="/#services" class="btn-get-started scrollto">Mulai Karirmu</a>
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="img/p.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        {{-- <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets_tabler/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets_tabler/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets_tabler/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets_tabler/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets_tabler/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets_tabler/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section --> --}}

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Perusahaan</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            <b>PT Century Batteries Indonesia</b> adalah perusahaan afiliasi dari <b>PT Astra
                                Otoparts</b>
                            yang
                            berfokus
                            dalam memproduksi produk baterai asam timbal untuk kendaraan beroda 4 dan juga untuk
                            berbagai
                            aplikasi
                            non
                            otomotif. <br />
                            Berdiri pada tahun 1971 dengan nama CV Sumber Selatan Trading yang berlokasi di Jl. Raya
                            Bekasi KM 25 Cakung - Ujung Menteng, Jakarta Timur, Indonesia. 13960
                        </p>
                        {{-- <ul>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat</li>
                                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit</li>
                                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat</li>
                                    </ul> --}}
                        <a href="http://cbi-astra.com/company-profile/?lang=id" class="btn-learn-more">Selengkapnya</a>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <img src="img/home_CBI.png" width="100%">

                        </img>

                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3><strong>Our Brands</strong></h3>
                            <p>
                                Perusahaan kami berusaha untuk menjadi perusahaan inovasi teknologi terkemuka yang
                                mendukung kemajuan teknologi produk baterai dalam semua aspek. Melalui penemuan, inovasi
                                dan peningkatan, perusahaan kami berhasil mengembangkan dan menerapkan berbagai
                                teknologi baterai.
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1"><span>01</span>Conventional Battery<i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show"
                                        data-bs-parent=".accordion-list">
                                        <p>
                                            High performance liquid lead acid battery with environmentally friendly
                                            antimony on positive & negative electrodes.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed"><span>02</span>Hybrid Battery
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Optimum combination with enviromentally friendly antimony on positive
                                            electrode & strong structure calcium negative electrode.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed"><span>03</span> Maintenance Free Battery<i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            High cranking capability with minimum gassing on battery and with no need of
                                            manual maintenance.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("img/Brand.png");' data-aos="zoom-in" data-aos-delay="150">
                        &nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="page-section" id="lowongan">
                    <div class="container">
                        <div class="section-title">
                            <h2 class="text-center wow fadeInUp mb-2">Lowongan</h2>
                            <span class="wow fadeInUp">Daftar Lowongan Pekerjaan</span>
                        </div>
                        <div class="row mt-2">
                            @if ($jobs->count())
                                @foreach ($jobs as $job)
                                    <div class="col-lg-2 py-2 wow zoomIn">
                                        <div class="card-blog">
                                            <div class="header">
                                                <a href="/detail-{{ $job->slug }}" class="post-thumb">
                                                    <img src="img/job.png" style="width: 100px" alt="">
                                                </a>
                                            </div>
                                            <div class="body">
                                                <h5 class="post-title"><a
                                                        href="/detail-{{ $job->slug }}">{{ $job->position }}</a>
                                                </h5>
                                                <div class="site-info float-right mb-1">
                                                    <span class="mai-time"></span>
                                                    {{ $job->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="col-12 text-center mt-4 d-flex justify-content-center">Tidak ada lowongan
                                    tersedia.</p>
                            @endif
                            <div class="col-12 text-center mt-4 d-flex justify-content-center">
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- .page-section -->
                {{-- <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Lorem Ipsum</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Sed ut perspici</a></h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Magni Dolores</a></h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">Nemo Enim</a></h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                        </div>
                    </div>

                </div> --}}
            </div>
        </section><!-- End Services Section -->


        <!-- ======= Portfolio Section ======= -->
        <section id="product" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Produk</h2>
                    <p>beberapa produk yang kami kembangkan</p>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="img/produk.png" class="img-fluid" alt=""></div>
                    </div>
                    <div class="col-lg-4 col-md-3 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="img/produk2.png" class="img-fluid" alt="">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-3 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="img/produk3.jpeg" width="250" class="img-fluid"
                                alt="">
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-3 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="img/produk2.png" class="img-fluid" alt="">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-3 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="img/produk3.jpeg" width="250" class="img-fluid"
                                alt="">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="img/produk.png" class="img-fluid" alt=""></div>
                    </div>
                </div>

            </div>

            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Frequently Asked Questions Section ======= -->
        {{-- <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                    non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                    purus non.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim
                                nunc? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing
                                elit? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                    Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                    tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam
                                aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                    est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare.
                                Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                    integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                    eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section --> --}}

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak Kami</h2>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi</h4>
                                <p> Jl.
                                    Mitra Raya Selatan I Blok E/No. 17-18, Kawasan KIM - Karawang 41363</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>contact@incoe.astra.co.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telp.:</h4>
                                <p>(62-21)
                                    29488812</p>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1493876728955!2d107.31527867372249!3d-6.374707662353893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6975dcd6af7e2f%3A0x7b284eb4eddc2d81!2sPT.%20Century%20Batteries%20Indonesia!5e0!3m2!1sid!2sid!4v1685200913643!5m2!1sid!2sid"
                                width="100%" height="290px" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="/" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name') }}" id="name"
                                        placeholder="Masukan nama lengkap" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Test@email.com" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="name">Subjek</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="" value="{{ old('subject') }}" required>
                            </div> --}}
                            <div class="form-group">
                                <label for="subject">Pesan</label>
                                <textarea class="form-control" name="subject" rows="10" value="{{ old('message') }}" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan anda telah terkirim. Terima kasih</div>
                            </div>
                            <div class="text-center"><button type="submit">Kirim</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>PT CBI</h3>
                        <p>
                            Jl. Mitra Raya Selatan I Blok E/No. 17-18 <br>
                            Parung Mulya, Ciampel<br>
                            Kawasan KIM - Karawang <br><br>
                            <strong>Telp:</strong> (62-21)
                            29488812<br>
                            <strong>Email:</strong> contact@incoe.astra.co.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Links Homepage</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">Apply</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#product">Product</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About Us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact Us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Dashboard</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Links Website</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="http://cbi-astra.com/product-catalog/">Catalogue</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="http://cbi-astra.com/company-profile/?lang=id">CBI Website</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="http://cbi-astra.com/company-profile/">Company Profile</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="http://cbi-astra.com/corporate-culture-2/">Corporate Culture</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="http://cbi-astra.com/acknowledge-certificate/">Certification Recognition</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Find Us On</h4>

                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>2023 Company, PT Century Batteries Indonesia</span></strong>. All Rights
                Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets_tabler/vendor/aos/aos.js"></script>
    <script src="assets_tabler/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_tabler/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets_tabler/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets_tabler/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets_tabler/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets_tabler/vendor/php-email-form/validate.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Template Main JS File -->
    <script src="assets_tabler/js/main.js"></script>

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
</body>

</html>
