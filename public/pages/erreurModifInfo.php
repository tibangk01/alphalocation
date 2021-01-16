<?php
	session_start();

	$dsn = 'mysql:dbname=alphaLocation;host=localhost';
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
	$afficheDate = $info["dateInscPers"];
	$afficheNom = $info["nomPers"];
	$affichePrenom = $info["prenomPers"];
	if ($info["sexePers"] == "F") {
		$afficheSexe = "Féminin";

	} else {
		$afficheSexe = "Masculin";
	}
	
	$affichePseudo = $info["pseudoPers"];
	$afficheTel = $info["telPers"];
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
		<div class="grid">
			<div class="col-1-3 logo">
				<div class="content">
					<img src="../images/logo.png">
				</div>
			</div>
			<div class="col-2-3 ">
				<div class="content">
					<div class="menu_nav">
							<ul>
							  <li><a href="deconnexion.php">Déconnexion</a></li>
							  <li class="active"><a href="monCompte.php">Mon compte</a></li>
							  <li class="dropdown">
							    <a href="#" class="dropbtn">Mes Annonces</a>
							    <div class="dropdown-content">
							      <a href="#">Publier Une Annonce</a>
							      <a href="#">Supprimer Une Annonce</a>
							    </div>
							  </li>
							  <li ><a  href="accueilApresConnexion.php">Accueil</a></li>
							</ul>	
					</div>
				</div>
			</div>
		</div>
		<div class="grid">
				<div class="col-1-1" style="text-align: center;padding-right:0;">
					<div class="minc error" id="redirectionApresErreurModification" >
						<span>Erreur mot de passe. Ressayez dans <span id="lblCountErreurModif">&nbsp;&nbsp;</span> secondes</span>
					</div>
				</div>

			<div class="col-1-1" style="padding-right:0;">
				<div class="content">
					<div class="col-1-1" style="padding-right: 0;">
						<div class="modificationInformations">	
							<div class="col-1-1">
								<fieldset style="width:29%; margin:0 auto;">	
									<legend><i class="fa fa-info fa-2x"></i></legend>
									
									<div class="col-1-1">
										<form action="traitModifInfoUser.php" method="post" id="idMimc">
											<table style="width: 97%; margin:10px auto 10px auto;">
												<tr>
													<td>Date d'inscription:</td>
													<td style="text-align: center;"><input type="text" id="dateInsc" value="<?php echo$afficheDate?>" ></td>
												</tr>
												<tr>
													<td>Nom:</td>
													<td style="text-align: center;"><input type="text" name="modifNom" value="<?php echo$afficheNom?>" id="modifNom" required=""></td>
												</tr>
												<tr>
													<td>Prénom: </td>
													<td style="text-align: center;"><input type="text" name="modifPrenom" value="<?php echo$affichePrenom?>" id="modifPrenom" required=""></td>
												</tr>
												<tr id="rowModifSexe">
													<td>Sexe: </td>
													<td style="text-align: center;">
														<select name="modifSexeTrue">
															<option value="M" selected="">Masculin</option>
															<option value="F">Féminin</option>
														</select>
													</td>
												</tr>
												<tr id="rowModifSexeAgain">
													<td>Sexe: </td>
													<td style="text-align: center;">
														<input type="text" name="modifSexe" value="<?php echo$afficheSexe?>" id="modifSexe" required="">
													</td>
												</tr>
												<tr>
													<td>Téléphone: </td>
													<td style="text-align: center;"><input type="tel" name="modifTel" value="<?php echo$afficheTel?>" id="modifTel" required=""></td>
												</tr>
												<tr>
													<td>Pseudonyme:</td>
													<td style="text-align: center;"><input type="text" name="modifPseudo" value="<?php echo$affichePseudo?>" id="modifPseudo" required=""></td>
												</tr>
												<tr id="rowConfirmMdp">
													<td>Mot De Passe:</td>
													<td style="text-align: center;"><input type="password" name="confirmMdp" required="" id="confirmMdp"></td>
												</tr>										
												<tr id="rowInputsHide">
													<td colspan="2" style="text-align: center;"><input type="submit" value="Valider">&nbsp;<input type="reset" value="Retour" id="hideAllWithoutModification"></td>
												</tr>
												<tr id="rowButtonClickHide">
													<td colspan="2" style="text-align: center;"><button id="trigerAffichageInputsModification">Modifier Mes Informations</button></td>
												</tr>
											</table>
										</form>
									</div>
								</fieldset>
							</div>
				</div>
			</div>
			<div class="col-1-1"style="padding-right:0; padding-top: 5%;">
				<div class="content">
					<div class="col-1-3" style="padding-right: 0;">
						<div class="cardInfos">
							<fieldset>
								<legend><i class="fa fa-trash fa-2x"></i></legend>
								<table>
								<tr>
									<td>
										nombre d'annonces actives <br> <span style="font-size: 15px;"><?php echo "666666"; ?> </span>
									</td>
								</tr>
							</table>
							</fieldset>
						</div>
					</div>
					<div class="col-1-3" style="padding-right: 0;">
						<div class="cardInfos">
							<fieldset>
								<legend><i class="fa fa-users fa-2x"></i></legend>
								<table>
								<tr>
									<td>
										Nombre d'annonces supprimées <br> <span style="font-size: 15px;"><?php echo "666666"; ?> </span>
									</td>
								</tr>
							</table>
							</fieldset>
						</div>	
					</div>
					<div class="col-1-3">
						<div class="cardInfos">
							<fieldset>
								<legend><i class="fa fa-comments fa-2x"></i></legend>
								<table>
								<tr>
									<td>
										Nombre d'annonces publiées <br> <span style="font-size: 15px;"><?php echo "666666"; ?> </span>
									</td>
								</tr>
							</table>
							</fieldset>
						</div>	
					</div>
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