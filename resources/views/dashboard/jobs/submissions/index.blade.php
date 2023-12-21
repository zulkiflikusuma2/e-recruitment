@extends('dashboard.layouts.main')
@section('title', 'Submissions | CBI')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/submissions">Pengajuan Lowongan</a></li>
@endsection

@section('container')
    @include('dashboard.jobs.submissions.create')

    <!-- DataTables Kategori Lowongan -->
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Pengajuan Lowongan</h5>
    </div>
    <div style="float: right; margin-right:3%">
        <a href="/submissions/create" class="btn btn-primary " data-toggle="modal" data-target="#modalcreate"><i
                class="fas fa-plus-circle"> Tambah Lowongan</i></a>
    </div>
    <div class="table-responsive mt-0">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Tutup</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $job->position }}</td>
                        <td> {{ Carbon\Carbon::parse($job->created_at)->format('d/m/Y') }}</td>
                        <td> {{ Carbon\Carbon::parse($job->close_date)->format('d/m/Y') }}</td>
                        <td>
                            @if ($job->approval == '1')
                                Disetujui
                            @elseif ($job->approval == '0')
                                Revisi
                            @else
                                Menunggu
                            @endif
                        </td>
                        <td>
                            <a href="/submissions/{{ $job->slug }}" class="btn btn-info" data-toggle="modal"
                                data-target="#modalshow{{ $job->slug }}"><i class="fas fa-eye"></i></a>
                            <a href="/submissions/{{ $job->slug }}/edit" class="btn btn-warning" data-toggle="modal"
                                data-target="#modaledit{{ $job->slug }}"><i class="fas fa-edit"></i></a>
                            <a href="/submissions/{{ $job->slug }}" class="btn btn-danger" data-toggle="modal"
                                data-target="#modaldelete{{ $job->slug }}"><i class="fas fa-trash-alt"></i></a>
                            @include('dashboard.jobs.submissions.show')
                        </td>
                    </tr>
                    @include('dashboard.jobs.submissions.delete')
                    @include('dashboard.jobs.submissions.edit')
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
            fetch('/submissions/checkSlug?position=' + position.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>

@endsection
