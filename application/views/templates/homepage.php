	<div class="laImg"><img id="largeImg" src="<?php echo site_url('html/img/THDS_rail.jpg'); ?>" alt="Large image" /></div>
	<div class="thumbs">
      <a href="<?php echo site_url('html/img/THDS_rail.jpg'); ?>" title="THDS"><img src="<?php echo site_url('html/img/THDS_rail-thumb.jpg'); ?>" /></a>
        <a href="<?php echo site_url('html/img/AEI_antenna.jpg'); ?>" title="车号自动识别"><img src="<?php echo site_url('html/img/AEI_antenna-thumb.jpg'); ?>" /></a>
        <a href="<?php echo site_url('html/img/TFDS_light.jpg'); ?>" title="TFDS"><img src="<?php echo site_url('html/img/TFDS_light-thumb.jpg'); ?>" /></a>
        <a href="<?php echo site_url('html/img/TADS_car.jpg'); ?>" title="TADS"><img src="<?php echo site_url('html/img/TADS_car-thumb.jpg'); ?>" /></a>
        <a href="<?php echo site_url('html/img/ATC_car.jpg'); ?>" title="列车自动清洗"><img src="<?php echo site_url('html/img/ATC_car-thumb.jpg'); ?>" /></a>
        <a href="<?php echo site_url('html/img/HTK-M101.jpg'); ?>" title="HTK-M101"><img src="<?php echo site_url('html/img/HTK-M101-thumb.jpg'); ?>" /></a>
        <a href="<?php echo site_url('html/img/HMIS_main.jpg'); ?>" title="HMIS"><img src="<?php echo site_url('/html/img/HMIS_main-thumb.jpg'); ?>" /></a>
	</div>
		
<script type="text/javascript">
	$(document).ready(function(){
		$(".thumbs a").hover(function(){
			var largePath = $(this).attr("href");
			var largeAlt = $(this).attr("title");

			$("#largeImg").attr({ src: largePath, alt: largeAlt });

			 return false;
		});

	});
</script>
