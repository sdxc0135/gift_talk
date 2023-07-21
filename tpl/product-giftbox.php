<?php
/*
 * Template Name: product-giftbox
 */

if(!defined('ABSPATH')) exit;

get_header();

$category = isset($_GET['category']) ? intval($_GET['category']) : '';
$term = get_term($category);

if(!$term){
	
}
?>

<!-- 상품리스트 01-->
<ul class="product_List_product_ul_002 product_giftbox_ul_002">
	<li>
		<h5><span class="blackCss" onclick="displayDiv('getGift')" style="cursor:pointer;">받은 선물</span>&nbsp;&nbsp;&nbsp;<span class="grayCss" onclick="displayDiv('sendGift')" style="cursor:pointer;">보낸 선물</span></h5>
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


<!-- 받은선물 리스트 -->
<div class="getGift">
	<!-- 받은선물 리스트 사용가능 -->
	<div>
		<h5 style="margin-left: 20px;">사용가능</h5>
	</div>
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
			<div class="product_Catagory_product_div_001" style="position: relative;">
				<a href="<?php echo esc_url($product->get_permalink())?>">
					<?php
					// 상품 썸네일
					echo $product->get_image(array(200, 200));
					?>
				</a>
				<div class="lastDate">
					<span>D-60</span>
				</div>
			</div>
		</li>
		<li class="product_Catagory_product_li_001">
			<div>
				<div>
					<span>2023.05.11</span>
				</div>
				<h6><?php echo $product->get_title()?></h6>
				<span style="font-weight: 700;">유효기간 : 2023년 8월 11일</span>
			</div>
			<div>		
				<div class="product_giftbox_div_002">

					<button style="background: white; color:gray; border:1.4px solid #ced4da">선물 거절하기</button>
					<a href="/add-write/"><button>주소 입력하기</button></a>
					<!--<a href="/reviews-write"><button>리뷰 작성하기</button></a> 주소 입력한 상테-->
				</div>
			</div>
		</li>
	</ul>
	<?php endforeach?>

	<!-- 받은선물 리스트 사용완료 -->
	<div>
		<h5 style="margin-left: 20px; margin-top:10px;">사용완료</h5>
	</div>
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
			<div class="product_Catagory_product_div_001"  style="position: relative;">
				<a href="<?php echo esc_url($product->get_permalink())?>">
					<?php
					// 상품 썸네일
					echo $product->get_image(array(200, 200));
					?>
				</a>
				<div class="fullUsed">
					<span>사용<br>완료</span>
				</div>
			</div>
		</li>
		<li class="product_Catagory_product_li_001">
			<div>
				<div>
					<span>2023.05.11</span>
				</div>
				<h6><?php echo $product->get_title()?></h6>
			</div>
			<div>		
				<div class="product_giftbox_div_002">
					<span></span>
					<a href="/reviews-write"><button>리뷰 작성하기</button></a>
					<!-- <button style="background: white; color:gray; border:1.4px solid #ced4da">리뷰 보러가기</button> -->
				</div>
			</div>
		</li>
	</ul>
	<?php endforeach?>
</div>







<!-- 보낸선물 리스트 -->
<div class="sendGift" style="display: none;">
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
				<div>
					<span>2023.05.11</span>
				</div>
				<h6><?php echo $product->get_title()?></h6>
				<span style="font-weight: 700;">유효기간 : 2023년 8월 11일</span>
			</div>
			<div>
				<div class="product_giftbox_div_002">
					<span></span>		
					<button>재주문 하러가기</button>
				</div>
			</div>
		</li>
	</ul>
	<?php endforeach?>
</div>



<?php
get_footer();
?>

