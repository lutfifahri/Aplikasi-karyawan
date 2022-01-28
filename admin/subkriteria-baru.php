<?php include 'header.php'; ?>
<br>
<br>
<br>


<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<div class="page-header">
			<h4>Tambah Subkriteria</h4>
		</div>



		<form action="../act/tmb_subkriteria_act.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Subkriteria</label>
				<input name="nama_subkriteria" type="text" class="form-control" placeholder="Nama SUbkriteria" autocomplete="off" required onsubmit="this.setCustomValidity('')">
			</div>


			<div class="form-group">
				<label>Nama Kriteria</label>								
				<select id="nama_kriteria" name="nama_kriteria" onchange="changeValue(this.value)" class="form-control">
					<option disabled="" selected="">Pilih</option>
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

			
			<input name="kode_kriteria" id="kode_kriteria" readonly type="hidden" class="form-control">

			<div class="form-group">
				<label>Bobot Nilai</label>
				<SELECT name="bobot_nilai" class="form-control" placeholder="Bobot Nilai" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					<option disabled="" selected=""><?php echo $d['bobot_nilai'] ?></option>
							<option> 0.2
								<option> 0.4
									<option> 0.6
										<option> 0.8
											<option> 1
											</SELECT>
										</div>

								<button type="submit" class="btn btn-danger">SIMPAN</button>
								<button type="button" onclick="location.href='Subkriteria.php'" class="btn btn-danger">KEMBALI</button>
							</form>

						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<br>
							<br>
							<br>
							<br>
							<img src="../assets/images/daftar.png" width="450px"height="350px" style=" width: 100%; margin: 0 auto; height: auto;">
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