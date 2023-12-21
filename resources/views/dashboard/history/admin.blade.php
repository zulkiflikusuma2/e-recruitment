<div class="modal fade modaladmindetail" id="modaladmindetail{{ $applicant->id }}">
    <div class="modal-dialog  modal-dialog-centered">
        <form action="/history{{ $applicant->id }}" method="post" class="d-inline">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengumuman Seleksi Administrasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Selamat Anda Lolos Seleksi Administrasi!<br><br>
                    Agenda Psikotes akan dilaksanakan pada, <br>
                    Hari, tanggal :
                    {{ Carbon\Carbon::parse($applicant->writtentest->schedule->date)->isoFormat('D MMMM Y') }} <br>
                    Pukul : {{ Carbon\Carbon::parse($applicant->writtentest->schedule->time)->format('G.i') }} <br>
                    Tempat/link : {{ $applicant->writtentest->schedule->location }} <br>
                    Ketentuan : {{ $applicant->writtentest->schedule->provision }}
                    <br><br>
                    Silahkan melakukan konfirmasi kehadiran dibawah ini maksimal satu hari sebelum Psikotes
                    dilaksanakan, terima kasih.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    @if ($applicant->writtentest->attendance == null)
                        <a href="/history/{{ $applicant->id }}/writtenconfirm" class="btn btn-primary"
                            data-toggle="modal" data-target="#modalwrittenconfirm{{ $applicant->id }}">Konfirmasi
                            Kehadiran</a>
                    @else
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Konfirmasi berhasil</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
