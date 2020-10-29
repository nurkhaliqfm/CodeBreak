<?php 
    include("config.php");

    $tgl_pinjam = date('d-m-Y');
    $week = mktime(0,0,0, date("n"), date("j") + 7, date('Y'));
    $tgl_kembali = date("d-m-Y", $week)
?>

<div class="panel panel-default" style="border-color: #428bca">
    <div class="panel-heading" style="color: white; background-color: #428bca">
        Tambah Data
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <select class="form-control" name ="nama">
                            <?php
                                $sql = "SELECT * FROM anggota order by id";
                                $query = mysqli_query($db, $sql);

                                while ($data = mysqli_fetch_assoc($query)){
                                    echo "<option value='$data[nim].$data[nama]'>$data[nim] - $data[nama]</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No Hp</label>
                        <input class="form-control" name ="hp"/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name ="email"/>
                    </div>

                    <div class="form-group">
                        <label>Judul</label>
                        <select class="form-control" name ="judul">
                            <?php
                                $sql = "SELECT * FROM buku order by id";
                                $query = mysqli_query($db, $sql);

                                while ($data = mysqli_fetch_assoc($query)){
                                    echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Peminjaman</label>
                        <input class="form-control" type="text" name ="tgl_pinjam" id="tgl" 
                            value ="<?php echo $tgl_pinjam;?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input class="form-control" type="text" name ="tgl_kembali" id="tgl" 
                            value ="<?php echo $tgl_kembali;?>" readonly/>
                    </div>

                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include("config.php");

if (isset($_POST['simpan'])){
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];

    $judul = $_POST['judul'];
    $pecah_judul = explode(".", $judul);
    $judul = $pecah_judul[1];
    $id = $pecah_judul[0];

    $nama = $_POST['nama'];
    $pecah_nama = explode(".", $nama);
    $nama = $pecah_nama[1];
    $nim = $pecah_nama[0];

    $sql2 = "SELECT * FROM buku WHERE judul = '$judul'";
    $query2 = mysqli_query($db, $sql2);
    
    while ($data = mysqli_fetch_assoc($query2)){
        $sisa = $data['jumlah_buku'];

        if ($sisa == 0){
            ?>
                <script type="text/javascript">
                    alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silahkan Tambah Stock Buku Terlebih Dahulu");
                    window.location.href="?page=transaksi";
                </script>
            <?php
        } else {
            $sql = "INSERT INTO transaksi (judul, nim, nama, hp, email, tgl_pinjam, tgl_kembali, ket) 
            VALUE ('$judul', '$nim', '$nama', '$hp', '$email', '$tgl_pinjam', '$tgl_kembali', 'pinjam')";
            $query = mysqli_query($db, $sql);

            $sql3 = "UPDATE buku SET jumlah_buku = (jumlah_buku - 1) WHERE id = '$id'";
            $query3 = mysqli_query($db, $sql3);

            ?>
            <script type="text/javascript">
                alert ("Data Behasil Tersimpan");
                window.location.href="?page=transaksi";
             </script>
        <?php
        }
    }
}
?>