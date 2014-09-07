<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resbox extends Ci_Controller {

	//protected $server = 'http://resbox.ru/api';
	protected $server = 'http://resbox.mmp/api';
	protected $api_key = '12345';

	public function __construct() {
		parent::__construct();
		
		$this->load->library('rest');
        $this->rest->initialize(array('server' => $this->server));
	}

	public function index() {
		
	}

    public function addxml()
    {
        $signature = sha1($this->api_key.$this->input->post('account_number'));
        $data['xml'] = array(
            'account_number'        => $this->input->post('account_number')?$this->input->post('account_number'):'',
            'signature'             => $signature,
            'reservation_number1'   => $this->input->post('reservation_number1')?$this->input->post('reservation_number1'):'',
            'title1'                => $this->input->post('title1')?$this->input->post('title1'):'',
            'fname1'                => $this->input->post('fname1')?$this->input->post('fname1'):'',
            'surname1'              => $this->input->post('surname1')?$this->input->post('surname1'):'',
            'birth1'                => $this->input->post('birth1')?$this->input->post('birth1'):'',
            'phone1'                => $this->input->post('phone1')?$this->input->post('phone1'):'',
            'cust_flight_number1'   => $this->input->post('cust_flight_number1')?$this->input->post('cust_flight_number1'):'',
            'airline1'              => $this->input->post('airline1')?$this->input->post('airline1'):'',
            'rate_code1'            => $this->input->post('rate_code1')?$this->input->post('rate_code1'):'',
            'comments1'             => $this->input->post('comments1')?$this->input->post('comments1'):'',
            'vehicle_class1'            => $this->input->post('vehicle_class1')?$this->input->post('vehicle_class1'):'',
            'vehicle_group1'            => $this->input->post('vehicle_group1')?$this->input->post('vehicle_group1'):'',
            'vehicle_type1'            => $this->input->post('vehicle_type1')?$this->input->post('vehicle_type1'):'',
            'equipment1'            => $this->input->post('equipment1')?$this->input->post('equipment1'):'',
            'pick_up_country1'      => $this->input->post('pick_up_country1')?$this->input->post('pick_up_country1'):'',
            'pick_up_city1'         => $this->input->post('pick_up_city1')?$this->input->post('pick_up_city1'):'',
            'pick_up_location1'     => $this->input->post('pick_up_location1')?$this->input->post('pick_up_location1'):'',
            'pick_up_location1'     => $this->input->post('pick_up_date1')?$this->input->post('pick_up_date1'):'',
            'pick_up_date1'         => $this->input->post('pick_up_date1')?$this->input->post('pick_up_date1'):'',
            'drop_off_location1'    => $this->input->post('drop_off_location1')?$this->input->post('drop_off_location1'):'',
            'drop_off_date1'        => $this->input->post('drop_off_date1')?$this->input->post('drop_off_date1'):'',
            'drop_off_date1'        => $this->input->post('drop_off_date1')?$this->input->post('drop_off_date1'):'',
            'reservation_number2'   => $this->input->post('reservation_number2')?$this->input->post('reservation_number2'):'',
            'title2'                => $this->input->post('title2')?$this->input->post('title2'):'',
            'fname2'                => $this->input->post('fname2')?$this->input->post('fname2'):'',
            'surname2'              => $this->input->post('surname2')?$this->input->post('surname2'):'',
            'birth2'                => $this->input->post('birth2')?$this->input->post('birth2'):'',
            'phone2'                => $this->input->post('phone2')?$this->input->post('phone2'):'',
            'cust_flight_number2'   => $this->input->post('cust_flight_number2')?$this->input->post('cust_flight_number2'):'',
            'airline2'              => $this->input->post('airline2')?$this->input->post('airline2'):'',
            'rate_code2'            => $this->input->post('rate_code2')?$this->input->post('rate_code2'):'',
            'comments2'             => $this->input->post('comments2')?$this->input->post('comments2'):'',
            'vehicle_class2'            => $this->input->post('vehicle_class2')?$this->input->post('vehicle_class2'):'',
            'vehicle_group2'            => $this->input->post('vehicle_group2')?$this->input->post('vehicle_group2'):'',
            'vehicle_type2'            => $this->input->post('vehicle_type2')?$this->input->post('vehicle_type2'):'',
            'equipment2'            => $this->input->post('equipment2')?$this->input->post('equipment2'):'',
            'pick_up_country2'      => $this->input->post('pick_up_country2')?$this->input->post('pick_up_country2'):'',
            'pick_up_city2'         => $this->input->post('pick_up_city2')?$this->input->post('pick_up_city2'):'',
            'pick_up_location2'     => $this->input->post('pick_up_location2')?$this->input->post('pick_up_location2'):'',
            'pick_up_date2'         => $this->input->post('pick_up_date2')?$this->input->post('pick_up_date2'):'',
            'drop_off_location2'    => $this->input->post('drop_off_location2')?$this->input->post('drop_off_location2'):'',
            'drop_off_date2'        => $this->input->post('drop_off_date2')?$this->input->post('drop_off_date2'):'',
            'drop_off_date2'        => $this->input->post('drop_off_date2')?$this->input->post('drop_off_date2'):''
        );

        if ($this->input->post('save'))
        {
            print_r($data['xml']);
            $reservation1 = '';
            $reservation2 = '';
            if (!empty($data['xml']['reservation_number1']))
            {
                $reservation1 = '<reservation>
            <reservation_number>'.$data['xml']['reservation_number1'].'</reservation_number>
            <customer>
                <title>'.$data['xml']['title1'].'</title>
                <fname>'.$data['xml']['fname1'].'</fname>
                <surname>'.$data['xml']['surname1'].'</surname>
                <birth>'.$data['xml']['birth1'].'</birth>
                <phone>'.$data['xml']['phone1'].'</phone>
                <cust_flight_number>'.$data['xml']['cust_flight_number1'].'</cust_flight_number>
                <airline>'.$data['xml']['airline1'].'</airline>
                <rate_code>'.$data['xml']['rate_code1'].'</rate_code>
                <comments>'.$data['xml']['comments1'].'</comments>
            </customer>
            <vehicle>
                <vehicle_class>'.$data['xml']['vehicle_class1'].'</vehicle_class>
                <vehicle_group>'.$data['xml']['vehicle_group1'].'</vehicle_group>
                <vehicle_type>'.$data['xml']['vehicle_type1'].'</vehicle_type>
                <equipment>'.$data['xml']['equipment1'].'</equipment>
            </vehicle>
            <pickup>
                <pick_up_country>'.$data['xml']['pick_up_country1'].'</pick_up_country>
                <pick_up_city>'.$data['xml']['pick_up_city1'].'</pick_up_city>
                <pick_up_location>'.$data['xml']['pick_up_location1'].'</pick_up_location>
                <pick_up_date>'.$data['xml']['pick_up_date1'].'</pick_up_date>
            </pickup>
            <dropoff>
                <drop_off_location>'.$data['xml']['drop_off_location1'].'</drop_off_location>
                <drop_off_date>'.$data['xml']['drop_off_date1'].'</drop_off_date>
            </dropoff>
            </reservation>';

            }
            if (!empty($data['xml']['reservation_number2']))
            {
                $reservation2 = '<reservation>
            <reservation_number>'.$data['xml']['reservation_number2'].'</reservation_number>
            <customer>
                <title>'.$data['xml']['title2'].'</title>
                <fname>'.$data['xml']['fname2'].'</fname>
                <surname>'.$data['xml']['surname2'].'</surname>
                <birth>'.$data['xml']['birth2'].'</birth>
                <phone>'.$data['xml']['phone2'].'</phone>
                <cust_flight_number>'.$data['xml']['cust_flight_number2'].'</cust_flight_number>
                <airline>'.$data['xml']['airline2'].'</airline>
                <rate_code>'.$data['xml']['rate_code2'].'</rate_code>
                <comments>'.$data['xml']['comments2'].'</comments>
            </customer>
            <vehicle>
                <vehicle_class>'.$data['xml']['vehicle_class2'].'</vehicle_class>
                <vehicle_group>'.$data['xml']['vehicle_group2'].'</vehicle_group>
                <vehicle_type>'.$data['xml']['vehicle_type2'].'</vehicle_type>
                <equipment>'.$data['xml']['equipment2'].'</equipment>
            </vehicle>
            <pickup>
                <pick_up_country>'.$data['xml']['pick_up_country2'].'</pick_up_country>
                <pick_up_city>'.$data['xml']['pick_up_city2'].'</pick_up_city>
                <pick_up_location>'.$data['xml']['pick_up_location2'].'</pick_up_location>
                <pick_up_date>'.$data['xml']['pick_up_date2'].'</pick_up_date>
            </pickup>
            <dropoff>
                <drop_off_location>'.$data['xml']['drop_off_location2'].'</drop_off_location>
                <drop_off_date>'.$data['xml']['drop_off_date2'].'</drop_off_date>
            </dropoff>
            </reservation>';

            }
            $xml = '<?xml version="1.0" encoding="UTF-8"?><MakeReservation>
                <account_number>'.$data['xml']['account_number'].'</account_number>
                <signature>'.$data['xml']['signature'].'</signature>
                 <reservations>
                    '.$reservation1.'
                    '.$reservation2.'
                  </reservations>
        </MakeReservation>';
            echo base64_encode($xml);
            $url = 'http://resbox-z.dev.dataloft.ru/api/default/MakeReservation.xml';
            echo $this->curl->simple_post($url, array('xml' => base64_encode($xml)), array(CURLOPT_USERAGENT => true));
        }
        $this->load->view('xml_form', $data);
    }

	public function addorder() {
		
		$order = array(
			'reservation_number' => 'R12345',
			'title' => "Mr",
			'fname' => 'John',
			'surname' => 'Doe',
			'birth' => '1981-06-11',
			'phone' => '+799988877766',
			'country' => 'Republic of South Africa',
			'vehicle_class' => 'ECAR',
			'vehicle_group' => 'M',
			'vehicle_type' => 'Hyundai Solaris',
			'pick_up_country' => 'Russia',
			'pick_up_city' => 'St. Petersburg',
			'pick_up_location' => 'St. Petersburg Pulkovo Airport',
			'pick_up_date' => '2014-06-29 15:45',
			'drop_off_location' => 'St. Petersburg Pulkovo Airport',
			'drop_off_date' => '2014-06-30 15:45',
			'cust_flight_number' => 'PS543',
			'equipment' => 'Navigation System (GPS) x 1',
			'account_number' => '11111',
			'rate_code' => 'USD',
			'airline' => 'Emirates',
			'comments' => 'Bla bla bla'
			
		);
		
		$order['signature'] = sha1($this->api_key.$order['reservation_number']);

		$data = $this->rest->post('addorder', json_encode($order), 'json');
		
		print_r($data);

    }	

}


