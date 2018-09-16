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

do_action('yolo_before_page');

$data_section_id = uniqid();
$portfolio_type  = get_post_meta(get_the_ID(), 'yolo_portfolio_media_type', true);

?>
<div class="portfolio-full detail-05" id="content">
    <div class="container">
        <div class="row portfolio-top">
            <div class="col-md-12">
                <!-- VIDEO TYPE -->
                <?php if( $portfolio_type == 'video' ) : ?>
                    <?php 
                        $video = get_post_meta( get_the_ID(), 'yolo_portfolio_data_format_video', true );
                        $html ='';

                        if (count($video) > 0) {
                            $html .= '<div class="embed-responsive embed-responsive-16by9 embed-responsive-' . '' . '">';
                            // If URL: show oEmbed HTML
                            if (filter_var($video, FILTER_VALIDATE_URL)) {
                                $args = array(
                                    'wmode' => 'transparent'
                                );
                                $html .= wp_oembed_get($video, $args);
                            } // If embed code: just display
                            else {
                                $html .= $video;
                            }
                            $html .= '</div>';
                        }
                        echo($html);
                    ?>
                <?php endif; ?>

                <!-- IMAGE TYPE -->
                <?php if( $portfolio_type == 'image' ) : ?>
                    <?php 
                        the_post_thumbnail( get_the_ID(), 'full' );
                    ?>
                <?php endif; ?>

                <!-- GALLERY TYPE -->
                <?php if( $portfolio_type == 'gallery' ) : ?>
                <div class="row post-grid">
                    <?php if(count($meta_values) > 0){
                        foreach($meta_values as $image){
                            $urls     = wp_get_attachment_image_src($image,'full');
                            $data_rel = $urls[0];
                            $img      = '';
                            if(count($urls)>0){
                                $resize = matthewruddy_image_resize($urls[0],600,480);
                                if($resize!=null && is_array($resize) && array_key_exists('url',$resize) )
                                    $img = $resize['url'];
                            }
                            ?>
                            <div class="col-md-4">
                                <div class="item">
                                    <img alt="portfolio" src="<?php echo esc_url($img) ?>" width = "<?php echo esc_attr($resize['width'])?>" height = "<?php echo esc_attr($resize['height'])?>"/>
                                    <div class="grid-image-hover">
                                        <?php echo sprintf('<a href="%s" data-rel="prettyPhoto[pp_gal_%u]" title="%s"><i class="fa fa-search"></i></a>', esc_url($data_rel), esc_attr(get_the_ID()), esc_attr(get_the_title()) ); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Hover grid images -->
                            
                        <?php }
                    }else { if(count($imgThumbs)>0) { ?>
                        <div class="item"><img alt="portfolio" src="<?php echo esc_url($imgThumbs[0])?>" width = "<?php echo esc_attr($imgThumbs[1])?>" width = "<?php echo esc_attr($imgThumbs[2])?>"/></div>
                    <?php }
                    }
                    ?>
                </div>
                <?php endif; ?>

            </div>
            
        </div>
    </div>
    <div class="container portfolio-content-wrap">
        <div class="row">
            <div class="col-md-8">
                <div class="portfolio-info">
                    <h2 class="portfolio-title p-font"><?php the_title() ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="portfolio-info extra-field">
                    <?php
                    $meta = get_post_meta(get_the_ID(), 'portfolio_custom_fields', TRUE);
                    if(isset($meta) && is_array($meta) && count($meta['portfolio_custom_fields'])>0){
                        for($i=0; $i<count($meta['portfolio_custom_fields']);$i++){
                            ?>
                            <div class="portfolio-info-box">
                                <h6 class="p-color p-font"><?php echo wp_kses_post($meta['portfolio_custom_fields'][$i]['custom-field-title']) ?>:</h6>
                                <div class="portfolio-term-custom"><?php echo wp_kses_post($meta['portfolio_custom_fields'][$i]['custom-field-description']) ?></div>
                            </div>
                        <?php }
                    }
                    ?>

                    <div class="portfolio-info-box">
                        <h6 class="p-color p-font"><?php echo esc_html__( 'Date','yolo-bestruct' ); ?> </h6>
                        <div class="portfolio-term-date"><?php echo date(get_option('date_format'),strtotime($post->post_date)) ?></div>
                    </div>
                    <div class="portfolio-info-box">
                        <h6 class="p-color p-font"><?php echo esc_html__( 'Category','yolo-bestruct' ); ?> </h6>
                        <div class="portfolio-term-cat"><?php echo wp_kses_post($cat); ?></div>
                    </div>
                    <div class="portfolio-info-box">
                        <h6 class="p-color p-font"><?php echo esc_html__( 'Tags','yolo-bestruct' ); ?> </h6>
                        <div class="portfolio-term-tag"><?php echo wp_kses_post($tag); ?></div>
                    </div>
                    <?php if(isset($yolo_bestruct_options['portfolio_social_profile']) ) : ?>
                    <div class="portfolio-info-box">
                        <h6 class="p-color p-font"><?php echo esc_html__( 'Follow Us','yolo-bestruct' ); ?> </h6>
                        <?php 
                        if(isset($yolo_bestruct_options['portfolio_social_profile']) )
                            include_once(plugin_dir_path( __FILE__ ).'/social.php');
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

