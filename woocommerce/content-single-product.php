<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
	
	<div class="product-left">
		<div class="content-in-product summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
		<div class="summary entry-summary step-in-product">
			<div class="easy-step">
				<div class="title">4 easy steps</div>
				<div class="box-item">
					<div class="icon-step">
						<img src="<?php echo get_template_directory_uri(); ?>/img/product_step_1.png" alt="step">
					</div>
					<div class="content">
						<p class="main-content">Select the product you want to sell ・ Go to the cart</p>
						<p class="des-content">We purchase a wide range of products. You can check the product list on each page.</p>
					</div>
				</div>
				<div class="box-item">
					<div class="icon-step">
						<img src="<?php echo get_template_directory_uri(); ?>/img/product_step_2.png" alt="step">
					</div>
					<div class="content">
						<p class="main-content">Enter customer information</p>
						<p class="des-content">Please enter your contact information.</p>
					</div>
				</div>
				<div class="box-item">
					<div class="icon-step">
						<img src="<?php echo get_template_directory_uri(); ?>/img/product_step_3.png" alt="step">
					</div>
					<div class="content">
						<p class="main-content">Select payment method</p>
						<p class="des-content">Purchased products will be paid according to the customer's request.</p>
					</div>
				</div>
				<div class="box-item">
					<div class="icon-step">
						<img src="<?php echo get_template_directory_uri(); ?>/img/product_step_4.png" alt="step">
					</div>
					<div class="content">
						<p class="main-content">confirm for request</p>
						<p class="des-content">We will get back to you within 24 hours of confirming your order.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
