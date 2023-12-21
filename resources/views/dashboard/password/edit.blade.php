@extends('dashboard.layouts.main')
@section('title', 'Password | CBI')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('password.edit') }}">Ubah Password</a></li>
@endsection
@section('container')
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold text-primary" style="text-align: center">Ubah Password</h4>
        </div>
    </div>
    @foreach ($users as $user)
        <div class="form-validation justify-content-center d-flex">
            <form class="form-valide" action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <input type="password" name="current_password"
                        class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                        placeholder="password" required>
                    {{-- <span toggle="#current_password" class="fa fa-eye toggle-password"></span> --}}
                    @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password-field" placeholder="password baru" required>
                    {{-- <span toggle="#password-field" class="fa fa-eye toggle-password"></span> --}}
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                        placeholder="konfirmasi password" required>
                    {{-- <span toggle="#password_confirmation" class="fa fa-eye toggle-password"></span> --}}
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-lg-9 ml-auto">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
{{-- @section('scripts')

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');
  
  name.addEventListener('change', function(){
    fetch('/profile/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
  
  
</script>

@endsection --}}
