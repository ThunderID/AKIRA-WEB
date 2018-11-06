<?php

//GET HEADER TITLE/BREADCRUMBS AREA
function bellavita_header_title_breadcrumbs(){

    $html = '';
    $html .= '<div class="header-title-breadcrumb relative">';
        $html .= '<div class="header-title-breadcrumb-overlay text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-sm-6 col-xs-6 text-left">';
                                    if (is_single()) {
                                        $html .= '<h1>'.esc_html__( 'Blog', 'bellavita' ) . get_search_query().'</h1>';
                                    }elseif (is_page()) {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }elseif (is_search()) {
                                        $html .= '<h1>'.esc_html__( 'Search Results for: ', 'bellavita' ) . get_search_query().'</h1>';
                                    }elseif (is_category()) {
                                        $html .= '<h1>'.esc_html__( 'Category: ', 'bellavita' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                    }elseif (is_tag()) {
                                        $html .= '<h1>'.esc_html__( 'Tag Archives: ', 'bellavita' ) . single_tag_title( '', false ).'</h1>';
                                    }elseif (is_author() || is_archive()) {
                                        $html .= '<h1>'.get_the_archive_title() . get_the_archive_description().'</h1>';
                                    }elseif (is_home()) {
                                        $html .= '<h1>'.esc_html__( 'From the Blog', 'bellavita' ).'</h1>';
                                    }else {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }
                      $html .= '</div>
                                <div class="col-md-5 col-sm-6 col-xs-6">
                                    <ol class="breadcrumb text-right">'.bellavita_breadcrumb().'</ol>                    
                                </div>
                            </div>
                        </div>
                    </div>';

    $html .= '</div>';
    $html .= '<div class="clearfix"></div>';

    return $html;
}

?>