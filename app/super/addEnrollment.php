<?php
// Initialize the session
session_start();
//Include database configuration file
include('../config.php');

//Get all t_contacto data
$query = $link->query("SELECT * FROM universidades WHERE universidad_status = 1 ORDER BY universidad_nombre DESC");

//Count total number of rows
$rowCount = $query->num_rows;
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Grupo CEA - app</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#1C1F26">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#1C1F26">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#1C1F26">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
        <link rel="shortcut icon" href="../images/favicon.png">
        <style>
        a {
        color: #337ab7;
        text-decoration: none;
        }
        .navbar, .navbar-inverse{
            background-color: #781C31;
        }

        .navbar-inverse .navbar-nav > .active{
            color: #000;
            background: #d65c14;
        }
        .navbar-inverse .navbar-nav > .active > a,
        .navbar-inverse .navbar-nav > .active > a:hover,
        .navbar-inverse .navbar-nav > .active > a:focus {
            color: white;
            background: #9B1532;
        }
        .right-corder-container {
            position: fixed;
            right: 30px;
            bottom: 20px;
        }


        .right-corder-container .right-corder-container-button {
            border: none;
            background-color: #9B1532;
            border-radius: 62px;
            /*Transform the square into rectangle, sync that value with the width/height*/
            transition: all 300ms;
            /*Animation to close the button (circle)*/
            box-shadow: 2px 2px 5px #898583;
            cursor: pointer;
        }


        .right-corder-container .right-corder-container-button span {
            color: white;
            position: absolute;
            left: 10px;
            top: 14px;
            line-height: 28px;
        }


        .right-corder-container .right-corder-container-button:hover {
            transition: all 400ms cubic-bezier(.62, .1, .5, 1);
            width: 260px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

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

        .button-search {
            display: inline-block;
            margin: 0 auto;
            font-size: 12px;
            height: 28px;
            background-color: white;
            -webkit-transition: background-color 500ms linear;
            -ms-transition: background-color 500ms linear;
            transition: background-color 500ms linear;
            border: none;
            color: #9B1532;
        }

        .animated {
            -webkit-animation-duration: 2s;
            animation-duration: 2s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.infinite {
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
        }

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        @-webkit-keyframes fadeInDown {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }

            to {
                opacity: 1;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }

            to {
                opacity: 1;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }

        .fadeInDown {
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
        }

        div.header {
            margin: 100px auto;
            line-height: 30px;
            max-width: 760px;
            text-align: center;
        }

        body {
            background: white;
            color: #333;
            font-family: 'Raleway', sans-serif;
        }

        .main {
            text-align: center;
            overflow-x: auto;
        }

        .select-boxes {
            text-align: left;
        }

        .select {
            display: block;
            margin: 0 auto;
            padding: 20px 50px;
        }

        .button1 {
            display: block;
            margin: 0 auto;
            padding: 8px 30px;
            background-color: #9B1532;
            -webkit-transition: background-color 500ms linear;
            -ms-transition: background-color 500ms linear;
            transition: background-color 500ms linear;
            border-radius: 5px;
            border: none;
            color: white;
        }

        .button1:hover {
            background-color: #4E0516;
            -webkit-transition: background-color 500ms linear;
            -ms-transition: background-color 500ms linear;
            transition: background-color 500ms linear;
        }

        .button-logout {
            font-size: 12px;
            font-family: 'Raleway', sans-serif;
            margin-top: 1px;
            margin-right: 2px;
            position: absolute;
            display: inline-block;
            padding: 10px 10px;
            background-color: #D9534F;
            color: white;
            top: 0;
            right: 0;
        }

        .button-logout:hover {
            text-decoration: none;
            color: white;
            background-color: #C9302C;
        }

        .button-sales {
            font-size: 12px;
            font-family: 'Raleway', sans-serif;
            margin-top: 1px;
            margin-right: 2px;
            position: absolute;
            padding: 10px 10px;
            display: inline-block;
            background-color: #F0AD4E;
            color: white;
            top: 0;
            float: right;
        }

        .button-sales:hover {
            text-decoration: none;
            color: white;
            background-color: #EC971F;
        }

        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .loading-bar {
            display: inline-block;
            width: 4px;
            height: 18px;
            border-radius: 4px;
            animation: loading 1s ease-in-out infinite;
        }

        .loading-bar:nth-child(1) {
            background-color: #3498db;
            animation-delay: 0;
        }

        .loading-bar:nth-child(2) {
            background-color: #c0392b;
            animation-delay: 0.09s;
        }

        .loading-bar:nth-child(3) {
            background-color: #f1c40f;
            animation-delay: .18s;
        }

        .loading-bar:nth-child(4) {
            background-color: #27ae60;
            animation-delay: .27s;
        }

        @keyframes loading {
            0% {
                transform: scale(1);
            }
            20% {
                transform: scale(1, 2.2);
            }
            40% {
                transform: scale(1);
            }
        }

        @media (min-width: 100px) and (max-width: 480px) {
            #notif-responsive {
                display: auto;
            }
            #notif-desktop {
                display: none;
            }
            .right-corder-container .right-corder-container-button {
                height: 50px;
                width: 50px;
            }
            .right-corder-container .right-corder-container-button span {
                font-size: 25px;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
            #notif-responsive {
                display: auto;
            }
            #notif-desktop {
                display: none;
            }
            .right-corder-container .right-corder-container-button {
                height: 50px;
                width: 50px;
            }
            .right-corder-container .right-corder-container-button span {
                font-size: 25px;
            }
        }

        @media (min-width:767px) {
            #notif-responsive {
                display: none;
            }
            #notif-desktop {
                display: auto;
            }
            .right-corder-container .right-corder-container-button {
                height: 50px;
                width: 50px;
            }
            .right-corder-container .right-corder-container-button span {
                font-size: 25px;
            }
        }
        </style>
    </head>

    <body class="animated fadeIn">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span><img src="../images/logo-positivo.png" style="display: block; margin: 0 auto; width: 4em; margin-top: -10px;"></span>
              </a>
                    <li id="notif-responsive" class="dropdown navbar-brand pull-right">
                        <a href="#" class="dropdown-toggle" style="color: white; text-decoration: none; outline: none;" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span><i class="fas fa-bell"></i>
                    </span></a>
                        <ul class="dropdown-menu"></ul>
                    </li>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span><i class="fas fa-home"></i>
                </span> Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="notif-desktop" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span><i class="fas fa-bell"></i>
                    Notificaciones</span></a>
                            <ul class="dropdown-menu"></ul>
                        </li>
                        <li class=""><a href="addEnrollment.php"><span><i class="fas fa-address-book"></i>
                        </span> Nueva Matrícula</a></li>
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span><i class="fas fa-bolt"></i></span> Operaciones<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="addCourse.php">
                                <span><i class="fas fa-plus-circle"></i>
                                </span>Nuevo Curso</a>
                            </li>
                            <li><a href="addProspect.php">
                                <span><i class="fas fa-plus-circle"></i>
                                </span>Nuevo Prospecto</a></li>
                            <li><a href="addTeacher.php">
                            <span><i class="fas fa-plus-circle"></i>
                            </span>Nuevo Docente</a></li>
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span><i class="fas fa-clipboard-list"></i></span> Ver<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="prospectos.php">
                                <span><i class="fas fa-tasks"></i>
                                </span>Prospectos</a>
                            </li>
                            <li><a href="courses.php">
                                <span><i class="fas fa-tasks"></i>
                                </span>Cursos</a></li>
                            <li><a href="teachers.php">
                            <span><i class="fas fa-tasks"></i>
                            </span>Profesores</a></li>
                          </ul>
                        </li>
                         <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span><i class="fas fa-user"></i></span> <b><?php echo htmlspecialchars($_SESSION['name']); ?></b><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="../logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesión</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-2"></div>
        <div class="container col-md-8">
            <br>
            <span class="animated fadeInDown"><img src="../images/logo.png" style="display: block; margin: 0 auto; width: 6em;"></span>
            <h3 class="animated fadeInDown" style="text-align: center;">
            <img src="../images/plus.png" style="display: inline-block; width: 1em; margin-top: -5px;">Nueva Matrícula</h3>
            <br>
            <br>
            <form id="form" method="post" action="server/addEnrollmentServer.php">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <input type="hidden" id="gestionado" name="gestionado" value="1">
                    <div class="form-group">
                        <label for="dni">DNI Alumno:*</label>
                        <input type="number" class="form-control" name="dni" id="dni" required/>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres:*</label>
                        <input oninput="this.value = this.value.toUpperCase()" type="name" class="form-control" id="nombre" name="nombre" required/>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos:*</label>
                        <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="apellido" name="apellido" required/>
                    </div>
                    <div class="form-group">
                        <label>Telefono:*</label>
                        <input type="phone" class="form-control" id="telefono" name="telefono"/>
                    </div>
                     <div class="form-group">
                        <label>Correo:*</label>
                        <input type="email" class="form-control" id="correo" name="correo"/>
                    </div>
                    <div class="form-group">
                        <label for="universidad">Universidad:</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="universidad" id="universidad"/>
                        <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera:</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="carrera" id="carrera"/>
                        <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ciclo">Ciclo en el que te encuentras:*</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" id="ciclo" name="ciclo"/>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="Egresado">Egresado</option>
                        <option value="Tecnico">Tecnico</option>
                        <option value="Doctorado">Doctorado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="distrito">Donde Vives:*</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="distrito" id="distrito"/>
                        <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                        <label for="id_curso">Curso:</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="id_curso" id="id_curso" required/>
                        <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="metodo_pago">Método de Pago:</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="metodo_pago" id="metodo_pago" required/>
                        <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descuento">Descuento:</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="descuento" id="descuento" required/>
                        <option value="0">Sin descuento</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                        <option value="25">25%</option>
                        <option value="30">30%</option>
                        <option value="35">35%</option>
                        <option value="40">40%</option>
                        <option value="45">45%</option>
                        <option value="50">50%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto_pagado">Monto Pagado:</label>
                        <input type="number" class="form-control" name="monto_pagado" id="monto_pagado"/>
                    </div>
                    <div class="form-group">
                        <label for="monto_restante">Monto Restante:</label>
                        <input type="number" readonly="readonly" class="form-control" name="monto_restante" id="monto_restante"/>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="devolucion_pagada">Monto Devuelto:</label>
                        <input type="number" class="form-control" name="devolucion_pagada" id="devolucion_pagada"/>
                    </div>
                    <div class="form-group">
                        <label for="certificado">Certificado:*</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" id="certificado" name="certificado" required/>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="certificado_recogido">Certificado Recogido:*</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" id="certificado_recogido" name="certificado_recogido"/>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="canal">Canal:</label>
                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="canal" id="canal" required/>
                        <option value="">Seleccione</option>
                        </select>
                    </div>
                    <label for="fecha_matricula">Fecha Matricula:</label>
        			<div class='input-group date' id='datetimepicker1'>
	                    <input placeholder="Fecha Matricula" id="fecha_matricula" name="fecha_matricula" type='text' class="form-control" />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	                <div class="form-group">
	                  <label for="comment">Comentario:</label>
					  <textarea oninput="this.value = this.value.toUpperCase()" placeholder="Comentario" class="form-control" rows="4" id="comment" name="comment"></textarea>
					</div>
                    </div>
                    <button class="button1" style="display: block; margin: 0 auto;" type="submit" name="save">Enviar</button>
                    <span id="addInfo" style="color: red; text-align: center;"></span>
                    <br>
                    <br>
                </div>
            </form>
        </div>
        <br>
        <br>
        <section id="BotonFlotante">
            <div class="right-corder-container" style="right: 0; position: fixed; margin-right: 20px; z-index: 10000;">
                <button class="right-corder-container-button" style="outline: 0 !important;">
                    <span class="short-text bfixed"><i style="display: block; margin: 0 auto; margin-left: 4px; color: white;" class="fab fa-sistrix" aria-hidden="true"></i></span>
                    <span style="margin-left: 35px; margin-top: -2%; color: white;" class="long-text bfixed">
                    <form id="form-to-search" method="post" action="search.php" >
                        <strong><input placeholder="  DNI o Telefono" style="width: 150px; color: black; font-size: 12px; margin-top: -0.5px; height: 28px;" type="text" name="dni_to_search" id="dni_to_search"/></strong>
                        <input type="submit" class="button-search" value="Buscar" />
                    </form>
                </span>
                </button>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/es-us.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('.select').select2({
                theme: "bootstrap"
            });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var id_curso = 1;
            //alert(result_id);
            $.ajax({
                type: 'POST',
                url: 'ajax/addEnrollmentAjax.php',
                data: 'id_curso=' + id_curso,
                success: function(html) {
                    $('#id_curso').html(html);
                }
            });
            var metodo_pago = 1;
            //alert(result_id);
            $.ajax({
                type: 'POST',
                url: 'ajax/addEnrollmentAjax.php',
                data: 'metodo_pago=' + metodo_pago,
                success: function(html) {
                    $('#metodo_pago').html(html);
                }
            });
            var canal = 1;
            //alert(result_id);
            $.ajax({
                type: 'POST',
                url: 'ajax/addEnrollmentAjax.php',
                data: 'canal=' + canal,
                success: function(html) {
                    $('#canal').html(html);
                }
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            load_unseen_notification('yes');

            function load_unseen_notification(view = '') {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: { view: view },
                    dataType: "json",
                    success: function(data) {
                        $('.dropdown-menu').html(data.notification);
                        if (data.unseen_notification > 0) {
                            $('.count').html(data.unseen_notification);
                        }
                    }
                });
            }

            load_unseen_notification();

            $(document).on('click', '.dropdown-toggle', function() {
                $('.count').html('');
                load_unseen_notification('yes');
            });

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
            $(function () {
                $('#datetimepicker1').datetimepicker({
				    format: 'YYYY-MM-DD HH:mm:ss'
				});
            });
            $(function () {
                $('#datetimepicker2').datetimepicker({
				    format: 'YYYY-MM-DD HH:mm:ss'
				});
            });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillNombre.php',
              success: function(data) {
                    $("#nombre").val(data);
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillApellido.php',
              success: function(data) {
                    $("#apellido").val(data);
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillTelefono.php',
              success: function(data) {
                    $("#telefono").val(data);
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillCorreo.php',
              success: function(data) {
                    $("#correo").val(data);
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillUniversidad.php',
              success: function(data) {
                    $('#universidad')
                .append('<option selected value="'+data+'">'+data+'</option>"');
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillCarrera.php',
              success: function(data) {
                    $('#carrera')
                .append('<option selected value="'+data+'">'+data+'</option>"');
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillCiclo.php',
              success: function(data) {
                    $('#ciclo')
                .append('<option selected value="'+data+'">'+data+'</option>"');
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#dni").change(function() {
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: 'dni=' + dni,
              url: 'ajax/autofillDistrito.php',
              success: function(data) {
                    $('#distrito')
                .append('<option selected value="'+data+'">'+data+'</option>"');
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#id_curso").change(function() {
            var curso = $("#id_curso").val();
            var dni = $("#dni").val();
          $.ajax({
              type: "POST",
              data: {curso: curso, dni: dni},
              url: 'ajax/validateEnrollment.php',
              success: function(data) {
                    if (data >0) {
                    $('.button1').prop('disabled', true);
                    $(".button1").css("cursor", "not-allowed");
                    $("#addInfo").html("Este alumno ya está matriculado en este curso");
                }else{
                    $('.button1').prop('disabled', false);
                    $(".button1").css("cursor", "pointer");
                    $("#addInfo").html("");
                }
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script>
            $("#id_curso").change(function() {
            var curso = $("#id_curso").val();
          $.ajax({
              type: "POST",
              data: 'curso=' + curso,
              url: 'ajax/autofillCosto.php',
              success: function(data) {
                    $("#monto_restante").val(data);
                    $("#monto_pagado , #descuento").on('keyup keypress change', function() {
                    var descuento = $("#descuento").val();    
                    var monto_pagado = $("#monto_pagado").val();
                    var descuento_float = parseFloat(descuento);
                    var monto_pagado_float = parseFloat(monto_pagado);
                    if (monto_pagado_float>=0) {
                        var r = (data - data*descuento_float/100) - monto_pagado_float;
                        $("#monto_restante").val(r);
                    }else{
                        var r = (data - data*descuento_float/100);
                        $("#monto_restante").val(r);
                    } 
                  });
                    //alert(data);
                },
              error: function() {
                alert('Hubo un error');
                }
            });
          });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var universidad_id = 1;
            //alert(result_id);
            $.ajax({
                type: 'POST',
                url: 'addProspectAjax.php',
                data: 'universidad_id=' + universidad_id,
                success: function(html) {
                    $('#universidad').html(html);
                }
            });
            var carrera_id = 1;
            //alert(result_id);
            $.ajax({
                type: 'POST',
                url: 'addProspectAjax.php',
                data: 'carrera_id=' + carrera_id,
                success: function(html) {
                    $('#carrera').html(html);
                }
            });
            var distrito_id = 1;
            //alert(result_id);
            $.ajax({
                type: 'POST',
                url: 'addProspectAjax.php',
                data: 'distrito_id=' + distrito_id,
                success: function(html) {
                    $('#distrito').html(html);
                }
            });
        });
        </script>
    </body>
    </html>