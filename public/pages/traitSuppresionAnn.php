<?php 
 session_start();
	$dsn = 'mysql:dbname=alphalocation;host=localhost';
    $user = 'root';
    $pswd = '';
    try {
        $db = new PDO($dsn, $user, $pswd);
    } catch (PDOException $e) {
        die(' Erreur : '.$e -> getMessage());
    }
    $identifiant = $_GET['delete'];
    $req = $db -> prepare("UPDATE annonces SET statutAnn= 0 WHERE numAnn = :a ");
    $req -> execute(array(
    			'a'=> $identifiant
    		));
    
      $req-> closeCursor();

   $_SESSION['annonceDeleted'] = true;	
   header('location: supprimerAnnonce.php');
