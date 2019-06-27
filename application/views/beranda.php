<?= $this->session->flashdata('message'); ?>
<div class="intro">
  <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/gambar/intro.jpg" alt="">
  <div class="intro-text left-0 text-center bg-faded p-5 rounded">
    <h2 class="section-heading mb-4">
      <span class="section-heading-upper">Kopi Racikan Bapak</span>
      <span class="section-heading-lower">Kopine Bapake</span>
    </h2>
    <p class="mb-3"> Setiap kopi yang kami sediakan dan sajikan adalah murni pemberian Tuhan Yang Maha Esa yang kami
      modifikasi
      agar dapat di nikmati oleh kami, kamu dan kita semua di setiap tegukan mengingatkan pada kopi racikan bapak</p>
    <button class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#myModal">
      <h4>DAFTAR</h4>
    </button>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
      style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
              <div class="col-lg-2 col-md-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="col-lg-10 col-md-10">
                <h4 class="modal-title" id="myModalLabel" align="left">Silahkan Daftar</h4>
              </div>
            </div>


          </div>
          <form role="form" action="<?= base_url('register') ?>" method="POST">
            <div class="modal-body" align="left">
              <div class="form-group">
                <label>Isi Form dibawah</label><br><br>

                <input class="form-control" placeholder="Nama Lengkap" name="nama"><br>
                <select class="form-control mb-2" name="gender">
                        <option value="">Pilih Gender</option>
                        
                        <option value="l">Laki - laki</option>
                        <option value="p">Perempuan</option>
                      
                    </select>
                    <br>
                <input type="email" class="form-control" placeholder="Email" name="email"><br>
                <input type="text" class="form-control" placeholder="No Telp" name="telp"><br>
                <input type="text" class="form-control" placeholder="Username" name="username"><br>

                <div class="row mb-2">
                  <div class="col-lg-6 col-md-6">

                    <input class="form-control" type="password" class="form-control" placeholder="Password"
                      name="password1">
                  </div>
                  <div class="col-lg-6 col-md-6">

                    <input class="form-control" type="password" class="form-control" placeholder="Ulangi Password"
                      name="password2">
                  </div>
                </div>

                <select class="form-control mb-2" name="id_regional">
                        <option value="">Pilih Regional</option>
                        <?php foreach($regional as $rg) : ?>
                        <option value="<?= $rg ['id_regional']; ?>"><?= ucfirst($rg['regional']); ?> | <?= number_format($rg['biaya'], 0,',','.'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>


              </div><br><br>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Reset</button>
              <input type="submit" class="btn btn-secondary" name="tambah" value="Daftar">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>