<?php include "header.php"?>

<div style="background-color: #f8fffd">
  <div class="container py-5">
    <div class="row mb-5">
      <div class="col-md-12 mb-3">
        <h3 class="section-title name"><?=$content->name?></h3>
      </div>
      <div class="col-md-12">
        <section id="image-carousel" class="splide" aria-label="Beautiful Images">
          <div class="splide__track">
            <ul class="splide__list">
              <?php foreach ($content->gallery as $row): ?>
              <li class="splide__slide">
                <img src="<?=generateImageUrl($row['url'])?>" style="width: 100%" referrerpolicy="no-referrer" />
              </li>
              <?php endforeach;?>
            </ul>
          </div>
        </section>
      </div>
    </div>

    <div class="row mb-5">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="social-title">
                <span class="fw-bold d-block">Social Media</span>
              </div>
              <div class="social-list d-flex">
                <?php $social = ['facebook', 'instagram', 'youtube'];foreach ($content->social_media as $item): ?>
                <?php if (in_array($item['type'], $social)): ?>
                <a class="contact-item mb-3 d-flex flex-column align-items-center" href="<?=$item['url']?>">
                  <div class="icon"><?=socialIcon($item['type'])?></div>
                  <div class="caption px-3 text-center">
                    <span class="d-block"><?=$item['caption']?></span>
                  </div>
                </a>
                <?php endif;?>
                <?php endforeach?>
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="social-title">
                <span class="fw-bold d-block">Marketplace</span>
              </div>
              <div class="market-place d-flex justify-content-center">
                <?php $market = ['shopee', 'tokopedia'];foreach ($content->store as $item): ?>
                <?php if (in_array($item['type'], $market)): ?>
                <a class="contact-item mb-3 d-flex flex-column align-items-center" href="<?=$item['url']?>">
                  <div class="icon"><?=storeIcon($item['type'])?></div>
                  <div class="caption px-3 text-center">
                    <span class="d-block"><?=$item['caption']?></span>
                  </div>
                </a>
                <?php endif;?>
                <?php endforeach?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="exh-item">
          <div class="booth-container display-booth">
            <div class="background" style="position: relative">
              <img src="<?=base_url()?>assets/images/booth.png" class="img-fluid" />
              <div class="caption"><?=$content->name?></div>
              <div class="logo">
                <img src="<?=generateImageUrl($content->logo)?>" referrerpolicy="no-referrer" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="section-short-description"><?=excerpt($content->description)?>...</div>
        <div class="section-description d-none"><?=$content->description?></div>
        <a class="read-more link">Read more</a>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-12 mb-3">
        <h3 class="section-title name text-start">Gallery <?=$content->name?></h3>
      </div>
      <div class="col-md-12 col-lg-6">
        <iframe src="<?=generateYoutubeId($content->youtube)?>" style="width: 100%; height: 400px"></iframe>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="row gallery">
          <?php foreach ($content->gallery as $row): ?>
          <a class="col-md-6 gallery-item" href="<?=generateImageUrl($row['url'])?>" target="_blank">
            <img src="<?=generateImageUrl($row['url'])?>" referrerpolicy="no-referrer" style="width: 100%" />
          </a>
          <?php endforeach;?>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-12 mb-3">
        <h3 class="section-title name text-start">Contact <?=$content->name?></h3>
      </div>
      <div class="col-md-5">
        <?php $contact = ['phone', 'email', 'maps'];foreach ($content->social_media as $item): ?>
        <?php if (in_array($item['type'], $contact)): ?>
        <div class="contact-item mb-3 d-flex align-items-center">
          <div class="icon"><?=contactIcon($item['type'])?></div>
          <div class="caption">
            <span class="fw-bold d-block"><?=$item['caption']?></span>
          </div>
        </div>
        <?php endif;?>
        <?php endforeach?>
      </div>
      <div class="col-md-5 offset-md-1">
        <a href="<?=$content->catalog?>" class="catalog-item mb-3 d-flex align-items-center">
          <div class="icon">
            <i class="uil uil-file-bookmark-alt"></i>
          </div>
          <div class="caption">
            <span class="fw-bold d-block">Download Catalog</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<?php include "foot.php"?>
<?php include "fragments/login.php"?>
<?php include "fragments/register.php"?>
<?php include "footer.php"?>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  new Splide("#image-carousel", {
    autoplay: true,
  }).mount();
});


$(document).on("click", ".read-more", function() {
  $(this).parent().find(".section-description").toggleClass("d-none");
  $(this).parent().find(".section-short-description").toggleClass("d-none");

  if ($(this).text() == "Read more") {
    $(this).text("Read less");
  } else {
    $(this).text("Read more");
  }
});
</script>