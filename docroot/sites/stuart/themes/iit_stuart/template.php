<?php

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 * 
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "iit_stuart" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "iit_stuart".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
function iit_stuart_preprocess_html(&$vars) {
  global $theme_key;

  $googlePlusLink = array(
    'href' => 'https://plus.google.com/104433934257104523396',
    'rel' => 'publisher',
  );
  drupal_add_html_head_link($googlePlusLink);

  $openSansWebfontLink = array(
    'href' => '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,600italic,700italic,800italic|Open+Sans+Condensed:300,300italic,700',
    'rel' => 'stylesheet',
    'type' => 'text/css',
  );
  drupal_add_html_head_link($openSansWebfontLink);

  $oswaldWebfontLink = array(
    'href' => '//fonts.googleapis.com/css?family=Oswald:300,400,700&subset=latin,latin-ext',
    'rel' => 'stylesheet',
    'type' => 'text/css',
  );
  drupal_add_html_head_link($oswaldWebfontLink);

  if ($_SERVER['SERVER_NAME'] == 'stuart-dev.iit.edu' || $_SERVER['SERVER_NAME'] == 'stuart-stg.iit.edu') {
  $metaNoIndex = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'robots',
      'content' => 'noindex',
    ),
  );
  drupal_add_html_head($metaNoIndex, 'dev_noindex');
}
  
  // Two examples of adding custom classes to the body.
  
  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  // $vars['classes_array'][] = css_browser_selector();

}
// */


/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function iit_stuart_process_html(&$vars) {
}
// */


/**
 * Override or insert variables for the page templates.
 */
/* -- Delete this line if you want to use these functions
function iit_stuart_preprocess_page(&$vars) {
}
function iit_stuart_process_page(&$vars) {
}
// */


/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function iit_stuart_preprocess_node(&$vars) {
}
function iit_stuart_process_node(&$vars) {
}
// */


/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function iit_stuart_preprocess_comment(&$vars) {
}
function iit_stuart_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function iit_stuart_preprocess_block(&$vars) {
}
function iit_stuart_process_block(&$vars) {
}
// */


/**
 * Override of adaptivetheme_field to iit_stuart_field__field_page_section_anchor__field_page_section
 * Override the styling of the page section title on a page section field collection
 *
 * @param $vars
 *   An associative array containing:
 *   - label_hidden: A boolean indicating to show or hide the field label.
 *   - title_attributes: A string containing the attributes for the title.
 *   - label: The label for the field.
 *   - content_attributes: A string containing the attributes for the content's
 *     div.
 *   - items: An array of field items.
 *   - item_attributes: An array of attributes for each item.
 *   - classes: A string containing the classes for the wrapping div.
 *   - attributes: A string containing the attributes for the wrapping div.
 *
 * @see template_preprocess_field()
 * @see template_process_field()
 * @see field.tpl.php
 */
function iit_stuart_field__field_page_section_anchor__field_page_section($vars) {
  $output = '';
  
  $content = drupal_render($vars['items'][0]);

  if (strlen($content) > 0) {
    $output .= '<a name="' . $content . '"></a>';
  }

  return $output;
}


/**
 * Override of adaptivetheme_field to iit_stuart_field__field_page_section_title__field_page_section
 * Override the styling of the page section title on a page section field collection
 *
 * @param $vars
 *   An associative array containing:
 *   - label_hidden: A boolean indicating to show or hide the field label.
 *   - title_attributes: A string containing the attributes for the title.
 *   - label: The label for the field.
 *   - content_attributes: A string containing the attributes for the content's
 *     div.
 *   - items: An array of field items.
 *   - item_attributes: An array of attributes for each item.
 *   - classes: A string containing the classes for the wrapping div.
 *   - attributes: A string containing the attributes for the wrapping div.
 *
 * @see template_preprocess_field()
 * @see template_process_field()
 * @see field.tpl.php
 */
function iit_stuart_field__field_page_section_title__field_page_section($vars) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$vars['label_hidden']) {
    $output .= '<h2 class="field-label"' . $vars['title_attributes'] . '>' . $vars['label'] . ':&nbsp;</h2>';
  }

  // // Render the items.
  // $output .= '<div class="field-items"' . $vars['content_attributes'] . '>';
  // foreach ($vars['items'] as $delta => $item) {
  //   $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
  //   $output .= '<div class="' . $classes . '"' . $vars['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  // }
  // $output .= '</div>';
  $content = drupal_render($vars['items'][0]);

  // // Render the top-level wrapper element.
  // $tag = $vars['tag'];
  // $output = "<$tag class=\"" . $vars['classes'] . '"' . $vars['attributes'] . '>' . $output . "</$tag>";

  $output .= '<h2 class="' . $vars['classes'] . '"' . $vars['attributes'] . '>' . $content .'</h2>';

  return $output;
}


/**
 * Override of adaptivetheme_field to iit_stuart_field__field_page_section_content__field_page_section
 * Override the styling of the page section content on a page section field collection
 *
 * @param $vars
 *   An associative array containing:
 *   - label_hidden: A boolean indicating to show or hide the field label.
 *   - title_attributes: A string containing the attributes for the title.
 *   - label: The label for the field.
 *   - content_attributes: A string containing the attributes for the content's
 *     div.
 *   - items: An array of field items.
 *   - item_attributes: An array of attributes for each item.
 *   - classes: A string containing the classes for the wrapping div.
 *   - attributes: A string containing the attributes for the wrapping div.
 *
 * @see template_preprocess_field()
 * @see template_process_field()
 * @see field.tpl.php
 */
function iit_stuart_field__field_page_section_content__field_page_section($vars) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$vars['label_hidden']) {
    $output .= '<h2 class="field-label"' . $vars['title_attributes'] . '>' . $vars['label'] . ':&nbsp;</h2>';
  }

  // // Render the items.
  // $output .= '<div class="field-items"' . $vars['content_attributes'] . '>';
  // foreach ($vars['items'] as $delta => $item) {
  //   $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
  //   $output .= '<div class="' . $classes . '"' . $vars['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  // }
  // $output .= '</div>';
  $content = drupal_render($vars['items'][0]);

  // // Render the top-level wrapper element.
  // $tag = $vars['tag'];
  // $output = "<$tag class=\"" . $vars['classes'] . '"' . $vars['attributes'] . '>' . $output . "</$tag>";

  $output .= '<div class="' . $vars['classes'] . '"' . $vars['attributes'] . '>' . $content .'</div>';

  return $output;
}

/**
* Override or insert variables into the views view templates.
*/
function iit_stuart_preprocess_views_view(&$vars) {
  $view = $vars['view'];
  if ($view->name == 'faculty') {
    drupal_add_js(drupal_get_path('theme', 'iit_stuart') . '/scripts/faculty-anchors-min.js');
  }
}

function iit_stuart_preprocess_panels_pane(&$vars) {
  $pane = $vars['pane'];
  if ($pane->pid == '9') {
    drupal_add_js(drupal_get_path('theme', 'iit_stuart') . '/scripts/homepage-feed-icon.js');
  }
}

/**
 * Override function to Returns HTML for a field in news teaser.
 * * Adaptivetheme overrides this in order to better support HTML5 by setting the
 *
 * @param $vars
 *   An associative array containing:
 *   - label_hidden: A boolean indicating to show or hide the field label.
 *   - title_attributes: A string containing the attributes for the title.
 *   - label: The label for the field.
 *   - content_attributes: A string containing the attributes for the content's
 *     div.
 *   - items: An array of field items.
 *   - item_attributes: An array of attributes for each item.
 *   - classes: A string containing the classes for the wrapping div.
 *   - attributes: A string containing the attributes for the wrapping div.
 *
 * @see template_preprocess_field()
 * @see template_process_field()
 * @see field.tpl.php
 */
function iit_stuart_field__body__news($vars) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$vars['label_hidden']) {
    $output .= '<h2 class="field-label"' . $vars['title_attributes'] . '>' . $vars['label'] . ':&nbsp;</h2>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $vars['content_attributes'] . '>';
  foreach ($vars['items'] as $delta => $item) {
    // Mod for news teasers
    $itemcontent = '';
      if ($vars['element']['#bundle'] == 'news' && $vars['field_view_mode'] == 'teaser') {
        $itemcontent = preg_replace('/<img[^>]+>/i', '', drupal_render($item));
      }
      else {
        $itemcontent = drupal_render($item);
      }
    // end news teasers mod
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $vars['item_attributes'][$delta] . '>' . $itemcontent . '</div>';
  }
  $output .= '</div>';

  // Render the top-level wrapper element.
  $tag = $vars['tag'];
  $output = "<$tag class=\"" . $vars['classes'] . '"' . $vars['attributes'] . '>' . $output . "</$tag>";

  return $output;
}


