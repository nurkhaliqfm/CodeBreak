<?php include("config.php"); ?>
<?php include("function.php");?>


<a href="?page=transaksi&aksi=tambah-transaksi" class="btn btn-success" style="margin-bottom: 10px;"> <i class ="fa fa-plus"></i> 
Tambah Data</a>

<a href="?page=mahasiswa&aksi=tambah-mahasiswa" class="btn btn-default" style="margin-bottom: 10px;"> <i class ="fa fa-print"></i> 
ExportToExcel</a>

<div class="row">
    <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default" style="border-color: #428bca">
                <div class="panel-heading" style="color: white; background-color: #428bca">
                        Daftar Transaksi
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Judul</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Terlambat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM transaksi WHERE ket='pinjam'";
                                    $query = mysqli_query($db, $sql);

                                    while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                        <td> <?php echo $no++; ?> </td>
                                        <td> <?php echo $data['nama'];?></td>
                                        <td> <?php echo $data['nim'];?></td>
                                        <td> <?php echo $data['judul'];?></td>
                                        <td> <?php echo $data['tgl_pinjam'];?></td>
                                        <td> <?php echo $data['tgl_kembali'];?></td>
                                        <td> 
                                            <?php
                                                $denda = 1000;

                                                $tgl_deadline = $data['tgl_kembali'];
                                                $tgl_kembali = date('Y-m-d');

                                                $lambat = terlambat($tgl_deadline, $tgl_kembali);
                                                $denda1 = $lambat * $denda;

                                                if ($lambat>=1){
                                                    echo "
                                                        <font color='red'>$lambat hari<br>(Rp. $denda1)</font>
                                                    ";
                                                } else {
                                                    echo $lambat ." Hari"; 
                                                }
                                            ?>
                                        </td>
                                        <td> <?php echo $data['ket'];?></td>
                                        <td>
                                            <a href= "?page=transaksi&aksi=kembali-transaksi&id=<?php echo $data['id'];?>
                                            &judul=<?php echo $data['judul'];?>" class="btn btn-info"> Kembali</a>
                                            
                                            <a href= "?page=transaksi&aksi=perpanjang-transaksi&id=<?php echo $data['id']; ?>
                                            &judul=<?php echo $data['judul'];?>&lambat=<?php echo $lambat;?>
                                            &tgl_kembali=<?php echo $data['tgl_kembali'];?>" class="btn btn-danger"> Perpanjang</a>
                                        </td>
                                        </tr>
                                    
                                    <?php } ?>              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
