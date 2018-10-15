<?php
// Initialize the session
session_start();
//Include database configuration file
include('config.php');

//Get all t_contacto data
$query = $link->query("SELECT * FROM tipo_contacto WHERE status = 1 ORDER BY nombre ASC");

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
	    <title>Call</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	    <!-- Chrome, Firefox OS and Opera -->
	    <meta name="theme-color" content="#1C1F26">
	    <!-- Windows Phone -->
	    <meta name="msapplication-navbutton-color" content="#1C1F26">
	    <!-- iOS Safari -->
	    <meta name="apple-mobile-web-app-status-bar-style" content="#1C1F26">
		<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
		<link rel="shortcut icon" href="../images/favicon.png">
		<style>
		a {
        color: #9B1532;
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
				canvas{
				display: block;
				margin: 0 auto;
			  	width:600px !important;
			  	height:300px !important;
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

		    .button-search{
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
			    line-height:30px;
			    max-width:760px;
			    text-align: center;
			}
			body {
			    background: white;
			    color: #333;
			    font-family: 'Raleway', sans-serif;
			}
			.main{
				text-align: center;
				overflow-x:  auto;
			}
			.select-boxes{
				text-align: left;
			}
			.select{
				display: block;
				margin: 0 auto;
				padding: 10px 50px;
			}
			.button1{
				display: inline-block;
				margin: 0 auto;
				padding: 5px 20px;
				background-color: #9B1532;
				color: white;
				border-color: transparent;
			}

			.button1:hover{
				background-color: #781C31;
			}
			.button-logout {
			     font-size: 12px;
			     font-family: 'Raleway', sans-serif;
			     margin-top: 1px;
			     margin-right: 2px;
			     position:absolute;
			     display: inline-block;
			     padding: 10px 10px;
			     background-color: #D9534F;
			     color: white;
			     top:0;
			     right:0;
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
			     position:absolute;
			     padding: 10px 10px;
			     display: inline-block;
			     background-color: #F0AD4E;
			     color: white;
			     top:0;
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

			@media (min-width: 100px) and (max-width: 480px){
				#notif-responsive{
					display: auto;
				}
				#notif-desktop{
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
			@media (min-width: 481px) and (max-width: 767px){
				#notif-responsive{
					display: auto;
				}
				#notif-desktop{
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
			@media (min-width:767px){
				#notif-responsive{
					display: none;
				}
				#notif-desktop{
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

		<div class="container">
		    <div id="prospectos">
		      <div class="header animated fadeInDown"><h1><b>Lista de alumnos interesados</b></h1></div>
				<div class="container" style="text-align: center;">
					<form class="form-inline" id="encontrarInteresados">
						<div class="form-group">
	                        <label for="id_curso">Curso:</label>
	                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="id_curso" id="id_curso" required/>
	                        <option value="">Seleccione</option>
	                        </select>
                    	</div>
						  <button type="submit" class="button1">Encontrar</button>
					</form>
					<div class="main">
						<br><br>
					<table id="interesados-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
							<thead>
								<tr>
									<th style="text-align: center;">Curso</th>
									<th style="text-align: center;">DNI</th>
									<th style="text-align: center;">Nombres</th>
									<th style="text-align: center;">Apellidos</th>
									<th style="text-align: center;">Telefono</th>
									<th style="text-align: center;">Correo</th>
									<th style="text-align: center;">Universidad</th>
									<th style="text-align: center;">Carrera</th>
									<th style="text-align: center;">Ciclo</th>
									<th style="text-align: center;">Distrito</th>
									<th style="text-align: center;">Mensaje</th>
									<th style="text-align: center;">¿Gestionado?</th>
									<th style="text-align: center;">Tipo de Contacto</th>
									<th style="text-align: center;">Resultado</th>
									<th style="text-align: center;">Manager</th>
									<th style="text-align: center;">Fecha de Registro</th>
									<th style="text-align: center;">Fecha de gestión</th>
								</tr>
							</thead>
					</table>
					</div>
				</div>
				<br><br>
		    </div>
		<br><br>
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
	<section>
			<div class="modal fade" id="editar-matriculado-modal" tabindex='-1' role="dialog">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			                 <h4 class="modal-title"></h4>
			 
			            </div>
			            <div class="modal-body">
			                <form id="form-edit-enrollment" method="post" action="server/CallServer.php">
				                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                    <input type="hidden" id="gestionado" name="gestionado" value="1">
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="dni">DNI Alumno:*</label>
				                        <input type="number" class="form-control" readonly="readonly" name="dni" id="dni" required/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="nombre">Nombres:*</label>
				                        <input oninput="this.value = this.value.toUpperCase()" type="name" class="form-control" readonly="readonly"  id="nombre" name="nombre" required/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="apellido">Apellidos:*</label>
				                        <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" readonly="readonly" id="apellido" name="apellido" required/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label>Telefono:*</label>
				                        <input type="phone" class="form-control" readonly="readonly" id="telefono" name="telefono"/>
				                    </div>
				                     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label>Correo:*</label>
				                        <input type="email" class="form-control" readonly="readonly" id="correo" name="correo"/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="universidad">Universidad:</label>
				                        <input type="text" class="form-control" readonly="readonly" id="universidad" name="universidad"/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="carrera">Carrera:</label>
				                        <input type="text" class="form-control" readonly="readonly" id="carrera" name="carrera"/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="ciclo">Ciclo:*</label>
										<input type="text" class="form-control" readonly="readonly" id="ciclo" name="ciclo"/>
				                    </div>

				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="distrito">Distrito:*</label>
				                        <input type="text" class="form-control" readonly="readonly" id="distrito" name="distrito"/>
				                    </div>
				                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                        <label for="curso">Curso de interés:</label>
				                        <input type="text" readonly="readonly" class="form-control" name="curso" id="curso" value="" />
				                    </div>
				                </div>
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                        
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                        <label for="tipo_contacto">Tipo de Contacto:</label>
				                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" name="tipo_contacto" id="tipo_contacto" required/>
				                        <option value="">Tipo de contacto*</option>
					                    <?php
								        if($rowCount > 0){
								            while($row = $query->fetch_assoc()){ 
								                echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
								            }
								        }else{
								            echo '<option value="">Tipo de contacto no disponible</option>';
								        }
								        ?>
				                        </select>
				                    </div>
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                        <label for="resultado">Resultado:</label>
				                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" id="resultado" name="resultado"/>
				                        <option>Seleccione un Tipo de contacto</option>
				                        </select>
				                    </div>
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                        <label for="observacion">Observacion:</label>
				                        <select class="select col-xs-12 col-sm-12 col-md-12 col-lg-12" id="observacion" name="observacion"/>
				                        <option>Seleccione un Tipo de contacto</option>
				                        </select>
				                    </div>
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                    <label for="fecha_agendado">Fecha de Agendado:</label>
				                    <div class='input-group date' id='datetimepicker1'>
					                    <input placeholder="Haga click sobre el almanaque de la derecha -->" id="fecha_agendado" name="fecha_agendado" type='text' class="form-control" />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					                </div>
				                    </div>
				                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					                  <label for="comment">Comentario:</label>
									  <textarea oninput="this.value = this.value.toUpperCase()" placeholder="Comentario" class="form-control" rows="5" id="comment" name="comment"></textarea>
									</div>
				                    </div>
				                    <div style="text-align: center; padding-top: 20px;">
				                    <button class="button1" style="margin-top: 20px;" type="submit" name="save">Enviar</button>
				                    </div>
				                    <span id="addInfo" style="color: red; text-align: center;"></span>
				                    <br>
				                    <br>
				                </div>
				            </form>
			            </div>
			            <div class="modal-footer">
			            </div>
			        </div>
			        <!-- /.modal-content -->
			    </div>
			    <!-- /.modal-dialog -->
			</div>
		</section>
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/es-us.js"></script>
		<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/en-au.js"></script> -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
			  // Listen to submit event on the <form> itself!
			  $('#encontrarInteresados').submit(function (e) {

			    e.preventDefault();

			    var id_curso = $("#id_curso").val();
			    var dataTable1 = $('#interesados-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"responsive": true,
					"bPaginate": true,
        			"info":     true,
        			"bFilter": true,
        			"bDestroy": true,
					"ajax":{
						url :"ajax/encontrarInteresados.php", // json datasource
						type: "post",  // method  , by default get
						data: { id_curso: id_curso} ,
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="8">Aun no has registrado ventas</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					},
					"rowCallback": function( row, data, index ) {
						if ( data[10] == 'SI' ) {
					      $(row).closest('tr').css('background-color', '#90EE90');
				          }
				          else if( data[10] == 'NO'){
				          $(row).closest('tr').css('background-color', 'pink');
				          }
				          else{
				          $(row).closest('tr').css('background-color', 'white');
				          }
					}     
				} );
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
        });
        </script>
		<script>
			$(document).ready(function(){
			 load_unseen_notification('yes');
			 function load_unseen_notification(view = '')
			 {
			  $.ajax({
			   url:"fetch.php",
			   method:"POST",
			   data:{view:view},
			   dataType:"json",
			   success:function(data)
			   {
			    $('.dropdown-menu').html(data.notification);
			    if(data.unseen_notification > 0)
			    {
			     $('.count').html(data.unseen_notification);
			    }
			   }
			  });
			 }
			 
			 load_unseen_notification();
			 
			 $(document).on('click', '.dropdown-toggle', function(){
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
        	</script>
			<script type="text/javascript">
			$(document).ready(function() {
			$('#interesados-grid').on('click', 'tr', function () {
				var curso = $('td', this).eq(0).text();
				var dni = $('td', this).eq(1).text();
		        var nombre = $('td', this).eq(2).text();
		        var apellido = $('td', this).eq(3).text();
		        var telefono = $('td', this).eq(4).text();
		        var correo = $('td', this).eq(5).text();
		        var universidad = $('td', this).eq(6).text();
		        var carrera = $('td', this).eq(7).text();
		        var ciclo = $('td', this).eq(8).text();
		        var distrito = $('td', this).eq(9).text();
		        var descuento = $('td', this).eq(11).text();
		        var monto_pagado = $('td', this).eq(12).text();
		        var monto_restante = $('td', this).eq(13).text();
		        var devolucion_pagada = $('td', this).eq(14).text();
		        var desea_certificado = $('td', this).eq(15).text();
		        var certificado_recogido = $('td', this).eq(16).text();
		        var canal = $('td', this).eq(17).text();
		        var matriculado_por = $('td', this).eq(18).text();
		        var comentario = $('td', this).eq(10).text();
		        $('.modal-title').html("Interesado: "+nombre +" "+ apellido +" ("+ dni+")");
		        $('#dni').val(dni);
		        $('#curso').val(curso);
		        $('#nombre').val(nombre);
		        $('#apellido').val(apellido);
		        $('#telefono').val(telefono);
		        $('#correo').val(correo);
		        $('#universidad').val(universidad);
		        $('#carrera').val(carrera);
		        $('#ciclo').val(ciclo);
		        $('#distrito').val(distrito);
		        $('#descuento').val(descuento+"%");
		        $('#monto_pagado').val(monto_pagado);
		        $('#monto_restante').val(monto_restante);
		        var monto_total = parseFloat(monto_pagado) + parseFloat(monto_restante);
	            $("#monto_pagado").on('keyup keypress change', function()  {
	            	var monto_pagado = $('#monto_pagado').val();
	            monto_restante = parseFloat(monto_total) - parseFloat(monto_pagado);
	            $('#monto_restante').val(monto_restante);
		          });
		        $('#devolucion_pagada').val(devolucion_pagada);
		        $('#certificado').val(desea_certificado);
		        $('#certificado_recogido').val(certificado_recogido);
		        $('#canal').append('<option selected value="'+canal+'">'+canal+'</option>"');
		        $('#matriculado_por').val(matriculado_por);
		        $('#comment').val(comentario);
		        $('#editar-matriculado-modal').modal("show");
		    });
		});
		</script>
				<script type="text/javascript">
				    $(document).ready(function() {
				        $('#tipo_contacto').on('change', function() {
				            var tipo_contacto_id = $(this).val();
				            if (tipo_contacto_id) {
				                $.ajax({
				                    type: 'POST',
				                    url: 'ajax/CallAjax.php',
				                    data: 'tipo_contacto_id=' + tipo_contacto_id,
				                    success: function(html) {
				                        $('#resultado').html(html);
				                        $('#observacion').html('<option value="">Seleccione un resultado primero</option>');
				                    }
				                });
				            } else {
				                $('#resultado').html('<option value="">Tipo de contacto primero</option>');
				                $('#observacion').html('<option value="">Resultado primero</option>');
				            }
				        });

				        $('#resultado').on('change', function() {
				            var resultado_id = $(this).val();
				            if (resultado_id) {
				                $.ajax({
				                    type: 'POST',
				                    url: 'ajax/CallAjax.php',
				                    data: 'resultado_id=' + resultado_id,
				                    success: function(html) {
				                        $('#observacion').html(html);
				                    }
				                });
				            } else {
				                $('#observacion').html('<option value="">Resultado primero</option>');
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
