@extends('administrator.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
@endsection

@section('container')
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="/admin/edukasimitra/create" class="btn btn-success mb-4"><i class="fas fa-plus-circle me-2"></i>Tambah Edukasi Mitra</a>
            <form class="float-end" action="/admin/edukasimitra">
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
              @if ($edukasimitra->count())
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>LINK</th>
                    <th>KETERANGAN</th>
                  <th class="text-center">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($edukasimitra as $data)
                      <tr>
                        {{-- <td>{{ ($edukasimitra->currentPage() - 1) * $edukasimitra->perPage() + $loop->iteration }}</td> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($data->link, 30) }}</td>
                        <td>{{ Str::limit($data->keterangan, 40) }}</td>
                        <td class="text-center">
                          <a href="/admin/edukasimitra/{{ $data->id }}"><i class="fas fa-eye text-secondary me-lg-2"></i></a>
                          <a href="/admin/edukasimitra/{{ $data->id }}/edit"><i class="fas fa-edit text-warning"></i></a>
                          <form action="/admin/edukasimitra/{{ $data->id }}" method="post" class="d-inline">
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
                      <th>LINK</th>
                      <th>KETERANGAN</th>
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
      {{ $edukasimitra->links() }}
    </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection