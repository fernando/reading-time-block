<?php
/*
Plugin Name: Reading Time Block
Plugin URI: https://github.com/fernando/reading-time-block
Description: Adds a reading time block to the Gutenberg editor.
Version: 1.0.0
Author: Fernando Ribeiro
Author URI: https://fernandoribei.ro
License: CC BY 4.0
License URI: https://creativecommons.org/licenses/by/4.0/
*/

function register_reading_time_block() {
  wp_register_script(
    'reading-time-block',
    plugin_dir_url(__FILE__) . 'reading-time-block.js',
    array('wp-blocks', 'wp-element')
  );

  register_block_type('reading-time-block/reading-time', array(
    'editor_script' => 'reading-time-block',
    'render_callback' => 'render_reading_time_block'
  ));
}

function render_reading_time_block($attributes) {
  $word_count = str_word_count(get_the_content());
  $reading_time = ceil($word_count / 200); // Assumes an average reading speed of 200 words per minute.

  return sprintf(
    '<div class="reading-time">%d min read</div>',
    $reading_time
  );
}

add_action('init', 'register_reading_time_block');
