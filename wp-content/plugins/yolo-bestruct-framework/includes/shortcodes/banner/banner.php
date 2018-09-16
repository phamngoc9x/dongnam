<?php
/**
 *  
 * @package    YoloTheme/Yolo Bestruct
 * @version    1.0.0
 * @author     Administrator <yolotheme@vietbrain.com>
 * @copyright  Copyright (c) 2016, YoloTheme
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       http://yolotheme.com
*/

if ( ! defined( 'ABSPATH' ) ) die( '-1' );

if ( ! class_exists('Yolo_Framework_Shortcode_Banner') ) {
    class Yolo_Framework_Shortcode_Banner {
        function __construct() {
            add_shortcode( 'yolo_banner', array($this, 'yolo_banner_shortcode') );
        }
        function yolo_banner_shortcode($atts) {
            $atts  = vc_map_get_attributes( 'yolo_banner', $atts );
            $layout_type = $title = $sub_title = $button_text = $link = $image = $el_class = $yolo_animation = $css_animation = $duration = $delay =  '';
            extract(shortcode_atts(array(
                'layout_type'               => 'style_1',
                'link'                      => '',
                'image'                     => '',
                'el_class'                  => '',
                'css_animation'             => '',
                'duration'                  => '',
                'delay'                     => '',
                'button_text'               => '',
                'title'                     => '',
                'border_color'              => '',
            ), $atts)); 
	           
            $yolo_animation   .= ' ' . esc_attr($el_class);
            $yolo_animation   .= Yolo_BestructFramework_Shortcodes::yolo_get_css_animation($css_animation);
            $styles_animation = Yolo_BestructFramework_Shortcodes::yolo_get_style_animation($duration, $delay);
            $url              = vc_build_link( $link );

            ob_start();
            
            $plugin_path = untrailingslashit(plugin_dir_path(__FILE__));

            switch ($layout_type) {
                case 'style_1':
                    $template_path = $plugin_path . '/templates/style_1.php';
                    break;
                case 'style_2':
                    $template_path = $plugin_path . '/templates/style_2.php';
                    break;
                case 'style_3':
                    $template_path = $plugin_path . '/templates/style_3.php';
                    break;
                case 'style_4':
                    $template_path = $plugin_path . '/templates/style_4.php';
                    break;
                case 'style_5':
                    $template_path = $plugin_path . '/templates/style_5.php';
                    break;
                default:
                    $template_path = $plugin_path . '/templates/style_1.php';
            }

            ?>
            <?php if( $image != '' ) : ?>
            <div class="<?php echo esc_attr($yolo_animation); ?>" <?php if($styles_animation):?>style= "<?php echo esc_attr($styles_animation);?>"<?php endif;?>>
                <?php include($template_path); ?>
            </div>
            <?php else : ?>
                <div class="banner-not-select"><?php echo esc_html__( 'Please select image for banner!', 'yolo-bestruct' ); ?></div>
            <?php endif; ?>
        <?php
            $content =  ob_get_clean();
            return $content;         
        }
    }

    new Yolo_Framework_Shortcode_Banner();
}
?>