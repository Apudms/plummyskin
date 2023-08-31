@extends('distributor.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
@endsection

@section('container')
  <section id="multiple-column-form">
    <div class="row match-height">
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
                  <label>Rp {{ number_format($order->subtotal, 0, ',','.') }}</label>
                </div>
                <div class="col-md-8 col-8 form-group">
                  <label>Ongkir</label>
                </div>
                <div class="col-md-4 col-4 form-group">
                  <label>Rp {{ number_format($order->ongkir, 0, ',','.') }}</label>
                </div>
              </div>
              <hr>
              <div class="row py-2" style="background: #fffacb">
                <div class="col-md-8 col-8 form-group">
                  <label><b>Total</b></label>
                </div>
                <div class="col-md-4 col-4 form-group">
                  <label><b>Rp {{ number_format($order->total, 0, ',','.') }}</b></label>
                </div>
              </div>
            </div>
          </div><br>
          @if ($transaksi->order->count('buktiTransfer'))
            <div class="col-md-8 col-8">
              <div style="max-width: 400px;">
                <img src="{{ asset('storage/buktiTransfer/'. $transaksi->order->buktiTransfer) }}" alt="{{ $transaksi->order->buktiTransfer }}" class="img-fluid">
              </div>
            </div>
          @elseif (empty($transaksi->order->buktiTransfer))
            <div class="col-md-8 col-8">
              <h5 class="text-danger">Pemesan belum mengirimkan bukti transfer.</h5>
            </div>
          @endif
          <br>
          @if ($transaksi->status !== 'Ditolak')
            <div class="progress mb-4" style="height: 30px;">
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
          @if ($order->status == 'Dibatalkan')
            <div class="progress mb-4" style="height: 30px;">
              <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Dibatalkan</strong></div>
            </div>
          @endif
          @if ($order->status == 'Dikemas')
            <form class="mb-4" action="/distributor/pesanan/{{ $order->id }}" method="post">
              @method('put')
              @csrf
              <button type="submit" class="btn btn-danger" name="status" value="Dibatalkan" onclick="return confirm('Tolak pesanan ini?')"><i class="fas fa-times me-2"></i>Batalkan Pesanan</button>
              <button type="submit" class="btn btn-primary ms-4" name="status" value="Dikirim" onclick="return confirm('Bukti transfer sudah sesuai?')"><i class="fas fa-shipping-fast me-2"></i>Kirim Barang</button>
            </form>
          @endif
          @if ($transaksi->status !== 'Ditolak' && $transaksi->status !== 'Disetujui')
            <form class="mb-4" action="/distributor/pesanan/{{ $transaksi->order_id }}" method="post">
              @method('put')
              @csrf
              <button type="submit" class="btn btn-danger" name="status" value="Ditolak" onclick="return confirm('Tolak pesanan ini?')"><i class="fas fa-times me-2"></i>Tolak</button>
              <button type="submit" class="btn btn-primary ms-4" name="status" value="Disetujui" onclick="return confirm('Bukti transfer sudah sesuai?')"><i class="fas fa-check me-2"></i>Konfirmasi</button>
            </form>
          @endif
          <hr>
          <div class="col-12 mt-4">
            <a href="/distributor/pesanan" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection