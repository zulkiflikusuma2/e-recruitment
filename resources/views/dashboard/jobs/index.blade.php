@extends('dashboard.layouts.main')
@section('title', 'Jobs | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="/dashboard">Daftar Lowongan</a></li>
@endsection
@section('container')

    <div>
        <a href="{{ route('profile.create') }}" class="btn-btn info">Silahkan lengkapi data diri terlebih dahulu!</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="font-weight-bold text-black" style="text-align: center">Daftar Lowongan</h3>
        </div>
    </div>
    @foreach ($jobs as $job)
        <div class="card-body">
            <a href="/dashboard/{{ $job->slug }}">
                <h5 class="card-title text-primary">{{ $job->position }}</h5>
            </a>
            <p class="card-text">{!! $job->excerpt !!}</p>
            <p style="float:right">
                {{ $job->created_at->diffForHumans() }}
            </p>
        </div>
        <div>
            <hr>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links() }}
        </div>
    @endforeach
@endsection
