<?php 
     session_start();
   //  $_SESSION['username'] = $_POST['idConnUser'];
    $dsn = 'mysql:dbname=alphaLocation;host=localhost';
    $user = 'root';
    $pswd = '';
    try {
        $db = new PDO($dsn, $user, $pswd);
      //  echo "Connection realise avec succes!!!!";
    } catch (PDOException $e) {
        die(' Erreur : '.$e -> getMessage());
    }

    $req = $db -> prepare("SELECT * FROM administrateur WHERE loginAdmin=:a AND mdpAdmin=:b");
    $req -> execute(array(
            'a'=>$_POST['identifiantConnexionAdmin'],
            'b'=>$_POST['passwordConnexionAdmin']
        ));
    $compt = $req -> rowCount(); 
    $row = $req -> fetch();

  //  var_dump($_POST['passwordConnexionAdmin']);
//    echo $compt;
   if ($compt == 1) {  
        $_SESSION['pseudoAdmin'] = $_POST['identifiantConnexionAdmin'];
        $_SESSION['idAdmin'] = $row['numAdmin'] ;
        header('location: admin/AccueilAdmin.php');
    } else {
        header('location: connexionAdminAvecErreur.php');
    } 

  $req -> closeCursor();