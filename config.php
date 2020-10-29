<?php

$server = "localhost";
$user = "root";
$password = "caseclosedaptx4869";
$nama_database = "db_library";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
