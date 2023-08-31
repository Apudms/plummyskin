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
            <a href="/distributor/produk/create" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i>Tambah Data</a>
            <form class="float-end" action="/distributor/produk">
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
              @if ($product->count())
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA PRODUK</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
                    <th class="text-center">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($product as $data)
                    <tr>
                      <td>{{ $loop->iteration + $product->perPage() * ($product->currentPage() - 1) }}</td>
                      <td>{{ $data->name }}</td>
                      <td>Rp {{ number_format($data->price, 0, ',','.') }}</td>
                      <td>{{ $data->stok }}</td>
                      <td class="text-center">
                        <a href="/distributor/produk/{{ $data->id }}"><i class="fas fa-eye text-secondary me-lg-2"></i></a>
                        <a href="/distributor/produk/{{ $data->id }}/edit"><i class="fas fa-edit text-warning"></i></a>
                        <form action="/distributor/produk/{{ $data->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge btn-none bg-light border-0" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash text-danger"></i></button>
                        </form>
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
                    <th>NAMA PRODUK</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
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
    <div class="d-flex justify-content-end">
      {{ $product->links() }}
    </div>
  </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection