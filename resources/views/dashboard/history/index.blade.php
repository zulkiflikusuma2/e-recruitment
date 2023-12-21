@extends('dashboard.layouts.mainn')
@section('title', 'History | CBI')
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/history">Riwayat Pendaftaran</a></li>
            </ol>
        </div>
    </div>
@endsection
{{-- @section('history')
@if (Auth::user()->last_login_at == 0)
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-dark"><a href="{{ route('profile.create') }}" class="alert-link">Silahkan lengkapi data diri terlebih dahulu! Klik di sini!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@else
@foreach ($applicants as $applicant)
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">                    
                    <p class="card-title"><a href="/dashboard/{{ $applicant->applicant->job->slug }}">{{ $applicant->applicant->job->position }}</a> <i class="fas fa-dash"></i>  -  
                    {{ Carbon\Carbon::parse($applicant->applicant->created_at)->format("d/m/Y") }}</p>
                    @if ($applicant->interview->process == 1)
                        @if ($applicant->interview->status == 1)
                            Selamat Anda lolos tahap seleksi wawancara, informasi selengkapknya silahkan <a href="" class="text-primary" data-toggle="modal" data-target="#modalinterviewdetail{{ $applicant->id }}">klik disini</a>
                            @include('dashboard.history.interview')
                            @include('dashboard.attendance.result')
                        @elseif($applicant->interview->status == 0)
                            Mohon maaf Anda tidak lolos seleksi wawancara.
                        @endif                     
                    @elseif($applicant->practicetest->process == 1)
                        @if ($applicant->practicetest->status == 1)
                            Selamat Anda lolos tahap seleksi praktik, informasi selengkapknya silahkan <a href="" class="text-primary" data-toggle="modal" data-target="#modalpracticedetail{{ $applicant->id }}">klik disini</a>
                            @include('dashboard.history.practice')
                            @include('dashboard.attendance.interview')
                        @elseif($applicant->practicetest->status == 0)
                            Mohon maaf Anda tidak lolos seleksi praktik
                        @endif    
                    @elseif( $applicant->writtentest->process == 1)
                        @if ($applicant->writtentest->status == 1)
                            Selamat Anda lolos tahap seleksi tertulis, informasi selengkapknya silahkan <a href="" class="text-primary" data-toggle="modal" data-target="#modalwrittendetail{{ $applicant->id }}">klik disini</a>
                            @include('dashboard.history.written')
                            @include('dashboard.attendance.practice')
                        @elseif($applicant->writtentest->status == 0)
                            Mohon maaf Anda tidak lolos seleksi tertulis
                        @endif                                              
                    @elseif($applicant->administration->process == 1)
                        @if ($applicant->administration->status == 1)
                            Selamat Anda lolos tahap seleksi administrasi, informasi selengkapknya silahkan <a href="" class="text-primary" data-toggle="modal" data-target="#modaladmindetail{{ $applicant->id }}">klik disini</a>
                            @include('dashboard.history.admin')
                            @include('dashboard.attendance.written')
                        @elseif($applicant->administration->status == 0)
                            Mohon maaf Anda tidak lolos seleksi administrasi
                        @endif
                    @elseif($applicant->administration->process == null)
                        Pendaftaran berhasil! Pengumuman seleksi administrasi akan diumumkan pada {{  Carbon\Carbon::parse($applicant->applicant->job->announ_date)->isoFormat('dddd, D MMMM Y') }}.
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $applicants->links() }}
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection --}}


@section('history')
    @foreach ($applicants as $applicant)
        <div class="card-body">
            <div class="media media-reply">
                <img class="mr-3 circle-rounded" src="img/job.png" width="50" height="50"
                    alt="Generic placeholder image">
                <div class="media-body bg-white">
                    <div class="d-sm-flex justify-content-between mb-3">
                        <h5 class="mb-sm-0"><a
                                href="/dashboard/{{ $applicant->applicant->job->slug }}">{{ $applicant->applicant->job->position }}</a>
                            <small class="text-muted ml-3">
                                {{ Carbon\Carbon::parse($applicant->applicant->created_at)->format('d/m/Y') }}</small>
                        </h5>
                        <p class="text-muted"><code></code>
                        </p>
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        @if ($applicant->interview->process == 1)
                            <button type="button" class="btn btn-warning">seleksi wawancara</button>
                            @if ($applicant->interview->status == 1)
                                <p>Selamat Anda lolos tahap seleksi wawancara, informasi selengkapknya silahkan <a
                                        href="" class="text-primary" style="font-weight: bold" data-toggle="modal"
                                        data-target="#modalinterviewdetail{{ $applicant->id }}">klik disini</a></p>
                                @include('dashboard.history.interview')
                                @include('dashboard.attendance.result')
                            @elseif($applicant->interview->status == 0)
                                Mohon maaf Anda tidak lolos seleksi wawancara.
                            @endif
                        @elseif($applicant->practicetest->process == 1)
                            @if ($applicant->practicetest->status == 1)
                                <p>Selamat Anda lolos tahap seleksi praktik, informasi selengkapknya silahkan <a
                                        href="" class="text-primary" style="font-weight: bold" data-toggle="modal"
                                        data-target="#modalpracticedetail{{ $applicant->id }}">klik disini</a></p>
                                @include('dashboard.history.practice')
                                @include('dashboard.attendance.interview')
                            @elseif($applicant->practicetest->status == 0)
                                Mohon maaf Anda tidak lolos seleksi praktik
                            @endif
                        @elseif($applicant->writtentest->process == 1)
                            @if ($applicant->writtentest->status == 1)
                                <p>Selamat Anda lolos tahap Psikotes, informasi selengkapknya silahkan <a href=""
                                        class="text-primary" style="font-weight: bold" data-toggle="modal"
                                        data-target="#modalwrittendetail{{ $applicant->id }}">klik disini</a></p>
                                @include('dashboard.history.written')
                                @include('dashboard.attendance.practice')
                            @elseif($applicant->writtentest->status == 0)
                                Mohon maaf Anda tidak lolos seleksi Psikotes
                            @endif
                        @elseif($applicant->administration->process == 1)
                            @if ($applicant->administration->status == 1)
                                <p> Selamat Anda lolos tahap seleksi administrasi, informasi selengkapknya silahkan <a
                                        href="" class="text-primary" style="font-weight: bold" data-toggle="modal"
                                        data-target="#modaladmindetail{{ $applicant->id }}">klik disini</a></p>
                                @include('dashboard.history.admin')
                                @include('dashboard.attendance.written')
                            @elseif($applicant->administration->status == 0)
                                Mohon maaf Anda tidak lolos seleksi administrasi
                            @endif
                        @elseif($applicant->administration->process == null)
                            <div id="accordion-three" class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne4"
                                            aria-expanded="true" aria-controls="collapseOne4"><i class="fa"
                                                aria-hidden="true"></i> Accordion Header
                                            One</h5>
                                    </div>
                                    <div id="collapseOne4" class="collapse show" data-parent="#accordion-three">
                                        <div class="card-body"></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection



{{-- <div id="accordion-two" class="accordion">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1"><i class="fa" aria-hidden="true"></i> Seleksi Administrasi</h5>
        </div>
        <div id="collapseOne1" class="collapse show" data-parent="#accordion-two">
            <div class="card-body">Pendaftaran berhasil! Pengumuman seleksi administrasi akan diumumkan pada {{  Carbon\Carbon::parse($applicant->applicant->job->announ_date)->isoFormat('dddd, D MMMM Y') }}.</div>
        </div>
    </div>
</div> --}}
{{-- 
<button type="button" class="btn btn-sm btn-warning">Seleksi Administrasi</button> <br>
Pendaftaran berhasil! Pengumuman seleksi administrasi akan diumumkan pada {{  Carbon\Carbon::parse($applicant->applicant->job->announ_date)->isoFormat('dddd, D MMMM Y') }}..</div> --}}
