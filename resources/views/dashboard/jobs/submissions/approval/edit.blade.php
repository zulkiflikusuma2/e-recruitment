<div class="modal fade" id="modaleditapproval{{$job->slug}}" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1080;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <form action="/submissionsapproval/{{ $job->slug }}" method="POST" enctype="multipart/form-data" class="d-inline">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Persetujuan Lowongan {{$job->position}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="status" class="form-label">Status</label><br>
                    <input type="radio" name="approval" value="1"> Setuju<br>
                    <input type="radio" name="approval" value="0"> Revisi<br>
                    <label for="description" class="form-label">Keterangan</label><br>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="64" rows="5">{{ old('description')}}</textarea>
                    @error('description')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>