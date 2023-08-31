<header class="p-3 mb-3 border-bottom" style="background-color: #fdeee2;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="text-decoration-none col-md-2 py-2 mb-2 mb-lg-0 me-lg-auto">
        <img src="{{ asset('/img') }}/logo.png" class="me-2" width="100" height="40">
      </a>
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li>
          <a class="nav-link {{ ($title === "Halaman Utama") ? 'link-dark' : 'link-secondary' }} px-2" aria-current="page" href="/">Halaman Utama</a>
        </li>
        <li>
          <a class="nav-link {{ ($title === "Distributor") ? 'link-dark' : 'link-secondary' }} px-2" href="/distritoko">Distributor</a>
        </li>
        <form class="mb-2 mb-lg-0 me-lg-2">
          <input class="form-control" type="text" placeholder="Cari Produk" aria-label="Search">
        </form>
        <li>
          <a class="nav-link {{ ($title === "Keranjang") ? 'link-dark' : 'link-secondary' }} px-2" href="/keranjang">
            <i class="fas fa-shopping-cart text-warning" style="font-size: 120%"></i>
          </a>
        </li>
      </ul>

      @auth('reseller')
      <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            @if (auth('reseller')->user()->foto)
              <img src="{{ asset('storage/' . auth('reseller')->user()->foto) }}" alt="{{ auth('reseller')->user()->foto }}" width="32" height="32" class="rounded-circle">
            @else
              <img src="{{ asset('/dist') }}/images/faces/3.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
            @endif
            Hai, {{ auth('reseller')->user()->namaDepan }}
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/profil/profilsaya">Profil Saya</a></li>
            <li><a class="dropdown-item" href="/profil/marketingkit">Marketing Kit</a></li>
            <li><a class="dropdown-item" href="/profil/edukasimitra">Edukasi Mitra</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{ route('reseller.logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <div class="col-md-3 text-end">
          <a href="/login" class="btn btn-outline-warning me-2 me-md-2">Masuk</a>
          <a href="https://api.whatsapp.com/send/?phone={{ $admin[0]->noTelp }}&text=Saya%20ingin%20bergabung%20menjadi%20mitra%20sebagai%20reseller%20dari%20Plummyskin" class="btn btn-warning text-white">Daftar</a>
        </div>
      @endauth
      
    </div>
  </div>
</header>

<div class="container">
  <div class="row">
    <div class="col-8">

    </div>
    <div class="col-4">
      
    </div>
  </div>
</div>
