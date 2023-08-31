<header>
  <nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="dropdown ms-auto">
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
              <div class="user-name text-end">
                <h6 class="mb-0 text-gray-600">{{ auth('distributor')->user()->namaDepan }} {{ auth('distributor')->user()->namaBelakang }}</h6>
                <p class="mb-0 text-sm text-gray-600">Distributor</p>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li>
              <h6 class="dropdown-header">Halo, {{ auth('distributor')->user()->namaBelakang }}</h6>
            </li>
            <li><a class="dropdown-item" href="/distributor/pengaturan-akun"><i class="icon-mid bi bi-person me-2"></i> Profil Saya</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{ route('distributor.logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="icon-mid bi bi-box-arrow-right me-2"></i> Keluar</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      
    </div>
  </nav>
</header>
