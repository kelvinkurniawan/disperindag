<?php include "header.php"?>
<div class="row g-0">
  <div class="col-md-12" style="position:relative">
    <video width="100%" height="100%" autoplay muted loop>
      <source src="<?=base_url('assets/exh.mp4')?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="text-center text-light" style="
			position: absolute;
			top: 30%;
			width: 100%;
		">
      <h1>PREMIUM EXPORT PRODUCTS</h1>
      <h1 class="display-1 mb-5">VIRTUAL EXPO</h1>
      <a href="#content" class="btn btn-login bg-light text-dark py-3 px-5" style="font-size: 22px;">
        Explore Now
      </a>
    </div>
  </div>
</div>
<div class="container py-5" id="content">
  <div class="row mb-5">
    <div class="col-md-12 mb-3">
      <h3 class="section-title">Exhibitors</h3>
    </div>
    <div class="col-md-12 text-center">
      <span class="section-description text-center">
        ALRA | Agung Karya Sentosa | Angkringan Jogja | Galeri Batik Jawa |
        Pakel Arum | Yad handycraft | HS Silver | benanglusi | Sanggar Brawijaya
        | Gudeg Kaleng Bu Tjitro 1920
      </span>
    </div>
  </div>
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