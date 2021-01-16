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
    $stmt = "SELECT *
             FROM personne
             WHERE statutPers = 1
             ORDER BY dateInscPers DESC;
            ";
    $req = $db -> prepare($stmt);
    $req -> execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Supprimer Personnes</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav  bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

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
             <a class="collapse-item" href="#">Les Personnes</a>
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
          <div class="row justify-content-md-center">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col">
              <div class="row justify-content-md-center">
                 <?php if(isset($_SESSION['personneDeleted'])) :?>
                     <button class="d-none" id="btnPersonneDeleted">Bouton</button>
                     <span id="personneDeleted" class="alert alert-success d-none"></span>
                 <?php endif; unset($_SESSION['personneDeleted']); ?>
               </div>
             <div class="row justify-content-center">
                <div class="shadow-sm card mb-4">
                <div class="card-header text-center">
                  Lites de toutes les personnes inscrites
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <th>Date D'inscription</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Pseudo</th>
                      <th>Supprimer</th>
                    </tr>
                <?php while($row = $req -> fetch()) :?>
                    <tr>
                      <td><?php echo $row['dateInscPers']?></td>
                      <td><?php echo $row['nomPers']?></td>
                      <td><?php echo $row['prenomPers']?></td>
                      <td><?php echo $row['pseudoPers']?></td>
                      <td class="text-center"><a href="traitSuppressionPersonne.php?supPers=<?php echo $row['numPers']?>;" class="btn btn-danger btn-sm">Supprimer</a></td>
                    </tr>
                 <?php endwhile;?>
                  </table>
                </div>
              </div>
             
             </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
           

           

          <!-- Content Row -->

       
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
  <script type="text/javascript">
   $(document).ready(function () {  
     $("#btnPersonneDeleted").trigger('click');
   });
 </script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
