@section('cssOpsi')
  <style>
    .breadcrumb-item+.breadcrumb-item::before {
      content: ">"
    }

    .breadcrumb {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      padding: .1rem 0rem !important;
      margin-bottom: 0rem;
      list-style: none;
      background-color: #ffffff;
      border-radius: .25rem
    }

    .single_product {
      padding-top: 66px;
      padding-bottom: 140px;
      background-color: #e5e5e5;
      margin-top: 0px;
      padding: 17px
    }

    .product_name {
      font-size: 25px;
      font-weight: 400;
      margin-top: 0px
    }

    .product-rating {
      margin-top: 10px
    }

    .rating-review {
      color: #5b5b5b
    }

    .product_price {
      display: inline-block;
      font-size: 30px;
      font-weight: 500;
      margin-top: 9px;
      clear: left
    }

    .product_discount {
      display: inline-block;
      font-size: 17px;
      font-weight: 300;
      margin-top: 9px;
      clear: left;
      margin-left: 10px;
      color: red
    }

    .product_saved {
      display: inline-block;
      font-size: 15px;
      font-weight: 200;
      color: #999999;
      clear: left
    }

    .singleline {
      margin-top: 1rem;
      margin-bottom: .40rem;
      border: 0;
      border-top: 1px solid rgba(0, 0, 0, .1)
    }

    .product_info {
      color: #4d4d4d;
      display: inline-block
    }

    .product_options {
      margin-bottom: 10px
    }

    .product_description {
      padding-left: 0px
    }

    .product_quantity {
      width: 104px;
      height: 47px;
      border: solid 1px #e5e5e5;
      border-radius: 3px;
      overflow: hidden;
      padding-left: 8px;
      padding-top: -4px;
      padding-bottom: 44px;
      float: left;
      margin-right: 22px;
      margin-bottom: 11px
    }

    .order_info {
      margin-top: 18px
    }

    .shop-button {
      height: 47px
    }

    .product_fav i {
      line-height: 44px;
      color: #cccccc
    }

    .product_fav {
      display: inline-block;
      width: 52px;
      height: 46px;
      background: #FFFFFF;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
      border-radius: 11%;
      text-align: center;
      cursor: pointer;
      margin-left: 3px;
      -webkit-transition: all 200ms ease;
      -moz-transition: all 200ms ease;
      -ms-transition: all 200ms ease;
      -o-transition: all 200ms ease;
      transition: all 200ms ease
    }

    .br-dashed {
      border-radius: 5px;
      border: 1px dashed #dddddd;
      margin-top: 6px
    }

    .pr-info {
      margin-top: 2px;
      padding-left: 2px;
      margin-left: -14px;
      padding-left: 0px
    }

    .break-all {
      color: #5e5e5e
    }

    .image_selected {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: calc(100% + 15px);
      height: 525px;
      -webkit-transform: translateX(-15px);
      -moz-transform: translateX(-15px);
      -ms-transform: translateX(-15px);
      -o-transform: translateX(-15px);
      transform: translateX(-15px);
      border: solid 1px #e8e8e8;
      box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 15px
    }

    .image_list li {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 165px;
      border: solid 1px #e8e8e8;
      box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1) !important;
      margin-bottom: 15px;
      cursor: pointer;
      padding: 15px;
      -webkit-transition: all 200ms ease;
      -moz-transition: all 200ms ease;
      -ms-transition: all 200ms ease;
      -o-transition: all 200ms ease;
      transition: all 200ms ease;
      overflow: hidden
    }

    @media (max-width: 390px) {
      .product_fav {
        display: none
      }
    }

    .bbb_combo {
      width: 100%;
      margin-right: 7%;
      padding-top: 21px;
      padding-left: 20px;
      padding-right: 20px;
      padding-bottom: 24px;
      border-radius: 5px;
      margin-top: 0px;
      text-align: -webkit-center
    }

    .bbb_combo_image {
      width: 170px;
      height: 170px;
      margin-bottom: 15px
    }

    .fs-10 {
      font-size: 10px
    }

    .step {
      background: #167af6;
      border-radius: 0.8em;
      -moz-border-radius: 0.8em;
      -webkit-border-radius: 6.8em;
      color: #ffffff;
      display: inline-block;
      font-weight: bold;
      line-height: 3.6em;
      margin-right: 5px;
      text-align: center;
      width: 3.6em;
      margin-top: 116px
    }

    .row-underline {
      content: "";
      display: block;
      border-bottom: 2px solid #ffe6d2;
      margin: 0px 0px;
      margin-bottom: 20px;
      margin-top: 15px
    }

    .deal-text {
      margin-left: -10px;
      font-size: 25px;
      margin-bottom: 10px;
      color: #000;
      font-weight: 700
    }

    .padding-0 {
      padding-left: 0;
      padding-right: 0
    }

    .padding-2 {
      margin-right: 2px;
      margin-left: 2px
    }

    .vertical-line {
      display: inline-block;
      border-left: 3px solid #167af6;
      margin: 0 10px;
      height: 364px;
      margin-top: 4px
    }

    .p-rating {
      color: green
    }

    .combo-pricing-item {
      display: flex;
      flex-direction: column
    }

    .boxo-pricing-items {
      display: inline-flex
    }

    .combo-plus {
      margin-left: 10px;
      margin-right: 18px;
      margin-top: 10px
    }

    .add-both-cart-button {
      margin-left: 36px
    }

    .items_text {
      color: #b0b0b0
    }

    .combo_item_price {
      font-size: 18px
    }

    .p_specification {
      font-weight: 500;
      margin-left: 22px
    }

    .mt-10 {
      margin-top: 10px
    }

    @charset "utf-8";
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

    * {
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
      text-shadow: rgba(0, 0, 0, .01) 0 0 1px
    }

    div {
      display: block;
      position: relative;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box
    }

    ul {
      list-style: none;
      margin-bottom: 0px
    }

    .single_product {
      padding-top: 16px;
      padding-bottom: 140px
    }

    .image_list li {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 165px;
      border: solid 1px #e8e8e8;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
      cursor: pointer;
      padding: 15px;
      -webkit-transition: all 200ms ease;
      -moz-transition: all 200ms ease;
      -ms-transition: all 200ms ease;
      -o-transition: all 200ms ease;
      transition: all 200ms ease;
      overflow: hidden
    }

    .image_list li:last-child {
      margin-bottom: 0
    }

    .image_list li:hover {
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3)
    }

    .image_list li img {
      max-width: 100%
    }

    .image_selected {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: calc(100% + 15px);
      height: 525px;
      -webkit-transform: translateX(-15px);
      -moz-transform: translateX(-15px);
      -ms-transform: translateX(-15px);
      -o-transform: translateX(-15px);
      transform: translateX(-15px);
      border: solid 1px #e8e8e8;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 15px
    }

    .image_selected img {
      max-width: 100%
    }

    .product_category {
      font-size: 12px;
      color: rgba(0, 0, 0, 0.5)
    }

    .product_rating {
      margin-top: 7px
    }

    .product_rating i {
      margin-right: 4px
    }

    .product_rating i::before {
      font-size: 13px
    }

    .product_text {
      margin-top: 27px
    }

    .product_text p:last-child {
      margin-bottom: 0px
    }

    .order_info {
      margin-top: 16px
    }

    .product_quantity {
      width: 182px;
      height: 50px;
      border: solid 1px #e5e5e5;
      border-radius: 5px;
      overflow: hidden;
      padding-left: 25px;
      float: left;
      margin-right: 30px
    }

    .product_quantity span {
      display: block;
      height: 50px;
      font-size: 16px;
      font-weight: 300;
      color: rgba(0, 0, 0, 0.5);
      line-height: 50px;
      float: left
    }

    .product_quantity input {
      display: block;
      width: 30px;
      height: 50px;
      border: none;
      outline: none;
      font-size: 16px;
      font-weight: 300;
      color: rgba(0, 0, 0, 0.5);
      text-align: left;
      padding-left: 9px;
      line-height: 50px;
      float: left
    }

    .quantity_buttons {
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
      width: 29px;
      border-left: solid 1px #e5e5e5
    }

    .quantity_inc,
    .quantity_dec {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      height: 50%;
      cursor: pointer
    }

    .quantity_control i {
      font-size: 11px;
      color: rgba(0, 0, 0, 0.3);
      pointer-events: none
    }

    .quantity_control:active {
      border: solid 1px rgba(14, 140, 228, 0.2)
    }

    .quantity_inc {
      padding-bottom: 2px;
      justify-content: flex-end;
      border-top-right-radius: 5px
    }

    .quantity_dec {
      padding-top: 2px;
      justify-content: flex-start;
      border-bottom-right-radius: 5px
    }
  </style>
@endsection

<div class="container py-4 pb-0">
	<div class="container-fluid" style=" background-color: #fff; padding: 11px;">
		<div class="row">
			<div class="col-lg-6 order-lg-2 order-1">
				<div class="image_selected">
					<img src="{{ asset('storage/'. $product->fotoProduk ) }}" alt="{{ $product->slug }}">
				</div>
			</div>
			<div class="col-lg-6 order-3">
				<div class="product_description">
					<div class="product_name">{{ $product->name }}</div>
					<div>
						<span class="product_price">Rp {{ number_format($product->price, 0, ',','.') }}</span>
					</div>
					<hr class="singleline">
					<div class="row">
						<div class="col-12">
							<table class="col-12">
								<tbody>
									<tr class="row mt-10">
										<td class="col-3">
											<span>Status</span>
										</td>
										<td class="col-9">
											<ul>
												<li>: {{ $product->stok }}</li>
											</ul>
										</td>
									</tr>
									<tr class="row mt-10">
										<td class="col-3">
											<span>Berat</span>
										</td>
										<td class="col-9">
											<ul>
												<li>: {{ $product->berat }}</li>
											</ul>
										</td>
									</tr>
									<tr class="row mt-10">
										<td class="col-3">
											<span>Jenis Kulit</span>
										</td>
										<td class="col-9">
											<ul>
												<li>: {{ $product->jnsKulit }}</li>
											</ul>
										</td>
									</tr>
									<tr class="row mt-10">
										<td class="col-3">
											<span>Masa Penyimpanan</span>
										</td>
										<td class="col-9">
											<ul>
												<li>: {{ $product->masaSimpan }}</li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<hr class="singleline mb-4">
					@if (session()->has('success_message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{ session('success_message') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
					@endif
          <div class="row">
            @if ($product->distributor_id !== auth('reseller')->user()->distributor_id)
                <h5 class="text-danger">*Produk ini hanya bisa dibeli oleh reseller dari distributor wilayah <strong>{{ $product->distributor->wilayah }}</strong>!</h5>
            @else
              <form wire:submit.prevent="addToCart({{ $product->id }})" method="POST">
              @csrf
                <div class="col-md-12 col-lg-12 col-xl-12 col-12 d-flex">
                  <input wire:model="quantity.{{ $product->id }}" id="quantity_input" type="number" pattern="[0-9]*" value="1" class="text-center col-lg-6 col-xl-4 col-5">
                  <button type="submit" class="btn btn-warning text-white col-lg-6 col-xl-8 col-7 ms-2">Tambah ke Keranjang</button>
                </div>
              </form>
            @endif
					</div>
				</div>
			</div>
		</div>
		<div class="row row-underline mt-5">
			<div class="col-6">
				<span class=" deal-text">Deskripsi Produk</span>
			</div>
			<div class="col-6">
				<a href="#" data-abc="true">
					<span class="ml-auto view-all"></span>
				</a> 
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-12">
				<table class="col-12">
					<tbody>
						<tr class="row mt-10">
							<td class="col-12">
								<span>
									{{ $product->deskripsi }}
								</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>