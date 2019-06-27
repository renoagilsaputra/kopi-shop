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
     
     $date = date('d-m-Y');
     $n = 1;
    $total = 0;
     $html='<h3>Detail transaksi</h3>
     <table>
     <tr>
         <th width="15%">Nama</th>
         <th width="5%">:</th>
         <td width="80%">'.ucfirst($user['nama']).'</td>
     </tr>
     <tr>
         <th>Gender</th>
         <th>:</th>
         <td colspan="3">'.ucfirst($user['gender']).'</td>
     </tr>
     <tr>
         <th>Telp</th>
         <th>:</th>
         <td colspan="3">'.ucfirst($user['telp']).'</td>
     </tr>
     <tr>
         <th>Email</th>
         <th>:</th>
         <td colspan="3">'.$user['email'].'</td>
     </tr>
     <tr>
         <th>Alamat</th>
         <th>:</th>
         <td colspan="3">'.ucfirst($user['alamat']).'</td>
     </tr>
     </table><br><br>';
    $html.= '
        <table border="1px" cellspacing="1" bgcolor="#ffffff" cellpadding="1">
            <tr>
                <th align="center">#</th>
                <th align="center">Produk</th>
                <th align="center">Harga</th>
                <th align="center">Jumlah</th>
                <th align="center">Regional</th>
                <th align="center">Biaya Pengiriman</th>
                <th align="center">Subtotal</th>
            </tr>
    ';
    foreach($detail as $dt) {
        $total += $dt['subtotal'];
        $html.='
            <tr>
                <td align="center">'.$n++.'</td>  
                <td align="center">'.$dt['nama_produk'].'</td>
                <td align="center">Rp '.number_format($dt['harga'],0,',','.').'</td>
                <td align="center">'.$dt['jml'].'</td>
                <td align="center">'.ucfirst($dt['regional']).'</td>
                <td align="center">Rp '.number_format($dt['biaya'],0,',','.').'</td>
                <td align="center">Rp '.number_format($dt['subtotal'],0,',','.').'</td>
            </tr>
        ';
    }
    $html.= '
        <tr>
            <th align="right" colspan="6">Total</th>
            <td align="center">Rp '.number_format($total,0,',','.').'</td>
        </tr>
    ';
    $html.= '</table>';
    
    
     $pdf->writeHTML($html, true, false, true, false, '');
     $pdf->Output('cetak_detail.pdf', 'I');
?>