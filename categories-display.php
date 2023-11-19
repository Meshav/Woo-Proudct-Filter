
<?php

/****________________________________________________________________________________________________________________________________________________________****/


/*__________________________________________________________________________________*/
/************************** PRIMARY DISPLAYED CATEGORIES  **************************/
/*________________________________________________________________________________*/

add_action( 'woocommerce_tester','woos_product_main_sub_categories',7);

function woos_product_main_sub_categories() {
	$args = array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent' => 0
	);
	$product_cat = get_terms( $args );
	
	foreach ($product_cat as $parent_product_cat)
	{
		echo '
			<ul>
				<li><a href="' .get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'</a>
			<ul>
			';
		$child_args = array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'parent' => $parent_product_cat->term_id
		);
		$child_product_cats = get_terms( $child_args );
		foreach ($child_product_cats as $child_product_cat)
		{
			echo '<li><a href="' . get_term_link($child_product_cat->term_id) . '">' . $child_product_cat->name . '</a></li>';
		}
		
		echo '</ul>
			</li>
			</ul>';
	}
}



//=====================================================================================================================///

/*______________________________________________________________________________*/
/************************** THE CHANGING MENUS  ********************************/
/* i.e. Main prods on start sub prods on 2nd.                                 */
/*___________________________________________________________________________*/


add_action( 'woocommerce_before_shop_loop', 'tutsplus_product_subcategories', 50 );

function tutsplus_product_subcategories( $args = array() ) {

$parentid = get_queried_object_id();
$args = array(
    'parent' => $parentid
);
	
$terms = get_terms( 'product_cat', $args );
	
if ( $terms ) {
    echo '<ul class="product-cats">';
    foreach ( $terms as $term ) {
        echo '<li class="category">';                 
//             woocommerce_subcategory_thumbnail( $term );
            echo '<h2>';
                echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
                    echo $term->name;
                echo '</a>';
            echo '</h2>';
        echo '</li>';
    }
    echo '</ul>';
}
}







































?>
