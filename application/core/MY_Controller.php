<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('AuthModel');
        date_default_timezone_set('asia/jakarta');
        $this->load->library('session');
        $this->load->library('user_agent');
        if (!$this->session->has_userdata('language')) {
            $this->session->set_userdata('language', 'indonesia');
        }
	}

	public function myHeaderMobile($in)
	{
		$bu = base_url();
		$bu_user = $bu . 'user/';
		$bodyColor = array_key_exists('bodyColor', $in) ? $in['bodyColor'] : 3;
		$title = array_key_exists('title', $in) ? $in['title'] : 'Bidding System';
		$isLoggedIn = array_key_exists('loggedIn', $in) ? $in['loggedIn'] : 0;
		$logo = array_key_exists('logo', $in) ? $in['logo'] : 1;
		$backIcon = array_key_exists('backIcon', $in) ? $in['backIcon'] : 0;
		$backLink = array_key_exists('backLink', $in) ? $in['backLink'] : $bu_user . 'index';
		$icons = array_key_exists('icons', $in) ? $in['icons'] : 0;
		$notifications = array_key_exists('notifications', $in) ? $in['notifications'] : 0;
		$id_tipe_produk = array_key_exists('id_tipe_produk', $in) ? $in['id_tipe_produk'] : 1; // default HP
		$includeJS = array_key_exists('includeJS', $in) ? $in['includeJS'] : array();
		$includeCSS = array_key_exists('includeCSS', $in) ? $in['includeCSS'] : array();
		$hiddenInput = array_key_exists('hiddenInput', $in) ? $in['hiddenInput'] : array();
		$out = '

	<!DOCTYPE html>
	<html lang="en">
			
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta http-equiv="x-ua-compatible" content="ie=edge">
			<title>' . $title . '</title>
			<!-- jQuery UI CSS -->
			<link href="' . $bu . 'assets/css/jquery.ui.css" rel="stylesheet">
			<!-- Bootstrap core CSS -->
			<link href="' . $bu . 'assets/css/bootstrap.min.css" rel="stylesheet">
			<link href="' . $bu . 'assets/css/bootstrap-select.min.css" rel="stylesheet">
			<!-- Material Design Bootstrap -->
			<link href="' . $bu . 'assets/css/mdb.min.css" rel="stylesheet">
			<!-- Your custom styles (optional) -->
			<link href="' . $bu . 'assets/css/style-mobile.css" rel="stylesheet">
			';
		if (count($includeCSS) > 0) {
			for ($i = 0; $i < count($includeCSS); $i++) {
				$out .= '
                    <link href="' . $includeCSS[$i] . '" rel="stylesheet">
                ';
			}
		}
		$out .= '
    </head>
    <body class="biz-bg-w-' . $bodyColor . '">
        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script src="' . $bu . 'assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="' . $bu . 'assets/js/jquery.ui.min.js" type="text/javascript"></script>
        <!-- Bootstrap tooltips -->
        <script src="' . $bu . 'assets/js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="' . $bu . 'assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="' . $bu . 'assets/js/bootstrap-select.min.js" type="text/javascript"></script>
        <!-- MDB core JavaScript -->
        <script src="' . $bu . 'assets/js/mdb.min.js" type="text/javascript"></script>
        <!-- FontAwesome JavaScript -->
        <script src="' . $bu . 'assets/js/fontawesome.js" type="text/javascript"></script>
        <script src="' . $bu . 'assets/js/fontawesome.solid.js" type="text/javascript"></script>
        <script src="' . $bu . 'assets/js/custom.js" type="text/javascript"></script>
    ';
		if (count($includeJS) > 0) {
			for ($i = 0; $i < count($includeJS); $i++) {
				$out .= '
                <script src="' . $includeJS[$i] . '" type="text/javascript"></script>
            ';
			}
		}
		$out .= '
    <input type="hidden" value="' . $id_tipe_produk . '" id="id_tipe_produk" />
    ';
		if (count($hiddenInput) > 0) {
			foreach ($hiddenInput as $key => $val) {
				$out .= '
                <input type="hidden" value="' . $val . '" id="' . $key . '" />
            ';
			}
		}

		if ($isLoggedIn == 1) {
			$out .= '
        <!--Navbar -->
        ';
			if ($backIcon == 1) {
				$ml_logo = '';
				if ($icons == 1) $ml_logo = '';
				$out .= '
            <nav class="navbar biz-bg-w-2 shadow-none row mr-0" style="width: auto!important;">
                <a onClick="window.location.replace(this.href);" href="' . $backLink . '" class="biz-text-w-11 pl-2"><span class="fas fa-chevron-left fa-2x"></span></a>
                <a class="' . $ml_logo . ' col text-center" href="' . $bu_user . 'kategori/' . $id_tipe_produk . '">
                    <img class="img-fluid" src="' . $bu . 'assets/images/Bidding - Hitam2.png" width="120">
                </a>
            ';
			} else {
				if ($logo) {
					$out .= '
                <nav class="navbar biz-bg-w-2 shadow-none d-block text-center row">
                    <a class="navbar-brand mr-0 col" href="' . $bu_user . 'kategori/' . $id_tipe_produk . '">
                        <img class="img-fluid" src="' . $bu . 'assets/images/Bidding - Hitam2.png" width="120">
                    </a>
                ';
				}
			}
			if ($icons == 1) {
				$out .= '
                <div class="">
                    <a href="' . $bu_user . 'help/'  . '" class="biz-bg-w-11 rounded px-2 py-1 mr-2 text-white">
                        <span class="fas fa-question" style="padding-left: 0.1rem!important;"></span>
                    </a>
                    <a href="' . $bu_user . 'profile/' . $id_tipe_produk . '" class="biz-bg-w-11 rounded px-2 py-1 mr-2 text-white">
                    ';
				$out .= $notifications > 0 ?
					'<span class="badge badge-pill biz-bg-w-6 biz-text-w-2 biz-badge-notif">' . $notifications . '</span>'
					: '';
				$out .= '
                        <span class="fas fa-user"></span>
                    </a>
                </div>
                ';
			} else {
				$out .= '
                <div class="">
                </div>
                ';
			}
			$out .= '
        </nav>
        <!--/.Navbar -->
        ';
		} else {
			if ($logo) {
				$out .= '
            <div class="text-center biz-bg-w-2 p-3">
                <a class="" href="' . $bu . 'home">
                    <img class="img-fluid" src="' . $bu . 'assets/images/Bidding - Hitam2.png" width="120">
                </a>
            </div>
            ';
			}
		}

		return $out;
	}
	public function namaAplikasi()
	{
		return 'Bidding System';
	}

	public function myFooterMobile($in = array())
	{
		$noFooter = array_key_exists('noFooter', $in) ? $in['noFooter'] : 0;
		$footerColor = array_key_exists('footerColor', $in) ? $in['footerColor'] : 3;
		$fixedBottom = array_key_exists('fixedBottom', $in) ? $in['fixedBottom'] : 0;
		$fixedBottom = $fixedBottom == 1 ? 'fixed-bottom' : '';
		$out = '';
		if ($noFooter == 0) $out = '
        <div class="' . $fixedBottom . ' text-center py-2 biz-bg-w-' . $footerColor . '">
            <span class="biz-text-w-4">&copy; ' . date('Y') . ' ' . $this->namaAplikasi() . '</span>
        </div>
        ';
		$out .= '
    </body>
</html>
        ';

		return $out;
	}
	public function isMobile()
	{
		// return "mobile/"; // untuk mode dev semua di mobile
		// return ""; // untuk mode dev semua di desktop
		if (preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up.browser|up.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
		return "mobile/";
		else
			return "";
	}
	public function myHeader($in)
	{
		$bu = base_url();
		$bu_user = $bu . 'user/';
		$bodyColor = array_key_exists('bodyColor', $in) ? $in['bodyColor'] : 3;
		$title = array_key_exists('title', $in) ? $in['title'] : 'Bidding System';
		$isLoggedIn = array_key_exists('loggedIn', $in) ? $in['loggedIn'] : 0;
		$logo = array_key_exists('logo', $in) ? $in['logo'] : 1;
		$backIcon = array_key_exists('backIcon', $in) ? $in['backIcon'] : 0;
		$backLink = array_key_exists('backLink', $in) ? $in['backLink'] : $bu_user . 'index';
		$icons = array_key_exists('icons', $in) ? $in['icons'] : 0;
		$notifications = array_key_exists('notifications', $in) ? $in['notifications'] : 0;
		$id_tipe_produk = array_key_exists('id_tipe_produk', $in) ? $in['id_tipe_produk'] : 1; // default HP
		$includeJS = array_key_exists('includeJS', $in) ? $in['includeJS'] : array();
		$includeCSS = array_key_exists('includeCSS', $in) ? $in['includeCSS'] : array();
		$hiddenInput = array_key_exists('hiddenInput', $in) ? $in['hiddenInput'] : array();
		$out = '
            <!DOCTYPE html>
            <html lang="en">
                    
        ';
		if (count($includeCSS) > 0) {
			for ($i = 0; $i < count($includeCSS); $i++) {
				$out .= '
                    <link href="' . $includeCSS[$i] . '" rel="stylesheet">
                ';
			}
		}
		$out .= '
            </head>
            <body class="biz-bg-w-' . $bodyColor . '">
                <!-- SCRIPTS -->
                <!-- JQuery -->
                <script src="' . $bu . 'assets/js/jquery.min.js" type="text/javascript"></script>
                <script src="' . $bu . 'assets/js/jquery.ui.min.js" type="text/javascript"></script>
                <!-- Bootstrap tooltips -->
                <script src="' . $bu . 'assets/js/popper.min.js" type="text/javascript"></script>
                <!-- Bootstrap core JavaScript -->
                <script src="' . $bu . 'assets/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="' . $bu . 'assets/js/bootstrap-select.min.js" type="text/javascript"></script>
                <!-- MDB core JavaScript -->
                <script src="' . $bu . 'assets/js/mdb.min.js" type="text/javascript"></script>
                <!-- FontAwesome JavaScript -->
                <script src="' . $bu . 'assets/js/fontawesome.js" type="text/javascript"></script>
                <script src="' . $bu . 'assets/js/fontawesome.solid.js" type="text/javascript"></script>
                <script src="' . $bu . 'assets/js/custom.js" type="text/javascript"></script>
        ';
		if (count($includeJS) > 0) {
			for ($i = 0; $i < count($includeJS); $i++) {
				$out .= '
                <script src="' . $includeJS[$i] . '" type="text/javascript"></script>
            ';
			}
		}
		$out .= '
            <input type="hidden" value="' . $id_tipe_produk . '" id="id_tipe_produk" />
        ';
		if (count($hiddenInput) > 0) {
			foreach ($hiddenInput as $key => $val) {
				$out .= '
                    <input type="hidden" value="' . $val . '" id="' . $key . '" />
                ';
			}
		}

		if ($isLoggedIn == 1) {
			$out .= '
                <!--Navbar -->
            ';
			if ($backIcon == 1) {
				$ml_logo = '';
				if ($icons == 1) $ml_logo = '';
				$out .= '
                    <nav class="navbar biz-bg-w-2 shadow-none mr-0" style="width: auto!important;">
                        <a onClick="window.location.replace(this.href);" href="' . $backLink . '" class="biz-text-w-11 pl-2"><span class="fas fa-chevron-left fa-2x"></span></a>
                        <a class="' . $ml_logo . ' text-center gambar-logo-grade" href="' . $bu_user . 'kategori/' . $id_tipe_produk . '">
                            <img class="img-fluid" src="' . $bu . 'assets/images/Bidding - Hitam2.png" width="160">
                        </a>
                ';
			} else {
				if ($logo) {
					$out .= '
                        <nav class="navbar biz-bg-w-2 shadow-none d-block">
                            <a class="navbar-brand mr-0" href="' . $bu_user . 'kategori/' . $id_tipe_produk . '">
                                <img class="img-fluid" src="' . $bu . 'assets/images/Bidding - Hitam2.png" width="160">
                            </a>
                    ';
				}
			}
			if ($icons == 1) {
				$out .= '
                    <div class="float-right mt-2">
                        <a href="' . $bu_user . 'help/'  . '" class="biz-bg-w-11 rounded px-2 py-1 mr-2 text-white">
                            <span class="fas fa-question" style="padding-left: 0.1rem!important;"></span>
                        </a>
                        <a href="' . $bu_user . 'profile/' . $id_tipe_produk . '" class="biz-bg-w-11 rounded px-2 py-1 mr-2 text-white">
                    ';
				$out .= $notifications > 0 ?
					'<span class="badge badge-pill biz-bg-w-6 biz-text-w-2 biz-badge-notif">' . $notifications . '</span>'
					: '';
				$out .= '
                                <span class="fas fa-user"></span>
                            </a>
                        </div>
                    ';
			} else {
				$out .= '
                    <div class="">
                    </div>
                ';
			}
			$out .= '
                </nav>
                <!--/.Navbar -->
            ';
		} else {
			if ($logo) {
				$out .= '
                    <div class="biz-bg-w-2 p-3">
                        <div class="">
                            <a class="" href="' . $bu . 'home">
                                <img class="img-fluid" src="' . $bu . 'assets/images/Bidding - Hitam2.png" width="160">
                            </a>
                        </div>
                    </div>
                    <hr style="margin-top: 0px!important;">
                    <br>
                ';
			}
		}

		return $out;
	}


}
