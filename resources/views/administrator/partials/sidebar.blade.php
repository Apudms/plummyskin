<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="/admin"><img src="{{ asset('/img') }}/logo.png" style="width: 150px;height: 60px" alt="Logo" srcset=""></a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <div class="card">
        <div class="card-body py-0 ms-md-2">
          <div class="d-flex align-items-center mt-4">
            <div class="avatar avatar-md">
              <img src="{{ auth('admin')->user()->foto }}" alt="{{ auth('admin')->user()->foto }}">
            </div>
            <div class="ms-3 name">
              <h6 class="text-muted mb-0">{{ auth('admin')->user()->nama }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
          <a href="/admin" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/distributors*', 'admin/reseller*') ? 'active' : '' }} has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-collection-fill"></i>
            <span>Data</span>
          </a>
          <ul class="submenu ">
            <li class="submenu-item {{ Request::is('admin/distributors*') ? 'active' : '' }}">
              <a href="/admin/distributors">Distributor</a>
            </li>
            <li class="submenu-item {{ Request::is('admin/reseller*') ? 'active' : '' }}">
              <a href="/admin/reseller">Reseller</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item {{ Request::is('admin/repeat-order*') ? 'active' : '' }}">
          <a href="/admin/repeat-order" class="sidebar-link">
            <i class="bi bi-bar-chart-fill"></i>
            <span>Repeat Order</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/marketingkit*') ? 'active' : '' }}">
          <a href="/admin/marketingkit" class="sidebar-link">
            <i class="bi bi-inboxes-fill"></i>
            <span>Marketing Kit</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/edukasimitra*') ? 'active' : '' }}">
          <a href="/admin/edukasimitra" class="sidebar-link">
            <i class="bi bi-journal-bookmark-fill"></i>
            <span>Edukasi Mitra</span>
          </a>
        </li>

        <li class="sidebar-title">Pengaturan</li>

        <li class="sidebar-item {{ Request::is('admin/pengaturan-akun*') ? 'active' : '' }}">
          <a href="/admin/pengaturan-akun" class="sidebar-link">
            <i class="bi bi-person-fill"></i>
            <span>Akun</span>
          </a>
        </li>

        <li class="sidebar-item">
          <form action="{{ route('admin.logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-light sidebar-link">
              <i class="bi bi-box-arrow-right"></i>
              <span><b>Keluar</b></span>
            </button>
          </form>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
