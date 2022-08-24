<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Consultorio</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

<?php include "menu.php"; ?>

<?php 
    include_once ("conexion.php");

    $id_usuario = "";
    $nombres = "";
    $apellidos = "";
    $direccion = "";
    $telefono = "";
    $correo = "";
    $password = "";
    $estado = "";
    $tipo_usuario = "";


    if(!empty($_POST['id_usuario'])){
        $id_usuario=limpiar($_POST['id_usuario']);

        $con = mysql_query("SELECT id_usuario FROM usuario WHERE id_usuario = '$id_usuario'");

        if($row=mysql_fetch_array($con)){
            echo "...El usuario ya existe...";
        }else{

        $nombres=limpiar($_POST['nombres']);
        $apellidos=limpiar($_POST['apellidos']);
        $direccion=limpiar($_POST['direccion']);
        $telefono=limpiar($_POST['telefono']);
        $correo=limpiar($_POST['correo']);
        $password=limpiar($_POST['password']);
        $estado=limpiar($_POST['estado']);
        $tipo_usuario=limpiar($_POST['tipo_usuario']);


        mysql_query("INSERT INTO usuario (id_usuario, nombres, apellidos, direccion, telefono, correo, password, estado, tipo_usuario) VALUES ('$id_usuario', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', '$password', '$estado', '$tipo_usuario')");

        $conn = mysql_query("SELECT * FROM permisos_tem");

        if($tipo_usuario == 'abogado'){

            while($row = mysql_fetch_array($conn)) {
                $codigo_permiso = $row['codigo_permiso_tem'];

                mysql_query("INSERT INTO permisos (permiso,usuario,estado)
                        VALUES ('$codigo_permiso','$correo','s')");
                
            }
        }else{

            while($row = mysql_fetch_array($conn)) {
                $codigo_permiso = $row['codigo_permiso_tem'];

                if($row['nombre_permiso'] == 'registrar_usuarios'){
                    mysql_query("INSERT INTO permisos (permiso,usuario,estado)
                        VALUES ('$codigo_permiso','$correo','s')");
                }else{
                    if($row['nombre_permiso'] == 'consultar_usuarios'){
                        mysql_query("INSERT INTO permisos (permiso,usuario,estado)
                            VALUES ('$codigo_permiso','$correo','s')");
                    }else{
                        if($row['nombre_permiso'] == 'consultar_productos'){
                            mysql_query("INSERT INTO permisos (permiso,usuario,estado)
                                VALUES ('$codigo_permiso','$correo','s')");
                        }else{
                            mysql_query("INSERT INTO permisos (permiso,usuario,estado)
                                VALUES ('$codigo_permiso','$correo','n')");
                        }
                    }
                }  
            }
        }   
    }
}     
?>

<article id="formulario" class="container">
        <center>
            <form action="" method="POST">                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">IDENTIFICACION DEL USUARIO:</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="id_usuario"> 
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">NOMBRES DEL USUARIO:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombres">
                    </div>
                </div>   
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">APELLIDOS DEL USUARIO:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="apellidos">
                    </div>
                </div>     
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">DIRECCION DEL USUARIO:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="direccion">
                    </div>
                </div>  
                <div class="form-group row">
                   <label for="colFormLabel" class="col-sm-3 col-form-label">TELEFONO DEL USUARIO:</label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="telefono">
                   </div>
                </div>    
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">CORREO DEL USUARIO:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="correo">
                    </div>
                </div>    
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">CONTRASEÑA:</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>    
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">ESTADO:</label>
                    <div class="col-sm-6">
                       <select type="text" class="form-control" name="estado">
                        <option value="s">ACTIVO</option>
                        <option value="n">INACTIVO</option>
                    </select> 
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">TIPO DE USUARIO:</label>
                    <div class="col-sm-6">
                        <select type="text" class="form-control" name="tipo_usuario">
                        <option value="abogado">ABOGADO</option>
                        <option value="cajero">SECRETARIO</option>
                    </select>
                    </div>
                </div>     
                <br>
                <button type="submit" class="btn btn-light">ACEPTAR</button>
            </form>
        </center>
    </article> 

    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>    