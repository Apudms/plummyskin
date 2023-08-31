<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Distributor | Plummystore</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  @include('distributor.partials.stylesheet')
	@yield('cssOpsi')

  <link rel="shortcut icon" href="{{ asset('/img') }}/logo.png" type="image/x-icon">
</head>

<body>
	<div id="app">
    @include('distributor.partials.sidebar')
  
    <div id="main" class='layout-navbar'>

      @include('distributor.partials.header')

			<div id="main-content">
        <div class="page-heading">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-6 order-md-1 order-last">
								<h3>{{ $title }}</h3>
							</div>
							@if ($title != "Dashboard")									
								<div class="col-12 col-md-6 order-md-2 order-first">
									<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="/distributor">Dashboard</a></li>
											<li class="breadcrumb-item {{ ($title === "Data Distributor" or $title === "Data Reseller" or $title === "Data Repeat Order"
											or $title === "Data Marketing Kit" or $title === "Data Edukasi Mitra" or $title === "Data Pengaturan Akun"
											or $title === "Data Produk" or $title === "Data Pesanan" or $title === "Data Penghasilan Saya") ? 'active' : '' }}" aria-current="page">{{ $title }}</li>
										</ol>
									</nav>
								</div>
							@endif
						</div>
					</div>
				</div>

				@yield('container')

        @include('distributor.partials.footer')

      </div>
      
		</div>
	</div>
  
  @include('distributor.partials.javascript')

	@yield('jsOpsi')

</body>

</html>