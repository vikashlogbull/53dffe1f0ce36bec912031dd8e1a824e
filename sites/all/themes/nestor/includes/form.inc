<?php

/**
 * Implements theme_form_element().
 */
function nestor_form_element($variables) {
  $element = &$variables['element'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item', 'form-group');
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
  }
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
  $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
}

/**
 * Implements theme_password
 */
function nestor_password($variables) {
  $variables['element']['#attributes']['class'][] = 'form-control';
  
  return theme_password($variables);
}

/**
 * Implements theme_select
 */
function nestor_select($variables) {
  $variables['element']['#attributes']['class'][] = 'form-control';
  
  return theme_select($variables);
}

/**
 * Implements theme_textarea
 */
function nestor_textarea($variables) {
  $variables['element']['#resizable'] = false;
  $variables['element']['#attributes']['class'][] = 'form-control';
  
  return theme_textarea($variables);
}

/**
 * Implements theme_textfield().
 */
function nestor_textfield($variables) {
  $variables['element']['#attributes']['class'][] = 'form-control';
  
  return theme_textfield($variables);
}

/**
 * Implements hook_form_alter
 */
function nestor_form_alter(&$form, &$form_state, $form_id) {

  if (!empty($form['#form_id']) && substr($form_id, 0, 10) === "simplenews") {
    if (!empty($form['mail'])) {
      $form['mail']['#title'] = '';
      $form['mail']['#required'] = false;
      $form['mail']['#attributes']['placeholder'] = t('Enter email');
    }
  }
}