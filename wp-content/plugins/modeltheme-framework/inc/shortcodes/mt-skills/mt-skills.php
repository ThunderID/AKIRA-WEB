<?php

/**

||-> Shortcode: Skills

*/
function modeltheme_skills_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'icon_or_image'       => '', 
            'animation'           => '', 
            'icon'                => '', 
            'title'               => '',
            'title_color'         => '',
            'skillvalue'          => '',
            'skillvalue_color'    => '',
            'has_border'          => '',
            'border_color'        => '',
            'image_skill'         => ''
        ), $params ) );

    $image_skill      = wp_get_attachment_image_src($image_skill, "smartowl_500x500");
    $image_skillsrc  = $image_skill[0];

    $skill = '';
    $skill .= '<div class="stats-block statistics animateIn" data-animate="'.esc_attr($animation).'">';
        $skill .= '<div class="stats-head">';
            $skill .= '<p class="stat-number skill">';
            if($icon_or_image == 'choosed_icon'){
                $skill .= '<i class="'.esc_attr($icon).'"></i>';
            }
            elseif($icon_or_image == 'choosed_image') {
                $skill .= '<img class="skill_image" src="'.esc_attr($image_skillsrc).'" data-src="'.esc_attr($image_skillsrc).'" alt="">';
            }
            $skill .= '</p>';
        $skill .= '</div>';
        $skill .= '<div class="stats-content percentage" data-perc="'.esc_attr($skillvalue).'">';
            $skill .= '<h1 class="skill-count" style="color:'.$title_color.';">'.esc_attr($skillvalue).'</h1>';
            if ($has_border == 'bordered') {
            $skill .= '<div class="section-border" style="background-color: '.$border_color.';"></div>';
          }
            $skill .= '<h3 class="skill-title" style="text-align:center;color:'.$skillvalue_color.';">'.esc_attr($title).'</h3>';
        $skill .= '</div>';
    $skill .= '</div>';
    return $skill;
}
add_shortcode('skill', 'modeltheme_skills_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  #SHORTCODE: Skill counter shortcode
  vc_map( array(
     "name" => __("MODELTHEME - Skill counter"),
     "base" => "skill",
     "category" => esc_attr__('EduLearn'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Skill media"),
          "param_name" => "icon_or_image",
          "std" => '',
          "description" => esc_attr__("Choose what you want to use: empty/image/icon"),
          "value" => array(
          'Nothing'     => 'choosed_nothing',
          'Use an image'     => 'choosed_image',
          'Use an icon'      => 'choosed_icon'
          )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "dependency" => array(
           'element' => 'icon_or_image',
           'value' => array( 'choosed_icon' ),
           ),
          "heading" => esc_attr__("Icon class(FontAwesome)"),
          "param_name" => "icon",
          "std" => 'fa fa-lightbulb-o',
          "holder" => "div",
          "class" => "",
          "description" => esc_attr__(""),
          "value" => $fa_list
        ),
        array(
          "group" => "Options",
          "dependency" => array(
           'element' => 'icon_or_image',
           'value' => array( 'choosed_image' ),
           ),
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "image_skill",
          "value" => "",
          "description" => esc_attr__( "Choose image for skill", 'modeltheme' )
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Title"),
           "param_name" => "title",
           "value" => esc_attr__("COMPLETED PROJECTS"),
           "description" => esc_attr__("")
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Title color" ),
            "param_name" => "title_color",
            "value" => '', //Default color #FFBA41
            "description" => esc_attr__( "Choose title color" )
         ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Skill value"),
           "param_name" => "skillvalue",
           "value" => esc_attr__("3200"),
           "description" => esc_attr__("")
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Skill value color" ),
            "param_name" => "skillvalue_color",
            "value" => '', //Default color #FFBA41
            "description" => esc_attr__( "Choose Skill value color" )
         ),
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
          "type" => "dropdown",
          "heading" => esc_attr__("Bordered"),
          "param_name" => "has_border",
          "std" => 'unbordered',
          "holder" => "div",
          "class" => "",
          "description" => esc_attr__(""),
          "value" => array(
              esc_attr__('Bordered')  => 'bordered',
              esc_attr__('Without border') => 'unbordered',
              )
        ),
        array(
            "dependency" => array(
            'element' => 'has_border',
            'value' => array( 'bordered'),
            ),
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Border color" ),
            "param_name" => "border_color",
            "value" => '', //Default color #FFBA41
            "description" => esc_attr__( "Choose border color" )
         )
     )
  ));
}