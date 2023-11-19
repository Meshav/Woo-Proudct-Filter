<?php
function create_spec_sheet_field() {

    $args = array(
        'id' => 'specsheet',
        'label' => __( 'Specsheet', 'fsgp'),
        'class' => 'prod-spec-field',
        'desc_tip' => true,
        'description' => __( 'Enter the specsheet of your product.', 'fsgp' ),
    );

    woocommerce_wp_text_input( $args );
}

add_action( 'woocommerce_product_options_advanced', 'create_spec_sheet_field');





function prod_save_spec_field( $post_id ) {
    $product = wc_get_product( $post_id );
    $title = isset( $_POST['specsheet'] ) ? $_POST['specsheet'] : '';
    $product->update_meta_data( 'specsheet', sanitize_text_field( $title ) );
    $product->save();
}

add_action( 'woocommerce_process_product_meta', 'prod_save_spec_field' );







?>