@extends('dashboard.layouts.main')
@section('title', ' Approval | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/schedules">Agenda Seleksi</a></li>
@endsection

@section('container')
    <!-- DataTables Kategori Lowongan -->
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Agenda Seleksi</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Posisi</th>
                    <th>Seleksi</th>
                    <th>Tempat</th>
                    <th>Tanggal Test</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td align="left">{{ $schedule->job->position }}</td>
                        <td align="left">{{ $schedule->selection_type->name }}</td>
                        <td align="left">{{ $schedule->location }}</td>
                        <td>{{ Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($schedule->time)->format('G.i') }}</td>
                        <td>
                            @if ($schedule->status == '1')
                                Disetujui
                            @elseif ($schedule->status == '0')
                                Ditolak
                            @else
                                Menunggu
                            @endif
                        </td>
                        <td>
                            <a href="/scheduleapproval/{{ $schedule->id }}/add" class="btn btn-warning" data-toggle="modal"
                                data-target="#modalcreate{{ $schedule->id }}"><i class="fas fa-plus"></i></a>
                            <a href="/scheduleapproval/{{ $schedule->id }}" class="btn btn-danger" data-toggle="modal"
                                data-target="#modaldelete{{ $schedule->id }}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @include('dashboard.schedule.approval.delete')
                    @include('dashboard.schedule.approval.create')
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
