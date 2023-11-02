<?php
    /**
     * Plugin Name: WooCommerce Product Category
     * Description: Display WooCommerce categories on WooCommerce Product Pages
     **/


     function cloudways_product_cats_css() {
 
 
        wp_register_style( 'cloudways_product_cats_css', plugins_url( 'css/style.css', __FILE__ ) );
     
     
        wp_enqueue_style( 'cloudways_product_cats_css' );
     
    }
     
    add_action( 'wp_enqueue_scripts', 'cloudways_product_cats_css' );




    

    function cloudways_product_subcategories( $args = array() ) {
        $parentid = get_queried_object_id();
         
        $args = array(
            'parent' => $parentid
        );
         
        $terms = get_terms( 'product_cat', $args );
         
        if ( $terms ) {
                 
            echo '<ul class="product-cats">';
             
                foreach ( $terms as $term ) {
                                 
                    echo '<li class="category">';                 
                             
                        woocommerce_subcategory_thumbnail( $term );
                         
                        echo '<h2>';
                            echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
                                echo $term->name;
                            echo '</a>';
                        echo '</h2>';
                                                                             
                    echo '</li>';
                                                                             
         
            }
             
            echo '</ul>';
         
        }
     }
 add_action( 'woocommerce_before_shop_loop', 'cloudways_product_subcategories', 50 );











