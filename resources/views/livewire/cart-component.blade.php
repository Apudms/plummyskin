<div class="container py-4">
	<div class="row d-flex justify-content-center align-items-center">
		<div class="col-12">
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h3 class="fw-normal mb-0 text-black">Keranjang Belanja</h3>
			</div>
			<div class="card rounded-3">
				
				@if (Cart::instance('cart')->count() > 0)
					<div class="card-body p-4">
						<div class="border-bottom row mb-4 align-items-center">
							<div class="mb-3 text-end">
								<button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus semua produk?')" wire:click.prevent="destroyAll()"><i class="fas fa-trash fa-lg"></i> <strong>Hapus Semua</strong></button>
							</div>
						</div>
						@if (session()->has('success_message'))
							<div class="alert alert-success alert-dismissible show fade">
								{{ session('success_message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						@foreach (Cart::instance('cart')->content() as $item)
							<div class="row d-flex mb-4 pb-4 border-bottom justify-content-between align-items-center">
								<div class="col-md-4 col-lg-2 col-xl-2 mb-2">
									<img src="{{ asset('storage/'. $item->fotoProduk ) }}"
										class="img-fluid rounded-3" alt="{{ $item->slug }}">
								</div>
								<div class="col-lg-3 col-xl-4">
									<p class="lead fw-normal mb-2">{{ $item->name }}</p>
								</div>
								<div class="col-md-3 col-lg-2 col-xl-1 col-3">
									<input id="form1" min="0" name="quantity" value="{{ $item->qty }}" type="text"
										class="form-control"/>
								</div>
								<div class="col-md-3 col-lg-1 col-xl-1 col-3 d-flex justify-content-center">
									<button class="btn btn-increase" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i class="fas fa-plus"></i></button>
									<button class="btn btn-decrease" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i class="fas fa-minus"></i></button>
								</div>
								<div class="col-md-5 col-lg-3 col-xl-2 col-4">
									<h5 class="mb-0 text-center">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</h5>
								</div>
								<div class="col-md-1 col-lg-1 col-xl-1 col-2">
									<button type="submit" class="btn text-danger" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="fas fa-trash fa-lg"></i></button>
								</div>
							</div>
						@endforeach
						<div class="row align-items-center">
							<div class="col-md-3 col-lg-6 col-xl-5"></div>
							<div class="col-md-3 col-lg-2 col-xl-3 col-3">
								<h5 class="mb-2"><b>Total Harga</b></h5>
							</div>
							<div class="col-md-3 col-lg-2 col-xl-2 col-5">
								<h5 class="mb-2"><b>Rp {{ number_format(Cart::instance('cart')->subtotal() * 1000, 0, ',', '.') }}</b></h5>
							</div>
							<div class="col-md-3 col-lg-2 col-xl-2 col-2 text-end">
								<button wire:click.prevent="checkout" type="submit" class="btn btn-warning text-white px-4 btn-block btn-lg"><b>Pesan</b></button>
							</div>
						</div>
					</div>
				@else
				<div class="card-body p-4">
					<p class="fw-normal mb-0 text-secondary text-center">Belum ada produk yang ditambahkan!</p>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
