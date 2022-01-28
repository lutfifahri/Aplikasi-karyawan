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
			<h4>Ubah Nilai</h4>
		</div>

		<?php
		$kode_nilai=mysql_real_escape_string($_GET['kode_nilai']);
		$det=mysql_query("select * from tbl_penilaian where kode_nilai='$kode_nilai'")or die(mysql_error());
		while($d=mysql_fetch_array($det)){
			?>
			
			<form action="../act/ubah_nilai_act.php" method="post" enctype="multipart/form-data">
				<input type="hidden"  name="kode_nilai" class="form-control" readonly value="<?php echo $d['kode_nilai'] ?>">


				<div class="form-group">
				<label>Nama Pelamar</label>
				 <select id="kode_pelamar" name="kode_pelamar" class="form-control">
					<option value="" >Please Select</option>
					<?php 

						$sql_pelamar = mysql_query("SELECT * from tbl_pelamar");
						while($k = mysql_fetch_array($sql_pelamar))
						{
							
							if(isset($d['kode_pelamar']) && $k['kode_pelamar'] == $d['kode_pelamar'])
							{
								echo"<option value='$k[kode_pelamar]' selected>$k[nama]</option>";	
							}
							else
							{
								echo"<option value='$k[kode_pelamar]'>$k[nama]</option>";
							}


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
							if(isset($d['kode_kriteria']) && $k['kode_kriteria'] == $d['kode_kriteria'])
							{
								echo"<option value='$k[kode_kriteria]' selected>$k[nama_kriteria]</option>";	
							}
							else
							{
								echo"<option value='".$k['kode_kriteria']."'>".$k['nama_kriteria']."</option>";
							}


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
							if(isset($d['kode_subkriteria']) && $datask['kode_subkriteria'] == $d['kode_subkriteria'])
							{
								
								echo"<option id='subkriteria' 
									class='".$datask['kode_kriteria']."' 
									value='".$datask['kode_subkriteria']."' selected>
									".$datask['nama_subkriteria']."</option>";

								
							}
							else
							{
								echo"<option id='subkriteria' 
									class='".$datask['kode_kriteria']."' 
									value='".$datask['kode_subkriteria']."'>
									".$datask['nama_subkriteria']."</option>";
							}
								
							
							
						}
						
					?>
				</select>
				<?php echo $d['kode_subkriteria']."-".$k['kode_subkriteria']; ?>
			</div>


				


				<button type="submit" class="btn btn-danger">UBAH</button>
				<button type="button" onclick="location.href='nilai.php'" class="btn btn-danger">BATAL</button>
			</form>
			<?php 
		}
		?>


		<script type="text/javascript">
			<?php echo $jsArray1; ?>  
			function changeValue1(x){  
				document.getElementById('kode_kriteria').value = prdName1[x].kode_kriteria;   
			};


			<?php echo $jsArray; ?>  
			function changeValue(x){  
				document.getElementById('kode_subkriteria').value = prdName[x].kode_subkriteria;
				document.getElementById('bobot_nilai').value = prdName[x].bobot_nilai;   
			};

			<?php echo $jsArray2; ?>  
			function changeValue2(x){  
				document.getElementById('kode_pelamar').value = prdName2[x].kode_pelamar;   
			};
		</script>

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