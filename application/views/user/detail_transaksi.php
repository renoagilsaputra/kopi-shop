<h1 class="text-light">Detail Transaksi</h1>
<div class="table-responsive">
    <table class="table table-hover bg-light">
        <tr>
            <th>Nama</th>
            <th>:</th>
            <td colspan="5"><?= ucfirst($user['nama']); ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <th>:</th>
            <td colspan="5"><?= ucfirst($user['gender']); ?></td>
        </tr>
        <tr>
            <th>Telp</th>
            <th>:</th>
            <td colspan="5"><?= ucfirst($user['telp']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <th>:</th>
            <td colspan="5"><?= ucfirst($user['email']); ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <th>:</th>
            <td colspan="5"><?= ucfirst($user['alamat']); ?></td>
        </tr>
        <tr>
            <th>#</th>
            
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Regional</th>
            <th>Biaya Pengiriman</th>
            <th>Subtotal</th>
            
        </tr>
        <?php
            $n = 1;
            $total = 0;
            foreach($detail as $dt):
            $total += $dt['subtotal'];
        ?>
        <tr>
            <td><?= $n++; ?></td>
            
            <td><?= $dt['nama_produk']; ?></td>
            <td>Rp <?= number_format($dt['harga'],0,',','.'); ?></td>
            <td><?= $dt['jml']; ?></td>
            <td><?= ucfirst($dt['regional']); ?></td>
            <td>Rp <?= number_format($dt['biaya'],0,',','.'); ?></td>
            <td>Rp <?= number_format($dt['subtotal'],0,',','.'); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="6">Total</th>
            <td>Rp <?= number_format($total, 0, ',','.'); ?></td>
        </tr>
        
    </table>
    
</div>