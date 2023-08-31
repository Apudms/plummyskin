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
              <form class="form" action="/distributor/produk" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="name">Nama Produk</label>
                      <input type="text" @error('name') is-invalid @enderror id="name" class="form-control" placeholder="Nama Produk"
                        name="name" required value="{{ old('name') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="berat">Berat</label>
                      <input type="text" id="berat" class="form-control" placeholder="contoh (25g)"
                        name="berat" required value="{{ old('berat') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input type="number" id="price" class="form-control" placeholder="15000"
                        name="price" required value="{{ old('price') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="masaSimpan">Masa Simpan</label>
                      <input type="text" id="masaSimpan" class="form-control" placeholder="contoh (6 bulan)"
                      name="masaSimpan" required value="{{ old('masaSimpan') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="stok">Status</label>
                      <fieldset class="form-group">
                        <select class="form-select" id="stok" name="stok">
                          @if (old('stok') == "Kosong")
                            <option value="Tersedia">Tersedia</option>
                            <option value="Kosong" selected>Kosong</option>
                          @else
                            <option value="Tersedia" selected>Tersedia</option>
                            <option value="Kosong">Kosong</option>
                          @endif
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="quantity">Jumlah Stok</label>
                      <input type="number" id="quantity" class="form-control" placeholder="10"
                        name="quantity" required value="{{ old('quantity') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="jnsKulit">Jenis Kulit</label>
                      <input type="text" id="jnsKulit" class="form-control" placeholder="contoh (Kulit Lembab)"
                        name="jnsKulit" required value="{{ old('jnsKulit') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label class="form-label" for="fotoProduk">Unggah Foto Produk</label>
                      <input type="file" class="form-control" id="fotoProduk" name="fotoProduk" required>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" 
                      placeholder="Deskripsi produk" required value="{{ old('deskripsi') }}">{{ old('deskripsi') }}</textarea>
                    </div>
                  </div>
                  <div class="col-12 mt-4">
                    <a href="/distributor/produk" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Batal</a>
                    <button type="submit" class="btn btn-success float-end"><i class="fas fa-plus-circle me-2"></i>Tambah</button>
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
  <script>
    const jnsKulit = document.querySelector('#jnsKulit');
    const slug = document.querySelector('#slug');

    jnsKulit.addEventListener('change', function() {
      fetch('/distributor/produk/checkSlug?jnsKulit=' + jnsKulit.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug);
    })
  </script>
@endsection