<?php
/**
 * The template for displaying categories results pages.
 *
 */

get_header(); 



$class_row = "col-md-8";
if ( bellavita_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class_row = "col-md-12";
}elseif ( bellavita_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or bellavita_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class_row = "col-md-8";
}
$sidebar = bellavita_redux('mt_blog_layout_sidebar');


// Theme Init
$theme_init = new bellavita_init_class;
?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo wp_kses_post(bellavita_header_title_breadcrumbs()); ?>

    <!-- Page content -->
    <div class="high-padding">
        <!-- Blog content -->
        <div class="container blog-posts">
            <div class="row">

                <?php if ( bellavita_redux('mt_blog_layout') != '' && bellavita_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                    <?php if (is_active_sidebar($sidebar)) { ?>
                        <div class="col-md-4 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
                    <?php } ?>
                <?php } ?>

                <div class="<?php echo esc_attr($class_row); ?> main-content">
                <?php if ( have_posts() ) : ?>
                    <div class="row">

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
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
                </div>

                <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                    <?php if ( bellavita_redux('mt_blog_layout') != '' && bellavita_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <div class="col-md-4 sidebar-content">
                                <?php dynamic_sidebar( $sidebar ); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="col-md-4 sidebar-content">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>