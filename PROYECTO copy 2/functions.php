<?php
include ("conexion.php");

if(isset($_POST['aceptar'])){
//function cargarpremium() {
   $link = conectar();
   $tarj=$_POST['numtarjeta'];
   $ven=$_POST['fechaVencimento'];
   $consulta = "UPDATE usuario set numTarjeta = '".$tarj."', fechavencimiento = '".$ven."'
   where mail = '".$_SESSION['mail']."' ";
   $usuario = mysqli_query($link , $consulta);
   $consulta2="SELECT * FROM usuario WHERE mail ='". $_SESSION['mail']."' AND numTarjeta IS NOT NULL";
   $usuario2= mysqli_query($link,$consulta2);
   $row = mysqli_num_rows($usuario2);
   if ($row == 1) {
      ?>
      <script>
        alert("FELICITACIONES!. Se ha convertido en premium");
        window.location.href="perfil.php";
       </script> 
       <?php
   }
 }
//}
function sec_session_start() {

    $session_name = 'sec_session_id';   // Configura un nombre de sesión personalizado.
    $secure = "SECURE";
    // Esto detiene que JavaScript sea capaz de acceder a la identificación de la sesión.
    $httponly = true;
    // Obliga a las sesiones a solo utilizar cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Obtiene los params de los cookies actuales.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($_SESSION['mail'], $cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    // Configura el nombre de sesión al configurado arriba.
    session_name($session_name);
    session_start();            // Inicia la sesión PHP.
    session_regenerate_id();    // Regenera la sesión, borra la previa. 
}

function login_check($mysqli) {
    // Revisa si todas las variables de sesión están configuradas.
    if (isset($_SESSION['mail'],$_SESSION['password'])) {
 
       // $user_id = $_SESSION['mail'];
        $login_string = $_SESSION['password'];
        $username = $_SESSION['mail'];
		
 
        // Obtiene la cadena de agente de usuario del usuario.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
       if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM usuario 
                                      WHERE mail = '".$username."'")) {
            // Une “$user_id” al parámetro.
            $stmt->execute();   // Ejecuta la consulta preparada.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
               
                    // ¡¡Conectado!! 
                    return 1;
                } else {
                    // No conectado.
                    return 2;
                    }
			} else {
				// No conectado.
				return 3;
			}
}else {
				// No conectado.
				return 4;
			}

}

function login_checkadmin($mysqli) {
    // Revisa si todas las variables de sesión están configuradas.
    if (isset($_SESSION['mail'],$_SESSION['password'])) {
 
       // $user_id = $_SESSION['mail'];
        $login_string = $_SESSION['password'];
        $username = $_SESSION['mail'];
        
 
        // Obtiene la cadena de agente de usuario del usuario.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
       if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM admin 
                                      WHERE mail = '".$username."'")) {
            // Une “$user_id” al parámetro.
            $stmt->execute();   // Ejecuta la consulta preparada.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
               
                    // ¡¡Conectado!! 
                    return 1;
                } else {
                    // No conectado.
                    return 2;
                    }
            } else {
                // No conectado.
                return 3;
            }
}else {
                // No conectado.
                return 4;
            }

}

?>