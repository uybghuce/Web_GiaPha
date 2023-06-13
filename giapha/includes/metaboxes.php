<?php
// màn hình chỉnh sửa / thêm mới
// đăng ký meta box 
add_action( 'add_meta_boxes', 'wp2023_meta_box_member' );

// can thiệp vào hành động lưu bài viết
add_action( 'save_post', 'wp2023_save_post_member' );

function wp2023_save_post_member($post_id)
{
    // echo 'pre';
    // print_r($_REQUEST);
    // die();
    if( $_REQUEST['post_type']== 'genealogy')
    {   
        // var_dump($post_id);die();
        
        $member_birth = $_REQUEST['member_birth'];
        $member_died = $_REQUEST['member_died'];
        $member_sex = $_REQUEST['member_sex'];
        $member_name_dad = $_REQUEST['member_name_dad'];
        $member_name_mom = $_REQUEST['member_name_mom'];
        $member_name_wife = $_REQUEST['member_name_wife'];
        $member_nhanh = $_REQUEST['member_nhanh'];
        $oder = $_REQUEST['oder'];


        // LƯU VAO CƠ SỞ DỮ LIỆU
        update_post_meta($post_id,'member_birth',$member_birth);
        update_post_meta($post_id,'member_died',$member_died);
        update_post_meta($post_id,'member_sex',$member_sex);
        update_post_meta($post_id,'member_name_dad',$member_name_dad);
        update_post_meta($post_id,'member_name_mom',$member_name_mom);
        update_post_meta($post_id,'member_name_wife',$member_name_wife);
        update_post_meta($post_id,'member_nhanh',$member_nhanh);
        update_post_meta($post_id,'oder',$oder);
    }
    
}

function wp2023_meta_box_member()
{
    add_meta_box(
        'wp2023_member_info',                 
        'Thông tin thành viên',      
        'wp2023_meta_box_member_html',
        'genealogy'  ,

    );
}

function wp2023_meta_box_member_html()
{
    include_once WP2023_PATH.'includes/templates/meta_boxe_member.php';
};
