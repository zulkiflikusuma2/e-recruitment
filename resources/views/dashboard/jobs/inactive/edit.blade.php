<div class="modal fade" id="modaledit{{$job->slug}}">
    <div class="modal-dialog modal-lg">
        <form action="/inactivevacancies/{{ $job->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Lowongan {{ $job->position }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="Position" class="form-label">Jabatan</label>
                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" required autofocus value="{{ old('position', $job->position) }}">
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
                    {{-- <input id="requirement" type="hidden" name="requirement" value="{{ old('requirement', $job->requirement) }}">
                    <trix-editor input="requirement"></trix-editor> --}}
                    <textarea class="form-control @error('requirement') is-invalid @enderror" name="requirement" id="requirement" cols="106" rows="8">{{ $job->requirement}}</textarea>
                </div>
                <div class="modal-body">
                    <label for="attachment" class="form-label">Berkas Kelengkapan</label><br>
                    @error('attachment')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    <textarea class="form-control @error('attachment') is-invalid @enderror" name="attachment" id="attachment" cols="106" rows="5">{{ old('attachment', $job->attachment)}}</textarea>
                </div>
                <div class="modal-body">
                    <label for="close_date" class="form-label">Tanggal Tutup</label>
                    <input type="date" class="form-control @error('close_date') is-invalid @enderror" id="close_date" name="close_date" required autofocus value="{{ old('close_date', (Carbon\Carbon::parse($job->close_date)->format("Y-m-d"))) }}">
                    @error('close_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="announ_date" class="form-label">Tanggal Pengumuman</label>
                    <input type="date" class="form-control @error('announ_date') is-invalid @enderror" id="announ_date" name="announ_date" required autofocus value="{{ old('announ_date', (Carbon\Carbon::parse($job->announ_date)->format("Y-m-d"))) }}">
                    @error('announ_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="modal-body">
                    <label for="attachment" class="form-label">Berkas Kelengkapan</label><br>     
                    <div class="row">
                        <div class="col-lg-6"> 
                            <input type="checkbox" name="attachment[]" value="Curiculum vitae" @if ($job->attachment == "Curiculum vitae") checked @endif>
                            <label for="attachment">Curiculum vitae</label><br>
                            <input type="checkbox" name="attachment[]" value="Surat lamaran" @if ($job->attachment == "Surat lamaran") checked @endif>
                            <label for="attachment">Surat lamaran</label><br>
                            <input type="checkbox" name="attachment[]" value="Pas foto berwarna" @if ($job->attachment == "Pas foto berwarna") checked @endif>
                            <label for="attachment">Pas foto berwarna</label><br>
                            <input type="checkbox" name="attachment[]" value="Foto KTP" @if ($job->attachment == "Foto KTP") checked @endif>
                            <label for="attachment">Foto KTP</label><br>
                            <input type="checkbox" name="attachment[]" value="Foto KTA IDI" @if ($job->attachment == "Foto KTA IDI") checked @endif>
                            <label for="attachment">Foto KTA IDI</label><br>
                            <input type="checkbox" name="attachment[]" value="Foto KTA Satpam" @if ($job->attachment == "Foto KTA Satpam") checked @endif>
                            <label for="attachment">Foto KTA Satpam</label><br>
                            <input type="checkbox" name="attachment[]" value="Ijazah Legalisir" @if ($job->attachment == "Ijazah Legalisir") checked @endif>
                            <label for="attachment">Ijazah Legalisir</label><br>
                            <input type="checkbox" name="attachment[]" value="Transkip nilai" @if (old('attachment', $job->attachment == "Transkip nilai")) checked @endif>
                            <label for="attachment">Transkip nilai</label><br>
                        </div>
                        <div class="col-lg-6">
                            <input type="checkbox" name="attachment[]" value="STR Legalisir" @if ($job->attachment == "STR Legalisir") checked @endif>
                            <label for="attachment">STR Legalisir</label><br>
                            <input type="checkbox" name="attachment[]" value="Scan KK" @if ($job->attachment == "Scan KK") checked @endif>
                            <label for="attachment">Scan KK</label><br>
                            <input type="checkbox" name="attachment[]" value="Scan SKCK" @if ($job->attachment == "Scan SKCK") checked @endif>
                            <label for="attachment">Scan SKCK</label><br>
                            <input type="checkbox" name="attachment[]" value="Surat keterangan sehat" @if ($job->attachment == "Foto") checked @endif>
                            <label for="attachment">Surat keterangan sehat</label><br>
                            <input type="checkbox" name="attachment[]" value="Sertifikat vaksin dosis 1 & 2" @if ($job->attachment == "Sertifikat vaksin dosis 1 & 2") checked @endif>
                            <label for="attachment">Sertifikat vaksin dosis 1 & 2</label><br>
                            <input type="checkbox" name="attachment[]" value="Sertifikat Pelatihan Satpam Garda Pratama" @if ($job->attachment == "Sertifikat Pelatihan Satpam Garda Pratama") checked @endif>
                            <label for="attachment">Sertifikat Pelatihan Satpam Garda Pratama</label><br>
                            <input type="checkbox" name="attachment[]" value="dan sertifikat pendukung lainnya" @if ($job->attachment == "dan sertifikat pendukung lainnya") checked @endif>
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
<script>
    const position = document.querySelector('#position');
    const slug = document.querySelector('#slug');

    position.addEventListener('change', function(){
        fetch('/inactivevacancies/checkSlug?position=' + position.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })
</script>