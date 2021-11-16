<?php
global $product; 
$numleft  = $product->get_stock_quantity(); 
if($numleft==0) {
   // out of stock
	echo "There are no items available at this time."; 
}
// else if($numleft==1) {
// 	echo $numleft ." boxes per box.";
// }
else {
	echo '<p class="quantity">'.$numleft ." boxes per box.</p>";
}
global $post;
$total = get_post_meta($post->ID, 'total_sales', true) + $numleft;
echo '<p class="progress-product"><progress value="'. get_post_meta($post->ID, 'total_sales', true) .'" max="'.$total.'"></progress></p>';

?>
