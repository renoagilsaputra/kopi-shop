<h1 class="mt-4 text-light">Change Password</h1>

<?= $this->session->flashdata('message'); ?>

<div class="row">
    <div class="col-lg-5">
    
<form action="" method="post">
    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
    <input class="form-control mb-2 mt-3" type="password" name="password_lama" placeholder="Password Lama">
    <?= form_error('password_lama', '<small class="text-light pl-1">','</small>'); ?>
    <input class="form-control mb-2 mt-3" type="password" name="password1" placeholder="Password Baru">
    <?= form_error('password1', '<small class="text-light pl-1">','</small>') ?>
    <input class="form-control mb-2 mt-3" type="password" name="password2" placeholder="Ulangi Password Baru">
    <?= form_error('password2', '<small class="text-light pl-1">','</small>') ?>
   

    </div>


    
    </div>
    <button type="submit" class="btn btn-info mt-4">Edit</button>

</form>
</div>
