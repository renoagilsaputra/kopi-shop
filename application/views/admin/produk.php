<h1 class="mt-4">Produk</h1>
<?= $this->session->flashdata('message'); ?>
<a href="" data-toggle="modal" data-target="#addModal" class="btn btn-success mb-2"><i class="fa fa-pencil"></i></a>
<div class="table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID_Produk</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Berat</th>
                <th scope="col">Harga</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar</th>
                <th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $n = 1;
                foreach($produk as $pr) : ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $pr ['id_produk']; ?></td>
                <td><?= $pr ['nama_produk']; ?></td>
                <td><?= $pr ['kategori']; ?></td>
                <td><?= $pr ['berat']; ?></td>
                <td><?= $pr ['harga']; ?></td>
                <td><?= $pr ['keterangan']; ?></td>
                <td><?= $pr ['stok']; ?></td>
                <td>
                    <img width="100px" height="100px" src="<?= base_url('assets/gambar/uploaded/').$pr ['gambar']; ?>" alt="">
                </td>
                <td class="text-center">
                    <div class="btn-group">
                    
                    <a onclick="return confirm('Yakin?')" href="<?= base_url('admin/produk_del/').$pr['id_produk']; ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="<?= base_url('admin/produk_edit/').$pr['id_produk']; ?>" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($produk)) : ?>
            <td colspan="10" class="text-center">Data tidak ditemukan</td>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/produk_add') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                
                    <input class="form-control mb-2" type="text" name="nama_produk" placeholder="Nama Produk">

                    <select class="form-control mb-2" name="kategori">
                        <option value="">Pilih Kategori</option>
                        <?php foreach($kategori as $kt) : ?>
                        <option value="<?= $kt ['kategori'] ?>"><?= ucfirst($kt['kategori']); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input class="form-control" type="number" name="berat" placeholder="Berat">
                    <small class="text-danger mb-2">*) berat dalam gram</small>
                    <input class="form-control mb-2" type="number" name="harga" placeholder="Harga">
                    
                    <textarea class="form-control mb-2" name="keterangan" placeholder="Keterangan"></textarea>
                    <input class="form-control mb-2" type="number" name="stok" placeholder="Stok">
                    <label>Pilih Gambar</label>
                    <input class="form-control mb-2" type="file" name="gambar">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>