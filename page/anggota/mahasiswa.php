<?php include("config.php"); ?>

<a href="?page=mahasiswa&aksi=tambah-mahasiswa" class="btn btn-success" style="margin-bottom: 10px;"> <i class ="fa fa-plus"></i> 
Tambah Data</a>

<a href="?page=mahasiswa&aksi=tambah-mahasiswa" class="btn btn-default" style="margin-bottom: 10px;"> <i class ="fa fa-print"></i> 
ExportToExcel</a>

<div class="row">
    <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default" style="border-color: #428bca">
                <div class="panel-heading" style="color: white; background-color: #428bca">
                        Daftar Anggota
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Fakultas</th>
                                    <th>Prodi</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM anggota";
                                    $query = mysqli_query($db, $sql);

                                    while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                        <td> <?php echo $no++; ?> </td>
                                        <td> <?php echo $data['nama'];?></td>
                                        <td> <?php echo $data['nim'];?></td>
                                        <td> <?php echo $data['fakultas'];?></td>
                                        <td> <?php echo $data['prodi'];?></td>
                                        <td> <?php echo $data['angkatan'];?></td>
                                        <td>
                                            <a href= "?page=mahasiswa&aksi=ubah-mahasiswa&id=<?php echo $data['id']; ?>" class="btn btn-info"> <i class ="fa fa-pencil-square"></i>
                                            Ubah</a>
                                            <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ??')" 
                                            href= "?page=mahasiswa&aksi=delete-mahasiswa&id=<?php echo $data['id']; ?>" class="btn btn-danger"> <i class ="fa fa-trash-o"></i>
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

        
