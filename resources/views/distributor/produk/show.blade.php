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
                      <label>Foto Produk</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">
                        <img src="{{ asset('storage/'. $product->fotoProduk ) }}" class="img-fluid" alt="{{ $product->slug }}" width="200" height="200">
                      </label>
                    </div>
                    <div class="col-md-3">
                      <label>Nama Produk</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->name }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Harga</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>Rp {{ number_format($product->price, 0, ',','.') }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Berat</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->berat }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Status</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->stok }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Jumlah Stok</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->quantity }} Pcs</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Jenis Kulit</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->jnsKulit }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Masa Simpan</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->masaSimpan }}</b></label>
                    </div>
                    <div class="col-md-3">
                      <label>Deskripsi</label>
                    </div>
                    <div class="col-md-9 form-group">
                      <label class="text-bold-500">: <b>{{ $product->deskripsi }}</b></label>
                    </div>
                    <div class="col-12 d-flex justify-content-start mt-4">
                      <a href="/distributor/produk" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-lg-2"></i>Kembali</a>
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