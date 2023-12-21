@extends('dashboard.layouts.main')
@section('title', 'administration | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/administration">Tahap Seleksi Administrasi</a></li>
@endsection

@section('container')
    <div class="card-header">
        <h5 class="mb-2 font-weight-bold text-primary" style="text-align: center">Tahap Seleksi</h5>
    </div>
    <ul class="nav nav-pills">
        <li><a href="/administration" class="nav-link active">Administrasi</a>
        </li>
        <li><a href="/writtentest" class="nav-link">Psikotes</a>
        </li>
        <li><a href="/practicetest" class="nav-link">Tes Praktik</a>
        </li>
        <li><a href="/interview" class="nav-link">Wawancara</a>
        </li>
    </ul>
    <div style="float: right; margin-right:3%">
        <a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalconfirm"><i
                class="fas fa-plus-circle"> Pengumuman</i></a>
    </div>
    <form action="" method="post" class="d-inline">
        @method('patch')
        @csrf
        @include('dashboard.selection.administration.confirm')
        @include('dashboard.selection.administration.announ')
        {{-- @include('dashboard.selection.administration.rejected') --}}

        <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration" style="border: 1">
                <thead>
                    <tr align="center">
                        <th><input type="checkbox" name"select-all" id="select-all" /></th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($applicants->count())
                        @foreach ($applicants as $applicant)
                            <tr align="center">
                                <td><input type="checkbox" name="ids[]" value="{{ $applicant->id }}"></td>
                                <td>{{ $loop->iteration }}</td>
                                <td align="left">{{ $applicant->applicant->personal_identity->name }}</td>
                                <td align="left">{{ $applicant->applicant->job->position }}</td>
                                <td>
                                    @if ($applicant->status == '1')
                                        Memenuhi
                                    @else
                                        Tidak Memenuhi
                                    @endif
                                    {{-- <input type="hidden" name="status" value="{{ $applicant->status }}"> --}}
                                </td>
                                <td>
                                    <a href="/administration/{{ $applicant->id }}" class="btn btn-info" data-toggle="modal"
                                        data-target="#modalshow{{ $applicant->id }}"><i class="fas fa-eye"></i></a>
                                    <a href="/administration/{{ $applicant->id }}/edit" class="btn btn-warning"
                                        data-toggle="modal" data-target="#modaledit{{ $applicant->id }}"><i
                                            class="fas fa-edit"></i></a>
                                    {{-- <a href="/administration/{{ $applicant->id }}" class="btn btn-danger"  data-toggle="modal" data-target="#modaldelete{{ $applicant->id }}"><i class="fas fa-trash"></i></a> --}}
                                </td>
                            </tr>
    </form>
    @include('dashboard.selection.administration.delete')
    @include('dashboard.selection.administration.edit')
    @include('dashboard.selection.administration.show')
    @endforeach
    @endif
    </tbody>
    </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select-all').click(function() {
                if (this.checked) {
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@endsection
