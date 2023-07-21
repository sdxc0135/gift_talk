<?php
/*
 * Template Name: product-catagory
 */

if(!defined('ABSPATH')) exit;

get_header();

$category = isset($_GET['category']) ? intval($_GET['category']) : '';
$term = get_term($category);

if(!$term){
	
}
?>

<!-- <div class="product_top_001">
	<h6 class="produce_List_h6_001">
		<b><u>30대 남성 친구</u></b>가 <b><u>새로운 사업을 시작</u></b>하는 것을 <b><u>응원하는 마음</u></b>을 전하는 선물입니다.
	</h6>
</div> -->

<!-- 상품리스트 01-->
<ul class="product_List_product_ul_002">
	<li>
		<h5><?php echo esc_html($term->name)?></h5>
	</li>
	<li>
		<select class="custom-select custom-select-sm custom_select">
			<option value="추천순" selected>추천순</option>
			<option value="높은 가격 순">높은 가격 순</option>
			<option value="낮은 가격 순">낮은 가격 순</option>
			<option value="판매량순">판매량순</option>
			<option value="평점순">평점순</option>
		</select>
	</li>
</ul>

<?php
$products_list = giftalk_get_products_list(array(
	'posts_per_page' => 3,
	'category' => $category,
	'keyword' => '',
));
?>

<?php foreach($products_list as $product):?>
<ul class="product_Catagory_product_ul_001">
	<li>
		<div class="product_Catagory_product_div_001">
			<a href="<?php echo esc_url($product->get_permalink())?>">
				<?php
				// 상품 썸네일
				echo $product->get_image(array(200, 200));
				?>
			</a>
		</div>
	</li>
	<li class="product_Catagory_product_li_001">
		<div>
			<div>
				<span class="reviewNum" style="display: none;">3.6</span><!-- 평점 숫자(소수점 1자리포함)뿌려주기만 하면됨 -->
				<i class="fa fa-star fa002"></i>
				<i class="fa fa-star fa002"></i>
				<i class="fa fa-star fa002"></i>
				<i class="fa fa-star fa002"></i>
				<i class="fa fa-star fa002"></i>
			</div>
			<h6><?php echo $product->get_title()?></h6>
		</div>
		<div>
			<span>test</span>
			<h5><?php echo $product->get_price_html()?></h5>
		</div>
	</li>
	<li class="product_Catagory_product_li_001" style="position:relative;">
		<div class="product_Catagory_product_div_002" onclick="toggleStarColor(this)">
			<i class="fa fa-heart-o fa002"></i><!-- 즐겨찾기 버튼임 -->
		</div>
	</li>
</ul>
<?php endforeach?>

<?php
get_footer();
?>

