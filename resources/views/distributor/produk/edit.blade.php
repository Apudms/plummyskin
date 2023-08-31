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
              <form class="form" action="/distributor/produk/{{ $products->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label class="form-label" for="fotoProduk">Ubah Foto Produk</label>
                        <input type="file" class="form-control" id="fotoProduk" name="fotoProduk">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <img src="{{ asset('storage/' . $products->fotoProduk) }}" class="rounded" alt="" width="200" height="200"> 
                      </div>  
                    </div>  

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" @error('name') is-invalid @enderror id="name" class="form-control" placeholder="Nama Produk"
                          name="name" required value="{{ old('name', $products->name) }}">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="jnsKulit">Jenis Kulit</label>
                        <input type="text" @error('jnsKulit') is-invalid @enderror id="jnsKulit" class="form-control" placeholder="Jenis Kulit"
                          name="jnsKulit" required value="{{ old('jnsKulit', $products->jnsKulit) }}">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="text" @error('berat') is-invalid @enderror id="berat" class="form-control" placeholder="50g"
                          name="berat" required value="{{ old('berat', $products->berat) }}">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" @error('price') is-invalid @enderror id="price" class="form-control" placeholder="Harga"
                          name="price" required value="{{ old('price', $products->price) }}">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="stok">Status</label>
                        <fieldset class="form-group">
                          <select class="form-select" id="stok" name="stok">
                            @if ($products->stok == "Tersedia")
                              <option value="Tersedia" selected>Tersedia</option>
                              <option value="Kosong">Kosong</option>
                            @else
                              <option value="Tersedia">Tersedia</option>
                              <option value="Kosong" selected>Kosong</option>
                            @endif
                          </select>
                        </fieldset>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="quantity">Jumlah Stok</label>
                        <input type="number" @error('quantity') is-invalid @enderror id="quantity" class="form-control" placeholder="Stok"
                          name="quantity" required value="{{ old('quantity', $products->quantity) }}">
                      </div>
                    </div>
  
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="masaSimpan">Masa Simpan</label>
                        <input type="text" @error('masaSimpan') is-invalid @enderror id="masaSimpan" class="form-control" placeholder="6 Bulan"
                          name="masaSimpan" required value="{{ old('masaSimpan', $products->masaSimpan) }}">
                      </div>
                    </div>

                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" @error('deskripsi') is-invalid @enderror class="form-control" id="deskripsi" rows="4" 
                        placeholder="Deskripsi produk" required">{{ old('deskripsi', $products->deskripsi) }}</textarea>
                        </div>
                    </div>
  
                    <div class="col-12 mt-4">
                      <a href="/distributor/produk" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Batal</a>
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