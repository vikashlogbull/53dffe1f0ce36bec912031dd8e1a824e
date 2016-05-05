<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="highlighted-slider-1 position-relative">
  <div class="overlay">
    <div class="flex-bullet-slider vertical-center text-center">
      <div class="container">
        <ul class="slides">
          <?php foreach ($rows as $id => $row): ?>
            <li<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
              <?php print $row; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div> <!-- /container -->
    </div> <!-- /flex-bullet-slider -->
  </div> <!-- /overlay -->
</div> <!-- /highlighted-slider-1 -->