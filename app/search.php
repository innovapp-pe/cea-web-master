<?php
// Initialize the session
session_start();
//Include database configuration file
include('config.php');
$dni_to_search =  $_POST['dni_to_search'];
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	    <title>Resultado de Busqueda</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	    <!-- Chrome, Firefox OS and Opera -->
	    <meta name="theme-color" content="#1C1F26">
	    <!-- Windows Phone -->
	    <meta name="msapplication-navbutton-color" content="#1C1F26">
	    <!-- iOS Safari -->
	    <meta name="apple-mobile-web-app-status-bar-style" content="#1C1F26">
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
		<link rel="shortcut icon" href="images/favicon.png">
		<style>
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
			div.header {
			    margin: 80px auto;
			    line-height:30px;
			    max-width:760px;
			    text-align: center;
			}
			body {
			    background: white;
			    color: #333;
			    font-family: 'Raleway', sans-serif;
			}

			.button-search{
				display: inline-block;
				margin: 0 auto;
				font-size: 12px;
				height: 28px;
				background-color: #02BCED;
				-webkit-transition: background-color 500ms linear;
			    -ms-transition: background-color 500ms linear;
			    transition: background-color 500ms linear;
				border: none;
				color: white;
			}

			.button-search:hover{
				background-color: #0A9BF8;
				-webkit-transition: background-color 500ms linear;
			    -ms-transition: background-color 500ms linear;
			    transition: background-color 500ms linear;
			}

			.right-corder-container {
		        position: fixed;
		        right: 30px;
		        bottom: 20px;
		    }


		    .right-corder-container .right-corder-container-button {
		        border: none;
		        background-color: black;
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
				padding: 20px 50px;
			}
			.button1{
				display: block;
				margin: 0 auto;
				padding: 8px 30px;
				background-color: #02BCED;
				-webkit-transition: background-color 500ms linear;
			    -ms-transition: background-color 500ms linear;
			    transition: background-color 500ms linear;
				border-radius: 5px;
				border: none;
				color: white;
			}

			.button1:hover{
				background-color: #0A9BF8;
				-webkit-transition: background-color 500ms linear;
			    -ms-transition: background-color 500ms linear;
			    transition: background-color 500ms linear;
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

			.new-client-button{
				display: block;
				margin: 0 auto;
				padding: 8px 30px;
				background-color: #010101;
				-webkit-transition: background-color 1000ms linear;
			    -ms-transition: background-color 1000ms linear;
			    transition: background-color 1000ms linear;
				border-radius: 0px;
				border: none;
				color: white;
			}

			.new-client-button:hover{
				background-color: #303030;
				-webkit-transition: background-color 1000ms linear;
			    -ms-transition: background-color 1000ms linear;
			    transition: background-color 1000ms linear;
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
                    <a class="navbar-brand" href="#"><span><img src="images/logo-positivo.png" style="display: block; margin: 0 auto; width: 4em; margin-top: -10px;"></span>
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
                    Agendados para Hoy</span></a>
                            <ul class="dropdown-menu"></ul>
                        </li>
                        <li class=""><a href="index.php"><span><i class="fas fa-user-plus"></i>
                </span>Nuevo Prospecto</a></li>
                        <li><a href="prospectos.php"><span><i class="fas fa-coins"></i></span> Mis Prospectos</a></li>
                        <li><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		<div class="container-fluid">
		<div id="hola" class="header animated fadeInDown">
			<div class="stoppable col-xs-12 col-sm-6 col-md-6 col-lg-6">
				 <canvas style="display: none" width="130" height="100"></canvas>
				<img src="images/search.png" style="display: block; margin: 0 auto; width: 10em;">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h1 style="font-size: 30px;"><b><?php echo htmlspecialchars($_SESSION['name']); ?></b>, este es el resultado de tu búsqueda: <?php echo htmlspecialchars( $_POST['dni_to_search']); ?>.</h1>
			</div>
		</div>
		</div>
		<br><br>
		<div id="new-client-container" class="container">
			<br>
			<div class="main">
			<table id="search-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th style="text-align: center;">DNI</th>
							<th style="text-align: center;">Nombres</th>
							<th style="text-align: center;">Apellidos</th>
							<th style="text-align: center;">Telefono</th>
							<th style="text-align: center;">Correo</th>
							<th style="text-align: center;">Universidad</th>
							<th style="text-align: center;">Carrera</th>
							<th style="text-align: center;">Ciclo</th>
							<th style="text-align: center;">Distrito</th>
							<th style="text-align: center;">Premio</th>
							<th style="text-align: center;">Manager</th>
							<th style="text-align: center;">Fecha Gestión</th>
						</tr>
					</thead>
			</table>
			</div>
			<br><br>
		</div>
		<br><br>
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/es-us.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<script type="text/javascript" src="main.min.js"></script>
		<script type="text/javascript">
				    $(document).ready(function() {
				        $('#t_contacto').on('change', function() {
				            var t_contacto_id = $(this).val();
				            if (t_contacto_id) {
				                $.ajax({
				                    type: 'POST',
				                    url: 'ajaxData.php',
				                    data: 't_contacto_id=' + t_contacto_id,
				                    success: function(html) {
				                        $('#result').html(html);
				                        $('#reasson').html('<option value="">Seleccione un resultado primero</option>');
				                    }
				                });
				            } else {
				                $('#result').html('<option value="">Tipo de contacto primero</option>');
				                $('#reasson').html('<option value="">Resultado primero</option>');
				            }
				        });

				        $('#result').on('change', function() {
				            var result_id = $(this).val();
				            if (result_id) {
				                $.ajax({
				                    type: 'POST',
				                    url: 'ajaxData.php',
				                    data: 'result_id=' + result_id,
				                    success: function(html) {
				                        $('#reasson').html(html);
				                    }
				                });
				            } else {
				                $('#reasson').html('<option value="">Resultado primero</option>');
				            }
				        });

				        $('#reasson').on('change', function() {
				            var reasson_id = $(this).val();
				            var result_id = $('#result').val();
				            //alert(result_id);
				            if (result_id=1) {
				                $.ajax({
				                    type: 'POST',
				                    url: 'ajaxData.php',
				                    data: 'reasson_id=' + reasson_id,
				                    success: function(html) {
				                        $('#plan').html(html);
				                    }
				                });
				            } else {
				                $('#plan').html('<option value="">Razón primero</option>');
				            }
				        });

				        $('#plan').on('change', function() {
				            var plan_id = $(this).val();
				            var result_id = $('#result').val();
				            //alert(result_id);
				            if (result_id=1) {
				                $.ajax({
				                    type: 'POST',
				                    url: 'ajaxData.php',
				                    data: 'plan_id=' + plan_id,
				                    success: function(html) {
				                        $('#phone_model').html(html);
				                    }
				                });
				            } else {
				                $('#phone_model').html('<option value="">Razón primero</option>');
				            }
				        });

				    });
    	</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
	    	setTimeout(function() {
	   		var telefono=$('.odd').closest('tr').find('td:eq(3)').text();
		 	//alert(fecha_agendado_table);
	   		//alert(table_ruc);
	    	}, 1000);

	    	$(function(){
			    $('.odd').on('click', 'td:eq(3)', function(){
			    	var telefono=$('.odd').closest('tr').find('td:eq(3)').text();
			        document.location.href = 'tel:'+telefono;
			    });
			});

			});
		</script>
		 <script type="text/javascript">
			 	$(function () {
				  	$("#result").change(function() {
				    var val = $(this).val();
				    if(val == 1) {
				        $("#plan").show();
				        $("#phone_model").show();
				    }
				    else{
				        $("#plan").hide();
				        $("#phone_model").hide();
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
		  <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
				    format: 'YYYY-MM-DD HH:mm:ss'
				});
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
				   
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable = $('#search-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"responsive": true,
					"bPaginate": false,
        			"info":     false,
        			"bFilter": false,
        			"ordering": false,
					"ajax":{
						url :"search-data.php", // json datasource
						data: ({dni_to_search: <?php echo $dni_to_search ?>}),
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="8">No hay resultados</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
		</script>
</body>
</html>
