<div class="modal fade" id="modaldelete{{$job->slug}}" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1080;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <form action="/inactivevacancies/{{ $job->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">						
                    <h4 class="modal-title w-100">Konfirmasi Hapus</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>