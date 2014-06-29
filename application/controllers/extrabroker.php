<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extrabroker extends Ci_Controller {

	protected $server = 'http://resbox.ru/api';
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
			'reservation_number' => 'R12345',
			'title' => "Mr",
			'fname' => 'John',
			'surname' => 'Doe',
			'birth' => '1981-06-11',
			'phone' => '+799988877766',
			'car_class' => 'ECAR',
			'car_group' => 'M',
			'car_type' => 'Hyundai Solaris',
			'pick_up_country' => 'Russia',
			'pick_up_city' => 'St. Petersburg',
			'pick_up_location' => 'St. Petersburg Pulkovo Airport',
			'pick_up_date' => '2014-06-29 15:45',
			'drop_off_location' => 'St. Petersburg Pulkovo Airport',
			'drop_off_date' => '2014-06-30 15:45',
			'cust_flight_number' => 'PS543',
			'equipment' => 'Navigation System (GPS) x 1',
			'account_number' => '11111',
			'rate_code' => '',
			'airline' => '',
			'comments' => ''
			
		);
		
		$order['signature'] = sha1($this->api_key.$order['reservation_number']);
		
		//print_r($order);
		//echo json_encode($order);
		
		$data = $this->rest->post('addorder', json_encode($order), 'json');
		
		print_r($data);
		//echo $data;
		
    }	

}


