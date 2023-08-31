<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin | Plummystore</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  @include('administrator.partials.stylesheet')
	@yield('cssOpsi')

  <link rel="shortcut icon" href="{{ asset('/img') }}/logo.png" type="image/x-icon">
</head>

<body>
	<div id="app">
    @include('administrator.partials.sidebar')
  
    <div id="main" class='layout-navbar'>

      @include('administrator.partials.header')

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
											<li class="breadcrumb-item"><a href="/administrator">Dashboard</a></li>
											<li class="breadcrumb-item {{ Request::is('administrator/distributor', 'administrator/reseller') ? 'active' : '' }}" aria-current="page">{{ $title }}</li>
										</ol>
									</nav>
								</div>
							@endif
						</div>
					</div>
				</div>

				@yield('container')

        @include('administrator.partials.footer')

      </div>
      
		</div>
	</div>
  
  @include('administrator.partials.javascript')

	@yield('jsOpsi')

</body>

</html>