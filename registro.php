<?php

	if (isset($_POST["firstname"])) {
    	echo "Yes, mail is set";    
	}

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
			$id = $_GET["albergue"];
			//$id = 1;
			$result = $con->query("SELECT * FROM  ALBERGUE WHERE A_ID = $id");
			$albergue = $result->fetch_array();
			$address = $disaster["A_ADDRESS"];
			$alert = $disaster["A_NAME"];

			echo '
				Estas en el albergue '.$albergue.' <br>
				Con dirección '.$address.' <br>
			';
		?>

		<form name="newUser" method="post" action="registro.php">
		  First name:<br>
		  <input type="text" name="firstname"><br>
		  Last name:<br>
		  <input type="text" name="lastname"><br>
		  Edad:<br>
		  <input type="number" name="age"><br>
		  <input type="submit" name="submit" value="Registrar">
		</form>

	</body>
</html>
<?php
	$con->close();
?>