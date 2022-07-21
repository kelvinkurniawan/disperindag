<?php include "header.php"?>
<div class="container pt-5">
  <div class="row">
    <div class="col-md-12">
      <img src="<?=base_url('assets/images/banner 2.png')?>" class="img-fluid" />
    </div>
  </div>
</div>
<div class="container-fluid p-5" style="
		background-image: url('<?=base_url()?>assets/images/Group 78.png');
		background-size: cover;
		width: 100%;
		min-height: 400px;
	">
  <div class="row mb-5">
    <div class="col-md-12">
      <h3 class="section-title text-white">About Event</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 text-white">
      <p>
        One of the aims of the Jogja Premium Export is to provide support to IKM
        (Industri Kecil dan Menengah), a term to describe small and medium-sized
        industries, that have export quality products to carry out promotions
        and show their existence to the world.
      </p>
      <p>
        The Jogja Premium Export Brand that launched the first edition in
        Festival Indonesia Moscow 2019 will bridge the demand from the global
        market for their interest in quality products from Yogyakarta.
      </p>
      <p>
        “Connecting Minds, Creating Futures”, this promotion strategy is
        expected to deliver export quality creative products in order to be able
        to penetrate and exist in the international market.
      </p>

      <button type="button" class="btn btn-outline-warning mt-4" onclick="goExplore()">
        Explore Now
      </button>
    </div>
    <div class="col-md-6">
      <img src="<?=base_url()?>assets/images/About Us.png" class="img-fluid" />
    </div>
  </div>
</div>
<div class="container-fluid mb-5">
  <div class="row">
    <div class="col-md-12">
      <div class="background" style="position: relative">
        <img src="<?=base_url()?>assets/images/Group 79.png" class="img-fluid" />
        <iframe src="https://drive.google.com/file/d/1ITGvp-DDMusv6z8YlCOdi_EWhVkt5UWf/preview" width="640" height="480"
          allow="autoplay" style="
						position: absolute;
						top: 17%;
						left: 22%;
						width: 55%;
						height: 52.5%;
						border-radius: 7px;
					">
        </iframe>
      </div>
      <div class="text-center">
        <button type="button" class="btn btn-login py-3 px-5" style="font-size: 22px;" onclick="goExplore()">
          Explore Now
        </button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mb-5">
  <div class="row mb-5">
    <div class="col-md-12">
      <h3 class="section-title">Exhibitors</h3>
    </div>
  </div>
  <?php if (isset($this->session->user)): ?>
  <div class="row">
    <div class="col-md-6">
      <div class="booth-container display-booth" style="cursor: pointer;" onclick="openExh()" data-id="">
        <div class="background" style="position: relative">
          <img src="<?=base_url()?>assets/images/booth.png" class="img-fluid" />
          <div class="caption" id="booth-caption"></div>
          <div class="logo">
            <img src="" referrerpolicy="no-referrer" class="img-fluid" id="booth-logo" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row" id="exh-list"></div>
    </div>
  </div>
  <?php else: ?>
  <div class="row" id="exh-list"></div>
  <?php endif;?>
</div>
<div class="container-fluid p-0">
  <video width="100%" height="100%" autoplay muted loop>
    <source src="<?=base_url('assets/ikm.mp4')?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>
<?php include "foot.php"?>
<?php include "fragments/login.php"?>
<?php include "fragments/register.php"?>
<?php include "footer.php"?>
<script>
$(document).ready(function() {
  loadExhibitorList();
});
</script>