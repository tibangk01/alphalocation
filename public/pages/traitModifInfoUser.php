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

   // var_dump($_POST['confirmMdp']); 
   // var_dump($_SESSION['mdpUser']);

    if ($_POST['confirmMdp'] ==  $_SESSION['mdpUser'] ) {   	
    	$req = $db -> prepare("UPDATE personne SET nomPers=:a, prenomPers = :b, sexePers = :c, pseudoPers = :d, telPers =:e WHERE pseudoPers =:f and mdpPers=:g and dateInscPers =:h");
	    $req -> execute(array(
	    		'a'=> $_POST['modifNom'],
	    		'b'=> $_POST['modifPrenom'],
	    		'c'=> $_POST['modifSexeTrue'],
	    		'd'=> $_POST['modifPseudo'],
	    		'e'=> $_POST['modifTel'],
	    		'f'=> $_SESSION['pseudoUser'],
	    		'g'=> $_SESSION['mdpUser'],
	    		'h'=> $_SESSION['infoDate']
	    	));

	   if (($_POST['modifPseudo'] == $_SESSION['pseudoUser'])) {
	   	header('location:successModifInfo.php');
	   } else {
	   	header('location:successModifPseudoInfo.php');
	   }
    }else{
    	header('location:erreurModifInfo.php');
    }
   
    $req -> closeCursor();