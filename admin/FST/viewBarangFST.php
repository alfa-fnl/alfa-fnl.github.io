<?php 
$qb = new lsp();
$dataB = $qb->select("fst");
if ($_SESSION['level'] != "Admin") {
    header("location:../index.php");
}
if (isset($_GET['delete'])) {
    $response = $qb->delete("fst","kd_barang",$_GET['id'],"?page=viewBarangFST");
}
?>



<div class="main-content" style="margin: -80px 65px">

    <div class="section__content section__content--p30">
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                   
                    <div class="card-body">

                        <div class="locations" style="font-family: Times New Roman; color: #9F8953;">Fakultas Sains dan Teknologi</div>

                        <a href="?page=addBarang" class="btn btn-dark"><img src="gambar/tombol.png"> Tambah Barang</a>
                    </button>
                    
                    
                    <br>
                    <br>
                    <div class="table-responsive">
                     <table id="example" class="table table-borderless table-striped table-earning w-auto small">
                        <thead>
                            <tr>
                                <th>Ruang</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Masuk</th>
                                <th>Pemakai</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($dataB as $ds) { 
                               ?>
                               <tr>
                                <td><?= $ds['ruang'] ?></td>
                                <td><?= $ds['kd_barang'] ?></td>
                                <td><?= $ds['nama_barang'] ?></td>                                    
                                <td><?= $ds['jumlah_barang'] ?></td>
                                <td><?= $ds['tanggal_masuk'] ?></td>
                                <td><?= $ds['pemakai'] ?></td>
                                <td><?= $ds['kondisi'] ?></td>
                                <td><?= $ds['keterangan'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        
                                        <a href="?page=viewBarangEdit&edit&id=<?= $ds['kd_barang'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                        <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                                            <i class="fa fa-trash" id="btdelete<?php echo $no; ?>" ></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <script src="vendor/jquery-3.2.1.min.js"></script>
                            <script>
                                $('#btdelete<?php echo $no; ?>').click(function(e){
                                  e.preventDefault();
                                  swal({
                                    title: "Hapus",
                                    text: "Yakin Hapus?",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes",
                                    cancelButtonText: "Cancel",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                }, function(isConfirm) {
                                    if (isConfirm) {
                                        window.location.href="?page=viewBarangFST&delete&id=<?php echo $ds['kd_barang'] ?>";
                                    }
                                });
                              });
                          </script>
                          <?php $no++; } ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
