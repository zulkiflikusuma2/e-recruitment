@extends('dashboard.layouts.main')
@section('title', 'Applicant Show | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/applicants">Data Lamaran</a></li>
    <li class="breadcrumb-item active"><a href="/applicants/{{ $applicant->id }}">Detail Lamaran</a></li>
@endsection

@section('container')
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold " style="text-align: center">Detail Lamaran {{ $applicant->personal_identity->name }}
        </p>
    </div>
    <div class="float-right mr-5">
        <a href="/administration/{{ $applicant->id }}/add" class="btn btn-primary" data-toggle="modal"
            data-target="#modalcreate"> <i class="fas fa-plus-circle"> Administrasi</i></a>
    </div>
    @include('dashboard.selection.administration.create')

    <div class="card-body text-justify mt-3">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="position">Nama</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ $applicant->personal_identity->name }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="position">Jabatan</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ $applicant->job->position }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="dob">Tanggal Lahir</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ Carbon\Carbon::parse($applicant->personal_identity->dob)->isoFormat('D MMMM Y') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="gender">Jenis Kelamin</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ $applicant->personal_identity->gender->name }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="address">Alamat</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ $applicant->personal_identity->address }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="education">Pendidikan Terakhir</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ $applicant->personal_identity->education->name }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label" for="phone">Nomor Telepon</label>
            <label for="col-lg-1">:</label>
            <div class="col-lg-6">
                <p>{{ $applicant->personal_identity->phone }}</p>
            </div>
        </div>
        <div style="form-group row">
            <p>* Pas Foto <br></p>
            <img src="{{ asset('storage/' . $applicant->photo) }}" alt="{{ $applicant->personal_identity->name }}"
                style="width:30%;height:40%" class="img-fluid">
        </div>
        <div class="form-group row mt-3">
            <p>* Surat Lamaran<br></p>
            <embed src="{{ asset('storage/' . $applicant->application_letter) }}" type="application/pdf" width="100%"
                height="350px" />
        </div>
        <div class="form-group row">
            <p>* Curriculum Vitae<br></p>
            <embed src="{{ asset('storage/' . $applicant->cv) }}" type="application/pdf" width="100%" height="350px" />
        </div>
        <div class="form-group row">
            <p>*Ijazah <br></p>
            <embed src="{{ asset('storage/' . $applicant->certificate) }}" type="application/pdf" width="100%"
                height="350px" />
        </div>
        <div class="form-group row">
            <p>* Transkrip Nilai<br></p>
            <embed src="{{ asset('storage/' . $applicant->transcript) }}" type="application/pdf" width="100%"
                height="350px" />
        </div>

        @if ($applicant->document !== null)
            <div class="form-group row">
                <p> Dokumen Pendukung Lainnya<br></p>
                <embed src="{{ asset('storage/' . $applicant->document) }}" type="application/pdf" width="100%"
                    height="350px" />
            </div>
        @endif
    </div>
@endsection
