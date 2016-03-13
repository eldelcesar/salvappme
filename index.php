<?php
	include_once('assets/php/salvappme.php');
	$con = new mysqli(SalvAppMe::$db_hostname,SalvAppMe::$db_user,SalvAppMe::$db_password,SalvAppMe::$db_name);
	$con->query("SET NAMES 'utf8'");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>SalvAppMe</title>
		<link rel="stylesheet" type="text/css" href="<?php echo SalvAppMe::$domain; ?>assets/css/main.css">
	</head>
	<body style="margin: 0; overflow-x: hidden">
		<?php 
			$id = $_GET["disaster"];
			//$id = 1;
			$result = $con->query("SELECT * FROM DISASTER WHERE D_ID = $id");
			$disaster = $result->fetch_array();
			$desription = $disaster["DESCRIPTION"];
			$alert = $disaster["ALERT"];
			$date = $disaster["D_DATE"];
			$type = $disaster["P_NAME"];

			$result2 = $con->query("SELECT * FROM PHENOMENON WHERE P_NAME = '$type'");
			$phenomenon = $result2->fetch_array();
			$image = $phenomenon["IMAGE"];
			$reccom = $phenomenon["RECCOMENDATIONS"];


			echo '
				<div style="width: 90%; heigth: 100%; padding: 5%;">
					<h1 style="text-align: center" >Alerta: '.$alert.' '.$type.'</h1>
					<img style="width: 80%; margin-left: 10%" src="'.SalvAppMe::$domain.'assets/img/'.$image.'">
					<p>'.$desription.'</p>
					<h3>Recomendaciones:</h3>
					<p>'.$reccom.'</p>
					<h5><a href="'.SalvAppMe::$domain.'hospitales/">Hospitales</a> | <a href="'.SalvAppMe::$domain.'albergues/">Albergues</a></h5>
				</div>

			';
		?>

		<!--<div style="width: 90%; heigth: 100%; padding: 5%;" >
			<h1 style="text-align: center" >Alerta: Posible Huracán</h1>
			<img style="width: 80%; margin-left: 10%" src="<?php echo SalvAppMe::$domain; ?>assets/img/huracan.jpg">
			<p>El huracán Patricia es categoría 5. Actualmente tiene posibilidades de entrar a los estados de Jalisco, Nayarit y Colima.
			Los municipios Nuveo Vallarta y Puerto Vallarta, deben entrar en estado alerta.</p><br>
			<h3>Recomendaciones:</h3>
			<p>Medidas preventivas: 
			– Revisar el equipo de emergencia y tenerlo preparado. <br>
			– Fijar y amarrar bien lo que el viento pueda lanzar o arrastrar el agua. <br>
			– Guardar objetos sueltos (macetas, botes de basura, herramientas, etc.) que pueda lanzar el viento. <br>
			– Limpiar la azotea, desagües, canales y coladeras; limpiar también de hojarasca o ramas en la calle, despejando los tragantes de aguas. <br>
			– Si se tiene vehículo, asegurarse de que funciona correctamente. <br>
			– Cerrar las llaves de tuberías de agua hacia la casa para evitar el acceso de aguas negras. Sellar la tapa de su pozo o aljibe para tener agua de reserva no contaminada. <br>
			– Si su casa es frágil o está en una zona de riesgo, tener previsto un refugio o un albergue donde poder trasladarse. <br>
			– Seguir las recomendaciones de las autoridades si indican la sobre evacuaciones en el área y/o la casa donde vive.<br>
			 
			En caso de evacuación:
			– Asegurar su casa y llevar con usted los artículos indispensables.<br>
			– Conservar la calma y tranquilizar a sus familiares. <br>
			– Escuchar con su radio portátil, la información o instrucciones relativas al suceso. <br>
			– Desconectar todos los aparatos y el interruptor de energía eléctrica. <br>
			– Cerrar las llaves de gas y agua. <br>
			- Ayudar a alertar a sus familiares y conocidos.<br>
			</p>
			<h5><a href="">Hospitales</a> | <a href="">Albergues</a></h5>
		</div>-->
	</body>
</html>
<?php
	$con->close();
?>