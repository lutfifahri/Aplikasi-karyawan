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
			  <h4>Ubah Kriteria</h4>
			</div>

<?php
$kode_kriteria=mysql_real_escape_string($_GET['kode_kriteria']);
$det=mysql_query("select * from tbl_kriteria where kode_kriteria='$kode_kriteria'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
			
			    <form action="../act/ubah_kriteria_act.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				   <label for="kt">Kode Kriteria</label>
				   <input type="text"  name="kode_kriteria" class="form-control" readonly value="<?php echo $d['kode_kriteria'] ?>">
				  </div>
				  
				  <div class="form-group">
				   <label for="jm">Nama Kriteria</label>
				   <input type="text" class="form-control" name="nama_kriteria" value="<?php echo $d['nama_kriteria'] ?>">
				  </div>


				  <div class="form-group">
				   <label for="jm">Bobot</label>
				   <input type="text" class="form-control" name="bobot_kriteria" value="<?php echo $d['bobot_kriteria'] ?>">
				  </div>


				  <div class="form-group">
						<label>Tipe</label>
						<SELECT name="tipe_kriteria" class="form-control" placeholder="Tipe Kriteria" value="<?php echo $d['tipe_kriteria'] ?> autocomplete="off" required onsubmit="this.setCustomValidity('')">
						<option selected> Benefit
						<option> Cost
						</SELECT>
						</div>

				  <button type="submit" class="btn btn-danger">UBAH</button>
				  <button type="button" onclick="location.href='kriteria.php'" class="btn btn-danger">BATAL</button>
				</form>
				<?php 
}
?>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<br>
		  	<br>
		  	<br>
		  	<img src="../assets/images/daftar.png" width="450px"height="350px" style=" width: 100%; margin: 0 auto; height: auto;">
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>