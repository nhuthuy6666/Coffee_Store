<div class="custom-text-media">
    <div class="container-inner">
        <div class="content" data-animate="left">
            <h2><?php echo esc_html($data->custom_text_media_header); ?></h2>
            <p><?php echo esc_html($data->custom_text_media_text); ?></p>
        </div>
        <div class="images" data-animate="right">
            <img src="<?php echo esc_url($data->custom_text_media_image1['url']); ?>" 
            alt="<?php echo esc_attr($data->custom_text_media_image1['alt']); ?>">
            <img src="<?php echo esc_url($data->custom_text_media_image2['url']); ?>" 
            alt="<?php echo esc_attr($data->custom_text_media_image2['alt']); ?>">
        </div>
    </div>
</div>