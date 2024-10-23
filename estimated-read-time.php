<?php
/**
 * Plugin Name: Estimated Read Time with Shortcode
 * Plugin URI: https://github.com/dietrichmd/wordpress_plugins/
 * Description: Estimates and displays the reading time of a post using a shortcode.  Use [estimated_read_time] in post or template.
 * Version: 1.0
 * Author: Vestra Interactive
 * Author URI: https://vestrainteractive.com
 * License: GPLv2 or later
 */

// Define the average reading speed (words per minute)
define( 'ESTIMATED_READING_SPEED', 275 );

// Shortcode function to display estimated read time
function estimated_read_time_shortcode() {
  $content = get_the_content();
  $word_count = str_word_count( strip_tags( $content ) );
  $minutes = ceil( $word_count / ESTIMATED_READING_SPEED );
  
  // Customize the output message (optional)
  $message = sprintf( _n( '%d minute read', '%d minute read', $minutes ), $minutes );
  
  return $message;
}

// Register the shortcode
add_shortcode( 'estimated_read_time', 'estimated_read_time_shortcode' );

?>
