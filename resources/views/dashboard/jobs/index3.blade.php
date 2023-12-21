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
    {{-- <div class="container-fluid">
        <div class="row">
            @foreach ($jobs as $job)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores repellendus molestiae
                                exercitationem voluptatem tempora quo dolore nostrum dolor consequuntur itaque, alias fugit.
                                Architecto rerum animi velit, beatae corrupti quos nam saepe asperiores aliquid quae culpa
                                ea reiciendis ipsam numquam laborum aperiam. Id tempore consequuntur velit vitae corporis,
                                aspernatur praesentium ratione!</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    {{-- <div class="container-fluid">
        <div class="row">
            @if ($jobs->count())
                @foreach ($jobs as $job)
                    <div class="col-lg-4 py-2">
                        <div class="card-blog">
                            <div class="header">
                                <a href="/dashboard/{{ $job->slug }}" class="post-thumb">
                                    <img src="img/job.png" alt="">
                                </a>
                            </div>
                            <div class="body">
                                <h5 class="post-title"><a href="/dashboard/{{ $job->slug }}">{{ $job->position }}</a>
                                </h5>
                                <div class="site-info float-right mb-1">
                                    <span class="mai-time"></span> {{ $job->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="col-12 text-center mt-4 d-flex justify-content-center">Tidak ada lowongan tersedia.</p>
            @endif
        </div> --}}


    <div class="container-fluid">
        <div class="row">
            @foreach ($jobs as $job)
                <div class="col-3">
                    <div class="card">
                        <div class="card-header px-0 py-0">
                            <a href="/dashboard/{{ $job->slug }}">
                                <img src="img/job.png" alt="" style="width: 100%; height:100%">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5><a href="/dashboard/{{ $job->slug }}">{{ $job->position }}</a></h5>
                            <p><i class="fa fa-clock"></i>
                                {{ Carbon\Carbon::parse($job->close_date)->isoFormat('dddd, D MMMM Y') }}</p>
                            <div class="text-center mt-4">
                                <a href="/dashboard/{{ $job->slug }}"
                                    class="btn btn-primary btn-lg border-0 btn-rounded px-5">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
