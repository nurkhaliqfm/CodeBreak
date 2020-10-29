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
                        <label>Penerbit</label>
                        <input class="form-control" name ="penerbit"/>
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
                        <label>ISBN</label>
                        <input class="form-control" name ="isbn"/>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type= "number" name ="jumlah_buku"/>
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
    $penerbit = $_POST ['penerbit'];
    $tahun_terbit = $_POST ['tahun_terbit'];
    $isbn = $_POST ['isbn'];
    $jumlah_buku = $_POST ['jumlah_buku'];
    $lokasi = $_POST ['lokasi'];
    $tgl_input = $_POST ['tgl_input'];

    $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_input) 
    VALUE ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah_buku', '$lokasi', '$tgl_input')";

    $query = mysqli_query($db, $sql);

    if ($query){
        ?>
            <script type="text/javascript">
                alert ("Data Behasil Tersimpan");
                window.location.href="?page=buku";
            </script>
        <?php
    }
}
?>