<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('head')
    <script>Window.Laravel={csrfToken:'{{csrf_token()}}'}</script>

    <!-- Styles -->
</head>
<body>

<div id="app">

    <navbar></navbar>
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

    <div class="container">
        <router-view></router-view>
        {{--<posts></posts>--}}

    </div>

    <foot></foot>
</div>

<script src="{{url('public/js/app.js')}}"></script>
</body>
</html>
