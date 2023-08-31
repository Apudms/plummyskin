<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('/img') }}/bannerplummy.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          @guest('reseller')
            <div class="d-grid gap-2 d-md-flex mt-2 mb-2 justify-content-md-start">
              <a href="https://api.whatsapp.com/send/?phone={{ $admin[0]->noTelp }}&text=Saya%20ingin%20bergabung%20menjadi%20mitra%20sebagai%20reseller%20dari%20Plummyskin" type="button" class="btn btn-warning text-white btn-lg px-4 me-md-2"><b>Daftar Sekarang</b></a>
            </div>
          @endguest
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/img') }}/bannerplummy2.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          @guest('reseller')
            <div class="d-grid gap-2 d-md-flex mt-2 mb-2 justify-content-md-start">
              <a href="https://api.whatsapp.com/send/?phone={{ $admin[0]->noTelp }}&text=Saya%20ingin%20bergabung%20menjadi%20mitra%20sebagai%20reseller%20dari%20Plummyskin" type="button" class="btn btn-warning text-white btn-lg px-4 me-md-2"><b>Daftar Sekarang</b></a>
            </div>
          @endguest
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/img') }}/bannerplummy3.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          @guest('reseller')
            <div class="d-grid gap-2 d-md-flex mt-2 mb-2 justify-content-md-start">
              <a href="https://api.whatsapp.com/send/?phone={{ $admin[0]->noTelp }}&text=Saya%20ingin%20bergabung%20menjadi%20mitra%20sebagai%20reseller%20dari%20Plummyskin" type="button" class="btn btn-warning text-white btn-lg px-4 me-md-2"><b>Daftar Sekarang</b></a>
            </div>
          @endguest
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  @if ($produk->count())
  <div class="container pb-4 border-bottom mt-4 mb-2">
    <h4 class="display-6 fw-bold lh-1 mb-3">Katalog</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4 pt-3">
      @foreach ($produk as $item)
      <div class="col">
        <a href="/distritoko/produk/{{ $item->slug }}" class="text-reset text-decoration-none">
          <div class="card shadow bg-body">
            <div style="max-height: 350px; max-width: 400px; overflow: hidden;">
              <img src="{{ asset('storage/'. $item->fotoProduk ) }}" class="card-img-top" alt="{{ $item->name }}">
            </div>
            <div class="card-body">
              <h5 class="card-title mb-4">{{ $item->name }}</h5>
              <div class="row">
                <p class="card-text col-md-3 text-start"><small class="text-muted">Status: {{ $item->stok }}</small></p>
                <h5 class="card-text col-md-4 text-center"><small class="text-warning">Rp {{ number_format($item->price, 0, ',','.') }}</small></h5>
                <p class="card-text col-md-5 text-end"><small class="text-muted">{{ $item->distributor->wilayah }}</small></p>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  @endif
  
  @if ($reorder->count() and $reorder2->count())
    <div class="container pb-4">
      <div class="row row-cols-1 row-cols-md-3 g-4 pt-3">
        <h4 class="display-6 fw-bold lh-1 mb-3">Top Reseller</h4>
      </div>
    </div>
  
    <div class="container border-bottom">
      <div class="row align-items-center p-2">
        <div class="col-md-1 col-lg-1">
        </div>
        <div class="col">
          <b>NAMA</b>
        </div>
        <div class="col">
          <b>ALAMAT</b>
        </div>
        <div class="col">
          <b>REPEAT ORDER</b>
        </div>
        <div class="col">
          <b>JUMLAH</b>
        </div>
      </div>
    </div>
  
    @foreach ($reorder as $detail)
      <div class="container">
        <div class="row align-items-center p-2" style="background: rgb(255, 220, 220)">
          <div class="col-md-1 col-lg-1">
            <img src="{{ asset('/img') }}/Mugwort-3.jpeg" class="rounded-circle" width="50" height="50" alt="...">
          </div>
          <div class="col">
            <h5>{{ $detail->namaDepan }} {{ $detail->namaBelakang }}</h5>
          </div>
          <div class="col">
            <h5>{{ $detail->alamat }}</h5>
          </div>
          <div class="col">
            <h5>{{ $detail->noReseller }} Kali</h5>
          </div>
          <div class="col">
            <h5>{{ $detail->jumlahPCS }} Pcs</h5>
          </div>
        </div>
      </div>
    @endforeach
  
    @foreach ($reorder2 as $detail)
      <div class="container mb-4">
        <div class="row align-items-center p-2" style="background: rgb(255, 245, 220)">
          <div class="col-md-1 col-lg-1">
            <img src="{{ asset('/img') }}/Saffron-3.jpeg" class="rounded-circle" width="50" height="50" alt="...">
          </div>
          <div class="col">
            {{ $detail->namaDepan }} {{ $detail->namaBelakang }}
          </div>
          <div class="col">
            {{ $detail->alamat }}
          </div>
          <div class="col">
            {{ $detail->noReseller }} Kali
          </div>
          <div class="col">
            {{ $detail->jumlahPCS }} Pcs
          </div>
        </div>
      </div>
    @endforeach
  @endif
