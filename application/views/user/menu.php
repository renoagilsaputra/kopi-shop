<h1 class="text-light">Menu</h1>
<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-lg-8"></div>
    <div class="col-lg-4">
        <div class="container-fluid">

            <form action="" name="search" method="post" class="form-inline">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>


<div class="row mt-4">

    <?php foreach($produk as $pr) : ?>
    <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
            <img height="200px" class="card-img-top" src="<?= base_url('assets/gambar/uploaded/').$pr['gambar']; ?>"
                alt="Card image cap">
            <div class="card-body">

                <div class="text-center">
                    <h5 class="card-title"><?= $pr['nama_produk']; ?></h5>
                    <p class="card-text"><?= ucfirst    ($pr['kategori']); ?></p>
                    <p class="card-text">Rp <?= number_format($pr['harga'],0,',','.'); ?></p>

                    <a href="<?= base_url('user/add_cart/').$pr['id_produk']; ?>" class="btn btn-primary"><i
                            class="fa fa-shopping-cart"></i></a>
                    <a href="" data-toggle="modal" data-target="#myModal<?= $pr['id_produk']; ?>"
                        class="btn btn-info"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php if(empty($produk)) :?>
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <h4 class="text-light">Data tidak ditemukan!</h4>

    </div>
    <div class="col-lg-4"></div>
    <?php endif; ?>
</div>

<?php foreach($produk as $pd) : ?>
<div class="modal fade" id="myModal<?= $pd['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?= $pd['nama_produk']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <form role="form" action="<?= base_url('register') ?>" method="POST">
                <div class="modal-body">
                    <img src="<?= base_url('assets/gambar/uploaded/').$pd['gambar']; ?>" alt="" class="img-thumbnail">


                    <table class="mt-3">
                        <tr>
                            <th>Jenis</th>
                            <th>:</th>
                            <td><?= $pd['kategori']; ?></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <th>:</th>
                            <td><?= $pd['stok']; ?></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>:</th>
                            <td>Rp <?= number_format($pd['harga'],0,',','.'); ?></td>
                        </tr>

                    </table>
                    <p class="font-weight-bold">Keterangan</p>
                    <p><?= $pd['keterangan']; ?></p>

                </div>
                <div class="modal-footer">


                    <a href="<?= base_url('user/add_cart/').$pd['id_produk']; ?>" class="btn btn-warning"><i
                            class="fa fa-shopping-cart"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>