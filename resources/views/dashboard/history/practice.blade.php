<div class="modal fade modalpracticedetail" id="modalpracticedetail{{ $applicant->id }}">
    <div class="modal-dialog  modal-dialog-centered">
            <form action="/history{{ $applicant->id }}" method="post" class="d-inline">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengumuman Seleksi Praktik</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Selamat Anda Lolos Seleksi Praktik!<br><br>
                    Agenda Wawancara akan dilaksanakan pada, <br>
                    Hari, tanggal : {{ Carbon\Carbon::parse($applicant->interview->schedule->date)->isoFormat('dddd, D MMMM Y') }} <br>
                    Pukul        :  {{ Carbon\Carbon::parse($applicant->interview->schedule->time)->format("G.i") }} <br>
                    Tempat/link  : {{ $applicant->interview->schedule->location }} <br>
                    Ketentuan    : {{ $applicant->interview->schedule->provision }}
                    <br><br>
                    Silahkan melakukan konfirmasi kehadiran dibawah ini maksimal satu hari sebelum tes wawancara dilaksanakan, terima kasih.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    @if($applicant->interview->attendance == null)
                        <a href="/history/{{ $applicant->id }}/interviewconfirm" class="btn btn-primary" data-toggle="modal" data-target="#modalinterviewconfirm{{ $applicant->id }}">Konfirmasi Kehadiran</a>
                    @else
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Konfirmasi berhasil</button>
                    @endif
                </div>
            </div>
        </form>
        </div>
    </div>


  