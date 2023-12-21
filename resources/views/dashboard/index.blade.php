@extends('dashboard.layouts.mainn')
@section('title', 'Dashboard | CBI')
@section('dashboard')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body ">
                                <a href="/applicants">
                                    <h3 class="card-title text-white">Lamaran Masuk</h3>
                                </a>
                                <div class="d-inline-block">
                                    <h1 class="text-white">{{ $applicants }}</h1>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <a href="/activevacancies">
                                    <h3 class="card-title text-white">Lowongan Aktif</h3>
                                </a>
                                <div class="d-inline-block">
                                    <h1 class="text-white">{{ $jobs->count() }}</h1>
                                </div>
                                <span class="float-right display-5 opacity-5"><i
                                        class="fab fa-creative-commons-share"></i></span>
                            </div>
                        </div>
                    </div>
                    @can('superadmin')
                        <div class="col-lg-3 col-sm-6">
                            <div class="card gradient-7">
                                <div class="card-body">
                                    <a href="/submissionsapproval">
                                        <h3 class="card-title text-white">Pengajuan Lowongan</h3>
                                    </a>
                                    <div class="d-inline-block">
                                        <h1 class="text-white">{{ $jobsapproval }}</h1>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa fa-clipboard-list"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card gradient-4">
                                <div class="card-body">
                                    <a href="/scheduleapproval">
                                        <h3 class="card-title text-white">Pengajuan Agenda</h3>
                                    </a>
                                    <div class="d-inline-block">
                                        <h1 class="text-white">{{ $schedules }}</h1>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
