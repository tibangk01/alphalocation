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
   if(isset($_POST['descAnn'])){
   		// <===== insertion des elements dans la table annonce =====>

   
   		$current_date_time = date("Y-m-d H:i:s");
      $req = $db -> prepare("INSERT INTO annonces(descAnn,numPers, numTypeBat, numVille, loyerAnn, cautionAnn, datePubAnn) value(:a,:b,:c,:d,:e,:f,:g)");
      $req -> execute(array('a'=>$_POST['descAnn'],
                            'b'=>$_SESSION['pkUser'] ,
                            'c'=>$_POST['typeLogementAnn'],
                           'd'=>$_POST['villeAnn'],
                           'e'=>$_POST['loyerAnn'],
                           'f'=>$_POST['cautionAnn'],
                           'g'=> $current_date_time ));
   		// <===== insertion des elements dans la table annonce =====>

   	 	// <===== insertion des images dans la table image --> concatenation du numero annonce + numeroPersonne + numero d'ordre dans le tableau d'images + extension

   	 		//recuperation du numéro de l'annonce : 
   	 			$numAnnonces = $db -> query("SELECT * FROM annonces ORDER BY numAnn DESC LIMIT 1 ") -> fetch();
   	 		//recuperation du numéro de l'annonce :

 			//recupération de la longueur du tableau d'mages + insertion du nouveau nom dans la base de données et déplacement du fichier vers le dossier images_annonces
   	 			// =====> recuperation de l'index du tableau : 
   	 				$longueurTabImage = count($_FILES['imageAnn']['name']);
   	 			//	echo $numAnnonces['numAnn'];
 				// =====> insertion des nouveaux noms dans la table image :
   	 				for ($i=0; $i < $longueurTabImage ; $i++) { 
   	 					$chemintemp = $_FILES["imageAnn"]["name"][$i];
   	 					$ext = pathinfo($chemintemp, PATHINFO_EXTENSION);
   	 					$nomImage = $numAnnonces["numAnn"].'_'.$_SESSION["pkUser"].'_'.$i.'.'.$ext;
   	 					$chemin="../images_annonces/".$nomImage;
   	 					$filetmp = $_FILES["imageAnn"]["tmp_name"][$i];
   	 					move_uploaded_file($filetmp,$chemin);

   	 					$req = $db -> prepare('INSERT INTO image(denoImage,numAnn) VALUES(:a, :b)');
					    $req -> execute(array(
					    		'a'=>$nomImage,
					    		'b'=>$numAnnonces['numAnn']
					    	));
     			   	    $req -> closeCursor();
   	 				}

   	 		//recupération de la longueur du tableau d'mages + insertion du nouveau nom dans la base de données et déplacement du fichier vers le dossier images_annonces
   	 				$_SESSION['annonceCreated'] = true;
   	 				header('location:publierAnnonce.php');

   	 				
   	 
   	 	// <===== insertion des images dans la table image --> concatenation du numero annonce + numeroPersonne + index(du tableau des images) + extension
   	 		//	header('location : publierAnnonce.php');
   }

?>