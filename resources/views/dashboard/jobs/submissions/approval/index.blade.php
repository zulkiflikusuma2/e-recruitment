@extends('dashboard.layouts.main')
@section('title', 'Approval | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/submissionsapproval">Ajuan Lowongan</a></li>
@endsection

@section('container')
    <!-- DataTables Kategori Lowongan -->
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Ajuan Lowongan</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $job->position }}</td>
                        <td> {{ Carbon\Carbon::parse($job->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <a href="/submissionsapproval/{{ $job->slug }}" class="btn btn-info" data-toggle="modal"
                                data-target="#modalshowapproval{{ $job->slug }}"><i class="fas fa-eye"></i></a>
                        </td>
                        @include('dashboard.jobs.submissions.approval.show')
                        @include('dashboard.jobs.submissions.approval.edit')
                    </tr>
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
            fetch('/submissionsapproval/checkSlug?position=' + position.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>

@endsection
