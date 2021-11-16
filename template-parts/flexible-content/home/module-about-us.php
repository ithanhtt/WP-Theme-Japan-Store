<?php
    $img = get_sub_field('image');
    $size = 20;
    $image = wp_get_attachment_image( $img, $size ); 
?>
<div class="about-us">
            <div class="about-us-img">
                <?php echo $image; ?>
            </div>
            <div class="about-us-content">
                <div data-text='<?php echo esc_attr('abc') ?>' class="a-title"><?php echo get_sub_field('title'); ?></div>
                <p class="a-content">
                <?php echo get_sub_field('content'); ?>
                </p>
                <a href="<?php echo esc_url('http://google.com') ?>" class="a-button"><?php echo esc_html('Contact Us') ?></a>
            </div>
        </div>
        <form id="form" action="" data-user-id='<?php echo esc_attr(get_current_user()); ?>'>

        </form>
        <script>
            let userId = $('form').attr('data-id');
        </script>
<?php

$post = array();

if( !empty($post) ) {
    foreach($data as $item) {

    }
}


// postid

$postID = intval(10);
