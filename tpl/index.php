<?php
/*
 * Template Name: 홈 화면
 */

if(!defined('ABSPATH')) exit;

get_header();
?>

<!-- 상단 메뉴 -->
<div class="main_top_div_001 sticky-top">
	<swiper-container class="mySwiper" pagination-clickable="false" slides-per-view="3"
                    space-between="0" free-mode="true" pagination="false">

			<swiper-slide>
				<a href="#pro001"><h6 class="main_top_h6001">기프톡 추천</h6></a>
			</swiper-slide>
			<swiper-slide>
				<a href="#pro002"><h6 class="main_top_h6001">생일 선물</h6></a>
			</swiper-slide>
			<swiper-slide>
				<a href="#pro003"><h6 class="main_top_h6001">부모님 선물</h6></a>
			</swiper-slide>
			<swiper-slide>
				<a href="#pro004"><h6 class="main_top_h6001">여자친구 선물</h6></a>
			</swiper-slide>
			<swiper-slide>
				<a href="#pro005"><h6 class="main_top_h6001">나에게 선물</h6></a>
			</swiper-slide>

			<swiper-slide></swiper-slide>
			<swiper-slide></swiper-slide>
		
	</swiper-container>
</div>

<!-- 상단 슬라이드 -->
<div id="main_ban" class="carousel slide" data-ride="carousel">
	<!-- <ul class="carousel-indicators">
		<li data-target="#main_ban" data-slide-to="0" class="active"></li>
		<li data-target="#main_ban" data-slide-to="1"></li>
		<li data-target="#main_ban" data-slide-to="2"></li>
	</ul> -->
	<div class="carousel-inner">
		<div class="carousel-item active">
		<img src="<?php echo get_template_directory_uri()?>/assets/image/main_ban_001.jpeg" alt="main_ban_001" width="600px">
		<div class="carousel-caption">
			<p>사랑하는 여자친구에게</p>
			<p>100일을 기념하여 사랑의 마음을 전하고 싶어요.</p>
		</div>   
		</div>
		<div class="carousel-item">
		<img src="<?php echo get_template_directory_uri()?>/assets/image/main_ban_002.jpeg" alt="main_ban_002" width="600px">
		<div class="carousel-caption">
			<p>사랑하는 여자친구에게</p>
			<p>100일을 기념하여 사랑의 마음을 전하고 싶어요.</p>
		</div>   
		</div>
		<div class="carousel-item">
		<img src="<?php echo get_template_directory_uri()?>/assets/image/main_ban_003.jpeg" alt="main_ban_003" width="600px">
		<div class="carousel-caption">
			<p>사랑하는 여자친구에게</p>
			<p>100일을 기념하여 사랑의 마음을 전하고 싶어요.</p>
		</div>   
		</div>
	</div>
</div>


<div style="overflow: hidden;">

	<!-- 상품리스트 01-->
	<div id="pro001"></div><!-- 가상 앨리먼트 -->
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

	<swiper-container class="mySwiper productSwiper" pagination-clickable="false" slides-per-view="3"
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
							<span class="company_name">업체명</span><br>
							<h6><?php echo $product->get_title()?></h6>
							<span class="price"><?php echo $product->get_price_html()?></span>
						</div>
					</div>
				<?php endforeach?>
			</swiper-slide>
			<!-- 반복문 end-->


			<swiper-slide></swiper-slide>
			<swiper-slide></swiper-slide>
		
	</swiper-container>



	<!-- 상품리스트 02-->
	<div id="pro002"></div><!-- 가상 앨리먼트 -->
	<ul class="product_List_product_ul_002">
		<li><h5>생일 선물<span style="font-size: 16px; font-weight:400"> 을 찾고 있나요?</span></h5></li>
		<li><a href="/product-catagory/?category=25">더보기</a></li>
	</ul>

	<?php
	$products_list = giftalk_get_products_list(array(
		'posts_per_page' => 3,
		'category' => 25,
		'keyword' => '',
	));
	?>

	<swiper-container class="mySwiper productSwiper" pagination-clickable="false" slides-per-view="3"
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
							<span class="company_name">업체명</span><br>
							<h6><?php echo $product->get_title()?></h6>
							<span class="price"><?php echo $product->get_price_html()?></span>
						</div>
					</div>
				<?php endforeach?> 
			</swiper-slide>
			<!-- 반복문 end-->


			<swiper-slide></swiper-slide>
			<swiper-slide></swiper-slide>
		
	</swiper-container>



	<!-- 상품리스트 03-->
	<div id="pro003"></div><!-- 가상 앨리먼트 -->
	<ul class="product_List_product_ul_002">
		<li><h5>부모님 선물<span style="font-size: 16px; font-weight:400"> 을 찾고 있나요?</span></h5></li>
		<li><a href="/product-catagory/?category=26">더보기</a></li>
	</ul>

	<?php
	$products_list = giftalk_get_products_list(array(
		'posts_per_page' => 3,
		'category' => 26,
		'keyword' => '',
	));
	?>

	<swiper-container class="mySwiper productSwiper" pagination-clickable="false" slides-per-view="3"
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
							<span class="company_name">업체명</span><br>
							<h6><?php echo $product->get_title()?></h6>
							<span class="price"><?php echo $product->get_price_html()?></span>
						</div>
					</div>
				<?php endforeach?>
			</swiper-slide>
			<!-- 반복문 end-->


			<swiper-slide></swiper-slide>
			<swiper-slide></swiper-slide>
		
	</swiper-container>



	<!-- 상품리스트 04-->
	<div id="pro004"></div><!-- 가상 앨리먼트 -->
	<ul class="product_List_product_ul_002">
		<li><h5>여자친구 선물<span style="font-size: 16px; font-weight:400"> 을 찾고 있나요?</span></h5></li>
		<li><a href="/product-catagory/?category=26">더보기</a></li>
	</ul>

	<?php
	$products_list = giftalk_get_products_list(array(
		'posts_per_page' => 3,
		'category' => 26,
		'keyword' => '',
	));
	?>

	<swiper-container class="mySwiper productSwiper" pagination-clickable="false" slides-per-view="3"
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
							<span class="company_name">업체명</span><br>
							<h6><?php echo $product->get_title()?></h6>
							<span class="price"><?php echo $product->get_price_html()?></span>
						</div>
					</div>
				<?php endforeach?>
			</swiper-slide>
			<!-- 반복문 end-->


			<swiper-slide></swiper-slide>
			<swiper-slide></swiper-slide>
		
	</swiper-container>



	<!-- 상품리스트 05-->
	<div id="pro005"></div><!-- 가상 앨리먼트 -->
	<ul class="product_List_product_ul_002">
		<li><h5>고생한 나에게 선물<span style="font-size: 16px; font-weight:400">로 위로해 주세요.</span></h5></li>
		<li><a href="/product-catagory/?category=26">더보기</a></li>
	</ul>
	<?php
	$products_list = giftalk_get_products_list(array(
		'posts_per_page' => 3,
		'category' => 26,
		'keyword' => '',
	));
	?>

	<swiper-container class="mySwiper productSwiper" pagination-clickable="false" slides-per-view="3"
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
							<span class="company_name">업체명</span><br>
							<h6><?php echo $product->get_title()?></h6>
							<span class="price"><?php echo $product->get_price_html()?></span>
						</div>
					</div>
				<?php endforeach?>
			</swiper-slide>
			<!-- 반복문 end-->


			<swiper-slide></swiper-slide>
			<swiper-slide></swiper-slide>

	</swiper-container>



</div>

<?php
get_footer();
?>