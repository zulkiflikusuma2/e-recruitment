<form action="{{ route('apply.store') }}" method="post" class="d-inline" enctype="multipart/form-data">
    @csrf
    <div class="modal fade modalcreate" id="modalcreate">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Berkas Pendaftaran {{ $job->position }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="application_letter" class="form-label">* Surat Lamaran (PDF max 5 MB)</label>
                    <input type="file" class="form-control @error('application_letter') is-invalid @enderror"
                        required id="application_letter" name="application_letter">
                    @error('application_letter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="cv" class="form-label">* Curricum Vitae (PDF max 5 MB)</label>
                    <input type="file" class="form-control @error('cv') is-invalid @enderror" required id="cv"
                        name="cv">
                    @error('cv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="photo" class="form-label">* Pas Foto (.jpeg/jpg max 1 MB)</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" required
                        id="photo" name="photo">
                    @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="certificate" class="form-label">* Ijazah (PDF max 5 MB)</label>
                    <input type="file" class="form-control @error('certificate') is-invalid @enderror" required
                        id="certificate" name="certificate">
                    @error('certificate')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="transcript" class="form-label">* Transkrip Nilai (PDF max 5 MB)</label>
                    <input type="file" class="form-control @error('transcript') is-invalid @enderror" required
                        id="transcript" name="transcript">
                    @error('transcript')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="document" class="form-label">Dokumen Pelengkap (PDF max 5 MB)</label>
                    <input type="file" class="form-control @error('document') is-invalid @enderror" id="document"
                        name="document">
                    @error('document')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                @foreach ($identity as $i)
                    <input type="hidden" name="personal_identity_id" value="{{ $i->id }}">
                @endforeach
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim lamaran</button>
                </div>
            </div>
        </div>
    </div>
</form>
