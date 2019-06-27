<h1 class="text-light">Transaksi</h1>
<?= $this->session->flashdata('message'); ?>
<div class="table-responsive">
    <table class="table table-hover bg-light">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Status</th>
            <th><i class="fa fa-cog"></i></th>
        </tr>
        <?php
            $n = 1;
            foreach($transaksi as $tr):
        ?>
        <tr>
            <td><?= $n++; ?></td>
            <td><?= $tr['id']; ?></td>
            <td><?= $tr['tgl'].'-'.$tr['bln'].'-'.$tr['thn']; ?></td>
            <td><?= $tr['waktu']; ?></td>
            <td>
            <?php if($tr['status'] == "paid") : ?>
                    
                    <small class="badge badge-success">    
                        <?= "Sudah Bayar" ?>
                    </small>
            <?php else : ?>
    
                        <small class="badge badge-secondary">    
                        <?= "Belum Bayar"; ?>
                    </small>
            <?php endif; ?>
            </td>
            <td>
            <?php if($tr['status'] == "paid") : ?>
                    
                <a href="<?= base_url('user/detail_transaksi/'.$tr['id']); ?>" class="btn btn-info"><i class="fa fa-search"></i></a>
                <a onclick="return confirm('Yakin?')" href="<?= base_url('user/hapus_transaksi/'.$tr['id']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    
            <?php else : ?>
            <a href="<?= base_url('user/detail_transaksi/'.$tr['id']); ?>" class="btn btn-info"><i class="fa fa-search"></i></a>
                     
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
</div>