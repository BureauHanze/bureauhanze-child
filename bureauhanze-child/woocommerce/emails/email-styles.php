<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load colors.
$bg        = get_option( 'woocommerce_email_background_color' );
$body      = get_option( 'woocommerce_email_body_background_color' );
$base      = get_option( 'woocommerce_email_base_color' );
$base_text = wc_light_or_dark( $base, '#202020', '#ffffff' );
$text      = get_option( 'woocommerce_email_text_color' );

// Pick a contrasting color for links.
$link_color = wc_hex_is_light( $base ) ? $base : $base_text;

if ( wc_hex_is_light( $body ) ) {
	$link_color = wc_hex_is_light( $base ) ? $base_text : $base;
}

$bg_darker_10    = wc_hex_darker( $bg, 10 );
$body_darker_10  = wc_hex_darker( $body, 10 );
$base_lighter_20 = wc_hex_lighter( $base, 20 );
$base_lighter_40 = wc_hex_lighter( $base, 40 );
$text_lighter_20 = wc_hex_lighter( $text, 20 );
$text_lighter_40 = wc_hex_lighter( $text, 40 );

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
// body{padding: 0;} ensures proper scale/positioning of the email in the iOS native email app.
?>

body {
	padding: 0;
}

#wrapper {
	background-color: <?php echo esc_attr( $bg ); ?>;
	margin: 0;
	-webkit-text-size-adjust: none !important;
	width: 100%;
}

#template_container {
	box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1) !important;
	background-color: <?php echo esc_attr( $body ); ?>;	
}

#template_header {
	background-color: <?php echo esc_attr( $base ); ?>;
	border-radius: 3px 3px 0 0 !important;
	color: <?php echo esc_attr( $base_text ); ?>;
	border-bottom: 0;
	font-weight: bold;
	line-height: 100%;
	vertical-align: middle;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

#template_header h1,
#template_header h1 a {
	color: <?php echo esc_attr( $base_text ); ?>;
	background-color: inherit;
}

#template_header_image img {
	margin-left: 0;
	margin-right: 0;
}

#template_footer td {
	padding: 0;
	border-radius: 6px;
}

#template_footer #credit {
	border: 0;
	color: <?php echo esc_attr( $text_lighter_40 ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 12px;
	line-height: 150%;
	text-align: center;
	padding: 24px 0;
}

#template_footer #credit p {
	margin: 0 0 16px;
}

#body_content {
	background-color: <?php echo esc_attr( $body ); ?>;
}

#body_content table td {
	padding-top:30px;
	padding-bottom:30px;
}

#body_content table td img {
	float:left;
}

#body_content table td td {
	padding: 12px;
}

#body_content table td th {
	padding: 12px;
}

#body_content td ul.wc-item-meta {
	font-size: small;
	margin: 1em 0 0;
	padding: 0;
	list-style: none;
}

#body_content td ul.wc-item-meta li {
	margin: 0.5em 0 0;
	padding: 0;
}

#body_content td ul.wc-item-meta li p {
	margin: 0;
}

#body_content p {
	margin: 0 0 16px;
}

#body_content_inner {
	color: <?php echo esc_attr( $text_lighter_20 ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 17px;
	line-height: 150%;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

.td {
	color: <?php echo esc_attr( $text_lighter_20 ); ?>;
	border: none;
}

table {
	border: none;
	font-size: 17px;
}

#order_table {
    border: none;
	background: #f2f2f2;
}

#order_table table > tfoot > tr  {
	background: <?php echo esc_attr($base);?>;
}

#order_table table > tfoot > tr  th, #order_table table > tfoot > tr  td {
	color:white;
}

#order_table tfoot .woocommerce-Price-amount {
	font-weight: 700;
}

#order_table table > tfoot > tr  th {
	padding: 30px 0px 0px 30px;
}

#order_table table > tfoot > tr  td { 
	padding: 30px 30px 0px 0px;
}

#order_table table > tfoot > tr:nth-child(2) th {
	padding: 20px 0px 30px 30px;
}

#order_table table > tfoot > tr:nth-child(2) td { 
	padding: 20px 30px 30px 0px;
}

#order_table table > tfoot > tr:nth-child(3) th {
	padding: 30px 0px 30px 30px;
	background-color: rgba(0, 0, 0, 0.1);
}

#order_table table > tfoot > tr:nth-child(3) td { 
	padding: 30px 30px 30px 0px;
    background-color: rgba(0, 0, 0, 0.1);
}

#order_table table > tfoot > tr:nth-child(4) th {
	padding:30px 0px 0px 0px;
	background-color: #ffffff;
	color: <?php echo esc_attr( $text ); ?>;
}

#order_table table > tfoot > tr:nth-child(4) td { 
	padding:30px 0px 0px 0px;
	background-color: #ffffff;
	color: <?php echo esc_attr( $text ); ?>;
}

address.address {
	font-style: normal;
	line-height: 1.4;
}

#order_table table > thead > tr th:first-child  {
	padding: 15px 0px 15px 30px;
}

#order_table table > thead > tr th  {
	padding: 15px 0px 15px 0px;
}

#order_table table > thead > tr th:last-child {
	padding: 15px 30px 15px 12px;
}

#order_table table > thead > tr {
	background: #d9d9d9;
}

#order_table table > tbody > tr td:first-child {
	padding: 20px 0px 15px 30px;
}

#order_table table > tbody > tr > td {
	padding: 20px 0px 20px 12px;
	vertical-align: top !important;
}

#order_table table > tbody > tr.component_container_table_item td:first-child {
	padding: 20px 0px 0px 30px;
}

#order_table table > tbody > tr.component_container_table_item > td {
	padding: 20px 0px 0px 12px;
	vertical-align: top !important;
}

#order_table table > thead > tr > th:first-child {
	min-width: 310px;
}

#order_table table > thead > tr > th:nth-child(2) {
	min-width: 70px;
}

#order_table table > tbody  tr:last-child > td {
	padding: 12px 0px 30px 12px;
}

#order_table table > tbody  tr:last-child > td:nth-child(1) {
	padding: 20px 0px 30px 30px;
}


#order_table table > tbody .component_table_item img {
	display:none;
}


.includes_tax {
	display:block;
	font-size:13px;
	padding-left:4px;
}


.text {
	color: <?php echo esc_attr( $text ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

.link {
	color: <?php echo esc_attr( $link_color ); ?>;
}

#header_logo_wrapper {
	padding: 14px 0px;
}

#header_logo_wrapper img {
	max-width:100%;
	height:55px;
	width:auto;
    display: block;
}

#main_title {
	background: #f2f2f2;
    padding: 30px;
    line-height: 1;
	margin-bottom:16px;
}

#main_title h1, #main_title h2 {
	margin:0px;
	line-height:1;
}

#main_title h1 {
	margin-bottom: 10px;
}

h1 {
	color: <?php echo esc_attr( $base ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 30px;
	font-weight: 600;
	line-height: 150%;
	margin-bottom: 20px;
	margin-top: 0px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

h2 {
	color: <?php echo esc_attr( $base ); ?>;
	display: block;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 22px;
	font-weight: bold;
	line-height: 130%;
	margin: 0 0 18px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

h3 {
	color: <?php echo esc_attr( $base ); ?>;
	display: block;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 16px;
	font-weight: bold;
	line-height: 130%;
	margin: 16px 0 8px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

a {
	color: <?php echo esc_attr( $link_color ); ?>;
	font-weight: normal;
	text-decoration: underline;
}

#body_content img {
	border: none;
	display: inline-block;
	font-weight: bold;
	height: auto;
	outline: none;
	text-decoration: none;
	text-transform: capitalize;
	vertical-align: middle;
	margin-<?php echo is_rtl() ? 'left' : 'right'; ?>: 10px;
	max-width: 100%;
	height: auto;
}

#body_content #order_details {
	margin-top: 30px;
}

blockquote {
	background: #f2f2f2;
    width: 600px;
    margin: 0px;
    padding: 20px;
    margin-bottom: 16px;
    border: solid 1px #3333;
}

#footer_left, #footer_right {
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 13px;
	color: #333333;
}

#footer_right {
	text-align:right;
}

#template_footer {
	padding: 25px 0px;
}

<?php
