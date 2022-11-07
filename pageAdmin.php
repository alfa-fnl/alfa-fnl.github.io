<?php 

	include "config/controller.php";
    $function = new lsp();
    session_start();

    $auth = $function->AuthUser($_SESSION['username']);


    $response = $function->sessionCheck();
    if($response == "false"){
        header("Location:index.php");
    }
    if(isset($_GET['logout'])){
        $function->logout();
    }

 ?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/style-home.css">
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<body>
<div class="header-mini"></div>
    <div class="header-logo">
        
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="?page=viewBarangFST">
                                                Fakultas Sains dan Tekonologi</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Ilmu Tarbiyah dan Keguruan</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Adab dan Ilmu Budaya</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=viewBarangFEBI">
                                                Fakultas Ekonomi dan Bisnis Islam</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Ushuluddin dan Pemikiran Islam</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Dakwah dan Komunikasi</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Ilmu Sosial dan Humaniora</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Syari'ah dan Hukum</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Fakultas Pascasarjana</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                UPT Pusat Perpustakaan</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                UPT Pusat Pengembangan Bahasa</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                 UPT Pusat Pengembangan Bisnis</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                UPT Pusat PTIPD</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Kantor Admisi</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Lembaga Penelitian dan Pengabdian Masyarakat</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Lembaga Penjaminan Mutu</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Satuan Pengawasan Internal</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="?page=profile">
                                                Pusat Administrasi Universitas</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="homepage.php?logout" id="forLogout" style="color: red;">
                                                <i class="zmdi zmdi-power"></i>Log out </a>
                                        </div>
                                    </div>
                                </div>
        <img src="gambar/logo-uin.png">
        <div class="text-logo">Inventaris Barang Milik Negara</div>
    </div>

	<div class="page-wrapper">
		

		<div class="page-container2">
			<header class="header-desktop2">

                    <div class="container-fluid">
                
                            </div>
                        </div>
                    </div>

            </header>

			<?php 

                @$page = $_GET['page'];
                switch($page){
                    case 'viewBarangFST':
                        include "admin/FST/viewBarangFST.php";
                        break;
                    case 'viewBarangFEBI':
                        include "admin/FEBI/viewBarangFEBI.php";
                        break;
                    case 'addBarang':
                        include "admin/FST/addBarangFST.php";
                        break;
                    case 'viewBarangEdit':
                        include "admin/FST/viewBarangEditFST.php";
                        break;
                    case 'viewBarangEdit':
                        include "admin/viewBarangEdit.php";
                        break;
                    default:
                        $page = "dashboard";
                        include "admin/FST/viewBarangFST.php";
                        break;
                }

             ?>

		</div>

	</div>


    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>
    <script src="js/main.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script>
      $(document).ready(function(){
          function preview(input){
            if(input.files && input.files[0]){
              var reader = new FileReader();

              reader.onload = function (e){
                $('#pict').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
            }
          }
          $('#gambar').change(function(){
            preview(this);
          })
      });
    </script>
    <script>
      $(document).ready(function(){
          function preview(input){
            if(input.files && input.files[0]){
              var reader = new FileReader();

              reader.onload = function (e){
                $('#pict2').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
            }
          }
          $('#gambar2').change(function(){
            preview(this);
          })
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#forLogout').click(function(e){
          e.preventDefault();
            swal({
            title: "Logout?",
            type: "info",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: true
          }, function(isConfirm) {
            if (isConfirm) {
              window.location.href="?logout";
            }
          });
        });
      })
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
	<?php include "config/alert.php"; ?>
    
</body>
</html>