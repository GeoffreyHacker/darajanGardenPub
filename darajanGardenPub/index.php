<?php 
 require_once "conf/process.php"
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign In - darajanGardenPub</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Darajan Garden Pub</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In </p>
      <?php
        if(isset($_SESSION["error-sucess"])){
          $error = $_SESSION["error-sucess"];
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span ria-hidden="true">&times;</span>  </button>';
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
      <form action="conf/process.php" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="login-btn">Sign In</button>
          </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>

<?php
    unset($_SESSION["error-sucess"]);
    unset($_SESSION["error-danger"]);

?>