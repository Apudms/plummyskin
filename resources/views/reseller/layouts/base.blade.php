<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="{{ asset('/css') }}/mystyle.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/dist') }}/vendors/bootstrap-icons/bootstrap-icons.css">
  @yield('cssOpsi')
  @livewireStyles

  {{-- <title>Plummyskin | {{ $title }}</title> --}}
  <title>Plummyskin | Masker Organik</title>

  <link rel="shortcut icon" href="{{ asset('/img') }}/logo.png">
  
</head>

<body>

  @livewire('navbar-component')  
  {{-- @yield('container') --}}
  {{$slot}}
  
  <footer class="d-flex flex-wrap justify-content-center py-3 border-top">
    <div class="footer clearfix mb-0 text-muted">
      <div class="float-start">
        <p>2022 &copy; Plummystore</p>
      </div>
    </div>
  </footer>
    
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  @yield('jsOpsi')
  @livewireScripts
</body>

</html>