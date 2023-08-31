<div class="container-fluid">
	<div class="row mb-4">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="/profil/profilsaya" class="nav-link link-dark">
              <i class="bi bi-person me-2"></i>
              Profil Saya
            </a>
          </li>
          <li class="nav-item">
            <a href="/profil/marketingkit" class="nav-link link-dark">
              <i class="bi bi-cloud-arrow-down me-2"></i>
              Marketing Kit
            </a>
          </li>
          <li class="nav-item">
            <a href="/profil/edukasimitra" class="nav-link link-dark">
              <i class="bi bi-book me-2"></i>
              Edukasi Mitra
            </a>
          </li>
          <li class="nav-item">
            <a href="/profil/transaksi" class="nav-link text-white bg-warning">
              <i class="bi bi-cart me-2"></i>
              Transaksi
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Transaksi</h1>
      </div>
			@if ($order->count())
				<div class="row" id="table-hover-row">
					<div class="col-12">
						<div class="card">
							<div class="card-content">
								<div class="table-responsive">
									<table class="table table-hover mb-0">
										<thead>
											<tr>
												<th>NO</th>
												<th>TANGGAL</th>
												<th>NAMA PEMESAN</th>
												<th>TOTAL HARGA</th>
												<th class="text-center">STATUS PEMBAYARAN</th>
												<th class="text-center">STATUS PEMESANAN</th>
												<th class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($order as $trans)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $trans->created_at->format('d-m-Y') }}</td>
													<td>{{ $trans->firstname }} {{ $trans->lastname }}</td>
													<td>Rp {{ number_format($trans->total, 0, ',','.') }}</td>
													<td class="text-center">
														@if ($trans->buktiTransfer)
															<span class="badge bg-success"><i class="fas fa-check text-white me-lg-2"></i>Selesai</span>
														@elseif ($now >= $trans->created_at->addDay()->toDateTimeString())
															<span class="badge bg-danger"><i class="fas fa-times text-white me-lg-2"></i>Kadaluarsa</span>
														@else
															<span class="badge bg-warning"><i class="fas fa-filter text-white me-lg-2"></i>Upload Bukti Transfer</span>
														@endif
													</td>
													<td class="text-center">
													@if ($trans->status == 'Memesan')
													<span class="badge bg-warning"><i class="fas fa-filter text-white me-lg-2"></i>Menunggu</span>
													@elseif ($trans->status == 'Dikemas')
													<span class="badge bg-info"><i class="fas fa-box text-white me-lg-2"></i>Dikemas</span>
													@elseif ($trans->status == 'Dikirim')
													<span class="badge" style="background: #20c997"><i class="fas fa-shipping-fast text-white me-lg-2"></i>Dikirim</span>
													@elseif ($trans->status == 'Diterima')
													<span class="badge bg-success"><i class="fas fa-check text-white me-lg-2"></i>Diterima</span>
													@elseif ($trans->transaksi->status == 'Ditolak')
													<span class="badge bg-danger"><i class="fas fa-times text-white me-lg-2"></i>Ditolak</span>
													@endif
													</td>
													<td class="text-center">
														<a href="/profil/transaksi/{{ $trans->id }}"><i class="fas fa-file-contract text-primary me-lg-2"></i>Periksa Rincian</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-12">
						<p class="fw-normal mb-0 text-secondary text-center">Belum ada transaksi yang dilakukan!</p>
					</div>
				</div>					
			@endif
    </main>
  </div>
</div>
