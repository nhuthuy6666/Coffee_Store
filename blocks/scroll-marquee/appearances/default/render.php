<div class="scroll-marquee">
    <div class="scroll-marquee-inner">
        <div id="marquee-content" class="scroll-marquee-content">
            <?php foreach ($data->marquee_images as $item): ?>
                <img class="img-item"
                     src="<?= esc_url($item['image']['url']) ?>" 
                     alt="<?= esc_attr($item['image']['alt']) ?>">
            <?php endforeach; ?>
        </div>
    </div>
</div>