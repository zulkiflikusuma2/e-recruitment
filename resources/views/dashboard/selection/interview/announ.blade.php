    <div class="modal fade modalannoun" id="modalannoun">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pengumuman Seleksi Wawancara</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="date" class="form-label">Tanggal Penerimaan</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="time" class="form-label">Waktu Penerimaan</label>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" autofocus value="{{ old('time') }}">
                        @error('time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="location" class="form-label">Tempat</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" autofocus value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="provision" class="form-label">Ketentuan</label><br>
                        @error('provision')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                        {{-- <input id="provision" type="hidden" name="provision" value="{{ old('provision') }}">
                        <trix-editor input="provision"></trix-editor> --}}
                        <textarea class="form-control @error('provision') is-invalid @enderror" name="provision" id="provision" cols="64" rows="5">{{ old('provision')}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="action" value="accepted">Kirim</button>
                    </div>
                </div>
            </div>
        </div>