<?php

add_action( 'wp_ajax_variation_cart_add', 'variation_cart_add' );
add_action( 'wp_ajax_nopriv_variation_cart_add', 'variation_cart_add' );

function variation_cart_add(){
    $error = '';
    $variation_id = isset( $_POST['variation_id'] ) ? $_POST['variation_id'] : '';
    $product_id = isset( $_POST['product_id'] ) ? $_POST['product_id'] : '';
    $quantity = isset( $_POST['quantity'] ) ? $_POST['quantity'] : 1;

    if( empty( $variation_id ) || empty( $product_id ) ){
        $error = 'Product was not recieved';
    }

    if( empty( $error ) ){
        WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
        wp_send_json_success( [
            'total'   => WC()->cart->cart_contents_count,
            'message' => 'Product was successfully added to cart'
        ] );
    }else{
        wp_send_json_error( [
            'message' => $error
        ] );
    }
}