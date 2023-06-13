<?php

// hiện thị các cột 
add_filter('manage_genealogy_posts_columns','wp2023_admin_columns_member_filter_comlums');
function wp2023_admin_columns_member_filter_comlums($comlums)
{
    $comlums['bo'] ='Tên Bố';
    $comlums['member_name_mom'] ='Tên Mẹ';
    return $comlums;

}
// hien thi gia tri cac cot

add_action('manage_genealogy_posts_custom_column','wp2023_admin_columns_member_render_comlums',10,2);
function wp2023_admin_columns_member_render_comlums($column, $post_id){
    $categories = get_the_terms( $post_id, 'genealogy_cat' );
    foreach( $categories as $category ) {
        $category->term_id;
        $category->slug ;
        $category->name ;
        $category->parent;

    }
    $parent = get_term_parents_list( $category->term_id, 'genealogy_cat');
    $bo = '';
    $list = explode('</a>/', $parent);
            end($list);
            prev($list);
            $bo = prev($list);
    

    switch ($column) {
        case 'bo':
                echo $bo;
            break;
        case 'member_name_mom':
            echo get_post_meta($post_id,'member_name_mom',true);
            break;
    }
}
