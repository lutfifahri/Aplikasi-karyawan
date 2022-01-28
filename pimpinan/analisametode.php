<?php include 'header.php'; ?>
<br>
<br>
<br>
<br>
    <div class="container">
      
        
    <section class='col-lg-12 connectedSortable'>
        <div class="col-md-12 text-center">
            <div class='card' style=" padding: 20px; background-color: #fff;">
                <div class='card-header>'>
                    <h3>Data Kriteria</h3>
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
                                    $html_table = '<table class="table table-bordered">
                                    <tr style=" box-shadow: 2px 2px 4px #fff">
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Tipe</th></tr>';

                                    // Parse the result set, and adds each row and colums in HTML table
                                    foreach ($resultk as $row) {
                                       $kriteria[$row['kode_kriteria']]=array($row['nama_kriteria'],$row['bobot_kriteria'],$row['tipe_kriteria']);

                                       $html_table .= '<tr><td>' .$row['kode_kriteria']. '</td><td>' .$row['nama_kriteria']. '</td><td>' .$row['bobot_kriteria']. '</td><td>' .$row['tipe_kriteria']. '</td></tr>';
                                       $bobotpersen[$row['kode_kriteria']]=$row['bobot_kriteria'];
                                       $bencost[$row['kode_kriteria']]=$row['tipe_kriteria'];
                                    
                                    }
                                    $html_table .= '</table>';           // ends the HTML table

                                echo $html_table;        // display the HTML table

                            ?>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-12"> <div class='card' style="margin-top: 20px"></div></div>
        <div class="col-md-12 text-center">
            <div class='card' style=" padding: 20px; background-color: #fff;">
                <div class='card-header>'>
                    <h3>Data Penilaian</h3>
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
                        

                        $html_table = '<table class="table table-bordered">
                            <tr style=" box-shadow: 2px 2px 4px #fff">
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
        </div>
    <div class="col-lg-12"><br>
        <div class="col-md-6 text-center">
            <div class='card' style=" padding: 20px; background-color: #fff;">
                <div class='card-header'>
                    <h3>Penerapan Metode SAW</h3>
                </div>
                <div class='card-body'>
                    <div class='row'>
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

                            $html_table = '<table class="table table-bordered">
                            <tr style=" box-shadow: 2px 2px 4px #fff">
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
            </div>
        </div>

        <div class="col-md-6 text-center">
            <div class='card' style=" padding: 20px; background-color: #fff;">
                <div class='card-header'>
                    <h3>Penerapan Metode MOORA</h3>
                </div>
                <div class='card-body'>
                    <div class='row'>   
                        <?php
                                        $html_table = '<table class="table table-bordered">
                                        <tr style=box-shadow: 2px 2px 4px #fff;>
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
        </div>
      </div>    
        <div class="col-md-12"> <div class='card' style="margin-top: 20px"></div></div>
      <div class="col-md-12 text-center">
            <div class='card' style=" padding: 20px; background-color: #fff;">
                <div class='card-header>'>
                    <h3>Kesimpulan</h3>
                </div>
                <div class='card-body'>
                    <h4>Berdasarkan perbandingan kedua metode Hasil perangkingan dari kedua metode hampir sama untuk rangking teratas dimana Nurjanah dan Aisyah berada dirangking 1 dan 2 yang membedakan adalah pada rangking dibawahnya. Kesimpulan dari perbandingan ini kedua metode dapat digunakan untuk melakukan perangkingan karyawan yang layak diterima di perusahaan</h4>
                </div>          
            </div>
        </div>  
    </section>
</div> 

<?php
include_once 'footer.php';
?>