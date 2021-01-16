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

    $req = $db -> prepare("SELECT * FROM annonces WHERE numPers = :a AND statutAnn = :b");
    $req -> execute(array(
    			'a'=>$_SESSION['pkUser'],
    			'b'=> 1
    		)); 
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
							      <a href="publierAnnonce.php">Publier Une Annonce</a>
							      <a href="#">Liste Des Annonces</a>
							    </div>
							  </li>
							  <li ><a  href="accueilApresConnexion.php">Accueil</a></li>
							</ul>	
					</div>
				</div>
			</div>
		</div>
		<div class="grid grid-pad">
			<div class="col-1-1 centrer" style="padding-right: 0;">
				<?php if(isset($_SESSION['annonceDeleted'])) :?>
					<div class="content">
						<div style="width: 80%; margin: 10px auto; text-align: center; color: red;">
							L'annonce a été correctement supprimée.
						</div>
					</div>
					<?php unset($_SESSION['annonceDeleted']);?>
				<?php endif;?>
			</div>
			<div class="col-1-1">
				<div class="content">
					<form action="traitSuppresionAnn.php" method="POST">
						<table class="designTableAnnonces" style="width: 70%; margin:10% auto 10px auto; background: white;">
							<tr>
								<th style="width: 20%;">Date De Pub.</th>
								<th style="width: 65%;">Description Des Annonces</th>
								<th style="width: 15%;">Supprimer</th>	
							</tr>
							<?php while($row = $req -> fetch()) :?>
								<tr>
									<td style="font-size: 13px;"><?php echo $row['datePubAnn']; ?></td>
									<td style="text-align: justify; font-size: 13px;"><?php echo $row['descAnn'];?></td>
									<td>
										<a href="traitSuppresionAnn.php?delete=<?php echo $row['numAnn'];?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
					    	<?php endwhile;?>
							
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
	<?php
		$req -> closeCursor(); 
	?>
	
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/script.js"></script>
</body>
</html>