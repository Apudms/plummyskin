@extends('administrator.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
@endsection

@section('container')
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <form class="form" action="/admin/distributors/{{ $distributor->id }}" method="post">
                @method('put')
                @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="namaDepan">Nama Depan</label>
                      <input type="text" @error('namaDepan') is-invalid @enderror id="namaDepan" class="form-control" placeholder="Nama Depan"
                        name="namaDepan" required value="{{ old('namaDepan', $distributor->namaDepan) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="namaBelakang">Nama Belakan</label>
                      <input type="text" @error('namaBelakang') is-invalid @enderror id="namaBelakang" class="form-control" placeholder="Nama Belakang"
                        name="namaBelakang" required value="{{ old('namaBelakang', $distributor->namaBelakang) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="tempatLahir">Tempat Lahir</label>
                      <input type="text" @error('tempatLahir') is-invalid @enderror id="tempatLahir" class="form-control" placeholder="Tempat Lahir"
                        name="tempatLahir" required value="{{ old('tempatLahir', $distributor->tempatLahir) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="tanggalLahir">Tanggal Lahir</label>
                      <input type="text" @error('tanggalLahir') is-invalid @enderror id="tanggalLahir" class="form-control" placeholder="Tanggal Lahir"
                        name="tanggalLahir" required value="{{ old('tanggalLahir', $distributor->tanggalLahir) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="jenisKelamin">Jenis Kelamin</label>
                      <fieldset class="form-group">
                        <select class="form-select" id="jenisKelamin" name="jenisKelamin">
                          @if ($distributor->jenisKelamin == "Laki-laki")
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          @else
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                          @endif
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" @error('alamat') is-invalid @enderror id="alamat" class="form-control" placeholder="Alamat"
                        name="alamat" required value="{{ old('alamat', $distributor->alamat) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="provinsi">Provinsi</label>
                      <input type="text" @error('provinsi') is-invalid @enderror id="provinsi" class="form-control" placeholder="Provinsi"
                        name="provinsi" required value="{{ old('provinsi', $distributor->provinsi) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="wilayah">Wilayah</label>
                      <input type="text" @error('wilayah') is-invalid @enderror id="wilayah" class="form-control" placeholder="Wilayah"
                        name="wilayah" required value="{{ old('wilayah', $distributor->wilayah) }}">
                      @error('wilayah')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="noTelp">Nomor Telepon</label>
                      <input type="text" @error('noTelp') is-invalid @enderror id="noTelp" class="form-control" placeholder="Nomor Telepon"
                        name="noTelp" required value="{{ old('noTelp', $distributor->noTelp) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" @error('email') is-invalid @enderror id="email" class="form-control" name="email"
                      placeholder="Email" required value="{{ old('email', $distributor->email) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" @error('password') is-invalid @enderror id="password" class="form-control" placeholder="Password"
                        name="password" required value="{{ old('password', $distributor->password) }}">
                    </div>
                  </div>
                  <div class="col-12 mt-4">
                    <a href="/admin/distributors" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Batal</a>
                    <button type="submit" class="btn btn-warning text-dark float-end"><i class="fas fa-edit me-2"></i>Ubah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection