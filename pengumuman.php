<?php 
include 'header.php';
?>
<br>
<br>
<br>
<br>
<div class="container">


	
		<br>
		<br>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="card" style="background-color: #fff; padding: 30px; margin: 30px;">
		  	<div class="card-header">
			  <h4 align="center">Hasil Penerimaan Karyawan</h4>
			</div>
			<div class="card-body">
				<?php
                           

                            $sql5 = 'SELECT * FROM tbl_pelamar ORDER BY rangking_saw ASC';
                            $resultfinal = $dbx->query($sql5);

                            $html_table = '<table class="table table-bordered">
                            <tr style=" box-shadow: 2px 2px 4px #fff">
                            <th style=text-align:center>Kode</th>
                            <th style=text-align:center>Nama</th>
                            <th style=text-align:center>Nilai</th>
                            <th style=text-align:center>Rangking</th></tr>';

                            // Parse the result set, and adds each baris and colums in HTML table
                            foreach ($resultfinal as $row) {
                              
                               $html_table .= '<tr><td style=text-align:center>' .$row['kode_pelamar']. '</td><td style=text-align:center>' .$row['nama']. '</td><td style=text-align:center>' .$row['nilai_saw']. '</td><td style=text-align:center>' .$row['rangking_saw']. '</td></tr>';

                            
                            }
                                $html_table .= '</table>';
                        
                            echo $html_table;        // display the HTML table
                        ?>
			</div>
		</div>
	</div>
</div>
	
<?php 
include'footer.php';
?>




	
