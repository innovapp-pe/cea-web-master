<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>¡Éxito!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper-master/dist/css/swiper.min.css">
    <!-- Demo styles -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#4E0516">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4E0516">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#4E0516">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
    <link rel="shortcut icon" href="images/favicon.png">
    <style type="text/css">
    @font-face {
        font-family: 'Avenir-Light';
        font-style: normal;
        font-weight: normal;
        src: local('Avenir-Light'), url('fonts/Avenir-Light-07.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Avenir-Book';
        font-style: normal;
        font-weight: normal;
        src: local('Avenir-Book'), url('fonts/Avenir-Book-01.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Avenir-Black-Oblique';
        font-style: normal;
        font-weight: normal;
        src: local('Avenir-Black-Oblique'), url('fonts/Avenir-BlackOblique-04.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Avenir-Heavy';
        font-style: normal;
        font-weight: normal;
        src: local('Avenir-Heavy'), url('fonts/Avenir-Heavy-05.ttf') format('truetype');
    }

    html,
    body {
        height: 100%;
        margin: 0;
        background-color: white;
        font-family: Avenir-Light;
    }

    .container>.navbar-header,
    .container-fluid>.navbar-header,
    .container>.navbar-collapse,
    .container-fluid>.navbar-collapse {
        margin-right: 0px;
        margin-left: -15px;
    }

    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }

    .modal-footer {
        padding-bottom: 5%;
    }

     ::selection {
        background: #9B1532;
        color: white;
        /* WebKit/Blink Browsers */
    }

     ::-moz-selection {
        background: #9B1532;
        color: white;
        /* Gecko Browsers */
    }

    .select2-container--bootstrap .select2-selection {
        border: 1px solid #9B1532;
    }

    li.active>a,
    li.active>a:focus,
    li.active>a:hover {
        border-width: 0;
    }

    li>a {
        color: white;
        border: none;
    }

    li>a::after {
        content: "";
        background: white;
        height: 2px;
        position: relative;
        width: 100%;
        display: block;
        margin: 0 auto;
        left: 0px;
        bottom: -1px;
        transition: all 250ms ease 0s;
        transform: scale(0);
    }

    li.active>a::after,
    li:hover>a::after {
        transform: scale(1);
    }

    li>a::after {
        background: white none repeat scroll 0% 0%;
        color: #fff;
    }

    li.active>a,
    li.active>a:hover,
    li.active>a:focus {
        background-color: white;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: white;
    }

    .navbar {
        border-radius: 0px;
        background-image: none;
        background-color: #4E0516;
        border-color: transparent;
        padding-top: 8px;
        padding-bottom: 8px;
        font-family: Avenir-Light;
        font-size: 14px;
        text-transform: uppercase;
        color: white;
        z-index: 1000;
    }

    .navbar-nav>li>.dropdown-menu {
        background-color: #4E0516 !important;
    }

    .navbar-default .navbar-nav>li>a,
    .navbar-default {
        color: white;
        padding-left: 15px;
    }

    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>li>a:focus {
        color: #818181;
    }

    .slick-slide {
        padding: 40px 40px;
        border-style: solid;
        border-color: white;
        border-width: 0.5px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .button1 {
        border-radius: 0px;
        color: #771B31;
        border: solid 2px;
        outline: none;
        border-color: #771B31;
        background-color: white;
        font-family: Avenir-Heavy;
        font-size: 16px;
        display: block;
        margin: 0 auto;
        padding: 5px 15px;
    }


    .button1:hover {
        border-color: #771B31;
        background-color: #771B31;
        color: white;
    }

    .button2 {
        border-radius: 0px;
        border: 0.5px solid;
        outline: none;
        color: white;
        border-color: white;
        background-color: transparent;
        font-family: Avenir-Heavy;
        font-size: 16px;
        padding: 10px 30px;
        -webkit-transition: background-color 0.5s;
        -moz-transition: background-color 0.5s;
        -ms-transition: background-color 0.5s;
        -o-transition: background-color 0.5s;
        transition: background-color 0.5s;
    }

    .button2:hover {
        background-color: white;
        color: #5E5EAD;
        border-color: transparent;
    }

    .button3 {
        border-radius: 0px;
        border: 0.5px solid;
        outline: none;
        color: white;
        border-color: #4E0516;
        background-color: #4E0516;
        font-family: Avenir-Heavy;
        font-size: 16px;
        padding: 15px 30px;
        -webkit-transition: background-color 0.5s;
        -moz-transition: background-color 0.5s;
        -ms-transition: background-color 0.5s;
        -o-transition: background-color 0.5s;
        transition: background-color 0.5s;
    }

    .button3:hover {
        border-color: white;
        background-color: white;
        color: #5DC1D1;
    }

    .button4 {
        border-radius: 0px;
        border: 0.5px solid;
        outline: none;
        color: white;
        border-color: white;
        background-color: transparent;
        font-family: Avenir-Light;
        font-size: 16px;
        padding: 15px 30px;
        -webkit-transition: background-color 0.5s;
        -moz-transition: background-color 0.5s;
        -ms-transition: background-color 0.5s;
        -o-transition: background-color 0.5s;
        transition: background-color 0.5s;
    }

    .button4:hover {
        border-color: white;
        background-color: white;
        color: #00E3C0;
    }

    .button5 {
        border-radius: 0px;
        border: 0.5px solid;
        outline: none;
        color: white;
        border-color: white;
        background-color: transparent;
        font-family: Avenir-Heavy;
        font-size: 16px;
        padding: 10px 30px;
        -webkit-transition: background-color 0.5s;
        -moz-transition: background-color 0.5s;
        -ms-transition: background-color 0.5s;
        -o-transition: background-color 0.5s;
        transition: background-color 0.5s;
    }

    .button5:hover {
        background-color: white;
        color: #8F1715;
    }

    .button-iphone {
        border-radius: 0px;
        border: 0.5px solid;
        outline: none;
        color: #807063;
        border-color: #807063;
        background-color: transparent;
        font-family: Avenir-Light;
        font-size: 16px;
        padding: 15px 30px;
        -webkit-transition: background-color 0.5s;
        -moz-transition: background-color 0.5s;
        -ms-transition: background-color 0.5s;
        -o-transition: background-color 0.5s;
        transition: background-color 0.5s;
    }

    .button-iphone:hover {
        border-color: #807063;
        background-color: #807063;
        color: white;
    }

    .button-huawei {
        border-radius: 0px;
        border: 0.5px solid;
        outline: none;
        color: #00E3C0;
        border-color: #00E3C0;
        background-color: transparent;
        font-family: Avenir-Light;
        font-size: 16px;
        padding: 15px 30px;
        -webkit-transition: background-color 0.5s;
        -moz-transition: background-color 0.5s;
        -ms-transition: background-color 0.5s;
        -o-transition: background-color 0.5s;
        transition: background-color 0.5s;
    }

    .button-huawei:hover {
        border-color: #00E3C0;
        background-color: #00E3C0;
        color: white;
    }

    .right-corder-container {
        position: fixed;
        right: 30px;
        bottom: 20px;
    }


    .right-corder-container .right-corder-container-button {
        border: none;
        background-color: white;
        border-radius: 62px;
        /*Transform the square into rectangle, sync that value with the width/height*/
        transition: all 300ms;
        /*Animation to close the button (circle)*/
        box-shadow: 2px 2px 5px #898583;
        cursor: pointer;
    }


    .right-corder-container .right-corder-container-button span {
        font-family: Avenir-Light;
        color: white;
        position: absolute;
        left: 10px;
        top: 14px;
        line-height: 28px;
    }


    .right-corder-container .right-corder-container-button:hover {
        transition: all 400ms cubic-bezier(.62, .1, .5, 1);
        width: 150px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
    /*
Long text appears slowly with an animation. That code prepare the animation by hidding the text.
The use of display is not there because it does not work well with CSS3 animation.
*/

    .right-corder-container .right-corder-container-button .long-text {
        transition: opacity 1000ms;
        /*Only the text fadein/fadeout is animated*/
        opacity: 0;
        /*By default we do not display the text, we want the text to fade in*/
        color: white;
        white-space: nowrap;
        font-size: 0;
        /*Set to 0 to not have overflow on the right of the browser*/
        width: 0;
        /*Set to 0 to not have overflow on the right of the browser*/
        margin: 0;
        /*Set to 0 to not have overflow on the right of the browser*/
    }
    /*
Animation to have a text that appear progressively. We need to play with a delay
on the width and the font-size to not have the browser have the text appears on the right
side of the browser view port. This has the side-effect of having an horizontal bar.
*/

    .right-corder-container .right-corder-container-button .long-text.show-long-text {
        transition: opacity 700ms,
        width 1ms linear 270ms, /*two thirds of the animation on the container width*/
        font-size 1ms linear 270ms;
        /*two thirds of the animation on the container width*/
        opacity: 1;
        margin-top: 2px;
        /*Center the position vertically*/
        margin-left: 65px;
        /*Center between the + and the right end side*/
        font-size: 20px;
        /*Text size, cannot be defined initially without moving the scrollbar*/
        width: auto;
        /*Required to be set with a delay (see animation) to not have scrollbar. Delay is to wait container to size up*/
    }

    .spinner-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #4E0516;
        z-index: 999999;
    }


    .spinner>div {
        width: 18px;
        height: 18px;
        background-color: white;

        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }

    .spinner .bounce1 {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
    }

    .spinner .bounce2 {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
    }

    .modal-footer {
        border-top: none;
    }

    input[type="text"],
    input[type="phone"],
    input[type="email"],
    input[type="address"],
    textarea {
        background-color: transparent;
        border-color: white;
        font-family: Avenir-Light;
    }

    .iphone-placeholder::-webkit-input-placeholder {
        /* WebKit browsers */
        color: white;
    }

    .q6-placeholder::-webkit-input-placeholder {
        /* WebKit browsers */
        color: #B4B4B4;
        font-family: Avenir-Light;
    }

    .huawei-placeholder::-webkit-input-placeholder {
        /* WebKit browsers */
        color: #00E3C0;
    }

    #email3 {
        border-color: #00E3C0;
    }

    #address3 {
        border-color: #00E3C0;
    }

    #phone3 {
        border-color: #00E3C0;
    }

    #name3 {
        border-color: #00E3C0;
    }

    #dni3 {
        border-color: #00E3C0;
    }

    #ruc3 {
        border-color: #00E3C0;
    }

    #email1,
    #address1,
    #phone1,
    #name1,
    #dni1,
    #ruc1 {
        border-color: white;
    }

    #email,
    #address,
    #phone,
    #name,
    #dni,
    #ruc {
        border-color: white;
    }

    .form-control:focus {
        border-color: gray;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    @-webkit-keyframes sk-bouncedelay {
        0%,
        80%,
        100% {
            -webkit-transform: scale(0)
        }
        50% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes sk-bouncedelay {
        0%,
        80%,
        100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        50% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
        }
    }


    @media only screen and (max-width: 766px) {
        .collapsing ul li a,
        .in ul li a {
            color: black!important;
        }
        .collapsing ul li a:hover,
        .in ul li a:hover {
            color: black!important;
        }
    }


    @media (min-width: 100px) and (max-width: 480px) {
        .mision-vision {
            padding: 2em;
        }
        img {
            display: block;
            margin: 0 auto;
        }

        .slick-slide {
            padding: 50px 0px;
        }
        .navbar {
            width: 100%;
            left: 0px;
        }
        li.dropdown:hover>.dropdown-menu {
            display: auto;
        }
        .navbar-toggle {
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0px;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color: white;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
        }

        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
            background-color: transparent;
        }

        .navbar-collapse {
            background-color: white;
            color: black !important;
        }
        .swiper-button-next,
        .swiper-button-prev {
            width: 40px;
            height: 16px;
        }
        .br {
            display: none;
        }
        .br2 {
            display: none;
        }

        .right-corder-container .right-corder-container-button {
            height: 50px;
            width: 50px;
        }
        .right-corder-container .right-corder-container-button span {
            font-size: 25px;
        }

        #bckg1 {
            background-image: url(images/quienes-somos.jpg);
            background-position: center;
        }
        #bckg2 {
            background-image: url(images/carrusel/carrusel2_movil.jpg);
            background-position: center;
        }
        #bckg3 {
            background-image: url(images/carrusel/carrusel3_movil.png);
            background-position: center;
        }
        #a {
            background-image: url(images/a_movil.png);
        }
        #b {
            background-image: url(images/b_movil.png);
        }
        #c {
            background-image: url(images/c_movil.png);
        }


        .spinner-wrapper {
            display: none;
        }

        .spinner {
            position: absolute;
            top: 35%;
            left: 38%;
            width: 70px;
            text-align: center;
        }

        .bg .bg2 {
            background-image: none;
            background-color: white;
        }

        .to-center {
            text-align: center;
        }
        #vermas2 {
            margin: 0 auto;
        }
    }

    @media (min-width: 481px) and (max-width: 767px) {
        .grayscale {
            -webkit-filter: grayscale(100%);
            /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
            transition: all 250ms ease 0s;
        }

        .grayscale:hover {
            -webkit-filter: grayscale(0%);
            /* Safari 6.0 - 9.0 */
            filter: grayscale(0%);
            transition: all 250ms ease 0s;
        }
        .mision-vision {
            padding: 2em;
        }
        .navbar {
            width: 100%;
            left: 0px;
        }

        li.dropdown:hover>.dropdown-menu {
            display: auto;
        }
        .navbar-toggle {
            background-color: transparent;
            border: none;
            border-radius: 0px;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color: #4E0516;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
        }

        .navbar-collapse {
            background-color: white;
            color: black !important;
        }

        .bg {
            /* The image used */
            background-image: url("images/index_1.jpg");

            /* Full height */
            height: 80%;

            /* Center and scale the image nicely */
            background-position: right;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
        }

        .bg2 {
            /* The image used */
            background-image: url("images/index_2.jpg");

            /* Full height */
            height: 80%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
        }
        .right-corder-container .right-corder-container-button {
            height: 50px;
            width: 50px;
        }
        .right-corder-container .right-corder-container-button span {
            font-size: 25px;
        }

        .br2 {
            display: none;
        }
        .br3 {
            display: none;
        }
        #bckg1 {
            background-image: url(images/quienes-somos.jpg);
            background-position: 10% 0%;
        }
        #bckg2 {
            background-image: url(images/carrusel/carrusel2_movil.jpg);
            background-position: 10% 0%;
        }
        #bckg3 {
            background-image: url(images/carrusel/carrusel3_movil.png);
        }
        #a {
            background-image: url(images/a_movil.png);
        }
        #b {
            background-image: url(images/b_movil.png);
        }
        #c {
            background-image: url(images/c_movil.png);
        }

        .spinner {
            position: absolute;
            top: 48%;
            left: 45%;
            width: 70px;
            text-align: center;
        }

        .to-center {
            text-align: center;
        }
        #vermas2 {
            margin: 0 auto;
            margin-top: 15em;
        }
    }

    @media (min-width:767px) {
        .grayscale {
            -webkit-filter: grayscale(100%);
            /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
            transition: all 250ms ease 0s;
        }

        .grayscale:hover {
            -webkit-filter: grayscale(0%);
            /* Safari 6.0 - 9.0 */
            filter: grayscale(0%);
            transition: all 250ms ease 0s;
        }
        .mision-vision {
            padding: 5em;
        }
        .navbar {
            width: 100%;
            left: 0px;
        }
        #quitar-padding,
        #imagen-quitar-padding {
            padding-top: 4em;
            padding-bottom: 4em;
        }
        li.dropdown:hover>.dropdown-menu {
            display: block;
        }
        .navbar-collapse {
            background-color: #4E0516;
            color: white;
        }
        .bg {
            /* The image used */
            background-image: url("images/index_1.jpg");

            /* Full height */
            height: 80%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
        }

        .bg2 {
            /* The image used */
            background-image: url("images/index_2.jpg");

            /* Full height */
            height: 80%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
        }

        .right-corder-container .right-corder-container-button {
            height: 50px;
            width: 50px;
        }
        .right-corder-container .right-corder-container-button span {
            font-size: 25px;
        }

        #bckg1 {
            background-image: url(images/quienes-somos.jpg);
            background-position: 10% 0%;
        }
        #bckg2 {
            background-image: url(images/carrusel/carrusel2.jpg);
            background-position: 10% 0%;
        }
        #bckg3 {
            background-image: url(images/carrusel/carrusel3.png);
        }
        #a {
            background-image: url(images/a.png);
        }
        #b {
            background-image: url(images/b.png);
        }
        #c {
            background-image: url(images/c.png);
        }

        .spinner {
            position: absolute;
            top: 48%;
            left: 45%;
            width: 70px;
            text-align: center;
        }
        .six {
            font-size: 600%;
        }
        .to-center {
            text-align: left;
        }

        #vermas2 {
            margin: 0 auto;
            margin-top: 25em;
        }
    }
    </style>
</head>

<body>
    <div class="spinner-wrapper">
        <div class="spinner">
            <span><img src="images/logo/logo_blanco.png" style="width: 200%; display: block; margin-left: -45%;" class="img-fluid"></span>
            <br>
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div class="container-fluid" style="z-index: 5; padding: 0px; margin-top: -9px;">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid" style=" padding: 0px;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" style="color:white;">
                        <span><img id="logo" src="images/logo/logo_blanco.png" style="width:4em; margin-left: 2em; margin-top: -5px;"></span>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="font-size: 14px;">
                        <li><a class="cambio" href="conocenos.html" style="color: white; text-transform: capitalize; font-family: Avenir-Book;">CONÓCENOS</a></li>
                        <li><a class="cambio" href="cursos.html" style="color: white; text-transform: capitalize; font-family: Avenir-Book; ">CURSOS</a></li>
                        <li><a class="cambio" href="convenios.html" style="color: white; text-transform: capitalize; font-family: Avenir-Book; ">CONVENIOS</a></li>
                        <li><a class="cambio" href="contacto.html" style="color: white; text-transform: capitalize; font-family: Avenir-Book; ">CONTACTO</a></li>
                        <li><a class="cambio" href="blog.html" style="color: white; text-transform: capitalize; font-family: Avenir-Book; ">BLOG</a></li>
                        <li><a class="cambio" href="" style="color: white; text-transform: capitalize; font-family: Avenir-Heavy; ">AULA VIRTUAL</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <br>
    <br>
    <div class="col-md-2"></div>
    <div class="container col-md-8">
        <br>
        <span class="animated fadeInDown"><img src="app/images/like.png" style="display: block; margin: 0 auto; width: 6em;"></span>
        <h3 class="animated fadeInDown" style="text-align: center;">
            ¡Gracias, <?php echo htmlspecialchars( $_GET['name']); ?>, nos pondremos en contacto contigo lo antes posible!</h3>
        <br>
        <br>
        <a style="outline: none; text-decoration: none;" href="index.html">
            <button class="button1">Regresar al Inicio</button>
        </a>
    </div>
    <br>
    <br>
    <section id="BotonFlotante">
        <div class="right-corder-container" style="right: 0; position: fixed; margin-right: 20px; z-index: 10000;">
            <button class="right-corder-container-button" style="outline: 0 !important;">
                <span class="short-text bfixed"><i style="display: block; margin: 0 auto; margin-left: 4px; color: #9B1532;" class="fab fa-facebook-messenger" aria-hidden="true"></i></span>
                <span style="margin-left: 35px; margin-top: -2%; color: #9B1532;" class="long-text bfixed" onclick="window.location.href='https://m.me/grupoceaperu';">Contacto</span>
            </button>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="swiper-master/dist/js/swiper.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
    var swiper1 = new Swiper('.swiper1', {
        spaceBetween: 0,
        centeredSlides: true,
        loop: false,
    });
    </script>
    <script type="text/javascript">
    $(".right-corder-container-button").hover(function() {
        $(".long-text").addClass("show-long-text");
    }, function() {
        $(".long-text").removeClass("show-long-text");
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var height = $("#one").height();
        if (height > 0) {
            $("#two").css("margin-top", "0px");
        }
    });
    </script>
    <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0 && $(window).width() >= 770) {
            $('.navbar').css("animation-name", "example");
            $('.navbar').css("animation-duration", "1s");
            $('.navbar').css("animation-fill-mode", "forwards");
            $('.cambio').css("color", "white");
            $('.navbar-toggle').css("background-color", "#4E0516");
            $('.navbar #logo').attr('src', 'images/logo/logo_blanco.png');
            $('.navbar #logo').css('width', '4em');
        }
    });
    </script>
    <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() == 0 && $(window).width() >= 770) {
            $('.navbar').css("animation-name", "example1");
            $('.navbar').css("animation-duration", "1s");
            $('.navbar').css("animation-fill-mode", "forwards");
            $('.cambio').css("color", "white");
            $('.navbar-toggle').css("background-color", "#4E0516");
            $('.navbar #logo').attr('src', 'images/logo/logo_blanco.png');
            $('.navbar #logo').css('width', '4em');
        }
    });
    </script>
    <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0 && $(window).width() < 770) {
            $('.navbar').css("animation-name", "example");
            $('.navbar').css("animation-duration", "1s");
            $('.navbar').css("animation-fill-mode", "forwards");
            $('.cambio').css("color", "#4E0516");
            $('.navbar-toggle').css("background-color", "#4E0516");
            $('.navbar #logo').attr('src', 'images/logo/logo_blanco.png');
            $('.navbar #logo').css('width', '65px');
        }
    });
    </script>
    <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() == 0 && $(window).width() < 770) {
            $('.navbar').css("animation-name", "example1");
            $('.navbar').css("animation-duration", "1s");
            $('.navbar').css("animation-fill-mode", "forwards");
            $('.cambio').css("color", "#4E0516");
            $('.navbar-toggle').css("background-color", "#4E0516");
            $('.navbar #logo').attr('src', 'images/logo/logo_blanco.png');
            $('.navbar #logo').css('width', '65px');
        }
    });
    </script>
    <script>
    $(document).ready(function() {
        //Preloader
        $(window).on('load', function() {
            preloaderFadeOutTime = 500;

            function hidePreloader() {
                var preloader = $('.spinner-wrapper');
                preloader.fadeOut(preloaderFadeOutTime);
            }
            hidePreloader();
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.responsive').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $('.responsive2').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 4000,
            infinite: true,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
    </script>
    <script type="text/javascript">
    $('#prev-profes').click(function() {
        $('.responsive2').slick('slickPrev');
    })

    $('#next-profes').click(function() {
        $('.responsive2').slick('slickNext');
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on("scroll", onScroll);

        //smoothscroll
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            $(document).off("scroll");

            $('a').each(function() {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top + 2
            }, 500, 'swing', function() {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $('#menu-center a').each(function() {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#menu-center ul li a').removeClass("active");
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        });
    }
    </script>
    <script type="text/javascript">
    $(window).on('scroll', function() {
        // console.log($(window).height());
        scroll_pos = $(window).scrollTop() + $(window).height();
        element_pos1 = $('.swiper1').offset().top + $('.swiper1').height();
        element_pos2 = $('#section2').offset().top + $('#section2').height();
        if (scroll_pos > element_pos1) {
            $('#why-slider').addClass('animated fadeIn');
        };
        if (scroll_pos > element_pos2) {
            $('#section3-img').addClass('animated fadeInRight');
            $('#section3-txt').addClass('animated fadeInLeft');
        };

    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var universidad_id = 1;
        //alert(result_id);
        $.ajax({
            type: 'POST',
            url: 'app/addProspectAjax.php',
            data: 'universidad_id=' + universidad_id,
            success: function(html) {
                $('#universidad').html(html);
            }
        });
        var carrera_id = 1;
        //alert(result_id);
        $.ajax({
            type: 'POST',
            url: 'app/addProspectAjax.php',
            data: 'carrera_id=' + carrera_id,
            success: function(html) {
                $('#carrera').html(html);
            }
        });
        var distrito_id = 1;
        //alert(result_id);
        $.ajax({
            type: 'POST',
            url: 'app/addProspectAjax.php',
            data: 'distrito_id=' + distrito_id,
            success: function(html) {
                $('#distrito').html(html);
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.select').select2({
            theme: "bootstrap"
        });
    });
    </script>
</body>

</html>