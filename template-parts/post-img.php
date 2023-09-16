<?php $image_id = get_field('image'); // Recover Img's ID
if ($image_id) {
    echo wp_get_attachment_image($image_id, 'large');
}
