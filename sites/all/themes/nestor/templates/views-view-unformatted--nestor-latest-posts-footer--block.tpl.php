<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php foreach ($rows as $id => $row): ?>
  <div class="footer-latest-news-item">
    <?php print $row; ?>
  </div> <!-- /latest-news-1-item -->
<?php endforeach; ?>