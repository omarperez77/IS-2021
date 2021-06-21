<?php 
	  session_start();
	
	  include "../conexion.php";

	  if(!empty($_POST))
	  {
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$nit        = $_POST['nit'];
			$nombre     = $_POST['nombre'];
			$telefono   = $_POST['telefono'];
			$direccion  = $_POST['direccion'];
            $usuario_id = $_SESSION['idUser'];

            $result = 0;

            if(is_numeric($nit) and $init !=0)
            {
            	$query = mysqli_query($conection,"SELECT * FROM cliente WHERE nit = '$nit'");
            	$result = mysqli_fetch_array($query);
	
            }

            if($result > 0){
            	$alert='<p class="msg_error">El numero de NIT ya existe.</p>';

            }else{
            	$query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre,correo,usuario,clave,rol)
																	VALUES('$nombre','$email','$user','$clave','$rol')");

                if($query_insert){
					$alert='<p class="msg_save">Cliente guardado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al guardar el cliente.</p>';													

            }

          }
            
		}

        mysqli_close($conection);

    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "includes/scripts.php";
 ?>
	<title>Registro Cliente</title>
	
</head>
<body>
	<?php include "includes/heater.php";
 ?>
	<section id="container">

		<div class="form_register">
			<h1>Registro Cliente</h1>
			<hr>
			<div class="alert"><?php echo isset ($alert) ? $alert : ''; ?></div>

			<form action= "" method="post">
				<label for="nit">NIT</label>
				<input type="number" name="nit" id="nit" placeholder="Numero de NIT">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
				<label for="Telefono">Telefono</label>
				<input type="number" name="Telefono" id="Telefono" placeholder="Telefono">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion completa">
				<input type="submit" value="Guardar Clientes" class="btn_save">
			</form>
		</div>
	</section>
	<?php include "includes/footer.php";?>
</body>
</html>