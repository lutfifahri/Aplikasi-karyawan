<?php 
include 'header.php';
?>
<br>
<br>
<br>
<br>
<div class="container">


	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  &nbsp; Data anda tidak berhasil terdaftar, silahkan cek format CV (curriculum vitae) anda . . .</div>";
			}
		}
		?>

	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div style='margin-bottom:-55px' class='alert alert-info' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  &nbsp; Data anda berhasil terdaftar, akan diproses oleh admin untuk melakukan proses verifikasi . . .</div>";
			}
		}
		?>
		<br>
		<br>

		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h4>Silahkan Daftar Diri Anda</h4>
			</div>

	<?php 
	$carikode = mysql_query("select max(kode_pelamar) from tbl_pelamar") or die (mysql_error());
  	$datakode = mysql_fetch_array($carikode);
  	if ($datakode) {
    $nilaikode = substr($datakode[0], 1);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $kode_otomatis = "P".str_pad($kode, 4, "000", STR_PAD_LEFT);
  	} else {
    $kode_otomatis = "P0001";
    
  	}
  	$kode_lowongan = $_GET['kode_lowongan'];
	?>

	

			    <form action="act/pendaftaran_act.php" method="post" enctype="multipart/form-data">
				  	<div class="form-group">
						<input name="kode_lowongan" value="<?php echo $kode_lowongan ?>" readonly type="text" class="form-control" required>
					</div>
				  	<div class="form-group">
						<input name="kode_pelamar" value="<?php echo $kode_otomatis ?>" readonly type="hidden" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Nama Lengkap</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" placeholder="Alamat" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
							<label>Jenis Kelamin</label>
							<SELECT name="jenis_kelamin" class="form-control" placeholder="Jenis kelamin" autocomplete="off" required onsubmit="this.setCustomValidity('')">
							<option selected> Pria
							<option> Wanita
							</SELECT>
						</div>

					<div class="form-group">
						<label>No Telepon</label>
						<input name="no_telp" type="text" class="form-control" placeholder="No Telepon" autocomplete="off" required onsubmit="this.setCustomValidity('')">
					</div>

					<div class="form-group">
						<label>Document</label>
						<input name="document" type="file" class="form-control" placeholder="Documen" autocomplete="off" required onsubmit="this.setCustomValidity('')">
						<h6><font color="red"><b><i>* Upload Scan Surat Lamaran, Scan CV (curriculum vitae), Scan Ijazah, Scan Transkrip NIlai, Scan Surat Keterangan Kelakuan Baik dan Scan Pas Foto anda dalam satu dokumen dengan format .pdf max file (5Mb)</i></b></font></h6>
					</div>

				  <button type="submit" class="btn btn-primary">DAFTAR</button>
				  <button type="button" onclick="location.href='index?link=<?php echo $Encrypted?>'" class="btn btn-danger">KEMBALI</button>
				</form>
			  
		  </div>
		   <div class="col-xs-12 col-sm-12 col-md-4">
		   	<br>
		   	<br>
		   	<br>
		   	
		   
		   	
		  	<img src="assets/images/daftar.png" width="450px"height="450px"  style=" width: 100%; margin: 0 auto;">
		  </div>
		</div>
			<br>
		   	<br>
		   	<br>
		   	<br>
<?php 
include'footer.php';
?>




	
