<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>


<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<div class="page-header">
			<h4>Input Nilai</h4>
		</div>
		
		<form action="../act/tmb_nilai_act.php" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nama Pelamar</label>
				 <select id="kode_pelamar" name="kode_pelamar" class="form-control">
					<option value="" >Please Select</option>
					<?php 

						$sql_pelamar = mysql_query("SELECT * from tbl_pelamar");
						while($k = mysql_fetch_array($sql_pelamar))
						{
							echo"<option value='".$k['kode_pelamar']."'>".$k['nama']."</option>";
						}
					?>
				</select>

				
			</div>

		
			<div class="form-group">
				<label>Nama Kriteria</label>								
				<select id="kriteria" name="kriteria" class="form-control">
					<option value="" >Please Select</option>
					<?php 

						$sql_kriteria = mysql_query("SELECT * from tbl_kriteria");
						while($k = mysql_fetch_array($sql_kriteria))
						{
							echo"<option value='".$k['kode_kriteria']."'>".$k['nama_kriteria']."</option>";
						}
					?>
				</select>
			</div>
		
			<div class="form-group">
				<label>Nama Subkriteria</label>								
				<select id="subkriteria" name="subkriteria" class="form-control">
					<option value="" >Please Select</option>
					<?php 
						$sql_subkriteria = mysql_query("SELECT * from tbl_subkriteria INNER JOIN tbl_kriteria ON tbl_subkriteria.kode_kriteria=tbl_kriteria.kode_kriteria");
						while($datask = mysql_fetch_array($sql_subkriteria))
						{
							
								echo"<option id='subkriteria' 
									class='".$datask['kode_kriteria']."' 
									value='".$datask['kode_subkriteria']."'>
									".$datask['nama_subkriteria']."</option>";
							
							
						}
						
					?>
				</select>
			</div>

			
			<input name="bobot_penilaian" id="bobot_nilai" readonly type="hidden" class="form-control">

			
			<button type="submit" class="btn btn-danger">SIMPAN</button>
			<button type="button" onclick="location.href='nilai.php'" class="btn btn-danger">KEMBALI</button>
		</form>
		
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<img src="../assets/images/daftar.png" width="450px"height="350px" style=" width: 100%; margin: 0 auto; height: auto;">
	</div>
</div>
<script src="../assets/js/jquery-1.12.2.min.js"></script>
<script src="../assets/js/jquery.chained.min.js"></script>
<script>
    $("#subkriteria").chained("#kriteria");
</script>


<?php
include_once 'footer.php';
?>
