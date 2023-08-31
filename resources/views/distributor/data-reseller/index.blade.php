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
            <form class="float-start" action="/distributor/data-reseller">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search text-light"></i></button>
              </div>
            </form>
          </div>

          <div class="card-content">
            <div class="table-responsive">
              @if ($reseller->count())
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>BERGABUNG SEJAK</th>
                    <th>NAMA</th>
                    <th>NO TELEPON</th>
                    <th>ALAMAT</th>
                    <th class="text-center">DETAIL</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($reseller as $data)
                      <tr>
                        <td>{{ ($reseller->currentPage() - 1) * $reseller->perPage() + $loop->iteration }}</td>
                        <td>{{ $data->created_at->format('d F Y') }}</td>
                        <td>{{ $data->namaDepan }} {{ $data->namaBelakang }}</td>
                        <td>{{ $data->noTelp }}</td>
                        <td>{{ Str::limit($data->alamat, 35) }}</td>
                        <td class="text-center"><a href="/distributor/data-reseller/{{ $data->id }}"><i class="fas fa-eye text-secondary me-lg-2"></i></a></td>
                      </tr>                      
                    @endforeach
                  </tbody>
                </table>
              @else
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>BERGABUNG SEJAK</th>
                      <th>NAMA</th>
                      <th>NO TELEPON</th>
                      <th>ALAMAT</th>
                      <th class="text-center">DETAIL</th>
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
      {{ $reseller->links() }}
    </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection