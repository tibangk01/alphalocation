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
             FROM ville
             WHERE statutVille = 1
             ORDER BY libelleVille;
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

  <title>Admin | Créer Ville</title>

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
            <a class="collapse-item" href="#">Les Villes</a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Déconnexion</span>
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
           <div class="row " >

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-8 col-md-6 mb-4 ">
                <div class="row justify-content-md-center" role="alert" style="margin-top: 12%;">
                  <?php if(isset($_SESSION['villeCreated'])) :?>
                     <button class="d-none" id="btnVilleCreated">Bouton</button>
                     <span id="villeCreated" class="alert alert-success d-none"></span>
                  <?php endif; unset($_SESSION['villeCreated']); ?>
                </div>
                <div class="row justify-content-md-center ">
                 <?php if(isset($_SESSION['updateSucces'])) :?>
                     <button class="d-none" id="btnVilleUpdated">Bouton</button>
                     <span id="villeUpdated" class="alert alert-success d-none"></span>
                 <?php endif; unset($_SESSION['updateSucces']); ?>
               </div>
               
                <div class="row justify-content-md-center">
                  <div class="col-xl-6 align-middle">  
                  <form action="traitCreateVille.php" method="POST" id="formIdlibCreationVille">
                    <div class="form-group">
                      <label>Ex : Dapaong, Lomé, Didjolé ......</label>
                       <?php if(isset($_SESSION['libVilleModif'])) :?>
                             <input type="hidden" name="modificationVille" value="1"> 
                             <input type="hidden" name="idModification" value="<?php echo $_SESSION['idModifVille']; unset($_SESSION['idModifVille']);?>"> 
                        <?php else:?>
                             <input type="hidden" name="modificationVille" value="0"> 
            
                        <?php endif;?>
                      <input name="libCreationVille" value="<?php if(isset($_SESSION['libVilleModif'])){ echo $_SESSION['libVilleModif'];}  unset($_SESSION['libVilleModif']);?>" class="form-control" id="idlibCreationVille" autofocus="" >
                     
                    </div> 
                    <div class="form-group text-center">
                        <input  class="btn btn-outline-primary btn-sm" type="submit" value="Valider">
                        <input  class="btn btn-outline-primary btn-sm" type="reset" value="Annuler" id="formIdlibCreationVilleReset"> 
                    </div>
                  </form>
                </div>
                </div>
                 <div class="row justify-content-md-center"  role="alert">
                  <button class="d-none" id="btnMessageErreurIdlibCreationVille">Bouton</button>
                  <span class="alert alert-danger" id="messageErreurIdlibCreationVille"></span>
                </div>
                 <div class="row justify-content-md-center" role="alert">
                  <?php if(isset($_SESSION['duplicatedFound']) && $_SESSION['duplicatedFound'] == true ) :?>
                     <button class="d-none" id="btnDuplicatedFound">Bouton</button>
                     <span id="duplicatedFound" class="alert alert-danger d-none"></span>
                  <?php endif; unset($_SESSION['duplicatedFound']); ?>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
               <div class="row justify-content-md-center ">
                 <?php if(isset($_SESSION['villeDeleted'])) :?>
                     <button class="d-none" id="btnVilleDeleted">Bouton</button>
                     <span id="villeDeleted" class="alert alert-success d-none"></span>
                 <?php endif; unset($_SESSION['villeDeleted']); ?>
               </div>
              <div class="row justify-content-md-center">
                 <div class="card">
              <div class="card-header">
                Liste des villes créées
              </div>
              <div class="card-body">
                 <table class="table table-sm">
                  <tbody>
                    <?php while($row = $req -> fetch()) :?>
                      <tr>        
                        <td><?php echo $row['libelleVille'];?></td>
                        <td><a href="traitCreateVille.php?idUpdateVille=<?php echo$row['numVille'];?>" class="btn btn-info btn-sm" >Modifier</a></td>
                        <td><a class="btn btn-danger btn-sm" href="traitCreateVille.php?idSupprimerVille=<?php echo $row['numVille'];?>">Supprimer</a>
                        </td>
                      </tr>
                     <?php endwhile;?>
                  </tbody>
                </table>
              </div>
            </div>
              </div>
            </div>
         
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
 <?php
  $req -> closeCursor(); 
 ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/scriptAdmin.js"></script>
   <script type="text/javascript">
   $(document).ready(function () {  
     $("#btnVilleUpdated").trigger('click');
     $("#btnVilleCreated").trigger('click');
     $("#btnVilleDeleted").trigger('click');
     $("#btnDuplicatedFound").trigger('click');
   });
  </script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

 

</body>

</html>
