<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="/distributor"><img src="{{ asset('/img') }}/logo.png" style="width: 150px;height: 60px" alt="Logo" srcset=""></a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('distributor') ? 'active' : '' }}">
          <a href="/distributor" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('distributor/produk*') ? 'active' : '' }}">
          <a href="/distributor/produk" class="sidebar-link">
            <i class="bi bi-bag-fill"></i>
            <span>Produk</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('distributor/data-reseller*') ? 'active' : '' }}">
          <a href="/distributor/data-reseller" class="sidebar-link">
            <i class="bi bi-bag-fill"></i>
            <span>Data Reseller</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('distributor/pesanan*') ? 'active' : '' }}">
          <a href="/distributor/pesanan" class="sidebar-link">
            <i class="bi bi-cart-fill"></i>
            <span>Pesanan</span>
          </a>
        </li>

        <li class="sidebar-title">Pengaturan</li>

        <li class="sidebar-item {{ Request::is('distributor/akun-saya*') ? 'active' : '' }}">
          <a href="/distributor/akun-saya" class="sidebar-link">
            <i class="bi bi-person-fill"></i>
            <span>Akun</span>
          </a>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
