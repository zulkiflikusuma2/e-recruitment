@extends('dashboard.layouts.main')
@section('title', 'Message | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/messages/">Pesan</a></li>
@endsection

@section('container')

    <!-- DataTables Kategori Lowongan -->
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Pesan</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->subject }}</td>
                        <td> {{ Carbon\Carbon::parse($message->created_at)->format('d/m/Y') }}</td>
                        <td align="center">
                            <a href="/messages/{{ $message->id }}" class="btn btn-info" data-toggle="modal"
                                data-target="#modalshow{{ $message->id }}"><i class="fas fa-eye"></i></a>
                            <a href="/messages/{{ $message->id }}" class="btn btn-danger" data-toggle="modal"
                                data-target="#modaldelete{{ $message->id }}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @include('dashboard.message.delete')
                    @include('dashboard.message.show')
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
