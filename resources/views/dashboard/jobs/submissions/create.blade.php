<div class="modal fade modalcreate" id="modalcreate">
    <div class="modal-dialog modal-lg">
        <form action="/submissions" method="post" class="d-inline">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="position" class="form-label">Jabatan</label>
                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                        name="position" required autofocus value="{{ old('position') }}">
                    @error('position')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="slug" id="slug">
                <div class="modal-body">
                    <label for="requirement" class="form-label">Kualifikasi</label><br>
                    @error('requirement')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    {{-- <input id="requirement" type="hidden" name="requirement" value="{{ old('requirement') }}">
                    <trix-editor input="requirement"></trix-editor> --}}
                    <textarea class="form-control @error('requirement') is-invalid @enderror" name="requirement" id="requirement"
                        cols="106" rows="8">{{ old('requirement') }}</textarea>
                </div>
                <div class="modal-body">
                    <label for="attachment" class="form-label">Berkas Kelengkapan</label><br>
                    @error('attachment')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    <textarea class="form-control @error('attachment') is-invalid @enderror" name="attachment" id="attachment"
                        cols="106" rows="5">{{ old('attachment') }}</textarea>
                </div>
                <div class="modal-body">
                    <label for="close_date" class="form-label">Tanggal Tutup</label>
                    <input type="date" class="form-control @error('close_date') is-invalid @enderror" id="close_date"
                        name="close_date" required value="{{ old('close_date') }}">
                    @error('close_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="announ_date" class="form-label">Tanggal Pengumuman</label>
                    <input type="date" class="form-control @error('announ_date') is-invalid @enderror"
                        id="announ_date" name="announ_date" required value="{{ old('announ_date') }}">
                    @error('announ_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="modal-body">
                    <label for="attach_id" class="form-label">Berkas Kelengkapan</label><br>     
                    <div class="row">
                        @foreach ($attachments as $attach)
                        @if (old('attach_id') == $attach->id)
                          <input type="checkbox" name="attach_id[]" value="{{ $attach->id }}" selected>
                          <label for="attach_id">{{ $attach->name }}</label><br>
                        @else    
                        <input type="checkbox" name="attach_id[]" value="{{ $attach->id }}">
                        <label for="attach_id">{{ $attach->name }}</label><br>
                        @endif
                      @endforeach
                    </div>
                </div> --}}
                {{-- <div class="modal-body">
                    <label for="attachment" class="form-label">Berkas Kelengkapan</label><br>     
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="checkbox" name="attachment[]" value="Curiculum vitae">
                            <label for="attachment">Curiculum vitae</label><br>
                            <input type="checkbox" name="attachment[]" value="Surat lamaran">
                            <label for="attachment">Surat lamaran</label><br>
                            <input type="checkbox" name="attachment[]" value="Pas foto berwarna">
                            <label for="attachment">Pas foto berwarna</label><br>
                            <input type="checkbox" name="attachment[]" value="Foto KTP">
                            <label for="attachment">Foto KTP</label><br>
                            <input type="checkbox" name="attachment[]" value="Foto KTA IDI">
                            <label for="attachment">Foto KTA IDI</label><br>
                            <input type="checkbox" name="attachment[]" value="Foto KTA Satpam">
                            <label for="attachment">Foto KTA Satpam</label><br>
                            <input type="checkbox" name="attachment[]" value="Ijazah Legalisir">
                            <label for="attachment">Ijazah Legalisir</label><br>
                            <input type="checkbox" name="attachment[]" value="Transkip nilai">
                            <label for="attachment">Transkip nilai</label><br>
                        </div>
                        <div class="col-lg-6">
                            <input type="checkbox" name="attachment[]" value="STR Legalisir">
                            <label for="attachment">STR Legalisir</label><br>
                            <input type="checkbox" name="attachment[]" value="Scan KK">
                            <label for="attachment">Scan KK</label><br>
                            <input type="checkbox" name="attachment[]" value="Scan SKCK">
                            <label for="attachment">Scan SKCK</label><br>
                            <input type="checkbox" name="attachment[]" value="Surat keterangan sehat">
                            <label for="attachment">Surat keterangan sehat</label><br>
                            <input type="checkbox" name="attachment[]" value="Sertifikat vaksin dosis 1 & 2">
                            <label for="attachment">Sertifikat vaksin dosis 1 & 2</label><br>
                            <input type="checkbox" name="attachment[]" value="Sertifikat Pelatihan Satpam Garda Pratama">
                            <label for="attachment">Sertifikat Pelatihan Satpam Garda Pratama</label><br>
                            <input type="checkbox" name="attachment[]" value="dan sertifikat pendukung lainnya">
                            <label for="attachment">dan sertifikat pendukung lainnya</label><br>
                        </div>
                    </div>  
                </div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
