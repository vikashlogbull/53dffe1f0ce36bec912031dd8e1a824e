<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
   
<div class="highlighted-slider-2">
  <div class="flex-bullet-slider">
    <ul class="slides">
      <?php foreach ($rows as $id => $row): ?>
        <li<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
          <?php print $row; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div> <!-- /flex-bullet-slider -->
</div> <!-- /highlighted-slider-2 -->