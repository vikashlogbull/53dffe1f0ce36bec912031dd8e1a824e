<?php

// Redefine the wrapper for the site menus
function nestor_menu_tree__main_menu($variables) {
  $main_menu = '<ul class="nav navbar-nav navbar-right">' . $variables['tree'] . '</ul>';
  
  if (theme_get_setting('header_version') === 'header-2') {
    $main_menu = '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
  }
  
  return $main_menu;
}

function nestor_menu_tree__secondary_menu($variables) {
  return '<ul class="nav">' . $variables['tree'] . '</ul>';
}

// Theming the links in the main menu
function nestor_menu_link__main_menu(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  $link = $element['#original_link'];
  $attributes = array();
  $options = $element['#localized_options'];

  // Mark link as active.
  if ($link['in_active_trail'] || ($link['href'] == '<front>' && drupal_is_front_page())) {
    $attributes['class'][] = 'active';
  }

  // Build submenu.
  if ($link['has_children'] && $link['expanded']) {
    if ($link['depth'] == 1) {
      $attributes['class'][] = 'dropdown';
      $options['attributes']['class'][] = 'dropdown-toggle';
      $options['attributes']['data-toggle'][] = 'dropdown';
      $options['attributes']['data-target'][] = '#';
      $options['html'] = TRUE;
    }
    elseif ($link['depth'] > 1) {
      $attributes['class'][] = 'dropdown';
    }
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
  }

  // Build link output.
  $output = '';
  $output .= '<li' . drupal_attributes($attributes) . '>';
  $output .= l($element['#title'], $element['#href'], $options);
  $output .= $sub_menu;
  $output .= '</li>';

   return $output;
}

// Theming the links in the secondary menu
function nestor_menu_link__secondary_menu(array $variables) {
  $element = $variables['element'];

  $attributes = array();
  $options = $element['#localized_options'];

  // Build link output.
  $output = '';
  $output .= '<li' . drupal_attributes($attributes) . '>';
  $output .= l($element['#title'], $element['#href'], $options);
  $output .= '</li>';

  return $output;
}

// Theming the local tasks
function nestor_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<ul class="nav nav-pills">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }

  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<ul class="nav nav-pills">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}