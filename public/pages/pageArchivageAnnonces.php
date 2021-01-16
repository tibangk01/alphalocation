<?php
	session_start();

	$dsn = 'mysql:dbname=projetUn;host=localhost';
    $user = 'root';
    $pswd = '';
    try {
        $db = new PDO($dsn, $user, $pswd);
      //  echo "Connection realise avec succes!!!!";
    } catch (PDOException $e) {
        die(' Erreur : '.$e -> getMessage());
    }

    $req = $db -> prepare("SELECT * FROM personne WHERE pseudoPers=:a AND mdpPers=:b");
    $req -> execute(array(
    		'a'=>$_SESSION['pseudoUser'],
    		'b'=>$_SESSION['mdpUser']
    	));
    $info = $req -> fetch();
	$afficheDate = $info["dateInsc"];
	$afficheNom = $info["nomPers"];
	$affichePrenom = $info["prenomPers"];
	if ($info["sexePers"] == "F") {
		$afficheSexe = "Féminin";

	} else {
		$afficheSexe = "Masculin";
	}
	
	$affichePseudo = $info["pseudoPers"];
	$afficheTel = $info["telPers"];
	$modifierMdp =$info["mdpPers"];
	$_SESSION['infoDate'] = $afficheDate;

	 $req -> closeCursor();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="../../fontAwesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="grid grid-pad">
			<div class="col-1-1">
				<div class="content">
					<div class="navbar">
						<ul>
						  <li><a href="accueilApresConnexion.php">Accueil</a></li>
						  <li><a href="monCompte.php">Mon Compte</a></li>
						  <li style="float:right" class="active"><a href="deconnexion.php">Déconnexion</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>	
		<div class="grid grid-pad">
			<div class="col-1-1 centrer" style="padding-right: 0;">
				<div class="content">
					<div style="width: 80%; margin: 30px auto; text-align: center;" class="error">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto animi, tenetur fugiat, consequatur beatae eius laudantium eum unde, quibusdam modi porro. Sint aut quibusdam sunt inventore laborum vel necessitatibus, veniam.
					</div>
				</div>
			</div>
			<div class="col-1-1 centrer">
				<div class="content">
					<form action="#" method="post">
						<table class="designTableAnnonces" style="width: 70%; margin:10px auto 10px auto;">
							<tr>
								<th style="width: 20%;">Date De Pub.</th>
								<th style="width: 65%;">Description Des Annonces</th>
								<th style="width: 15%;">Supprimer</th>	
							</tr>
							<tr>
								<td>12-12-2012</td>
								<td style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut non libero pariatur quis ab officia accusantium similique cumque esse soluta! lorem</td>
								<td><input type="checkbox" name="test" value="tester"></td>
							</tr>
							<tr>
								<td>12-12-2012</td>
								<td style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut non libero pariatur quis ab officia accusantium similique cumque esse soluta! lorem</td>
								<td><input type="checkbox" name="test" value="tester"></td>
							</tr>
							<tr>
								<td colspan="3" style="text-align: center;" ><input type="submit" value="Supprimer">&nbsp;<input type="reset" value="Annuler"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="grid grid-pad">
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