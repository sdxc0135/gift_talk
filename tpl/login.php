<?php
/*
 * Template Name: login
 */

if(!defined('ABSPATH')) exit;

get_header('login');
?>

<div class="login_kakao_div_001">
	<img src="<?php echo get_template_directory_uri()?>/assets/image/giftalk_logo_001.png" alt="giftalk_logo" width="300px">
</div>

<div class="login_kakao_div_002">
	<h4>
		간편하게 로그인하고<br>
		다양한 서비스를 이용해 보세요.
	</h4>
</div>

<div class="login_kakao_div_003">
	<button type="button" class="btn btn-warning btn-block btn-lg" onclick="location.href='<?php echo esc_url(home_url('?action=cosmosfarm_members_social_login&channel=kakao'))?>&redirect_to=<?php echo urldecode($_GET['redirect_to'] ? $_GET['redirect_to'] : '')?>'"><img src="<?php echo get_template_directory_uri()?>/assets/image/kakaoicon.png" alt="kakao_icon" width="30px"> 카카오 로그인</button>
</div>

<div class="login_kakao_div_004">
	<a href="/signup/">다른 이메일로 시작하기</a>
</div>

<?php
get_footer('app');
?>