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
 * 1. Rename each function and instance of "iit_ehs" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "iit_ehs".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
function iit_ehs_preprocess_html(&$vars) {
  global $theme_key;

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

  if ($_SERVER['SERVER_NAME'] == 'ehs-dev.iit.edu' || $_SERVER['SERVER_NAME'] == 'ehs-stg.iit.edu') {
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
function iit_ehs_process_html(&$vars) {
}
// */


/**
 * Override or insert variables for the page templates.
 */
/* -- Delete this line if you want to use these functions
function iit_ehs_preprocess_page(&$vars) {
}
function iit_ehs_process_page(&$vars) {
}
// */


/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function iit_ehs_preprocess_node(&$vars) {
}
function iit_ehs_process_node(&$vars) {
}
// */


/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function iit_ehs_preprocess_comment(&$vars) {
}
function iit_ehs_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function iit_ehs_preprocess_block(&$vars) {
}
function iit_ehs_process_block(&$vars) {
}
// */
