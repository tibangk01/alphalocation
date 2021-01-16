<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="../../fontAwesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="grid">
			<div class="col-1-3 logo">
				<div class="content">
					<a href="accueilApresConnexion.php"><img src="../images/logo.png"></a>
				</div>
			</div>
			<div class="col-2-3 ">
				<div class="content">
					<div class="menu_nav">
						<ul>
						  <li class="active"><a href="#">Connexion</a></li>
						  <li><a  href="inscription.php">Inscription</a></li>
						  <li><a href="../public.php">Accueil</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="grid" >
			<div class="col-1-1" style="padding-right: 0;">
						<fieldset style="width: 50px; margin: 100px auto 50px auto; background: white;">
							<legend><i class="fa fa-user fa-2x"></i></legend>
							<form action="traitConn.php" method="post">
								<table>
									<tr>
										<td><input type="text" name="idUser" required="" autofocus="" placeholder="Identifiant"></td>
									</tr>
									<tr>
										<td><input type="password" name="mdpUser" required="" placeholder="Mot De Passe "></td>
									</tr>
									<tr>
										<td style="text-align: center;">
											<input type="submit" value="Connection">
											<input type="reset" value="Annuler">
										</td>
									</tr>
								</table>
								
						</form>
					</fieldset>
						
			</div>
		</div>
		<div class="grid">
			<div class="col-1-1">
				<div class="content">
					<div class="footer">
						&copy; fab BTS | <?php echo date('Y'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/script.js"></script>
</body>
</html>