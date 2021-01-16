
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
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
							  <li ><a href="connexion.php">Connexion</a></li>
							<li class="active"><a  href="#">Inscription</a></li>
						  <li><a href="../public.php">Accueil</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="grid">
			<div class="col-1-1" style="padding-right: 0;">
				<div class="content">
					<div class="messageErreur error">
						<span id="messageErreurNom"></span>
						<span id="messageErreurPrenom"></span>
						<span id="messageErreurTelephone"></span>
						<span id="messageErreurPseudo"></span>
						<span id="messageErreurMotDePasse"></span>
						<span id="messageErreurMotDePasseAgain"></span>
						<span id="messageErreurFinal"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="grid">
			<div class="col-1-1" style="padding-right: 0;">
				<div class="content">
						<fieldset style="width: 50px; margin: 50px auto; background: white;">
							<legend><i class="fa fa-user fa-2x"></i></legend>
							<form action="traitInsc.php" method="post" id="formInscription">
								<table>
									<tr>	
										<td><input type="text" name="nomPers" id="nomPers" required="" autofocus="" placeholder="Nom"></td>
									</tr>
									<tr>
										
										<td><input type="text" name="prenomPers" id="prenomPers" required="" placeholder="Prénom"></td>
									</tr>
									<tr>
										<td style="text-align: center;">
											  <input type="radio" name="sexePers" value="H" id="masculin" checked="" style="width: 8%"> <label for="masculin">Masculin</label>
											  <input type="radio" name="sexePers" value="F" id="feminin" style="width: 8%"><label for="feminin">Féminin</label> 
										</td>
									</tr>
									<tr>
										
										<td><input type="tel" name="telPers" id="telPers" required="" placeholder="Télépohne"></td>
									</tr>
									<tr>
									
										<td><input type="text" name="pseudoPers" id="pseudoPers" required="" placeholder="Pseudonyme"></td>
									</tr>
									
									<tr>
										
										<td><input type="password" name="mdpPers" id="mdpPers" required="" required="" placeholder="Mot De Passe"></td>
									</tr>
									<tr>
										
										<td><input type="password" name="mdpPersConfirm" id="mdpPersConfirm" required="" placeholder="Confirmation Mot De Passe"></td>
									</tr>
									
									<tr>
										<td style="text-align: center"><input type="submit" value="Valider">&nbsp;<input type="reset" value="Annuler" id="formInscriptionReset"></td>
									</tr>
								</table>
							</form>
						</fieldset>	
				</div>
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