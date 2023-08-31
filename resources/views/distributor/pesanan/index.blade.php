@extends('distributor.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
@endsection

@section('container')
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <form class="float-start" action="/distributor/pesanan">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search text-light"></i></button>
              </div>
            </form>
          </div>

					@if (session()->has('success'))
						<div class="alert alert-success alert-dismissible show fade">
							{{ session('success') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

          <div class="card-content">
            <div class="table-responsive">
              @if (count($pesanan))
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>WAKTU</th>
                      <th>NAMA RESELLER</th>
                      <th>TOTAL HARGA</th>
                      <th class="text-center">STATUS</th>
                      <th class="text-center">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pesanan as $pesan)
                      <tr>
                        <td>{{ $loop->iteration + $pesanan->perPage() * ($pesanan->currentPage() - 1) }}</td>
                        <td>{{ $pesan->created_at }}</td>
                        <td>{{ $pesan->namaDepan }} {{ $pesan->namaBelakang }}</td>
                        <td>Rp {{ number_format($pesan->total, 0, ',', '.') }}</td>
                        <td class="text-center">
                          @if ($pesan->status == 'Memesan')
                          <span class="badge bg-warning"><i class="fas fa-filter text-white me-lg-2"></i>Menunggu</span>
                          @elseif ($pesan->status == 'Dikemas')
                          <span class="badge bg-info"><i class="fas fa-box text-white me-lg-2"></i>Dikemas</span>
                          @elseif ($pesan->status == 'Dikirim')
                          <span class="badge" style="background: #20c997"><i class="fas fa-shipping-fast text-white me-lg-2"></i>Dikirim</span>
                          @elseif ($pesan->status == 'Diterima')
                          <span class="badge bg-success"><i class="fas fa-check text-white me-lg-2"></i>Selesai</span>
                          @elseif ($pesan->status == 'Dibatalkan')
                          <span class="badge bg-danger"><i class="fas fa-times text-white me-lg-2"></i>Dibatalkan</span>
                          @endif
                          {{-- @if ($now >= $pesan->created_at && empty($pesan->buktiTransfer))
                          <span class="badge bg-info"><i class="fas fa-filter text-white me-lg-2"></i>Menunggu</span>
                          @elseif ($pesan->status == 'disetujui')
                          <span class="badge bg-success"><i class="fas fa-check text-white me-lg-2"></i>Selesai</span>
                          @else
                          <span class="badge bg-danger"><i class="fas fa-times text-white me-lg-2"></i>Gagal</span>
                          @endif --}}
                        </td>
                        <td class="text-center">
                          <a href="/distributor/pesanan/{{ $pesan->orderId }}/edit"><i class="fas fa-file-contract text-primary me-lg-2"></i>Periksa Rincian</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>TANGGAL</th>
                      <th>NAMA RESELLER</th>
                      <th>TOTAL HARGA</th>
                      <th class="text-center">STATUS</th>
                      <th class="text-center">AKSI</th>
                    </tr>
                  </thead>
                </table>
                <div class="text-center text-danger mt-4 mb-4">
                  <b>Tidak ada data yang ditemukan.</b>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-end">
      {{ $pesanan->links() }}
    </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection