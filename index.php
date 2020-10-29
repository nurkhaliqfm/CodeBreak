<?php
    session_start();

    if ($_SESSION['admin'] || $_SESSION['user']){
        
    
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan CodeBreak University</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/customes.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!-- <button class="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                </button> -->
                <a class="navbar-brand" href="index.php">Perpustakaan</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
            <a href="#" class="fa fa-user" style="color:black; padding: 0px 0px 0px 10px; font-size: 28px;"></a> 
            <a href="logout.php" class="fa fa-sign-out" style="color:black; padding: 0px 0px 0px 10px; font-size: 28px;"></a> 
            </div>
        </nav>   
        <!-- /. NAV TOP  -->

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    <h4 class="user-name">Admin</h4>
					</li>
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="?page=anggota"><i class="fa fa-users"></i> Data Anggota<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=mahasiswa">Mahasiswa</a>
                            </li>
                            <li>
                                <a href="?page=mahasiswa">Dosen</a>
                            </li>
                            <li>
                                <a href="?page=mahasiswa">Umum</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href=""><i class="fa fa-book"></i> Koleksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=buku">Buku</a>
                            </li>
                            <li>
                                <a href="?page=artikel_jurnal">Artikel Jurnal</a>
                            </li>
                            <li>
                                <a href="?page=skripsi">Skripsi</a>
                            </li>
                        </ul>
                    </li>	
                    <li>
                        <a  href="?page=transaksi"><i class="fa fa-pencil-square"></i> Transaksi</a>
                    </li>	
                    <li>
                        <a  href="?page=admin"><i class="fa fa-lock"></i> Data Admin</a>
                    </li>	
                    <li>
                        <a  href="?page=laporan"><i class="fa fa-file"></i> Laporan</a>
                    </li>	
                    <li>
                        <a  href="?page=backup"><i class="fa fa-check-square"></i> Backup Data</a>
                    </li>	
                    <li>
                        <a  href="?page=tentang"><i class="fa fa-envelope"></i> Tentang</a>
                    </li>	
                </ul>
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];

                            if ($page == "buku"){
                                if ($aksi == ""){
                                    include "page/koleksi/buku/buku.php";
                                } elseif($aksi == "tambah-buku"){
                                    include "page/koleksi/buku/tambah-buku.php";
                                } elseif($aksi == "ubah-buku"){
                                    include "page/koleksi/buku/ubah-buku.php";
                                } elseif($aksi == "delete-buku"){
                                    include "page/koleksi/buku/delete-buku.php";
                                }
                            }

                            if ($page == "artikel_jurnal"){
                                if ($aksi == ""){
                                    include "page/koleksi/artikel_jurnal/artikel_jurnal.php";
                                } elseif($aksi == "tambah-artikel_jurnal"){
                                    include "page/koleksi/artikel_jurnal/tambah-artikel_jurnal.php";
                                } elseif($aksi == "ubah-artikel_jurnal"){
                                    include "page/koleksi/artikel_jurnal/ubah-artikel_jurnal.php";
                                } elseif($aksi == "delete-artikel_jurnal"){
                                    include "page/koleksi/artikel_jurnal/delete-artikel_jurnal.php";
                                }
                            }

                            if ($page == "skripsi"){
                                if ($aksi == ""){
                                    include "page/koleksi/skripsi/skripsi.php";
                                } elseif($aksi == "tambah-skripsi"){
                                    include "page/koleksi/skripsi/tambah-skripsi.php";
                                } elseif($aksi == "ubah-skripsi"){
                                    include "page/koleksi/skripsi/ubah-skripsi.php";
                                } elseif($aksi == "delete-skripsi"){
                                    include "page/koleksi/skripsi/delete-skripsi.php";
                                }
                            }

                            if ($page == "mahasiswa"){
                                if ($aksi == ""){
                                    include "page/anggota/mahasiswa.php";
                                } elseif($aksi == "tambah-mahasiswa"){
                                    include "page/anggota/tambah-mahasiswa.php";
                                } elseif($aksi == "ubah-mahasiswa"){
                                    include "page/anggota/ubah-mahasiswa.php";
                                } elseif($aksi == "delete-mahasiswa"){
                                    include "page/anggota/delete-mahasiswa.php";
                                }
                            }

                            if ($page == "transaksi"){
                                if ($aksi == ""){
                                    include "page/transaksi/transaksi.php";
                                } elseif($aksi == "tambah-transaksi"){
                                    include "page/transaksi/tambah-transaksi.php";
                                } elseif($aksi == "kembali-transaksi"){
                                    include "page/transaksi/kembali-transaksi.php";
                                } elseif($aksi == "perpanjang-transaksi"){
                                    include "page/transaksi/perpanjang-transaksi.php";
                                }
                            }

                        ?>                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script> 
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

<?php

    } else {
        header("location:login.php");
    }

?>