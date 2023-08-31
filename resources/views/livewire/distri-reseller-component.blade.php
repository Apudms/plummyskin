<div class="container py-4 pb-0">
    <div class="row mb-4">
      @if ($distributors->count())
        @foreach ($distributors as $distributor)
          <div class="col-sm-4">
            <div class="card shadow mb-4">
              <div class="card-body text-center">
                <h3 class="card-title">{{ $distributor->namaDepan }} {{ $distributor->namaBelakang }}</h3>
                <h5 class="card-text mb-3">{{ $distributor->wilayah }}</h5>
                <a href="{{ route('distritoko.detail', ['slug' => $distributor->slug]) }}" class="btn btn-warning text-white">Lihat Toko</a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="card-body text-center">
          <h3 class="text-warning">*Distributor tidak ditemukan!</h3>
        </div>
      @endif
    </div>  
  </div>
    