 <?php 
$alert='';
if (!empty($_POST)) {
	if (empty($_POST['usuario']) || empty($_POST['clave'])) {
		$alert = 'Ingrese su usuario y su Clave';
	}else{
		require_once "conexion.php";

		$user = $_POST['usuario'];
		$pass = $_POST['clave'];

		$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE nomusuario= '$user' AND contrasena= '$pass' ");
		$result = mysqli_num_rows($query);

		if ($result > 0) {
			$data = mysqli_fetch_array($query);
			session_start();
			$_SESSION['active'] = true;
			$_SESSION['idUser'] = $data['id_usuario'];
			$_SESSION['user'] =$data['nomusuario'];
			$_SESSION['email'] =$data['emailrecup'];
			$_SESSION['nivel'] =$data['nivelacceso'];
			header('location: sistema/');
		}else{
		$alert=('El usuario o la clave son incorrectos');
		session_destroy();
	   }
	}
}
   ?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | Sistema De Facturacion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section id="container">
		<form action="" method="post">
			<h3>Iniciar Sesion</h3>
			<img src="img/login.png" alt="Login">
			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<div class="alert"> <?php echo isset($alert) ?$alert:''; ?></div>
			<input type="submit" value="INGRESAR">
		</form>
	</section>
</body>
</html>