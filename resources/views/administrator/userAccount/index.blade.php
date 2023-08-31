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
  
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
  
            <div class="card-body">
              <form class="form form-vertical" action="/admin/pengaturan-akun/{{ auth('admin')->user()->id }}" method="post">
                @method('put')
                @csrf
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <img src="{{ auth('admin')->user()->foto }}" class="rounded" alt="{{ auth('admin')->user()->foto }}" width="200" height="200"> 
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="foto">Ubah Foto Profil</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" @error('nama') is-invalid @enderror id="nama" class="form-control" name="nama"
                        placeholder="Nama" required value="{{ old('nama', auth('admin')->user()->nama) }}">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" @error('email') is-invalid @enderror id="email" class="form-control" name="email"
                        placeholder="Email" required value="{{ old('email', auth('admin')->user()->email) }}">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password"
                          placeholder="Password" required value="{{ old('password', auth('admin')->user()->password) }}">
                      </div>
                    </div>

                    <div class="col-12 mt-4">
                      <button type="submit" class="btn btn-warning text-dark float-end"><i class="fas fa-edit me-2"></i>Ubah</button>
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