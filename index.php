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
?>

<div class="wrapper">
    <div class="container">
        <!-- Banner -->
        <div class="banner">
            <div class="banner-slider">
                <div class="banner-slider-item">
                    <img src="<?php the_field('slider', 'option'); ?>" alt="Slider">
                    <img src="<?php the_field('slider_2', 'option'); ?>" alt="Slider">
                    <img src="<?php the_field('slider_3', 'option'); ?>" alt="Slider">
                </div>
                <div class="button-slider">
                    <button class="previous"><i class="fas fa-arrow-left"></i></button>
                    <button class="next"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="banner-right">
                <div class="banner-right-top">
                    <img src="<?php the_field('banner_1', 'option'); ?>" alt="Banner 1">
                    <a href="<?php the_field('link_banner_head_1', 'option'); ?>"><div class="button-banner bn1"><?php the_field('text_banner_1', 'option'); ?></div></a>
                </div>
                <div class="banner-right-bottom">
                    <img src="<?php the_field('banner_2', 'option'); ?>" alt="Banner 2">
                    <a href="<?php the_field('link_banner_head_2', 'option'); ?>"><div class="button-banner bn2"><?php the_field('text_banner_2', 'option'); ?></div></a>
                </div>
            </div>
        </div>
        <!-- End Banner -->
        <!-- step -->
        <div class="title-step">
            <p><i class="title-step-left"></i>4 easy steps<i class="title-step-right"></i></p>
        </div>
        <div class="step">
            <div class="step-item">
                <div class="step-item-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/step-1.png" alt="Item">
                </div>
                <div class="step-item-1">1. Select the product you want to sell</div>
                <div class="step-item-2">We purchase a wide range of products. You can check the product list on each page.</div>
            </div>
            <div class="step-item">
                <div class="step-item-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/step-2.png" alt="Item">
                </div>
                <div class="step-item-1">2. Enter your customer information</div>
                <div class="step-item-2">We purchase a wide range of products. You can check the product list on each page.</div>
            </div>
            <div class="step-item">
                <div class="step-item-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/step-3.png" alt="Item">
                </div>
                <div class="step-item-1">3. Select a payment method</div>
                <div class="step-item-2">We purchase a wide range of products. You can check the product list on each page.</div>
            </div>
            <div class="step-item">
                <div class="step-item-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/step-4.png" alt="Item">
                </div>
                <div class="step-item-1">4. Confirm the request</div>
                <div class="step-item-2">We purchase a wide range of products. You can check the product list on each page.</div>
            </div>
        </div>
        <!-- step end -->
        <!-- product -->
        <div class="product">
            <div class="product-title">
                <div class="product-title-left">
                    <i class="fas fa-dot-circle"></i>
                    <div class="title">Strengthening purchase</div>
                </div>
                <div class="product-title-right">
                    <a href="#">Show all <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <!-- Product slick -->
            <div class="product-item">
            <?php
            $args = array(
                'post_type' => 'product',
                'meta_key' => 'total_sales',
                // 'orderby' => 'meta_value_num',
                'order' => 'desc',
            );
            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                global $product;
            ?>
                <div class="product-item-area">
                    <a href="<?php echo get_permalink() ?>">
                    <div class="product-item-img">
                        <?php echo woocommerce_get_product_thumbnail() ?>
                    </div>
                    <div class="product-text">
                        <div class="product-item-code"><?php echo $product->get_sku(); ?></div>
                        <div class="product-item-name"><?php the_title() ?></div>
                        </a>
                        <div class="product-item-end">
                            <div class="product-price"><?php echo $product->get_price(); ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                            <div class="product-stock">Quantity <?php echo $product->get_stock_quantity(); ?></div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>
            </div>
            <div class="button-product">
                <button class="previous_p"><i class="fas fa-arrow-left"></i></button>
                <button class="next_p"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        <!-- end product -->
        <!-- Banner 2 -->
        <section class="banner-2">
            <div class="banner-left-2 ">
                <img src="<?php the_field('banner_footer_left', 'option'); ?>" alt="Banner 2">
                <a href="<?php the_field('link_banner_left', 'option'); ?>"><button class="button-banner-2 btn1"><?php the_field('banner_footer_text_left', 'option'); ?></button></a>
            </div>
            <div class="banner-center-2">
                <div class="banner-center-top col-2">
                    <img src="<?php the_field('banner_footer_center_1', 'option'); ?>" alt="Banner 2">
                    <a href="<?php the_field('link_banner_center_1', 'option'); ?>"><button class="button-banner-2 btn2"><?php the_field('banner_footer_text_center_1', 'option'); ?></button></a>
                </div>
                <div class="banner-center-bottom col-2">
                    <div class="banner-center-bottom-1">
                        <img src="<?php the_field('banner_footer_center_2', 'option'); ?>" alt="B2">
                        <a href="<?php the_field('link_banner_center_2', 'option'); ?>"><button class="button-banner-2 btn2"><?php the_field('banner_footer_text_center_2', 'option'); ?></button></a>
                    </div>
                    <div class="banner-center-bottom-2 ">
                        <img src="<?php the_field('banner_footer_center_3', 'option'); ?>" alt="B2">
                        <a href="<?php the_field('link_banner_center_3', 'option'); ?>"><button class="button-banner-2 btn2"><?php the_field('banner_footer_text_center_3', 'option'); ?></button></a>
                    </div>
                </div>
            </div>
            <div class="banner-right-2">
                <img src="<?php the_field('banner_footer_right', 'option'); ?>" alt="">
                <a href="<?php the_field('link_banner_right', 'option'); ?>"><button class="button-banner-2 btn1"><?php the_field('banner_footer_text_right', 'option'); ?></button></a>
            </div>
        </section>
        <!-- End Banner 2 -->
        <div class="about-us">
            <div class="about-us-img">
                <img src="<?php the_field('contact-us-img', 'option'); ?>" alt="About Us">
            </div>
            <div class="about-us-content">
                <div class="a-title"><?php the_field('contact_us_title', 'option'); ?></div>
                <p class="a-content">
                <?php the_field('contact_us_text', 'option'); ?>
                </p>
                <a href="#" class="a-button">Contact Us</a>
            </div>
        </div>
    </div>
</div>

<?php
get_sidebar();
get_footer();
