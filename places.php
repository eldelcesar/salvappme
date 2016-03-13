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
		<title>SalvAppMe | Lugares</title>
		<link rel="stylesheet" type="text/css" href="<?php echo SalvAppMe::$domain; ?>assets/css/main.css">
	</head>
	<body style="margin: 0; overflow-x: hidden">
		<?php 
			$id = $_GET["place"];
			//$id = 2;
			$result = $con->query("SELECT * FROM PLACE WHERE L_ID = $id");
			$place_name = $result->fetch_array();
			$municipio = $place_name["MUNICIPIO"];
			echo '
				<div style="width: 90%; heigth: 100%; padding: 5%;">
					<h1 style="text-align: center" >'.$municipio.'</h1>
					<h3 style="text-align: center">Albergues disponibles:</h3>
					<ul>
			';
			$result2 = $con->query("SELECT * FROM PLACE NATURAL JOIN ALBERGUE WHERE L_ID = $id");
			while($place = $result2->fetch_array()){
				$name_albergue = $place["A_NAME"];
				$address_albergue = $place["A_ADDRESS"];
				echo '
				<li><strong>'.$name_albergue.':</strong> '.$address_albergue.'</li>
			';
			}
			echo '
				</ul>
				<h3 style="text-align: center">Hospitales disponibles:</h3>
				<ul>
			';
			$result3 = $con->query("SELECT * FROM PLACE NATURAL JOIN HOSPITAL WHERE L_ID = $id");
			while($hospital = $result3->fetch_array()){
				$name_hosp = $hospital["H_NAME"];
				$address_hosp = $hospital["H_ADDRESS"];
				echo '
				<li><strong>'.$name_hosp.':</strong> '.$address_hosp.'</li>
			';
			}
			echo '
				</ul>
			';
		?>
	</body>
</html>
<?php
	$con->close();
?>