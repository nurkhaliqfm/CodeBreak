<?php include("config.php"); ?>

<a href="?page=buku&aksi=tambah-buku" class="btn btn-success" style="margin-bottom: 10px;"> <i class ="fa fa-plus"></i> 
Tambah Data</a>

<a href="?page=mahasiswa&aksi=tambah-mahasiswa" class="btn btn-default" style="margin-bottom: 10px;"> <i class ="fa fa-print"></i> 
ExportToExcel</a>

<div class="row">
    <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default" style="border-color: #428bca">
                <div class="panel-heading" style="color: white; background-color: #428bca">
                        Daftar Buku
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>ISBN</th>
                                    <th>Jumlah Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM buku";
                                    $query = mysqli_query($db, $sql);

                                    while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                        <td> <?php echo $no++; ?> </td>
                                        <td> <?php echo $data['judul'];?></td>
                                        <td> <?php echo $data['pengarang'];?></td>
                                        <td> <?php echo $data['penerbit'];?></td>
                                        <td> <?php echo $data['isbn'];?></td>
                                        <td> <?php echo $data['jumlah_buku'];?></td>
                                        <td>
                                            <a href= "?page=buku&aksi=ubah-buku&id=<?php echo $data['id']; ?>" class="btn btn-info"> <i class ="fa fa-pencil-square"></i>
                                            Ubah</a>
                                            <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ??')" 
                                            href= "?page=buku&aksi=delete-buku&id=<?php echo $data['id']; ?>" class="btn btn-danger"> <i class ="fa fa-trash-o"></i>
                                            Hapus</a>
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

        
