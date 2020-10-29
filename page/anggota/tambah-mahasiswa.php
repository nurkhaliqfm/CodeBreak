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
                        <input class="form-control" name ="nama"/>
                    </div>
                    
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name ="nim"/>
                    </div>

                    <div class="form-group">
                        <label>Fakultas</label>
                        <input class="form-control" name ="fakultas"/>
                    </div>

                    <div class="form-group">
                        <label>Prodi</label>
                        <input class="form-control" name ="prodi"/>
                    </div>

                    <div class="form-group">
                        <label>Angkatan</label>
                        <select class="form-control" name ="angkatan">
                            <?php
                                $tahun = date("Y");

                                for ($i = $tahun - 7; $i <= $tahun; $i++){
                                    echo '
                                        <option value="'.$i.'">'.$i.'</option>

                                    ';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label><br/>
                        <label class="radio-inline">
                            <input type="radio" value="l" name="jk">Laki-Laki</option>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="p" name="jk">Perempuan</option>
                        </label>
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
    $nama = $_POST ['nama'];
    $nim = $_POST ['nim'];
    $fakultas = $_POST ['fakultas'];
    $prodi = $_POST ['prodi'];
    $angkatan = $_POST ['angkatan'];
    $jk = $_POST ['jk'];

    $sql = "INSERT INTO anggota (nama, nim, fakultas, prodi, angkatan, jk) 
    VALUE ('$nama', '$nim', '$fakultas', '$prodi', '$angkatan', '$jk')";

    $query = mysqli_query($db, $sql);

    if ($query){
        ?>
            <script type="text/javascript">
                alert ("Data Behasil Tersimpan");
                window.location.href="?page=mahasiswa";
            </script>
        <?php
    }
}
?>