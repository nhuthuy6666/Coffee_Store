<div class="products-list">
    <div class="products-list-container">
        <?php
        $categories = get_terms(array(
            'taxonomy' => 'product_category',
            'hide_empty' => true,
        ));

        if (!empty($categories) && !is_wp_error($categories)) :
            foreach ($categories as $category) :
        ?>
            <div class="products-list-section" id="<?php echo esc_attr($category->slug); ?>">
                <div class="products-list-header">
                    <h2 class="products-list-title"><?php echo esc_html($category->name); ?></h2>
                </div>
                
                <div class="products-list-grid">
                    <?php
                    $products = new WP_Query(array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_category',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            ),
                        ),
                    ));

                    if ($products->have_posts()) :
                        while ($products->have_posts()) : $products->the_post();
                            $post_id = get_the_ID();
                            $image = get_field('product_image', $post_id);
                            $name = get_field('product_name', $post_id);
                            $price = get_field('product_price', $post_id);
                            $description = get_field('product_description', $post_id);
                    ?>
                        <div class="products-list-item">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="products-list-item-image">
                            <?php endif; ?>
                            <div class="products-list-item-info">
                                <p class="products-list-item-name"><?php echo esc_html($name); ?></p>
                                <p class="products-list-item-price">$<?php echo esc_html($price); ?></p>
                            </div>
                            <p class="products-list-item-description"><?php echo esc_html($description); ?></p>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        <?php
            endforeach;
        else :
        ?>
            <p class="products-list-empty">No products found.</p>
        <?php endif; ?>
    </div>
</div>
