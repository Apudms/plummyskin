@extends('distributor.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
@endsection

@section('container')
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
  
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
  
            <div class="card-body">
              <form class="form form-vertical" action="/distributor/akun-saya/{{ auth('distributor')->user()->id }}" method="post">
                @method('put')
                @csrf
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="namaDepan">Nama Depan</label>
                        <input type="namaDepan" @error('namaDepan') is-invalid @enderror id="namaDepan" class="form-control" name="namaDepan"
                        placeholder="Nama Depan" required value="{{ old('namaDepan', auth('distributor')->user()->namaDepan) }}">
                      </div>
                      <div class="form-group">
                        <label for="namaBelakang">Nama Belakang</label>
                        <input type="namaBelakang" @error('namaBelakang') is-invalid @enderror id="namaBelakang" class="form-control" name="namaBelakang"
                        placeholder="Nama Belakang (Opsi)" value="{{ old('namaBelakang', auth('distributor')->user()->namaBelakang) }}">
                      </div>
                      <div class="form-group">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="tempatLahir" @error('tempatLahir') is-invalid @enderror id="tempatLahir" class="form-control" name="tempatLahir"
                        placeholder="Tempat Lahir (Opsi)" value="{{ old('tempatLahir', auth('distributor')->user()->tempatLahir) }}">
                      </div>
                      <div class="form-group">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                        <input type="tanggalLahir" @error('tanggalLahir') is-invalid @enderror id="tanggalLahir" class="form-control" name="tanggalLahir"
                        placeholder="Tanggal Lahir (Opsi)" value="{{ old('tanggalLahir', auth('distributor')->user()->tanggalLahir) }}">
                      </div>
                      <div class="form-group">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <fieldset class="form-group">
                          <select class="form-select" id="jenisKelamin" name="jenisKelamin">
                            @if (auth('distributor')->user()->jenisKelamin == "Laki-laki")
                              <option value="Laki-laki" selected>Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            @else
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan" selected>Perempuan</option>
                            @endif
                          </select>
                        </fieldset>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="alamat" @error('alamat') is-invalid @enderror id="alamat" class="form-control" name="alamat"
                        placeholder="Alamat (Opsi)" value="{{ old('alamat', auth('distributor')->user()->alamat) }}">
                      </div>
                      <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="provinsi" @error('provinsi') is-invalid @enderror id="provinsi" class="form-control" name="provinsi"
                        placeholder="Provinsi (Opsi)" value="{{ old('provinsi', auth('distributor')->user()->provinsi) }}">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="bank">Bank</label>
                        <fieldset class="form-group">
                          <select class="form-select" id="bank" name="bank">
                            @if (auth('distributor')->user()->bank == "BCA")
                              <option value="BCA" selected>BCA</option>
                              <option value="BNI">BNI</option>
                              <option value="BRI">BRI</option>
                              <option value="Mandiri">Mandiri</option>
                            @elseif (auth('distributor')->user()->bank == "BNI")
                              <option value="BCA">BCA</option>
                              <option value="BNI" selected>BNI</option>
                              <option value="BRI">BRI</option>
                              <option value="Mandiri">Mandiri</option>
                            @elseif (auth('distributor')->user()->bank == "BRI")
                              <option value="BCA">BCA</option>
                              <option value="BNI">BNI</option>
                              <option value="BRI" selected>BRI</option>
                              <option value="Mandiri">Mandiri</option>
                            @elseif (auth('distributor')->user()->bank == "Mandiri")
                              <option value="BCA">BCA</option>
                              <option value="BNI">BNI</option>
                              <option value="BRI">BRI</option>
                              <option value="Mandiri" selected>Mandiri</option>
                            @endif
                          </select>
                        </fieldset>
                      </div>
                      <div class="form-group">
                        <label for="noRek">No. Rekening</label>
                        <input type="noRek" @error('noRek') is-invalid @enderror id="noRek" class="form-control" name="noRek"
                        placeholder="No. Rekening" required value="{{ old('noRek', auth('distributor')->user()->noRek) }}">
                      </div>
                      <div class="form-group">
                        <label for="noTelp">No. Telepon</label>
                        <input type="noTelp" @error('noTelp') is-invalid @enderror id="noTelp" class="form-control" name="noTelp"
                        placeholder="No. Telepon" required value="{{ old('noTelp', auth('distributor')->user()->noTelp) }}">
                      </div>
                      <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input type="wilayah" @error('wilayah') is-invalid @enderror id="wilayah" class="form-control" name="wilayah"
                        placeholder="Wilayah" disabled value="{{ old('wilayah', auth('distributor')->user()->wilayah) }}">
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="slug" @error('slug') is-invalid @enderror id="slug" class="form-control" name="slug"
                        placeholder="slug" disabled value="{{ old('slug', auth('distributor')->user()->slug) }}">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" @error('email') is-invalid @enderror id="email" class="form-control" name="email"
                        placeholder="Email" required value="{{ old('email', auth('distributor')->user()->email) }}">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password"
                          placeholder="Password" required value="{{ old('password', auth('distributor')->user()->password) }}">
                      </div>
                    </div>

                    <div class="col-12 mt-4">
                      <button type="submit" class="btn btn-warning text-dark float-end"><i class="fas fa-edit me-2"></i>Ubah</button>
                    </div>
                    
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