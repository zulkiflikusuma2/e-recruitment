<div class="modal fade modalwrittendetail" id="modalwrittendetail{{ $applicant->id }}">
    <div class="modal-dialog  modal-dialog-centered">
        <form action="/history{{ $applicant->id }}" method="post" class="d-inline">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengumuman Seleksi Psikotes</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Selamat Anda Lolos Seleksi Psikotes!<br><br>
                    Agenda Tes Praktik akan dilaksanakan pada, <br>
                    Hari, tanggal :
                    {{ Carbon\Carbon::parse($applicant->practicetest->schedule->date)->isoFormat('dddd, D MMMM Y') }}
                    <br>
                    Pukul : {{ Carbon\Carbon::parse($applicant->practicetest->schedule->time)->format('G.i') }} <br>
                    Tempat/link : {{ $applicant->practicetest->schedule->location }} <br>
                    Ketentuan : {{ $applicant->practicetest->schedule->provision }}
                    <br><br>
                    Silahkan melakukan konfirmasi kehadiran maksimal satu hari sebelum tes praktik dilaksanakan, terima
                    kasih.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    @if ($applicant->practicetest->attendance == null)
                        <a href="/history/{{ $applicant->id }}/practiceconfirm" class="btn btn-primary"
                            data-toggle="modal" data-target="#modalpracticeconfirm{{ $applicant->id }}">Konfirmasi
                            Kehadiran</a>
                    @else
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Konfirmasi berhasil</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
