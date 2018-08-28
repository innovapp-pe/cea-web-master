<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Por favor, ingrese un nombre de usuario.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Por favor, ingrese una contraseña.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password, id, role, name FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $id, $role, $name);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            $_SESSION['id'] = $id;
                            $_SESSION['role'] = $role;
                            $_SESSION['name'] = $name;
                            if($role == 1){
                                header("location: index.php");
                            }
                            if ($role == 2) {
                                       header("location: super/");
                                   }
                                   elseif ($role == 3){
                                        header("location: gerente.php");
                                   }       
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'La contraseña ingresada no es válida.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'El nombre de usuario ingresado no existe.';
                }
            } else{
                echo "Oops! Algo salió mal, intente más tarde, por favor.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>CEA | Iniciar Sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <span class="login100-form-title p-b-26">
						Bienvenido
					</span>
                    <span class="login100-form-title p-b-48">
						<img src="images/logo.png" style="width: 4em; display: block; margin: 0 auto;">
					</span>
                    <div class="wrap-input100 validate-input" data-validate="Ingrese un Usuario Válido">
                        <input class="input100" type="text" name="username" value="<?php echo $username; ?>">
                        <span class="focus-input100" data-placeholder="Usuario"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Ingrese una contraseña">
                        <span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="password">

                        <span class="focus-input100" data-placeholder="Contraseña"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Iniciar Sesión
                            </button>
                        </div>
                    </div>
                    <div class="text-center p-t-115">
                        <span class="txt1">
							Powered by:
						</span>
                        <a class="txt2" href="https://innovapp.pe">
							<img src="images/logo/logo_black.png" style="width: 8em; margin-top: -5px;">
						</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/bootstrap/js/popper.js"></script>
    <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/daterangepicker/moment.min.js"></script>
    <script src="login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="login/js/main.js"></script>
</body>

</html>