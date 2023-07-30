<div class="popup_overlay">
    <div class="popup_form">
        <div class="popup_form_header">
            <!-- <h3><?php echo $titre; ?> </h3> -->
            <h1>CONTACT</h1>
            <span class="popup-close">
                <!-- <i class="fa fa-times"></i> -->
                <!-- <i class="fa-sharp fa-solid fa-xmark-large"></i> -->
                <!-- x -->
                <span class="material-symbols-outlined">
                    close
                </span>
            </span>
        </div>


        <?php
        // On insère le formulaire de demandes de renseignements
        echo do_shortcode('[contact-form-7 id="29" title="contact-form"]');
        ?>
    </div>
</div>