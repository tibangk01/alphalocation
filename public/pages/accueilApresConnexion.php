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

	// requete du  nombre total de messages sur le site web : 
	$req = $db -> prepare("SELECT * FROM annonces WHERE statutAnn = :a");
    $req -> execute(array(
    		'a'=> 1
    	));
    $compt = $req -> rowCount();

    // requete de selection des éléments à afficher dans le tableau des informations de l' annonce : 
    $query =   "SELECT annonces.numAnn,
    				   annonces.datePubAnn,
					   annonces.loyerAnn,
				       annonces.cautionAnn,
				       annonces.descAnn,
				       type_batiment.libelleTypeBat,
				       ville.libelleVille,
				       personne.telPers
				     
				FROM annonces
				INNER JOIN type_batiment
				ON annonces.numTypeBat = type_batiment.numTypeBat
				INNER JOIN ville
				ON annonces.numVille = ville.numVille
				INNER JOIN personne
				ON annonces.numPers = personne.numPers
				WHERE statutAnn = 1
				ORDER BY annonces.datePubAnn DESC 
				LIMIT 0,20;
    		 ";
    $req = $db -> prepare($query);
    $req -> execute();

    // requete de selection des images de chaque annonces : 

    // requete de selection des éléments à afficher dans le tableau des informations de l' annonce : 
   

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Accueil</title>
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="../../fontAwesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/lightbox.css">
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
							  <li><a href="monCompte.php">Mon compte</a></li>
							  <li class="dropdown">
							    <a href="#" class="dropbtn">Mes Annonces</a>
							    <div class="dropdown-content">
							      <a href="publierAnnonce.php">Publier Une Annonce</a>
							      <a href="supprimerAnnonce.php">Supprimer Une Annonce</a>
							    </div>
							  </li>
							  <li class="active"><a  href="#">Accueil</a></li>
							</ul>	
					</div>
				</div>
			</div>
		</div>
		<div class="grid">
			<div class="col-1-1">
				<div class="content message-pad">
					<div class="messageNbAnnonces ">
						<p><?php
							echo 'Jusqu\'à '.$compt.' annonces de location';
						?></p>
						<h2>
							<?php
							echo "Et vous, que cherchez-vous?";
							?>
						</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="grid fondGrid">
			<div class="col-1-1" style="padding-right: 0;">
					<div class="designTableAnnonces">
						<table>
						<tr>
							<th style="width:70px;">Date Pub.</th>
							<th style="width:120px;">Type Location</th>
							<th style="width:100px;">Ville</th>
							<th style="width:90px;">Loyer</th>
							<th style="width:90px;">Caution</th>
							<th style="width:300px;">Desscription Location</th>
							<th style="width:45px;">Images</th>
							<th style="width:120px;">Contact</th>
						</tr>
						
						<?php while($row = $req -> fetch()) :?>
							<tr>
								<td><?php echo$row['datePubAnn'];?></td>
								<td><?php echo$row['libelleTypeBat']?></td>
								<td><?php echo$row['libelleVille'];?></td>
								<td><?php echo $row['loyerAnn'].' fr';;?></td>
								<td><?php echo $row['cautionAnn'].' fr';;?></td>
								<td style="text-align: left; padding:0 5px"><?php echo $row['descAnn']?></td>
								<td>
									<?php
										$queryDeux = " SELECT annonces.numAnn,
															  image.denoImage
													   FROM annonces
													   INNER JOIN image
													   ON annonces.numAnn = image.numAnn
													   WHERE annonces.statutAnn = :a AND  annonces.numAnn = :b
													 ";
										 $reqDeux = $db -> prepare($queryDeux);
									     $reqDeux -> execute(array(
									    		'a'=> 1,
									    		'b'=> $row['numAnn']
									    	)); 
									     $i = 0 ;
									 ?>
									 <?php while($nomImage = $reqDeux -> fetch()) :?>
										<?php if( $i == 0 ):?>
											<a href="../images_annonces/<?php echo $nomImage['denoImage']?>" data-lightbox="<?php echo "annonce".$row['numAnn'];?>" style="display: block;"><i class="fa fa-photo" style="font-size: 20px"></i></a>
										<?php else :?>
											<a href="../images_annonces/<?php echo $nomImage['denoImage']?>" data-lightbox="<?php echo "annonce".$row['numAnn'];?>" style="display: none;"><i class="fa fa-photo" style="font-size: 20px"></i></a>	
										<?php endif;?>
										<?php $i+=1;?>
									 <?php endwhile; unset($i);?>


								</td>

								<td><?php echo$row['telPers'];?></td>
							</tr>
						<?php endwhile;?>
					</table>
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
	<?php
		$req -> closeCursor();
	?>
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/script.js"></script>
	<script type="text/javascript" src="../../js/lightbox.js"></script>
	<script type="text/javascript">
		lightbox.option({
			'imageFadeDuration':200,
			'resizeDuration':100,
			'maxWidth':700,
			'maxHeight':400
		});
	</script>
	
</body>
</html>