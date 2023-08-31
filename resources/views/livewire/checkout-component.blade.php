<div class="container py-4">
	<div class="text-center mb-5">
		<h2>Formulir Pemesanan</h2>
	</div>

	<form class="needs-validation" wire:submit.prevent="placeOrder">
		<div class="row g-5">
			<div class="col-md-5 col-lg-4 order-md-last">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-warning">Daftar Produk</span>
					<span class="badge bg-warning rounded-pill">{{ $cart_count }}</span>
				</h4>
				<ul class="list-group mb-3">
					@foreach (Cart::instance('cart')->content() as $item)
						<li class="list-group-item d-flex justify-content-between lh-sm">
							<div>
								<h6 class="my-0">{{ $item->name }}</h6>
								<small class="text-muted">x {{ $item->qty }}</small>
							</div>
							<span class="text-muted">Rp {{ number_format($item->subtotal, 0, ',','.') }}</span>
						</li>
					@endforeach
					<li class="list-group-item d-flex justify-content-between">
						<span>Subtotal</span>
						Rp {{ number_format(Session::get('checkout')['subtotal'], 0, ',','.') }}
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<span>Ongkir</span>
						Rp {{ number_format(20000, 0, ',','.') }}
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<span>Total</span>
						Rp {{ number_format(Session::get('checkout')['total'], 0, ',','.') }}
					</li>
				</ul>
			</div>
			<div class="col-md-7 col-lg-8">
				<h4 class="mb-3">Alamat Pengiriman</h4>

				<div class="row g-3">
					<div class="col-sm-6">
						<label for="firstname" class="form-label">Nama Depan</label>
						<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nama Depan" required wire:model="firstname">
						@error('firstname')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-sm-6">
						<label for="lastname" class="form-label">Nama Belakang</label>
						<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nama Belakang" required wire:model="lastname">
						@error('lastname')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-12">
						<label for="noTelp" class="form-label">Nomor Telepon</label>
						<input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="Nomor Telepon Aktif / Whatsapp" required wire:model="noTelp">
						@error('noTelp')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-12">
						<label for="email" class="form-label">Email <span class="text-muted">(Opsi)</span></label>
						<input type="email" class="form-control" id="email" name="email" placeholder="@gmail.com" wire:model="email">
					</div>

					<div class="col-12 col-md-8">
						<label for="alamat" class="form-label">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" required wire:model="alamat">
						@error('alamat')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-md-4">
						<label for="kecamatan" class="form-label">Kecamatan</label>
						<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required wire:model="kecamatan">
						@error('kecamatan')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-md-4">
						<label for="kabupaten" class="form-label">Kota/Kabupaten</label>
						<input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kota/Kabupaten" required wire:model="kabupaten">
						@error('kabupaten')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-md-4">
						<label for="provinsi" class="form-label">Provinsi</label>
						<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" required wire:model="provinsi">
						@error('provinsi')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<div class="col-md-4">
						<label for="kodepos" class="form-label">Kode Pos</label>
						<input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="" required wire:model="kodepos">
						@error('kodepos')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<hr class="my-4">

				<h4 class="mb-3">Metode Pembayaran</h4>

				<div class="form-check">
					<input id="bank" name="paymentMethod" type="checkbox" class="form-check-input" value="Bank" required wire:model="transfer">
					<label class="form-check-label" for="bank">Transfer Bank</label>
					@error('transfer')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>

				<hr class="my-4">
				
				@if (Session::has('checkout'))
					<h5 class="mb-3">Total Pembayaran</h5>
					<strong class="text-warning h5">Rp {{ number_format(Session::get('checkout')['total'], 0, ',','.') }}</strong>
					<hr class="my-4">
				@endif

				<button class="w-100 btn btn-warning btn-lg text-light" type="submit"><b>Pesan Produk</b></button>
				
			</div>
		</div>
	</form>
</div>