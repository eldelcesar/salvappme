<?php

	include_once('assets/php/salvappme.php');
	$con = new mysqli(SalvAppMe::$db_hostname,SalvAppMe::$db_user,SalvAppMe::$db_password,SalvAppMe::$db_name);
	$con->query("SET NAMES 'utf8'");

	function printAlbergueInfo(){

	}
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

			if(!isset($_POST["firstname"])){
				$id = $_GET["albergue"];
				$result = $con->query("SELECT * FROM  ALBERGUE WHERE A_ID = $id");
				$albergue = $result->fetch_array();
				$address = $albergue["A_ADDRESS"];
				$name = $albergue["A_NAME"];

				echo '

				<div style = "text_align : center">
					Estas en el albergue '.$name.' <br>
					Con dirección '.$address.' <br><br>

					<form name="newUser" method="post" action="registro.php">
					  First name:<br>
					  <input type="text" name="firstname"><br>
					  Last name:<br>
					  <input type="text" name="lastname"><br>
					  Edad:<br>
					  <input type="number" name="age"><br>
					  <input type="submit" name="submit" value="Registrar">
					</form>
				</div>
				';
			}

			else{

				echo "Estas a salvo. Mantente alerta de los avisos de las autoridades";
			}

		?>



	</body>
</html>
<?php
	$con->close();
?>