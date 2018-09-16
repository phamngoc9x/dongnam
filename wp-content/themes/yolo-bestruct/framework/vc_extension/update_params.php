<?php
/**
 *  
 * @package    YoloTheme
 * @version    1.0.0
 * @author     Administrator <admin@yolotheme.com>
 * @copyright  Copyright (c) 2016, YoloTheme
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       http://yolotheme.com
 ** 
 * Add param to exits shortcode
 * 1. vc_row
 * 2. vc_row_inner
 * 3. vc_column
 * 4. vc_custom_heading
 */

function yolo_add_vc_param() {
    if (function_exists('vc_add_param')) {
        $add_css_animation = array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('CSS Animation', 'yolo-bestruct'),
            'param_name'  => 'css_animation',
            'value'       => array(
                esc_html__('No', 'yolo-bestruct')                   => '', 
                esc_html__('Fade In', 'yolo-bestruct')              => 'wpb_fadeIn', 
                esc_html__('Fade Top to Bottom', 'yolo-bestruct')   => 'wpb_fadeInDown', 
                esc_html__('Fade Bottom to Top', 'yolo-bestruct')   => 'wpb_fadeInUp', 
                esc_html__('Fade Left to Right', 'yolo-bestruct')   => 'wpb_fadeInLeft', 
                esc_html__('Fade Right to Left', 'yolo-bestruct')   => 'wpb_fadeInRight', 
                esc_html__('Bounce In', 'yolo-bestruct')            => 'wpb_bounceIn', 
                esc_html__('Bounce Top to Bottom', 'yolo-bestruct') => 'wpb_bounceInDown', 
                esc_html__('Bounce Bottom to Top', 'yolo-bestruct') => 'wpb_bounceInUp', 
                esc_html__('Bounce Left to Right', 'yolo-bestruct') => 'wpb_bounceInLeft', 
                esc_html__('Bounce Right to Left', 'yolo-bestruct') => 'wpb_bounceInRight', 
                esc_html__('Zoom In', 'yolo-bestruct')              => 'wpb_zoomIn', 
                esc_html__('Flip Vertical', 'yolo-bestruct')        => 'wpb_flipInX', 
                esc_html__('Flip Horizontal', 'yolo-bestruct')      => 'wpb_flipInY', 
                esc_html__('Bounce', 'yolo-bestruct')               => 'wpb_bounce', 
                esc_html__('Flash', 'yolo-bestruct')                => 'wpb_flash', 
                esc_html__('Shake', 'yolo-bestruct')                => 'wpb_shake', 
                esc_html__('Pulse', 'yolo-bestruct')                => 'wpb_pulse', 
                esc_html__('Swing', 'yolo-bestruct')                => 'wpb_swing', 
                esc_html__('Rubber band', 'yolo-bestruct')          => 'wpb_rubberBand', 
                esc_html__('Wobble', 'yolo-bestruct')               => 'wpb_wobble', 
                esc_html__('Tada', 'yolo-bestruct')                 => 'wpb_tada'
            ),
            'description' => esc_html__('Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'yolo-bestruct'),
            'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
        );

        $add_duration_animation = array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Animation Duration', 'yolo-bestruct'),
            'param_name'  => 'duration',
            'value'       => '',
            'description' => esc_html__('Duration in seconds. You can use decimal points in the value. Use this field to specify the amount of time the animation plays. <em>The default value depends on the animation, leave blank to use the default.</em>', 'yolo-bestruct'),
            'dependency'  => array(
                'element' => 'css_animation', 
                'value'   => array(
                    'wpb_fadeIn', 
                    'wpb_fadeInDown', 
                    'wpb_fadeInUp', 
                    'wpb_fadeInLeft', 
                    'wpb_fadeInRight', 
                    'wpb_bounceIn', 
                    'wpb_bounceInDown', 
                    'wpb_bounceInUp', 
                    'wpb_bounceInLeft', 
                    'wpb_bounceInRight', 
                    'wpb_zoomIn', 
                    'wpb_flipInX', 
                    'wpb_flipInY', 
                    'wpb_bounce', 
                    'wpb_flash', 
                    'wpb_shake', 
                    'wpb_pulse', 
                    'wpb_swing', 
                    'wpb_rubberBand',
                    'wpb_wobble', 
                    'wpb_tada'
                )
            ),
            'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
        );

        $add_delay_animation = array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Animation Delay', 'yolo-bestruct'),
            'param_name'  => 'delay',
            'value'       => '',
            'description' => esc_html__('Delay in seconds. You can use decimal points in the value. Use this field to delay the animation for a few seconds, this is helpful if you want to chain different effects one after another above the fold.', 'yolo-bestruct'),
            'dependency'  => array(
                'element' => 'css_animation', 
                'value'   => array(
                    'wpb_fadeIn', 
                    'wpb_fadeInDown', 
                    'wpb_fadeInUp', 
                    'wpb_fadeInLeft', 
                    'wpb_fadeInRight', 
                    'wpb_bounceIn', 
                    'wpb_bounceInDown', 
                    'wpb_bounceInUp', 
                    'wpb_bounceInLeft', 
                    'wpb_bounceInRight', 
                    'wpb_zoomIn', 
                    'wpb_flipInX', 
                    'wpb_flipInY', 
                    'wpb_bounce', 
                    'wpb_flash', 
                    'wpb_shake', 
                    'wpb_pulse', 
                    'wpb_swing', 
                    'wpb_rubberBand', 
                    'wpb_wobble', 
                    'wpb_tada'
                )
            ),
            'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
        );

        // Add params for row
        $add_params_row = array(
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Layout', 'yolo-bestruct'),
                'param_name' => 'layout',
                'value'      => array(
                    esc_html__('Container', 'yolo-bestruct')       => 'boxed',
                    esc_html__('Full Width', 'yolo-bestruct')      => 'wide',
                    esc_html__('Container Fluid', 'yolo-bestruct') => 'container-fluid',
                ),
                'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__('Show background overlay', 'yolo-bestruct'),
                'param_name'  => 'overlay_set',
                'description' => esc_html__('Hide or Show overlay on background images.', 'yolo-bestruct'),
                'value'       => array(
                    esc_html__('Hide, please', 'yolo-bestruct')       => 'hide_overlay',
                    esc_html__('Show Overlay Color', 'yolo-bestruct') => 'show_overlay_color',
                    esc_html__('Show Overlay Image', 'yolo-bestruct') => 'show_overlay_image',
                ),
                'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
            ),
            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__('Image Overlay:', 'yolo-bestruct'),
                'param_name'  => 'overlay_image',
                'value'       => '',
                'description' => esc_html__('Upload image overlay.', 'yolo-bestruct'),
                'dependency'  => array(
                    'element' => 'overlay_set', 
                    'value'   => array('show_overlay_image')
                ),
                'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
            ),
            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__('Overlay color', 'yolo-bestruct'),
                'param_name'  => 'overlay_color',
                'description' => esc_html__('Select color for background overlay.', 'yolo-bestruct'),
                'value'       => '',
                'dependency'  => array(
                    'element' => 'overlay_set', 
                    'value'   => array('show_overlay_color')
                ),
                'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
            ),
            array(
                'type'        => 'number',
                'class'       => '',
                'heading'     => esc_html__('Overlay opacity', 'yolo-bestruct'),
                'param_name'  => 'overlay_opacity',
                'value'       => '50',
                'min'         => '1',
                'max'         => '100',
                'suffix'      => '%',
                'description' => esc_html__('Select opacity for overlay.', 'yolo-bestruct'),
                'dependency'  => array(
                    'element' => 'overlay_set', 
                    'value'   => array('show_overlay_color', 'show_overlay_image')
                ),
                'group'       => esc_html__('Yolo Options', 'yolo-bestruct')
            ),
            $add_css_animation,
            $add_duration_animation,
            $add_delay_animation,
        );
        
        // Add params for row-inner
        $add_params_row_inner = array(
            $add_css_animation,
            $add_duration_animation,
            $add_delay_animation,
        );

        // Add params for column
        $add_params_column = array(
            $add_css_animation,
            $add_duration_animation,
            $add_delay_animation,
        );

        // Add params for custom heading
        $add_params_custom_heading = array(
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Font Weight', 'yolo-bestruct'),
                'param_name' => 'font_weight',
                'value'      => array(
                    esc_html__('Default', 'yolo-bestruct') => '',
                    esc_html__('100', 'yolo-bestruct')     => '100',
                    esc_html__('200', 'yolo-bestruct')     => '200',
                    esc_html__('300', 'yolo-bestruct')     => '300',
                    esc_html__('Normal', 'yolo-bestruct')  => '400',
                    esc_html__('500', 'yolo-bestruct')     => '500',
                    esc_html__('600', 'yolo-bestruct')     => '600',
                    esc_html__('Bold', 'yolo-bestruct')    => '700',
                    esc_html__('800', 'yolo-bestruct')     => '800',
                    esc_html__('900', 'yolo-bestruct')     => '900',
                ),
            ),
            
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__('Letter spacing', 'yolo-bestruct'),
                'param_name'  => 'letter_spacing',
                'value'       => 'normal',
                'description' => esc_html__('Insert heading letter spacing. Example: normal, initial, 1px,...', 'yolo-bestruct'),
            ),
            $add_css_animation,
            $add_duration_animation,
            $add_delay_animation,
        );

        // 1. Add new parameters for row
        foreach( $add_params_row as $param_row ) {
            vc_add_param('vc_row', $param_row);
        }
        // 2. Add new parameters for row_inner
        foreach( $add_params_row_inner as $param_row_inner ) {
            vc_add_param('vc_row_inner', $param_row_inner);
        }

        // 3. Add new parameters for column
        foreach( $add_params_column as $param_column ) {
            vc_add_param('vc_column', $param_column);
        }

        // 3. Add new parameters for custom heading
        foreach( $add_params_custom_heading as $param_custom_heading ) {
            vc_add_param('vc_custom_heading', $param_custom_heading);
        }

        // Update category for shortcode
        $settings_vc_map = array(
            'category' => array(
                esc_html__( 'Content', 'yolo-bestruct' ), 
                esc_html__( 'Bestruct Shortcodes', 'yolo-bestruct' )
            )
        );

        vc_map_update('vc_custom_heading', $settings_vc_map);
    }
}

yolo_add_vc_param();
