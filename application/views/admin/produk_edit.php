<h1 class="mt-4">Edit Produk</h1>
<form action="<?= base_url('admin/produk_edit_act') ?>" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-5">

        
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
            <input class="form-control mb-2" type="text" name="nama_produk" placeholder="Nama Produk" value="<?= $produk['nama_produk']; ?>">

            <select class="form-control mb-2" name="kategori">
                <option value="">Pilih Kategori</option>
                <?php foreach($kategori as $kt) : ?>
                    <?php if($kt['kategori'] == $produk['kategori']) : ?>
                        <option value="<?= $kt ['kategori'] ?>" selected><?= ucfirst($kt['kategori']); ?></option>
                    <?php else : ?>
                        <option value="<?= $kt ['kategori'] ?>"><?= ucfirst($kt['kategori']); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <input class="form-control mb-2" type="number" name="berat" placeholder="Berat" value="<?= $produk['berat']; ?>">
            <label>*) berat dalam gram</label>
            <input class="form-control mb-2" type="number" name="harga" placeholder="Harga" value="<?= $produk['harga']; ?>">

            <textarea class="form-control mb-2" name="keterangan" placeholder="Keterangan"><?= $produk['keterangan']; ?></textarea>
            <input class="form-control mb-2" type="number" name="stok" placeholder="Stok" value="<?= $produk['stok']; ?>">
            <label>Pilih Gambar</label>
            <input class="form-control mb-2" type="file" name="gambar">

    </div>


  
</div>

<button type="submit" class="btn btn-info mt-2">Edit</button>
</form>
</div>