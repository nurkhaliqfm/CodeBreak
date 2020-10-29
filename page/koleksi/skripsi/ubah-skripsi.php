<?php
    
    include("config.php");
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM skripsi WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    $load_skripsi = mysqli_fetch_assoc($query);
    $data_tahun = $load_skripsi['tahun_terbit'];
    $data_lokasi = $load_skripsi['lokasi'];

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name ="judul" value="<?php echo $load_skripsi['judul']; ?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name ="pengarang" value="<?php echo $load_skripsi['pengarang']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Fakultas</label>
                        <input class="form-control" name ="fakultas" value="<?php echo $load_skripsi['fakultas']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Departemen</label>
                        <input class="form-control" name ="departemen" value="<?php echo $load_skripsi['departemen']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name ="tahun_terbit" value="<?php echo $load_skripsi['tahun_terbit']; ?>">
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
                        <label>Lokasi</label>
                        <select class="form-control" name ="lokasi" value="<?php echo $load_skripsi['lokasi']; ?>">
                            <option value="rak 1" <?php if ($data_lokasi == "rak 1") { echo "selected";} ?>>Rak 1</option>
                            <option value="rak 2" <?php if ($data_lokasi == "rak 2") { echo "selected";} ?>>Rak 2</option>
                            <option value="rak 3" <?php if ($data_lokasi == "rak 3") { echo "selected";} ?>>Rak 3</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name ="tgl_input" type="date" value="<?php echo $load_skripsi['tgl_input']; ?>"/>
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
    $fakultas = $_POST ['fakultas'];
    $departemen = $_POST ['departemen'];
    $tahun_terbit = $_POST ['tahun_terbit'];
    $lokasi = $_POST ['lokasi'];
    $tgl_input = $_POST ['tgl_input'];

    $sql = "UPDATE skripsi SET judul = '$judul', pengarang = '$pengarang', fakultas = '$fakultas', departemen = '$departemen', 
    tahun_terbit = '$tahun_terbit', lokasi = '$lokasi', tgl_input = '$tgl_input' WHERE id = '$id'";

    $query = mysqli_query($db, $sql);

    if ($query){
        ?>
            <script type="text/javascript">
                alert ("Data Behasil Diubah");
                window.location.href="?page=skripsi";
            </script>
        <?php
    }
}
?>