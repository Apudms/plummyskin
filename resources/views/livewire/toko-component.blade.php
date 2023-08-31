<div class="p-4 p-md-5 mb-0 text-dark rounded bg-warning">
    <div class="col-md-6 px-5">
      <h1 class="display-4 fst-italic"><b>{{ $distributor->namaDepan }} {{ $distributor->namaBelakang }}</b></h1>
      <p class="lead my-3">Distributor wilayah <b>{{ $distributor->wilayah }}</b></p>
    </div>
  </div>

  <div class="album py-3 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($products as $product)
          <div class="col">
            <div class="card shadow-sm">
              <a href="{{ route('produk.detail', ['slug' => $product->slug]) }}" class="text-decoration-none text-dark">
                <img src="{{ asset('storage/'. $product->fotoProduk ) }}" class="card-img-top" alt="{{ $product->slug }}">
              </a>
              <div class="card-body">
                <div class="col">
                  <a href="{{ route('produk.detail', ['slug' => $product->slug]) }}" class="text-decoration-none text-dark">
                    <h5 class="card-title mb-4">{{ $product->name }}</h5>
                  </a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <small>Status : {{ $product->stok }}</small>
                  <h4 class="card-text"><small class="text-warning">Rp {{ number_format($product->price, 0, ',','.') }}</small></h4>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  