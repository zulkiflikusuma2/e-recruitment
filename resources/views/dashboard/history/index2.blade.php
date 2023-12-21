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
                    <div class="">
                        @if ($applicant->interview->process == 1)
                            <div class="custom-media-object-1">
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Wawancara</h6>
                                                @if ($applicant->interview->status == 1)
                                                    <p>Selamat Anda lolos tahap seleksi wawancara, informasi selengkapknya
                                                        silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modalinterviewdetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.interview')
                                                    @include('dashboard.attendance.result')
                                                @elseif($applicant->interview->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi wawancara.
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Praktik</h6>
                                                @if ($applicant->practicetest->status == 1)
                                                    <p>Selamat Anda lolos tahap seleksi praktik, informasi selengkapknya
                                                        silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modalpracticedetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.practice')
                                                    @include('dashboard.attendance.interview')
                                                @elseif($applicant->practicetest->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi praktik
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi psikotes</h6>
                                                @if ($applicant->writtentest->status == 1)
                                                    <p>Selamat Anda lolos tahap seleksi psikotes, informasi selengkapknya
                                                        silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modalwrittendetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.written')
                                                    @include('dashboard.attendance.practice')
                                                @elseif($applicant->writtentest->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi psikotes
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Administrasi</h6>
                                                @if ($applicant->administration->status == 1)
                                                    <p> Selamat Anda lolos tahap seleksi administrasi, informasi
                                                        selengkapknya silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modaladmindetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.admin')
                                                    @include('dashboard.attendance.written')
                                                @elseif($applicant->administration->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi administrasi
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($applicant->practicetest->process == 1)
                            <div class="custom-media-object-1">
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Praktik</h6>
                                                @if ($applicant->practicetest->status == 1)
                                                    <p>Selamat Anda lolos tahap seleksi praktik, informasi selengkapknya
                                                        silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modalpracticedetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.practice')
                                                    @include('dashboard.attendance.interview')
                                                @elseif($applicant->practicetest->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi praktik
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi psikotes</h6>
                                                @if ($applicant->writtentest->status == 1)
                                                    <p>Selamat Anda lolos tahap seleksi psikotes, informasi selengkapknya
                                                        silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modalwrittendetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.written')
                                                    @include('dashboard.attendance.practice')
                                                @elseif($applicant->writtentest->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi psikotes
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Administrasi</h6>
                                                @if ($applicant->administration->status == 1)
                                                    <p> Selamat Anda lolos tahap seleksi administrasi, informasi
                                                        selengkapknya silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modaladmindetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.admin')
                                                    @include('dashboard.attendance.written')
                                                @elseif($applicant->administration->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi administrasi
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($applicant->writtentest->process == 1)
                            <div class="custom-media-object-1">
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi psikotes</h6>
                                                @if ($applicant->writtentest->status == 1)
                                                    <p>Selamat Anda lolos tahap seleksi psikotes, informasi selengkapknya
                                                        silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modalwrittendetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.written')
                                                    @include('dashboard.attendance.practice')
                                                @elseif($applicant->writtentest->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi psikotes
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Administrasi</h6>
                                                @if ($applicant->administration->status == 1)
                                                    <p> Selamat Anda lolos tahap seleksi administrasi, informasi
                                                        selengkapknya silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modaladmindetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.admin')
                                                    @include('dashboard.attendance.written')
                                                @elseif($applicant->administration->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi administrasi
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($applicant->administration->process == 1)
                            <div class="custom-media-object-1">
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Administrasi</h6>
                                                @if ($applicant->administration->status == 1)
                                                    <p> Selamat Anda lolos tahap seleksi administrasi, informasi
                                                        selengkapknya silahkan <a href="" class="text-primary"
                                                            style="font-weight: bold" data-toggle="modal"
                                                            data-target="#modaladmindetail{{ $applicant->id }}">klik
                                                            disini</a></p>
                                                    @include('dashboard.history.admin')
                                                    @include('dashboard.attendance.written')
                                                @elseif($applicant->administration->status == 0)
                                                    Mohon maaf Anda tidak lolos seleksi administrasi
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($applicant->administration->process == null)
                            <div class="custom-media-object-1">
                                <div class="media border-bottom-1 p-t-15">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <i class="align-self-start cc XRP f-s-30"></i>
                                            </div>
                                            <div class="col-lg-11">
                                                <h6>Seleksi Administrasi</h6>
                                                <p>Pendaftaran berhasil! Pengumuman seleksi administrasi akan diumumkan pada
                                                    {{ Carbon\Carbon::parse($applicant->applicant->job->announ_date)->isoFormat('dddd, D MMMM Y') }}.
                                                </p>
                                            </div>
                                        </div>
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
