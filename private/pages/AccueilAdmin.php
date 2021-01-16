<?php
	session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accueil | Admin</title>
	<link rel="stylesheet" href="../../css/styleAdmin.css">
	<link rel="stylesheet" type="text/css" href="../../css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="../../fontAwesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container" >
		<div class="grid grid-pad">
			<div class="col-1-1 col-padding-center">
				<div class="content">
					<div class="col-1-1" style="padding-right: 0;">
							<div style=" width: 30%; margin:auto; padding: 30px; text-align: center;">
								INTERFACE ADMINISTRATEUR
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="grid grid-pad" style="padding-top:50px;">
			<div class="col-5-12">
				<div class="content">	
					<div class="col-1-1" style="padding-right: 0;">
						<fieldset>
							<legend>Déconnexion</legend>
							<div style="padding: 20px;width: 50%; margin: 0 auto; text-align: center;">
									<input type="button" value="Se Déconnecter" onclick="location.href='deconnexionAdmin.php';">
								</div>
						</fieldset>	
					</div>
					<div class="col-1-1" style="padding-right: 0;">
						<fieldset style=" margin: 20px auto;" >
							<legend>Informations Admin</legend>
								<table style="margin: auto;">
								<tr>
									<td>Nom: </td>
									<td>komlani</td>
								</tr>
								<tr>
									<td>Prénom: </td>
									<td>fabien</td>
								</tr>
								<tr>
									<td>Pseudo Admin :</td>
									<td><?php echo "{$_SESSION['pseudoAdmin']}"; ?></td>
								</tr>
							</table>
						</fieldset>
					</div>
					<div class="col-1-1">
						<fieldset style="margin: auto;">
								<legend>Statistiques Générales</legend>
									<table style="margin: auto;">
										<tr>
											<td>Nombre total d'annonces:</td>
											<td>10000</td>
										</tr>
										<tr>
											<td>Nombre total d'inscrits:</td>
											<td>12332233</td>
										</tr>
										<tr>
											<td>Nombre de personnes bloquées: </td>
											<td>0</td>
										</tr>
									</table>	
						</fieldset>
					</div>
					
				</div>	
			</div>
			<div class="col-7-12">
				<div class="content">
					<fieldset>
							   <legend>Ajouter Un Type De Bâtiment</legend>
					     <div class="col-1-1" style="padding-right: 0;">	
						  <div style="margin:0 auto 10px auto;text-align: center; ">
						  		
						  </div>
						</div>
						<div class="col-1-1" style="padding-right: 0;">	
							   <form action="#" method="post" style=" margin:10px auto 20px auto; text-align: center;">
									<input type="text">&nbsp;&nbsp;<input type="submit" value="Ajouter">
							   </form> 
						</div>
					</fieldset>
					<fieldset style="margin-top: 20px;">
						<legend>Liste des types de bâtiments</legend>
						<div class="col-1-1">
								<div style=" margin:20px auto; text-align: center;" >
										<input type="button" value="Liste des types de bâtiments" onclick="location.href='listeTypeBatiment.php';">
								</div>	
						</div>
					</fieldset>
					<div class="col-1-1">
						<fieldset style="margin: 20px auto 0 auto;" >
							<legend>Suppression D'une Personne</legend>
								<div style=" margin: 20px auto; text-align: center;" >
									<input type="button" value="Supprimer des Personnes" onclick="location.href='suppressionPersonne.php'">
								</div>
						</fieldset>
					</div>
				</div>	
			</div>
		</div>
		<div class="grid grid-pad">
			<div class="col-1-1">
				<div class="content">
					<div style="margin: 30px auto; width: 20%; ">
						&copy; fab BTS | <?php echo date('Y'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/scriptAdmin.js"></script>
</body>
</html>