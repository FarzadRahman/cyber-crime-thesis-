<!DOCTYPE html>
<html lang="en">

<head>

   @include('head')
    @yield('css')

</head>

<body>

<!-- Navigation -->
@include('menu')

<!-- Page Header -->
<header class="masthead" style="height: 10%;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">
                <div class="site-heading">
                    <h1>Cyber Crime</h1>
                    <span class="subheading">Thesis Project</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
@yield('content')

<!-- Footer -->
@include('footer')
</body>

</html>
