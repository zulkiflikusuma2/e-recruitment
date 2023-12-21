<div class="modal fade modalinterviewdetail" id="modalinterviewdetail{{ $applicant->id }}">
    <div class="modal-dialog  modal-dialog-centered">
            <form action="/history{{ $applicant->id }}" method="post" class="d-inline">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengumuman Seleksi Wawancara</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Selamat Anda Lolos Seleksi Wawancara!<br><br>
                    Agenda Penerimaan Pegawai akan dilaksanakan pada, <br>
                    Hari, tanggal : {{ Carbon\Carbon::parse($applicant->date)->isoFormat('dddd, D MMMM Y') }} <br>
                    Pukul        :  {{ Carbon\Carbon::parse($applicant->time)->format("G.i") }} <br>
                    Tempat/link  : {{ $applicant->location }} <br>
                    Ketentuan    : {!! $applicant->provision !!}
                    <br><br>
                    Silahkan melakukan konfirmasi kehadiran dibawah ini maksimal satu hari sebelum agenda penerimaan pegawai dilaksanakan, terima kasih.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    @if($applicant->attendance == null)
                    <a href="/history/{{ $applicant->id }}/resultconfirm" class="btn btn-primary" data-toggle="modal" data-target="#modalresultconfirm{{ $applicant->id }}">Konfirmasi Kehadiran</a>
                    @else
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Konfirmasi berhasil</button>
                    @endif
                </div>
            </div>
        </form>
        </div>
    </div>


  