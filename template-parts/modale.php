<div class="popup_modale">
    <div class="popup_container">
        <div class="popup_header_img">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/contact_header.png' ?>"
                alt="image contact">
        </div>
        <?php
        // Shortcode Contact form
        echo do_shortcode('[contact-form-7 id="29" title="contact-form"]');
        ?>
    </div>
</div>