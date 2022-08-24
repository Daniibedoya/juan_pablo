<?php  

    session_start();
    include 'conexion.php';

    if (!empty($_POST['correo']) and !empty($_POST['password'])) {
        $correo=$_POST['correo'];
        $password=$_POST['password'];

        $consulta=mysql_query("SELECT * FROM usuario WHERE usuario.correo='$correo' AND usuario.password='$password'");
        if($row=mysql_fetch_array($consulta)){
            if ($row['estado']=='s') {
                $usuario=$row['nombres'];
                $usuario=explode(" ",$usuario);
                $usuario=$usuario[0];
                $_SESSION['user_name']=$usuario;
                $_SESSION['tipo_user']=$row['tipo_usuario'];
                $_SESSION['cod_user']=$correo;
                if ($row['tipo_usuario']=='abogado' ) {
                    echo '<script> alert("BIENVENIDO ABOGADO"); </script>';
                    echo '<meta http-equiv="refresh" content="2;url=usuarios.php">';

                }else if ($row['tipo_usuario']=='secretaria') {
                    echo '<script> alert("BIENVENIDA SECRETARIA"); </script>';
                    echo '<meta http-equiv="refresh" content="2;url=usuarios.php">';
                }
            }else{
                echo '<script> alert("EL USUARIO NO SE ENCUENTRA HABILITADO"); </script>';
            }
        }else{
            echo '<script> alert("EL USUARIO Y LA CONTRASEÑA NO COINCIDEN"); </script>';
        
        }
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Consultorio</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/miestilo.css">
</head>
<body>

    <div class="container">

        <center>
            <h1>INICIAR SESIÓN</h1>
                <img class="foto" src="img/1524cae5-3221-41fe-b2d8-56afdc65ecf6.jpg" width="300" height="300">
                    <form action="" class="form-group col-sm-4" method="POST">
                    <div class="card-header">
                        <label>CORREO:</label>
                        <input type="text" class="form-control" name="correo">

                        <label>CONTRASEÑA:</label>
                        <input type="password" class="form-control" name="password">
                        <br>
                        <button type="submit" class="btn btn-light">ACEPTAR</button>
                    </div>
            </form>
        </center>
    </div>    

</body>
</html>