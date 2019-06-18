<?php
require_once("../../../../config.php");
?>
<div class="mceTmpl">
 <div id="carouselWithControls" class="carousel slide" data-ride="carousel" data-interval="10000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo $CFG->wwwroot; ?>/theme/urcourses_default/pix/imaginarium.jpg" class="d-block img-thumbnail mx-auto" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $CFG->wwwroot; ?>/theme/urcourses_default/pix/imaginarium.jpg" class="d-block img-thumbnail mx-auto" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $CFG->wwwroot; ?>/theme/urcourses_default/pix/imaginarium.jpg" class="d-block img-thumbnail mx-auto" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselWithControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselWithControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>