<?php
	if(!defined('LIBRARIES')) die("Error");
	
	/* Root */
	define('ROOT',__DIR__);

	/* Timezone */
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	/* Cấu hình coder */
	define('NN_MSHD','xxxx');
	define('NN_AUTHOR','');

	/* Cấu hình chung */
	$config = array(
		'customEmail' => '', //email nhận mật khẩu
		'copright' => array(// thông tin công ty tts
			'name' => 'CÔNG TY TNHH CƠ ĐIỆN LẠNH ĐỨC NHÂN',
			'email' => 'info@codienlanhducnhan.com',
			'dienthoai' => '0901.234.567',
			'diachi' => 'Gò Vấp, Thành phố Hồ Chí Minh',
			'website' => 'codienlanhducnhan.com',
			'worktime' => '8h - 17h từ thứ 2 đến thứ bảy'
		),
		'author' => array(
			'name' => 'CÔNG TY TNHH CƠ ĐIỆN LẠNH ĐỨC NHÂN',
			'email' => 'info@codienlanhducnhan.com',
			'timefinish' => 'Unknown'
		),
		'arrayDomainSSL' => array(),
		'database' => array(
			'server-name' => $_SERVER["HTTP_HOST"] ?? ($_SERVER["SERVER_NAME"] ?? 'localhost'),
			'url' => '/',
			'type' => 'mysql',
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '',
			'dbname' => 'codienlanh_ducnhan',
			'port' => 3306,
			'prefix' => 'table_',
			'charset' => 'utf8'
		),
		'website' => array(
			'sendmail' => false,
			'error-reporting' => true,
			'secret' => '$tts@',
			'salt' => 'swKJaajeS!t',
			'debug-developer' => false,
			'debug-css' => false,
			'debug-js' => false,
			'index' => false,
			'upload' => array(
				'max-width' => 1600,
				'max-height' => 1600
			),
			'lang' => array(
				'vi'=>'Tiếng Việt'
				//'en'=>'Tiếng Anh'
			),
			'lang-doc' => 'vi|en',
			'slug' => array(
				'vi'=>'Tiếng Việt'
				//'en'=>'Tiếng Anh'
			),
			'seo' => array(
				'vi'=>'Tiếng Việt'
				//'en'=>'Tiếng Anh'
			),
			'comlang' => array(
				"gioi-thieu" => array("vi"=>"gioi-thieu"),
				"tin-tuc" => array("vi"=>"tin-tuc"),
				"san-pham" => array("vi"=>"san-pham"),
				"cong-trinh" => array("vi"=>"cong-trinh"),
				"dich-vu" => array("vi"=>"dich-vu"),
				"lien-he" => array("vi"=>"lien-he")
			)
		),
		'order' => array(
			'ship' => true,
		),
		'login' => array(
			'admin' => 'LoginAdmin'.NN_MSHD,
			'member' => 'LoginMember'.NN_MSHD,
			'attempt' => 5,
			'delay' => 15
		),
		'googleAPI' => array(
			'recaptcha' => array(
				'active' => true,
				'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
				'sitekey' => '66LcAQWMsAAAAAAveDNKR2vk-y7ldBGn2o5mC9lLA',
				'secretkey' => '6LcAQWMsAAAAAJZ21OeybmbGkrnQnOC3M3pHRdp4',
				'linkgetkey' => 'https://www.google.com/recaptcha/admin/create',
				//'sitekey' => '6Ld05qcZAAAAAJedNSmLEe1NOZdDtlYhwmltTIDC',
				//'secretkey' => '6Ld05qcZAAAAAABH8BWbSiLnPoXTRXFReFDM7b8t'
			)
		),
		'oneSignal' => array(
			'active' => false,
			'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
			'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
		),
		'license' => array(
			'version' => "7.0.0",
			'powered' => "tts@congnghetts.vn"
		)
	);

	/* Error reporting */
	error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

	/* Cấu hình base */
	$http = 'http://';
	$config_url = $config['database']['server-name'].$config['database']['url'];
	$config_base = $http.$config_url;

	/* Cấu hình login */
	$login_admin = $config['login']['admin'];
	$login_member = $config['login']['member']; 

	/* Cấu hình upload */
	require_once LIBRARIES."constant.php";
?>