<!DOCTYPE html>
<html lang="en">
<head>

  <!-- meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- title -->
  <title>CV. AULIA MANDIRI</title>

  <!-- icon -->
  <link rel="shortcut icon" href="{{ asset('foto/') }}/logo.png">

  <!-- css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

</head>
<body id="home">

  <!-- navbar -->
  <div class="nav-container">
    <div class="nav-logo">
      <img src="{{asset('foto/')}}/logo.png" alt="" class="img-fluid" width="70">
    </div>
    <div class="nav-box nav-box1">
      <ul class="nav-list">
        <li><a href="#home">Home</a></li>
        <li><a href="#brand">Koran</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#book">Orders</a></li>
        <li class="active"><a href="{{ route('login') }}">Login</a></li>

      </ul>
    </div>
    <div class="nav-box nav-box2">
      <div class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- end of navbar -->

  <!-- header -->
  <section class="header">
    <div class="container-custom">
      <div class="header-content">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="py-4">
              <h1 class="text-poppins font-weight-bold m-0 text-white" data-aos="fade-up">CV. AULIA MANDIRI</h1>
              <p class="d-block text-light mb-3 mb-5" data-aos="fade-up" data-aos-delay="100">
                Mari Kita Lestarikan Budaya Membaca melalui Koran
              </p>
              <a href="#book" class="button button-orange" data-aos="zoom-in" data-aos-delay="150">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of header -->

  <!-- brand -->
  <section class="brand" id="brand">
    <div class="container-custom">
      <div class="brand-content">
        <div class="row">
          <div class="col-md-6 mx-auto mb-4">
            <div class="d-flex flex-column text-center">
              <h2 class="text-serif font-weight-bold" data-aos="fade-up">Support By</h2>
              <p class="d-block text-black-50" data-aos="fade-up" data-aos-delay="100">
                Memiliki Lebih dari 9+ Jenis Koran
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md mx-auto">
            <div class="d-flex justify-content-center align-items-center flex-wrap">
            @foreach ($koran as $item)        
              <img src="{{asset('foto/koran/')}}/{{$item->logo_brand}}" width="200" alt="" class="img-fluid my-3 mx-1" data-aos="zoom-in" data-aos-delay="150">
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of brand -->

 <!-- services -->
 <section class="services bg-light" id="services">
  <div class="container-custom">
    <div class="services-content">
      <div class="row">
        <div class="col-md-6 mx-auto mb-4">
          <div class="d-flex flex-column text-center">
            <h2 class="text-serif font-weight-bold m-0 text-body" data-aos="fade-up">Our Services</h2>
            {{-- <p class="d-block text-blavk-50" data-aos="fade-up" data-aos-delay="100">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sit harum ipsa ad nulla. Voluptate culpa, dolorem facere!
            </p> --}}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-services" data-aos="fade-up" data-aos-delay="150">
            <div class="card-services-header" data-aos="zoom-out" data-aos-delay="200">
            </div>
            <div class="card-services-body">
              <img src="{{ asset('foto/landing-page/') }}/1.png" alt="" width="200">
              <h3 class="text-serif font-weight-bold text-orange m-0" data-aos="fade-up" data-aos-delay="250">Memiliki Pelanggan Setia</h3>
              <p class="d-block text-black-50 mt-2" data-aos="fade-up" data-aos-delay="300">
                Kami memiliki kurang lebih 100 pelanggan yang menggunakan jasa kami mulai dari kantor-kantor instansi, sampai pribadi.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-services" data-aos="fade-up" data-aos-delay="200">
            <div class="card-services-header" data-aos="zoom-out" data-aos-delay="250">
            </div>
            <div class="card-services-body">
              <img src="{{ asset('foto/landing-page/') }}/2.png" alt="" width="200">
              <h3 class="text-serif font-weight-bold text-orange m-0" data-aos="fade-up" data-aos-delay="300">Mempunyai Banyak Variasi Koran</h3>
              <p class="d-block text-black-50 mt-2" data-aos="fade-up" data-aos-delay="350">
                Kami mempunyai 10 jenis variant koran yang berbeda yang bisa dipesan oleh pelanggan.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-services" data-aos="fade-up" data-aos-delay="250">
            <div class="card-services-header" data-aos="zoom-out" data-aos-delay="300">
            </div>
            <div class="card-services-body">
              <img src="{{ asset('foto/landing-page/') }}/3.png" alt="" width="200">
              <h3 class="text-serif font-weight-bold text-orange m-0" data-aos="fade-up" data-aos-delay="350">Pengiriman Cepat</h3>
              <p class="d-block text-black-50 mt-2" data-aos="fade-up" data-aos-delay="400">
                Jangan Khawatir koran tidak sampai, karena setiap pagi kurir kami siap mengantar koran dirumah / dikantor anda.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-services" data-aos="fade-up" data-aos-delay="300">
            <div class="card-services-header" data-aos="zoom-out" data-aos-delay="350">
            </div>
            <div class="card-services-body">
              <img src="{{ asset('foto/landing-page/') }}/4.png" alt="" width="200">
              <h3 class="text-serif font-weight-bold text-orange m-0" data-aos="fade-up" data-aos-delay="400">Terpercaya</h3>
              <p class="d-block text-black-50 mt-2" data-aos="fade-up" data-aos-delay="450">
                Berkat kepercayaan yang diberikan oleh para pelanggan membuat bisnis kami terus berkembang sampai sekarang.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-services" data-aos="fade-up" data-aos-delay="350">
            <div class="card-services-header" data-aos="zoom-out" data-aos-delay="400">
            </div>
            <div class="card-services-body">
              <img src="{{ asset('foto/landing-page/') }}/5.png" alt="" width="200">
              <h3 class="text-serif font-weight-bold text-orange m-0" data-aos="fade-up" data-aos-delay="450">Harga Yang Terjangkau</h3>
              <p class="d-block text-black-50 mt-2" data-aos="fade-up" data-aos-delay="500">
                Harga yang kami tawarkan pun sangat terjangkau untuk berbagai kalangan masyarakat.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-services" data-aos="fade-up" data-aos-delay="400">
            <div class="card-services-header" data-aos="zoom-out" data-aos-delay="450">
              <i class="fas fa-fw fa-hiking"></i>
            </div>
            <div class="card-services-body">
              <h3 class="text-serif font-weight-bold text-orange m-0" data-aos="fade-up" data-aos-delay="500">Adventures</h3>
              <p class="d-block text-black-50" data-aos="fade-up" data-aos-delay="550">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum accusamus asperiores voluptatem similique veniam libero, praesentium quo porro odio. Harum.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of services -->


  <!-- book -->
  <section class="book" id="book">
    <div class="container-custom">
      <div class="book-content">
        <div class="row">
          <div class="col-md-6 mx-auto mb-4">
            <div class="d-flex flex-column text-center">
              <h2 class="text-serif font-weight-bold m-0" data-aos="fade-up">Pesan Sekarang</h2>
              <p class="d-block text-black-50" data-aos="fade-up" data-aos-delay="100">
                Mari Berlangganan Koran Bersama Kami.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 my-auto mx-auto">
            <div class="d-flex justify-content-center align-items-center flex-column">
              <img src="{{ asset('foto/landing-page/') }}/7.png" alt="" class="img-fluid" data-aos="zoom-in" data-aos-delay="150">
            </div>
          </div>
          <div class="col-md-7 my-auto mx-auto">
            <div class="card shadow-sm rounded" data-aos="fade-up" data-aos-delay="200">
              <div class="card-header">
                <span class="text-poppins font-weight-bold">Pesan Disini</span>
              </div>
              <form action="{{route('addOrder')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="location" data-aos="fade-up" data-aos-delay="250">Nama</label>
                  <input type="text" class="form-control" placeholder="enter a name" name="nama" data-aos="fade-up" data-aos-delay="300">
                </div>
                <div class="form-group">
                  <label for="people" data-aos="fade-up" data-aos-delay="350">Alamat</label>
                  <textarea name="alamat" id="alamat" cols="1" rows="2" placeholder="enter an address" class="form-control" data-aos="fade-up" data-aos-delay="400"></textarea>
                </div>
                <div class="form-group">
                  <label for="email" data-aos="fade-up" data-aos-delay="450">Email</label>
                  <input type="text" class="form-control" placeholder="enter an email" name="email" data-aos="fade-up" data-aos-delay="500">
                </div>
                <div class="form-group">
                  <label for="phone" data-aos="fade-up" data-aos-delay="550">Phone</label>
                  <input type="text" class="form-control" placeholder="enter a phone" name="phone" data-aos="fade-up" data-aos-delay="600">
                </div>
                <div class="form-group">
                  <label for="arrivals" data-aos="fade-up" data-aos-delay="650">Phone</label>
                  <select name="id_paket" id="id_paket" class="form-control form-select" data-aos="fade-up" data-aos-delay="700">
                    @foreach ($paket as $item)
                      <option value="{{ $item->id_paket }}">{{ $item->paket }}</option>                        
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="tanggal_langganan" data-aos="fade-up" data-aos-delay="750">Tanggal Langganan</label>
                  <input type="date" class="form-control" placeholder="dd/mm/yy" data-aos="fade-up" name="tanggal_langganan" data-aos-delay="800">
                </div>
                <div class="form-group row g-4">
                  <div class="col-sm-1 col-form-label" data-aos="fade-up" data-aos-delay="800">Item</div>
                  <div class="col-sm-5 justify-content-start d-flex">
                      {{-- <input type="text" class="form-control" id="items" name="items[]"> --}}
                      <select class="form-select form-control" aria-label="Default select example" name="items[]" data-aos="fade-up" data-aos-delay="850">
                          @foreach ($koran as $np)                                    
                              <option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-sm-1 col-form-label justify-content-end d-flex" data-aos="fade-up" data-aos-delay="900">Qty</div>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="qty" name="qty[]" data-aos="fade-up" data-aos-delay="950">
                  </div>
                  <div class="col-sm-1 justify-content-end d-flex">
                      <a href="#" class="addOrder btn btn-success" data-aos="fade-up" data-aos-delay="950">+ Add</a>
                  </div>         
                </div>
                <div class="orders">

                </div>
                <button class="btn button-orange float-right mb-4" style="width: 100%" data-aos="zoom-in" data-aos-delay="650">Submit</button>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of book -->


  <!-- footer -->
  <footer class="footer">
    <div class="container-custom">
      <div class="footer-content">
        <div class="row">
          <div class="col mx-auto">
            <div class="d-flex justify-content-center align-items-center flex-column text-center">
              <div class="footer-logo mx-auto">
                <h4 class="text-poppins font-weight-bold text-white">CV. AULIA MANDIRI</h4>
              </div>
              <div class="footer-link mx-auto">
                <a href="#home" class="text-light">Home</a>
                <a href="#brand" class="text-light">Koran</a>
                <a href="#services" class="text-light">Services</a>
                <a href="#book" class="text-light">Orders</a>
                <a href="#contact" class="text-light">Contact</a>
              </div>
              <div class="footer-icon my-3 mx-auto">
                <a href="https://www.facebook.com/candradwicahyo18" class="text-light"><i class="fab fa-fw fa-facebook-f"></i></a>
                <a href="https://instagram.com/candradwicahyo18" class="text-light"><i class="fab fa-fw fa-instagram"></i></a>
                <a href="https://twitter.com/Candra_Cacan18" class="text-light"><i class="fab fa-fw fa-twitter"></i></a>
                <a href="https://github.com/candradwicahyo" class="text-light"><i class="fab fa-fw fa-github"></i></a>
              </div>
              <div class="footer-marker">
                <span class="d-block text-poppins font-weight-light text-light">Copyright &copy; 2021 All Right Reserved</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

    <!-- end of footer -->
    @include('sweetalert::alert')

  <!-- javascript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="assets/js/script.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <script type="text/javascript">
        $('.addOrder').on('click', function() {
            addOrder();
        });
        function addOrder() {
            var orders = '<div class="form-group row mt-4"><div class="col-sm-1 col-form-label">Item</div><div class="col-sm-5 justify-content-start d-flex"><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></div><div class="col-sm-1 col-form-label justify-content-end d-flex">Qty</div><div class="col-sm-4"><input type="number" class="form-control" id="qty" name="qty[]"></div><div class="col-sm-1 justify-content-end d-flex"><a href="#" class="removeOrder btn btn-danger">- Delete</a></div></div>';
            $('.orders').append(orders);
        };
        $('.removeOrder').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script>
</body>
</html>