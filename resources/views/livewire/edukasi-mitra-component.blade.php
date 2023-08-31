@section('cssOpsi')
  <x-embed-styles />
@endsection

<div class="container-fluid">
	<div class="row mb-4">
		<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a href="{{ route('reseller.profil.profilsaya') }}" class="nav-link link-dark">
							<i class="bi bi-person me-2"></i>
							Profil Saya
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.marketingkit') }}" class="nav-link link-dark">
							<i class="bi bi-cloud-arrow-down me-2"></i>
							Marketing Kit
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.edukasimitra') }}" class="nav-link text-white bg-warning">
							<i class="bi bi-book me-2"></i>
							Edukasi Mitra
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.transaksi') }}" class="nav-link link-dark">
							<i class="bi bi-cart me-2"></i>
							Transaksi
						</a>
					</li>
				</ul>
			</div>
		</nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Edukasi Mitra</h1>
      </div>

      @foreach ($edukasi as $item)
        <div class="card-body">
          <p class="px-2">
            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#vid{{ $item->id }}" role="button" aria-expanded="false" aria-controls="vid{{ $item->id }}">
              >> {{ $item->keterangan }}
            </a>
          </p>
          <div class="collapse" id="vid{{ $item->id }}">
            <div class="card card-body">
              <x-embed url="{{ $item->link }}" />
            </div>
          </div>
        </div>
      @endforeach

    </main>
  </div>
</div>
