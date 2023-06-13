<?php
$term_1 = get_term_by('name','term_1','genealogy_cat');
$term_2 = get_term_by('name','term_2','genealogy_cat');

?>
<h3>shortcode hiển thị chi thiết thông tin thành viên : [shortcode1]</h3>

<form action="<?php bloginfo('url');?>" method="get">  
    <div class="form-group">
        <label for="">Từ khóa</label>
        <input type="text" class="form-control" name="term_1" placeholder="Nhập từ khóa...">
    </div>
	<div class="form-group">
        <label for="">Từ khóa</label>
        <input type="text" class="form-control" name="term_2" placeholder="Nhập từ khóa...">
    </div>


    
    <input type="hidden" name="post_type" value="genealogy">
    <input type="hidden" name="taxonomy" value="genealogy_cat">
    <button type="submit" class="btn btn-default">Tìm kiếm</button>
</form>