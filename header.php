<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Japan_Anti_Virus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Header Top -->
<div class="header-top">
        <div class="container">
            <div class="header-top-lang">
                <div class="dropdown">
                    <h3>LANGUGAE</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/united-states.png" alt="JP"><i class="fas fa-caret-down"></i>
                </div>
                <div class="dropdown-content">
                    <div class="img-lang">
                        <a href="#JP"><img src="<?php echo get_template_directory_uri(); ?>/img/japan.png" alt="JP">Japan</a>
                    </div>
                    <div class="img-lang">
                        <a href="#US"><img src="<?php echo get_template_directory_uri(); ?>/img/united-states.png" alt="US">English</a>
                    </div>
                    <div class="img-lang">
                        <a href="#VN"><img src="<?php echo get_template_directory_uri(); ?>/img/vietnam.png" alt="VN">Vietnam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->
    <!-- Header Middle -->
    <div class="container">
        <div class="row">
            <div class="header-left">
                <div class="logo">
                    <?php 
					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					}
					?>
                </div>
                <div class="category">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
                        $pro = $_GET['s_cat'] ?? '';
                        $args = array(
							'show_option_all' => 'All categorys',
							'orderby' => 'name',
							'echo' => 1,
                            'name' => 's_cat',							
							'hierarchical' => true,
							'value_field' => 'slug',
							'taxonomy' => 'product_cat',
						);
                        if( $pro ) {
                            // 'selected' => $pro,
                            $args['selected'] = $pro;
                        }
						wp_dropdown_categories( $args );
						?>
                </div>
					<div class="search">
						<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Enter a seach keyword">
						<input type="hidden" name="post_type" value="product">
						<button type="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
					</div>
				</form>
            </div>
            <div class="header-right">
                <div class="header-right-item" id="call-item">
                    <img src="<?php echo get_theme_mod( 'call' ); ?>" alt="call">
                    <div class="text-item"  id="call">
                        <p class="text-des">Isesaki Main Store:</p>
                        <h3 class="text-info"><?php echo get_theme_mod( 'phone' ); ?></h3>
                    </div>
                </div>
                <div class="header-right-item" id="time-item">
                    <img src="<?php echo get_theme_mod( 'time' ); ?>" alt="wh">
                    <div class="text-item"  id="time">
                        <p class="text-des">Reception time:</p>
                        <h3 class="text-info"><?php echo get_theme_mod( 'rtime' ); ?></h3>
                    </div>
                </div>
            </div>
			<div class="cart-item">
				<a href="<?php echo wc_get_cart_url(); ?>">
                    <div class="cart-item-area">
                        <i class="fas fa-shopping-basket"></i>
                        <span class="total-cart"><?php 
                    $items_count = WC()->cart->get_cart_contents_count(); 
                    ?>
                        <div id="mini-cart-count"><?php echo $items_count ?></div></span>
                    </div>
                </a>
				<p><?php echo WC()->cart->get_cart_total(); ?></p>
			</div>
        </div>
    </div>
    <!-- End header Middle -->
    <!-- Nav Menu -->
    <div class="nav-menu">
        <div class="container">
            <div class="menu">
                <div class="dropdown-nav">
                    <div class="dropdown-select">
                        <svg class="cate-down" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0 1.59998H24M0 14.4H14.4M0 7.99998H9.6" stroke="white" stroke-width="2"></path> </svg>
                        <span>All categories</span> 
                    </div>
                    <div class="nav-category">
                    <?php
                    // Get the taxonomy's terms
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => false,
                        )
                    );
                    // Check if any term exists
                    if ( ! empty( $terms ) && is_array( $terms ) ) {
                        // Run a loop and print them all
                        foreach ( $terms as $term ) { ?>
                        <?php $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 


                        
                        ?>
                            <li><a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                                <?php
                                if(intval($thumbnail_id) > 0) {
                                    echo '<img src="'. wp_get_attachment_url($thumbnail_id).'"/>';
                                }
                                echo $term->name; ?>
                            </a></li><?php
                        }
                    } 
                    ?>
                    </div>
                </div>
                <!-- Menu -->
                <?php
					wp_nav_menu(
						array(
						  'theme_location' => 'header-menu',
                          'container_class' => 'menu-item',
						)
					); 
				?>
            </div>
        </div>
    </div>
    <!-- End Nav Menu -->
