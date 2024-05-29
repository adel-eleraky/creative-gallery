<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed nature only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Creative Gallery </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css ') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('dist/css/home.css') }}>
    <link rel="stylesheet" href={{ asset('dist/css/GalleryFilter.css') }}>
    @yield('css')
</head>

<body class="home-page">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="#">Creative Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav d-flex flex-grow-1 justify-content-center pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#about-us">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
                </li>
            </ul>

            <div class=" " id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ auth()->check() ? route('dashboard.index') : route('login') }}">
                            <button class="btn btn-outline-primary">
                                {{ auth()->check() ? 'Dashboard' : 'Join' }}
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <h2 class="text-center fw-bold"> Explore World-Wide Gallery </br> And buy what you want</h2>
    </header>
    <div class="button-group-wrap" id="gallery">
        <div id="filters" class="button-group filter-button-group">
            <button data-filter="*">show all</button>
            <button data-filter=".wedding">wedding</button>
            <button data-filter=".nature">nature</button>
            <button data-filter=".ai">ai</button>
            <button data-filter=".graphic">graphic</button>
        </div><br>
    </div>
    <div class="box-listing">
        <div class="container">
            <div class="row">
                @foreach ($images as $image)
                        <div class="card box-item {{ $image->type }}" data-category="{{ $image->type }}" style="position: unset;">
                            <img src="{{ asset('storage/images/'. $image->type . '/' . $image->image) }}" class="card-img-top" alt="...">
                            <div class="card-body p-2">
                                <h3 class="title">{{ $image->title }}</h3>
                                <p class="price">Price: {{ $image->price }} $</p>
                                <p class="type">Type: {{ $image->type }}</p>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="about-us" id="about-us">
        <section id="about-us" class="container mt-5">
            <h2 class="text-center fw-bold"> About Us </h2>
            <p class="text-center">
                Creative Gallery is a online gallery that allows artists to sell their art works.
                We are dedicated to providing a platform for artists to showcase their work and connect with art lovers.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/images/about-us.jpg') }}" alt="about-us" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <p>
                        At Creative Gallery, we believe that art has the power to bring people together and inspire creativity.
                        We are committed to providing a platform for artists to showcase their work and connect with art lovers.
                    </p>
                    <p>
                        Our mission is to make art more accessible to everyone, regardless of their location or social status.
                        We achieve this by providing a platform for artists to showcase their work and connect with art lovers.
                    </p>
                </div>
            </div>
        </section>
        <section id="services" class="container mt-5">
            <h2 class="text-center fw-bold"> Services </h2>
            <p class="text-center">
                At Creative Gallery, we offer two exceptional services that cater to the needs of artists and art enthusiasts alike. <br>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="" alt="service-img" class="img-fluid d-block">
                            <h5 class="">Artist Account</h5>
                            <p class="card-text">
                                With an artist account, you can easily upload your artwork, set your own prices, and manage your sales from a single dashboard. You'll receive notifications whenever someone purchases your art, and you can track your earnings in real-time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card text-center" >
                        <div class="card-body">
                            <img src="" alt="service-img" class="img-fluid d-block">
                            <h5 class="">Browse and Buy Art</h5>
                            <p class="card-text">
                                Explore our vibrant gallery and discover unique pieces from talented artists around the world. Filter by category, price, or artist to find the perfect addition to your home or office. When you purchase art, you'll receive a high-quality digital file and a certificate of authenticity, along with details about the artwork and the artist.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </p>
        </section>

    </div>
    <section id="contact" class="container mt-5">
        <h2 class="text-center fw-bold"> Contact Us </h2>
        <p class="text-center">
            Got questions or need help? Feel free to contact us through our email, social media, or phone number.
        </p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Contact Form
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" aria-describedby="messageHelp"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Contact Information
                    </div>
                    <div class="card-body">
                        <h5 class="">Email</h5>
                        <p class="card-text">
                            info@creativegallery.com
                        </p>
                        <h5 class="">Social Media</h5>
                        <p class="card-text">
                            <a href="#" class="btn btn-primary">Facebook</a>
                            <a href="#" class="btn btn-primary">Instagram</a>
                            <a href="#" class="btn btn-primary">Twitter</a>
                        </p>
                        <h5 class="">Phone</h5>
                        <p class="card-text">
                            +998 90 123 4567
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer> © Creative Gallery </footer>
</body>

<script src="https://kit.fontawesome.com/85c5dfec3f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset('dist/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('dist/js/GalleryFilter.js')}}"></script>
</html>
