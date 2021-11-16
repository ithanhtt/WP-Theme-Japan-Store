<h1>Setting</h1>
<form action="" method="POST">
    <?php 
    settings_fields('home_page_option');
    do_settings_sections('theme-panel');
    submit_button('Save');
    ?>
</form>