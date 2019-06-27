<h1 class="text-light">Info User</h1>
<?= $this->session->flashdata('message'); ?>
<div class="mb-4">
<a href="<?= base_url('user/user_edit/').$info['id_user']; ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
<a href="<?= base_url('user/changepassword/').$info['id_user']; ?>" class="btn btn-warning"><i class="fa fa-lock"></i> Ganti Password</a>

</div>
<div class="table-responsive">
    <table class="table table-hover bg-light">
        <tr>
            <th>Nama Lengkap</th>
            <th>:</th>
            <td><?= ucfirst($info['nama']); ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <th>:</th>
            <td><?= $info['username']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <th>:</th>
            <td><?= ucfirst($info['gender']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <th>:</th>
            <td><?= $info['email']; ?></td>
        </tr>
        <tr>
            <th>Telp</th>
            <th>:</th>
            <td><?= $info['telp']; ?></td>
        </tr>
        <tr>
            <th>Regional</th>
            <th>:</th>
            <td><?= ucfirst($info['regional']); ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <th>:</th>
            <td><?= $info['alamat']; ?></td>
        </tr>
    </table>
</div>