<?php
/**
 * The template for displaying the footer.
 *
*/

$containerGrid = '';
if(bellavita_redux('footer_in_grid') == true){
	$containerGrid = 'container';
} ?>

    <?php if ( !class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
        <!-- BACK TO TOP BUTTON -->
        <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
    <?php } else { ?>
        <?php if (bellavita_redux('mt_backtotop_status') == true) { ?>
            <!-- BACK TO TOP BUTTON -->
            <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
                <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
            </a>
        <?php } ?>
    <?php } ?>


    <!-- FOOTER -->
    <?php $theme_init = new bellavita_init_class; ?>
    <footer class="<?php echo esc_attr($theme_init->bellavita_get_footer_variant()); ?>">

        <!-- FOOTER TOP -->
        <div class="row footer-top">
            <div class="<?php echo esc_attr($containerGrid); ?>">
            <?php          
                //FOOTER ROW #1
                echo wp_kses_post(bellavita_footer_row1());
                //FOOTER ROW #2
                echo wp_kses_post(bellavita_footer_row2());
                //FOOTER ROW #3
                echo wp_kses_post(bellavita_footer_row3());
             ?>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="footer-div-parent">
            <div class="<?php echo esc_attr($containerGrid); ?> footer">
                <div class="row">
                    <div class="col-md-6">
                    	<p class="copyright text-left">
                           <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                                <?php echo wp_kses_post(bellavita_redux('mt_footer_text')); ?>
                            <?php }else{ ?>
                                <?php echo esc_html__('Copyright 2018 by ModelTheme. All Rights Reserved.', 'bellavita'); ?>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-6"> 
                        <ul class="social-links">
                            <?php if ( bellavita_redux('mt_social_fb') && bellavita_redux('mt_social_fb') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_tw') && bellavita_redux('mt_social_tw') != '' ) { ?>
                                <li><a href="https://twitter.com/<?php echo esc_attr( bellavita_redux('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_gplus') && bellavita_redux('mt_social_gplus') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_youtube') && bellavita_redux('mt_social_youtube') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_pinterest') && bellavita_redux('mt_social_pinterest') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_linkedin') && bellavita_redux('mt_social_linkedin') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_skype') && bellavita_redux('mt_social_skype') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_skype') ) ?>"><i class="fa fa-skype"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_instagram') && bellavita_redux('mt_social_instagram') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_dribbble') && bellavita_redux('mt_social_dribbble') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_deviantart') && bellavita_redux('mt_social_deviantart') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_digg') && bellavita_redux('mt_social_digg') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_digg') ) ?>"><i class="fa fa-digg"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_flickr') && bellavita_redux('mt_social_flickr') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_stumbleupon') && bellavita_redux('mt_social_stumbleupon') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_tumblr') && bellavita_redux('mt_social_tumblr') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php } ?>
                            <?php if ( bellavita_redux('mt_social_vimeo') && bellavita_redux('mt_social_vimeo') != '' ) { ?>
                                <li><a href="<?php echo esc_url( bellavita_redux('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>



<?php wp_footer(); ?>
</body>
</html>