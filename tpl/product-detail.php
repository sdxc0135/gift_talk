<?php
/*
 * Template Name: product-detail
 */

if(!defined('ABSPATH')) exit;

get_header();
?>

<div>
	<img src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt="" width="100%">
</div>

<ul class="product_List_product_ul_002">
	<li><h6>가장 많이 찾는 선물</h5></li>
</ul>

<ul class="product_Detail_ul_001">
	<li class="product_Detail_li_001">
		<ul class="product_Detail_ul_002">
			<li>가격 | 55,000원</li>
			<li>배송 | 무료배송</li>
			<li>판매자 | 플러스플라워</li>
			<li>문의처 | 1544-5622</li>
		</ul>
	</li>
	<li class="product_Detail_li_002">
		<ul class="product_Detail_ul_003">
			<li>
				<button type="button" class="btn btn-outline-warning">공유하기</button>
			</li>
			<li>
				<button type="button" class="btn btn-warning" onclick="location.href='/login/'">선물하기</button>
			</li>
		</ul>
	</li>
</ul>

<div class="bottom_001">
	<img src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt="" width="100%">
</div>

<!-- 하단 선물하기 버튼 -->
<div class="product_Detail_div_001">
	<div></div>
	<div>
		<button type="submit" class="btn btn-warning btn-block btn-lg product_Detail_btn_001" onclick="location.href='/login/'">선물하기 | 50,000원</button>
	</div>
</div>

<?php
get_footer();
?>