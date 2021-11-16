<?php 
    $img1 = get_sub_field('banner_1');
    $size1 = 'full';
    $banner_1 = wp_get_attachment_image( $img1, $size1 ); 
    
    $img2 = get_sub_field('banner_2');
    $size2 = 'full';
    $banner_2 = wp_get_attachment_image( $img2, $size2 ); 

    $img3 = get_sub_field('banner_3');
    $size3 = 'full';
    $banner_3 = wp_get_attachment_image( $img3, $size3 ); 

    $img4 = get_sub_field('banner_4');
    $size4 = 'full';
    $banner_4 = wp_get_attachment_image( $img4, $size4 ); 

    $img5 = get_sub_field('banner_5');
    $size5 = 'full';
    $banner_5 = wp_get_attachment_image( $img5, $size5 ); 

?>
<!-- Banner 2 -->
<section class="banner-2">
            <div class="banner-left-2 ">
                <?php 
                echo $banner_1;
                $link1 = get_sub_field('button_1');
                echo '<a href="'.$link1['url'].'">'.'<button class="button-banner-2 btn1">'.$link1['title'].'</button></a>';
                ?>
            </div>
            <div class="banner-center-2">
                <div class="banner-center-top col-2">
                    <?php 
                    echo $banner_2;
                    $link2 = get_sub_field('button_2');
                    echo '<a href="'.$link2['url'].'">'.'<button class="button-banner-2 btn2">'.$link2['title'].'</button></a>';
                    ?>
                </div>
                <div class="banner-center-bottom col-2">
                    <div class="banner-center-bottom-1">
                        <?php 
                        echo $banner_3;
                        $link3 = get_sub_field('button_3');
                        echo '<a href="'.$link3['url'].'">'.'<button class="button-banner-2 btn2">'.$link3['title'].'</button></a>';
                        ?>
                    </div>
                    <div class="banner-center-bottom-2 ">
                        <?php 
                        echo $banner_4;
                        $link4 = get_sub_field('button_4');
                        echo '<a href="'.$link4['url'].'">'.'<button class="button-banner-2 btn2">'.$link4['title'].'</button></a>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="banner-right-2">
                <?php 
                echo $banner_5;
                $link5 = get_sub_field('button_5');
                echo '<a href="'.$link5['url'].'">'.'<button class="button-banner-2 btn1">'.$link5['title'].'</button></a>';
                ?>
            </div>
        </section>
        <!-- End Banner 2 -->