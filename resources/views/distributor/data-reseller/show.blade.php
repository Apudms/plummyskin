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
            <div class="card-body">
              <form class="form form-horizontal">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-3">
                      <label>Nama</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->namaDepan }} {{ $reseller->namaBelakang }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>No Telepon</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->noTelp }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Jenis Kelamin</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->jenisKelamin }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Tempat Lahir</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->tempatLahir }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Tanggal Lahir</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->tanggalLahir }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Alamat</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->alamat }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Bergabung Sejak</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $reseller->created_at->format('d F Y') }}</b></label>
                    </div>
                    <div class="col-12 d-flex justify-content-start mt-4">
                      <a href="/distributor/data-reseller" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-lg-2"></i>Kembali</a>
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