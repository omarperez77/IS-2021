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
<?php include "includes/scripts.php";
 ?>
	<title>Sistema Ventas</title>
			<style>
	.form_register{
	width: 450px;
	margin: auto;
}
.form_register h1{
	color: #3c93b0;
}
hr{
	border: 0;
	background: #CCC;
	height: 1px;
	margin: 1px 0;
	display: block;
}
form{
	background: #FFF;
	margin: auto;
	padding: 2px 2px;
	border: 1px solid #d1d1d1;
}
label{
	display: block;
	font-size: 12pt;
	font-family: 'GothamBook';
	margin: 15px auto 5px auto;
}
input,select{
	display: block;
	width: 100%;
	font-size: 11pt;
	padding: 5px;
	border: 1px solid #85929e;
	border-radius: 5px;
}
.btn_save{
	font-size: 12pt;
	background: #12a4c6;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
	margin: 15px auto;
}
.alert{
	width: 100%;
	background: #66e07d66;
	border-radius: 6px;
	margin: 20px auto;
}
.msg_error{
	color: #e65656;
}
.msg_save{
	color: #126e00;
}
.alert p{
	padding: 10px;
}
	</style>
</head>
<body>
	<?php include "includes/heater.php";
 ?>
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
	<?php include "includes/footer.php";?>
</body>
</html>