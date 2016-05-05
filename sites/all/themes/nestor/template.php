<?php

$theme_path = drupal_get_path('theme', 'nestor');
require_once $theme_path . '/includes/menu.inc';
require_once $theme_path . '/includes/form.inc';


/**
 * Implements hook_html_head_alter()
 * Change the default meta character type tag with HTML5 version
 */
function nestor_html_head_alter(&$head_elements) {
   $head_elements['system_meta_content_type']['#attributes'] = array(
     'charset' => 'UTF-8'
   );
}

/**
 * Implements hook_preprocess_html()
 */
function nestor_preprocess_html(&$variables) {

  global $base_url;
  $variables['nestor_base_url'] = $base_url;
  $variables['switcher'] = theme_get_setting('switcher');

  /**** Set the background pattern to the body when the layout is boxed ****/
  $variables['boxed_bPattern'] = '';

  if (theme_get_setting('layout_version') === "boxed") {
    $variables['boxed_bPattern'] .= theme_get_setting('boxed_bPattern');
  }

  /**** Sending required settings and variables to the javascript ****/
  $google_latitude    = theme_get_setting('latitude');
  $google_longitude   = theme_get_setting('longitude');
  $google_zoom        = theme_get_setting('google_zoom');
  $google_title       = theme_get_setting('google_title');
  $google_description = theme_get_setting('google_description');

  $settings = array('nestor_base_url'    => $base_url,
                    'google_latitude'    => $google_latitude,
                    'google_longitude'   => $google_longitude,
                    'google_zoom'        => $google_zoom,
                    'google_title'       => $google_title,
                    'google_description' => $google_description);
  drupal_add_js(array("settings" => $settings), 'setting');

  /**** Add the color css ****/
  $path = path_to_theme();

  $color = theme_get_setting('theme_color');
  
  drupal_add_css($path . '/css/color/' . $color . '.css', array('group' => CSS_THEME, 'type' => 'file', 'id' => 'themeColor'));
  
  // external javascript for google maps
  drupal_add_js('http://maps.google.com/maps/api/js?sensor=false', 'external');

  // Check if the Sticky Header is activated or not and import the JS files to make it work
  if (theme_get_setting('sticky_header') === "on") {
    drupal_add_js($path . '/js/waypoints.min.js');
    drupal_add_js($path . '/js/waypoints-sticky.min.js');
  }

  if ($variables['switcher'] === "on") {
    drupal_add_js($path . '/js/demo-switcher.js');
  }

}

/**
 * Implements template_preprocess_maintenance_page()
 *
 */
function nestor_preprocess_maintenance_page(&$variables) {

  global $base_url;
  $variables['nestor_base_url'] = $base_url;

  /**** Add the color css ****/
  $path = path_to_theme();

  $color = theme_get_setting('theme_color');
  
  drupal_add_css($path . '/css/color/' . $color . '.css', array('group' => CSS_THEME, 'type' => 'file', 'id' => 'themeColor'));
  
  $maintenanceOrConstruction = theme_get_setting('maintenanceOrConstruction');
  $variables['maintenanceOrConstruction'] = $maintenanceOrConstruction;

  $variables['head_title'] = $variables['site_name'];
  if ($maintenanceOrConstruction === 'maintenance') {
    $variables['head_title'] .= ' - ' . t('Under Maintenance');
  } else {
    $variables['head_title'] .= ' - ' . t('Under Construction');
  }
}

/**
 * Implements hook_preprocess_page()
 * Override or insert variables into the page template.
 */
function nestor_preprocess_page(&$variables) {

  /**** Getting the theme settings and passing them to the page.tpl.php ****/
  $variables['layout_version'] = theme_get_setting('layout_version');
  $variables['header_version'] = theme_get_setting('header_version');
  $variables['switcher'] = theme_get_setting('switcher');
  $variables['use_breadcrumbs'] = theme_get_setting('breadcrumbs');
  $variables['back_to_top'] = theme_get_setting('back_to_top');
  
  /**** Calculate the header sections classes ****/
  $variables['logo_classes'] = 'logo col-xs-12 col-md-3 text-center-sm';
  $variables['header_classes'] = 'col-xs-12 col-md-9';
  
  if ($variables['header_version'] === 'header-2') {
    $variables['logo_classes'] = 'logo col-xs-12 text-center';
    $variables['header_classes'] = 'col-xs-12';
  }
  
  /**** Calculate the top header section classes ****/
  $variables['top_header_classes'] =
    theme_get_setting('top_header_bColor') . ' ' . theme_get_setting('top_header_tColor');

  /**** Calculate the highlighted 1 section features and classes ****/
  $variables['highlighted_1_wide'] = theme_get_setting('highlighted_1_wide');
  $variables['highlighted_1_classes'] = '';
  if (theme_get_setting('highlighted_1_use_bImg')) {
    $variables['highlighted_1_classes'] =
      theme_get_setting('highlighted_1_bImg') . ' ' . theme_get_setting('highlighted_1_tColor');
  } else {
    $variables['highlighted_1_classes'] =
      theme_get_setting('highlighted_1_bColor') . ' ' . theme_get_setting('highlighted_1_tColor');
  }
  $variables['h1_parallax_ratio'] = '';
  $variables['h1_parallax_offset'] = '';
  if (theme_get_setting('h1_parallax') === 'on') {
    $variables['h1_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('h1_parallax_ratio') . '"';
    $variables['h1_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('h1_parallax_offset') . '"';
  }

  /**** Calculate the highlighted 2 section features and classes ****/
  $variables['highlighted_2_wide'] = theme_get_setting('highlighted_2_wide');
  $variables['highlighted_2_classes'] = '';
  if (theme_get_setting('highlighted_2_use_bImg')) {
    $variables['highlighted_2_classes'] =
      theme_get_setting('highlighted_2_bImg') . ' ' . theme_get_setting('highlighted_2_tColor');
  } else {
    $variables['highlighted_2_classes'] =
      theme_get_setting('highlighted_2_bColor') . ' ' . theme_get_setting('highlighted_2_tColor');
  }
  $variables['h2_parallax_ratio'] = '';
  $variables['h2_parallax_offset'] = '';
  if (theme_get_setting('h2_parallax') === 'on') {
    $variables['h2_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('h2_parallax_ratio') . '"';
    $variables['h2_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('h2_parallax_offset') . '"';
  }

  /**** Calculate the content and sidebar sections classes ****/
  $variables['sidebar_classes'] = 'col-xs-12 col-md-3';
  $variables['content_classes'] = 'col-xs-12 col-md-6';
  if (($variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']) ||
      (!$variables['page']['sidebar_first'] && $variables['page']['sidebar_second'])) {
    $variables['content_classes'] = 'col-xs-12 col-md-9';
  } elseif (!$variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']) {
    if (!in_array('page__contact', $variables['theme_hook_suggestions'])) {
      $variables['content_classes'] = 'col-xs-12';
    } else {
      $variables['content_classes'] = 'col-xs-12 col-md-8 col-md-offset-2';
    }
  }

  /**** Calculate the content 1 section features and classes ****/
  $variables['content_1_wide'] = theme_get_setting('content_1_wide');
  $variables['content_1_classes'] = '';
  if (theme_get_setting('content_1_use_bImg')) {
    $variables['content_1_classes'] =
      theme_get_setting('content_1_bImg') . ' ' . theme_get_setting('content_1_tColor');
  } else {
    $variables['content_1_classes'] =
      theme_get_setting('content_1_bColor') . ' ' . theme_get_setting('content_1_tColor');
  }
  $variables['c1_parallax_ratio'] = '';
  $variables['c1_parallax_offset'] = '';
  if (theme_get_setting('c1_parallax') === 'on') {
    $variables['content_1_classes'] .= ' position-relative region-0 block-0';
    $variables['c1_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c1_parallax_ratio') . '"';
    $variables['c1_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c1_parallax_offset') . '"';
  }
  
  /**** Calculate the content 2 section features and classes ****/
  $variables['content_2_wide'] = theme_get_setting('content_2_wide');
  $variables['content_2_classes'] = '';
  if (theme_get_setting('content_2_use_bImg')) {
    $variables['content_2_classes'] =
      theme_get_setting('content_2_bImg') . ' ' . theme_get_setting('content_2_tColor');
  } else {
    $variables['content_2_classes'] =
      theme_get_setting('content_2_bColor') . ' ' . theme_get_setting('content_2_tColor');
  }
  $variables['c2_parallax_ratio'] = '';
  $variables['c2_parallax_offset'] = '';
  if (theme_get_setting('c2_parallax') === 'on') {
    $variables['content_2_classes'] .= ' position-relative region-0 block-0';
    $variables['c2_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c2_parallax_ratio') . '"';
    $variables['c2_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c2_parallax_offset') . '"';
  }
  
  /**** Calculate the content 3 section features and classes ****/
  $variables['content_3_wide'] = theme_get_setting('content_3_wide');
  $variables['content_3_classes'] = '';
  if (theme_get_setting('content_3_use_bImg')) {
    $variables['content_3_classes'] =
      theme_get_setting('content_3_bImg') . ' ' . theme_get_setting('content_3_tColor');
  } else {
    $variables['content_3_classes'] =
      theme_get_setting('content_3_bColor') . ' ' . theme_get_setting('content_3_tColor');
  }
  $variables['c3_parallax_ratio'] = '';
  $variables['c3_parallax_offset'] = '';
  if (theme_get_setting('c3_parallax') === 'on') {
    $variables['content_3_classes'] .= ' position-relative region-0 block-0';
    $variables['c3_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c3_parallax_ratio') . '"';
    $variables['c3_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c3_parallax_offset') . '"';
  }
  
  /**** Calculate the content 4 section features and classes ****/
  $variables['content_4_wide'] = theme_get_setting('content_4_wide');
  $variables['content_4_classes'] = '';
  if (theme_get_setting('content_4_use_bImg')) {
    $variables['content_4_classes'] =
      theme_get_setting('content_4_bImg') . ' ' . theme_get_setting('content_4_tColor');
  } else {
    $variables['content_4_classes'] =
      theme_get_setting('content_4_bColor') . ' ' . theme_get_setting('content_4_tColor');
  }
  $variables['c4_parallax_ratio'] = '';
  $variables['c4_parallax_offset'] = '';
  if (theme_get_setting('c4_parallax') === 'on') {
    $variables['content_4_classes'] .= ' position-relative region-0 block-0';
    $variables['c4_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c4_parallax_ratio') . '"';
    $variables['c4_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c4_parallax_offset') . '"';
  }
  
  /**** Calculate the content 5 section features and classes ****/
  $variables['content_5_wide'] = theme_get_setting('content_5_wide');
  $variables['content_5_classes'] = '';
  if (theme_get_setting('content_5_use_bImg')) {
    $variables['content_5_classes'] =
      theme_get_setting('content_5_bImg') . ' ' . theme_get_setting('content_5_tColor');
  } else {
    $variables['content_5_classes'] =
      theme_get_setting('content_5_bColor') . ' ' . theme_get_setting('content_5_tColor');
  }
  $variables['c5_parallax_ratio'] = '';
  $variables['c5_parallax_offset'] = '';
  if (theme_get_setting('c5_parallax') === 'on') {
    $variables['content_5_classes'] .= ' position-relative region-0 block-0';
    $variables['c5_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c5_parallax_ratio') . '"';
    $variables['c5_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c5_parallax_offset') . '"';
  }
  
  /**** Calculate the content 6 section features and classes ****/
  $variables['content_6_wide'] = theme_get_setting('content_6_wide');
  $variables['content_6_classes'] = '';
  if (theme_get_setting('content_6_use_bImg')) {
    $variables['content_6_classes'] =
      theme_get_setting('content_6_bImg') . ' ' . theme_get_setting('content_6_tColor');
  } else {
    $variables['content_6_classes'] =
      theme_get_setting('content_6_bColor') . ' ' . theme_get_setting('content_6_tColor');
  }
  $variables['c6_parallax_ratio'] = '';
  $variables['c6_parallax_offset'] = '';
  if (theme_get_setting('c6_parallax') === 'on') {
    $variables['content_6_classes'] .= ' position-relative region-0 block-0';
    $variables['c6_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c6_parallax_ratio') . '"';
    $variables['c6_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c6_parallax_offset') . '"';
  }
  
  /**** Calculate the content 7 section features and classes ****/
  $variables['content_7_wide'] = theme_get_setting('content_7_wide');
  $variables['content_7_classes'] = '';
  if (theme_get_setting('content_7_use_bImg')) {
    $variables['content_7_classes'] =
      theme_get_setting('content_7_bImg') . ' ' . theme_get_setting('content_7_tColor');
  } else {
    $variables['content_7_classes'] =
      theme_get_setting('content_7_bColor') . ' ' . theme_get_setting('content_7_tColor');
  }
  $variables['c7_parallax_ratio'] = '';
  $variables['c7_parallax_offset'] = '';
  if (theme_get_setting('c7_parallax') === 'on') {
    $variables['content_7_classes'] .= ' position-relative region-0 block-0';
    $variables['c7_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c7_parallax_ratio') . '"';
    $variables['c7_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c7_parallax_offset') . '"';
  }
  
  /**** Calculate the content 8 section features and classes ****/
  $variables['content_8_wide'] = theme_get_setting('content_8_wide');
  $variables['content_8_classes'] = '';
  if (theme_get_setting('content_8_use_bImg')) {
    $variables['content_8_classes'] =
      theme_get_setting('content_8_bImg') . ' ' . theme_get_setting('content_8_tColor');
  } else {
    $variables['content_8_classes'] =
      theme_get_setting('content_8_bColor') . ' ' . theme_get_setting('content_8_tColor');
  }
  $variables['c8_parallax_ratio'] = '';
  $variables['c8_parallax_offset'] = '';
  if (theme_get_setting('c8_parallax') === 'on') {
    $variables['content_8_classes'] .= ' position-relative region-0 block-0';
    $variables['c8_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c8_parallax_ratio') . '"';
    $variables['c8_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c8_parallax_offset') . '"';
  }

  /**** Calculate the content 9 section features and classes ****/
  $variables['content_9_wide'] = theme_get_setting('content_9_wide');
  $variables['content_9_classes'] = '';
  if (theme_get_setting('content_9_use_bImg')) {
    $variables['content_9_classes'] =
      theme_get_setting('content_9_bImg') . ' ' . theme_get_setting('content_9_tColor');
  } else {
    $variables['content_9_classes'] =
      theme_get_setting('content_9_bColor') . ' ' . theme_get_setting('content_9_tColor');
  }
  $variables['c9_parallax_ratio'] = '';
  $variables['c9_parallax_offset'] = '';
  if (theme_get_setting('c9_parallax') === 'on') {
    $variables['content_9_classes'] .= ' position-relative region-0 block-0';
    $variables['c9_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c9_parallax_ratio') . '"';
    $variables['c9_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c9_parallax_offset') . '"';
  }

  /**** Calculate the content 10 section features and classes ****/
  $variables['content_10_wide'] = theme_get_setting('content_10_wide');
  $variables['content_10_classes'] = '';
  if (theme_get_setting('content_10_use_bImg')) {
    $variables['content_10_classes'] =
      theme_get_setting('content_10_bImg') . ' ' . theme_get_setting('content_10_tColor');
  } else {
    $variables['content_10_classes'] =
      theme_get_setting('content_10_bColor') . ' ' . theme_get_setting('content_10_tColor');
  }
  $variables['c10_parallax_ratio'] = '';
  $variables['c10_parallax_offset'] = '';
  if (theme_get_setting('c10_parallax') === 'on') {
    $variables['content_10_classes'] .= ' position-relative region-0 block-0';
    $variables['c10_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c10_parallax_ratio') . '"';
    $variables['c10_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c10_parallax_offset') . '"';
  }

  /**** Calculate the content 11 section features and classes ****/
  $variables['content_11_wide'] = theme_get_setting('content_11_wide');
  $variables['content_11_classes'] = '';
  if (theme_get_setting('content_11_use_bImg')) {
    $variables['content_11_classes'] =
      theme_get_setting('content_11_bImg') . ' ' . theme_get_setting('content_11_tColor');
  } else {
    $variables['content_11_classes'] =
      theme_get_setting('content_11_bColor') . ' ' . theme_get_setting('content_11_tColor');
  }
  $variables['c11_parallax_ratio'] = '';
  $variables['c11_parallax_offset'] = '';
  if (theme_get_setting('c11_parallax') === 'on') {
    $variables['content_11_classes'] .= ' position-relative region-0 block-0';
    $variables['c11_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c11_parallax_ratio') . '"';
    $variables['c11_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c11_parallax_offset') . '"';
  }

  /**** Calculate the content 12 section features and classes ****/
  $variables['content_12_wide'] = theme_get_setting('content_12_wide');
  $variables['content_12_classes'] = '';
  if (theme_get_setting('content_12_use_bImg')) {
    $variables['content_12_classes'] =
      theme_get_setting('content_12_bImg') . ' ' . theme_get_setting('content_12_tColor');
  } else {
    $variables['content_12_classes'] =
      theme_get_setting('content_12_bColor') . ' ' . theme_get_setting('content_12_tColor');
  }
  $variables['c12_parallax_ratio'] = '';
  $variables['c12_parallax_offset'] = '';
  if (theme_get_setting('c12_parallax') === 'on') {
    $variables['content_12_classes'] .= ' position-relative region-0 block-0';
    $variables['c12_parallax_ratio'] =
      'data-stellar-background-ratio="' . theme_get_setting('c12_parallax_ratio') . '"';
    $variables['c12_parallax_offset'] =
      'data-stellar-vertical-offset="' . theme_get_setting('c12_parallax_offset') . '"';
  }

  /**** Calculate the footer features ****/
  $variables['footer_columns_classes'] =
    theme_get_setting('footer_columns_bColor') . ' ' . theme_get_setting('footer_columns_tColor');
  $variables['footer_classes'] =
    theme_get_setting('footer_bColor') . ' ' . theme_get_setting('footer_tColor');
	
  /**** Configuring the classes for the footers columns ****/
  $f_first = $variables['page']['footer_first_column'];
  $f_second = $variables['page']['footer_second_column'];
  $f_third = $variables['page']['footer_third_column'];
  $f_fourth = $variables['page']['footer_fourth_column'];

  $footer_columns = 0;

  if ($f_first)   { $footer_columns++; }
  if ($f_second)  { $footer_columns++; }
  if ($f_third)   { $footer_columns++; }
  if ($f_fourth)  { $footer_columns++; }
	
  switch ($footer_columns) {
    case 1: $variables['footer_class'] = 'col-xs-12'; break;
    case 2: $variables['footer_class'] = 'col-xs-12 col-md-6'; break;
    case 3: $variables['footer_class'] = 'col-xs-12 col-md-4'; break;
    case 4: $variables['footer_class'] = 'col-xs-12 col-md-3'; break;
    default: $variables['footer_class'] = 'col-xs-12 col-md-3';
  }
	
  $variables['footer_columns'] = $footer_columns;

  /**** Configuring the classes for the footer ****/
  $f_left = $variables['page']['footer_left'];
  $f_right = $variables['page']['footer_right'];
  
  $f_left_classes = 'text-center-sm';
  $f_right_classes = 'text-right text-center-sm';

  if ($f_left && $f_right) {
    $f_left_classes .= ' footer_left col-xs-12 col-md-6';
    $f_right_classes .= ' footer_right col-xs-12 col-md-6';
  } elseif (($f_left && !$f_right) || (!$f_left && $f_right)) {
    $f_left_classes .= ' footer_left col-xs-12';
    $f_right_classes .= ' footer_right col-xs-12';
  }

  $variables['f_left_classes']  = $f_left_classes;
  $variables['f_right_classes'] = $f_right_classes;

  /**** Make the Home Variant pages to behave like the front page ****/
  if (isset($variables['node']) && $variables['node']->type === 'home_variant') {
    $variables['is_front'] = TRUE;
  }
	
}

/**
 * Implements hook_preprocess_node()
 */
function node_preprocess_node(&$variables) {
  
  $node = $variables['node'];
  
  if ($node->type === 'article') {
    $variables['date'] = format_date($node->created);
    
    if (variable_get('node_submitted_' . $node->type, TRUE)) {
      $variables['display_submitted'] = TRUE;
     
      $date = format_date($node->created, 'custom', 'M d, Y');
      $user = theme('username', array('account' => $node));
        
      $variables['submitted'] = '<ul class="blog-post-info list-inline">';
      $variables['submitted'] .= '<li><i class="icon ion-ios7-calendar-outline"></i> ' . $date . '</li>';
      $variables['submitted'] .= '<li><i class="icon ion-ios7-person-outline"></i> ' . $user . '</li>';
        
      if (!empty($node->{'field_tags'})) {
        $tags = nestor_node_tags($node);
        $variables['submitted'] .= '<li><i class="icon ion-ios7-pricetag-outline"></i> ' . $tags . '</li>';
      }
        
      if (isset($node->comment) && $node->comment == COMMENT_NODE_OPEN) {
        $commentsCount = $node->comment_count . t(' comments');
        $variables['submitted'] .= '<li><i class="icon ion-ios7-chatbubble-outline"></i> ' . $commentsCount . '</li>';
      }
        
      $variables['submitted'] .= '</ul>';
    } else {
      $variables['display_submitted'] = FALSE;
      $variables['submitted'] = '';
    }
  }
   
}

/**
 * Implements hook_preprocess_button().
 */
function nestor_preprocess_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn';
  $vars['element']['#attributes']['class'][] = 'btn-primary';
  $vars['element']['#attributes']['class'][] = 'btn-sm';
}

/**
 * Implements theme_breadcrumb
 */
function nestor_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $breadcrumb_delimiter = theme_get_setting('breadcrumb_delimiter');
  $delimiter = '<span class="delimiter">' . $breadcrumb_delimiter . '</span>';
  
  $output = "";
  
  if (!empty($breadcrumb)) {
    $output = '<div class="breadcrumbs">'. implode($delimiter, $breadcrumb) . '</div>';
  }
  
  return $output;
}

/**
 * Implements theme_pager
 */
function nestor_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array(''),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array(''),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array(''),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('active'),
            'data' => '<a href="#">' . $i . '</a>',
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array(''),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array(''),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array(''),
        'data' => $li_last,
      );
    }
    return theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pagination')),
    ));
  }
}

/**
 * Implements theme_item_list
 */
function nestor_item_list($variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];

  // Only output the list container and title, if there are any list items.
  // Check to see whether the block title exists before adding a header.
  // Empty headers are not semantic and present accessibility challenges.
  $output = '';
  if (isset($title) && $title !== '') {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    $i = 0;
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
      $data = '';
      $i++;
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 1) {
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items) {
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  
  return $output;
}


function nestor_node_tags($node) {
  $category_arr = array();
  $category = '';
  if (!empty($node->{'field_tags'}[LANGUAGE_NONE])) {
    foreach ($node->{'field_tags'}[LANGUAGE_NONE] as $item) {
      $term = taxonomy_term_load($item['tid']);
      if ($term) {
        $category_arr[] = l($term->name, 'taxonomy/term/' . $item['tid']);
      }
    }
  }
  $category = implode(', ', $category_arr);
  
  return $category;
}

/**
 * Implements theme_field()
 */
function nestor_field__field_portfolio_link($variables) {
  return drupal_render($variables['items'][0]);
}

/**
 * Implements theme_field()
 */
function nestor_field__field_image_slider($variables) {
  
  $output = '';
  
  if (count($variables['items']) === 1) {
    $variables['items'][0]['#item']['attributes']['class'][] = 'img-responsive';
    $variables['items'][0]['#item']['attributes']['class'][] = 'img-full-width';
    $output = drupal_render($variables['items'][0]);
  } else {
    $output = '<div class="flex-arrow-slider"><ul class="slides">';
  
    foreach ($variables['items'] as $delta => $item) {
      $item['#item']['attributes']['class'][] = 'img-responsive';
      $item['#item']['attributes']['class'][] = 'img-full-width';
      $output .= '<li>' . drupal_render($item) . '</li>';
    }
  
    $output .= '</ul></div>';
  }
  
  return $output;
}

function nestor_image_style($variables) {

  $resp_full_image_styles = array("blog_lg",
                                  "blog_sm",
                                  "portfolio_lg",
                                  "portfolio_sm",
                                  "image_full_width");

  $resp_image_styles = array("image_responsive",
                             "user_picture");
  
  if(in_array($variables['style_name'], $resp_full_image_styles)) {
    $variables['attributes']['class'][] = 'img-responsive';
    $variables['attributes']['class'][] = 'img-full-width';
  }

  if(in_array($variables['style_name'], $resp_image_styles)) {
    $variables['attributes']['class'][] = 'img-responsive';
  }
  
  return theme_image_style($variables);
}