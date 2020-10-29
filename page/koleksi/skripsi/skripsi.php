<?php include("config.php"); ?>

<a href="?page=skripsi&aksi=tambah-skripsi" class="btn btn-success" style="margin-bottom: 10px;"> <i class ="fa fa-plus"></i> 
Tambah Data</a>

<a href="?page=mahasiswa&aksi=tambah-mahasiswa" class="btn btn-default" style="margin-bottom: 10px;"> <i class ="fa fa-print"></i> 
ExportToExcel</a>

<div class="row">
    <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default" style="border-color: #428bca">
                <div class="panel-heading" style="color: white; background-color: #428bca">
                        Daftar Skripsi
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Departemen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM skripsi";
                                    $query = mysqli_query($db, $sql);

                                    while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                        <td> <?php echo $no++; ?> </td>
                                        <td> <?php echo $data['judul'];?></td>
                                        <td> <?php echo $data['pengarang'];?></td>
                                        <td> <?php echo $data['departemen'];?></td>
                                        <td>
                                            <a href= "?page=skripsi&aksi=ubah-skripsi&id=<?php echo $data['id']; ?>" class="btn btn-info"> <i class ="fa fa-pencil-square"></i>
                                            Ubah</a>
                                            <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ??')" 
                                            href= "?page=skripsi&aksi=delete-skripsi&id=<?php echo $data['id']; ?>" class="btn btn-danger"> <i class ="fa fa-trash-o"></i>
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

        
