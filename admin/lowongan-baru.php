<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>


		<div class="container">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h4>Tambah Info</h4>
			</div>

	<?php 
	$carikode = mysql_query("select max(kode_lowongan) from tbl_lowongan") or die (mysql_error());
  	// menjadikannya array
  	$datakode = mysql_fetch_array($carikode);
  	// jika $datakode
  	if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "I".str_pad($kode, 2, "0", STR_PAD_LEFT);
  	} else {
   $kode_otomatis = "I01";
  	}
	?>
			
			    <form action="../act/tmb_lowongan_act.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
						<label>Kode Info</laobel>
						<input name="kode_lowongan" value="<?php echo $kode_otomatis ?>" readonly type="text" class="form-control" placeholder="Kode Info" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Judul</label>
						<input name="judul" type="text" class="form-control" placeholder="judul" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Tanggal</label>
						<input name="tanggal" type="text" class="form-control" placeholder="Tanggal" value="<?php echo date('d/m/Y') ?>" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Lowongan</label>
						<textarea id='long_desc' name='lowongan' class="form-control"></textarea>
					</div>
				  <button type="submit" class="btn btn-danger">SIMPAN</button>
				  <button type="button" onclick="location.href='lowongan.php'" class="btn btn-danger">KEMBALI</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<br>
		  	<br>
		  	<br>
		  	<br>
		  	<br>
		  	<img src="../assets/images/daftar.png" width="450px"height="350px" style=" width: 100%; margin: 0 auto; height: auto;">
		  </div>
		</div>

		<?php
include_once 'footer.php';
?>
<script>
    CKEDITOR.replace('long_desc', {
      height: 260,
      /* Default CKEditor 4 styles are included as well to avoid copying default styles. */
      contentsCss: [
        '../ckeditor/contents.css'
      ]
    });
  </script>