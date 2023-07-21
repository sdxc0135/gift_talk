<?php
/*
 * Template Name: 찜 목록
 */

if(!defined('ABSPATH')) exit;

get_header();

$category = isset($_GET['category']) ? intval($_GET['category']) : '';
$term = get_term($category);

if(!$term){
	
}
?>


<!-- 상품리스트 01-->
<ul class="product_List_product_ul_002">
	<li>
		<h5>찜한 선물</h5>
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
<ul class="product_Catagory_product_ul_001 productSwiper">
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
			<span class="company_name">업체명</span><br>
			<h6><?php echo $product->get_title()?></h6>
		</div>
		<div>
			<h5><?php echo $product->get_price_html()?></h5>
		</div>
		<div class="product_Catagory_product_div_002" onclick="toggleStarColor(this)">
			<i class="fa fa-heart-o" ></i><!-- 찜하기 -->
		</div>
	</li>
</ul>
<?php endforeach?>

<?php
get_footer();
?>

