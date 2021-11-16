<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Japan_Anti_Virus
 */

?>

<footer class="container">
	<div class="box-footer">
		<div class="box-footer-item">
			<div class="box-footer-img">
				<img src="<?php echo get_template_directory_uri() ?>/img/box-footer-3.png" alt="Box 1">
			</div>
			<div class="box-content">
				<p class="box-content-des">
					Isesaki Main Store:
				</p>
				<p class="box-content-info">
				<?php echo get_theme_mod( 'phone' ); ?>
				</p>
			</div>
		</div>
		<div class="box-footer-item">
			<div class="box-footer-img">
				<img src="<?php echo get_template_directory_uri() ?>/img/box-footer-2.png" alt="Box 2">
			</div>
			<div class="box-content">
				<p class="box-content-des">
					Reception time:
				</p>
				<p class="box-content-info">
				<?php echo get_theme_mod( 'rtime' ); ?>
				</p>
			</div>
		</div>
		<div class="box-footer-item">
			<div class="box-footer-img">
				<img src="<?php echo get_template_directory_uri() ?>/img/box-footer-1.png" alt="Box 3">
			</div>
			<div class="box-content">
				<p class="box-content-des">
					Receive e-mail newsletter
				</p>
				<p class="box-content-input">
					<input type="email" placeholder="Email address">
					<input type="submit" value="➜">
				</p>
			</div>
		</div>
	</div>
	<!-- Main footer -->
	<div class="footer-main">
		<div class="footer-store">
			<div class="footer-title">Star shop Isesaki Hongten</div>
			<li>
				<div class="p-left">Location:</div> 
				 <div class="p-right">
					 <p>〒372-0827</p>
					1597-2 Yatsutajimamachi, Isesaki City, Gunma Prefecture
				 </div>
			</li>
			<li>
				<div class="p-left">Phone:</div> 
				 <div class="p-right">
					0270-61-9899
				 </div>
			</li>
			<li>
				<div class="p-left">Email:</div> 
				 <div class="p-right">
					info@st​​arshop-kaitori.email
				 </div>
			</li>
			<div class="follow-us">
				<p>Follow us</p>
				<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
			</div>
		</div>
		<div class="footer-menu">
			<div class="footer-title">MENU</div>
			<ul>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
					)
				); 
			?>
			</ul>
		</div>
		<div class="footer-category">
			<div class="footer-title">All categories</div>
			<div class="footer-category__inside">
			<!-- <ul>
				<li>Cosmetics</li>
				<li>Healthy food</li>
				<li>Other</li>
				<li>Baby products</li>
				<li>Strengthening purchase</li>
				<li>Daily necessities</li>
				<li>Food</li>
				<li>Beverage</li>
			</ul> -->
			<ul>
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
				<?php //$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

				//if(intval($thumbnail_id) > 0) {
					//echo wp_get_attachment_url($thumbnail_id);
				//}

				
				?>
					<li><a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
						<?php echo $term->name; ?>
					</a></li><?php
				}
			} 
			?>
			</ul>
			</div>
		</div>
		<div class="footer-info">
			<div class="footer-title">Information</div>
			<ul>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer-information',
					)
				); 
			?>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="footer-end">
			<p><?php echo get_theme_mod( 'copyright-1' ); ?></p>
			<p><?php echo get_theme_mod( 'copyright-2' ); ?></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
