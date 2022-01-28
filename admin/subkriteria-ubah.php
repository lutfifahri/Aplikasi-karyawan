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
			<h4>Ubah SUbKriteria</h4>
		</div>

		<?php
		$kode_subkriteria=mysql_real_escape_string($_GET['kode_subkriteria']);
		$det=mysql_query("select * from tbl_subkriteria where kode_subkriteria='$kode_subkriteria'")or die(mysql_error());
		while($d=mysql_fetch_array($det)){
			?>
			
			<form action="../act/ubah_subkriteria_act.php" method="post" enctype="multipart/form-data">
				<div class="form-group">

					<input type="hidden"  name="kode_subkriteria" class="form-control" readonly value="<?php echo $d['kode_subkriteria'] ?>">


					<div class="form-group">
						<label for="jm">Nama Sbbkriteria</label>
						<input type="text" class="form-control" name="nama_subkriteria" value="<?php echo $d['nama_subkriteria'] ?>">
					</div>

					<div class="form-group">
						<label>Nama Kriteria</label>								
						<select id="nama_kriteria" name="nama_kriteria" onchange="changeValue(this.value)" class="form-control">
							<?php
							$kode_kriteria = $d['kode_kriteria'];
							$det1=mysql_query("select * from tbl_kriteria where kode_kriteria='$kode_kriteria'")or die(mysql_error());
							while($dd=mysql_fetch_array($det1)){
								?>			
								<option disabled="" selected=""><?php echo $dd['nama_kriteria'] ?></option>
								<?php 
							}
							?>
							<?php 
							$sql=mysql_query("SELECT * from tbl_kriteria order by kode_kriteria asc");
							$jsArray = "var prdName = new Array();\n";
							while ($data=mysql_fetch_array($sql)) {

								echo '<option value="'.$data['nama_kriteria'].'">'.$data['nama_kriteria'].'</option> ';
								$jsArray .= "prdName['" . $data['nama_kriteria'] . "'] = {kode_kriteria:'" . addslashes($data['kode_kriteria']) . "'};\n";

							}
							?>
						</select>
					</div>

					<input name="kode_kriteria" id="kode_kriteria"  value="<?php echo $d['kode_kriteria'] ?>" readonly type="hidden">




					<div class="form-group">
						<label>Bobot Nilai</label>
						<SELECT name="bobot_nilai" class="form-control"  placeholder="Bobot Nilai" autocomplete="off" required onsubmit="this.setCustomValidity('')">
							<option disabled="" selected=""><?php echo $d['bobot_nilai'] ?></option>
							<option> 0.2
								<option> 0.4
									<option> 0.6
										<option> 0.8
											<option> 1
											</SELECT>
										</div>

										<button type="submit" class="btn btn-danger">UBAH</button>
										<button type="button" onclick="location.href='subkriteria.php'" class="btn btn-danger">BATAL</button>
									</form>
									<?php 
								}
								?>

							</div>
						</div>

						<script type="text/javascript">    
							<?php echo $jsArray; ?>  
							function changeValue(x){  
								document.getElementById('kode_kriteria').value = prdName[x].kode_kriteria;   
							};
						</script>
						<?php
						include_once 'footer.php';
						?>