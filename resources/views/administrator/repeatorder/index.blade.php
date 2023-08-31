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
            <form class="float-end" action="/administrator/repeatorder">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search text-light"></i></button>
              </div>
            </form>    
          </div>

          <div class="card-content">
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA RESELLER</th>
                    <th>DISTRIBUTOR</th>
                    <th>JUMLAH ORDER</th>
                    <th class="text-center">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>1</td>
                      <td>Fitri Yeni</td>
                      <td>Michele <b>(Bandar Lampung)</b></td>
                      <td><b>12</b> kali</td>
                      <td class="text-center">
                        <a href="/administrator/repeatorder/1"><i class="fas fa-eye text-secondary me-lg-2"></i></a>
                      </td>
                    </tr>                      
                </tbody>
              </table>
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