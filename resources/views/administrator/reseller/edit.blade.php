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
              <form class="form" action="/admin/reseller/{{ $reseller->id }}" method="post">
                @method('put')
                @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="namaDepan">Nama Depan</label>
                      <input type="text" @error('namaDepan') is-invalid @enderror id="namaDepan" class="form-control" placeholder="Nama Lengkap"
                        name="namaDepan" required value="{{ old('namaDepan', $reseller->namaDepan) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="namaBelakang">Nama Belakang</label>
                      <input type="text" @error('namaBelakang') is-invalid @enderror id="namaBelakang" class="form-control" placeholder="Nama Lengkap"
                        name="namaBelakang" required value="{{ old('namaBelakang', $reseller->namaBelakang) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="jenisKelamin">Jenis Kelamin</label>
                      <fieldset class="form-group">
                        <select class="form-select" id="jenisKelamin" name="jenisKelamin">
                          @if ($reseller->jenisKelamin == "Laki-laki")
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
                      <label for="tempatLahir">Tempat Lahir</label>
                      <input type="text" @error('tempatLahir') is-invalid @enderror id="tempatLahir" class="form-control" placeholder="Tempat Lahir"
                        name="tempatLahir" required value="{{ old('tempatLahir', $reseller->tempatLahir) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="tanggalLahir">Tanggal Lahir</label>
                      <input type="text" @error('tanggalLahir') is-invalid @enderror id="tanggalLahir" class="form-control" placeholder="Tanggal Lahir"
                        name="tanggalLahir" required value="{{ old('tanggalLahir', $reseller->tanggalLahir) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="distributor_id">Distributor</label>
                      <fieldset class="form-group">
                        <select class="form-select" id="distributor_id" name="distributor_id" >
                          @foreach ($distributors as $distributor)
                            @if (old('distributor_id', $reseller->distributor_id) === $distributor->id)
                              <option value="{{ $distributor->id }}" selected>{{ $distributor->wilayah }}</option>
                            @else
                              <option value="{{ $distributor->id }}">{{ $distributor->wilayah }}</option>
                            @endif
                          @endforeach
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" @error('alamat') is-invalid @enderror id="alamat" class="form-control" placeholder="Alamat"
                        name="alamat" required value="{{ old('alamat', $reseller->alamat) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="noTelp">Nomor Telepon</label>
                      <input type="text" @error('noTelp') is-invalid @enderror id="noTelp" class="form-control" placeholder="Nomor Telepon"
                        name="noTelp" required value="{{ old('noTelp', $reseller->noTelp) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" @error('email') is-invalid @enderror id="email" class="form-control" name="email"
                      placeholder="Email" required value="{{ old('email', $reseller->email) }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" @error('password') is-invalid @enderror id="password" class="form-control" placeholder="Password"
                        name="password" required value="{{ old('password', $reseller->password) }}">
                    </div>
                  </div>
                  <div class="col-12 mt-4">
                    <a href="/admin/reseller" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Batal</a>
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