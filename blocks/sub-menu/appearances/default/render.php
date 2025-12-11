<div class="sub-menu">
    <div class="sub-container">
        <div class="sub-menu-items">
            <?php foreach( $data->sub_menu as $index => $item ): ?>
                <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>