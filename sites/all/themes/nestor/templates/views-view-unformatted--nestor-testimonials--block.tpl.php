<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="testimonials-1">
  <div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
      <div class="flex-bullet-slider text-center">
        <i class="icon ion-ios7-chatbubble-outline testimonials-1-icon text-color-theme"></i>
        <ul class="slides">
          <?php foreach ($rows as $id => $row): ?>
            <li><?php print $row; ?></li>
          <?php endforeach; ?>
        </ul> <!-- /slides -->
      </div> <!-- /flex-bullet-slider -->
    </div> <!-- /col-xs-12 -->
  </div> <!-- /row -->
</div> <!-- /testimonials-1 -->