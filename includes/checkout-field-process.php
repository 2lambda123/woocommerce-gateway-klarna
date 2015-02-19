<?php

// SE, NO, DK & FI
if ( $_POST['billing_country'] == 'SE' || $_POST['billing_country'] == 'NO' || $_POST['billing_country'] == 'DK' || $_POST['billing_country'] == 'FI' ) {
// Check if set, if its not set add an error.
if ( ! $_POST[$klarna_field_prefix . 'pno'] ) {
 	wc_add_notice(
 		__('<strong>Date of birth</strong> is a required field.', 'klarna'), 
 		'error'
 	);
}
}

// NL & DE
if ( $_POST['billing_country'] == 'NL' || $_POST['billing_country'] == 'DE' ) {
// Check if set, if its not set add an error.

// Gender
if ( empty($_POST[$klarna_field_prefix . 'gender'] ) ) {
 	wc_add_notice(
 		__('<strong>Gender</strong> is a required field.', 'klarna'), 
 		'error'
 	);
}
	
	// Date of birth
if ( ! $_POST['date_of_birth_day'] || ! $_POST['date_of_birth_month'] || ! $_POST['date_of_birth_year'] ) {
		wc_add_notice(
			__( '<strong>Date of birth</strong> is a required field.', 'klarna' ), 
			'error'
		);
}
	
	// Shipping and billing address must be the same
	$compare_billing_and_shipping = 0;
	
	if ( isset( $_POST['ship_to_different_address'] ) && $_POST['ship_to_different_address'] = 1 ) {
		$compare_billing_and_shipping = 1;	
	}
	
	if ( $compare_billing_and_shipping == 1 && isset( $_POST['shipping_first_name'] ) && $_POST['shipping_first_name'] !== $_POST['billing_first_name'] ) {
		wc_add_notice(
			__('Shipping and billing address must be the same when paying via Klarna.','klarna'), 
			'error'
		);
	}
 
 if ( $compare_billing_and_shipping == 1 && isset( $_POST['shipping_last_name'] ) && $_POST['shipping_last_name'] !== $_POST['billing_last_name'] ) {
 	wc_add_notice(
 		__('Shipping and billing address must be the same when paying via Klarna.', 'klarna'), 
 		'error'
 	);
 }
 
 if ( $compare_billing_and_shipping == 1 && isset( $_POST['shipping_address_1'] ) && $_POST['shipping_address_1'] !== $_POST['billing_address_1'] ) {
 	wc_add_notice(
 		__('Shipping and billing address must be the same when paying via Klarna.', 'klarna'), 
 		'error'
 	);
 }
 
 if ( $compare_billing_and_shipping == 1 && isset( $_POST['shipping_postcode'] ) && $_POST['shipping_postcode'] !== $_POST['billing_postcode'] ) {
 	wc_add_notice(
 		__('Shipping and billing address must be the same when paying via Klarna.', 'klarna'), 
 		'error'
 	);
 }
 	
 if ( $compare_billing_and_shipping == 1 && isset($_POST['shipping_city']) && $_POST['shipping_city'] !== $_POST['billing_city'] ) {
 	wc_add_notice(
 		__('Shipping and billing address must be the same when paying via Klarna.', 'klarna'), 
 		'error'
 	);
 }
}

// DE & AT
if ( ( $this->shop_country == 'DE' || $this->shop_country == 'AT' ) && $this->de_consent_terms == 'yes') {
// Check if set, if its not set add an error.
if ( ! isset($_POST[$klarna_field_prefix . 'de_consent_terms'] ) ) {
 	wc_add_notice(
 		__('You must accept the Klarna consent terms.', 'klarna'), 
 		'error'
 	);
}
}
