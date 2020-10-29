<?php

    include("config.php");

    $id = $_GET['id'];
    $judul = $_GET['judul'];

    $sql = "UPDATE transaksi SET ket='kembali' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    $sql1 = "UPDATE buku SET jumlah_buku=(jumlah_buku + 1) WHERE judul = '$judul'";
    $query1 = mysqli_query($db, $sql1);

?>

<script type="text/javascript">
    alert("Proses Pengembalian Buku Berhasil")
    window.location.href="?page=transaksi";
</script>