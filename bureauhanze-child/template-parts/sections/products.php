
<section class="woo-products-wrapper">
    <div class="container">
        <div class="row">
            <h2>WooCommerce producten</h3>
        </div>
        <div class="row">
            <div class="woo-products">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12
                );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post(); 
                    // wc_get_template_part( 'content', 'product' );
                    get_template_part('template-parts/cards/product');
                endwhile;
            } else {
                echo __( 'Geen producten gevonden' );
            }
            wp_reset_postdata(); ?>
            </div>
        </div>
    </div>   
</section>