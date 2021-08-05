<?php
defined( 'ABSPATH' ) || exit;

// View quick add
add_action( 'wp_ajax_quick_add', 'quick_add' );
add_action( 'wp_ajax_nopriv_quick_add', 'quick_add' );

function quick_add(){
    $error = '';
    $product_id = isset( $_POST['product_id'] ) ? $_POST['product_id'] : '';

    if( empty( $product_id ) ){
        $error = 'Product was not recieved';
    }
    $product = get_product( $product_id );

    if( empty( $product ) ){
        $error = 'Product was not found';
    }

    if( empty( $error ) ){
        ob_start();

        wc_get_template( 'modal/quick-add.php', [
            'product' => $product
        ] );

        wp_send_json_success( [
            'html' => ob_get_clean()
        ] );
    }else{
        wp_send_json_error( [
            'html' => $error
        ] );
    }
}

// Change variation_price
add_action( 'wp_ajax_change_variation_price', 'change_variation_price' );
add_action( 'wp_ajax_nopriv_change_variation_price', 'change_variation_price' );

function change_variation_price(){
    $error = '';
    $variation_id = isset( $_POST['variation_id'] ) ? $_POST['variation_id'] : '';

    if( empty( $variation_id ) ){
        $error = 'Product was not recieved';
    }
    $variable_product = wc_get_product($variation_id);

    if( empty( $variable_product ) ){
        $error = 'Product was not found';
    }

    if( empty( $error ) ){
        ob_start();

        wc_get_template( 'modal/variation-price.php', [
            'regular_price' => $variable_product->get_regular_price(),
            'sale_price' => $variable_product->get_sale_price()
        ] );

        wp_send_json_success( [
            'price_html' => ob_get_clean()
        ] );
    }else{
        wp_send_json_error( [
            'price_html' => $error
        ] );
    }
}
