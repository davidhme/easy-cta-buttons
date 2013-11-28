<?php
/*
Plugin Name: Easy Call To Action Buttons
Author URI: http://about:blank
Plugin URI: http://about:blank
Description: This plugin will allow users to create CSS buttons via shortcodes.
Version: 1.0.0
License: GPL2
*/

if (!function_exists ('is_admin')) {
   header('Status: 403 Forbidden');
   header('HTTP/1.1 403 Forbidden');
   exit();
}

class EasyCallToActionButtons {
   
   function __construct()
   {
      add_shortcode('easy-button', array(&$this, 'shortcode'));
   }
   
   function shortcode($atts, $content = null)
   {
      // Load CSS when needed
      wp_enqueue_style('easy-button-style', plugins_url( 'style.css', __FILE__ ));
      
      // Extract attributes & set default values
      extract(
         shortcode_atts(
            array(
               'link' => '#',
               'color' => 'blue',
               'size' => 'medium'         // no default value
            ),
            $atts
         )
      );
      
      // Return button
      return '<a href="'.$link.'" title="'.$content.'" class="easy-button '.$color.''.($size?' '.$size:'').'">'.$content.'</a>';
   }
}

$easy_call_to_action_buttons = new EasyCallToActionButtons();

?>