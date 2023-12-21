<div class="modal fade modaledit" id="modaledit{{ $applicant->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/interview/{{$applicant->id}}" method="post" class="d-inline">
            @method('put')
            @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Seleksi Wawancara</h5>
                   <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                <label for="score" class="form-label">Skor</label>
                <input type="score" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ old('score', $applicant->score)}}">
                @error('score')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
               </div>
               <div class="modal-body">
                    <label for="status" class="form-label">Status</label><br>
                    <input type="radio" name="status" value="1" @if ($applicant->status == '1') checked @endif> Memenuhi<br>
                    <input type="radio" name="status" value="0" @if ($applicant->status == '0') checked @endif> Tidak Memenuhi<br>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>              
                <div class="modal-body">
                    <label for="description" class="form-label">Keterangan</label><br>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="64" rows="5">{{ old('description', $applicant->description)}}</textarea>
                    {{-- <input id="description" type="hidden" name="description" value="{{ $applicant->description }}" />
                    <trix-editor input="description"></trix-editor> --}}
                    @error('description')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                {{-- <div class="mb-4" wire:model.debounce.365ms="isikonten" wire:ignore>
                    <label for="formCatname" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <input id="desc" value="{{ $this->isikonten}}" type="hidden" name="isikonten">
                    <trix-editor input="desc"></trix-editor>
                    @error('isikonten') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div> --}}

               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                   <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
           </div>
        </form>
    </div>
</div>
   