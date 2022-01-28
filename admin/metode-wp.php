<?php include 'header.php'; 
error_reporting(0);?>
<br>
<br>
<br>
<br>
<div class="coontainer">


                   
                               
                               
                             
                                        <div class="col-md-6 text-left">
                                        <h4>Data Kriteria</h4>
                                        </div>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_kriteria';
                                        $resultkriteria = $dbx->query($sql);
                                        $banyakkriteria = $resultkriteria->num_rows;

                                        $sql = 'SELECT * FROM tbl_kriteria';
                                        $result = $dbx->query($sql);
                                        

                                        $sql2 = 'SELECT * FROM tbl_pelamar';
                                        $resultkopi = $dbx->query($sql2);
                                        $banyakbaris = $resultkopi->num_rows;
                                        //-- menyiapkan variable penampung berupa array
                                        $kriteria=array();
                                         // Create the beginning of HTML table, and the first row with colums title
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                        <tr style=" box-shadow: 2px 2px 4px #888888">
                                        <th>Kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th></tr>';

                                        // Parse the result set, and adds each row and colums in HTML table
                                        foreach ($result as $row) {
                                           $kriteria[$row['kode_kriteria']]=array($row['nama_kriteria'],$row['bobot_kriteria']);

                                           $html_table .= '<tr><td>' .$row['kode_kriteria']. '</td><td>' .$row['nama_kriteria']. '</td><td>' .$row['bobot_kriteria']. '</td></tr>';

                                        
                                        }
                                        $html_table .= '</table>';           // ends the HTML table

                                        echo $html_table;        // display the HTML table
                                        ?>
                              




                                        <div class="col-md-6 text-left">
                                        <h4>Normalisasi Bobot</h4>
                                        </div>
                                        <?php
                                        $sql = 'SELECT * FROM tbl_kriteria';
                                        $result = $dbx->query($sql);
                                        $banyakkriteria = $result->num_rows;
                                        $totalbobot = 0;
                                        foreach ($result as $row) {
                                            $totalbobot = $totalbobot + $row['bobot_kriteria'];
                                        }
                                        $bobotnormal=array();
                                        foreach ($result as $row) {
                                            $bobotnormal[]= number_format(($row['bobot_kriteria']/$totalbobot),4);
                                        }
                                        
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style=" box-shadow: 2px 2px 4px #888888">
                                            ';
                                            foreach ($resultkriteria as $row) {
                                                //echo $row['kode_kriteria'];
                                                $html_table.= '<th>'.$row['nama_kriteria'].'</th>';
                                            }
                                            $html_table .= '</tr><tr>';
                                            for ($kolom = 0; $kolom < $banyakkriteria; $kolom++){
                                                $html_table .= '<td>'.$bobotnormal[$kolom]. '</td>';
                                            }   
                                            $html_table .= '</tr></table>';
                                    
                                        echo $html_table;   
                                        ?>
                           



                                    <div class="col-md-6 text-left">
                                        <h4>Data Penilaian</h4>
                                        </div>
                                    <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>

                                        <?php
                                        $sqlx = 'SELECT * FROM tbl_penilaian a JOIN tbl_pelamar b USING(kode_pelamar) ORDER BY a.kode_pelamar,a.kode_kriteria';
                                        $resultx = $dbx->query($sqlx);
                                        //-- menyiapkan variable penampung berupa array
                                        $nilai2=array();
                                        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style=" box-shadow: 2px 2px 4px #888888">
                                            <th>Kode</th>';
                                            $kolom = 0;
                                            $bobotkriteria = array();
                                            $tipekriteria = array();
                                            
                                            foreach ($resultkriteria as $row) {
                                                //echo $row['kode_kriteria'];
                                                $html_table.= '<th>'.$row['nama_kriteria'].'</th>';
                                                $bobotkriteria[$kolom] = $row['bobot_kriteria'];
                                                //echo $bobotkriteria[$kolom];
                                                $kolom++;
                                            }
                                            $html_table .= '</tr>';
                                        
                                        
                                        $nilainol = 0;
                                        $baris = 0;
                                        $nilai2[$baris][0]='';
                                        $kolom = 0;     
                                        foreach ($resultx as $row) {

                                            $id_nilai = $row['kode_pelamar'];
                                            $pembanding= $nilai2[$baris][0];
                                            if ($id_nilai <> $pembanding){
                                                
                                                $baris++;
                                                $kolom = 0;
                                                $nilai2[$baris][0] = $row['kode_pelamar'];
                                                $html_table .= '<tr><td>'.$row['kode_pelamar']. '</td>';

                                            }else{
                                                $kolom++;
                                            }
                                            $nilai2[$baris][$kolom + 1] = $row['bobot_penilaian'];
                                            $html_table .= '<td>'.$row['bobot_penilaian'].'</td>';
                                            
                                            if ($kolom==$banyakkriteria){
                                                $html_table .= '</tr>';
                                            }
                                                
                                          
                                            
                                        }
                                        
                                        $html_table .= '</table>';           // ends the HTML table

                                        echo $html_table;        // display the HTML table

                                        /*$html_table = '<table class="table" width="100%">
                                        <tr class="th">
                                            <th>Kopi</th>
                                            <th>Kriteria</th>
                                            <th>Bobot</th>
                                        </tr>';
                                        $html_table .= '<tr>';*/

                                        $sql = 'SELECT * FROM tbl_penilaian a JOIN tbl_pelamar b USING(kode_pelamar) ORDER BY a.kode_pelamar,a.kode_kriteria';
                                        $result = $dbx->query($sql);
                                        //-- menyiapkan variable penampung berupa array
                                        $nilai=array();
                                             
                                        foreach ($result as $row) {
                                            //-- jika array $sample[$row['alternatif']] belum ada maka buat baru
                                            //-- $row['alternatif'] adlah nama pelamar/alternatif
                                            if (!isset($nilai[$row['nama']])) {
                                               $nilai[$row['nama']] = array();
                                                
                                            }
                                            
                                             $nilai[$row['nama']][$row['kode_kriteria']] = $row['bobot_penilaian'];
                                            /* $html_table .= '<td>' .$row['nama_kopi']. '</td><td>' .$row['kode_kriteria']. '</td><td>' .$row['bobot_pembobotan']. '</td></tr>';*/
                                            //
                                            
                                        }
                                        
                                        /*$html_table .= '</table>';           // ends the HTML table

                                        echo $html_table;    */    // display the HTML table
                                        ?>
                                </div>
                              
                                
                                



                                
                                    <div class="col-md-6 text-left">
                                        <h4>Nilai Vektor S</h4>
                                        </div>
                                    <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>
                                        <?php
                                        $vektors=array();
                                        $totalvektors = 0;
                                         for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                            $jumlahpangkat = 1;
                                            for ($kolom = 0; $kolom <= $banyakkriteria; $kolom++){
                                                if ($kolom == 0){

                                                    $vektors[$baris][0]= $nilai2[$baris][$kolom];
                                                    //echo $vektors[$baris][0];
                                                }else{
                                                    $jumlahpangkat = $jumlahpangkat * pow($nilai2[$baris][$kolom],$bobotnormal[$kolom-1]);
                                                //  echo $jumlahpangkat."-".$bobotnormal[$kolom-1];
                                                }   

                                                
                                            }
                                           $vektors[$baris][1] = number_format($jumlahpangkat,3);

                                           $totalvektors = $totalvektors +  number_format($vektors[$baris][1],3);
                                        }
                        
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style=" box-shadow: 2px 2px 4px #888888">
                                            <th>Kode</th>
                                            ';


                                            
                                                $html_table.= '<th>Nilai Vektor S</th>';
                                            
                                            $html_table .= '</tr><tr>';
                                            for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                                $html_table.= '<td>'.$vektors[$baris][0].'</td>';
                                                $html_table .= '<td>'.$vektors[$baris][1]. '</td>';
                                               
                                                $html_table .= '</tr>';
                                               
                                            }
                                            $html_table .= '<tr style=background-color:white;><td><b>Total Vektor S</b></td><td><b>'.$totalvektors.'</b></td></tr>';
                                            $html_table .= '</table>';
                                    
                                        echo $html_table;        // display the HTML table
                                        
                                        ?>


                                </div>
                              






                                <div class="col-md-6 text-left">
                                        <h4>Nilai Vektor V</h4>
                                        </div>
                                    <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>
                                        <?php
                                        $vektorv=array();

                                        $totalvektorv = 0;
                                         for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                            
                                          
                                                    $vektorv[$baris][0]= $vektors[$baris][0];
                                                    $vektorv[$baris][1] = number_format($vektors[$baris][1] / $totalvektors,3);
                                    
                                           
                                            $totalnya = $vektorv[$baris][1];
                                            $kodekopi = $vektorv[$baris][0];
                                           $totalvektorv = $totalvektorv +  $vektorv[$baris][1];
                                            $ubah = mysql_query("Update tbl_pelamar set nilai_wp='$totalnya' where kode_pelamar='$kodekopi'");
                                        }
                        
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style=" box-shadow: 2px 2px 4px #888888">
                                            <th>Kode</th>
                                            ';


                                            
                                                $html_table.= '<th>Nilai Vektor S</th>';
                                            
                                            $html_table .= '</tr><tr>';
                                            for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                                $html_table.= '<td>'.$vektorv[$baris][0].'</td>';
                                                $html_table .= '<td>'.$vektorv[$baris][1]. '</td>';
                                               
                                                $html_table .= '</tr>';
                                               
                                            }
                                            $html_table .= '<tr style=background-color:white;><td><b>Total Vektor S</b></td><td><b>'.$totalvektorv.'</b></td></tr>';
                                            $html_table .= '</table>';
                                    
                                        echo $html_table;        // display the HTML table
                                        
                                        
                                        ?>

                                </div>
                             

                                
                                
                                    <div class="col-md-6 text-left">
                                        <h4>Perangkingan</h4>
                                        </div>
                                    <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>
                                        <?php
                                        $sql4 = 'SELECT * FROM tbl_pelamar ORDER BY nilai_wp DESC';
                                        $resultrank = $dbx->query($sql4);
                                        $ranks=0;
                                        $temps = 0;
                                        foreach ($resultrank as $baris) {
                                            
                                        /*   echo "temps = ".$temps." ";
                                             echo "ranks = ".$ranks." ";
                                             echo "hasil = ".$baris['nilai_total']." <br>";
*/
                                            if ($temps == $baris['nilai_wp']){

                                            }else{
                                                $ranks++;
                                            }
                                            $temps = $baris['nilai_wp'];

                                            $ubah = mysql_query("Update tbl_pelamar set rangking_wp ='$ranks' where kode_pelamar='$baris[kode_pelamar]'");

                                        }

                                        $sql5 = 'SELECT * FROM tbl_pelamar ORDER BY rangking_wp ASC';
                                        $resultfinal = $dbx->query($sql5);

                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                        <tr style=" box-shadow: 2px 2px 4px #888888">
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Nilai Akhir</th>
                                        <th>Rangking</th></tr>';

                                        // Parse the result set, and adds each baris and colums in HTML table
                                        foreach ($resultfinal as $row) {
                                          
                                           $html_table .= '<tr><td>' .$row['kode_pelamar']. '</td><td>' .$row['nama']. '</td><td>' .$row['nilai_wp']. '</td><td>' .$row['rangking_wp']. '</td></tr>';

                                        
                                        }
                                            $html_table .= '</table>';
                                    
                                        echo $html_table;        // display the HTML table
                                    ?>
                                </div>
                               



                               
                                   <div class="col-md-6 text-left">
                                    <h4>Kesimpulan</h4>
                                    </div>
                                    <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>
                                    <?php

                                        $sql3 = 'SELECT * FROM tbl_pelamar ORDER BY rangking_wp ASC limit 1';
                                        $resultkopi = $dbx->query($sql3);

                                        $html_table ='<table class="table table-hover table-bordered table-striped"><tr style=" box-shadow: 2px 2px 4px #888888">
                                        ';

                                        // Parse the result set, and adds each row and colums in HTML table
                                        foreach ($resultkopi as $row) {
                                          
                                           $html_table .= '<tr><td><h3>Hasil Dari Penilaian Menggunakan Metode WEIGHT PRODUCT Bahwa Pelamar Yang Memiliki Nilai Tertinggi Adalah <b>' .$row['kode_pelamar']. '</b> Yaitu <b>' .$row['nama']. '</b> Dengan Nilai <b>' .$row['nilai_wp']. '</b></h3></td></tr>';

                                        
                                        }
                                            $html_table .= '</table>';
                                    
                                        echo $html_table;        // display the HTML table

                                        ?>

                                        </div>
                         
 
                               
                              


</div>
