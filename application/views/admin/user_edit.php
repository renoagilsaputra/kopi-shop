<h1 class="mt-4">Edit User</h1>
<?= $this->session->flashdata('message'); ?>

<div class="row">
    <div class="col-lg-5">

        <form action="<?= base_url('admin/user_edit_act') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
            <input class="form-control mb-2" type="text" name="nama" placeholder="Nama" value="<?= $user['nama']; ?>">
            <select class="form-control mb-2" name="gender">
                        <option value="">Pilih Gender</option>
                        <?php foreach($gender as $gd) : ?>
                        <?php if($user['gender'] == $gd) : ?>

                            <option value="<?= $gd ?>" selected><?= ($gd == 'l') ? "Laki - laki" : "Perempuan"; ?></option>
                        <?php else: ?>
                            <option value="<?= $gd ?>"><?= ($gd == 'l') ? "Laki - laki" : "Perempuan"; ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        
                      
                    </select>
            <input class="form-control mb-2" type="text" name="email" placeholder="Email"
                value="<?= $user['email']; ?>">
            <input class="form-control mb-2" type="text" name="telp" placeholder="Telp" value="<?= $user['telp']; ?>">
            <input class="form-control mb-2" type="text" name="username" placeholder="Username"
                value="<?= $user['username']; ?>">

            <select class="form-control mb-2" name="role_id">
                <option value="">Pilih Role ID</option>
                <?php foreach($role_id as $rl) : ?>
                <?php if($user['role_id'] == $rl['id']) : ?>

                <option value="<?= $rl ['id']; ?>" selected><?= ucfirst($rl['role_id']); ?></option>
                <?php else: ?>
                <option value="<?= $rl ['id']; ?>"><?= ucfirst($rl['role_id']); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <select class="form-control mb-2" name="id_regional">
                <option value="">Pilih Regional</option>
                <?php foreach($regional as $rg) : ?>
                    <?php if($user['id_regional'] == $rg['id_regional']) : ?>
                        <option value="<?= $rg ['id_regional']; ?>" selected><?= ucfirst($rg['regional']); ?> |
                        <?= number_format($rg['biaya'], 0,',','.'); ?></option>
                    <?php else: ?>
                        <option value="<?= $rg ['id_regional']; ?>"><?= ucfirst($rg['regional']); ?> |
                        <?= number_format($rg['biaya'], 0,',','.'); ?></option>

                    <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <textarea name="alamat" class="form-control mb-2" placeholder="Alamat"><?= $user['alamat'] ?></textarea>


    </div>



</div>
<button type="submit" class="btn btn-info">Edit</button>

</form>
</div>