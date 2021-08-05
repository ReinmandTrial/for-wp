<?php

// Add custom fields data as the cart item custom data
add_filter( 'woocommerce_add_cart_item_data', 'add_custom_fields_data_as_custom_cart_item_data', 10, 2 );
function add_custom_fields_data_as_custom_cart_item_data( $cart_item, $product_id ){
    if( isset($_FILES['image']) && ! empty($_FILES['image']) ) {
        $upload       = wp_upload_bits( $_FILES['image']['name'], null, file_get_contents( $_FILES['image']['tmp_name'] ) );
        $filetype     = wp_check_filetype( basename( $upload['file'] ), null );
        $upload_dir   = wp_upload_dir();
        $upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
        $base_name    = basename( $upload['file'] );

        $cart_item['file_upload'] = array(
            'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ), // Url
            'file_type' => $filetype['type'], // File type
            'file_name' => $base_name, // File name
            'title'     => ucfirst( preg_replace('/\.[^.]+$/', '', $base_name ) ), // Title
        );
        $cart_item['unique_key'] = md5( microtime().rand() ); // Avoid merging items
    }
    return $cart_item;
}