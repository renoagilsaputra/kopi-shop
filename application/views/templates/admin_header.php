<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/sb/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/vendor/sb/') ?>css/simple-sidebar.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/'); ?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> <i class="fa fa-code"></i> Admin </div>
      <div class="list-group list-group-flush">
        <a href="<?= base_url('admin') ?>" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-dashboard"></i> Dashboard</a>
        <a href="<?= base_url('admin/produk') ?>" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-glass"></i> Produk</a>
        <a href="<?= base_url('admin/transaksi') ?>" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-pencil"></i> Transaksi</a>
        <a href="<?= base_url('admin/user') ?>" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-users"></i> User</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-outline-secondary" id="menu-toggle"><i class="fa fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= ucfirst($this->session->userdata('username')); ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a onclick="return confirm('Yakin?')" class="dropdown-item" href="<?= base_url('logout') ?>"> <i class="fa fa-sign-out"></i> Logout</a>
                
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">