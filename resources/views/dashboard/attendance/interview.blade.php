<div class="modal fade modalinterviewconfirm" id="modalinterviewconfirm{{ $applicant->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
            <form action="/history/{{ $applicant->id }}/interviewconfirm" method="post" class="d-inline">
                @method('patch')
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Kehadiran Seleksi Wawancara</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="radio" name="attendance" value="1"> Hadir<br>
                    <input type="radio" name="attendance" value="0"> Tidak Hadir<br>
                    @error('attendance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>         
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
            
        </div>
    </div>