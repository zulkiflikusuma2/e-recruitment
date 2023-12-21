@extends('dashboard.layouts.main')
@section('title', 'Jobs Inactive| CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/inactivevacancies/">Lowongan Tidak Aktif</a></li>
@endsection

@section('container')

    <!-- DataTables Kategori Lowongan -->
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Lowongan Tidak Aktif</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Tanggal Tutup</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $job->position }}</td>
                        <td> {{ Carbon\Carbon::parse($job->close_date)->format('d/m/Y') }}</td>
                        <td>
                            <a href="/inactivevacancies/{{ $job->slug }}" class="btn btn-info" data-toggle="modal"
                                data-target="#modalshow{{ $job->slug }}"><i class="fas fa-eye"></i></a>
                            <a href="/inactivevacancies/{{ $job->slug }}/edit" class="btn btn-warning"
                                data-toggle="modal" data-target="#modaledit{{ $job->slug }}"><i
                                    class="fas fa-edit"></i></a>
                            <a href="/inactivevacancies/{{ $job->slug }}" class="btn btn-danger" data-toggle="modal"
                                data-target="#modaldelete{{ $job->slug }}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @include('dashboard.jobs.inactive.delete')
                    @include('dashboard.jobs.inactive.edit')
                    @include('dashboard.jobs.inactive.show')
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')

    <script>
        const position = document.querySelector('#position');
        const slug = document.querySelector('#slug');

        position.addEventListener('change', function() {
            fetch('/inactivevacancies/checkSlug?position=' + position.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>

@endsection
