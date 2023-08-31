@extends('distributor.layouts.main')

@section('cssOpsi')
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/iconly/bold.css">
@endsection

@section('container')

  {{-- Distributor --}}
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon purple">
                      <i class="iconly-boldUser"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Reseller</h6>
                    <h6 class="font-extrabold mb-0">{{ $reseller->count() }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon blue">
                      <i class="iconly-boldBag-2"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Produk</h6>
                    <h6 class="font-extrabold mb-0">{{ $produks->count() }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-icon green">
                      <i class="iconly-boldHeart"></i>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Penghasilan</h6>
                    <h6 class="font-extrabold mb-0">
                      @foreach ($penghasilan as $p)
                        Rp {{ number_format($p->hasil, 0, ',','.') }}
                      @endforeach
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Repeat Order Reseller</h4>
              </div>
              <div class="card-body">
                <div id="chart-profile-visit"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

@section('jsOpsi')
  <script src="{{ asset('/dist') }}/vendors/apexcharts/apexcharts.js"></script>
  <script src="{{ asset('/dist') }}/js/pages/dashboard.js"></script>
@endsection