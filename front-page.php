<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Japan_Anti_Virus
 */

get_header();



echo '<div class="wrapper">
<div class="container">';
// Check value exists.
if( have_rows('page_builder') ): 

    // Loop through rows.
    while ( have_rows('page_builder') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'module_slider' ):
            
            get_template_part('template-parts/flexible-content/home/module', 'slider');
            
            // Do something...

        // Case: Download layout.
        elseif( get_row_layout() == 'module_step' ): 
            // $file = get_sub_field('module_follow');
            get_template_part('template-parts/flexible-content/home/module', 'step');
    
        elseif( get_row_layout() == 'module_product' ): 
            // $file = get_sub_field('module_follow');
            get_template_part('template-parts/flexible-content/home/module', 'product');

        elseif( get_row_layout() == 'module_banner' ): 
            // $file = get_sub_field('module_follow');
            get_template_part('template-parts/flexible-content/home/module', 'banner');

        elseif( get_row_layout() == 'module_about_us' ): 
            // $file = get_sub_field('module_follow');
            get_template_part('template-parts/flexible-content/home/module', 'about-us');
    
        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
echo '</div></div>';

get_sidebar();
get_footer();
