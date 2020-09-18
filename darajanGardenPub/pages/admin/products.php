<?php
//session_start();
require_once("../../conf/process.php");
if(isset($_SESSION['DOB']) && isset($_SESSION['email'])){
  require_once "../../App/Secure.php";
    $dob = secureinput($_SESSION['DOB']);
    $useremail = secureinput($_SESSION['email']);

           $get = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$useremail'");
           $get2 = mysqli_fetch_assoc($get);
}else{
      header ("location:../../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin - Products</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-6">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <a href="../../conf/logout.php">
        <button type="button" class="btn btn-default btn-sm ml-3 mr-3">
          <span class="glyphicon glyphicon-log-out" ></span> Log out
        </button>
      </a>
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
  <aside class="main-sidebar control-sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="pub Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Darajan Gardend Pub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Abama Abrahma</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fa fa-home" aria-hidden="true"></i>
              <p> Home <!-- <span class="right badge badge-danger">New</span> --> </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fa fa-beer" aria-hidden="true"></i>
                  <p>Pub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fa fa-tree" aria-hidden="true"></i>
                  <p>Timba</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                Products
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Message prompt-->
    <?php
          if(isset($_SESSION["error-sucess"])){
            $error = $_SESSION["error-sucess"];
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>  </button>';
            echo "<span> $error </span>";
            echo '</div>';
          }
          if(isset($_SESSION["error-warning"])){
            $error = $_SESSION["error-warning"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>';
            echo "<span> $error </span>";
            echo '</div>';
          }
          if(isset($_SESSION["error-danger"])){
            $error = $_SESSION["error-danger"];
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>';
            echo "<span> $error </span>";
            echo '</div>';
          }            
    ?>
    <!-- / Message Prompt-->  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">

            <!-- BUTTON ADD PRODUCT-->
            <button type="button" class="btn btn-outline-primary waves-effect waves" data-toggle="modal" data-target="#addProduct">
              <i class="fa fa-plus" aria-hidden="true"></i>
                New product
            </button> </br></br>
            <!-- DATA MODAL add product-->
            <div class="modal fade" id="addProduct">
              <div class="modal-dialog modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title justify-content-center">New Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../../conf/process.php" method="POST" class="form form-horizontal">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-12">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="fname-icon" class="form-control" name="pname" placeholder="Enter Product Name:" required>
                              <div class="form-control-position">
                                <i class="feather icon-user"></i>
                              </div>
                            </div>
                          </div> </br></br></br>
                          <div class="col-12">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="fname-icon" class="form-control" name="pprice" placeholder="Enter Product Price" required>
                              <div class="form-control-position">
                                <i class="feather icon-user"></i>
                              </div>
                            </div>
                          </div> </br></br></br>             
                          <div class="col-12">
                            <div class="position-relative has-icon-left">
                              <select class="form-control" name="pcategory" required>
                                <option value="" disabled selected hidden>Choose Product Category</option>
                                <option value="pub">Pub Product</option>
                                <option value="timba">Timba product</option>
                              </select>
                              <div class="form-control-position">
                                <i class="feather icon-map-pin"></i>
                              </div>
                            </div>
                          </div> </br></br></br>
                          <div class="col-md-8 offset-md-4">
                            <button type="submit" name="registerProduct" class="btn btn-primary mr-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div> <!--.modal-body-->
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- DATA MODAL EDIT product-->
            <div class="modal fade" id="editProduct">
              <div class="modal-dialog modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title justify-content-center">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../../conf/process.php" method="POST" class="form form-horizontal">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-12">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="product-name" class="form-control" name="" placeholder="Enter Product Name:" required>
                              <div class="form-control-position">
                                <i class="feather icon-user"></i>
                              </div>
                            </div>
                          </div> </br></br></br>
                          <div class="col-12">
                            <div class="position-relative has-icon-left">
                              <input type="text" id="product-price" class="form-control" name="" placeholder="Enter Product Price" required>
                              <div class="form-control-position">
                                <i class="feather icon-user"></i>
                              </div>
                            </div>
                          </div> </br></br></br>             
                          <div class="col-12">
                            <div class="position-relative has-icon-left">
                              <select class="form-control" id="product-category" name="" required>
                                <option value=""  disabled selected hidden>Choose Product Category</option>
                                <option value="pub">Pub Product</option>
                                <option value="timba">Timba product</option>
                              </select>
                              <div class="form-control-position">
                                <i class="feather icon-map-pin"></i>
                              </div>
                            </div>
                          </div> </br></br></br>
                          <div class="col-md-8 offset-md-4">
                            <button type="submit" id="update-product" class="btn btn-primary mr-1 mb-1">update</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div> <!--.modal-body-->
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



            <!-- List of products presents-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of All Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table-products" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Product price</th>
                    <th>product Category</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <div id="products">
                      <?php
                      require_once "../../App/Secure.php";
                        $sql = "SELECT * FROM `products`;";
                        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)){
                          $product_name = secureinput($row['product_name']);
                          $product_price = secureinput($row['product_price']);
                          $product_category = secureinput($row['product_category']);
                          $date_added = secureinput($row['date_added']);
                          ?>
                            <tr id="<?php echo $row['product_id']; ?>">
                              <td data-target = "product-name"><?php echo $product_name ?></td>
                              <td data-target = "product-price"><?php echo $product_price ?></td>
                              <td data-target = "product-category"><?php echo $product_category ?></td>
                              <td><?php echo $date_added?></td>
                              <td>
                                <a  class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-role="editpoduct-modal" data-id="<?php echo $row['product_id']; ?>">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="../../conf/process.php?id_del_product=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                          <?php
                          $i++;
                        }
                      ?>
                    </div>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Product Name</th>
                    <th>Product price</th>
                    <th>product Category</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020  <a href="http://adminlte.io">abdulmahamudu997@gmail.com</a>.</strong>
  
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../plugins/raphael/raphael.min.js"></script>
<script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../dist/js/pages/dashboard2.js"></script>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<!-- Page Scripts-->
<script>
  $(function () {
    $("#table-products").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    
  });

  //editing modal scripts
  $(document).ready(function(){

    $(document).on('click','a[data-role=editpoduct-modal]', function(){

      //var product_id = $(this).data('id');
      //$('#editProduct').modal('show');
      // $.ajax({
      //   url:"../../conf/process.php",
      //   type: "POST",
      //   data:{product_id:product_id},
      //   dataType:"json",
      //   success:function(data){
      //     $('#product_name').val(data.product_name);
      //     $('#product-price').val(data.product_price);
      //     $('#product-category').val(data.product_category);
      //     $('#editProduct').modal('show');
      //   }
      // });

      //$('#editProduct').modal('show');
      var product_name = $('#'+id).children('td[data-target=product-name]').text();
      var product_name = $('#'+id).children('td[data-target=product-price]').text();
      var product_name = $('#'+id).children('td[data-target=product-category]').text();
      $('#product_name').val(product_name);
      $('#product_price').val(product_price);
      $('#product_category').val(product_category);
      $('#editProduct').modal('show');




    });



  });



</script>

</body>
</html>



<?php
    unset($_SESSION["error-sucess"]);
    unset($_SESSION["error-danger"]);
    unset($_SESSION["error-warning"]);



?>