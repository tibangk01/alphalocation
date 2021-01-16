<?php 
		session_start();
   //  $_SESSION['username'] = $_POST['idConnUser'];
    $dsn = 'mysql:dbname=alphalocation;host=localhost';
    $user = 'root';
    $pswd = '';
    try {
        $db = new PDO($dsn, $user, $pswd);
      //  echo "Connection realise avec succes!!!!";
    } catch (PDOException $e) {
        die(' Erreur : '.$e -> getMessage());
    }

	$req = $db -> prepare("SELECT * FROM personne WHERE pseudoPers=:a AND mdpPers=:b and statutPers = :c");
    $req -> execute(array(
    		'a'=>$_POST['idUser'],
    		'b'=>$_POST['mdpUser'],
        'c'=> 1,
    	));
    $item = $req ->fetch();
    $identifiantPers = $item['numPers'];
    echo $identifiantPers;
    $compt = $req -> rowCount();
    echo $compt;
    $_SESSION['username'] = $_POST['idConnUser'];
    if ($compt == 1) { 
        $_SESSION['pseudoUser'] = $_POST['idUser'];
         $_SESSION['mdpUser'] = $_POST['mdpUser'];
          $_SESSION['pkUser'] = $identifiantPers;
	
  	header('location: accueilApresConnexion.php');
	} else {
 	  header('location: connexionAvecErreur.php');
	} 

  $req -> closeCursor();