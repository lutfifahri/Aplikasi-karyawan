<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>
    <div class="container">
      
        
            <section class='col-lg-12 connectedSortable'>

            <!-- Map card -->
                <div class='card'>
                   <div class="col-md-6 text-left">
                    <h4>Data Kriteria</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                           
                                    <?php  

                                    $sql1 = 'SELECT * from tbl_pelamar';
                                    $jumlah_pelamar=mysql_num_rows(mysql_query($sql1));
                                    $banyakbaris = mysql_num_rows(mysql_query($sql1));
                                    $resultm = $dbx->query($sql1);

                                    $sql = 'SELECT * from tbl_kriteria';
                                    $banyakkriteria = mysql_num_rows(mysql_query($sql));


    
                                    $resultk = $dbx->query($sql);
                                    
                                    //-- menyiapkan variable penampung berupa array
                                    $kriteria=array();
                                     // Create the beginning of HTML table, and the first row with colums title
                                    $html_table = '<table class="table table-hover table-bordered table-striped">
                                    <tr style=" box-shadow: 2px 2px 4px #888888">
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Tipe</th></tr>';

                                    // Parse the result set, and adds each row and colums in HTML table
                                    foreach ($resultk as $row) {
                                       $kriteria[$row['kode_kriteria']]=array($row['nama_kriteria'],$row['bobot_kriteria'],$row['tipe_kriteria']);

                                       $html_table .= '<tr><td>' .$row['kode_kriteria']. '</td><td>' .$row['nama_kriteria']. '</td><td>' .$row['bobot_kriteria']. '</td><td>' .$row['tipe_kriteria']. '</td></tr>';
                                     //  $bobotkriteria[$row['kode_kriteria']]=$row['bobot_kriteria'];
                                       $bencost[$row['kode_kriteria']]=$row['tipe_kriteria'];
                                    
                                    }
                                    $html_table .= '</table>';           // ends the HTML table

                                echo $html_table;        // display the HTML table

                            ?>
                        </div>
                        </div>
                        </div>
           






                <div class='card'>
                    <div class="col-md-6 text-left">
                    <h4>Data Penilaian</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                           
                                        
                    <?php
                    $sqlp = 'SELECT * from tbl_penilaian a JOIN tbl_pelamar b USING(kode_pelamar) ORDER BY a.kode_pelamar,a.kode_kriteria';
                    $resultp = $dbx->query($sqlp);


                        $jumlah_penilaian = mysql_num_rows(mysql_query($sql));
                        //-- menyiapkan variable penampung berupa array
                        $nilai=array();
                        $nilai2=array();
                        

                        $html_table = '<table class="table table-hover table-bordered table-striped">
                            <tr style=" box-shadow: 2px 2px 4px #888888">
                            <th>Kode</th>';
                            $kolom = 0;
                            $bobotkriteria = array();
                            $tipekriteria = array();
                            
                            foreach ($resultk as $row) {
                                //echo $row['kode_kriteria'];
                                $html_table.= '<th>'.$row['nama_kriteria'].'</th>';
                                $bobotkriteria[$kolom] = $row['bobot_kriteria'];
                                //echo $bobotkriteria[$kolom];
                                $tipekriteria[$kolom] = $row['tipe_kriteria'];
                                $kolom++;
                            }
                            $html_table .= '</tr>';
                        
                        
                            $nilainol = 0;
                            $baris = 0;
                            $nilai2[$baris][0]='';
                            $kolom = 0;     
                            foreach ($resultp as $row) {

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
                                $html_table .= '<td style=text-align:center>'.$row['bobot_penilaian'].'</td>';
                                
                                if ($kolom==$banyakkriteria){
                                    $html_table .= '</tr>';
                                }
                                    
                              
                                
                            }
                        
                        $html_table .= '</table>';           // ends the HTML table

                            echo $html_table; 
                               ?> 
                        </div>
                        </div>
                        </div>




                <div class='card'>
                   <div class="col-md-6 text-left">
                    <h4>Nilai Max</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                                        
                            <?php
                                        $sql2 = 'SELECT * FROM tbl_pelamar';
                                        $resultkopi = $dbx->query($sql2);
                                        $banyakbaris = $resultkopi->num_rows;


                                        $maksimal = array();
                                        $maksimal2 = array();
                                        $mins = array();
                                        for ($kolom = 0; $kolom < $banyakkriteria; $kolom++){
                                            $maksimal[$kolom]= 0;
                                            $maksimal2[$kolom]= 0;
                                            $minimal[$kolom]= 5;
                                        }
                                        for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                            
                                            for ($kolom = 0; $kolom < $banyakkriteria; $kolom++){
                                                //echo $bobotkriteria[$kolom];
                                                
                                                 if ($nilai2[$baris][$kolom + 1] > $maksimal[$kolom]){
                                                     $maksimal[$kolom]=$nilai2[$baris][$kolom+1];
                                                 } 
                                                                                                    
                                            }
                                           
                                        }
                                        
                                        
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style="background:#fff; box-shadow: 2px 2px 4px #888888;">
                                            ';
                                            foreach ($resultk as $row) {
                                                //echo $row['kode_kriteria'];
                                                $html_table.= '<th style=text-align:center><font color="000">'.$row['nama_kriteria'].'</font></th>';
                                            }
                                            $html_table .= '</tr><tr style=text-align:center>';
                                            for ($kolom = 0; $kolom < $banyakkriteria; $kolom++){
                                                $html_table .= '<td>'.$maksimal[$kolom]. '</td>';
                                            }   
                                            $html_table .= '</tr></table>';
                                    
                                        echo $html_table;        // display the HTML table
                                    ?>
                        </div>
                        </div>
                        </div>

                <div class='card'>
                    <div class="col-md-6 text-left">
                    <h4>Nilai Normalisasi</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                        <?php
                                        $normalisasi2 = array();
                                        
                                                            
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style=" box-shadow: 2px 2px 4px #888888">
                                            <th>Kode</th>
                                            ';


                                            foreach ($resultk as $row) {
                                                //echo $row['kode_kriteria'];
                                                $html_table.= '<th>'.$row['nama_kriteria'].'</th>';
                                            }
                                            $html_table .= '</tr><tr>';
                                            for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                                $html_table.= '<td>'.$nilai2[$baris][0].'</td>';
                                                for ($kolom = 1; $kolom <= $banyakkriteria; $kolom++){
                                                    
                                                    $normalisasi2[$baris][$kolom] = number_format($nilai2[$baris][$kolom] / $maksimal[$kolom-1],3);  
                                                    $matbobot[$baris][$kolom]= number_format($normalisasi2[$baris][$kolom] * ($bobotkriteria[$kolom-1] / 100),3);
                                                    //echo $normalisasi2[$baris][$kolom].$total[$kolom];                                
                                                    $html_table .= '<td style=text-align:center>'.$normalisasi2[$baris][$kolom]. '</td>';
                                                    
                                                }
                                                $html_table .= '</tr>';
                                               
                                            }
                                            $html_table .= '</table>';
                                        echo $html_table; 

                               ?>
                        </div>
                        </div>
                        </div>





                
                <div class='card'>
                    <div class="col-md-6 text-left">
                    <h4>Nilai Terbobot</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                           <?php
                                        
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                            <tr style=" box-shadow: 2px 2px 4px #888888">
                                            <th>Kode</th>';


                                            foreach ($resultk as $row) {
                                                //echo $row['kode_kriteria'];
                                                $html_table.= '<th>'.$row['nama_kriteria'].'</th>';
                                            }
                                            $html_table .= '</tr><tr>';
											
                                            for ($baris = 0;$baris < $banyakbaris; $baris++){
                                                $html_table.= '<td>'.$nilai2[$baris+1][0].'</td>';
												$totalnya = 0;
                                                for ($kolom = 1; $kolom <= $banyakkriteria; $kolom++){
                                                                                                    
                                                    $html_table .= '<td style=text-align:center>'.$matbobot[$baris+1][$kolom]. '</td>';
                                                    $totalnya = $totalnya + $matbobot[$baris+1][$kolom];
                                                    
                                                }
                                                $html_table .= '</tr>';
                                               
                                               
                                                $pelamarnya = $nilai2[$baris+1][0] ;
                                                $ubah = mysql_query("Update tbl_pelamar set nilai_saw='$totalnya' where kode_pelamar='$pelamarnya'")or die(mysql_error());
                                               
                                            }
                                            $html_table .= '</table>';
                                        echo $html_table; 

                                    
                                        


                                        
                                            
                                       
                                ?>
                        </div>
                    </div>
                </div>

                

                <div class='card'>
                    <div class="col-md-6 text-left">
                        <h4>Perangkingan</h4>
                    </div>
                        <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>
                            <?php
                            $sql4 = 'SELECT * FROM tbl_pelamar ORDER BY nilai_saw DESC';
                            $resultrank = $dbx->query($sql4);
                            $ranks=0;
                            $temps = 0;
                            foreach ($resultrank as $baris) {
                                
                            /*   echo "temps = ".$temps." ";
                                 echo "ranks = ".$ranks." ";
                                 echo "hasil = ".$baris['nilai_total']." <br>";
*/
                                if ($temps == $baris['nilai_saw']){

                                }else{
                                    $ranks++;
                                }
                                $temps = $baris['nilai_saw'];

                                $ubah = mysql_query("Update tbl_pelamar set rangking_saw ='$ranks' where kode_pelamar='$baris[kode_pelamar]'");

                            }

                            $sql5 = 'SELECT * FROM tbl_pelamar ORDER BY rangking_saw ASC';
                            $resultfinal = $dbx->query($sql5);

                            $html_table = '<table class="table table-hover table-bordered table-striped">
                            <tr style=" box-shadow: 2px 2px 4px #888888">
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Nilai SAW</th>
                            <th>Rangking SAW</th></tr>';

                            // Parse the result set, and adds each baris and colums in HTML table
                            foreach ($resultfinal as $row) {
                              
                               $html_table .= '<tr><td>' .$row['kode_pelamar']. '</td><td>' .$row['nama']. '</td><td>' .$row['nilai_saw']. '</td><td>' .$row['rangking_saw']. '</td></tr>';

                            
                            }
                                $html_table .= '</table>';
                        
                            echo $html_table;        // display the HTML table
                        ?>
                    </div>
                </div>
                
                <div class='card'>
                    <div class="col-md-6 text-left">
                        <h4>Kesimpulan</h4>
                    </div>
                    <div class='mgs-normal' width='100%' style='margin-bottom:20px;'>
                    <?php

                        $sql3 = 'SELECT * FROM tbl_pelamar ORDER BY rangking_saw ASC limit 1';
                        $resultkopi = $dbx->query($sql3);

                        $html_table ='<table class="table table-hover table-bordered table-striped"><tr style=" box-shadow: 2px 2px 4px #888888">
                        ';

                        // Parse the result set, and adds each row and colums in HTML table
                        foreach ($resultkopi as $row) {
                          
                           $html_table .= '<tr><td><h3>Hasil Dari Penilaian Menggunakan Metode SAW  Bahwa Pelamar Yang Memiliki Nilai Tertinggi Adalah <b>' .$row['kode_pelamar']. '</b> Yaitu <b>' .$row['nama']. '</b> Dengan Nilai <b>' .$row['nilai_saw']. '</b></h3></td></tr>';

                        
                        }
                            $html_table .= '</table>';
                    
                        echo $html_table;        // display the HTML table

                        ?>

                        </div>
                </div>
                
            </section>

              

            
  
                               
                              


</div>
<?php
include_once 'footer.php';
?>