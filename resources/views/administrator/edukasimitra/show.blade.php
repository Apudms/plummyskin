@extends('administrator.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/fontawesome/all.min.css">
  <x-embed-styles />
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
                        <div class="card-content">
                          <x-embed url="{{ $edukasimitra->link }}" />
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><small>Ditambahkan pada : {{ $edukasimitra->created_at->format('d F Y') }}</small></li>
                          <li class="list-group-item"><b>{{ $edukasimitra->keterangan }}</b></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-start mt-4">
                      <a href="/admin/edukasimitra" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-lg-2"></i>Kembali</a>
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