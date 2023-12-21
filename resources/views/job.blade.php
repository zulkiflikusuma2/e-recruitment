@extends('layouts.main')
@section('container')
    <div class="page-section mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 wow fadeInRight" data-wow-delay="400ms">
                    <div class="img-place custom-img-1">
                        <img src="img/home_cbi.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInUp">
                    <h4>{{ $job->position }}</h4>
                    <hr>
                    Kualifikasi: <br>
                    {!! nl2br($job->requirement) !!}
                </div>
                <div class="col-lg-12 wow fadeInUp mt-3">
                    Berkas Kelengkapan: <br>
                    {!! nl2br($job->attachment) !!}
                </div>
                <div class="col-lg-12 wow fadeInUp mt-3">
                    Pendaftaran berakhir pada {{ Carbon\Carbon::parse($job->close_date)->isoFormat('dddd, D MMMM Y') }}
                </div>
            </div>
            @if (Auth::guest())
                <div style="text-align: center" class="wow fadeInUp">
                    <a href="/login" class="btn btn-primary">Lamar Pekerjaan</a>
                </div>
            @endif
            {{-- @if (Auth::user()->role == 'applicant')
          @if ($applicant == 1)
            <div style="text-align: center" class="wow fadeInUp">
              <a href="{{ route('apply.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">Lamar Pekerjaan</a>
            </div>
            @include('dashboard.apply.create')
          @elseif($applicant == 0)
            <div style="text-align: center" class="wow fadeInUp">
              <a href="/history" class="btn btn-primary">Riwayat Pendaftaran</a>
            </div>
          @endif
        @endif --}}
        </div>
    </div>
@endsection
