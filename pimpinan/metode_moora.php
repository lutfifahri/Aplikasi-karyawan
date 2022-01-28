<?php include 'header.php'; 
error_reporting(0);
?>
<br>
<br>
<br>
<br>
    <div class="container">


<?php

    $sql = 'SELECT * from tbl_kriteria';
                    $result = $dbx->query($sql);
                    $kriteria=array();
                    
                    foreach ($result as $row) {
                        $kriteria[$row['kode_kriteria']]=array($row['nama_kriteria'],$row['bobot_kriteria'],$row['tipe_kriteria']);
                        $bobotpersen[$row['kode_kriteria']]=$row['bobot_kriteria'];
                        $bencost[$row['kode_kriteria']]=$row['tipe_kriteria'];

                    }
                                
                    $sql = 'SELECT * from tbl_penilaian a JOIN tbl_pelamar b USING(kode_pelamar) ORDER BY a.kode_pelamar,a.kode_kriteria';
                    $result = $dbx->query($sql);
                
                    $nilai=array();
                    
                    foreach ($result as $row) {
                     
                         if (!isset($nilai[$row['kode_pelamar']])) {
                            $nilai[$row['kode_pelamar']] = array();
                        }
                        $nilai[$row['kode_pelamar']][$row['kode_kriteria']] = $row['bobot_penilaian'];
                    }

                                
                    $kuadrat=array();
                    $total=array();
                
                    foreach ($nilai as $kode_pelamar=>$data) {
                    
                        $kuadrat[$kode_pelamar] = array();
                        //-- lakukan iterasi untuk menghitung gap dari setiap faktor yang ada
                        //$total=array();
                        foreach ($kriteria as $kode_kriteria=>$value) {
                        
                            $kuadrat[$kode_pelamar][$kode_kriteria] = $data[$kode_kriteria]*$data[$kode_kriteria];
                            
                             $total[$kode_kriteria]=$total[$kode_kriteria]+$kuadrat[$kode_pelamar][$kode_kriteria];
                           
                            
                            
                           
                            
                        }


                    }

                            
                    $normalisasi=array();
                
                    foreach ($nilai as $kode_pelamar=>$data) {
                        $putar=0;
                    
                        $normalisasi[$kode_pelamar] = array();
                     
                        foreach ($kriteria as $kode_kriteria=>$value) {
                        
                            $normalisasi[$kode_pelamar][$kode_kriteria] = $data[$kode_kriteria]/sqrt($total[$kode_kriteria]);
                            
                    
                        }
                        
                    }

                    $terbobot=array();
                    foreach ($normalisasi as $kode_pelamar=>$data) {
                        $putar=0;
                    
                        $terbobot[$kode_pelamar] = array();
                
                        foreach ($kriteria as $kode_kriteria=>$value) {
                        
                            $terbobot[$kode_pelamar][$kode_kriteria] = $data[$kode_kriteria]*$bobotpersen[$kode_kriteria]/100;
                            
    
                        }
                        
                    }

                    $optimasib=$optimasic=array();
                    foreach ($terbobot as $kode_pelamar=>$data) {
                        $putar=0;
                        //-- inisialisai variabel $gap[$id_alternatif]
                        $optimasib[$kode_pelamar] = array();
                        $optimasic[$kode_pelamar] = array();
                        //-- lakukan iterasi untuk menghitung gap dari setiap faktor yang ada
                        //$optimasib[$no_customer]=0;
                        //$optimasic[$no_customer]=0;
                        $totalb=$totalc=0;
                        foreach ($kriteria as $kode_kriteria=>$value) {
                            if ($bencost[$kode_kriteria]=="Benefit"){
                                $totalb = $totalb+$data[$kode_kriteria];
                            }else{
                                $totalc = $totalc+$data[$kode_kriteria];
                            }
                            

                         
                            $optimasib[$kode_pelamar]=$totalb;
                            $optimasic[$kode_pelamar]=$totalc;
                            $totalakhir[$kode_pelamar]=$totalb-$totalc;
                        $ubah = mysql_query("Update tbl_pelamar set optimasi_b='$totalb', optimasi_c='$totalc', nilai_moora='$totalakhir[$kode_pelamar]' where kode_pelamar='$kode_pelamar'");
                        }
                        
                    }


                $sql = 'SELECT * from tbl_pelamar order by nilai_moora DESC';
                    $pelamar = $dbx->query($sql);
            
                    $datapelamar=array();

                    foreach ($pelamar as $row) {
                        $datapelamar[$row['kode_pelamar']]=array($row['nama'],$row['nilai_moora'],$row['rangking_moora']);

                    }
                                    
           ?>
                   
        
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
                    <h4>Nilai Kuadrat</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                                        
                            <?php
                            $kuadrat2 = array();
                            
                             for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                
                                for ($kolom = 0; $kolom <= $banyakkriteria; $kolom++){
                                    if ($kolom == 0){
                                        $kuadrat2[$baris][$kolom] = $nilai2[$baris][$kolom];
                                    }else{
                                        $kuadrat2[$baris][$kolom] = pow($nilai2[$baris][$kolom],2);
                                    }   
                                    
                                }
                               
                            }
            
                            $html_table = '<table class="table table-hover table-bordered table-striped">
                                <tr style=" box-shadow: 2px 2px 4px #888888">
                                <th>Kode</th>';


                                foreach ($resultk as $row) {
                                    //echo $row['kode_kriteria'];
                                    $html_table.= '<th>'.$row['nama_kriteria'].'</th>';
                                }
                                $html_table .= '</tr><tr>';
                                for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                    $html_table.= '<td>'.$kuadrat2[$baris][0].'</td>';
                                    for ($kolom = 1; $kolom <= $banyakkriteria; $kolom++){
                                                                            
                                        $html_table .= '<td style=text-align:center>'.$kuadrat2[$baris][$kolom]. '</td>';
                                        
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
                    <h4>Nilai Total Kriteria</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                        <?php
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                        <tr style=" box-shadow: 2px 2px 4px #888888">
                                            
                                            <th>Kode</th>
                                            <th>Total Kriteria</th>
                                        </tr>';
                                        foreach ($total as $key => $value) {
                                            $html_table .= '<tr><td align=center>' .$key. '</td><td align=center>' .$value. '</td></tr>';
                                        }
                                        

                                        $html_table .= '</table>';           // ends the HTML table

                                        echo $html_table;
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
                                                $html_table.= '<td>'.$kuadrat2[$baris][0].'</td>';
                                                for ($kolom = 1; $kolom <= $banyakkriteria; $kolom++){
                                                    
                                                    $normalisasi2[$baris][$kolom] = number_format($nilai2[$baris][$kolom] / (sqrt($total[$kolom])),3);  
                                                    $matbobot[$baris][$kolom]= number_format($normalisasi2[$baris][$kolom] * ($bobotpersen[$kolom] / 100),3);
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
                                            for ($baris = 1;$baris <= $banyakbaris; $baris++){
                                                $html_table.= '<td>'.$kuadrat2[$baris][0].'</td>';
                                                for ($kolom = 1; $kolom <= $banyakkriteria; $kolom++){
                                                                                                    
                                                    $html_table .= '<td style=text-align:center>'.$matbobot[$baris][$kolom]. '</td>';
                                                    
                                                }
                                                $html_table .= '</tr>';
                                               
                                            }
                                            $html_table .= '</table>';
                                        echo $html_table; 

                                    
                                        $terbobot=array();
                                        
                                        foreach ($normalisasi as $kode_pelamar=>$data) {
                                            $html_table .= '';
                                            //-- inisialisai variabel $gap[$id_alternatif]
                                            //-- inisialisai variabel $gap[$id_alternatif]
                                            $terbobot[$kode_pelamar] = array();
                                            //-- lakukan iterasi untuk menghitung gap dari setiap faktor yang ada
                                            
                                            foreach ($kriteria as $kode_kriteria=>$value) {
                                            
                                                $terbobot[$kode_pelamar][$kode_kriteria] = $data[$kode_kriteria]*$bobotpersen[$kode_kriteria]/100;
                                                
                                             
                                                
                                            }
                                            
                                        }
                                

                                        $optimasib=$optimasic=array();
                                        
                                        foreach ($terbobot as $kode_pelamar=>$data) {
                                            
                                            //-- inisialisai variabel $gap[$id_alternatif]
                                            $optimasib[$kode_pelamar] = array();
                                            $optimasic[$kode_pelamar] = array();
                                            //-- lakukan iterasi untuk menghitung gap dari setiap faktor yang ada
                                            //$optimasib[$no_customer]=0;
                                            //$optimasic[$no_customer]=0;
                                            $totalb=$totalc=0;
                                            foreach ($kriteria as $kode_kriteria=>$value) {
                                                if ($bencost[$kode_kriteria]=="Benefit"){
                                                    $totalb = $totalb+$data[$kode_kriteria];
                                                }else{
                                                    $totalc = $totalc+$data[$kode_kriteria];
                                                }
                                                
                                                
                                               // echo $data[$id_kriteria]." / ".sqrt($total[$id_kriteria]); echo "<br>";
                                             
                                                
                                            }
                                            $optimasib[$kode_pelamar]=$totalb;
                                                $optimasic[$kode_pelamar]=$totalc;
                                                $totalakhir[$kode_pelamar]=$totalb-$totalc;
                                                $ubah = mysql_query("Update tbl_pelamar set  nilai_moora='$totalakhir[$kode_pelamar]' where kode_pelamar='$kode_pelamar'");
                                            
                                        }
                                ?>
                        </div>
                        </div>
                        </div>




                <div class='card'>
                    <div class="col-md-6 text-left">
                    <h4>Perangkingan</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                        <?php
                                        $html_table = '<table class="table table-hover table-bordered table-striped">
                                        <tr style=box-shadow: 2px 2px 4px #888888;>
                                            <th style=text-align:center>Kode</th>
                                            <th style=text-align:center>Nama Lengkap</th>
                                            <th style=text-align:center> Nilai MOORA</th>
                                            <th style=text-align:center> Rangking MOORA</th>

                                        </tr>';
                                       
                                        $sql4 = 'SELECT * FROM tbl_pelamar ORDER BY nilai_moora DESC';
                                        $resultrank = $dbx->query($sql4);
                                        $ranks=0;
                                        $temps = 0;
                                        foreach ($resultrank as $baris) {
                                        
                                   
                                            if ($temps == $baris['nilai_moora']){

                                            }else{
                                                $ranks++;
                                            }
                                            $temps = $baris['nilai_moora'];

                                            $ubah = mysql_query("Update tbl_pelamar set rangking_moora ='$ranks' where kode_pelamar='$baris[kode_pelamar]'");

                                        }
                                        
                                        $sql5 = 'SELECT * FROM tbl_pelamar ORDER BY rangking_moora ASC';
                                        $resultfinal = $dbx->query($sql5);
                                        foreach ($resultfinal as $row) {
                              
                                           $html_table .= '<tr><td align=center>' .$row['kode_pelamar']. '</td><td align=center>' .$row['nama']. '</td><td align=center>' .number_format($row['nilai_moora'],3). '</td><td align=center>' .$row['rangking_moora']. '</td></tr>';

                                        
                                        }
                                        $html_table .= '</table>';           // ends the HTML table
                                        echo $html_table;  
                                ?>
                        </div>
                        </div>
                        </div>




                
                <div class='card'>
                    <div class="col-md-6 text-left">
                    <h4>Kesimpulan</h4>
                    </div>
                    <div class='card-body'>
                        <div class='row'>   
                            <?php
                                        $html_table = '<table class="table table-hover table-bordered table-striped"><tr style=" box-shadow: 2px 2px 4px #888888">
                                        ';
                                        $kueriakhir=mysql_query("select * from tbl_pelamar order by nilai_moora desc limit 1");
                                        $rank = 1;
                                        while ($dataakhir=mysql_fetch_array($kueriakhir)){
                                            $html_table .= '<tr><td align=justify><h3> Berdasarkan Perhitungan Metode MOORA Maka Didapat Kode : <b>'.$dataakhir['kode_pelamar'].' </b>Dengan Nama : <b>'.$dataakhir['nama'].'</b> Adalah Pelamar Terbaik Dengan Nilai : <b>'.$dataakhir['nilai_moora'].'</b></h3></td></tr>';
                                            
                                        }
                                                 // ends the HTML table
                                        echo $html_table; 

                               ?>
                        </div>
                        </div>
                        </div>
                
            </section>

              

            
  
                               
                              


</div>
<?php
include_once 'footer.php';
?>