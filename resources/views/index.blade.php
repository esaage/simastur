@extends('layout.front.index')
@section('title', 'Home')
    
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/assets/images/jamus.jpg" class="d-block w-100" alt="Kebun Teh Jamus">
            <div class="carousel-caption d-none d-md-block mb-5">
              <h5>Kebun Teh Jamus</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur provident laboriosam iste earum alias ratione quae adipisci repudiandae est</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/assets/images/kartonyono.jpg" class="d-block w-100" alt="Tugu Kartonyono">
            <div class="carousel-caption d-none d-md-block mb-5">
              <h5>Tugu Kartonyono</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur provident laboriosam iste earum alias ratione quae adipisci repudiandae est</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/assets/images/waduk-pondok.png" class="d-block w-100" alt="Waduk Pondok">
            <div class="carousel-caption d-none d-md-block mb-5">
              <h5>Waduk Pondok</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur provident laboriosam iste earum alias ratione quae adipisci repudiandae est</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    <div class="container">
       
    </div>

    <footer class="footer p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12">
                    <h3>Tentang Kami</h3>
                    <p>SIMASTUR Kabupaten Ngawi</p>
                    <p>&copy; Sistem Manajemen Infrastruktur Kabupaten Ngawi</p>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <h3>Kontak Kami</h3>
                    <p>Pemerintah Kabupaten Ngawi
                        Jl. Teuku Umar No 12, Ngawi, 63211, Jawa Timur, Indonesia</p>
                    <p>Email: bappedangawi053@gmail.com</p>
                    <p>Telp: 0351746709</p>
                    <p>Cax: 0351743097</p>
                </div>

                <div class="col-md-2 col-lg-2 col-xs-12">
                    <img src="/logo.png" alt="Logo Kabupaten Ngawi" width="100px">
                </div>
            </div>
        </div>
    </footer>
@endsection

@section('css')

    <style>
        footer {
            background: #e3e3e3;
            
        }
    </style>
@endsection