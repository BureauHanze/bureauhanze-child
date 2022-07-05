<?php
$product = wc_get_product(); ?>

<div class="product__modal">
    <div class="modal__grid">
        <div class="modal__image">
            <span id="imgWrapper"></span>
        </div>

        <div class="modal__summary">
             <div class="modal__header">
                <div class="modal__message">
                    <span><?php get_template_part('assets/svg/checkmark'); echo '<b><span id="productTitle"></span></b>'; ?> is toegevoegd aan je winkelwagen</span>
                </div>
            </div>
            <div class="modal__info">
                <h4>Gerelateerde producten</h4>
                <div class="modal__upsell">
                   <?php
                   $featured_posts = get_field('upsell_products', 'options');
                   if( $featured_posts ):  
                        foreach( $featured_posts as $post ): 
                        setup_postdata($post); 
                        get_template_part( 'template-parts/cards/product');
                        endforeach;                            
                        wp_reset_postdata(); 
                   endif; ?>
                </div>
            </div>
        </div>
        <div class="modal__footer">
            <a class="link" onclick="closeProductModal()">Verder winkelen</a> <!-- Closes modal -->
            <a class="btn btn-primary" href="<?php echo wc_get_cart_url(); ?>">Verder naar bestellen</a>  <!-- Goes to cart -->
        </div>
    </div>
</div>
