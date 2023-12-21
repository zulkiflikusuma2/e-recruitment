<div class="modal fade modalshow" id="modalshow{{$message->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/messages/{{$message->id}}" method="post" class="d-inline">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $message->name) }}" readonly>
                </div>
                <div class="modal-body">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $message->email) }}" readonly>
                </div>
                <div class="modal-body">
                    <label for="subject" class="form-label">Subjek</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" required value="{{ old('subject', $message->subject) }}" readonly>
                </div>
                <div class="modal-body">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" required rows="5" readonly> {{  $message->message }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
