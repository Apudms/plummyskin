<div class="container-fluid">
	<div class="row mb-4">
		<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a href="{{ route('reseller.profil.profilsaya') }}" class="nav-link text-white bg-warning">
							<i class="bi bi-person me-2"></i>
							Profil Saya
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.marketingkit') }}" class="nav-link link-dark">
							<i class="bi bi-cloud-arrow-down me-2"></i>
							Marketing Kit
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.edukasimitra') }}" class="nav-link link-dark">
							<i class="bi bi-book me-2"></i>
							Edukasi Mitra
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('reseller.profil.transaksi') }}" class="nav-link link-dark">
							<i class="bi bi-cart me-2"></i>
							Transaksi
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h3">Profil Saya</h1>
			</div>

			@if (session()->has('success_message'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>{{ session('success_message') }}</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif

			<div class="card-body">
				<form class="form form-vertical" wire:submit.prevent="updateReseller">
					@method('put')
					@csrf
					<div class="form-body">
						<div class="row">

							<div class="col-md-6 col-12">
								<div class="form-group mb-3 mt-2">
									@if ($newFoto)
										<div style="max-height: 220px; max-width: 220px; overflow: hidden;">
											<img src="{{ $newFoto->temporaryUrl() }}" class="img-fluid" alt="{{ $newFoto->temporaryUrl() }}" width="220" height="220">
										</div>
									@elseif(auth('reseller')->user()->foto)
										<div style="max-height: 220px; max-width: 220px; overflow: hidden;">
											<img src="{{ asset('storage/photo-profile-resellers/' . auth('reseller')->user()->foto) }}" class="img-fluid" alt="{{ auth('reseller')->user()->foto }}" width="220" height="220">
										</div>
									@else
										<div style="max-height: 220px; max-width: 220px; overflow: hidden;">
											<img src="{{ asset('/dist') }}/images/faces/3.jpg" class="img-fluid" alt="{{ auth('reseller')->user()->foto }}">
										</div>
									@endif
								</div>
								<div class="form-group mb-4">
									<label class="form-label" for="foto">Ubah Foto Profil</label>
									<input type="file" @error('foto') is-invalid @enderror id="foto" class="form-control" name="foto" wire:model="newFoto">
								</div>
								<div class="form-group mb-4">
									<label for="namaDepan">Nama Depan</label>
									<input type="text" @error('namaDepan') is-invalid @enderror id="namaDepan" class="form-control" name="namaDepan"
									placeholder="Nama Depan" required value="{{ old('namaDepan', auth('reseller')->user()->namaDepan) }}" wire:model="namaDepan">
										</div>
								<div class="form-group mb-4">
									<label for="namaBelakang">Nama Belakang</label>
									<input type="text" @error('namaBelakang') is-invalid @enderror id="namaBelakang" class="form-control" name="namaBelakang"
									placeholder="Nama Belakang (Opsi)" value="{{ old('namaBelakang', auth('reseller')->user()->namaBelakang) }}" wire:model="namaBelakang">
								</div>
								<div class="form-group mb-4">
									<label for="jenisKelamin">Jenis Kelamin</label>
									<fieldset class="form-group mb-4">
										<select class="form-select" id="jenisKelamin" name="jenisKelamin" wire:model="jenisKelamin">
											@if (auth('reseller')->user()->jenisKelamin == "Laki-laki")
												<option value="Laki-laki" selected>Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
											@else
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan" selected>Perempuan</option>
											@endif
										</select>
									</fieldset>
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group mb-4">
									<label for="tempatLahirp">Tempat Lahir</label>
									<input type="text" @error('tempatLahir') is-invalid @enderror id="tempatLahir" class="form-control" name="tempatLahir"
									placeholder="Tempat Lahir" value="{{ old('tempatLahir', auth('reseller')->user()->tempatLahir) }}" wire:model="tempatLahir">
								</div>
								<div class="form-group mb-4">
									<label for="tanggalLahirp">Tanggal Lahir</label>
									<input type="text" @error('tanggalLahir') is-invalid @enderror id="tanggalLahir" class="form-control" name="tanggalLahir"
									placeholder="Tanggal Lahir" value="{{ old('tanggalLahir', auth('reseller')->user()->tanggalLahir) }}" wire:model="tanggalLahir">
								</div>
								<div class="form-group mb-4">
									<label for="alamat">Alamat</label>
									<input type="text" @error('alamat') is-invalid @enderror id="alamat" class="form-control" name="alamat"
									placeholder="Alamat" value="{{ old('alamat', auth('reseller')->user()->alamat) }}" wire:model="alamat">
								</div>
								<div class="form-group mb-4">
									<label for="wilayah">Distributor (Wilayah)</label>
									<input type="text" @error('wilayah') is-invalid @enderror id="wilayah" class="form-control" name="wilayah"
									placeholder="wilayah" disabled value="{{ old('wilayah', auth('reseller')->user()->distributor->namaDepan) }} ({{ old('wilayah', auth('reseller')->user()->distributor->wilayah) }})">
								</div>
								<div class="form-group mb-4">
									<label for="email">Email</label>
									<input type="email" @error('email') is-invalid @enderror id="email" class="form-control" name="email"
									placeholder="email" disabled value="{{ old('email', auth('reseller')->user()->email) }}">
								</div>
								<div class="form-group mb-4">
									<label for="noTelp">Nomor Telepon</label>
									<input type="text" @error('noTelp') is-invalid @enderror id="noTelp" class="form-control" name="noTelp"
									placeholder="Nomor Telepon" value="{{ old('noTelp', auth('reseller')->user()->noTelp) }}" wire:model="noTelp">
								</div>
								<div class="form-group mb-4">
									<label for="password">Password</label>
									<input type="password" @error('password') is-invalid @enderror id="password" class="form-control" name="password"
									placeholder="Password" value="{{ old('password', auth('reseller')->user()->password) }}">
								</div>
								<div class="form-group mb-4">
									<label for="password">Password Baru</label>
									<input type="password" @error('password') is-invalid @enderror id="password" class="form-control" name="password"
									placeholder="Password" value="{{ old('password', auth('reseller')->user()->password) }}" wire:model="newPassword">
								</div>
							</div>

							<div class="col-12 d-flex justify-content-end mt-2">
								<button type="submit" class="btn btn-primary me-2 mb-1">Ubah</button>
								<button type="reset" class="btn btn-outline-secondary mb-1">Reset</button>
							</div>
							
						</div>                
					</div>
				</form>
			</div>
		</main>
	</div>
</div>
