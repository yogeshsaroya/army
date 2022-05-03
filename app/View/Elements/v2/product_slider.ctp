<?php echo $this->Html->css(["/v2/slick/slick", '/v2/slick/slick-theme'], ['block' => 'cssTop']); ?>
<div class="whiteHeader headSpac mx-640" id="product_slider">
    <?php
    if (isset($slider) && !empty($slider)) {
        foreach ($slider as $sList) {
            $p = 'cdn/' . $sList['Library']['folder'] . "/" . $sList['Library']['file_name'];
            $main = new_show_image($p, 800, 530, 100, 'cf', null);
            echo '<div class="prodctBg"><img src="' . $main . '" loading="lazy" alt=""></div>';
        }
    } ?>
</div>


<?php echo $this->Html->script(["/v2/slick/slick.min"], ['block' => 'scriptBottom']); ?>
<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
$(document).ready(function() {

  $('#product_slider').slick({
    dots: false,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
      }); 



});

<?php $this->Html->scriptEnd(); ?>