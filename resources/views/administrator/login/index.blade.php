<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin | Plummystore</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/dist') }}/css/bootstrap.css">
	<link rel="stylesheet" href="{{ asset('/dist') }}/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="{{ asset('/dist') }}/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="{{ asset('/dist') }}/css/app.css">
	<link rel="stylesheet" href="{{ asset('/dist') }}/css/pages/auth.css">
</head>

<body>
	<div id="auth">

		<div class="row h-100">
			<div class="col-lg-5 col-12">
				<div id="auth-left">
					<h3 class="mb-4"><b>Masuk Sebagai Admin</b></h3>

					@if (session()->has('loginGagal'))
						<div class="alert alert-danger alert-dismissible show fade">
							{{ session('loginGagal') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					<form action="{{ route('admin.handleLogin') }}" method="post">
            @csrf
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="email" name="email" class="form-control form-control-xl"
							id="email" placeholder="Email" autofocus required>
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" name="password" class="form-control form-control-xl"
							id="password" placeholder="Password" required>
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Masuk</button>
					</form>
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">
					{{-- <img src="../../../img/pencils-colorful.jpg" class="img-fluid" style="height: 100%" alt=""> --}}
				</div>
			</div>
		</div>

	</div>
	<script src="{{ asset('/dist') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="{{ asset('/dist') }}/js/bootstrap.bundle.min.js"></script>

	<script src="{{ asset('/dist') }}/js/main.js"></script>
</body>

</html>