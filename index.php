<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Login | Programmeur</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="fontAwesome/css/font-awesome.min.css">
</head>
<body style="display: flex; justify-content: center; align-items: center;">
	
		<fieldset class="designFormConnexionProgrammeur">
			<legend><i class="fa fa-user fa-2x" style="color: black;"></i></legend>
			<form action="res/traitement.php" method="post" id="formConnexionAdmin">
				<table>
					<tr>
						<td id="connexionError" class="error" style="text-align: center;"></td>
					</tr>
					<tr>
						<td><input type="text" name="idConn" id="idConn" required="" autofocus="" placeholder="Identifiant"></td>
					</tr>
					<tr>
						<td><input type="password" name="pswdConn" id="pswdConn" required="" placeholder="Mot de passe"></td>
					</tr>
					<tr>
						<td  style="text-align: center;"><input type="submit" value="Connexion" id="adminSubmit">&nbsp;<input type="reset" value="Annuler" id="adminReset"></td>
					</tr>
				</table>
			</form> 
		</fieldset>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>