<?php 
get_header(); ?>

<main id="main" class="site-main page" role="main">

    <?php
    get_template_part( 'template-parts/sections/flex-content' ); 

    get_template_part( 'template-parts/sections/content' );

    if(is_page('contact')) :
        get_template_part( 'template-parts/sections/contact' ); 
    endif;

    if(is_page('privacy-statement')) :
        get_template_part( 'template-parts/sections/privacy-statement' ); 
    endif;

    get_template_part( 'template-parts/socials/whatsapp-icon' ); 
    ?>
</main>

<?php
get_footer();
