<?php
/**

||-> Shortcode: Section Heading with Title and Subtitle

*/
function modeltheme_heading_title_subtitle_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'              => '',
            'custom_style'           => '',
            'title'                  => '',
            'title_font_size'        => '',
            'title_font_weight'      => '',
            'title_line_height'      => '',
            'subtitle'               => '',
            'subtitle_font_size'     => '',
            'subtitle_font_weight'   => '',
            'subtitle_line_height'   => '',
            'title_color'            => '',
            'subtitle_color'         => '',
            'align'                  => '',
            'border_or_not'          => ''
        ), $params ) ); 
    $content = '<div class="title-subtile-holder wow '.$animation.'">';
    if ($align == "align_right") {
        if ($border_or_not == "with_border") {
            $content .= '<div class="section-border" style="margin-left:auto;"></div>';
        }
        if ($custom_style == "add_custom_style") {
            $content .= '<h1 class="section-title" style="color:'.$title_color.';text-align:right;font-size:'.$title_font_size.';font-weight:'.$title_font_weight.';line-height:'.$title_line_height.';">'.$title.'</h1>';
            $content .= '<h1 class="section-subtitle" style="color:'.$subtitle_color.';text-align:right;font-size:'.$subtitle_font_size.';font-weight:'.$subtitle_font_weight.';line-height:'.$subtitle_line_height.';">'.$subtitle.'</h1>';
            } else {
                $content .= '<h1 class="section-title" style="color:'.$title_color.';text-align:right;">'.$title.'</h1>';
                $content .= '<h1 class="section-subtitle" style="color:'.$subtitle_color.';text-align:right">'.$subtitle.'</h1>'; 
            }
    } elseif ($align == "align_center") {
        if ($border_or_not == "with_border") {
            $content .= '<div class="section-border" style="margin:0 auto;"></div>';
        }
        if ($custom_style == "add_custom_style") {
            $content .= '<h1 class="section-title" style="color:'.$title_color.';text-align:center;font-size:'.$title_font_size.';font-weight:'.$title_font_weight.';line-height:'.$title_line_height.';">'.$title.'</h1>';
            $content .= '<h1 class="section-subtitle" style="color:'.$subtitle_color.';text-align:center;font-size:'.$subtitle_font_size.';font-weight:'.$subtitle_font_weight.';line-height:'.$subtitle_line_height.';">'.$subtitle.'</h1>';
            } else {
                $content .= '<h1 class="section-title" style="color:'.$title_color.';text-align:center;">'.$title.'</h1>';
                $content .= '<h1 class="section-subtitle" style="color:'.$subtitle_color.';text-align:center">'.$subtitle.'</h1>';
            }
    } else {
        if ($border_or_not == "with_border") {
        $content .= '<div class="section-border" style="margin-right:auto;"></div>';
        }
        if ($custom_style == "add_custom_style") {
            $content .= '<h1 class="section-title" style="color:'.$title_color.';text-align:left;font-size:'.$title_font_size.';font-weight:'.$title_font_weight.';line-height:'.$title_line_height.';">'.$title.'</h1>';
            $content .= '<h1 class="section-subtitle" style="color:'.$subtitle_color.';text-align:left;font-size:'.$subtitle_font_size.';font-weight:'.$subtitle_font_weight.';line-height:'.$subtitle_line_height.';">'.$subtitle.'</h1>';
            } else {
                $content .= '<h1 class="section-title" style="color:'.$title_color.';text-align:left;">'.$title.'</h1>';
                $content .= '<h1 class="section-subtitle" style="color:'.$subtitle_color.';text-align:left">'.$subtitle.'</h1>';
            }
    }
    $content .= '</div>';
    return $content;
}
add_shortcode('heading_title_subtitle', 'modeltheme_heading_title_subtitle_shortcode');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => __("MODELTHEME - Section Heading with Title and Subtitle"),
     "base" => "heading_title_subtitle",
     "category" => esc_attr__('MT: ModelTheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
         array(
            "group" => "Options",
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Add custom style (yes/no)"),
            "param_name" => "custom_style",
            "std" => '',
            "description" => esc_attr__("Choose if you want to modify the font-size/font-weight/line-height of the title/subtitle."),
            "value" => array(
             esc_attr__('Choose an option')     => 'choose_custom_style',
             esc_attr__('Add custom style')     => 'add_custom_style',
             esc_attr__('Default style')     => 'default_custom_style'
            )
         ),
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Section title" ),
            "param_name" => "title",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "" )
         ),
         array(
           "group" => "Options",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Title Color"),
           "param_name" => "title_color",
           "description" => esc_attr__(""),
           "value" => esc_attr__("")
         ),
         array(
            "group" => "Options",
             "dependency" => array(
                'element' => 'custom_style',
                'value' => array( 'add_custom_style'),
             ),
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Title font size" ),
            "param_name" => "title_font_size",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "Enter the value with pixels (Example: 20px)" )
         ),
         array(
            "group" => "Options",
             "dependency" => array(
                'element' => 'custom_style',
                'value' => array( 'add_custom_style'),
             ),
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Title font weight" ),
            "param_name" => "title_font_weight",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "Enter the value of the font weight" )
         ),
         array(
            "group" => "Options",
             "dependency" => array(
                'element' => 'custom_style',
                'value' => array( 'add_custom_style'),
             ),
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Title line height" ),
            "param_name" => "title_line_height",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "Enter the value with pixels (Example: 25px)" )
         ),
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Section subtitle" ),
            "param_name" => "subtitle",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "" )
         ),
         array(
           "group" => "Options",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Subtitle Color"),
           "param_name" => "subtitle_color",
           "description" => esc_attr__(""),
           "value" => esc_attr__("")
        ),
         array(
            "group" => "Options",
             "dependency" => array(
                'element' => 'custom_style',
                'value' => array( 'add_custom_style'),
             ),
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Subtitle font size" ),
            "param_name" => "subtitle_font_size",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "Enter the value with pixels (Example: 20px)" )
         ),
         array(
            "group" => "Options",
             "dependency" => array(
                'element' => 'custom_style',
                'value' => array( 'add_custom_style'),
             ),
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Subtitle font weight" ),
            "param_name" => "subtitle_font_weight",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "Enter the value of the font weight" )
         ),
         array(
            "group" => "Options",
             "dependency" => array(
                'element' => 'custom_style',
                'value' => array( 'add_custom_style'),
             ),
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Subtitle line height" ),
            "param_name" => "subtitle_line_height",
            "value" => esc_attr__( "" ),
            "description" => esc_attr__( "Enter the value with pixels (Example: 25px)" )
         ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Alignment"),
           "param_name" => "align",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('Align Right')     => 'align_right',
            esc_attr__('Align Center')     => 'align_center',
            esc_attr__('Align Left')     => 'align_left'
           )
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("With/Without border"),
           "param_name" => "border_or_not",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('Choose an option')     => 'choose_with_without_border',
            esc_attr__('With border')     => 'with_border',
            esc_attr__('Without border')     => 'without_border'
           )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
         
       )
    ));
}