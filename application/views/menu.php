<!-- 
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Kopi Susu</span>
              <span class="section-heading-lower">Exresso</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/gambar/kopisusu.jpg" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Perpaduan antara kopi robusta dicampur dengan susu, coklat, gula dan creamer </p>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <?php foreach($produk as $pr) : ?>
  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex mr-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Kopi</span>
              <span class="section-heading-lower"><?= $pr['nama_produk']; ?></span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="<?= base_url('assets/gambar/uploaded/').$pr['gambar']; ?>" alt="">
        <div class="product-item-description d-flex ml-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0"><?= $pr['keterangan']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endforeach; ?>
  <!-- <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Kopi Susu</span>
              <span class="section-heading-lower">Sudibyo</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/gambar/kopisusu3.jpg" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">">Perpaduan antara kopi arabika dicampur dengan susu, gula aren, dan one shot espresso robusta</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
    <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex mr-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Kopi Susu</span>
              <span class="section-heading-lower">Sukur</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/gambar/kopisusu4.jpg" alt="">
        <div class="product-item-description d-flex ml-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Perpaduan antara kopi robusta dicampur dengan susu cenderung gurih dan gula aren</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Kopi Susu</span>
              <span class="section-heading-lower">Sizu</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/gambar/kopisusu6.jpg" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Perpaduan antara kopi robusta dicampur dengan susu, lime dan gula aren</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
   <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex mr-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Kopi Bubuk</span>
              <span class="section-heading-lower">Bapake kopi</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/gambar/kemasan.jpg" alt="">
        <div class="product-item-description d-flex ml-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Aneka jenis kopi bubuk siap seduh dari berbagai daerah di Indonesia</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
   <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Biji Kopi</span>
              <span class="section-heading-lower">Bapake kopi</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/gambar/bijibijian.jpg" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Aneka jenis biji kopi dari berbagai daerah di Indonesia</p>
          </div>
        </div>
      </div>
   -->