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
   function skip_accents( $str, $charset='utf-8' ) { // fonction pour enléver les accents d'une chaine en php;

        $str = htmlentities( $str, ENT_NOQUOTES, $charset ); 

        $str = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );

        $str = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $str );

        $str = preg_replace( '#&[^;]+;#', '', $str );
        return $str;
    }
       

    if (isset($_GET['idSupprimerVille'])) {
        $req = $db -> prepare("UPDATE ville SET statutVille = 0 WHERE numVille = :a");
        $req -> execute(array(
                        'a' => $_GET['idSupprimerVille']
                       ));
        $_SESSION['villeDeleted'] = true ;
        header('location: creerVille.php');
    }

	// requete du  nombre total de messages sur le site web : 

	if (isset($_POST['libCreationVille']) && isset($_POST['modificationVille']) && ($_POST['modificationVille'] == 0)) { // création des éléments avec verification des doublons 

        $req = $db -> prepare("SELECT libelleVille FROM ville WHERE statutVille = :a");
        $req -> execute(array('a' => 1));
        $_SESSION['duplicatedFound'] = false;

        while ($row = $req -> fetch()) { 
            $motVerifSansAccents = skip_accents($_POST['libCreationVille']);
            if( trim(strtoupper($motVerifSansAccents)) === $row['libelleVille']){ 
                $_SESSION['duplicatedFound'] = true;
            //    exit();
            }
        } 
        

        if (isset($_SESSION['duplicatedFound']) && $_SESSION['duplicatedFound'] == true) {
            header('location: creerVille.php');
        } else {

             $StringSansAccents =  skip_accents($_POST['libCreationVille'], 'utf-8');
             $wordRefomated = trim(strtoupper($StringSansAccents));
            // print_r('<b style="background : red ;" >'.$wordRefomated.'</b>'); exit();

            $req = $db -> prepare("INSERT INTO ville(libelleVille) VALUES(:a)");
            $req -> execute(array(
                            'a' => $wordRefomated
                           ));
            $_SESSION['villeCreated'] = true ;
            header('location: creerVille.php');
            $req -> closeCursor();
          
        }  
        
    }

    // modification des nom de villes :

    if (isset($_GET['idUpdateVille'])) {
        $req = $db -> prepare("SELECT numVille, libelleVille FROM ville WHERE statutVille = :a AND numVille = :b");
        $req -> execute(array(
                                'a' => 1,
                                'b' => $_GET['idUpdateVille']
                             ));
        $row = $req -> fetch();
        $_SESSION['libVilleModif'] = $row['libelleVille'];
        $_SESSION['idModifVille'] = $row['numVille'];
        header('location:creerVille.php');
    }

    if (isset($_POST['libCreationVille']) && isset($_POST['modificationVille'])  && ($_POST['modificationVille'] == 1) &&isset($_POST['idModification']) ) {  
            $req = $db -> prepare("SELECT numVille,libelleVille FROM ville WHERE statutVille = :a AND numVille = :b");
            $req -> execute(array(
                                    'a' => 1,
                                    'b' => $_POST['idModification']
                                 ));
            $row = $req -> fetch();
            
    // ===> épuration des accents dans le nouveau string et reformatage du string : 
            $motVerifSansAccents2 = strtoupper(trim(skip_accents($_POST['libCreationVille'], 'utf-8' )));
            
            if ($motVerifSansAccents2 !== $row['libelleVille']) {
                $req = $db -> prepare("UPDATE ville SET libelleVille = :a WHERE numVille = :b AND statutVille = :c");
                $req -> execute(array(
                                        'a' => $motVerifSansAccents2,
                                        'b' => $row['numVille'],
                                        'c' => 1
                                     ));
                $_SESSION['updateSucces'] = true ;
                header('location:creerVille.php');
            }else{
                $_SESSION['duplicatedFound'] = true;
                header('location:creerVille.php');
            } 
    }


