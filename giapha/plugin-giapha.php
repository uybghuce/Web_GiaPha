<?php
/**
 *
 * Plugin Name:       Plugin Giapha
 * Plugin URI:        #
 * Description:       plugin gia pha
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Uy
 * Author URI:        #
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        #
 * Text Domain:       wp2023-giapha
 * Domain Path:       /languages
 */

 // đinh nghĩa các hằng số của plugin
 define('WP2023_PATH', plugin_dir_path(__FILE__));
 define("WP2023_URI", plugin_dir_url(__FILE__));

 // định nghĩa hành động khi được kích hoạt
 register_activation_hook(__FILE__, 'wp2023_giapha_activation');
 function wp2023_giapha_activation()
 {
  // tạp csdl

  //tao dl mẫu

  //tạo option
 }

 // định nghĩa hành động khi plucgin được tắt đi
 register_deactivation_hook(__FILE__, 'pluginprefix_function_to_run');
 function wp2023_giapha_deactivation()
 {
    //xáo csdl

    //xóa option
 }

include_once WP2023_PATH.'includes/includes.php';
function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'products' )   
  {
    return locate_template('archive-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');