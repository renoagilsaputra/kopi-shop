<h1 class="text-light"><i class="fa fa-shopping-cart"></i> Shopping Cart</h1>
<div class="table-responsive">
    <table class="table table-hover bg-light">
        <tr>
            <th>#</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <?php 
            $no = 1;
            foreach($this->cart->contents() as $items) : 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $items['name']; ?></td>
            <td><?= $items['qty']; ?></td>
            <td>Rp <?= number_format($items['price'],0,',','.'); ?></td>
            <td>Rp <?= number_format($items['subtotal'],0,',','.'); ?></td>
            
        </tr>
        <?php endforeach; ?>
        <tr>
            <th class="text-right" colspan="4">Total : </th>
            <td>
                Rp <?= number_format($this->cart->total(),0,',','.'); ?>
            </td>
        </tr>
    </table>
    <div class="text-center">
        <a onclick="return confirm('Yakin?')" href="<?= base_url('user/clear_cart'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Cart</a>
        <a href="<?= base_url('user/menu'); ?>" class="btn btn-info"><i class="fa fa-glass"></i> Kembali Belanja</a>
        <a href="<?= base_url('user/order'); ?>" class="btn btn-success"><i class="fa fa-check"></i> Check Out </a>
    </div>
</div>