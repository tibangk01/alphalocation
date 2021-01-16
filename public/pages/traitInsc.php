<?php 
	 //connection a la base de donnees : 
    $dsn = 'mysql:dbname=alphalocation;host=localhost';
    $user = 'root';
    $pswd = '';

    try {
        $db = new PDO($dsn, $user, $pswd);
        echo "Connection realise avec succes!!!!";
    } catch (PDOException $e) {
        die(' Erreur : '.$e -> getMessage());
    }
    // preparation et execution de la requete de selection : 
   // echo($_POST['nomPers']);
    $currnet_date_time = date("Y-m-d H:i:s");
    $req = $db -> prepare('INSERT INTO personne(nomPers, prenomPers, sexePers, pseudoPers,mdpPers, telPers, dateInscPers) VALUES(:a, :b, :c, :d, :e, :f, :g)');
    $req -> execute(array(
    		'a'=>$_POST['nomPers'],
    		'b'=>$_POST['prenomPers'],
    		'c'=>$_POST['sexePers'],
    		'd'=>$_POST['pseudoPers'],
    		'e'=>$_POST['mdpPers'],
            'f'=>$_POST['telPers'],
    		'g'=>$currnet_date_time
    	));

   	 $req -> closeCursor();

  header('location: inscriptionAvecTimer.php');