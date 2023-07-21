<?php
/*
 * Template Name: 주소 입력 완료
 */

if(!defined('ABSPATH')) exit;

get_header();

$category = isset($_GET['category']) ? intval($_GET['category']) : '';
$term = get_term($category);

if(!$term){
	
}
?>


<div style="position: relative; width:100%; height:auto">
	<img src="<?php echo get_template_directory_uri()?>/assets/image/giftBack-img.png" alt="" width="100%">
	<div style="position: absolute; top:50%; left:50%; transform: translate(-50%, -50%); width:26%; text-align:center">
		<img src="<?php echo get_template_directory_uri()?>/assets/image/giftbox.png" alt="" width="100%">
		<h5 style="margin:0 -50px; margin-top:20px;"><span>이재모</span>님의 선물</h5>
	</div>
</div>
<div style="padding:40px; text-align:center">
	<p>
		이재모님이 보내는 행복을 바라는<br>
		마음이 곧 도착할 예정입니다.
	</p>
</div>



<!-- 하단 선물하기 버튼 -->
<div class="product_Detail_div_001" style="bottom:100px">
	<div></div>
	<div style="padding: 20px; font-size:12px; color:#787878">
		<p>배송은 약 2~3일 소요될 예정이며 배송 등의 문의는<br>판매처에 연락해주시기 바랍니다.</p>
		<p>판매처 | 메종드스윗츠 1544-5622</p>
	</div>
</div>
<!-- 하단 선물하기 버튼 -->
<div class="product_Detail_div_001">
	<div></div>
	<div style="padding: 20px; display:flex; gap:10px; align-items:flex-end">
		<button type="submit" class="btn btn-outline-warning btn-block " onclick="location.href='/product-giftbox/'">선물함</button>
		<button type="submit" class="btn btn-warning btn-block " onclick="location.href='/'">답례품 보러가기</button>
	</div>
</div>


<?php
get_footer();
?>

