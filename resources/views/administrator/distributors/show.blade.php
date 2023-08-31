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
              <form class="form form-horizontal">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-3">
                      <label>Nama</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->namaDepan }} {{ $distributor->namaBelakang }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>No Telepon</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->noTelp }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Email</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->email }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Password</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->password }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Tempat Lahir</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->tempatLahir }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Tanggal Lahir</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->tanggalLahir }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Jenis Kelamin</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->jenisKelamin }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Alamat</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->alamat }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Provinsi</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->provinsi }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Bergabung Sejak</label>
                    </div>
                    <div class="col-md-9 form-group">
                      {{-- <label class="text-bold-500">: <b>{{ $distributor->created_at->format('d F Y') }}</b></label> --}}
                    </div>
                    <div class="col-md-3">
                      <label>Wilayah</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->wilayah }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Jumlah Reseller</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $distributor->reseller->count('distributor_id') }}</b></label>
                    </div>
                    <div class="col-12 d-flex justify-content-start mt-4">
                      <a href="/admin/distributors" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-lg-2"></i>Kembali</a>
                      {{-- <a href="/admin/distributor/ubah-distributor" class="btn btn-warning text-dark me-2"><i class="fas fa-edit me-lg-2"></i>Ubah</a>
                      <form action="/admin/distributor/{{ $distributor->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash me-lg-2"></i>Hapus</button>
                      </form> --}}
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