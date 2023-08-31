@extends('administrator.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
@endsection

@section('container')
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <form class="form form-horizontal">
                <div class="form-body">
                  <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 form-group">
                      <div class="card">
                        @if ($marketingkit->tipe == 'Foto')
                          <div class="card-content" style="width: 20rem;">
                            <img src="{{ asset('storage/'. $marketingkit->kit) }}"
                            class="img-fluid" alt="{{ $marketingkit->keterangan }}">
                          </div>
                        @else
                          <div class="card-content" style="width: 20rem;">
                            <video width="320" height="240" controls>
                              <source src="{{ asset('storage/'. $marketingkit->kit) }}" type="video/mp4">
                            </video>
                          </div>
                        @endif
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><b>{{ $marketingkit->keterangan }}</b></li>
                          <li class="list-group-item">Tipe : {{ $marketingkit->tipe }}</li>
                          <li class="list-group-item"><small>Ditambahkan pada : {{ $marketingkit->created_at->format('d F Y') }}</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-start mt-4">
                      <a href="/admin/marketingkit" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-lg-2"></i>Kembali</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/fontawesome/all.min.js"></script>
@endsection