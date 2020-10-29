<?php
    
    include("config.php");
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM artikel_jurnal WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    $load_artikel_jurnal = mysqli_fetch_assoc($query);
    $data_tahun = $load_artikel_jurnal['tahun_terbit'];
    $data_lokasi = $load_artikel_jurnal['lokasi'];

?>

<div class="panel panel-default" style="border-color: #428bca">
    <div class="panel-heading" style="color: white; background-color: #428bca">
        Ubah Data
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name ="judul" value="<?php echo $load_artikel_jurnal ['judul']; ?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name ="pengarang" value="<?php echo $load_artikel_jurnal ['pengarang']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name ="penerbit" value="<?php echo $load_artikel_jurnal ['penerbit']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Jurnal</label>
                        <input class="form-control" name ="jurnal" value="<?php echo $load_artikel_jurnal ['jumlah_buku']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name ="tahun_terbit" value="<?php echo $load_artikel_jurnal ['tahun_terbit']; ?>">
                            <?php
                                $tahun = date("Y");

                                for ($i = $tahun - 40; $i <= $tahun; $i++){
                                    if ($i == $data_tahun){
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    } else {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" name ="isbn" value="<?php echo $load_artikel_jurnal ['isbn']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name ="lokasi" value="<?php echo $load_artikel_jurnal ['lokasi']; ?>">
                            <option value="rak 1" <?php if ($data_lokasi == "rak 1") { echo "selected";} ?>>Rak 1</option>
                            <option value="rak 2" <?php if ($data_lokasi == "rak 2") { echo "selected";} ?>>Rak 2</option>
                            <option value="rak 3" <?php if ($data_lokasi == "rak 3") { echo "selected";} ?>>Rak 3</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name ="tgl_input" type="date" value="<?php echo $load_artikel_jurnal ['tgl_input']; ?>"/>
                    </div>

                    <input type="submit" name="simpan" value="Ubah" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include("config.php");

if (isset($_POST['simpan'])){
    $judul = $_POST ['judul'];
    $pengarang = $_POST ['pengarang'];
    $penerbit = $_POST ['penerbit'];
    $jurnal = $_POST ['jurnal'];
    $tahun_terbit = $_POST ['tahun_terbit'];
    $isbn = $_POST ['isbn'];
    $lokasi = $_POST ['lokasi'];
    $tgl_input = $_POST ['tgl_input'];

    $sql = "UPDATE artikel_jurnal SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', jurnal = '$jurnal', tahun_terbit = '$tahun_terbit', 
    isbn = '$isbn', lokasi = '$lokasi', tgl_input = '$tgl_input' WHERE id = '$id'";

    $query = mysqli_query($db, $sql);

    if ($query){
        ?>
            <script type="text/javascript">
                alert ("Data Behasil Diubah");
                window.location.href="?page=artikel_jurnal";
            </script>
        <?php
    }
}
?>