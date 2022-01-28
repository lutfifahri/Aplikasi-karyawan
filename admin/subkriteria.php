<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>
<div class="contaainer">
  <div class="col-md-6 text-left">
   <h4>Data Subkriteria</h4>
</div>
<div class="col-md-6 text-right">
   <button onclick="location.href='subkriteria-baru.php'" class="btn btn-primary btn-sm">TAMBAH DATA</button>
</div>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tbl_subkriteria");
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

<form action="../act/cari_subkriteria_act.php" method="get">
    <div class="input-group col-md-4 col-md-offset-8">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
        <input type="text" class="form-control" placeholder="Cari data di sini .." aria-describedby="basic-addon1" name="cari"> 
    </div>
</form>
<br>
<table class="table table-hover table-bordered table-striped">
    <tr style=" box-shadow: 2px 2px 4px #888888">
        <th class="col-md-1">NO</th>
        <th class="col-md-2">Nama Subkriteria</th>
        <th class="col-md-2">Nama Kriteria</th>
        <th class="col-md-2">Bobot</th>
        <th class="col-md-2 text-center">Opsi</th>
    </tr>
    <?php  
    if(isset($_GET['cari'])){
        $cari=mysql_real_escape_string($_GET['cari']);
        $brg=mysql_query("SELECT * FROM tbl_kriteria a, tbl_subkriteria b where a.nama_kriteria like '$cari' or a.kode_kriteria like '$cari'");
    }else{
        $brg=mysql_query("SELECT * FROM tbl_kriteria a, tbl_subkriteria b where a.kode_kriteria=b.kode_kriteria order by b.kode_subkriteria asc limit $start, $per_hal");
    }
    $no=1;
    while($b=mysql_fetch_array($brg)){

        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $b['nama_subkriteria'] ?></td>
            <td><?php echo $b['nama_kriteria'] ?></td>
            <td><?php echo $b['bobot_nilai'] ?></td>
            
            <td class="text-center">
                <a href="subkriteria-ubah.php?kode_subkriteria=<?php echo $b['kode_subkriteria'] ?>" class="btn btn-primary btn-sm">UBAH</a> |
                <a href="subkriteria-hapus.php?kode_subkriteria=<?php echo $b['kode_subkriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm">HAPUS</a>
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