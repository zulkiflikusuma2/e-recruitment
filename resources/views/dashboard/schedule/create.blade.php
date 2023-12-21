<div class="modal fade modalcreate" id="modalcreate">
  <div class="modal-dialog modal-dialog-centered">
      <form action="/schedules" method="post" class="d-inline" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Tambah Agenda Seleksi</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <label for="job_id" class="form-label">Jabatan</label>
                <select class="form-control @error('job_id') is-invalid @enderror" name="job_id" id="job_id"  required >
                    <option disabled selected>Pilih</option>
                    @foreach ($jobs as $job)
                      @if (old('job_id') == $job->id)
                        <option value="{{ $job->id }}" selected>{{ $job->position }}</option>  
                      @else    
                        <option value="{{ $job->id }}">{{ $job->position }}</option>  
                      @endif
                    @endforeach
                  </select>
            </div>
            <div class="modal-body">
                <label for="selection_id" class="form-label">Jenis Seleksi</label>
                <select class="form-control @error('selection_id') is-invalid @enderror" name="selection_id" id="selection_id"  required >
                    <option disabled selected>Pilih</option>
                    @foreach ($selections as $selection)
                      @if (old('selection_id') == $selection->id)
                        <option value="{{ $selection->id }}" selected>{{ $selection->name }}</option>  
                      @else    
                        <option value="{{ $selection->id }}">{{ $selection->name }}</option>  
                      @endif
                    @endforeach
                  </select>
            </div>              
              <div class="modal-body">
                  <label for="location" class="form-label">Tempat/Link Tes</label>
                  <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required autofocus value="{{ old('location') }}">
                  @error('location')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="modal-body">
                <label for="date" class="form-label">Tanggal Tes</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="modal-body">
                <label for="time" class="form-label">Waktu Tes</label>
                <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" required value="{{ old('time') }}">
                @error('time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>            
              <div class="modal-body">
                  <label for="provisionschedule" class="form-label">Ketentuan</label> <br>
                  @error('provisionschedule')
                      <p class="text-danger"> {{ $message }} </p>
                  @enderror
                  {{-- <input id="provisionschedule" type="hidden" name="provision" value="{{ old('provision') }}">
                  <trix-editor input="provisionschedule"></trix-editor> --}}
                  <textarea class="form-control @error('provision') is-invalid @enderror" name="provision" id="provision" cols="64" rows="5">{{ old('provision')}}</textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </div>
      </form>
  </div>
</div>
  
