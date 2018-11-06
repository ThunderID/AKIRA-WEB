<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**

||-> Shortcode: Testimonials v1

*/
function modeltheme_testimonials_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'=>'',
            'number'=>'',
            'visible_items'=>''
        ), $params ) );
    $myContent = '';
    $myContent .= '<div class="row">';
        $myContent .= '<div data-animate="'.$animation.'" class="testimonials-container-'.$visible_items.' owl-carousel owl-theme wow">';
        $args_testimonials = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'testimonial',
                'post_status'      => 'publish' 
                ); 
        $testimonials = get_posts($args_testimonials);
            foreach ($testimonials as $testimonial) {
                #metaboxes
                $metabox_job_position = get_post_meta( $testimonial->ID, 'job-position', true );
                $metabox_company = get_post_meta( $testimonial->ID, 'company', true );
                $metabox_testimonial_bg = get_post_meta( $testimonial->ID, 'smartowl_testimonial_bg_color', true );
                $testimonial_id = $testimonial->ID;
                $content_post   = get_post($testimonial_id);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'edulearn_80x80' );


                $myContent .= '<div class="items_holder col-md-12">';
                    $myContent .= '<div class="item_border item col-md-12 relative">';
                        $myContent .= '<div class="text-left">';
                            $myContent .= '<div class="testimonial-img-holder pull-left">';
                                $myContent .= '<div class="testimonial-img">';
                                if($thumbnail_src) { $myContent .= '<img src="'. $thumbnail_src[0] . '" alt="'. $testimonial->post_title .'" />';
                                }else{ $myContent .= '<img src="http://placehold.it/150x150" alt="'. $testimonial->post_title .'" />'; }
                                $myContent .= '</div>';
                            $myContent .= '</div>';
                            $myContent .= '<div class="testimonial-author-job">';
                                $myContent .= '<h4>'. $testimonial->post_title .', '.'</h4>';
                                $myContent .= '<h5>'. $metabox_job_position .'</h5>';
                            $myContent .= '</div>';
                        $myContent .= '</div>';
                        $myContent .= '<div class="clearfix"></div>';
                        $myContent .= '<div class="testimonail-content">'.$content.'</div>';
                    $myContent .= '</div>';
                $myContent .= '</div>';
            }
        $myContent .= '</div>';
    $myContent .= '</div>';
    return $myContent;
}
add_shortcode('testimonials', 'modeltheme_testimonials_shortcode');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    vc_map( array(
     "name" => __("MODELTHEME - Testimonials - V1"),
     "base" => "testimonials",
     "category" => esc_attr__('MT: ModelTheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => esc_attr__("Animation"),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => esc_attr__(""),
          "value" => $animations_list
        ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Number of testimonials" ),
              "param_name" => "number",
              "value" => esc_attr__( "" ),
              "description" => esc_attr__( "Enter number of testimonials to show." )
           ),
        array(
          "type" => "dropdown",
          "heading" => esc_attr__("Visible Testimonials per slide"),
          "param_name" => "visible_items",
          "value" => array(
            esc_attr__('1')   => '1',
            esc_attr__('2')   => '2',
            esc_attr__('3')   => '3',
            ),
          "holder" => "div",
          "class" => "",
          "description" => esc_attr__("")
        )
      )
  ));
}

?>