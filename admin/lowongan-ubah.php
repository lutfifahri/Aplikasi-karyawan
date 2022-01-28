<?php 
include 'header.php';
?>
<br>
<br>
<br>
<br>

		<div class="container">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h4>Ubah Info</h4>
			</div>

<?php
$kode_lowongan=mysql_real_escape_string($_GET['kode_lowongan']);
$det=mysql_query("select * from tbl_lowongan where kode_lowongan='$kode_lowongan'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
			
			    <form action="../act/ubah_lowongan_act.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				   <label for="kt">Kode Info</label>
				   <input type="text"  name="kode_lowongan" class="form-control" readonly value="<?php echo $d['kode_lowongan'] ?>">
				  </div>
				  
				  <div class="form-group">
				   <label for="jm">Judul</label>
				   <input type="text" class="form-control" name="judul" value="<?php echo $d['judul'] ?>">
				  </div>

				  <div class="form-group">
				   <label for="jm">Tanggal</label>
				   <input type="text" class="form-control" name="tanggal" value="<?php echo $d['tanggal'] ?>">
				  </div>

				  <div class="form-group">
				   <label for="jm">Lowongan</label>
				   <textarea id='long_desc' name='lowongan' class="form-control"><?php echo $d['lowongan'] ?></textarea>
				  </div>

				  <button type="submit" class="btn btn-danger">UBAH</button>
				  <button type="button" onclick="location.href='lowongan.php'" class="btn btn-danger">BATAL</button>
				</form>
				<?php 
}
?>
			  
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