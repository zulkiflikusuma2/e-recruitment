<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"  id="modalshow{{$sr->id}}">
    <div class="modal-dialog modal-lg">
        <form action="/selectionresults/{{$sr->id}}" method="post" class="d-inline">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pelamar {{ $sr->applicant->personal_identity->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="col-lg-3 col-form-label" for="name">Hasil Seleksi Tertulis</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Skor</label>
                    <label class="col-lg-1 col-form-label" for="name">:</label>
                    <label for="col-lg-8">{{ $sr->writtentest->score}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Status</label>
                    <label class="col-lg-1 col-form-label" for="name">:</label>
                    <label for="col-lg-8">@if ($sr->writtentest->status == '1') Memenuhi @elseif($sr->writtentest->status == '0') Tidak Memenuhi @else @endif</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Hasil Seleksi Praktik</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Skor</label>
                    <label class="col-lg-1 col-form-label" for="name">:</label>
                    <label for="col-lg-8">{{ $sr->practicetest->score}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Status</label>
                    <label class="col-lg-1 col-form-label" for="name">:</label>
                    <label for="col-lg-8">@if ($sr->practicetest->status == '1') Memenuhi @elseif($sr->practicetest->status == '0') Tidak Memenuhi @else @endif</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Hasil Seleksi Wawancara</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Skor</label>
                    <label class="col-lg-1 col-form-label" for="name">:</label>
                    <label for="col-lg-8">{{ $sr->interview->score}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Status</label>
                    <label class="col-lg-1 col-form-label" for="name">:</label>
                    <label for="col-lg-8">@if ($sr->interview->status == '1') Memenuhi @elseif($sr->interview->status == '0') Tidak Memenuhi @else @endif</label> <br> 
                    <label class="col-lg-12 col-form-label" for="name">Keterangan</label>
                    <label for="col-lg-12 col-form-label"> {!! nl2br($sr->interview->description) !!}</label> <br><br> <br><br>
                    <label class="col-lg-12 col-form-label" for="name" style="text-align: center">Biodata</label> <br>
                    <label class="col-lg-3 col-form-label" for="name">Nama</label>
                    <label for="col-lg-9">:  {{ $sr->applicant->personal_identity->name}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="position">Jabatan</label>
                    <label for="col-lg-9">:  {{ $sr->applicant->job->position}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="dob">Tanggal Lahir</label>
                    <label for="col-lg-9">:  {{  Carbon\Carbon::parse($sr->applicant->personal_identity->dob)->isoFormat('D MMMM Y') }}</label> <br>
                    <label class="col-lg-3 col-form-label" for="gender">Jenis Kelamin</label>
                    <label for="col-lg-9">:  {{ $sr->applicant->personal_identity->gender->name}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="address">Alamat</label>
                    <label for="col-lg-9">:  {{ $sr->applicant->personal_identity->address}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="education">Pendidikan Terakhir</label>
                    <label for="col-lg-9">:  {{ $sr->applicant->personal_identity->education->name}}</label> <br>
                    <label class="col-lg-3 col-form-label" for="phone">No Telepon</label>
                    <label for="col-lg-9">:  {{ $sr->applicant->personal_identity->phone}}</label> <br>
                </div>
                <div class="modal-body">
                    <p>* Pas Foto</p>
                        <img src="{{ asset('storage/' .$sr->applicant->photo) }}" style="width:30%;height:40%" class="img-fluid">
                    <p>* Surat Lamaran</p>
                        <embed src="{{ asset('storage/' .$sr->applicant->application_letter) }}" type="application/pdf" width="100%" height="600px" />
                    <p>* Curriculum Vitae</p>
                        <embed src="{{ asset('storage/' .$sr->applicant->cv) }}" type="application/pdf" width="100%" height="600px" />
                    <p>* Ijazah</p>
                        <embed src="{{ asset('storage/' .$sr->applicant->certificate) }}" type="application/pdf" width="100%" height="600px" />
                    <p>* Transkrip Nilai</p>
                        <embed src="{{ asset('storage/' .$sr->applicant->transcript) }}" type="application/pdf" width="100%" height="600px" />
                    @if ($sr->applicant->str !== null)                        
                    <p>* STR</p>
                        <embed src="{{ asset('storage/' .$sr->applicant->str) }}" type="application/pdf" width="100%" height="600px" />
                    @endif
                    @if ($sr->applicant->document !== null)                        
                    <p>* Dokumen pendukung lainnya</p>
                        <embed src="{{ asset('storage/' .$sr->applicant->document) }}" type="application/pdf" width="100%" height="600px" />
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
