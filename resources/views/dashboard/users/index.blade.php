@extends('dashboard.layouts.main')
@section('title', 'User | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="/users">Kelola User</a></li>
@endsection

@section('container')

    <!-- DataTables Kategori Lowongan -->
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center">Data User</h5>
    </div>
    <div style="float: right; margin-right:3%">
        <a href="/users/create" class="btn btn-primary " data-toggle="modal" data-target="#modalcreate"><i
                class="fas fa-plus-circle"> Tambah User</i></a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration" style="border: 1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td align="center">{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td align="center">
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning" data-toggle="modal"
                                data-target="#modaledit{{ $user->id }}"><i class="fas fa-edit"></i></a>
                            <a href="/users/{{ $user->id }}" class="btn btn-danger" data-toggle="modal"
                                data-target="#modaldelete{{ $user->id }}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @include('dashboard.users.edit')
                    @include('dashboard.users.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('dashboard.users.create')
@endsection
