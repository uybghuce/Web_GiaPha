<?php
// đăng ký loại bài viết sản phẩm

add_action('init','wp2023_custom_post_type');
function wp2023_custom_post_type()
{   // post:bài viết
    // page: trang
    //genealogy : gia phả
    register_post_type('genealogy',
		array(
			'labels'      => array(
				'name'          => __('Tất Cả Thành Viên', 'wp2023-giapha'),
				'singular_name' => __('Thành Viên', 'wp2023-giapha'),
                'add_new'       => __('Thêm Thành Viên', 'wp2023-giapha'),
                'add_new_item'  => __('Thêm Thành Viên', 'wp2023-giapha'),
                'edit_item'     => __('Sửa Thành Viên', 'wp2023-giapha'),
                'new_item'      => __('Thêm Thành Viên', 'wp2023-giapha'),
                'view_item'     => __('Xem Thành Viên', 'wp2023-giapha'),
                'search_items'  => __('Tìm Thành Viên', 'wp2023-giapha'),
                'not_found'     => __('Không tìm thấy thành viên', 'wp2023-giapha'),
                'not_found_in_trash' => __('Không tìm thấy thành viên trong thùng rác', 'wp2023-giapha'),
                'parent_item_colon' => '',
                'menu_name'     => 'Gia Phả',
                'name_admin_bar' => 'Gia Phả',
                


                
			),
				'public'      => true,
				'has_archive' => true,
                'query_var'   => true,
                'rewrite'     => array('slug' => 'genealogy' ),
                'supports'    => array('title','editor','thumbnail','excerpt','comments'),

		)
	);
}
// đăng ký phân loại taxonomy

add_action('init','wp2023_register_taxonomy_genealogy');
function wp2023_register_taxonomy_genealogy()
{
    $labels = array(
        'name'              => _x( 'Nhánh ', 'taxonomy general name' ),
        'singular_name'     => _x( 'Nhánh', 'taxonomy singular name' ),
        'search_items'      => __( 'Search  Nhánh' ),
        'all_items'         => __( 'All  Nhánh' ),
        'parent_item'       => __( 'Cha' ),
        'parent_item_colon' => __( 'Parent  Nhánh:' ),
        'edit_item'         => __( 'Edit  Nhánh' ),
        'update_item'       => __( 'Update  Nhánh' ),
        'add_new_item'      => __( 'Thêm nhánh' ),
        'new_item_name'     => __( 'New  Nhánh Name' ),
        'menu_name'         => __( 'Nhánh' ),
    );
    $args   = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'course' ],
    );
    register_taxonomy( 'genealogy_cat', [ 'genealogy' ], $args );
}

// Hook   
add_action('admin_menu', 'hk_submenu_genealogy');

// admin_menu callback function
function hk_submenu_genealogy(){

	add_submenu_page(
		'edit.php?post_type=genealogy', #1 Slug menu cha 
		'Tìm Kiếm Mối Quan Hệ', #2 Tiêu đề trang
		'Tìm Kiếm Mối Quan Hệ', #3 Tiêu đề menu
		'manage_options',
		'Tìm Kiếm Mối Quan Hệ', #4 Slug menu con
		'hk_render_page' #5 callback function
	);

}

// add_submenu_page callback function
function hk_render_page() {
    include_once WP2023_PATH.'includes/templates/search_relationship_member.php';
}
// gioi han 1 danh muc chi cos 1 bai viete
function limit_posts_per_term( $terms ,$taxonomy ) 
{
    global $wpdb;
    if ( 'genealogy_cat' !== $taxonomy )
    {
        return $terms;
    }
    foreach ( $terms as $term )
    {
        $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->term_relationships WHERE term_taxonomy_id = %d $term->term_taxonomy_id ") );
        if ( $count > 0 )
        {
            $term->count = 1;
        }
    }
    
    return $terms;
}
add_filter( 'get_terms','limit_posts_per_term',10, 2 );