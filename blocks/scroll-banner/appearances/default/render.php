<div class="scroll-banner">
    <div class="scroll-banner-inner">
        <div class="scroll-banner-img">
            <img src="<?php echo esc_url($data->banner_img['url']); ?>" 
                 alt=""
                 class="">
        </div>
        <div class="scroll-banner-steps">
            <div class="steps-container">
                <div class="card-step">
                    <button class="step-number">1</button>
                    <h2><?php echo esc_html($data->scroll_banner_heading_step_one); ?></h2>
                    <p><?php echo esc_html($data->scroll_banner_text_step_one); ?></p>
                </div>
                <div class="card-step">
                    <button class="step-number">2</button>
                    <h2><?php echo esc_html($data->scroll_banner_heading_step_two); ?></h2>
                    <p><?php echo esc_html($data->scroll_banner_text_step_two); ?></p>
                </div>
                <div class="card-step">
                    <button class="step-number">3</button>
                    <h2><?php echo esc_html($data->scroll_banner_heading_step_three); ?></h2>
                    <p><?php echo esc_html($data->scroll_banner_text_step_three); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>