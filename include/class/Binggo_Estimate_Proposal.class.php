<?php
/**
 * Binggo_Estimate_Proposal
 * @copyright Copyright 2022 thefunnel. All rights reserved.
 */
final class Binggo_Estimate_Proposal {
	
	var $_data;
	
	public function __construct($estimate_proposal_id=''){
		$this->_data = array();
		
		if($estimate_proposal_id){
			$this->init_with_id($estimate_proposal_id);
		}
	}
	
	public function __get($key){
		if(isset($this->_data[$key])){
			return $this->_data[$key];
		}
		return '';
	}
	
	public function __set($key, $value){
		$this->_data[$key] = $value;
	}
	
	public function set_data($data){
		$this->_data = $data;
	}
	
	public function init_with_id($estimate_proposal_id){
		global $wpdb;
		
		$this->_data = array();
		$estimate_proposal_id = intval($estimate_proposal_id);
		
		if($estimate_proposal_id){
			$estimate_proposal_id = esc_sql($estimate_proposal_id);
			$row = $wpdb->get_row("SELECT * FROM `{$wpdb->prefix}binggo_estimate_proposal` WHERE `estimate_proposal_id`='{$estimate_proposal_id}' LIMIT 1", ARRAY_A);
			
			if($row){
				$this->set_data($row);
			}
		}
	}
	
	public function ID(){
		return intval($this->estimate_proposal_id);
	}
	
	public function create(){
		global $wpdb;
		
		$data = array();
		$data['estimate_id'] = intval($this->estimate_id);
		$data['user_id'] = intval($this->user_id);
		$data['to_user_id'] = intval($this->to_user_id);
		$data['proposal_status'] = $this->proposal_status;
		$data['install_people_number'] = $this->install_people_number;
		$data['install_working_time'] = $this->install_working_time;
		$data['install_cost'] = $this->install_cost;
		$data['demolition_people_number'] = $this->demolition_people_number;
		$data['demolition_working_time'] = $this->demolition_working_time;
		$data['demolition_cost'] = $this->demolition_cost;
		$data['part_name'] = $this->part_name;
		$data['part_cost'] = $this->part_cost;
		$data['other_name'] = $this->other_name;
		$data['other_cost'] = $this->other_cost;
		$data['update_ymdhis'] = date('YmdHis', current_time('timestamp'));
		$data['create_ymdhis'] = date('YmdHis', current_time('timestamp'));
		
		$estimate_proposal_id = 0;
		
		if($data['estimate_id'] && $data['user_id'] && $data['to_user_id']){
			$wpdb->insert("{$wpdb->prefix}binggo_estimate_proposal", $data);
			$estimate_proposal_id = $wpdb->insert_id;
		}
		return $estimate_proposal_id;
	}
	
	public function update(){
		global $wpdb;
		
		if($this->estimate_proposal_id){
			$data = array();
			$data['estimate_id'] = intval($this->estimate_id);
			$data['user_id'] = intval($this->user_id);
			$data['to_user_id'] = intval($this->to_user_id);
			$data['proposal_status'] = $this->proposal_status;
			$data['install_people_number'] = $this->install_people_number;
			$data['install_working_time'] = $this->install_working_time;
			$data['install_cost'] = $this->install_cost;
			$data['demolition_people_number'] = $this->demolition_people_number;
			$data['demolition_working_time'] = $this->demolition_working_time;
			$data['demolition_cost'] = $this->demolition_cost;
			$data['part_name'] = $this->part_name;
			$data['part_cost'] = $this->part_cost;
			$data['other_name'] = $this->other_name;
			$data['other_cost'] = $this->other_cost;
			$data['update_ymdhis'] = date('YmdHis', current_time('timestamp'));
			$data['create_ymdhis'] = $this->create_ymdhis;
			
			$where = array();
			$where['estimate_proposal_id'] = $this->estimate_proposal_id;
			
			if($data['estimate_id'] && $data['user_id'] && $data['to_user_id'] && $where['estimate_proposal_id']){
				$wpdb->update("{$wpdb->prefix}binggo_estimate_proposal", $data, $where);
			}
		}
		return $this->estimate_proposal_id;
	}
	
	public function delete(){
		global $wpdb;
		
		if($this->estimate_proposal_id){
			$where = array();
			$where['estimate_proposal_id'] = $this->estimate_proposal_id;
			
			if($where['estimate_proposal_id']){
				$wpdb->delete("{$wpdb->prefix}binggo_estimate_proposal", $where);
			}
		}
	}
	
	public function get_title(){
		$title = '';
		
		if($this->estimate_proposal_id){
			$title = sprintf('%s %s', $this->work_place, $this->estimate_category);
		}
		return $title;
	}
	
	public function get_user(){
		$user = new WP_User();
		
		if($this->estimate_proposal_id){
			$user = new WP_User($this->user_id);
		}
		return $user;
	}
	
	public function get_to_user(){
		$user = new WP_User();
		
		if($this->estimate_proposal_id){
			$user = new WP_User($this->to_user);
		}
		return $user;
	}
	
	public function get_status_number(){
		$status_number = '1';
		
		if($this->estimate_proposal_id){
			switch($this->estimate_status){
				case 'request' : $status_number = '1'; break; // 견적요청
				case 'consulting' : $status_number = '2'; break; // 상담중
				case 'closing' : $status_number = '3'; break; // 요청마감
				case 'contracted' : $status_number = '4'; break; // 계약됨
				case 'completed' : $status_number = '5'; break; // 거래완료
			}
		}
		return intval($status_number);
	}
	
	public function get_total_cost(){
		$total_cost = 0;
		
		if($this->estimate_proposal_id){
			$total_cost += $this->install_cost;
			$total_cost += $this->demolition_cost;
			$total_cost += $this->part_cost;
			$total_cost += $this->other_cost;
		}
		return $total_cost;
	}
	
	public function get_down_payment(){
		$down_payment = 0;
		
		if($this->estimate_proposal_id){
			$down_payment = round($this->get_total_cost() * 0.1);
		}
		return $down_payment;
	}
	
}