<?php 
	$br = new lsp();
	if ($_SESSION['level'] != "Admin") {
    header("location:../index.php");
  	}
	$table    = "table_barang";
	$data     = $br->selectWhere($table,"kd_barang",$_GET['id']);
	$getMerek = $br->select("table_merek");
	$getDistr = $br->select("table_distributor");
	$waktu    = date("Y-m-d");
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
	}else  if ($response['types'] == "true") {
		$value = "ruang='$ruang',kode_barang='$kode_barang',nama_barang='$nama_barang',jumlah_barang='$jumlah_barang',tanggal_masuk='$tanggal_masuk',pemakai='$pemakai',kondisi='$kondisi',keterangan='$keterangan'";
		$response = $br->update($table,$value,"kode_barang",$_GET['id'],"?page=viewBarangFST");
	}else{
		$response = ['response'=>'negative','alert'=>'gambar error'];
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
            				<div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
	                            <div class="bg-overlay bg-overlay--default"></div>
	                            <h3>
	                            </i>Edit Barang</h3>
                        	</div>
                        	<div class="card-body">
                        		<div class="col-12">
                        			<div class="row">
                        				<div class="col-md-6">
                        					<div class="form-group">
												<label for="">Kode barang</label>
												<input type="text" class="form-control" name="kode_barang" value="<?php echo $data['kd_barang']; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="">Nama barang</label>
												<input type="text" class="form-control" name="nama_barang" value="<?php echo @$data['nama_barang'] ?>">
											</div>
											<div class="form-group">
												<label for="">Merek</label>
												<select name="merek_barang" class="form-control">
													<option value=" ">Pilih merek</option>
													<?php foreach($getMerek as $mr) { ?>
													<?php if ($mr['kd_merek'] == $data['kd_merek']){ ?>
														<option value="<?= $mr['kd_merek'] ?>" selected><?= $mr['merek'] ?></option>
													<?php }else{ ?>
													<option value="<?= $mr['kd_merek'] ?>"><?= $mr['merek'] ?></option>
													<?php } ?>
													<?php } ?>
												</select>
											</div>
											<div class="form-group">
												<label for="">Distributor</label>
												<select name="distributor" class="form-control">
													<option value=" ">Pilih distributor</option>
													<?php foreach($getDistr as $dr) { ?>
													<?php if ($dr['kd_distributor'] == $data['kd_distributor']){ ?>
													<option value="<?= $dr['kd_distributor'] ?>" selected><?= $dr['nama_distributor'] ?></option>
													<?php }else{ ?>
													<option value="<?= $dr['kd_distributor'] ?>"><?= $dr['nama_distributor'] ?></option>
													<?php } ?>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Harga barang</label>
												<input type="number" class="form-control" name="harga" value="<?php echo $data['harga_barang'] ?>">
											</div>
											<div class="form-group">
												<label for="">Stok barang</label>
												<input type="number" class="form-control" name="stok" value="<?php echo $data['stok_barang'] ?>">
											</div>
											<div class="form-group">
												<label for="">Keterangan</label>
												<input type="text" class="form-control" name="ket" value="<?php echo $data['keterangan'] ?>">
											</div>
											<div class="form-group" id="fotoF">
												<label for="">Foto</label>
												<div class="row">
													<div class="col-6">
														<input type="file" name="foto" id="gambar" class="form-control-file">
													</div>
													<div class="col-6">
														<div>
					                                        <img style="margin-top: -20px;" alt="" src="img/<?= $data['gambar'] ?>" width="120" class="img-responsive" id="pict">
					                                    </div>
													</div>
												</div>
											</div>
										</div>
                        			</div>
                        		</div>
                        	</div>
                        	<div class="card-footer">
                        		<button name="getSimpan" class="btn btn-info"><i class="fa fa-download"></i> Update</button>
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
