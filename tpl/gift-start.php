<?php
/*
 * Template Name: 선물 시작하기
 */

if(!defined('ABSPATH')) exit;

get_header();

?>



<div>
	<img src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt="" width="100%">
</div>
<div style="text-align: center; padding:20px; margin:0; ">
	<div class="textContainer">
		<textarea id="myTextarea" maxlength="500" name="" rows="7"></textarea>
		<div id="textareaCounter">0 / 500자</div>
	</div>
</div>




<!-- 하단 선물하기 버튼 -->
<div class="product_Detail_div_001">
	<div></div>
	<div>
		<button type="submit" class="btn btn-warning btn-block btn-lg product_Detail_btn_001" onclick="location.href='/make-card'">결제하기</button>
	</div>
</div>


<script>
	    //리뷰 등록 카운터 이벤트
		jQuery("#myTextarea").on('input', function() {
			var textLength = jQuery(this).val().length;
			jQuery('#textareaCounter').text(textLength + " / 500자");
		});
</script>

<?php
get_footer();
?>

