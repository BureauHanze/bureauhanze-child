<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="form-with-animated-labels" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="form-row">
		<div class="form-col">
			<span><input type="text" class="input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" /></span>
			<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>	
		</div>

		<div class="form-col">
			<span><input type="text" class="input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" /></span>
			<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		</div>
		
	</div>

	<div class="form-col">
		<span><input type="text" class="input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span></span>
		<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
	</div>
	

	<div class="form-col">
		<span><input type="email" class="input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" /></span>
		<label for="account_email" class="focused"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
	</div>

	<div class="password_wrapper">
		<h4>Wachtwoord wijzigen</h4>

		<div class="form-col">
			<span><input type="password" class="input-text" name="password_current" id="password_current" autocomplete="off" /></span>
			<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
		</div>
		<div class="form-col">
			<span><input type="password" class="input-text" name="password_1" id="password_1" autocomplete="off" /></span>
			<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
		</div>
		<div class="form-col">
			<span><input type="password" class="input-text" name="password_2" id="password_2" autocomplete="off" /></span>
			<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
		</div>
	</div>


	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<div>
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="btn btn-primary" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

<script>
    // Floating labels in contactForm7
    const formsWithAnimatedLabels = document.querySelectorAll(
        ".form-with-animated-labels"
    );
    const focusedClass = "focused";
    
    for (const form of formsWithAnimatedLabels) {
        const formControls = form.querySelectorAll(
            '[type="text"], [type="email"], [type="tel"], textarea, [type="password"]'
        );
        for (const formControl of formControls) {
            formControl.addEventListener("focus", function () {
                this.parentElement.nextElementSibling.classList.add(focusedClass);
            });
    
            formControl.addEventListener("blur", function () {
                if (!this.value) {
                    this.parentElement.nextElementSibling.classList.remove(
                        focusedClass
                    );
                }
            });
        }
        form.parentElement.addEventListener("wpcf7mailsent", function () {
            const labels = document.querySelectorAll(".focused");
            for (const label of labels) {
                label.classList.remove(focusedClass);
            }
        });
    }
</script>
