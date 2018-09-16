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
$icon_footer = (array)vc_param_group_parse_atts( $icon_footer );
?>

<div class="<?php echo $layout_type; ?> icon-footer-shortcode-wrap">
    <ul class="icon-footer-list <?php echo esc_attr($icon_align); ?>">
        <?php foreach( $icon_footer as $client ) :?>
            <li class="icon-footer-item">
            <?php if( isset($client['url']) ) : // Show if have url in $client array ?> 
            <a href="<?php echo esc_url($client['url']); ?>">
            <?php endif; ?>
            <?php if(isset($client['icon'])) :?>
                <div class="icon-wrap">
                   <i class="<?php echo esc_attr($client['icon']); ?>"></i>
                </div> 
            <?php endif; ?>  
            <?php if(isset($client['name'])) :?>
                <div class="icon-title">
                    <?php if(isset($client['name'])) :?>
                        <?php echo $client['name']; ?>
                    <?php endif; ?> 
                </div>
            <?php endif; ?>      
            <?php if( isset($client['url']) ) : // Show if have url in $client array ?> 
            </a>
            <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
