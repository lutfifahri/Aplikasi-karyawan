<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>


		<div class="container">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h4>Tambah Kriteria</h4>
			</div>

			
			    <form action="../act/tmb_kriteria_act.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Kriteria</label>
						<input name="nama_kriteria" type="text" class="form-control" placeholder="Nama Kriteria" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Bobot</label>
						<input name="bobot_kriteria" type="text" class="form-control" placeholder="Bobot" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Tipe</label>
						<SELECT name="tipe_kriteria" class="form-control" placeholder="Tipe Kriteria" autocomplete="off" required onsubmit="this.setCustomValidity('')">
						<option selected> Benefit
						<option> Cost
						</SELECT>
						</div>

					
				  <button type="submit" class="btn btn-danger">SIMPAN</button>
				  <button type="button" onclick="location.href='kriteria.php'" class="btn btn-danger">KEMBALI</button>
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