<?php
/**
 * Binggo_Photo_Drawing_Storage
 * @copyright Copyright 2022 thefunnel. All rights reserved.
 */
class Binggo_Photo_Drawing_Storage {
	
	//var $auth_url = 'https://api.ucloudbiz.olleh.com/storage/v1/auth';
	var $auth_url = 'https://ssproxy.ucloudbiz.olleh.com/auth/v1.0';
	var $access_key = '';
	var $secret_key = '';
	var $token = '';
	var $storage = '';
	var $filebox = '';
	var $files = array();
	
	public function __construct(){
		$this->access_key = 'MTU2NjI3NTY1MTE1NjYyNzExNTg3Nzk3';
		$this->secret_key = 'MTU2NjI3MzI2NDE1NjYyNzExNTgyNzM5';
		$this->filebox = 'binggo-photo-drawing';
	}
	
	public function connect($filebox=''){
		if(!$this->token || !$this->storage){
			while(true){
				$args = array('timeout'=>60, 'headers'=>array('X-Storage-User'=>$this->access_key, 'X-Storage-Pass'=>$this->secret_key));
				$response = wp_remote_get($this->auth_url, $args);
				
				if(is_wp_error($response)){
					$error_message = $response->get_error_message();
					$this->token = '';
					$this->storage = '';
				}
				else{
					$header = $response['headers'];
					$this->token = $header['x-auth-token'];
					$this->storage = $header['x-storage-url'];
					break;
				}
			}
		}
		if($filebox){
			$this->filebox = $filebox;
		}
		return $this;
	}
	
	public function put($file, $filename){
		$file_path = date('Y/m', current_time('timestamp'));
		$url = "{$this->storage}/{$this->filebox}/{$file_path}/{$filename}";
		
		$args = array();
		$args['method'] = 'PUT';
		$args['timeout'] = '60';
		$args['headers'] = array('X-Auth-Token'=>$this->token, 'Content-Type'=>mime_content_type($file), 'Content-Length'=>filesize($file));
		$args['body'] = file_get_contents($file);
		$response = wp_remote_request($url, $args);
		
		$code = wp_remote_retrieve_response_code($response);
		$message = '';
		
		if(is_wp_error($response)){
			$message = $response->get_error_message();
		}
		else{
			switch($code){
				case '201': $message = '요청처리 완료'; break;
				case '202': $message = '잘못된 요청'; break;
				case '401': $message = '인증 실패(token error)'; break;
				case '403': $message = '권한 없음'; break;
				case '411': $message = 'Content-Length 에러'; break;
				case '422': $message = 'Etag 값 불일치(수행불가)'; break;
			}
		}
		
		if($code != '201'){
			$url = '';
		}
		
		$result = new stdClass();
		$result->code = $code;
		$result->error = $message;
		$result->url = $url;
		return $result;
	}
	
	public function get($filename){
		// return httpCode as 200 when it succeed
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "{$this->storage}/{$this->filebox}/{$filename}");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Token: ' . $this->token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$tmp = curl_exec($ch);
		$msg = '';
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($httpCode != 200){
			if(curl_errno($ch))
				$msg = curl_error($ch);
			else
				$msg = '파일 가져오기 실패';
		}
		else{
			$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			$header = substr($tmp, 0, $header_size);
			$body = substr($tmp, $header_size);
			
			foreach(explode("\r\n", $header) as $i => $line){
				if(!trim($line)) continue;
				$value = explode(': ', $line);
				if(count($value) <= 1) continue;
				$key = $value[0];
				$value = $value[1];
				$headers[$key] = $value;
			}
		}
		curl_close($ch);
		
		$result = new stdClass();
		$result->error = $msg;
		$result->data = $body;
		$result->type = $headers['Content-Type'];
		$result->size = $headers['Content-Length'];
		return $result;
	}
	
	public function delete($filename){
		// return httpCode as 204 when it succeed
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "{$this->storage}/{$this->filebox}/{$filename}");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Token: ' . $this->token));
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		return $httpCode=='204'?true:false;
	}
}