<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extrabroker extends Ci_Controller {

	protected $server = 'http://extrabroker.mmp/api';
	protected $api_key = '12345';

	public function __construct() {
		parent::__construct();
		
		$this->load->library('rest');
        $this->rest->initialize(array('server' => $this->server));
	}

	public function index() {
		
	}
	
	public function addorder() {
		
		$order = array(
			'reservation_number' => '1',
			'title' => '34',
			'fname' => '34',
			'phone' => '34',
			'car_class' => '234',
			'car_group' => '234',
			'car_type' => '234',
			'pick_up_country' => '234',
			'pick_up_city' => '234',
			'pick_up_location' => '234',
			'pick_up_date' => '234',
			'drop_off_location' => '234',
			'drop_off_date' => '234',
			'cust_flight_number' => '234',
			'equipment' => '234',
			'equipment' => '234',
			'account_number' => '11111',
		);
		
		$order['signature'] = sha1($this->api_key.$order['reservation_number']);
		
		//print_r($order);
		//echo json_encode($order);
		
		$data = $this->rest->post('addorder', json_encode($order), 'json');
		
		print_r($data);

    }	

}


