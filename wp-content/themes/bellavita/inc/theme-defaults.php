<?php
/**
||-> Defining Default datas
*/
function bellavita_init_function( $key = null ){

    $bellavita_init = array(
        /* Blog Variant
        Choose from: blogloop-v1, blogloop-v2, blogloop-v3, blogloop-v4, blogloop-v5 */
        'blog_variant' => 'blogloop-v2',
        /* Header Variant 
        Choose from: header1, header2, header3, header4, header5, header8, header9 */
        'header_variant' => 'header3',
        /* Footer Variant 
        Choose from: footer1, footer2 */
        'footer_variant' => 'footer2',
        /* Header Navigation Hover
        Choose from: navstyle-v1, navstyle-v2, navstyle-v3, navstyle-v4, navstyle-v5, navstyle-v6, navstyle-v7, navstyle-v8 */
        'header_nav_hover' => 'navstyle-v1',
        /* Header Navigation Submenus Variant
        Choose from: nav-submenu-style1, nav-submenu-style2 */
        'header_nav_submenu_variant' => 'nav-submenu-style2',
        /* Sidebar Widgets Defaults
        Choose from: widgets_v1, widgets_v2 */
        'sidebar_widgets_variant' => 'widgets_v1',
        /* 404 Template Variant
        Choose from: page_404_v1_center, page_404_v2_left */
        'page_404_template_variant' => 'page_404_v1_center',
        /* Default Styling
        Set a HEXA Color Code */
        'fallback_primary_color' => '#75dbb3', // Primary Color
        'fallback_primary_color_hover' => '#53c095', // Primary Color - Hover
        'fallback_main_texts' => '#252525', // Main Texts Color
        'fallback_semitransparent_blocks' => 'rgba(155, 89, 182, 0.7)' // Semitransparent Blocks
    );

    // The Condition
    if ( is_null($key) ){
        return $bellavita_init;
    } else if ( array_key_exists($key, $bellavita_init) ) {
        return $bellavita_init[$key];
    }
}

class bellavita_init_class{
    public function bellavita_get_blog_variant(){
        return bellavita_init_function('blog_variant');
    }
    public function bellavita_get_header_variant(){
        return bellavita_init_function('header_variant');
    }
    public function bellavita_get_footer_variant(){
        return bellavita_init_function('footer_variant');
    }
    public function bellavita_get_header_nav_hover(){
        return bellavita_init_function('header_nav_hover');
    }
    public function bellavita_get_header_nav_submenu_variant(){
        return bellavita_init_function('header_nav_submenu_variant');
    }
    public function bellavita_get_sidebar_widgets_variant(){
        return bellavita_init_function('sidebar_widgets_variant');
    }
    public function bellavita_get_page_404_template_variant(){
        return bellavita_init_function('page_404_template_variant');
    }
    public function bellavita_get_fallback_primary_color(){
        return bellavita_init_function('fallback_primary_color');
    }
    public function bellavita_get_fallback_primary_color_hover(){
        return bellavita_init_function('fallback_primary_color_hover');
    }
    public function bellavita_get_fallback_main_texts(){
        return bellavita_init_function('fallback_main_texts');
    }
    public function bellavita_get_fallback_semitransparent_blocks(){
        return bellavita_init_function('fallback_semitransparent_blocks');
    }

    // Blog Loop Variant
    public function bellavita_blogloop_variant(){
        if ( !class_exists( 'ReduxFrameworkPlugin' ) ) {
            $theme_init = new bellavita_init_class;
            return $theme_init->bellavita_get_blog_variant();
        }else{
            // GET VALUE FROM REDUX - THEME PANEL
            $redux_blogloop = bellavita_redux('mt_blogloop_variant');
            return $redux_blogloop;
        }
    }

    // Navstyle Variant
    public function bellavita_navstyle_variant(){
    	if ( !class_exists( 'ReduxFrameworkPlugin' ) ) {
			$theme_init = new bellavita_init_class;
    		return $theme_init->bellavita_get_header_nav_hover();
    	}else{
    		// GET VALUE FROM REDUX - THEME PANEL
            $redux_navstyle = bellavita_redux('mt_nav_hover_variant');
    		return $redux_navstyle;
    	}
    }
}

?>