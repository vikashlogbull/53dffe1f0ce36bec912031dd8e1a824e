<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<ul class="nav nav-pills portfolio-filters">
  <li class="text-bold text-color-grayDark1"><?php print t('Filter by:'); ?></li>
  <li class="filter active" data-filter="all"><a href="#"><?php print t('All'); ?></a></li>
  <?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
  <?php endforeach; ?>
</ul> <!-- portfolio-filters -->