<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Masuk Sebagai Reseller</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../../css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">

    @if (session()->has('loginGagal'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Login gagal!</strong> Silahkan coba lagi!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="{{ route('reseller.handleLogin') }}" method="post">
      @csrf
      <a href="/">
        <img class="mb-4" src="../../../img/logo.png" alt="../../../img/logo.png" width="100" height="40">
      </a>
      <h1 class="h4 mb-3 fw-normal">Masuk Sebagai Reseller</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control form-control-xl"
        id="email" placeholder="Email" autofocus required>
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control form-control-xl"
        id="password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-warning" type="submit">Masuk</button>
      <p class="mt-5 mb-3 text-muted">2022 &copy;Plummystore</p>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>