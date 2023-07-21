<?php
/*
 * Template Name: 회원 정보
 */

if(!defined('ABSPATH')) exit;

get_header();
?>



<div style="overflow: hidden;">


	<div class="myPage_div_001">
		<div style="text-align:center;">
			<img src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt="" width="100%">
		</div>
		<div>
			<h5>이름</h5>
			<span>받은 선물 n개 </span>|<span> 보낸 선물 n개</span>
		</div>
	</div>

	<div class="information" style="margin:20px; border:1px solid #F1F1F1; border-radius:20px;">
		<div class="myPage_div_002">
			<div>성별</div>
			<div>남성</div>
		</div>
		<div class="myPage_div_002">
			<div>생일</div>
			<div>1990.01.21</div>
		</div>
		<div class="myPage_div_002">
			<div>휴대전화</div>
			<div>010-8888-8888</div>
		</div>
		<div class="myPage_div_002" style="border-bottom: 0;">
			<div>주소</div>
			<div>서울시 용산구~</div>
		</div>
	</div>
	<div class="infor_modify" style="margin:20px; border:1px solid #F1F1F1; border-radius:20px; overflow:hidden; display:none;">
		<div class="myPage_div_002">
			<div>성별</div>
			<div class="myPage_div_003">
				<select name="" id="">
					<option value="female">여성</option>
					<option value="male">남성</option>
				</select>
			</div>
		</div>
		<div class="myPage_div_002">
			<div>생일</div>
			<div class="myPage_div_003">
				<input type="date">
			</div>
		</div>
		<div class="myPage_div_002">
			<div>휴대전화</div>
			<div class="myPage_div_003">
				<input type="text" style="width: 75%;">
				<a href="" style="float: right;">인증하기</a>
				<div style="width: 100%; margin-top:10px; display:none;">
					<input type="text" style="width: 75%;">
					<a href="" style="float: right;">인증완료</a>
				</div>
			</div>
		</div>
		<div class="myPage_div_002"  style="border-bottom: 0;">
			<div>주소</div>
			<div class="myPage_div_003">
				<input type="text">
			</div>
		</div>
	</div>


	<div style="padding: 0 40px;">
		<div style="display:flex; justify-content:space-between;">
			<span>입점/제휴 문의</span>
			<a class="information" href="javascript:void(0)">수정하기</a>
			<div class="infor_modify" style="display: none;">
				<a href="javascript:void(0)">저장하기</a> |
				<a class="infor_modify_a" href="javascript:void(0)">취소</a>
			</div>
		</div>
		<button class="btn btn-warning btn-block btn-lg" onclick="" style="margin:40px 0 60px 0">카카오톡 상담하기</button>
	</div>

	

	<!-- 하단 정보 -->
	<div style="text-align: center;">
		<h6>기프톡 | 613-81-65278</h6>
		<h6>대표 : 이재모 | 설립일 : 2023.07.01</h6>
		<h6>주소 : 서울시 용두동 220-5</h6>
		<h6>통신판매업신고 : 2014-서울강남-01471호</h6>
	</div>


</div>

<script>
	jQuery(document).ready(function() {
		jQuery("a.information, .infor_modify_a").on("click", function(e) {
			e.preventDefault();
			jQuery(".information, .infor_modify").toggle();
		});
	});
</script>



	
<?php
get_footer();
?>