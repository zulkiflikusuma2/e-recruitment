<div class="modal fade modaledit" id="modaledit{{ $sr->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <form action="/selectionresults/{{$sr->id}}" method="post" class="d-inline">
            @method('put')
            @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Ubah Hasil Seleksi</h5>
                   <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <input type="radio" name="status" value="1"> Lolos<br>
                   <input type="radio" name="status" value="0"> Tidak Lolos<br>
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
   