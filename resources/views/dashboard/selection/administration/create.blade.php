<form action="/administration/{{ $applicant->id }}/add" method="post" class="d-inline">
    @method('patch')
    @csrf
    <div class="modal fade modalcreate" id="modalcreate">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Seleksi Administrasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="radio" name="status" value="1"> Memenuhi Persyaratan<br>
                    <input type="radio" name="status" value="0"> Tidak Memenuhi<br>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>         
                <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">       
                <input type="hidden" name="user" value="{{ $applicant->personal_identity->user->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
    