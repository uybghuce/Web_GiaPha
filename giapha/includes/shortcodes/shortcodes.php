<?php
add_shortcode('shortcode1','create_shortcode1');
function create_shortcode1()
{
    global $post;
    $member_birth = get_post_meta($post->ID,'member_birth',true);
    $member_died = get_post_meta($post->ID,'member_died',true);
    $member_sex = get_post_meta($post->ID,'member_sex',true);
    $member_name_mom = get_post_meta($post->ID,'member_name_mom',true);
    $member_name_wife = get_post_meta($post->ID,'member_name_wife',true);
    $oder = get_post_meta($post->ID,'oder',true);
    $categories = get_the_terms( $post->ID, 'genealogy_cat' );
    foreach( $categories as $category ) {
        $category->term_id;
        $category->slug ;
        $category->name ;

    }
    $parent = get_term_parents_list( $category->term_id, 'genealogy_cat');
    $list = explode('</a>/', $parent);
    end($list);
    prev($list);
    $bo = prev($list);
   ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    
   
  <h3>Đường đi</h3>
        <p style ="word-wrap:break-word;width:100%"> <?= $parent ?></p>
    <table class="form-table">
    <tr>
        <th scope="row" style="width: 20%">
            <label for="blogname" >Tên</label>
        </th>
        <td class>
            <?=  $category->name.'('.$oder.')' ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="blogname">Ngày sinh</label>
        </th>
        <td>
            <?= $member_birth ?>
        </td>
    </tr> 
    <tr>
        <th scope="row">
            <label for="blogname">Giới Tính</label>
        </th>
        <td>
            <?= $member_sex ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="blogname">Tên Bố</label>
        </th>
        <td>
            <?= $bo ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="blogname">Tên Mẹ</label>
        </th>
        <td>
            <?= $member_name_mom ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="blogname">Con thứ</label>
        </th>
        <td>
            <?= $oder ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="blogname">Tên vợ/chồng</label>
        </th>
        <td>
           <?= $member_name_wife ?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="blogname">Mất năm</label>
        </th>
        <td>
            <?= $member_died ?>
        </td>
    </tr>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
        
   <?php
   
   return ob_get_clean();
}

