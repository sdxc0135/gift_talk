<?php
/*
 * Template Name: 주소 입력
 */

if(!defined('ABSPATH')) exit;

get_header();

$category = isset($_GET['category']) ? intval($_GET['category']) : '';
$term = get_term($category);

if(!$term){
	
}
?>


<ul class="product_List_product_ul_002">
	<li>
		<h5 style="margin: 0;">선물 받을 주소를 입력해주세요.</h5>
	</li>
</ul>

<div class="input-group mb-3" style="padding: 20px;">
	<input type="text" class="form-control " placeholder="지번, 도로명, 견물명으로 검색">
	<div class="input-group-append">
		<button class="btn btn-outline-warning "><img src="<?php echo get_template_directory_uri()?>/assets/image/search-btn.svg" alt="" width="20px"></button>
	</div>
</div>




<!-- 하단 선물하기 버튼 -->
<div class="product_Detail_div_001">
	<div></div>
	<div>
		<button type="submit" class="btn btn-warning btn-block btn-lg product_Detail_btn_001" onclick="location.href='/add-write-finish/'">주소입력 완료</button>
	</div>
</div>

<?php
get_footer();
?>

