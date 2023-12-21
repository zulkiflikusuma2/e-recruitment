<div class="modal fade modaledit" id="modaledit{{ $applicant->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <form action="/practicetest/{{$applicant->id}}" method="post" class="d-inline">
            @method('put')
            @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">{{ $applicant->applicant->personal_identity->name }}</h5>
                   <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                <label for="score" class="form-label">Skor</label>
                <input type="score" class="form-control @error('score') is-invalid @enderror" id="score" name="score" required value="{{ old('score', $applicant->score)}}">
                @error('score')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
               </div>
               <div class="modal-body">
                    <label for="status" class="form-label">Keterangan</label><br>
                   <input type="radio" name="status" value="1" @if ($applicant->status == '1') checked @endif> Memenuhi<br>
                   <input type="radio" name="status" value="0" @if ($applicant->status == '0') checked @endif> Tidak Memenuhi<br>
                   @error('status')
                       <div class="invalid-feedback">
                           {{ $message }}
                       </div>
                   @enderror
               </div>            
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                   <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
           </div>
        </form>
    </div>
</div>
   