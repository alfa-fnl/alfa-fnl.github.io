<?php 

    include "config/controller.php";
    session_start();
    $lg = new lsp();
    
    if($lg->sessionCheck() == "true"){
        if($_SESSION['level'] == "Admin"){
            header("location:pageAdmin.php");
        }else if($_SESSION['level'] == "Manager"){
            header("location:pageManager.php");
        }else if($_SESSION['level'] == "Kasir"){
            header("location:pageKasir.php");
        }
    }

    if (isset($_POST['btnLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($response = $lg->login($username, $password)) {
            if ($response['response'] == "positive") {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['level'] = $response['level'];
                if ($response['level'] == "Admin") {
                    $response = $lg->redirect("pageAdmin.php");
                }else if($response['level'] == "Manager"){
                    $response = $lg->redirect("pageManager.php");
                }else if ($response['level'] == "Kasir") {
                    $response = $lg->redirect("pageKasir.php");
                }
            }
        }
    }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Halaman Login</title>

    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/style-index.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/sweet-alert.css">

</head>

<body>
    
<div class="header-kecil"></div>
    <div class="header-logo-login">Inventaris Barang Milik Negara</div>

    <div class="box-1">
                
        <div class="">
            <div class="container">
                <br><br>
                    <div class="box-2">
                    <div class="box-3">

                        <div class="login-logo"><a><img src="gambar/logo-login.png"></a></div>

                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                 
                                    <input required class="input-id-password" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                              
                                    <input required class="input-id-password" type="password" name="password" placeholder="Password">
                                </div>
                               
                                <br>
                                <button name="btnLogin" class="tombol-login" type="submit">
                                    <img src="gambar/tombol.png"> Log in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="js/sweetalert.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <?php include "config/alert.php"; ?>
</body>

</html>
<!-- end document-->