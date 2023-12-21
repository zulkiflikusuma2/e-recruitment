@extends('dashboard.layouts.main')
@section('title', 'Job Show | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Daftar Lowongan</a></li>
    <li class="breadcrumb-item active"><a href="/dashboard/{{ $job->slug }}">Detail Lowongan</a></li>
@endsection

@section('container')
    @include('dashboard.apply.create')
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold" style="text-align: center">Detail Lowongan {{ $job->position }}
        <p>
    </div>
    <div class="card-body text-justify">
        <div class="form-group row">
            <label class="col-lg-7 col-form-label" for="name">Kualifikasi : <br>{!! nl2br($job->requirement) !!}</label>
            <label for="col-lg-5">Berkas Kelengkapan : <br>{!! nl2br($job->attachment) !!}</label>
        </div>
        <div class="form-group row">
            Pendaftaran berakhir pada {{ Carbon\Carbon::parse($job->close_date)->isoFormat('dddd, D MMMM Y') }}
        </div>
    </div>
    @if ($applicant === 1)
        <div style="text-align: center">
            <a href="/history" class="btn btn-primary">Riwayat Pendaftaran</a>
        </div>
    @else
        <div style="text-align: center">
            <a href="{{ route('apply.create') }}" class="btn btn-primary" data-toggle="modal"
                data-target="#modalcreate">Lamar Pekerjaan</a>
        </div>
    @endif

@endsection
