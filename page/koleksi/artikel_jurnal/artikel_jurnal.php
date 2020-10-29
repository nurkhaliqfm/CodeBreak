<?php include("config.php"); ?>

<a href="?page=artikel_jurnal&aksi=tambah-artikel_jurnal" class="btn btn-success" style="margin-bottom: 10px;"> <i class ="fa fa-plus"></i> 
Tambah Data</a>

<a href="?page=mahasiswa&aksi=tambah-mahasiswa" class="btn btn-default" style="margin-bottom: 10px;"> <i class ="fa fa-print"></i> 
ExportToExcel</a>

<div class="row">
    <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default" style="border-color: #428bca">
                <div class="panel-heading" style="color: white; background-color: #428bca">
                        Daftar Jurnal Makalah
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
                                    <th>Jurnal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM artikel_jurnal";
                                    $query = mysqli_query($db, $sql);

                                    while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                        <td> <?php echo $no++; ?> </td>
                                        <td> <?php echo $data['judul'];?></td>
                                        <td> <?php echo $data['pengarang'];?></td>
                                        <td> <?php echo $data['penerbit'];?></td>
                                        <td> <?php echo $data['isbn'];?></td>
                                        <td> <?php echo $data['jurnal'];?></td>
                                        <td>
                                            <a href= "?page=artikel_jurnal&aksi=ubah-artikel_jurnal&id=<?php echo $data['id']; ?>" class="btn btn-info"> <i class ="fa fa-pencil-square"></i>
                                            Ubah</a>
                                            <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ??')" 
                                            href= "?page=artikel_jurnal&aksi=delete-artikel_jurnal&id=<?php echo $data['id']; ?>" class="btn btn-danger"> <i class ="fa fa-trash-o"></i>
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

        
