<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-cq8tImkPW1RRBaxNbfAkfNXQ', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('ProdukModel');
		$this->load->model('UserModel');
		$this->load->model('CartModel');

		$this->load->library('form_validation');
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
	}
	function generateRandomString($length = 7)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$tgl = date('Y');

		// var_dump($tgl);die;


		return "TR_" . $tgl . $randomString;
	}

    public function token()
    {
		
		$total = $_POST['total'];
		$ongkir = $_POST['ongkir'];
		$id_user = $_POST['id_user'];

		$alamat = $_POST['alamat'];
		$provinsi = $_POST['provinsi'];
		$kota = $_POST['kota'];
		$kode_pos = $_POST['kode_pos'];
		$kurir = $_POST['kurir'];
		$ongkir =
		preg_replace('/.*?(\d+)(?:[.,](\d+))?.*/', '\1.\2', $ongkir);

		$ran = $this->generateRandomString();

		$bank = 1;
		// var_dump($money);die;
		// Required
		$user = $this->UserModel->getUserById($id_user)[0];
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount'
			=> $total + $ongkir, // no decimal allowed for creditcard
		);

		$now = date('Y-m-d H:i:s');
		$tgl = $now;
		$dataAlamat = array(
			'alamat' => $alamat,
			'provinsi' => $provinsi,
			'kota' => $kota,
			'kode_pos' => $kode_pos,
			'created_at' => $tgl,
		);
		$id_alamat = $this->CartModel->AddAlamat($dataAlamat);
		$dataTransaksi = array(
			'id_user' => $id_user,
			'id_alamat' => $id_alamat,
			'id_method' => $bank,
			'bayar' => $total,
			'ongkir' => $ongkir,
			'jumlah' => $ongkir + $total,
			'kode_transaksi' => $ran,
			'created_at' => $tgl,
		);
		$id_transaksi = $this->CartModel->AddTransaksi($dataTransaksi);
		$cartUser = $this->CartModel->getCartByIdUser($id_user);
		// var_dump($id_transaksi);die;

		foreach ($cartUser as $key) {

			$dataDetailTransaksi = array(
				'id_transaksi' => $id_transaksi,
				'id_user' =>  $key->id_user,
				'id_produk' =>  $key->id_produk,
				'qty' =>  $key->qty,
			);
			$this->CartModel->AddDetailTransaksi($dataDetailTransaksi);
			$produk = $this->ProdukModel->getProdukByID($key->id_produk)[0];
			// var_dump($produk);die;
			$qtyNew = $produk->qty - $key->qty;

			$upd  = array(
				'qty' => $qtyNew,
			);

			$item1_details = array(
				'id' =>
				$id_transaksi,
				'price' => $total + $ongkir,
				'quantity' => $key->qty,
				'name' => $produk->nama_produk,
			);

			$this->ProdukModel->updateQTYbyID($upd, $key->id_produk);
			$this->CartModel->HapusCart($key->id_keranjang);
		// Optional



		// Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// Optional
		$billing_address = array(
		  'first_name'    =>
			$user->nama_lengkap,
		  'address'       => 	$alamat,
		  'city'          => $kota,
		  'postal_code'   => $kode_pos,
		  'phone'         => $user->no_phone,
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    =>
			$user->nama_lengkap,
			'address'       => 	$alamat,
			'city'          => $kota,
			'postal_code'   => $kode_pos,
			'phone'         => $user->no_phone,
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $user->nama_lengkap,
		  'email'         =>
			$user->email,
		  'phone'         => $user->no_phone,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}
}

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }
}
