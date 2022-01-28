<?php 
include 'header.php';
?>
<br>
<br>
<br>


	<div class="col-md-12 col-md-offset-0">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>	
				<li data-target="#myCarousel" data-slide-to="3"></li>	
				<li data-target="#myCarousel" data-slide-to="4"></li>	
			</ol>
 
			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="assets/images/banner-03.png" style=" width: 70%; margin: 0 auto; ">
					<div class="carousel-caption">
						<h3><b>PT. MUSIM MAS KIM 2</b></h3>
						<p>Jl. Oleo, Kawasan Industri Medan 2, Saentis, Percut Sei Tuan, Deli Serdang Regency, North Sumatra 20301</p>
						<p>TELEPON : (061) 6871123</p>
					</div>
				</div>
				<div class="item">
					<img src="assets/images/banner-01.png"  style=" width: 70%; margin: 0 auto; " >
					<div class="carousel-caption">
						<h3><b>TENTANG KAMI</b></h3>
						<p>Grup Musim Mas adalah salah satu perusahaan kelapa sawit terintegrasi terbesar di dunia dengan operasi yang mencakup seluruh rantai nilai di lebih dari 80 negara. </p>
						<P></P>
					</div>
				</div>
				<div class="item">
					<img src="assets/images/banner-02.png" style=" width: 70%; margin: 0 auto; " >
					<div class="carousel-caption">
						<h3><b>PROFESIONALILTAS</b></h3>
						<p>Tenaga kerja global kami terus melakukan pengembangan yang inovatif dan berkelanjutan di seluruh spektrum rantai suplai minyak sawit untuk memastikan kualitas produk, keamanan, dan efisiensi berjalan seiring dengan perkembangan industri.</p>
						<P></P>
					</div>
				</div>	

				<div class="item">
					<img src="assets/images/banner-04.png" style=" width: 70%; margin: 0 auto; ">
					<div class="carousel-caption">
					<h3><b>VISI KAMI</b></h3>
						<p>Kami mengharapkan yang luar biasa dan akan terus berkembang untuk mencapai tingkat yang lebih tinggi. Dedikasi ini telah mewujudkan visi kami menjadi kenyataan, dan kami telah menjadi salah satu perusahaan yang paling terkenal di dunia dalam industri kelapa sawit saat ini.</p>
						<P></P>
					</div>
				</div>

				<div class="item">
					<img src="assets/images/banner-05.png" style=" width: 70%; margin: 0 auto; ">
					<div class="carousel-caption">
					<h3><b>MISI KAMI</b></h3>
						<p>Didorong oleh semangat untuk memberikan yang terbaik dan komitmen terhadap perbaikan yang berkelanjutan, kami berusaha untuk menjadi pemimpin dalam industri minyak kelapa sawit, memproduksi semua produk kelapa sawit kami dengan cara yang layak secara ekonomi, bertanggung jawab secara sosial dan ramah lingkungan, dengan kepatuhan penuh terhadap semua persyaratan hukum yang relevan.</p>
						<P></P>
					</div>
				</div>					
			</div>
 
			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<br>
		<br>
		</div>


<div class="container-fluid" >
	<div class="row">
		<div class="panel panel-container" style="box-shadow: 2px 2px 8px #a0bed1;   padding: 30px; ">
			<div class="bootstrap-table">
				<table>
				
					
				<h3>LOWONGAN PEKERJAAN : </h3>
				
				</table>
			</div>
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px;">
		<?php
		$det=mysql_query("select * from tbl_lowongan order by kode_lowongan")or die(mysql_error());
		while($d=mysql_fetch_array($det)){
		$no=1;
		?>
		<div class="col-md-4 mt-lg-4">
		  <div class="card" style="box-shadow: 2px 2px 8px #fff; min-height: 650px; float: left; padding: 15px;">
			  <div class="card-header  text-center">
			  	<br>
			   	<b><?php echo $d['judul']."(".$d['kode_lowongan'].")"; ?></b>
			  </div>

			  <div class="card-body">
			    <h5 class="card-title  text-center" >Tanggal Posting : <?php echo $d['tanggal'] ?> </h5>
			    <p class="card-text text-muted"><?php echo $d['lowongan'] ?></p>
			    
			  </div>
			  <div class="card-footer text-center">
			   <a href="pendaftaran?link=<?php echo $Encrypted?>&kode_lowongan=<?php echo$d['kode_lowongan']?>" class="btn btn-primary btn-sm" style="box-shadow: 2px 2px 8px #a0bed1;">PENDAFTARAN</a>
			  	</div>
		  </div>
		</div>
  	
	 <?php 
	    }

	?>
	</div>

</div>
<?php 
include'footer.php';
?>


	
