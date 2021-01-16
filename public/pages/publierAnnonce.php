<?php
	session_start();
	$dsn = 'mysql:dbname=alphalocation;host=localhost';
    $user = 'root';
    $pswd = '';
    try {
        $db = new PDO($dsn, $user, $pswd);
      //  echo "Connection realise avec succes!!!!";
    } catch (PDOException $e) {
        die(' Erreur : '.$e -> getMessage());
    }

    // requete pour les villes : 
    $stmt = "SELECT numVille, libelleVille FROM ville where statutVille = 1 order by libelleVille";
    $req = $db -> prepare($stmt);
    $req -> execute();

    $stmt = "SELECT numTypeBat, libelleTypeBat FROM type_batiment where statutTypeBat = 1 order by libelleTypeBat";
    $req2 = $db -> prepare($stmt);
    $req2 -> execute();


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
							  <li><a href="deconnexion.php">Déconnexion</a></li>
							  <li ><a href="monCompte.php">Mon Compte</a></li>
							  <li class="dropdown active">
							    <a href="#" class="dropbtn">Mes Annonces</a>
							    <div class="dropdown-content">
							      <a href="#">Publier Une Annonce</a>
							      <a href="supprimerAnnonce.php">Liste Des Annonces</a>
							    </div>
							  </li>
							  <li ><a  href="accueilApresConnexion.php">Accueil</a></li>
							</ul>	
					</div>
				</div>
			</div>
		</div>

		

		<div class="grid">
			<?php if(isset($_SESSION['annonceCreated'])) :?>
				<div class="col-1-1" style="text-align: center;padding-right:0; margin :10% 0; font-size: 16px;">							
					<div class="success">
								Félécitation ! votre annonce a bien été publiées. <br>
								Cliquez ici <button> <i class="fa fa-home" onclick="location.href='accueilApresConnexion.php'"></i> </button> pour aller à d'accueil du site web.
					</div>
				</div>
			<?php unset($_SESSION['annonceCreated']);?>
		<?php else: ?>
			
			<div class="col-1-1" style="text-align: center;padding-right:0;">							
				<div class="error" style="background: white;">
					<span id="messageErreurMessageDescription"></span>
					<span id="messageErreurLoyer"></span>
					<span id="messageErreurCaution"></span>
					<span id="messageErreurville"></span>
					<span id="messageErreurTypeLogement"></span>
					<span id="messageErreurImages"></span>
					<span id="messageErreurGeneralPublication"></span>
				</div>
			</div>
			<div class="col-1-1" style="padding-right: 0;">
				<fieldset style="width:10%; margin: 50px auto;">
					<legend><i class="fa fa-user fa-2x"></i></legend>
					<form action="traitPublicationAnn.php" method="post" id="formPubAnnonce" enctype="multipart/form-data">
						<table style="width: 100%;">
							<tr>
								<td style="text-align: center;"><textarea style="width: 100%;" name="descAnn" id="idDescAnn" cols="22" rows="10" placeholder="Description sommaire du bâtiment à mettre en location." required="" autofocus=""></textarea></td>
							</tr>
							<tr>
								<td style="text-align: center;"><input style=" width: 100%;" type="text" name="loyerAnn" id="idLoyerAnn" placeholder="Montant du loyer. Ex: 10000" required=""></td>
							</tr>
							<tr>
								<td style="text-align: center;"><input style="width: 100%;" type="text" name="cautionAnn" id="idCautionAnn" placeholder="Montant de la caution. Ex: 10000" required=""></td>
							</tr>
							<tr>
								
								<td style="text-align: center;">
									<select name="villeAnn" id="idVilleAnn" style="width: 100%; margin-bottom: 5px;">
									  <option value="0">=========Choisir une ville=========</option>
									  <?php while($row = $req -> fetch()) :?>
									      <option value="<?php echo $row['numVille'] ?>"><?php echo $row['libelleVille']?></option>
									  <?php endwhile;?>
							       </select></td>
							</tr>
							<tr>
								
								<td style="text-align: center;">
									<select name="typeLogementAnn" id="idTypeLogementAnn" style="width: 100%; margin-bottom: 5px;">
									  <option value="0">=====Choisir un type de logement====</option>
									  <?php while($row2 = $req2 -> fetch()) :?>
									      <option value="<?php echo $row2['numTypeBat']?>"><?php echo $row2['libelleTypeBat']?></option>
									  <?php endwhile;?>
							       </select></td>
							</tr>

							<tr>
								
								<td colspan="2" style="text-align: center;"><input style="margin-bottom: 10px;" type="file" value="Choisir une ou plusieurs images" name="imageAnn[]" id="idImageAnn" required="" multiple=""></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: center;" ><input type="submit" value="Publier">&nbsp;<input type="reset" value="Annuler" id="resetformPubAnnonce"></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</div>
		</div>
	<?php endif?>
		
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