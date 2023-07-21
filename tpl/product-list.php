<?php
/*
 * Template Name: product-list
 */

if(!defined('ABSPATH')) exit;

get_header();
?>

<div class="product_top_001">
	<h6 class="produce_List_h6_001">
		<b><u>30대 남성 친구</u></b>가 <b><u>새로운 사업을 시작</u></b>하는 것을 <b><u>응원하는 마음</u></b>을 전하는 선물입니다.
	</h6>
</div>

<!-- 상품리스트 01-->
<ul class="product_List_product_ul_002" >
	<li><h5>기프톡 추천</h5></li>
	<li><a href="/product-catagory/?category=24">더보기</a></li>
</ul>

<?php
$products_list = giftalk_get_products_list(array(
	'posts_per_page' => 3,
	'category' => 24,
	'keyword' => '',
));
?>

<swiper-container class="mySwiper" pagination-clickable="false" slides-per-view="3"
				space-between="0" free-mode="false" pagination="false">

		<!-- 반복문 -->
		<swiper-slide>
			<?php foreach($products_list as $product):?>
				<div class="product_List_product_div_001">
					<a href="<?php echo esc_url($product->get_permalink())?>">
						<?php
						// 상품 썸네일
						echo $product->get_image(array(200, 200));
						?>
					</a>
					<div class="product_List_product_div_002">
						<h6><?php echo $product->get_title()?></h6>
						<span class="price"><?php echo $product->get_price_html()?></span>
					</div>
				</div>
			<?php endforeach?>
		</swiper-slide>
	
</swiper-container>


<!-- 상품리스트 02-->
<ul class="product_List_product_ul_002">
	<li><h5>특별하게 전하는 선물</h5></li>
	<li><a href="/product-catagory/?category=25">더보기</a></li>
</ul>

<?php
$products_list = giftalk_get_products_list(array(
	'posts_per_page' => 3,
	'category' => 25,
	'keyword' => '',
));
?>

<swiper-container class="mySwiper" pagination-clickable="false" slides-per-view="3"
				space-between="0" free-mode="false" pagination="false">

		<!-- 반복문 -->
		<swiper-slide>
			<?php foreach($products_list as $product):?>
				<div class="product_List_product_div_001">
					<a href="<?php echo esc_url($product->get_permalink())?>">
						<?php
						// 상품 썸네일
						echo $product->get_image(array(200, 200));
						?>
					</a>
					<div class="product_List_product_div_002">
						<h6><?php echo $product->get_title()?></h6>
						<span class="price"><?php echo $product->get_price_html()?></span>
					</div>
				</div>
			<?php endforeach?>
		</swiper-slide>
	
</swiper-container>

<!-- 상품리스트 03-->
<ul class="product_List_product_ul_002">
	<li><h5>부담 없는 선물</h5></li>
	<li><a href="/product-catagory/?category=26">더보기</a></li>
</ul>

<?php
$products_list = giftalk_get_products_list(array(
	'posts_per_page' => 3,
	'category' => 26,
	'keyword' => '',
));
?>

<swiper-container class="mySwiper" pagination-clickable="false" slides-per-view="3"
				space-between="0" free-mode="false" pagination="false">

		<!-- 반복문 -->
		<swiper-slide>
			<?php foreach($products_list as $product):?>
				<div class="product_List_product_div_001">
					<a href="<?php echo esc_url($product->get_permalink())?>">
						<?php
						// 상품 썸네일
						echo $product->get_image(array(200, 200));
						?>
					</a>
					<div class="product_List_product_div_002">
						<h6><?php echo $product->get_title()?></h6>
						<span class="price"><?php echo $product->get_price_html()?></span>
					</div>
				</div>
			<?php endforeach?>
		</swiper-slide>
	
</swiper-container>

<?php
get_footer();
?>