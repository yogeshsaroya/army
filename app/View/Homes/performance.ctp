<?php echo $this->Html->css(["/v2/product_page.css?v=" . rand(5646, 65465)], ['block' => 'cssTop']); ?>
<div id="v2_performance">
  <div class="page_container">
    <section class="pad60">

      <div class="per_head">
        <h1>PERFORMANCE ENGINEERING</h1>
        <p>We appreciate the fact that each high-performance vehicles are sophisticated machines built to satisfy our desire to test the boundaries. Consequently, the aftermarket replacements must be able to take the punishment and push them beyond the imaginable.
          By following the creed of achieving the most power, superior sound and true versatility, we build supreme performance valvetronic exhaust systems that are second to none.</p>
      </div>

      <?php
      $arr = [
        '_Iohv5uc9AI' => 'Ear Bleeding Lamborghini Aventador LP720-4 On Dyno w/ Armytrix Titanium Exhaust - Huge Flames!',
        'onu7V4aPMVc' => 'F7LTHY Ferrari 458 Italia on Dyno w/ Armytrix Titanium Exhaust & LBWK Liberty Walk',
        'RU0bltSpfW8' => 'GT-R R35 SS600 | ARMYTRIX TITANIUM EXHAUST + DYNO RUN BY STRICTLY MOTORSPORTS',
        'W_119ruUbaM' => 'Lamborghini Aventador LP700-4 w/ Armytrix Titanium Exhaust on Dyno - Revs & Flames',
        'kIuEeHgzvDw' => 'Acura NSX 3.5 L twin-turbo V6 w/ ARMYTRIX Titanium Exhaust - Revs & Accelerations On Dyno!',
        'eehVO7QZCKM' => 'Trying to light a cigarette of ARMYTRIX Rose Gold GT-R R35 on Dyno with INSANE FLAMES!',
        'U5-qri3BPs4' => 'Insane noise Doczilla\'s LBWK Liberty Walk GT-R R35 on dyno w/ Armytrix GTR Performance Exhaust Sound',
        'cqZcdSbHNX0' => 'Mercedes-AMG C43 X ARMYTRIX Valvetronic Exhaust X PP-performance - INSANE FIRE On Dyno',
        's8Qt6bO7NMM' => 'The Beast, 852HP on DYNO, BMW F90 M5 Competition w/ ARMYTRIX Turbo -Back Valvetronic exhaust.',
        'VPf5eHr3Nns' => 'McLaren 720S On Dyno Pure Sounds w/ ARMYTRIX Full Exhaust, Loud Revs, Sexy Downshifts!'
      ];
      ?>
      <div class="videoWrapperNw fullMxWd" id="pro_1">
        <?php
        foreach ($arr as $k => $v) { ?>
        <div class="vid_div">
          <h3><?php echo $v; ?></h3>
          <div class="video-responsive">
            <iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube.com/embed/<?php echo $k; ?>?rel=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <?php } ?>
      </div>
    </section>
  </div>
</div>