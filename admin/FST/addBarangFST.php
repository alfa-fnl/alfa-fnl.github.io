<?php 
$br = new lsp();
if ($_SESSION['level'] != "Admin") {
    header("location:../index.php");
}

$table = "fst";    

$tanggal_masuk    = date("Y-m-d");

if (isset($_POST['getSimpan'])) {
    $ruang          = $br->validateHtml($_POST['ruang']);
    $kode_barang    = $br->validateHtml($_POST['kode_barang']);
    $nama_barang    = $br->validateHtml($_POST['nama_barang']);
    $jumlah_barang  = $br->validateHtml($_POST['jumlah_barang']);
    $tanggal_masuk  = $br->validateHtml($_POST['tanggal_masuk']);
    $pemakai        = $br->validateHtml($_POST['pemakai']);
    $kondisi        = $br->validateHtml($_POST['kondisi']);
    $keterangan     = $_POST['keterangan'];

    if ($ruang == " " || $kode_barang == " " || $nama_barang == " " || $jumlah_barang == " " || $tanggal_masuk == " " || $pemakai == " " || $kondisi == " " || $keterangan == " " ) {
        $response = ['response'=>'negative','alert'=>'lengkapi field'];
    }else {
        $value = "'$ruang','$kode_barang','$nama_barang','$jumlah_barang','$tanggal_masuk','$pemakai','$kondisi','$keterangan'";

        $response = $br->insert($table,$value,"?page=viewBarangFST");

    }
}

?>
<div class="main-content-2" style="margin: 35px 20px 20px 20px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="au-card-title">
                                <div class="bg-overlay bg-overlay--default"></div>
                                <h3>
                                </i>Tambah Barang</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Ruang</label>
                                            <input type="text" class="form-control" name="ruang">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kode Barang</label>
                                            <input type="text" class="form-control" name="kode_barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Barang</label>
                                            <input type="text" class="form-control" name="nama_barang">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Jumlah Barang</label>

                                            <input type="number" class="form-control" name="jumlah_barang">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tanggal_masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pemakai</label>
                                            <input type="text" class="form-control" name="pemakai">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kondisi</label>
                                            <input type="text" class="form-control" name="kondisi">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button name="getSimpan" class="btn btn-success"><i class="fa fa-download"></i> Simpan</button>
                                <button type="reset" class="btn btn-secondary"><i class="fa fa-eraser"></i> Reset</button>
                                <a href="?page=viewBarangFST" class="btn btn-dark"><i class="fa fa-repeat"></i> Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
