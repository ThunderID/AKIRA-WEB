<?php

if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}


/**
||-> bellavita_redux
*/
function bellavita_redux($redux_meta_name1,$redux_meta_name2 = ''){

    global  $bellavita_redux;

    $html = '';
    if (isset($redux_meta_name1) && !empty($redux_meta_name2)) {
        $html = $bellavita_redux[$redux_meta_name1][$redux_meta_name2];
    }elseif(isset($redux_meta_name1) && empty($redux_meta_name2)){
        $html = $bellavita_redux[$redux_meta_name1];
    }
    
    return $html;

}


/**
||-> bellavita_setup
*/
function bellavita_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on bellavita, use a find and replace
     * to change 'bellavita' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'bellavita', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary menu', 'bellavita' )
    ) );

    global  $bellavita_redux;

    // ADD THEME SUPPORT
    // OTHER SUPPORT
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    // Enable support for Post Formats.
    add_theme_support( 'custom-background', apply_filters( 'smartowl_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );// Set up the WP core custom background feature.

}
add_action( 'after_setup_theme', 'bellavita_setup' );


/**
||-> Register widget areas.
*/
function bellavita_widgets_init() {

    global  $bellavita_redux;

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bellavita' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Main Theme Sidebar', 'bellavita' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_attr__( 'Woocommerce sidebar', 'bellavita' ),
        'id'            => 'woocommerce',
        'description'   => esc_attr__( 'Used on WooCommerce pages', 'bellavita' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    if (!empty($bellavita_redux['mt_dynamic_sidebars'])){
        foreach ($bellavita_redux['mt_dynamic_sidebars'] as &$value) {
            $id           = str_replace(' ', '', $value);
            $id_lowercase = strtolower($id);
            if ($id_lowercase) {
                register_sidebar( array(
                    'name'          => esc_attr($value),
                    'id'            => esc_attr($id_lowercase),
                    'description'   => esc_html__( 'Sidebar ', 'bellavita' ) . esc_attr($value),
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }
    
    // FOOTER ROW 1
    if (isset($bellavita_redux['mt_footer_row_1_layout'])) {
        $footer_row_1 = $bellavita_redux['mt_footer_row_1_layout'];
        $nr1 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_1, $nr1)) {
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_half_sub_half' || $footer_row_1 == 'column_sub_half_half') {
            $footer_row_1 = '3';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ', 'bellavita' ) . esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_sub_fourth_third' || $footer_row_1 == 'column_third_sub_fourth') {
            $footer_row_1 = '5';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_1 == 'column_sub_third_half' || $footer_row_1 == 'column_half_sub_third') {
            $footer_row_1 = '4';
            for ($i=1; $i <= $footer_row_1 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_1_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }

    // FOOTER ROW 2
    if (isset($bellavita_redux['mt_footer_row_2_layout'])) {
        $footer_row_2 = $bellavita_redux['mt_footer_row_2_layout'];
        $nr2 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_2, $nr2)) {
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_half_sub_half' || $footer_row_2 == 'column_sub_half_half') {
            $footer_row_2 = '3';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_sub_fourth_third' || $footer_row_2 == 'column_third_sub_fourth') {
            $footer_row_2 = '5';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_2 == 'column_sub_third_half' || $footer_row_2 == 'column_half_sub_third') {
            $footer_row_2 = '4';
            for ($i=1; $i <= $footer_row_2 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_2_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }

    // FOOTER ROW 3
    if (isset($bellavita_redux['mt_footer_row_3_layout'])) {
        $footer_row_3 = $bellavita_redux['mt_footer_row_3_layout'];
        $nr3 = array("1", "2", "3", "4", "5", "6");
        if (in_array($footer_row_3, $nr3)) {
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ', 'bellavita').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_half_sub_half' || $footer_row_3 == 'column_sub_half_half') {
            $footer_row_3 = '3';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_sub_fourth_third' || $footer_row_3 == 'column_third_sub_fourth') {
            $footer_row_3 = '5';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }elseif ($footer_row_3 == 'column_sub_third_half' || $footer_row_3 == 'column_half_sub_third') {
            $footer_row_3 = '4';
            for ($i=1; $i <= $footer_row_3 ; $i++) { 
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','bellavita').esc_attr($i),
                    'id'            => 'footer_row_3_'.esc_attr($i),
                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'bellavita' ) . esc_attr($i). esc_html__( '(This sidebar has been generated from Theme Panel -> Footer)', 'bellavita' ),
                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>',
                ) );
            }
        }
    }
}
add_action( 'widgets_init', 'bellavita_widgets_init' );


/**
||-> Enqueue scripts and styles.
*/
function bellavita_scripts() {

    global  $bellavita_redux;

    //STYLESHEETS
    wp_enqueue_style( "font-awesome", get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( "bellavita-responsive", get_template_directory_uri().'/css/responsive.css' );
    wp_enqueue_style( "bellavita-media-screens", get_template_directory_uri().'/css/media-screens.css' );
    wp_enqueue_style( "owl-carousel", get_template_directory_uri().'/css/owl.carousel.css' );
    wp_enqueue_style( "animate", get_template_directory_uri().'/css/animate.css' );
    wp_enqueue_style( "bellavita-styles", get_template_directory_uri().'/css/styles.css' );
    wp_enqueue_style( "bellavita-style", get_stylesheet_uri() );
    wp_enqueue_style( "bellavita-styles-module-blogloops", get_template_directory_uri().'/css/styles-module-blogloops.css' );
    wp_enqueue_style( "bellavita-styles-module-navigations", get_template_directory_uri().'/css/styles-module-navigations.css' );
    wp_enqueue_style( "bellavita-styles-headers", get_template_directory_uri().'/css/styles-headers.css' );
    wp_enqueue_style( "bellavita-styles-footer", get_template_directory_uri().'/css/styles-footer.css' );
    wp_enqueue_style( "loaders", get_template_directory_uri().'/css/loaders.css' );
    wp_enqueue_style( "simple-line-icons", get_template_directory_uri().'/css/simple-line-icons.css' );
    wp_enqueue_style( "js_composer", get_template_directory_uri().'/css/js_composer.css' );

    //SCRIPTS
    wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '2.6.2', true );
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'), '3.51.0', true );
    wp_enqueue_script( 'jquery-ketchup', get_template_directory_uri() . '/js/jquery.ketchup.js', array('jquery'), '0.3.1', true );
    wp_enqueue_script( 'jquery-validation', get_template_directory_uri() . '/js/jquery.validation.js', array('jquery'), '1.13.1', true );
    wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'uisearch', get_template_directory_uri() . '/js/uisearch.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array('jquery'), '1.1.3', true );
    wp_enqueue_script( 'jquery.appear', get_template_directory_uri() . '/js/jquery.appear.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery.countTo', get_template_directory_uri() . '/js/jquery.countTo.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'modernizr-viewport', get_template_directory_uri() . '/js/modernizr.viewport.js', array('jquery'), '2.6.2', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.1', true );
    wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/animate.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'loaders', get_template_directory_uri() . '/js/loaders.css.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bellavita-custom-js', get_template_directory_uri() . '/js/bellavita-custom.js', array('jquery'), '1.0.0', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bellavita_scripts' );


/**
||-> Enqueue admin css/js
*/
function bellavita_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( "bellavita-admin-scripts", get_template_directory_uri().'/js/bellavita-admin-scripts.js' , array( 'jquery' ) );
    wp_enqueue_script( "loaders", get_template_directory_uri().'/js/loaders.css.js' , array( 'jquery' ) );
    // CSS
    wp_enqueue_style( "bellavita-admin-style", get_template_directory_uri().'/css/admin-style.css' );
    wp_enqueue_style( "loaders", get_template_directory_uri().'/css/loaders.css' );
}
add_action('admin_enqueue_scripts', 'bellavita_enqueue_admin_scripts');


/**
||-> Enqueue css to js_composer
*/
add_action( 'vc_base_register_front_css', 'bellavita_enqueue_front_css_foreever' );
function bellavita_enqueue_front_css_foreever() {
    wp_enqueue_style( 'js_composer_front' );
}


/**
||-> Enqueue css to redux
*/
function bellavita_register_fontawesome_to_redux() {
    wp_register_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), time(), 'all' );  
    wp_enqueue_style( 'font-awesome' );
}
add_action( 'redux/page/redux_demo/enqueue', 'bellavita_register_fontawesome_to_redux' );


/**
||-> Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
*/
add_action( 'vc_before_init', 'bellavita_vcSetAsTheme' );
function bellavita_vcSetAsTheme() {
    vc_set_as_theme( true );
}


/**
||-> Other required parts/files
*/
/* ========= LOAD CUSTOM FUNCTIONS ===================================== */
require_once get_template_directory() . '/inc/custom-functions.php';
require_once get_template_directory() . '/inc/custom-functions.header.php';
require_once get_template_directory() . '/inc/custom-functions.footer.php';
/* ========= Customizer additions. ===================================== */
require_once get_template_directory() . '/inc/customizer.php';
/* ========= Load Jetpack compatibility file. ===================================== */
require_once get_template_directory() . '/inc/jetpack.php';
/* ========= Include the TGM_Plugin_Activation class. ===================================== */
require_once get_template_directory() . '/inc/tgm/include_plugins.php';
/* ========= LOAD - REDUX - FRAMEWORK ===================================== */
require_once get_template_directory() . '/redux-framework/modeltheme-config.php';
/* ========= CUSTOM COMMENTS ===================================== */
require_once get_template_directory() . '/inc/custom-comments.php';
/* ========= THEME DEFAULTS ===================================== */
require_once get_template_directory() . '/inc/theme-defaults.php';


/**
||-> add_image_size //Resize images
*/
/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'bellavita_related_post_pic500x300', 500, 300, true );
add_image_size( 'bellavita_post_pic700x450',         700, 450, true );
add_image_size( 'bellavita_post_widget_pic100x100',  100, 100, true );
add_image_size( 'bellavita_about_625x415',           625, 415, true );
add_image_size( 'bellavita_listing_archive_featured_square',    600, 370, true );
add_image_size( 'bellavita_listing_archive_featured',    800, 500, true );
add_image_size( 'bellavita_listing_archive_thumbnail',   300, 180, true );
add_image_size( 'bellavita_listing_single_featured',     1200, 200, true );
add_image_size( 'bellavita_post_archived',     800, 900, true );

// Blogloop-v2
add_image_size( 'bellavita_blog_1000x550',           1000, 550, true );




/**
||-> LIMIT POST CONTENT
*/
function bellavita_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}


/**
||-> BREADCRUMBS
*/
function bellavita_breadcrumb() {
    
    $delimiter = '';
    $html =  '';

    $name = esc_html__("Home", "bellavita");
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';

        if (!is_home() && !is_front_page() || is_paged()) {
            global  $post;
            $home = esc_url(home_url('/'));
            $html .= '<li><a href="' . esc_url($home) . '">' . esc_attr($name) . '</a></li> ' . esc_attr($delimiter) . '';
        
        if (is_category()) {
            global  $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0)
            $html .= (get_category_parents($parentCat, true, '' . esc_attr($delimiter) . ''));
            $html .= $currentBefore . single_cat_title('', false) . $currentAfter;
        }elseif (is_tax()) {
            global  $wp_query;
            $html .= $currentBefore . single_cat_title('', false) . $currentAfter;
        } elseif (is_day()) {
            $html .= '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . esc_attr($delimiter) . '';
            $html .= '<li><a href="' . esc_url(get_month_link(get_the_time('Y')), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . esc_attr($delimiter) . ' ';
            $html .= $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month()) {
            $html .= '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li> ' . esc_attr($delimiter) . '';
            $html .= $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year()) {
            $html .= $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_attachment()) {
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (class_exists( 'WooCommerce' ) && is_shop()) {
            $html .= $currentBefore;
            $html .= esc_html__('Shop','bellavita');
            $html .= $currentAfter;
        }elseif (class_exists( 'WooCommerce' ) && is_product()) {

            global  $post;
            $cat = get_the_terms( $post->ID, 'product_cat' );
            foreach ($cat as $categoria) {
                if ($categoria) {
                    if($categoria->parent == 0){

                        // Get the ID of a given category
                        $category_id = get_cat_ID( $categoria->name );

                        // Get the URL of this category
                        $category_link = get_category_link( $category_id );

                        $html .= '<li><a href="'.esc_url('#').'">' . esc_attr($categoria->name) . '</a></li>';
                        $html .= esc_url($category_link);
                    }
                }
            }

            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;

        } elseif (is_single()) {
            if (get_the_category()) {
                $cat = get_the_category();
                $cat = $cat[0];
                $html .= '<li>' . get_category_parents($cat, true, ' ' . esc_attr($delimiter) . '') . '</li>';
            }
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                $html .= $crumb . ' ' . esc_attr($delimiter) . ' ';
            $html .= $currentBefore;
            $html .= get_the_title();
            $html .= $currentAfter;
        } elseif (is_search()) {
            $html .= $currentBefore . get_search_query() . $currentAfter;
        } elseif (is_tag()) {
            $html .= $currentBefore . single_tag_title( '', false ) . $currentAfter;
        } elseif (is_author()) {
            global  $author;
            $userdata = get_userdata($author);
            $html .= $currentBefore . $userdata->display_name . $currentAfter;
        } elseif (is_404()) {
            $html .= $currentBefore . esc_html__('404 Not Found','bellavita') . $currentAfter;
        }
        if (get_query_var('paged')) {
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                $html .= $currentBefore;
            $html .= esc_html__('Page','bellavita') . ' ' . get_query_var('paged');
            if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                $html .= $currentAfter;
        }
    }

    return $html;
}



/**
||-> FUNCTION: ADD EDITOR STYLE
*/
function bellavita_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'bellavita_add_editor_styles' );



/**
||-> REMOVE PLUGINS NOTIFICATIONS and NOTICES
*/
// |---> REVOLUTION SLIDER
if(function_exists( 'set_revslider_as_theme' )){
    add_action( 'init', 'bellavita_disable_revslider_update_notices' );
    function bellavita_disable_revslider_update_notices() {
        set_revslider_as_theme();
    }
}


// |---> REDUX FRAMEWORK
function bellavita_RemoveDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'bellavita_RemoveDemoModeLink');

?>