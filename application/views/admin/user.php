<h1 class="mt-4">User</h1>
<?= $this->session->flashdata('message'); ?>
<a href="" data-toggle="modal" data-target="#addModal" class="btn btn-success mb-2"><i class="fa fa-pencil"></i></a>
<div class="table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Telp</th>
                <th scope="col">Username</th>
                <th scope="col">Role ID</th>
                <th>Regional</th>
                <th>Alamat</th>
                <th scope="col"><i class="fa fa-cogs"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                foreach($user as $us) :
            ?>
           <tr>
                <td><?= $n++; ?></td>
                <td><?= $us['nama']; ?></td>
                <td><?= $us['gender']; ?></td>
                <td><?= $us['email']; ?></td>
                <td><?= $us['telp']; ?></td>
                <td><?= $us['username']; ?></td>
                <td>
                    <?php
                        foreach($role_id as $rr) {
                            if($us['role_id'] == $rr['id']) {
                                echo $rr['role_id'];
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php

                        foreach($regional as $re) {
                            if($us['id_regional'] == $re['id_regional']) {
                                echo $re['regional'];
                            }
                        }
                    ?>
                </td>
                <td><?= $us['alamat']; ?></td>
                <td>
                    <a onclick="return confirm('Yakin?')" href="<?= base_url('admin/user_del/').$us['id_user']; ?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="<?= base_url('admin/user_edit/').$us['id_user']; ?>" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= base_url('admin/changepassword/').$us['id_user']; ?>" class="btn btn-warning">
                        <i class="fa fa-lock"></i>
                    </a>
                </td>
           </tr>
            <?php endforeach; ?>
            <?php if(empty($user)) : ?>
                <tr>
                    <td colspan="7" align="center">Data tidak ditemukan!</td>
                </tr>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/user_add') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                
                    <input class="form-control mb-2" type="text" name="nama" placeholder="Nama">
                    <select class="form-control mb-2" name="gender">
                        <option value="">Pilih Gender</option>
                        
                        <option value="l">Laki - laki</option>
                        <option value="p">Perempuan</option>
                      
                    </select>
                    <input class="form-control mb-2" type="text" name="email" placeholder="Email">
                    <input class="form-control mb-2" type="text" name="telp" placeholder="Telp">
                    <input class="form-control mb-2" type="text" name="username" placeholder="Username">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                        <input class="form-control mb-2" type="password" name="password1" placeholder="Password">
                        </div>
                        <div class="col-lg-6">
                        <input class="form-control mb-2" type="password" name="password2" placeholder="Ulangi Password">
                        </div>
                    </div>
                    <select class="form-control mb-2" name="role_id">
                        <option value="">Pilih Role ID</option>
                        <?php foreach($role_id as $rl) : ?>
                        <option value="<?= $rl ['id']; ?>"><?= ucfirst($rl['role_id']); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select class="form-control mb-2" name="id_regional">
                        <option value="">Pilih Regional</option>
                        <?php foreach($regional as $rg) : ?>
                        <option value="<?= $rg ['id_regional']; ?>"><?= ucfirst($rg['regional']); ?> | <?= number_format($rg['biaya'], 0,',','.'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>