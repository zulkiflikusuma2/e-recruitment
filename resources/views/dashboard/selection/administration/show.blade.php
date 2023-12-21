<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"  id="modalshow{{$applicant->id}}">
    <div class="modal-dialog modal-lg">
        <form action="/administration/{{$applicant->id}}" method="post" class="d-inline">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pelamar {{ $applicant->applicant->personal_identity->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 col-form-label" for="name">Nama</label>
                    <label for="col-lg-9">:  {{ $applicant->applicant->personal_identity->name}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="position">Jabatan</label>
                    <label for="col-lg-9">:  {{ $applicant->applicant->job->position}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="dob">Tanggal Lahir</label>
                    <label for="col-lg-9">:  {{  Carbon\Carbon::parse($applicant->applicant->personal_identity->dob)->isoFormat('D MMMM Y') }}</label> <br>
                    <label class="col-lg-3 col-form-label" for="gender">Jenis Kelamin</label>
                    <label for="col-lg-9">:  {{ $applicant->applicant->personal_identity->gender->name}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="address">Alamat</label>
                    <label for="col-lg-9">:  {{ $applicant->applicant->personal_identity->address}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="education">Pendidikan Terakhir</label>
                    <label for="col-lg-9">:  {{ $applicant->applicant->personal_identity->education->name}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="phone">No Telepon</label>
                    <label for="col-lg-9">:  {{ $applicant->applicant->personal_identity->phone}}</label> <br>
                </div>
                <div class="modal-body">
                    <p>* Pas Foto</p>
                        <img src="{{ asset('storage/' .$applicant->applicant->photo) }}" style="width:30%;height:40%" class="img-fluid">
                    <p>* Surat Lamaran</p>
                        <embed src="{{ asset('storage/' .$applicant->applicant->application_letter) }}" type="application/pdf" width="100%" height="600px" />
                    <p>* Curriculum Vitae</p>
                        <embed src="{{ asset('storage/' .$applicant->applicant->cv) }}" type="application/pdf" width="100%" height="600px" />
                    <p>* Ijazah</p>
                        <embed src="{{ asset('storage/' .$applicant->applicant->certificate) }}" type="application/pdf" width="100%" height="600px" />
                    <p>* Transkrip Nilai</p>
                        <embed src="{{ asset('storage/' .$applicant->applicant->transcript) }}" type="application/pdf" width="100%" height="600px" />
                    @if ($applicant->applicant->str !== null)                        
                    <p>* STR</p>
                        <embed src="{{ asset('storage/' .$applicant->applicant->str) }}" type="application/pdf" width="100%" height="600px" />
                    @endif
                    @if ($applicant->applicant->document !== null)                        
                    <p>* Dokumen pendukung lainnya</p>
                        <embed src="{{ asset('storage/' .$applicant->applicant->document) }}" type="application/pdf" width="100%" height="600px" />
                    @endif
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
