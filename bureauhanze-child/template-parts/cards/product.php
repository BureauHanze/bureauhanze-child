<?php 

$product = wc_get_product();

?>
<div class="product__card">

    <?php if($product->is_on_sale()): ?>
        <?php echo woocommerce_show_product_sale_flash(); ?>
    <?php endif; ?>

    <div class="card__image">
        <a href="<?php echo get_permalink(); ?>">
            <?php echo $product-> get_image('full'); ?>
        </a>
    </div>

    <div class="card__info">
        <a href="<?php echo get_permalink(); ?>">
            <h4 class="info__heading"><?php the_title(); ?></h4>
            <div class="info__description"><?php the_content(); ?></div>
        </a>
        
        <div class="card__footer">
            <span class="price card__price"><?php echo $product->get_price_html(); ?></span>

            <div class="footer__buttons">
                <a onclick="productModal('<?php the_title(); ?>', '<?php echo get_permalink(); ?>', '<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>')"
                class="btn btn-secondary ajax_add_to_cart add_to_cart_button"
                href="<?php echo $product->add_to_cart_url(); ?>"
                value="<?php echo esc_attr( $product->get_id() ); ?>"
                data-product_id="<?php echo get_the_ID(); ?>"
                data-product_sku="<?php echo esc_attr($sku) ?>"
                aria-label="Add “<?php the_title_attribute() ?>” to your cart"><?php get_template_part('/assets/svg/cart');?></a>
                <a class="btn btn-primary-icon" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_template_part( 'assets/svg/chevron' ); ?>Bekijk product</a>
            </div>

        </div>

    </div>

</div>

