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


    if (isset($_GET['supPers'])) {
    	
    	$req = $db -> prepare("UPDATE personne SET statutPers = 0 WHERE numPers = :a");
        $req -> execute(array(
                        'a' => $_GET['supPers']
                       ));
        $currnet_date_time = date("Y-m-d H:i:s");
        $req = $db -> prepare("INSERT INTO supprimerPersonne(dateSupPers, numPers, numAdmin) values(:a, :b, :c)");
        $req -> execute(array(
                        'a' => $currnet_date_time,
                        'b' => $_GET['supPers'],
                        'c' => $_SESSION['idAdmin']
                       ));
        $_SESSION['personneDeleted'] = true ;
        header('location: supprimerPersonne.php');
    }