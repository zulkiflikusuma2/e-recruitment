@extends('dashboard.layouts.main')
@section('title', 'Seleksi | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/selectionresults">Hasil Seleksi</a></li>
@endsection

@section('container')
    <!-- DataTables Kategori Lowongan -->
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Hasil Seleksi</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Psikotes</th>
                    <th>Praktik</th>
                    <th>Interview</th>
                    <th>Status</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($selectionresults as $sr)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $sr->applicant->personal_identity->name }}</td>
                        <td align="left">{{ $sr->applicant->job->position }}</td>
                        <td>{{ $sr->writtentest->score }}</td>
                        <td>{{ $sr->practicetest->score }}</td>
                        <td>{{ $sr->interview->score }}</td>
                        <td>
                            @if ($sr->result == '1')
                                Diterima
                            @elseif ($sr->result == '0')
                                Ditolak
                            @else
                                Sedang Diproses
                            @endif
                        </td>
                        <td>{{ Carbon\Carbon::parse($sr->applicant->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <a href="/selectionresults/{{ $sr->id }}" class="btn btn-info" data-toggle="modal"
                                data-target="#modalshow{{ $sr->id }}"><i class="fas fa-eye"></i></a>
                            {{-- <a href="/selectionresults/{{ $sr->id }}/edit" class="btn btn-warning" data-toggle="modal" data-target="#modaledit{{$sr->id}}"><i class="fas fa-edit"></i></a> --}}
                            <a href="/selectionresults/{{ $sr->id }}" class="btn btn-danger" data-toggle="modal"
                                data-target="#modaldelete{{ $sr->id }}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @include('dashboard.selection.delete')
                    @include('dashboard.selection.show')
                    @include('dashboard.selection.edit')
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
