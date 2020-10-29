<?php
    include ("config.php");

    $id = $_GET['id'];
    $lambat = $_GET['lambat'];    
    $tgl_kembali = $_GET['tgl_kembali'];    
    $judul = $_GET['judul'];    

    if ($lambat > 7){
        ?>
            <script type="text/javascript">
                alert("Peminjaman Buku Tidak Dapat Diperpanjang, Karena Telah Lebih dari 7 Hari. Mohon Kembaikan Terlebih dahulu kemudian Pinjam Kembali");
                window.location.href="?page=transaksi";  
            </script>
        <?php
    } else {
        $pecah_tgl_kembali = explode("-", $tgl_kembali);
        $next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
        $hari_next = date("d-m-Y", $next_7_hari);

        $sql = "UPDATE transaksi SET tgl_kembali = '$hari_next' WHERE id = '$id'";
        $query = mysqli_query($db, $sql);

        if ($query){
            ?>
                <script type="text/javascript">
                    alert("Perpanjangan Berhasil");
                    window.location.href="?page=transaksi";  
                </script>
            <?php
        } else {
            ?>
                <script type="text/javascript">
                    alert("Perpanjangan Gagal");
                    window.location.href="?page=transaksi";  
                </script>
            <?php

        }
    }

?>