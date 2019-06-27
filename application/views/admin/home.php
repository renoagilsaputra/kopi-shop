<h1 class="mt-4 mb-5">Selamat datang <?= ucfirst($this->session->userdata('username')); ?></h1>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-danger" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="text-center text-light"> <i class="fa fa-glass"></i> Produk</h5>
                </div>
                <div class="card-body">

                    <p class="card-text text-center text-light"><?= $produk; ?></p>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-warning" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="text-center"> <i class="fa fa-pencil"></i> Transaksi</h5>
                </div>
                <div class="card-body">

                    <p class="card-text text-center"><?= $transaksi; ?></p>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-primary" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="text-center"> <i class="fa fa-users"></i> User</h5>
                </div>
                <div class="card-body">

                    <p class="card-text text-center"><?= $user; ?></p>

                </div>
            </div>
        </div>
    </div>
</div>