<div id="productModal" class="modal__cart">
    <div class="container">
        <div id="productModalInner" class="product_modal-inner">

            <a class="cart__image" href="<?php echo get_permalink(); ?>">
                <span id="imgWrapper"></span>
            </a>

            <div class="cart__content">
                <div class="cart__header">
                    <span><?php echo '<span id="productTitle"></span>'; ?> is toegevoegd aan je winkelwagen</span>
                    <span class="closeProductModal" onclick="closeProductModal()">&#10005;</span>
                </div>

                <div class="card__content">
                </div>

                <div class="cart__footer">
                    <div class="btn btn-shopping-bag">
                    <?php
                    get_template_part( '/assets/svg/cart' );
                    echo do_shortcode('[woocommerce_cart_icon]'); ?>
                        <span class="btn-shopping-bag__text">Bekijk winkelwagen</span>
                    </div>

                    <span onclick="closeProductModal()" class="btn btn-link-icon"><?php get_template_part( 'assets/svg/chevron' ); ?>Verder winkelen</span>
                </div>

            </div>
        </div>
    </div>
</div>
