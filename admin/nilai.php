<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="col-md-6 text-left">
   <h4>Data Nilai</h4>
</div>
<div class="col-md-6 text-right">
    <button onclick="location.href='nilai-baru.php'" class="btn btn-primary btn-sm">TAMBAH DATA</button>
</div>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tbl_penilaian");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
    <table class="col-md-2">
        <tr>
            <td>Jumlah Record</td>      
            <td><?php echo $jum; ?></td>
        </tr>
        <tr>
            <td>Jumlah Halaman</td> 
            <td><?php echo $halaman; ?></td>
        </tr>
    </table>
</div>
<br>

<form action="" method="get">
    <div class="input-group col-md-4 col-md-offset-8">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
        <select type="submit" name="nama" class="form-control" onchange="this.form.submit()">
            <option>Pilih nama . .</option>
            <?php 
            $pil=mysql_query("select distinct nama from tbl_pelamar order by kode_pelamar");
            while($p=mysql_fetch_array($pil)){
                ?>
                <option><?php echo $p['nama'] ?></option>
                <?php
            }
            ?>          
        </select>
    </div>
</form>

<br>
<?php 
if(isset($_GET['nama'])){
    echo "<h4> Data nama <a style='color:blue'> ". $_GET['nama']."</a></h4>";
}
?>

<table class="table table-hover table-bordered table-striped">
    <tr style="box-shadow: 2px 2px 4px #888888;">
        <th class="col-md-1">No</th>
        <th class="col-md-1">Nama Pelamar</th>
        <th class="col-md-1">Kriteria</th>
        <th class="col-md-1">SubKriteria</th>
        <th class="col-md-1">Nilai</th>
        <th class="col-md-2 text-center">Opsi</th>
    </tr>
    <?php 
    if(isset($_GET['cari'])){
        $cari=mysql_real_escape_string($_GET['cari']);
        $brg=mysql_query("SELECT * FROM tbl_pelamar a, tbl_penilaian b where a.nama like '$cari' or a.kode_pelamar like '$cari'");
    }else{
        $brg=mysql_query("SELECT * FROM tbl_pelamar a, tbl_kriteria b, tbl_penilaian c, tbl_subkriteria d where a.kode_pelamar=c.kode_pelamar and b.kode_kriteria=c.kode_kriteria and d.kode_subkriteria=c.kode_subkriteria order by a.kode_pelamar asc limit $start, $per_hal");
    }
    $no=1;
    while($b=mysql_fetch_array($brg)){

        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $b['nama'] ?></td>
            <td><?php echo $b['nama_kriteria'] ?></td>
            <td><?php echo $b['nama_subkriteria'] ?></td>
            <td><?php echo $b['bobot_penilaian'] ?></td>

            <td class="text-center">
              <a href="nilai-ubah.php?kode_nilai=<?php echo $b['kode_nilai'] ?>" class="btn btn-primary btn-sm">UBAH</a> |
              <a href="nilai-hapus.php?kode_nilai=<?php echo $b['kode_nilai'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm">HAPUS</a>
          </td>
      </tr>       
      <?php 
  }
  ?>

</table>
<ul class="pagination">         
    <?php 
    for($x=1;$x<=$halaman;$x++){
        ?>
        <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        <?php
    }
    ?>                      
</ul>
</div>

<?php
include_once 'footer.php';
?>
