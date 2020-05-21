 
<script type="text/javascript">
  function delet() {
    return confirm('are you sure ?');
  
</script>


<?php
$bdd = new PDO('mysql:host=localhost;dbname=magasin','root','');

$req = $bdd->query('SELECT * FROM stock ');

if(isset($_POST['sub'])){
  $id = intval($_GET['id']);
  $getlast = $bdd->prepare('SELECT * FROM stock WHERE id = ?');
  $getlast->execute(array($id));
  $last = $getlast->fetch();

  if($last['quant'] >= $_POST['quant']){

    $move = $bdd->prepare('INSERT INTO inventory (name,type,prixa,prixv,quant,datee) VALUES (?,?,?,?,?,?)');
  $move->execute(array($last['name'],$last['type'],$_POST['price'],$last['prixa'],$_POST['quant'],$last['datee'],));
  if($move){
    //generating the benefice
     $new_solde =intval($last['prixv']) * intval($last['quant']);
  $upd= $bdd->prepare('UPDATE stock SET solde = ? WHERE id = ?');
    $upd->execute(array($new_solde,$id));
    
   
    $new_quant = $last['quant'] - $_POST['quant'];
    
    $update = $bdd->prepare('UPDATE stock SET quant = ? WHERE id = ?');
    $update->execute(array($new_quant,$id));

    

    

    // $earnings = $bdd->prepare('INSERT INTO earnings (prices) VALUES (?)');
    // $earnings->execute(array($benefit));



    header("Location:tables.php");

  }

  }else $msg = '<span style="color:red">Desole votre stock est insuffisant vender au moins  '. $last['quant'] .'</span>';



  
  
}

if (isset($_GET['delete'])) {
  $del=$_GET['delete'];
  $requi= $bdd->prepare('DELETE FROM stock WHERE id=?');
  $requi->execute(array($del));
  header("location:tables.php");
}







 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>shop</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">shop</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>tableau de bord</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     

     
      <li class="nav-item">
        <a class="nav-link" href="confirm.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Ajouter</span></a>
      </li>
     
      
      <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>sortie</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>entrer</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>stock</span></a>
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
          <!--  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
         
              <!-- Dropdown - Messages -->
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <!-- <h1 class="h3 mb-2 text-gray-800">Tables of articals</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">la table des articles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php if(isset($_GET['id']) AND !empty($_GET['id'])){ ?>

                  <h4 style="text-align: center;"><?php if (isset($msg)) {echo $msg;} ?></h4> 

                  <form method="POST">
                    <label>Quantite</label>
                    <input type="number" name="quant" class="form-control"><br>
                    <label>prix</label>
                    <input type="number" name="price" class="form-control"><br>
                    <input type="submit" name="sub" class="btn btn-primary" value="Entrer"> 

                    <a href="tables.php">Annuler</a>
                    
                  </form>


                <?php }else{ ?>



                   
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>non</th>
                      <th>type</th>
                      
                      <th>dernier prix</th>
                      <th>piece</th>
                      
                      <th>vendre</th>
                     
                      
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>type </th>

                      <th>dernier prix</th>
                      <th>piece</th>
                      
                      <th>vendre</th>
                      
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  
    
                  <?php while($n=$req->fetch()) { 
                    if($n['quant'] == 0){
                      $out = 'true';
                    }

                    ?>
                    <tr>
                      <td><?= $n['name']?></td>
                      <td><?= $n['type']?></td>
                      <td><?= $n['prixv']?></td>
                      <td><?php 
                      if($n['quant'] == 0){ 
                        echo '<span style="color:red">repture de stock</span>';
                        

                      }else{
                        echo $n['quant'];
                        
                        
                      }

                       ?></td>
                     
                      <td><?php 
                      if(isset($out) AND !empty($out)){ ?>
                        <a href="?id=<?= $n['id'] ?>"><button class="btn btn-warning" >vendre</button></a>
                        <?php
                      }else{ ?>
                        <a href="?id=<?= $n['id'] ?>"><button class="btn btn-warning">vendre</button></a>
                        <?php
                      }

                       ?></td>
                     
                      

                      
                      
                      
                    </tr>
                    <?php } ?>
                   
                  </tbody>
                </table>

              <?php } ?>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; styve mutabazi</span>
          </div>
        </div>
      </footer>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
