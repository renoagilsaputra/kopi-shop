<h1 class="mt-4">Transaksi</h1>
<?= $this->session->flashdata('message'); ?>

<?php if(!empty($invoices)) : ?>
    <a href="" data-toggle="modal" data-target="#addModal" class="btn btn-dark mb-2"><i class="fa fa-print"></i></a>
<?php endif; ?>
<div class="table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Invoices</th>
                <th scope="col">Date</th>
                <th scope="col">Du Date</th>
                
                <th>Status</th>
                <th scope="col"><i class="fa fa-cogs"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                foreach($invoices as $in) :
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $in['id']; ?></td>
                <td><?= $in['date']; ?></td>
                <td><?= $in['du_date']; ?></td>
                
                <td>
                <?php if($in['status'] == "paid") : ?>
                    
                <small class="badge badge-success">    
                    <?= $in['status']; ?>
                </small>
                    <?php else : ?>

                    <small class="badge badge-secondary">    
                    <?= $in['status']; ?>
                </small>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($in['status'] == "paid") : ?>
                    <a href="<?= base_url('admin/transaksi_del/').$in['id']; ?>" onclick="return confirm('Yakin?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <?php else : ?>

                    <a href="<?= base_url('admin/paid/').$in['id']; ?>" onclick="return confirm('Yakin?')" class="btn btn-warning"><i class="fa fa-money"></i> Paid</a>
                    <?php endif; ?>
                    <a href="<?= base_url('admin/transaksi_detail/').$in['id'].'/'.$in['id_user']; ?>" class="btn btn-info"><i class="fa fa-search"></i></a>
                    <a href="<?= base_url('admin/cetak_detail/').$in['id'].'/'.$in['id_user']; ?>" class="btn btn-dark"><i class="fa fa-print"></i></a>
                </td>
            </tr>
                <?php endforeach; ?>
                <?php if(empty($invoices)) : ?>
                    <tr>
                        <td colspan="6" align="center">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
        </tbody>
    </table>


    <!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/cetak') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                

                    <select class="form-control mb-2" name="waktu">
                        <option value="">Pilih Waktu</option>
                        <?php foreach($invoices as $iv) : ?>
                        <option value="<?= $iv['date']; ?>"><?= $iv['date']; ?></option>
                        <?php endforeach; ?>
                    </select>
                 
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success">Cetak</button>
            </div>
            </form>
        </div>
    </div>
</div>