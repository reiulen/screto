<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Screto Gabut</title>
  </head>
  <body>

    <section class="bg-primary fixed-top">
        <div class="container d-flex">
            <ul class="navbar-nav me-auto ">
                <li class="nav-item">
                  <h4 class="nav-link text-white" >Screto Gabut</h4>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mt-2">
                <li class="nav-item">
                  <a class="text-white" href="{{ route('index') }}">Daftar</a>
                </li>
            </ul>
        </div>
    </section>

    @yield('content')

    <footer class="mb-3 text-center">
        <p class="text-muted text-small">Copyright &copy;Rei @2021</p>
    </footer>

<style>
    body{
        background-color: rgb(223, 223, 223) !important;
    }
    img[alt="www.000webhost.com"]{
     display:none;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
