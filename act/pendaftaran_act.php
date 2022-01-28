<?php
include '../include/conn/config.php';
$kode_pelamar=$_POST['kode_pelamar'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$no_telp=$_POST['no_telp'];
$kode_lowongan = $_POST['kode_lowongan'];

        $document =$_FILES['document']['name'];
        $ekstensi_file =array('pdf');
        $folder ='../assets/document/';
        $source=$_FILES['document']['tmp_name'];
        $ekstensi =strtolower(end(explode('.', $_FILES['document']['name'])));
        $ekstensi_ok =in_array($ekstensi, $ekstensi_file, $folder.$document);
                
            // validasi input type file
            if(!($ekstensi_ok)){
                header("location:../pendaftaran?pesan=gagal");
            }
            
            // jika validasi type file terpenuhi
            else {
            move_uploaded_file($source, $folder.$document);
    		mysql_query("insert into tbl_pelamar(kode_pelamar,nama,alamat,jenis_kelamin,no_telp,document,kode_lowongan) values('$kode_pelamar','$nama','$alamat','$jenis_kelamin','$no_telp','$document','$kode_lowongan')");
			header("location:../pendaftaran?pesan=berhasil");
            }      
?>