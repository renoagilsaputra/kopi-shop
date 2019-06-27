<?php
     $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
     $pdf->SetTitle('Laporan Transaksi');
     $pdf->SetHeaderMargin(30);
     $pdf->SetTopMargin(20);
     $pdf->setFooterMargin(20);
     $pdf->SetAutoPageBreak(true);
     $pdf->SetAuthor('Author');
     $pdf->SetDisplayMode('real', 'default');
     $pdf->AddPage();
     $i=0;
     $date = date('d-m-Y');
     $html='<h3>Laporan transaksi</h3>
            <p>Dicetak tanggal : '.$date.'</p>
             <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                 <tr bgcolor="#ffffff">
                     <th width="5%" align="center">No</th>
                     <th width="10%" align="center">Nama</th>
                     <th width="10%" align="center">Produk</th>
                     <th width="15%" align="center">Harga</th>
                     <th width="5%" align="center">Jml</th>
                     <th width="15%" align="center">Regional</th>
                     <th width="15%" align="center">Biaya</th>
                     <th width="15%" align="center">Subtotal</th>
                     <th width="10%" align="center">Status</th>
                 </tr>';
     foreach ($transaksi as $row) 
         {
             $i++;
             $html.='<tr bgcolor="#ffffff">
                     <td align="center">'.$i.'</td>
                     <td>'.$row['nama'].'</td>
                     <td>'.$row['nama_produk'].'</td>
                     <td>Rp '.number_format($row['harga'],0,',','.').'</td>
                     <td>'.$row['jml'].'</td>
                     <td>'.$row['regional'].'</td>
                     <td>Rp '.number_format($row['biaya'],0,',','.').'</td>
                     <td>Rp '.number_format($row['subtotal'],0,',','.').'</td>
                     <td>'.$row['status'].'</td>

                    
                 </tr>';
         }
     $html.='</table>';
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('report.pdf', 'I');
?>