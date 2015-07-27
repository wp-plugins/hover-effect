<?php
/*
Plugin Name: KK Hover Effects
Plugin URL: 
Description: Allow user to create 3D button hover effects
Version: 1.0.0
Author: KK
Author URI: 
Contributors: Kamlesh
*/
/*
 * Register kk_hovereffect
 *
 */
// Initialization function


add_action('admin_menu', 'kk_hovereffect_plugin_settings');

 //Register css / script for admin side
function kk_hovereffect_plugin_settings() { 
    
    add_menu_page('Button Hover Effects', 'Hover Effects', 'administrator', 'hoverbtn_settings', 'hovereffect_help');
    //  if (is_admin()) {
    //  wp_register_style('hovereffect_styles', plugins_url('css/default.css', __FILE__));

    // }

}

//Register script for front side
add_action('init', 'kk_hovereffect_register_front_script');
add_action('wp_footer', 'kk_hovereffect_print_front_script');

function kk_hovereffect_register_front_script() {
    if (!is_admin()) {
  
    wp_register_style('hovereffectfront_styles', plugins_url('css/default.css', __FILE__));
   
    wp_enqueue_style('hovereffectfront_styles'); 
      
}
}

function hovereffect_help($instance)
{
 
                        
    $kk_hovereffect_html = '</pre>
            <div class="wrap" style="padding:20px; background:#fff;"> 

                    Plugin allow to set to 2 type of hover button effects for link<br>

                    <b>Hover effect type:</b><br>   
                    1. sub-a <br>
                    2. sub-b    <br>    
                    <br> 

                
                   To use hover effect for links  [hovebtn class="hover effect type" hrefvalue="page or website url" ]Text to dispay[/hovebtn] <br><br>

                   Set effect value in <b>class</b><br>
                   Set Page or website url in <b>hrefvalue</b><br>
                   Replace your link text with <b>Text to dispay</b><br>

                   eg.  [hovebtn class="sub-a" hrefvalue="http://www.google.com" ]Google[/hovebtn] <br><br>



            </div>
            <pre>           
            ';
 
    echo $kk_hovereffect_html;
}

//get property code
function get_kk_hovereffect( $attributes, $content = null)
{ 
    global $kk_hovereffect_add_front_script;
    $kk_hovereffect_add_front_script = true;           

    extract( shortcode_atts( array(
        'class' => '',
        'hrefvalue' => ''
    ), $attributes ) );


    return '<a href="'.$hrefvalue.'"><i class="hovicon effect-1 '.$class.'">'.$content.'</i></a>';

}
//shortcode
add_shortcode('hovebtn','get_kk_hovereffect');