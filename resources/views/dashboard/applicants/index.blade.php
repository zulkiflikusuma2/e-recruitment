@extends('dashboard.layouts.main')
@section('title', 'Applicants | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/applicants">Data Lamaran</a></li>
@endsection

@section('container')

    <!-- DataTables Kategori Lowongan -->
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Data Lamaran</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $applicant->personal_identity->name }}</td>
                        <td align="left">{{ $applicant->job->position }}</td>
                        <td>{{ Carbon\Carbon::parse($applicant->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <a href="/applicants/{{ $applicant->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            {{-- <a href="/applicants/{{  $applicant->id }}" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete{{ $applicant->id }}"><i class="fas fa-trash-alt"></i></a> --}}
                        </td>
                    </tr>
                    @include('dashboard.applicants.delete')
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
