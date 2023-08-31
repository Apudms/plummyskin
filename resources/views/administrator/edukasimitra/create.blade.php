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
              <form class="form" action="/admin/edukasimitra" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="link">Link</label>
                      <input type="text" @error('link') is-invalid @enderror id="link" class="form-control" placeholder="Link"
                        name="link" required value="{{ old('link') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" @error('keterangan') is-invalid @enderror id="keterangan" class="form-control" placeholder="Keterangan"
                        name="keterangan" required value="{{ old('keterangan') }}">
                    </div>
                  </div>
                  <div class="col-12 mt-4">
                    <a href="/admin/edukasimitra" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Batal</a>
                    <button type="submit" class="btn btn-success float-end"><i class="fas fa-plus-circle me-2"></i>Tambah</button>
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