<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php if (isset($fields['field_image_slider'])) : ?>
  <a href="<?php print $fields['path']->content; ?>">
    <div class="latest-news-1-image">
      <?php print $fields['field_image_slider']->content; ?>
      <div class="latest-news-1-overlay">
        <p><?php print(t('Click to read more')); ?>
      </div> <!-- /latest-news-1-overlay -->
    </div> <!-- /latest-news-1-image -->
  </a>
<?php endif; ?>

<?php if (isset($fields['title'])) : ?>
  <h6 class="latest-news-1-title">
    <?php print $fields['title']->content ;?>
  </h6>
<?php endif; ?>

<?php if (isset($fields['body'])) : ?>
  <p><?php print $fields['body']->content ;?></p>
<?php endif; ?>