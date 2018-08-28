<?php
// Initialize the session
session_start();
 
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
	    <title>Grupo CEA</title>
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
				padding: 20px 50px;
			}
			.button1{
				display: block;
				margin: 0 auto;
				padding: 18px 50px;
				background-color: #337AB7;
				color: white;
			}

			.button1:hover{
				background-color: #286090;
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
		    <div id="cursos">
		      <div class="header animated fadeInDown"><h1><b>Cursos</b></h1></div>
				<div class="container">
					<div class="main">
					<table id="courses-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
							<thead>
								<tr>
									<th style="text-align: center;">id_curso</th>
									<th style="text-align: center;">Nombre</th>
									<th style="text-align: center;">Capacidad</th>
									<th style="text-align: center;">Profesor</th>
									<th style="text-align: center;">Sede</th>
									<th style="text-align: center;">Fecha Inicio</th>
									<th style="text-align: center;">Fecha Fin</th>
									<th style="text-align: center;">Horario</th>
									<th style="text-align: center;">Costo</th>
									<th style="text-align: center;">Matriculados Actuales</th>
									<th style="text-align: center;">Creado por</th>
									<th style="text-align: center;">Status</th>
								</tr>
							</thead>
					</table>
					</div>
				</div>
				<br><br>
		    </div>
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
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable1 = $('#courses-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"responsive": true,
					"bPaginate": true,
        			"info":     true,
        			"bFilter": true,
					"ajax":{
						url :"ajax/coursesAjax.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="8">Aun no has registrado ventas</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
	    	setTimeout(function() {
	        var value=$('.sorting_1').closest('tr').children('td:first').text();
	   		$('#ruc').val(value);
	   		//alert(value);
	    	}, 1000);
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
				$(document).ready(function() {
	    			setTimeout(function() {
	        		var rowCount_prospectos = $('#courses-grid >tbody >tr').length;
	        		var prospectos_faltantes = 200 - rowCount_prospectos; 
	        		$('#prospectos_actuales').text(rowCount_prospectos);
	    	var oilCanvas = document.getElementById("oilChart");
			Chart.defaults.global.defaultFontSize = 15;

			var oilData = {
			    labels: [
			        "Prospectos",
			        "Faltantes",
			    ],
			    datasets: [
			        {
			            data: [rowCount_prospectos, prospectos_faltantes],
			            backgroundColor: [
			                "#347BB7",
			                "gray"
			            ]
			        }]
			};

			var pieChart = new Chart(oilCanvas, {
			  type: 'pie',
			  responsive: true,
			  maintainAspectRatio: false,
			  data: oilData
			});
	    		}, 2000);

			});
			</script>
			<script type="text/javascript">
			$(document).ready(function() {
	    	setTimeout(function() {
	    		var sum = 0;
	    		$('#sales-grid > tbody  > tr').each(function(){
	    			var prices=$(this).children('td:eq(5)').text();
	    			//alert(prices);
	    			sum += parseFloat(prices);
	    			
	    			//alert(sum);  
	    		});
	    		sum= sum.toFixed(2);
	    		$('#cargo_fijo').text(sum);
	    			//alert(sum);
	    			}, 2000);
			});
		</script>
</body>
</html>
