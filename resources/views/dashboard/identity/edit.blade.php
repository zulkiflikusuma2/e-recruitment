@extends('dashboard.layouts.main')
@section('title', 'Identity | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('profile.edit') }}">Informasi Pribadi</a></li>
@endsection
@section('container')
    <div class="card">
        <div class="card-header">
            <h3 class="font-weight-bold text-black" style="text-align: center">Informasi Pribadi</h3>
        </div>
    </div>
    @foreach ($identity as $identity)
        <div class="form-validation">
            <form class="form-valide" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="name"> Nama <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                            name="name" autofocus required value="{{ old('name', $identity->name) }}">
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="gender_id">Jenis Kelamin <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="gender_id" name="gender_id"
                            @error('gender_id') is-invalid @enderror required
                            value="{{ old('gender_id', $identity->gender_id) }}">
                            <option disabled selected>Pilih</option>
                            @foreach ($genders as $gender)
                                @if (old('gender_id', $identity->gender_id) == $gender->id)
                                    <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>
                                @else
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="dob">Tanggal Lahir <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob"
                            name="dob" required value="{{ old('dob', $identity->dob) }}">
                    </div>
                    @error('dob')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="address">Alamat <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                            required>{{ old('address', $identity->address) }}</textarea>
                    </div>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="edu_id">Pendidikan Terakhir<span
                            class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <select class="form-control @error('edu_id') is-invalid @enderror" id="edu_id" name="edu_id"
                            required value="{{ old('edu_id', $identity->edu_id) }}">
                            <option disabled selected>Pilih</option>
                            @foreach ($educations as $education)
                                @if (old('edu_id', $identity->edu_id) == $education->id)
                                    <option value="{{ $education->id }}" selected>{{ $education->name }}</option>
                                @else
                                    <option value="{{ $education->id }}">{{ $education->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('education')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="phone">No Telepon <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone"
                            name="phone" required value="{{ old('phone', $identity->phone) }}">
                    </div>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-lg-7 ml-auto">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
