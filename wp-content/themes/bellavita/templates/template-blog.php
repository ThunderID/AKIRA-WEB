<?php
/*
* Template Name: Blog
*/


get_header(); 


$class = "";

if ( bellavita_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( bellavita_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or bellavita_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-8";
}
$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off', true );
$blog_page_header = get_post_meta( get_the_ID(), 'blog_page_header', true );

$sidebar = $bellavita_redux['mt_blog_layout_sidebar'];


// Theme Init
$theme_init = new bellavita_init_class;
?>



<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo wp_kses_post(bellavita_header_title_breadcrumbs()); ?>


<!-- Page content -->

    <?php
    wp_reset_postdata();
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'paged'            => $paged,
    );
    $posts = new WP_Query( $args );
    ?>
    <!-- Blog content -->
    <div class="container blog-posts high-padding">
        
        <h2 class="blog_heading heading-bottom ">
            <?php echo wp_kses_post(bellavita_redux('mt_blog_post_title')); ?>
        </h2>
        <div class="row">

            <?php if ( bellavita_redux('mt_blog_layout') != '' && bellavita_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                    <div class="col-md-4 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">

            <?php if ( $posts->have_posts() ) : ?>
                <?php /* Start the Loop */ ?>
                <div class="row">

                    <?php /* Start the Loop */ ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <?php /* Loop - Variant 1 */ ?>
                        <?php get_template_part( 'content', $theme_init->bellavita_blogloop_variant() ); ?>
                    <?php endwhile; ?>

                    <div class="modeltheme-pagination-holder col-md-12">             
                        <div class="modeltheme-pagination pagination">             
                            <?php the_posts_pagination(); ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>
            
            <div class="clearfix"></div>

            <?php 
            global  $wp_query;
            if ($wp_query->max_num_pages != 1) { ?>                
            <div class="modeltheme-pagination-holder col-md-12">           
                <div class="modeltheme-pagination pagination">           
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
            <?php } ?>
            </div>

            <?php if ( bellavita_redux('mt_blog_layout') != '' && bellavita_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                <div class="col-md-4 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

        </div>
    </div>


<?php
get_footer();
?>