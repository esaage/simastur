<!-- 

  Created by Esa Age Gian Putra - https://esaage.com - esaagegianputra@gmail.com
  May 2022

 -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMASTUR | @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            /* font-family: ar; */
            /* -webkit-font-smoothing: antialiased; */
        }
        header .title, header .nav-link {
            color: #333 !important;
            /* font-weight: 700 */
        }
        .title {
            padding: 10px
        }
    </style>

    @yield('css')

  </head>
  <body>
    
    
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
              <img src="/logo.png" alt="Logo Kabupaten Ngawi" width="45px"> SIMASTUR KAB NGAWI</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/maps">Jelajah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Pencarian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/auth">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
      <header class="d-flex flex-wrap justify-content-center py-3 px-5">
          <a href="/" class="d-flex mb-2 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="/logo.png" alt="Logo Kabupaten Ngawi" width="60px" height="auto">
            <h5 class="title">SIMASTUR PEMERINTAH KABUPATEN NGAWI
              <br>
              <span>Sistem Manajemen Infrastruktur</span>
            </h5>
          </a>
            
        <ul class="nav">
          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/maps" class="nav-link active">Jelajah</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pencarian</a></li>
          <li class="nav-item"><a href="/auth" class="nav-link">Login</a></li>
        </ul>
      </header>




        @yield('content')        





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @yield('js')
  </body>
</html>