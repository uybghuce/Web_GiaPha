<?php
    global $post;
    $member_birth = get_post_meta($post->ID,'member_birth',true);
    $member_died = get_post_meta($post->ID,'member_died',true);
    $member_sex = get_post_meta($post->ID,'member_sex',true);
    $member_name_dad = get_post_meta($post->ID,'member_name_dad',true);
    $member_name_mom = get_post_meta($post->ID,'member_name_mom',true);
    $member_name_wife = get_post_meta($post->ID,'member_name_wife',true);
    $oder = get_post_meta($post->ID,'oder',true);
    $name = get_the_title($post->ID);
    $categories = get_the_terms( $post->ID, 'genealogy_cat' );
    foreach( $categories as $category ) {
        $category->term_id;
        $category->slug ;
        $category->name ;
        $category->parent;
    }
    $parent = get_term_parents_list( $category->term_id, 'genealogy_cat');
?>
<table class="form-table">
    <tr>
        <th scope="row">
            <label for="blogname">id</label>
        </th>
        <td>
            <input name="member_name" type="text" class="reguler-text" value="<?= $post->ID ?>">
        </td>
        <th scope="row">
            <label for="blogname">Tên</label>
        </th>
        <td>
            <input name="member_name" type="text" class="reguler-text" value="<?=  $category->name  ?>">
        </td>
        <th scope="row">
            <label for="blogname">Ngày sinh</label>
        </th>
        <td>
            <input name="member_birth" type="date" class="reguler-text" value="<?= $member_birth ?>">
        </td>
    </tr>
   
    <tr>
        <th scope="row">
            <label for="blogname">Giới Tính</label>
        </th>
        <td>
            <input name="member_sex" type="text" class="reguler-text" value="<?= $member_sex ?>">
        </td>
        <th scope="row">
            <label for="blogname">Con thứ</label>
        </th>
        <td>
            <input name="oder" type="number" class="reguler-text" value="<?= $oder ?>">
        </td>
        <th scope="row">
            <label for="blogname">Tên Bố</label>
        </th>
        <td>
            <input name="member_name_dad" type="text" class="reguler-text" value="<?= $member_name_dad ?>">
        </td>
        
        
    </tr>
    <tr>
        
    <th scope="row">
            <label for="blogname">Mất năm</label>
        </th>
        <td>
            <input name="member_died" type="date" class="reguler-text" value="<?= $member_died ?>">
        </td>
        <th scope="row">
            <label for="blogname">Tên vợ/chồng</label>
        </th>
        <td>
            <input name="member_name_wife" type="text" class="reguler-text" value="<?= $member_name_wife ?>">
        </td>
        <th scope="row">
            <label for="blogname">Tên Mẹ</label>
        </th>
        <td>
            <input name="member_name_mom" type="text" class="reguler-text" value="<?= $member_name_mom ?>">
        </td>
        
        
    </tr>
   
</table>
