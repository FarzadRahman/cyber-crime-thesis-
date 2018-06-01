<template>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <router-link to="" tag="li" class="nav-item"><a href="#">Home</a></router-link>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>


                    <router-link to="contact" tag="li" class="nav-item"><a href="#">Contact</a></router-link>

                </ul>
            </div>
        </div>
    </nav>

</template>