<?php
	session_start();
	include_once ("conexion.php");

	$correo = $_SESSION['cod_user'];

?>
	<nav class="navbar navbar-expand-lg navbar-light  mb-5">
		<a class="navbar-brand" href="#">
			<i class="fas fa-user-cog"></i>ABOGADO
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<?php 
					$conn = mysql_query("SELECT * FROM permisos
										 INNER JOIN permisos_tem
										 ON permisos.permiso = permisos_tem.codigo_permiso_tem
										 AND permisos.usuario = '$correo'");

					while($row = mysql_fetch_array($conn)) {
		                if($row['nombre_permiso'] == 'crear_usuario' && $row['estado'] == 's'){
		                	echo '<li class="nav-item">
										<a class="nav-link active" href="usuarios.php">REGISTRAR USUARIOS</a>
									</li>';
		                }


		                if($row['nombre_permiso'] == 'consultar_usuario' && $row['estado'] == 's'){
		                	echo '<li class="nav-item active">
										<a class="nav-link" href="consultar_usuario.php">CONSULTAR USUARIOS</a>
									</li>';
		                }

		                if($row['nombre_permiso'] == 'crear_cliente' && $row['estado'] == 's'){
		                	echo '<li class="nav-item active">
										<a class="nav-link" href="cliente.php">CREAR CLIENTE</a>
									</li>';
		                }

		                if($row['nombre_permiso'] == 'consultar_cliente' && $row['estado'] == 's'){
		                	echo '<li class="nav-item active">
										<a class="nav-link " href="consultar_cliente.php">CONSULTAR CLIENTES</a>
								    </li>';
		                }


		            }
				?>																							
					
				</ul>

				<form class="form-inline my-2 my-lg-0">
					<a href="cerrar_sesion.php"><span aria-hidden="true"><img src="img/logout.png"></span></a>
				</form>
		</div>
	</nav>