<div class="modal fade modalshow" id="modalshow{{$job->slug}}">
    <div class="modal-dialog modal-lg">
            <form action="/activevacancies/{{$job->slug}}" method="post" class="d-inline">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Lowongan {{ $job->position }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-justify" >
                    <div class="form-group row">
                        <label class="col-lg-7 col-form-label" for="name">Kualifikasi: <br>{!! nl2br($job->requirement) !!}</label>
                        <label for="col-lg-5">Berkas Kelengkapan: <br>{!! nl2br($job->attachment) !!}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 col-form-label">
                        Pendaftaran berakhir pada {{  Carbon\Carbon::parse($job->close_date)->isoFormat('dddd, D MMMM Y') }}    
                        </label>   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

