<?php
/*
 * Template Name: 카드 만들기
 */

if(!defined('ABSPATH')) exit;

get_header();

?>


<div style="margin:10px;padding:10px; background:#F3F3F3;">
	<div>
		<img src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt="" width="100%">
	</div>
	<div style="text-align: center; padding:20px; margin:0; background:white">
		<div class="textContainer">
			<p style="padding-bottom: 10px;">카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 
			카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 카드 등록 내용, 
			</p>
		</div>
	</div>
	<div style="margin-top: -60px;margin-left:-8px; margin-right:-8px;">
		<img src="<?php echo get_template_directory_uri()?>/assets/image/card_bottom.png" alt="" width="100%">
	</div>
</div>


<!-- 하단 선물하기 버튼 -->
<div class="product_Detail_div_001">
	<div></div>
	<div style="padding: 20px; display:flex; gap:10px; align-items:flex-end">
		<button type="submit" class="btn btn-outline-warning btn-block " onclick="location.href='/'">직접 선물하기</button>
		<button type="submit" class="btn btn-warning btn-block " onclick="location.href='/'">메세지로 보내기</button>
	</div>
</div>


<?php
get_footer();
?>

