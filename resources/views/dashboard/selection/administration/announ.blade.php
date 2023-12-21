<div class="modal fade modalannoun" id="modalannoun">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pengumuman Seleksi Administrasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="schedule_id" class="form-label">Jadwal Seleksi Tertulis</label>
                <select class="form-control @error('schedule_id') is-invalid @enderror" name="schedule_id" id="schedule_id" required>
                    <option selected disabled>Pilih</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}">{{ $schedule->job->position }} - {{  Carbon\Carbon::parse($schedule->date)->isoFormat('D MMMM Y') }} ({{ Carbon\Carbon::parse($schedule->time)->format("G.i") }})</option>
                    @endforeach
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="action" value="accepted">Kirim</button>
            </div>
        </div>
    </div>
</div>
