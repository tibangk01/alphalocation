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
    $stmt = "SELECT count(distinct personne.numPers) as totalInscrits,
                    count(distinct annonces.numAnn) as totalAnnoncesPubliee
             FROM annonces 
             RIGHT JOIN personne
             ON personne.numPers = annonces.numPers;
            ";
    $req = $db -> prepare($stmt);
    $req -> execute();
    $row = $req -> fetch();

    $stmt = "SELECT  supprimerpersonne.dateSupPers as dat,
                     supprimerpersonne.numAdmin as span,
                     supprimerpersonne.numPers as spsp,
                     count(DISTINCT personne.numPers) as pnp,
                     personne.statutPers as psp,
                     administrateur.numAdmin as ana
              FROM supprimerpersonne
              INNER JOIN personne
              ON supprimerpersonne.numPers = personne.numPers
              INNER JOIN administrateur
              ON supprimerpersonne.numAdmin= administrateur.numAdmin
              WHERE personne.statutPers = :a AND administrateur.numAdmin = :b
            ";
    $req2 = $db -> prepare($stmt);
    $req2 -> execute(array(
                'a'=> 0,
                'b'=> $_SESSION['idAdmin']
            ));
    $row2 = $req2 -> fetch();

    $stmt = "SELECT count(numAnn) as nbmsgsup FROM annonces WHERE statutAnn = 0 ";
    $req = $db -> prepare($stmt);
    $req -> execute();
    $row3 = $req -> fetch();


    $stmt = "SELECT dateInscPers, pseudoPers, telPers FROM personne ORDER BY numPers desc LIMIT 10 OFFSET 0";
    $req4 = $db -> prepare($stmt);
    $req4 -> execute();


    $stmt = "SELECT  annonces.datePubAnn as d,
                     personne.pseudoPers as p,
                     personne.telPers as t 
              FROM annonces
              INNER JOIN personne
              on annonces.numPers = personne.numPers
              ORDER by annonces.numAnn DESC
              LIMIT 10 OFFSET 0
            ";
    $req3 = $db -> prepare($stmt);
    $req3 -> execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Accueil</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="AccueilAdmin.php">
        
        <div class="sidebar-brand-text mx-3">AlphaLocation</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="AccueilAdmin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau De Bord</span></a>
      </li>
      <!-- Divider -->
    

      <!-- Heading -->
    

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-pen"></i>
          <span>Gérer les éléments</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="creerTypeBatiment.php">Les Types De Bâtiments</a>
            <a class="collapse-item" href="creerVille.php">Les Villes</a>
             <a class="collapse-item" href="supprimerPersonne.php">Les Personnes</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-info"></i>
          <span>A Propos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner text-center">
           <span>fab BTS 2019</span>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Charts -->
     

      <!-- Nav Item - Tables -->
    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
         
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!-- Nav Item - Alerts -->
           

            <!-- Nav Item - Messages -->
          
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="deconnexionAdmin.php"  role="button"aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Déconnexion</span>
                <i class="fa fa-sign-out-alt"></i>
              </a>
              <!-- Dropdown - User Information -->
            </li>

          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Personnes Inscrites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $row['totalInscrits']?></div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Personnes Supprimées Par Vous</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $row2['pnp'];
                       ?></div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Messages Publieés</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $row['totalAnnoncesPubliee']?></div>
                    </div>
        
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Messages suprimées</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-right"><?php echo $row3['nbmsgsup']?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Les 10 Derniers Messages Publiées</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date Pub.</th>
                      <th>Contact Annonceur</th>
                      <th>Pseudo Annonceur</th>
                    </tr>
                  </thead>
                  <tfoot>
                   <tr>
                      <th>Date Pub.</th>
                      <th>Contact Annonceur</th>
                      <th>Pseudo Annonceur</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php while($row5 = $req3 -> fetch()) :?>
                    <tr>
                      <td><?php echo $row5['d'];?></td>
                      <td><?php echo $row5['t'];?></td>
                      <td><?php echo $row5['p'];?></td>
                    </tr>
                   <?php endwhile;?>
                  </tbody>
                </table>
              </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Les 10 Dernières Personnes Inscrites</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date Inscription</th>
                      <th>Pseudo</th>
                      <th>Contact</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                   <tr>
                      <th>Date Inscription</th>
                      <th>Pseudo</th>
                      <th>Contact</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php while($row4 = $req4 -> fetch()) :?>
                    <tr>
                      <td><?php echo $row4['dateInscPers'];?></td>
                      <td><?php echo $row4['pseudoPers'];?></td>
                      <td><?php echo $row4['telPers'];?></td>
                    </tr>
                   <?php endwhile;?> 
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/scriptAdmin.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>
