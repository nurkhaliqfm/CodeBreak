<?php
    
    include("config.php");
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM anggota WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    $load_data = mysqli_fetch_assoc($query);
    $data_angkatan = $load_data['angkatan'];
    $data_jk = $load_data['jk'];

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
                        <label>Nama</label>
                        <input class="form-control" name ="nama" value="<?php echo $load_data['nama']; ?>" readonly/>
                    </div>
                    
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name ="nim" value="<?php echo $load_data['nim']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Fakultas</label>
                        <input class="form-control" name ="fakultas" value="<?php echo $load_data['fakultas']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Prodi</label>
                        <input class="form-control" name ="prodi" value="<?php echo $load_data['prodi']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Angkatan</label>
                        <select class="form-control" name ="angkatan" value="<?php echo $load_data['angkatan']; ?>">
                            <?php
                                $tahun = date("Y");

                                for ($i = $tahun - 7; $i <= $tahun; $i++){
                                    if ($i == $data_angkatan){
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    } else {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label><br/>
                        <label class="radio-inline">
                            <input type="radio" value="l" name = "jk" <?php if ($data_jk == "l") { echo "checked";} ?>>Laki-Laki</option>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="p" name = "jk" <?php if ($data_jk == "p") { echo "checked";} ?>>Perempuan</option>
                        </label>
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
    $nama = $_POST ['nama'];
    $nim = $_POST ['nim'];
    $fakultas = $_POST ['fakultas'];
    $prodi = $_POST ['prodi'];
    $angkatan = $_POST ['angkatan'];
    $jk = $_POST ['jk'];

    $sql = "UPDATE anggota SET nama = '$nama', nim = '$nim', fakultas = '$fakultas', prodi = '$prodi', jk = '$jk', 
    angkatan = '$angkatan' WHERE id = '$id'";

    $query = mysqli_query($db, $sql);

    if ($query){
        ?>
            <script type="text/javascript">
                alert ("Data Behasil Diubah");
                window.location.href="?page=mahasiswa";
            </script>
        <?php
    }
}
?>