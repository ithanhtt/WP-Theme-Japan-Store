<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-img-to">
	<?php
		global $product;
		echo '<div id="woocommerce-qwerty" ><img src="'. wp_get_attachment_url( $product->get_image_id() ).'"></div>';

		$attachment_ids = $product->get_gallery_image_ids();

		foreach( $attachment_ids as $attachment_id ) {
			echo '<div id="woocommerce-qwerty" ><img src="'. $image_link = wp_get_attachment_url( $attachment_id ).'"></div>';
		}
	?>
	</div>
	<div class="woocommerce-img-be">
	<?php
		global $product;
		echo '<img style="width:55px; height:150px;" class="woocommerce-img-sub" src="'. wp_get_attachment_url( $product->get_image_id() ).'">';
		
		$attachment_ids = $product->get_gallery_image_ids();

		foreach( $attachment_ids as $attachment_id ) {
			echo '<img style="width:55px; height:150px;" class="woocommerce-img-sub" src="'. $image_link = wp_get_attachment_url( $attachment_id ).'">';
		}
	?>
	</div>
</div>
