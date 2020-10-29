<div class="panel panel-default" style="border-color: #428bca">
    <div class="panel-heading" style="color: white; background-color: #428bca">
        Tambah Data
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name ="judul"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name ="pengarang"/>
                    </div>

                    <div class="form-group">
                        <label>Fakultas</label>
                        <input class="form-control" name ="fakultas"/>
                    </div>

                    <div class="form-group">
                        <label>Departemen</label>
                        <input class="form-control" name ="departemen"/>
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name ="tahun_terbit">
                            <?php
                                $tahun = date("Y");

                                for ($i = $tahun - 40; $i <= $tahun; $i++){
                                    echo '
                                        <option value="'.$i.'">'.$i.'</option>

                                    ';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name ="lokasi">
                            <option value="rak 1">Rak 1</option>
                            <option value="rak 2">Rak 2</option>
                            <option value="rak 3">Rak 3</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name ="tgl_input" type="date"/>
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
    $judul = $_POST ['judul'];
    $pengarang = $_POST ['pengarang'];
    $fakultas = $_POST ['fakultas'];
    $departemen = $_POST ['departemen'];
    $tahun_terbit = $_POST ['tahun_terbit'];
    $lokasi = $_POST ['lokasi'];
    $tgl_input = $_POST ['tgl_input'];

    $sql = "INSERT INTO skripsi (judul, pengarang, departemen, fakultas, tahun_terbit, lokasi, tgl_input) 
    VALUE ('$judul', '$pengarang', '$fakultas', '$departemen', '$tahun_terbit', '$lokasi', '$tgl_input')";

    $query = mysqli_query($db, $sql);

    if ($query){
        ?>
            <script type="text/javascript">
                alert ("Data Behasil Tersimpan");
                window.location.href="?page=skripsi";
            </script>
        <?php
    }
}
?>