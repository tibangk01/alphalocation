<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin | suppression</title>
	<link rel="stylesheet" href="../../css/styleAdmin.css">
	<link rel="stylesheet" href="../../css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="../../fontAwesome/css/font-awesome.min.css">
</head>
<body>

	<div class="container">
		<div class="grid grid-pad">
			<div class="col-1-2">
				<div class="content">
					<div style="padding: 30px;margin: 0 auto; text-align: center; background:#dec3c3;">
						<input type="button" value="Accueil" onclick="location.href='AccueilAdmin.php';"> |
						<input type="button" value="Liste des types de bâtiments" onclick="location.href='listeTypeBatiment.php';"> |
						<input type="button" value="Déconnexion" onclick="location.href='deconnexionAdmin.php';">
					</div>
				</div>
			</div>
			<div class="col-1-2">
				<div class="content">
					<div class="content">
						<div class="col-1-1" style="padding-right: 0;">
								<div style="margin:auto; padding: 30px; text-align: center; background:#dec3c3;">
									LISTE DES PERSONNES INSCRITES
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="grid grid-pad centrer">
			<form action="#" method="post">
				<table class="designTableAdmin" style="width: 70%; margin:10px auto 10px auto;" >
					<tr>
						<th>Date Inscription</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Nombre D'articles</th>
						<th>Supprimer</th>
					</tr>
					<tr>
						<td>12-12-2012</td>
						<td>komlani</td>
						<td>fabien</td>
						<td>1000</td>
						<td><input type="checkbox" name=""></td>
					</tr>
					<tr>
						<td colspan="5" style="text-align: center; padding: 5px;"><input type="submit" value="Supprimer">&nbsp;<input type="reset" value="Annuler"></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="grid grid-pad"></div>
	</div>







	 <script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/scriptAdmin.js"></script>
</body>
</html>