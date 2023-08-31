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
						<a href="{{ route('reseller.profil.marketingkit') }}" class="nav-link text-white bg-warning">
							<i class="bi bi-cloud-arrow-down me-2"></i>
							Marketing Kit
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.edukasimitra') }}" class="nav-link link-dark">
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
        <h1 class="h3">Marketing Kit</h1>
      </div>

      @foreach ($markit as $item)
        @if ($item->tipe == 'Foto')
          <div class="card-body">
            <p class="px-2">
              <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#img{{ $item->id }}" role="button" aria-expanded="false" aria-controls="img{{ $item->id }}">
                >> {{ $item->keterangan }} || {{ $item->tipe }}
              </a>
            </p>
            <div class="row">
              <div class="col col-xl-4 mb-3 collapse" id="img{{ $item->id }}">
                <div class="card" style="width: 20rem;">
                  <img src="{{ asset('storage/'. $item->kit) }}"
                  class="img-fluid" alt="{{ $item->keterangan }}">
                  <div class="card-img-overlay d-flex align-items-end justify-content-end">
                    <button class="btn btn-warning text-white" wire:click="export"><i class="fas fa-download"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>   
        @else
          <div class="card-body">
            <p class="px-2">
              <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#vid{{ $item->id }}" role="button" aria-expanded="false" aria-controls="vid{{ $item->id }}">
                >> {{ $item->keterangan }} || {{ $item->tipe }}
              </a>
            </p>
            <div class="row">
              <div class="col col-xl-4 mb-3 collapse" id="vid{{ $item->id }}">
                <div class="card" style="width: 20rem;">
                  <video width="320" height="240" controls>
                    <source src="{{ asset('storage/'. $item->kit) }}" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        @endif
      @endforeach

      {{-- @foreach ($markit as $item)
        <div class="card-body">
          <p class="px-2">
            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#link{{ $item->id }}" role="button" aria-expanded="false" aria-controls="link">
              <strong>>> {{ $item->nama }}</strong> || {{ $item->tipe }}
            </a>
          </p>
          <div class="row">
            @foreach ($detail as $d)
              @if ($d->marketing_kit_id == $item->id)
                <div class="col col-xl-4 mb-3 collapse" id="link{{ $item->id }}">
                  @if ($item->tipe == 'Foto')
                    <div class="card" style="width: 20rem;">
                      <img src="{{ asset('storage/'. $marketingkit->kit) }}"
                      class="img-fluid" alt="kopi">
                      <div class="card-img-overlay d-flex align-items-start justify-content-end">
                        <button class="btn btn-warning text-white" wire:click="export"><i class="fas fa-download"></i></button>
                      </div>
                    </div>
                  @else
                    <div class="card" style="width: 20rem;">
                      <video width="320" height="240" controls>
                        <source src="{{ asset('storage/'. $marketingkit->kit) }}" type="video/mp4">
                      </video>
                    </div>
                  @endif
                </div>
              @endif
            @endforeach
          </div>
        </div>   
      @endforeach --}}

    </main>
  </div>
</div>
