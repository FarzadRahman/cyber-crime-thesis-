<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('head')
    <script>Window.Laravel={csrfToken:'{{csrf_token()}}'}</script>

    <!-- Styles -->
    <style>
        header.masthead .page-heading h1, header.masthead .site-heading h1 {
            font-size: 50px;
        }

        header.masthead .page-heading, header.masthead .post-heading, header.masthead .site-heading {
            padding: 100px 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

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
                        <h3>Facebook Harrasment Prevention</h3>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
</body>
</html>
