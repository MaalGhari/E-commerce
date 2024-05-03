<!-- Designed by Arunlal Panja -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Arunlal Panja">
  <title>Contact</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
     #offcanvasTop {
     --bs-offcanvas-height: 100vh;
     background-color: #c5e1d4;
     }
  </style>
</head>

<body>
  <!-- Header Block -->
  <header id="site-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="index.html">ShopSavvy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">404 Page</a></li>
                <li><a class="dropdown-item" href="#">Common Page</a></li>
                <li><a class="dropdown-item" href="#">FAQ Page</a></li>
                <li><a class="dropdown-item" href="#">Hero Page</a></li>
                <li><a class="dropdown-item" href="portfolios.html">Portfolio Page</a></li>
                <li><a class="dropdown-item" href="#">Single Page</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Contact</a>
            </li>
          </ul>
          <div class="d-flex">
            <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Offcanvas Block -->
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
      <div class="container pt-5">
        <div class="offcanvas-header">
          <h2 class="fw-bold pb-3">Search here</h2>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <form class="position-relative" action="#" method="post">
            <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Examples: posts, services,..">
            <button class="position-absolute top-0 end-0 border-0 bg-transparent py-2 pe-2 text-secondary" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Breadcrumb Block -->
  <section class="mt-5">
    <div class="bg-light py-5">
      <div class="container">
        <div class="d-flex justify-content-between">
          <h1 class="fw-bold">Contact us</h1>
          <nav class="pt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="nav-link" href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <main>
    <div class="container py-5">
      <div class="row g-5">
        <!-- Contact Information Block -->
        <div class="">
          <div class="row row-cols-md-2 g-4">
            <div class="aos-item" data-aos="fade-up" data-aos-delay="200">
              <div class="aos-item__inner">
                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                  <div class="d-flex justify-content-start">
                    <i class="fa-solid fa-envelope h3 pe-2"></i>
                    <span class="h5">Email</span>
                  </div>
                  <span>info@shopsavvy.com</span>
                </div>
              </div>
            </div>
            <div class="aos-item" data-aos="fade-up" data-aos-delay="400">
              <div class="aos-item__inner">
                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                  <div class="d-flex justify-content-start">
                    <i class="fa-solid fa-phone h3 pe-2"></i>
                    <span class="h5">Phone</span>
                  </div>
                  <span>+ 01 234 567 88, + 01 234 567 89</span>
                </div>
              </div>
            </div>
          </div>
          <div class="aos-item mt-4" data-aos="fade-up" data-aos-delay="600">
            <div class="aos-item__inner">
              <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                <div class="d-flex justify-content-start">
                  <i class="fa-solid fa-location-pin h3 pe-2"></i>
                  <span class="h5">Office location</span>
                </div>
                <span>#007, Street name, Bigtown BG23 4YZ, England</span>
              </div>
            </div>
          </div>
          <div class="aos-item" data-aos="fade-up" data-aos-delay="800">
            <div class="mt-4 w-100 aos-item__inner">
              <iframe class="hvr-shadow" width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure acres/hectares on map</a></iframe>
            </div>
          </div>
        </div>

        <!-- Contact Form Block -->
        <form action="{{ route('send.email') }}" class="contact100-form validate-form" method="post">
            @csrf            
            <div class="">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h2 class="pb-4">Leave a message</h2>
                <div class="row g-4">
                    <div class="col-6 mb-3 validate-input" data-validate="First name is required">
                        <label for="fname" class="form-label">First name</label>
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="John">
                        @error('fname')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3 validate-input" data-validate="Last name is required">
                        <label for="lname" class="form-label">Last name</label>
                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Doe">
                        @error('lname')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3 validate-input" data-validate="Valid phone is required: +123456789">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="+1234567890">
                </div>
                <div class="mb-3 validate-input" data-validate="Subject is required">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                    @error('subject')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3 validate-input" data-validate="Message is required">
                    <label for="content" class="form-label">Message</label>
                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                    @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark">Send Message</button>
            </div>
        </form>
            
      </div>
    </div>
  </main>

  <!-- Footer Block -->
  <footer id="site-footer">
    <div class="bg-success bg-opacity-25 py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xl-3 col-sm-12">
            <h5 class="pb-3"><i class="fa-solid fa-user-group pe-1"></i> About us</h5>
            <span class="text-secondary">ShopSavvy is your ultimate shopping companion, helping you find the best deals and discounts on a wide range of products.</span>
          </div>
          <div class="col-md-6 col-xl-3 col-sm-12">
            <h5 class="pb-3"><i class="fa-solid fa-link pe-1"></i> Important links</h5>
            <ul>
              <li><a href="#" class="text-decoration-none link-secondary">About us</a></li>
              <li><a href="#" class="text-decoration-none link-secondary">Privacy policy</a></li>
              <li><a href="#" class="text-decoration-none link-secondary">Terms of services</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-xl-3 col-sm-12">
            <h5 class="pb-3"><i class="fa-solid fa-location-dot pe-1"></i> Our location</h5>
            <span class="text-secondary">
              123 ShopSavvy Street, Londres, Angleterre<br>
            </span>
          </div>
          <div class="col-md-6 col-xl-3 col-sm-12">
            <h5 class="pb-3"><i class="fa-solid fa-paper-plane pe-1"></i> Stay updated</h5>
            <form>
              <input type="text" class="w-100 mb-2 form-control" name="" placeholder="Email ID">
              <button class="w-100 btn btn-dark">Subscribe now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-dark py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <ul class="list-inline mb-0">
              <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-youtube"></i></a></li>
              <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-twitter"></i></a></li>
              <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-github"></i></a></li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-12"><span class="text-secondary pt-1 float-md-end float-sm-start">Copyright &copy; 2024 ShopSavvy</span></div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>