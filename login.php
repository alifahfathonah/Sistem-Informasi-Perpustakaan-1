<!DOCTYPE html>
<?php 
session_start();
// die($_SESSION['status']);

if(isset($_SESSION['status'])) { ?>

  <script language script="JavaScript">
          document.location='dashborad1.php';
    </script> 

<?php } ?>



<!-- ?> -->
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Perpustakaan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url('login.jpeg')"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form action="login.php" method="POST" = class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" name="submit" id="submit" class='btn btn-primary btn-user btn-block' value="Login" size="5" />
                    <button type="reset" class='btn btn-primary btn-user btn-block'>Reset</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
<?php 
// include "koneksi/koneksi1.php";
// // error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
// $username = mysqli_real_escape_string($koneksi, $_POST['username']);
// $password = mysqli_real_escape_string($koneksi, $_POST['password']);
// $submit = $_POST['submit'];

// if($submit){
//     $sql = "select * from user where username='$username' and password='$password' ";
//     $query = mysqli_query($koneksi, $sql);
//     $row = mysqli_fetch_array($query);
//     if($row['username']!=""){
//       session_start();
                        
//                                 $_SESSION['username']=$row['username'];
//                                 $_SESSION['password']=$row['password'];
//                                 $_SESSION['nama_user']=$row['nama_user'];
//                                 $_SESSION['nip']=$row['nip'];
//                                 $_SESSION['id_user']=$row['id_user'];
//                                 $_SESSION['status']=$row['status'];
//     
include "koneksi/koneksi1.php";
if( isset($_POST['submit'])){
  $username= $_POST['username'];
  $password= $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username' AND password='$password'");

  if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_array($result);

    session_start();

    $_SESSION['username'] = $row['username'];
    $_SESSION['status'] = $row['status'];

    header("location: dashborad1.php");
  }
}
?>
            <!-- <script language script="JavaScript">
            alert('Anda Login Sebagai <?php echo $row['nama_user']; ?>');
            document.location='index.php';
            </script> -->   
    <?php
        
    // }else{
        //gagal login
            ?>
            <!-- <script language script="JavaScript">
            alert('Username atau password "Salah"');
            document.location='login.php';
            </script>  -->  
            <?php
?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
