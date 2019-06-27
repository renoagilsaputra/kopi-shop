<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>LOGIN - Official Website Kopine Bapake</title>
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/') ?>kopi2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link
    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/') ?>kopi2/css/business-casual.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/'); ?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">
  <style>
    .lik:hover {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <a class="lik" href="<?= base_url(); ?>">
  
  <div class="mt-5">

    <h2 class="text-center text-primary text-uppercase font-weight-bold">Kopi Racikan Bapak</h2>
    <h1 style="font-size: 80px" class="text-center text-uppercase font-weight-light text-light">Kopine Bapake</h1>
  </div>
  </a>
  
  <div class="col-lg-4 col-md-8 mx-auto mt-5">

    <div class="card">
      <div class="card-header">
        <h1 class="text-center">Login</h1>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="" method="post">

          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username"
              aria-describedby="basic-addon1" value="<?= set_value('username') ?>">
          </div>

          <?= form_error('username','<small class="text-danger">','</small>') ?>

          <div class="input-group mb-2 mt-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-lock"></i>
              </span>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Username"
              aria-describedby="basic-addon1">
          </div>

          <?= form_error('password','<small class="text-danger">','</small>') ?>

          <div class="text-center">

            <button class="btn btn-secondary btn-lg" type="submit"><i class="fa fa-sign-in"></i> Login</button>
          </div>

        </form>

      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="assets/kopi2/vendor/jquery/jquery.min.js"></script>
  <script src="assets/kopi2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>