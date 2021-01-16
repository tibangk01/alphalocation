<?php
	session_start(); 
	$dsn = 'mysql:dbname=alphalocation;host=localhost';
    $user = 'root';
    $pswd = '';
    try {
        $db = new PDO($dsn, $user, $pswd);
     //   echo "Connection realise avec succes!!!!"; exit();
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

    // erégistrement d'un type de batiment : 

    if (isset($_POST['libCreationTypeBat']) && isset($_POST['modificationTB']) && ($_POST['modificationTB'] == 0)) { 

         $req = $db -> prepare("SELECT libelleTypeBat FROM type_batiment WHERE statutTypeBat = :a");
         $req -> execute(array('a' => 1));

         $_SESSION['duplicatedTBFound'] = false;

         while ($row = $req -> fetch()) { 
            $motVerifSansAccents = skip_accents($_POST['libCreationTypeBat']);
            if( trim(strtoupper($motVerifSansAccents)) === $row['libelleTypeBat']){ 
                $_SESSION['duplicatedTBFound'] = true;
            }
        }

        if (isset($_SESSION['duplicatedTBFound']) && $_SESSION['duplicatedTBFound'] == true) {
            header('location: creerTypeBatiment.php');
        } else {
            $StringSansAccents =  skip_accents($_POST['libCreationTypeBat'], 'utf-8');
            $wordRefomated = trim(strtoupper($StringSansAccents));
            // print_r('<b style="background : red ;" >'.$wordRefomated.'</b>'); exit();

            $req = $db -> prepare("INSERT INTO type_batiment (libelleTypeBat) VALUES(:a)");
            $req -> execute(array(
                            'a' => $wordRefomated
                           ));

            $_SESSION['TBCreated'] = true ;
            header('location: creerTypeBatiment.php');
            $req -> closeCursor();     
        }  
    }


    if (isset($_POST['libCreationTypeBat']) && isset($_POST['modificationTB'])  && ($_POST['modificationTB'] == 1) &&($_POST['idModification']) ) {  
            $req = $db -> prepare("SELECT numTypeBat,libelleTypeBat FROM type_batiment WHERE statutTypeBat = :a AND numTypeBat = :b");
            $req -> execute(array(
                                    'a' => 1,
                                    'b' => $_POST['idModification']
                                 ));
            $row = $req -> fetch();
            
    // ===> épuration des accents dans le nouveau string et reformatage du string : 
            $motVerifSansAccents2 = strtoupper(trim(skip_accents($_POST['libCreationTypeBat'], 'utf-8' )));
            
            if ($motVerifSansAccents2 !== $row['libelleTypeBat']) {
                $req = $db -> prepare("UPDATE type_batiment SET libelleTypeBat = :a WHERE numTypeBat = :b AND statutTypeBat = :c");
                $req -> execute(array(
                                        'a' => $motVerifSansAccents2,
                                        'b' => $row['numTypeBat'],
                                        'c' => 1
                                     ));
                $_SESSION['updateTBSucces'] = true ;
                header('location:creerTypeBatiment.php');
            }else{
                $_SESSION['duplicatedTBFound'] = true;
                header('location:creerTypeBatiment.php');   
            }
    }


    if (isset($_GET['idSupprimerTB'])) {
        $req = $db -> prepare("UPDATE type_batiment SET statutTypeBat = 0 WHERE numTypeBat = :a");
        $req -> execute(array(
                        'a' => $_GET['idSupprimerTB']
                       ));
        $_SESSION['TBDeleted'] = true ;
        header('location: creerTypeBatiment.php');
    }


    if (isset($_GET['idUpdateTB'])) {
        $req = $db -> prepare("SELECT numTypeBat, libelleTypeBat FROM type_batiment WHERE statutTypeBat = :a AND numTypeBat = :b");
        $req -> execute(array(
                                'a' => 1,
                                'b' => $_GET['idUpdateTB']
                             ));
        $row = $req -> fetch();
        $_SESSION['libTBModif'] = $row['libelleTypeBat'];
        $_SESSION['idModifTB'] = $row['numTypeBat'];
        header('location:creerTypeBatiment.php');
    }