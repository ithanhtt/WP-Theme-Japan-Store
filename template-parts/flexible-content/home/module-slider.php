<?php 
    $img1 = get_sub_field('image');
    $size1 = 'full';
    $slider_1 = wp_get_attachment_image( $img1, $size1 ); 
    
    $img2 = get_sub_field('image_2');
    $size2 = 'full';
    $slider_2 = wp_get_attachment_image( $img2, $size2 ); 

    $img3 = get_sub_field('image_3');
    $size3 = 'full';
    $slider_3 = wp_get_attachment_image( $img3, $size3 ); 

    $img4 = get_sub_field('image_4');
    $size4 = 'full';
    $image_4 = wp_get_attachment_image( $img4, $size4 ); 
    
    $img5 = get_sub_field('image_5');
    $size5 = 'full';
    $image_5 = wp_get_attachment_image( $img5, $size5 );
?>

        <!-- Banner -->
        <div class="banner">
            <div class="banner-slider">
                <div class="banner-slider-item">
                    <?php 
                    echo $slider_1;
                    echo $slider_2;
                    echo $slider_3;
                    ?>
                </div>
                <div class="button-slider">
                    <button class="previous"><i class="fas fa-arrow-left"></i></button>
                    <button class="next"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="banner-right">
                <div class="banner-right-top">
                    <?php 
                    echo $image_4;
                    $link1 = get_sub_field('button_1');
                    echo '<a href="'.$link1['url'].'">'.'<div class="button-banner bn1">'.$link1['title'].'</div></a>';
                    ?>
                </div>
                <div class="banner-right-bottom">
                    <?php 
                    echo $image_5;
                    $link2 = get_sub_field('button_2');
                    echo '<a href="'.$link2['url'].'">'.'<div class="button-banner bn2">'.$link2['title'].'</div></a>';
                    ?>
                </div>
            </div>
        </div>
        <!-- End Banner -->