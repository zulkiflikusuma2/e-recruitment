@extends('dashboard.layouts.mainn')
@section('title', 'Jobs | CBI')
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/dashboard">Daftar Lowongan</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('history')
    @if (Auth::user()->last_login_at == 0)
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-dark"><a href="{{ route('profile.create') }}"
                                    class="alert-link">Silahkan lengkapi data diri terlebih dahulu! Klik di sini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @foreach ($jobs as $job)
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="/dashboard/{{ $job->slug }}">
                                    <p class="card-title">{{ $job->position }}</p>
                                </a>
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="img/job.png" alt=""
                                            style="width: 10%; height:10%;">
                                        <div class="media-body">
                                            <a href="/dashboard/{{ $job->slug }}"> {{ $job->excerpt }} </a><br>
                                        </div>
                                    </div>
                                    <p style="float:right">
                                        {{ $job->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
