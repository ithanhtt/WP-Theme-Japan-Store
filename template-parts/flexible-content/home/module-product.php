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