<?php

	if(!empty($_POST)){
		var_dump($_POST);
		$alert='';
		if(empty($_POST['fechaEnt']) || empty($_POST['nombreRep']) || empty($_POST['NomPro'])
		|| empty($_POST['subCompra']) || empty($_POST['impuComp']) || empty($_POST['totalCom'])){
			$alert='<p class="msg_error">Todos los campos son obligatorios</p>';

		} else {

			

			include "../conexion.php";
			$fechaEnt = $_POST['fechaEnt'];
			$nombreRep = $_POST['nombreRep'];
			$NomPro = $_POST['NomPro'];
			$subCompra = $_POST['subCompra'];
			$impuComp = $_POST['impuComp'];
			$totalCom = $_POST['totalCom'];
			

			/*$query = mysqli_query($conection, "SELECT * FROM proveedores WHERE correoelectronico = '$correo_prov'");
			$result = mysqli_fetch_array($query);
			if($result > 0){
				$alert='<p class="msg_error">El correo ya existe</p>';
			} else {*/
				$query_insert = mysqli_query($conection, "INSERT INTO compras (fechaentrada, id_empleado,
				id_proveedor, subtotalcompra, impuestocompra, totalcompra)
				VALUES ('$fechaEnt', '$nombreRep', '$NomPro', '$subCompra', '$impuComp',
				'$totalCom')");
				if($query_insert){
					$alert='<p class="msg_save">Compra Agregada con exito</p>';
				} else {
					$alert='<p class="msg_error">Error al registrar la compra</p>';
				}
			//}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Document</title>
</head>
<body>

    <header>
		<div class="header">
			
			<h1>Punto De Venta</h1>
			<div class="optionsBar">
				<p>La Concha, Jalisco, 15 Junio de 2021</p>
				<span>|</span>
				<span class="user">Ismael Sanchez</span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<li><a href="#">Nuevo Usuario</a></li>
						<li><a href="#">Lista de Usuarios</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Clientes</a>
					<ul>
						<li><a href="#">Nuevo Cliente</a></li>
						<li><a href="#">Lista de Clientes</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Proveedores</a>
					<ul>
						<li><a href="#">Nuevo Proveedor</a></li>
						<li><a href="#">Lista de Proveedores</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Productos</a>
					<ul>
						<li><a href="#">Nuevo Producto</a></li>
						<li><a href="#">Lista de Productos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Facturas</a>
					<ul>
						<li><a href="#">Nuevo Factura</a></li>
						<li><a href="#">Facturas</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Compras</a>
					<ul>
						<li><a href="#">Nueva Compra</a></li>
						<li><a href="#">Lista de Compras</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<section id="container">
    <div class="form_register">
            <h1>Registro Compras</h1>
            <hr>
            <div class="alert"><?php echo isset($alert ) ? $alert : '';?></div>
            <form action="" method="post">
                <label for="fechaEnt">Fecha de Entrada</label>
                <input type="text" name="fechaEnt" id="fechaEnt" placeholder="Fecha de Entrada">
                <label for="nombreRep">Nombre Repartidor</label>
                <input type="text" name="nombreRep" id="nombreRep" placeholder="Nombre Repartidor">
                <label for="NomPro">Nombre Proveedor</label>
                <input type="text" name="NomPro" id="NomPro" placeholder="Nombre Proveedor">
                <label for="subCompra">Subtotal de Compra</label>
                <input type="number" name="subCompra" id="subCompra" placeholder="Subtotal de comprar">
                <label for="totalCom">Total de Compra</label>
                <input type="number" name="totalCom" id="totalCom" placeholder="Tota compra">
                <label for="impuComp">Impuesto de Compra</label>
                <input type="number" name="impuComp" id="impuComp" placeholder="Impuesto compra">
                <input type="submit" value="Registrar Compra" class="btn_proveedor">
            </form>
        </div>
	</section>

    <section id="container">
       
    </section>

</body>
</html>