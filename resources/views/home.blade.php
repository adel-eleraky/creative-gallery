<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
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
    <link rel="stylesheet" href={{ asset('dist/css/home.css') }}>
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
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class=" " id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ auth()->check() ? route('dashboard') : route('login') }}"><i
                                class="fa-solid fa-user fs-3" style="font-size: 30px"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <h2 class="text-center fw-bold"> Explore World-Wide Gallery </br> And buy what you want</h2>
    </header>
    <div class="gallery">

        <div class="container mt-5">
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/images/' . $image->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="title ">{{ $image->title }}</h5>
                            <p class="description"> {{ $image->description }}</p>
                            <p>Price: {{ $image->price }} $ </p>
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <footer> © Creative Gallery </footer>
</body>

<script src="https://kit.fontawesome.com/85c5dfec3f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
