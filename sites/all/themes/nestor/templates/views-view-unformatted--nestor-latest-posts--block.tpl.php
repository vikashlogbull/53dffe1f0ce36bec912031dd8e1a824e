<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="row">
<?php foreach ($rows as $id => $row): ?>
  <div class="col-xs-12 col-sm-4 latest-news-1-item">
    <?php print $row; ?>
  </div> <!-- /latest-news-1-item -->
<?php endforeach; ?>
</div> <!-- /row -->