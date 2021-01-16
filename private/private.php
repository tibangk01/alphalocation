<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Admin</title>
	<link rel="stylesheet" href="../css/styleAdmin.css">
	<link rel="stylesheet" href="../css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="../fontAwesome/css/font-awesome.min.css">
</head>
<body style="display: flex; justify-content: center; align-items: center;" > 
		<fieldset class="designFormConnexionAdmin">
			<legend><i class="fa fa-user fa-2x"></i></legend>
			<form action="pages/traitConnexionAdmin.php" method="post">
				<table>
					<tr>
						<td><span id="affichageMessageErreurConnexion"></span></td>
					</tr>
					<tr>
						<td><input type="text" name="identifiantConnexionAdmin" placeholder="Identifiant " required="" autofocus=""></td>
					</tr>
					<tr>
						<td><input type="password"  name="passwordConnexionAdmin" placeholder="Mot de passe" required=""></td>
					</tr>
					<tr>
						<td><input type="submit" value="Connexion"><input type="reset" value="Annuler"></td>
					</tr>
				</table>
			</form>
		</fieldset>
	 <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/scriptAdmin.js"></script>
</body>
</html>