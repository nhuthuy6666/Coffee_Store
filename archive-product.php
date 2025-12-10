<?php get_header(); ?>

<div class="archive-products">
    <div class="archive-products-container">
        <?php
        $categories = get_terms(array(
            'taxonomy' => 'product_category',
            'hide_empty' => true,
        ));

        if (!empty($categories) && !is_wp_error($categories)) :
            foreach ($categories as $category) :
        ?>
            <div class="category-section">
                <div class="category-section-header">
                    <h2 class="category-section-title"><?php echo esc_html($category->name); ?></h2>
                </div>
                
                <div class="category-section-grid">
                    <?php
                    $products = new WP_Query(array(
                        'post_type' => 'product',
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
                            $image = get_field('product_image');
                            $name = get_field('product_name');
                            $price = get_field('product_price');
                            $description = get_field('product_description');
                    ?>
                        <div class="product-item">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="product-item-image">
                            <?php endif; ?>
                            <div class="product-item-info">
                                <p class="product-item-name"><?php echo esc_html($name); ?></p>
                                <p class="product-item-price"><?php echo esc_html($price); ?></p>
                            </div>
                            <p class="product-item-description"><?php echo esc_html($description); ?></p>
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
            <p class="archive-products-empty">No products found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>