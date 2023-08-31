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
              <form class="form" action="/admin/marketingkit/{{ $marketingkit->id }}" method="post"enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
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
                      <br>
                      <label for="kit">Kit</label>
                      <input type="file" @error('kit') is-invalid @enderror id="kit" class="form-control" placeholder="Upload File"
                        name="kit">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="tipe">Tipe</label>
                      <fieldset class="form-group">
                        <select class="form-select" id="tipe" name="tipe">
                          @if ($marketingkit->tipe == "Foto")
                            <option value="Foto" selected>Foto</option>
                            <option value="Video">Video</option>
                          @else
                            <option value="Foto">Foto</option>
                            <option value="Video" selected>Video</option>
                          @endif
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" @error('keterangan') is-invalid @enderror id="keterangan" class="form-control" placeholder="Keterangan"
                        name="keterangan" required value="{{ old('keterangan', $marketingkit->keterangan) }}">
                    </div>
                  </div>
                  <div class="col-12 mt-4">
                    <a href="/admin/marketingkit" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Batal</a>
                    <button type="submit" class="btn btn-warning text-dark float-end"><i class="fas fa-edit me-2"></i>Ubah</button>
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