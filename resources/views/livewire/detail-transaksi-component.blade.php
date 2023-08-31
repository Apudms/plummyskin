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
        <h1 class="h3">Detail Transaksi</h1>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5>Data Pemesan</h5>
              <div class="table-responsive">
                <table class="table table-borderless mb-2 mt-2">
                  <tbody>
                    <tr>
                      <td class="col-xl-2">Nama</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->firstname }} {{ $transaksi->order->lastname }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">No Telepon</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->noTelp }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Email</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->email }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Alamat</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->alamat }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Kecamatan</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->kecamatan }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Kota / Kabupaten</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->kabupaten }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Provinsi</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->provinsi }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Kode Pos</td>
                      <td class="px-0">:</td>
                      <td>{{ $transaksi->order->kodepos }}</td>
                    </tr>
                    <tr>
                      <td class="col-xl-2">Metode Pembayaran</td>
                      <td class="px-0">:</td>
                      <td>Transfer {{ $transaksi->transfer }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-content">
                <hr>
                <h5>Data Produk</h5>
                <div class="form-body mt-4">
                  <div class="row">
                    @foreach ($detail as $d)
                      @foreach ($detailProduk as $item)
                        @if ($item->id == $d->product_id)
                          <div class="col-md-4 form-group">
                            <label>{{ $item->name }}</label>
                          </div>
                          <div class="col-md-2 col-xl-2 col-4 form-group">
                            <label>Rp {{ number_format($item->price, 0, ',','.') }}</label>
                          </div>
                          <div class="col-md-2 col-xl-2 col-4 form-group">
                            <label>x {{ $d->quantity }}</label>
                          </div>
                          <div class="mb-3 col-md-4 col-xl-2 col-4 form-group">
                            <label>Rp {{ number_format($item->price * $d->quantity, 0, ',','.') }}</label>
                          </div>
                        @endif
                      @endforeach
                    @endforeach
                  </div>
                  <hr>
                  <div class="row">
                    <div class="mb-3 col-md-8 col-8 form-group">
                      <label>Subtotal</label>
                    </div>
                    <div class="col-md-4 col-4 form-group">
                      <label>Rp {{ number_format($transaksi->order->subtotal, 0, ',','.') }}</label>
                    </div>
                    <div class="col-md-8 col-8 form-group">
                      <label>Ongkir</label>
                    </div>
                    <div class="col-md-4 col-4 form-group">
                      <label>Rp {{ number_format($transaksi->order->ongkir, 0, ',','.') }}</label>
                    </div>
                  </div>
                  <hr>
                  <div class="row py-2" style="background: #fffacb">
                    <div class="col-md-8 col-8 form-group">
                      <label><b>Total</b></label>
                    </div>
                    <div class="col-md-4 col-4 form-group">
                      <label><b>Rp {{ number_format($transaksi->order->total, 0, ',','.') }}</b></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if ($now >= $transaksi->order->created_at->addDay()->toDateTimeString() && empty($transaksi->order->buktiTransfer))
            <div class="card mt-4">
              <div class="card-content">
                <div class="card-body">
                  <h5 class="text-danger">Pesanan sudah kadaluwarsa!</h5> *Silahkan pesan kembali!
                </div>
              </div>
            </div>
          @elseif ($now <= $transaksi->order->created_at->addDay()->toDateTimeString())
            <div class="card mt-4">
              <div class="card-content">
                <div class="card-body">
                  <h5>Alamat Pembayaran</h5>
                  <div class="table-responsive">
                    <table class="table table-borderless mb-2 mt-2">
                      <tbody>
                        <tr>
                          <td class="col-xl-2">Nama Distributor</td>
                          <td class="px-0">:</td>
                          <td>{{ $datadistri->distributor->namaDepan }} {{ $datadistri->distributor->namaBelakang }}</td>
                        </tr>
                        <tr>
                          <td class="col-xl-2">Wilayah</td>
                          <td class="px-0">:</td>
                          <td>{{ $datadistri->distributor->wilayah }}</td>
                        </tr>
                        <tr>
                          <td class="col-xl-2">Bank</td>
                          <td class="px-0">:</td>
                          <td>
                            @if ($datadistri->distributor->bank == 'BCA')
                              <img src="{{ asset('/img') }}/bca.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @elseif ($datadistri->distributor->bank == 'BNI')
                              <img src="{{ asset('/img') }}/bni.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @elseif ($datadistri->distributor->bank == 'BRI')
                              <img src="{{ asset('/img') }}/bri.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @elseif ($datadistri->distributor->bank == 'Mandiri')
                              <img src="{{ asset('/img') }}/mandiri.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td class="col-xl-2">No Rekening</td>
                          <td class="px-0">:</td>
                          <td class="d-flex align-items-center">
                            {{ $datadistri->distributor->noRek }} 
                            {{-- @if ($datadistri->distributor->bank == 'BCA')
                              <img src="{{ asset('/img') }}/bca.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 50px; max-width: 50px;" class="ms-2">
                            @elseif ($datadistri->distributor->bank == 'BNI')
                              <img src="{{ asset('/img') }}/bni.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 50px; max-width: 50px;" class="ms-2">
                            @elseif ($datadistri->distributor->bank == 'BRI')
                              <img src="{{ asset('/img') }}/bri.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 50px; max-width: 50px;" class="ms-2">
                            @elseif ($datadistri->distributor->bank == 'Mandiri')
                              <img src="{{ asset('/img') }}/mandiri.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 50px; max-width: 50px;" class="ms-2">
                            @endif --}}
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <hr>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  @if (session()->has('success_message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>{{ session('success_message') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  <div class="mb-3 col-md-8 col-8">
                    <label>Upload Bukti Transfer</label>
                  </div>
                  <form wire:submit.prevent="updateBuktiTransfer">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" id="buktiTransfer" aria-describedby="buktiTransfer" aria-label="Upload" wire:model="newBuktiTransfer">
                      @error('buktiTransfer') <span class="error">{{ $message }}</span> @enderror
                      <button class="btn btn-warning" type="submit" id="buktiTransfer">Upload</button>
                    </div>
                    <div wire:loading wire:target="updateBuktiTransfer">Uploading...</div>
                    @if ($newBuktiTransfer)
                      <div class="col-md-8 col-8">
                        <div style="max-width: 400px;">
                          <img src="{{ $newBuktiTransfer->temporaryUrl() }}" alt="{{ $newBuktiTransfer->temporaryUrl() }}" class="img-fluid">
                        </div>
                      </div>
                    @else
                      <div class="col-md-8 col-8">
                        <div style="max-width: 400px;">
                          <img src="{{ asset('storage/buktiTransfer/'. $transaksi->order->buktiTransfer) }}" alt="{{ $transaksi->order->buktiTransfer }}" class="img-fluid">
                        </div>
                      </div>
                    @endif
                  </form>
                  <br>

                  @if (session()->has('success_status'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <strong>{{ session('success_status') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @if ($transaksi->status !== 'Ditolak')
                    <div class="progress" style="height: 30px;">
                      @if ($transaksi->order->status == 'Memesan')
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><strong>Menunggu</strong></div>
                      @elseif ($transaksi->order->status == 'Dikemas')
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><strong>Dikemas</strong></div>
                      @elseif ($transaksi->order->status == 'Dikirim')
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><strong>Dikirim</strong></div>
                      @elseif ($transaksi->order->status == 'Diterima')
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Diterima</strong></div>
                      @endif
                    </div>
                  @endif
                  @if ($transaksi->order->status == 'Dikirim')
                    <form class="text-center mt-3" wire:submit.prevent="updateStatusPesanan">
                      @method('put')
					            @csrf
                      <button class="btn btn-outline-primary" id="status" type="submit" onclick="return confirm('Konfirmasi pesanan diterima?')" name="status" wire:model="status">Pesanan Diterima</button>
                    </form>
                  @endif
                </div>
              </div>
            </div>
          @else
            <div class="card mt-4">
              <div class="card-content">
                <div class="card-body">
                  <h5>Alamat Pembayaran</h5>
                  <div class="table-responsive">
                    <table class="table table-borderless mb-2 mt-2">
                      <tbody>
                        <tr>
                          <td class="col-xl-2">Nama Distributor</td>
                          <td class="px-0">:</td>
                          <td>{{ $datadistri->distributor->namaDepan }} {{ $datadistri->distributor->namaBelakang }}</td>
                        </tr>
                        <tr>
                          <td class="col-xl-2">Wilayah</td>
                          <td class="px-0">:</td>
                          <td>{{ $datadistri->distributor->wilayah }}</td>
                        </tr>
                        <tr>
                          <td class="col-xl-2">Bank</td>
                          <td class="px-0">:</td>
                          <td>
                            @if ($datadistri->distributor->bank == 'BCA')
                              <img src="{{ asset('/img') }}/bca.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @elseif ($datadistri->distributor->bank == 'BNI')
                              <img src="{{ asset('/img') }}/bni.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @elseif ($datadistri->distributor->bank == 'BRI')
                              <img src="{{ asset('/img') }}/bri.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @elseif ($datadistri->distributor->bank == 'Mandiri')
                              <img src="{{ asset('/img') }}/mandiri.png" alt="{{ $datadistri->distributor->bank }}" style="max-height: 80px; max-width: 80px;">
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td class="col-xl-2">No Rekening</td>
                          <td class="px-0">:</td>
                          <td>
                            {{ $datadistri->distributor->noRek }}
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <hr>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-8 col-8">
                    <div style="max-width: 400px;">
                      <img src="{{ asset('storage/buktiTransfer/'. $transaksi->order->buktiTransfer) }}" alt="{{ $transaksi->order->buktiTransfer }}" class="img-fluid">
                    </div>
                  </div>
                  <br>
                  @if ($transaksi->status !== 'Ditolak')
                    <div class="progress" style="height: 30px;">
                      @if ($transaksi->order->status == 'Memesan')
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><strong>Menunggu</strong></div>
                      @elseif ($transaksi->order->status == 'Dikemas')
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><strong>Dikemas</strong></div>
                      @elseif ($transaksi->order->status == 'Dikirim')
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><strong>Dikirim</strong></div>
                      @elseif ($transaksi->order->status == 'Diterima')
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Diterima</strong></div>
                      @endif
                    </div>
                  @endif
                  @if ($transaksi->order->status == 'Dikirim')
                    <form class="text-center mt-3" wire:submit.prevent="updateStatusPesanan">
                      @method('put')
					            @csrf
                      <button class="btn btn-outline-primary" id="status" type="submit" onclick="return confirm('Konfirmasi pesanan diterima?')" name="status" wire:model="status">Pesanan Diterima</button>
                    </form>
                  @endif
                </div>
              </div>
            </div>
          @endif
          <div class="col-12 mt-4">
            <a href="/profil/transaksi" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>