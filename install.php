<?php
/*******************************************************************\
 * Exchangerix v2.0
 * http://www.exchangerix.com
 *
 * Copyright (c) 2018 Exchangerix Software. All rights reserved.
 * ---------- Exchangerix IS NOT FREE SOFTWARE ----------
\*******************************************************************/

	define('is_Setup', TRUE);

	require_once("./inc/config.inc.php");

	$complete = 0;

	$check_install = @mysqli_num_rows(@mysqli_query($conn, "SELECT setting_value from exchangerix_settings WHERE setting_key='iword' LIMIT 1"));
	if ($check_install != 0)
	{
		die("<p>&nbsp;</p><p>&nbsp;</p><p><center><span style='font-family:tahoma,verdana,arial,helvetica,sans-serif; font-size:20px; color:#777;'><span style='color: #84C315'>Exchangerix Installation complete!<br/><br/> <span style='color: #E05600'>Please DELETE 'install.php' file from the server!</span><br/><br/><a style='color:#0578B7;' href='http://".$_SERVER['HTTP_HOST']."/'>Yes, I deleted it</a> &raquo;</span></center></p>");
	}


if (isset($_POST['action']) && $_POST['action'] == "install")
{
	$license_key = trim($_POST['license']);

	unset($errs);
	$errs = array();

	if (!$license_key)
	{
		$errs[] = "Please enter your license key";
	}
	else
	{
		if (!preg_match("/^[0-9]{4}[-]{1}[0-9]{4}[-]{1}[0-9]{4}[-]{1}[0-9]{4}[-]{1}[0-9]{4}?$/", $license_key))
		{
			$errs[] = "Wrong license key! Please try again!";
			$wrong_key = 1;
		}
		else
		{
			if (isset($wrong_key) && $wrong_key == 1)
			{$licence_status = "correct";$st = 1;}else{$licence_status = "wrong";$key=explode("-",$license_key);$keey=$key[rand(0,2)];
			if($ikey[4][2]=7138%45){$step=1;$t=1;$licence_status="wrong";}else{$licence_status="correct";$step=2;}
			if($keey>0){$i=30+$step;if(rand(7,190)>=rand(0,1))$st=+$i;$u=0;}$status2=str_split($key[1],1);$status4=str_split($key[3],1);$status1=str_split($key[0],1);$status3=str_split($key[2],1);
			if($step==1){$kky=str_split($key[$u+4],1);if((($key[$u]+$key[2])-($key[3]+$key[$t])==(((315*2+$u)+$t)*++$t))&&(($kky[3])==$status4[2])&&(($status3[1])==$kky[0])&&(($status2[3])==$kky[1])&&(($kky[2]==$status2[1]))){$rnd_num = rand(100,999);}else{$rnd_num = rand(11,49);}}} if(isset($licenses) && $licenses!=7){$wrong=1;$licence_status="wrong";}else{$wrong=0;$correct=1;}
		}
	}

	if (count($errs) == 0)
	{
		// checking license //
		$words_arr = array(1 => 'GrEeNraBBts', 2 => 'whiTESquiErel', 3 => 'CWyoTeRed', 4 => 'CRocoRileee', 5 => 'OnWFroggy', 6 => 'gVeNPenguiN');
		$wrnd = rand(1,5);
		$rnd_word = $words_arr[$wrnd];
		$rnd_pwd = generatePassword(12);
		$my_word = $rnd_word.$rnd_num;
		$my_pwd = md5(sha1($rnd_pwd.$rnd_word));
		$domain	= mysqli_real_escape_string($conn, "http://".$_SERVER['HTTP_HOST']."/");
		if ($domain == "") $domain = "http://www.yoursite.com/";


/// admin notification about low reserve
// user disocunt field


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_reserve_requests`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_reserve_requests` (
  `reserve_request_id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `exdirection_id` int(11) unsigned NOT NULL default '0',
  `currency_name` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `currency_id` int(11) unsigned NOT NULL default '0',
  `amount` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `currency_code` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `phone` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `comment` text collate utf8_unicode_ci NOT NULL,
  `is_viewed` tinyint(1) NOT NULL default '0',
  `is_notified` tinyint(1) NOT NULL default '0',
  `ip` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `status` enum('confirmed','declined','pending') collate utf8_unicode_ci NOT NULL default 'pending',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`reserve_request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_gateways`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_gateways` (
  `gateway_id` int(11) unsigned NOT NULL auto_increment,
  `gateway_name` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `logo` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `account_id` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `api_key` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `secret_key` varchar(255) collate utf8_unicode_ci NOT NULL default '', 
  `other_val` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `other_val2` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `other_val3` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `other_val4` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `other_val5` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `gateway_description` text collate utf8_unicode_ci NOT NULL,
  `website` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`gateway_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

smart_mysql_query("INSERT INTO `exchangerix_gateways` (`gateway_id`, `gateway_name`, `logo`, `account_id`, `api_key`, `secret_key`, `other_val`, `other_val2`, `other_val3`, `other_val4`, `other_val5`, `gateway_description`, `website`, `status`, `added`) VALUES
(1, 'PayPal', 'PAYPAL.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(2, 'Perfect Money', 'PM.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(3, 'Perfect Money Voucher', 'PM.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(4, 'Skrill', 'SKRILL.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(5, 'Payeer', 'PR.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(6, 'Bitcoin', 'BTC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(7, 'Bitcoin Cash', 'BCH.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(8, 'Litecoin', 'LTC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(9, 'Dogecoin', 'DOGE.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(10, 'Dash', 'DASH.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(11, 'Peercoin', 'PPC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(12, 'Ethereum', 'ETH.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(13, 'TheBillioncoin', 'TBC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(14, 'Monero', 'XMR.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(15, 'Ripple', 'XRP.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(16, 'Zcash', 'ZCASH.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(17, 'Ether Classic', 'ETC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(18, 'Augur', 'REP.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(19, 'Golem', 'GNT.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(20, 'Gnosis', 'GNO.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(21, 'Lisk', 'LSK.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(22, 'Clams', 'CLAM.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(23, 'Namecoin', 'NMC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(24, 'AdvCash', 'ADVC.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(25, 'OKPay', 'OK.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(26, 'Entromoney', 'EM.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(27, 'SolidTrust Pay', 'STP.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(28, 'Neteller', 'NTLR.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(29, 'UQUID', 'UQUID.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(30, 'WEX (BTC-e)', 'WEX.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(31, 'Yandex Money', 'YAM.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(32, 'QIWI', 'QIWI.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(33, 'Payza', 'PZ.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(34, 'Bank Transfer', 'BANK.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(35, 'Western Union', 'WU.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(36, 'Moneygram', 'MoneyGram.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00'),
(37, 'WebMoney', 'WM.png', '', '', '', '', '', '', '', '', '', '', 'active', '0000-00-00 00:00:00')");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_currencies`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_currencies` (
  `currency_id` int(11) unsigned NOT NULL auto_increment,
  `gateway_id` int(11) unsigned NOT NULL default '0',
  `currency_name` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `currency_code` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `image` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `is_crypto` tinyint(1) NOT NULL default '0',
  `reserve` varchar(20) NOT NULL DEFAULT '0',
  `min_reserve` varchar(20) NOT NULL DEFAULT '0',
  `fee` varchar(20) NOT NULL DEFAULT '0',
  `instructions` text collate utf8_unicode_ci NOT NULL,
  `website` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `site_code` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `xml_code` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `allow_send` tinyint(1) NOT NULL default '0',
  `allow_receive` tinyint(1) NOT NULL default '0',
  `allow_affiliate` tinyint(1) NOT NULL default '0',
  `default_send` tinyint(1) NOT NULL default '0',
  `default_receive` tinyint(1) NOT NULL default '0',
  `sort_order` tinyint(1) NOT NULL default '0',
  `is_new_currency` tinyint(1) NOT NULL default '0',
  `hide_code` tinyint(1) NOT NULL default '0',
  `curr_code` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`currency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

smart_mysql_query("INSERT INTO `exchangerix_currencies` (`currency_id`, `gateway_id`, `currency_name`, `currency_code`, `image`, `is_crypto`, `reserve`, `min_reserve`, `fee`, `instructions`, `website`, `site_code`, `xml_code`, `allow_send`, `allow_receive`, `allow_affiliate`, `default_send`, `default_receive`, `sort_order`, `is_new_currency`, `hide_code`, `curr_code`, `status`, `added`) VALUES
(1, 6, 'Bitcoin', 'BTC', 'BTC.png', 1, '12.68', '', '', '', 'https://bitcoin.org', '', '', 1, 1, 0, 0, 0, 2, 0, 1, 'bitcoin', 'active', NOW()),
(2, 12, 'Ethereum', 'ETH', 'ETH.png', 1, '120', '', '', '', 'https://ethereum.org', '', '', 1, 1, 0, 0, 0, 4, 0, 0, '', 'active', NOW()),
(3, 7, 'Bitcoin Cash', 'BCH', 'BCH.png', 1, '20', '', '3', '', '', '', '', 1, 1, 0, 0, 0, 3, 0, 0, '', 'active', NOW()),
(4, 15, 'Ripple', 'XRP', 'XRP.png', 1, '89700', '', '5', '', '', '', '', 1, 1, 0, 0, 0, 8, 0, 0, '', 'active', NOW()),
(5, 8, 'Litecoin', 'LTC', 'LTC.png', 1, '3000', '', '5', '', 'https://litecoin.org', 'LTC', 'LTC', 1, 1, 1, 0, 0, 6, 0, 0, '', 'active', NOW()),
(6, 10, 'Dash', 'DASH', 'DASH.png', 1, '174', '', '', '', '', '', '', 1, 1, 0, 0, 0, 5, 0, 0, '', 'active', NOW()),
(7, 0, 'NEO', 'NEO', 'NEO.png', 1, '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 7, 0, 0, '', 'active', NOW()),
(8, 0, 'NEM', 'NEM', 'NEM.png', 1, '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 16, 0, 0, '', 'active', NOW()),
(9, 14, 'Monero', 'XMR', 'XMR.png', 1, '50', '', '', '', '', '', '', 1, 1, 0, 0, 0, 9, 0, 0, '', 'active', NOW()),
(10, 16, 'Zcash', 'ZEC', 'ZCASH.png', 1, '73', '', '', '', '', '', '', 1, 1, 0, 0, 0, 11, 0, 0, '', 'active', NOW()),
(11, 1, 'Paypal', 'USD', 'PAYPAL.png', 0, '78000', '', '', '', '', '', '', 1, 1, 0, 0, 0, 10, 0, 0, '', 'active', NOW()),
(12, 2, 'Perfect Money', 'USD', 'PM.png', 0, '73500', '', '', '', '', '', '', 1, 1, 0, 0, 0, 17, 0, 0, '', 'active', NOW()),
(13, 5, 'Payeer', 'USD', 'PR.png', 0, '41300', '', '', '', '', '', '', 1, 1, 0, 0, 0, 12, 0, 0, '', 'active', NOW()),
(14, 24, 'AdvCash', 'USD', 'ADVC.png', 0, '23900', '', '', '', '', '', '', 1, 1, 0, 0, 0, 13, 0, 0, '', 'active', NOW()),
(15, 34, 'Bank Transfer', 'USD', 'BANK.png', 0, '50000', '', '', '', '', '', '', 1, 1, 0, 0, 0, 14, 0, 0, '', 'active', NOW()),
(16, 37, 'Webmoney', 'USD', 'WM.png', 0, '50000', '', '', '', '', '', '', 1, 1, 0, 0, 0, 14, 0, 0, '', 'active', NOW()),
(17, 0, 'Cash', 'USD', 'CASH.png', 0, '', '', '', '', '', '', '', 1, 1, 0, 0, 0, 1, 0, 0, '', 'active', NOW())");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_exdirections`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_exdirections` (
  `exdirection_id` int(11) unsigned NOT NULL auto_increment,
  `from_currency` int(11) unsigned NOT NULL default '0',
  `to_currency` int(11) unsigned NOT NULL default '0',
  `from_rate` varchar(50) NOT NULL DEFAULT '0',
  `to_rate` varchar(50) NOT NULL DEFAULT '0',
  `exchange_rate` varchar(50) NOT NULL DEFAULT '0',
  `fee` varchar(20) NOT NULL DEFAULT '0',
  `min_amount` varchar(50) NOT NULL DEFAULT '0',
  `max_amount` varchar(50) NOT NULL DEFAULT '0',
  `user_instructions` text collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `is_manual` tinyint(1) NOT NULL default '0',
  `hide_from_visitors` tinyint(1) NOT NULL default '0',
  `allow_affiliate` tinyint(1) NOT NULL default '0',
  `auto_rate` tinyint(1) NOT NULL default '0',
  `today_exchanges` int(11) unsigned NOT NULL default '0',
  `total_exchanges` int(11) unsigned NOT NULL default '0',
  `sort_order` tinyint(1) NOT NULL default '0',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  `updated` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_exchange_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`exdirection_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_reviews`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_reviews` (
  `review_id` int(11) unsigned NOT NULL auto_increment,
  `exchange_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `author` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `review_title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `rating` tinyint(1) NOT NULL default '0',
  `review` text collate utf8_unicode_ci,
  `status` enum('active','pending','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  `updated` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_content`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_content` (
  `content_id` int(11) unsigned NOT NULL auto_increment,
  `language` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `name` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `link_title` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `description` text collate utf8_unicode_ci,
  `page_location` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `page_url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `meta_description` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `meta_keywords` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

smart_mysql_query("INSERT INTO `exchangerix_content` (`content_id`, `language`, `name`, `title`, `description`, `modified`) VALUES
(1, 'english', 'home', 'Home page', '<h1 style=\'border:none;text-align:center;\'>Welcome to our exchange site!</h1>\r\n<p style=\'text-align: justify;\'>We have the best rates. Simply start your exchange right now. Sign up for our parther program and earn commission from each exchange. The earnings are credited in your account instantly and can be withdrawn right away.</p>\r\n<br/>', NOW()),
(2, 'english', 'aboutus', 'About Us', '<p>Information about site.</p>', '0000-00-00 00:00:00'),
(3, 'english', 'howitworks', 'How it works', '<p>how it works information</p>', NOW()),
(4, 'english', 'help', 'Help', 'some help information here (you can edit from content admin area)', NOW()),
(5, 'english', 'terms', 'Terms and Conditions', '<p>site\'s terms and conditions, edit from admin panel</p>', NOW()),
(6, 'english', 'privacy', 'Privacy Policy', '<p>privacy policy information, edit from admin panel</p>', NOW()),
(7, 'english', 'contact', 'Contact Us', '<p>If you have any questions, please contact us.</p>\r\n<p>Email: support@yourdomain.com</p>', NOW()),
(8, 'english', 'affiliate', 'Affiliate Program', '<p>Do you have an account? Then you\'re already an affiliate! Just sign in to your account and start earning money by referring visitors to our site. It\'s fast, FREE and as easy as telling us how you want to be paid! You will receive commission of the fees charged for all exchange orders made by your referrals. The earnings are credited in your account instantly and can be withdrawn right away.</p>', NOW()),
(9, 'english', 'payment_success', 'Successful Payment', '<h3>Thank you for payment!</h3>', NOW()),
(10, 'english', 'payment_declined', 'Payment Declined', '<h3>Your payment was declined.</h3> <p>Please try to make it again our you can contact us to resolve this problem.</p>', NOW())");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_exchanges`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_exchanges` (
  `exchange_id` int(11) unsigned NOT NULL auto_increment,
  `exdirection_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `reference_id` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `from_currency_id` int(11) NOT NULL default '0',
  `to_currency_id` int(11) NOT NULL default '0',  
  `from_currency` varchar(100) NOT NULL default '0',
  `to_currency` varchar(100) NOT NULL default '0',
  `ex_from_rate` varchar(50) NOT NULL DEFAULT '0',
  `ex_to_rate` varchar(50) NOT NULL DEFAULT '0',
  `exchange_rate` varchar(50) NOT NULL DEFAULT '0',
  `exchange_amount` decimal(15,4) NOT NULL default '0.0000',
  `receive_amount` decimal(15,4) NOT NULL default '0.0000',
  `exchange_fee` decimal(15,4) NOT NULL default '0.0000',
  `from_account` text collate utf8_unicode_ci,
  `to_account` text collate utf8_unicode_ci,
  `client_email` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `client_details` text collate utf8_unicode_ci,
  `proof` varchar(200) NOT NULL default '',
  `ref_id` int(11) NOT NULL default '0',
  `country_code` varchar(2) collate utf8_unicode_ci NOT NULL default '',
  `status` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `reason` text collate utf8_unicode_ci,
  `notification_sent` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `updated` datetime NOT NULL default '0000-00-00 00:00:00',
  `process_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`exchange_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_transactions`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_transactions` (
  `transaction_id` int(11) unsigned NOT NULL auto_increment,
  `reference_id` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `user_id` int(11) NOT NULL default '0',
  `ref_id` int(11) NOT NULL default '0',
  `payment_type` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `payment_method` int(10) NOT NULL default '0',
  `payment_details` text collate utf8_unicode_ci,
  `transaction_amount` decimal(15,4) NOT NULL default '0.0000',
  `transaction_commision` decimal(15,4) NOT NULL default '0.0000',
  `amount` decimal(15,4) NOT NULL default '0.0000',
  `status` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `reason` text collate utf8_unicode_ci,
  `notification_sent` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `updated` datetime NOT NULL default '0000-00-00 00:00:00',
  `process_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");



smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_countries`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_countries` (
  `country_id` int(11) NOT NULL auto_increment,
  `code` varchar(2) collate utf8_unicode_ci NOT NULL default '',
  `name` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `currency` varchar(3) collate utf8_unicode_ci NOT NULL default '',
  `signup` tinyint(1) NOT NULL default '1',
  `sort_order` tinyint(1) NOT NULL default '0',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  PRIMARY KEY  (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");



smart_mysql_query("INSERT INTO `exchangerix_countries` (`code`, `name`) VALUES
('AF', 'Afghanistan'),
('AX', 'Aland Islands'),
('AL', 'Albania'),
('DZ', 'Algeria'),
('AS', 'American Samoa'),
('AD', 'Andorra'),
('AO', 'Angola'),
('AI', 'Anguilla'),
('AG', 'Antigua and Barbuda'),
('AR', 'Argentina'),
('AM', 'Armenia'),
('AW', 'Aruba'),
('AU', 'Australia'),
('AT', 'Austria'),
('AZ', 'Azerbaijan'),
('BS', 'Bahamas'),
('BH', 'Bahrain'),
('BD', 'Bangladesh'),
('BB', 'Barbados'),
('BY', 'Belarus'),
('BE', 'Belgium'),
('BZ', 'Belize'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BT', 'Bhutan'),
('BO', 'Bolivia'),
('BA', 'Bosnia and Herzegovina'),
('BW', 'Botswana'),
('BV', 'Bouvet Island'),
('BR', 'Brazil'),
('IO', 'British Indian Ocean Territory'),
('BN', 'Brunei Darussalam'),
('BG', 'Bulgaria'),
('BF', 'Burkina Faso'),
('BI', 'Burundi'),
('KH', 'Cambodia'),
('CM', 'Cameroon'),
('CA', 'Canada'),
('CV', 'Cape Verde'),
('KY', 'Cayman Islands'),
('CF', 'Central African Republic'),
('TD', 'Chad'),
('CL', 'Chile'),
('CN', 'China'),
('CX', 'Christmas Island'),
('CC', 'Cocos (Keeling) Islands'),
('CO', 'Colombia'),
('KM', 'Comoros'),
('CG', 'Congo'),
('CD', 'Congo, The Democratic Republic of the'),
('CK', 'Cook Islands'),
('CR', 'Costa Rica'),
('CI', 'Cote D''Ivoire'),
('HR', 'Croatia'),
('CU', 'Cuba'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DK', 'Denmark'),
('DJ', 'Djibouti'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('EC', 'Ecuador'),
('EG', 'Egypt'),
('SV', 'El Salvador'),
('GQ', 'Equatorial Guinea'),
('ER', 'Eritrea'),
('EE', 'Estonia'),
('ET', 'Ethiopia'),
('FK', 'Falkland Islands (Malvinas)'),
('FO', 'Faroe Islands'),
('FJ', 'Fiji'),
('FI', 'Finland'),
('FR', 'France'),
('GF', 'French Guiana'),
('PF', 'French Polynesia'),
('TF', 'French Southern Territories'),
('GA', 'Gabon'),
('GM', 'Gambia'),
('GE', 'Georgia'),
('DE', 'Germany'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GR', 'Greece'),
('GL', 'Greenland'),
('GD', 'Grenada'),
('GP', 'Guadeloupe'),
('GU', 'Guam'),
('GT', 'Guatemala'),
('GN', 'Guinea'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HT', 'Haiti'),
('HM', 'Heard Island and McDonald Islands'),
('VA', 'Holy See (Vatican City State)'),
('HN', 'Honduras'),
('HK', 'Hong Kong'),
('HU', 'Hungary'),
('IS', 'Iceland'),
('IN', 'India'),
('ID', 'Indonesia'),
('IR', 'Iran, Islamic Republic of'),
('IQ', 'Iraq'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IT', 'Italy'),
('JM', 'Jamaica'),
('JP', 'Japan'),
('JO', 'Jordan'),
('KZ', 'Kazakhstan'),
('KE', 'Kenya'),
('KI', 'Kiribati'),
('KP', 'Korea, Democratic People\'s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KG', 'Kyrgyzstan'),
('LA', 'Lao People''s Democratic Republic'),
('LV', 'Latvia'),
('LB', 'Lebanon'),
('LS', 'Lesotho'),
('LR', 'Liberia'),
('LY', 'Libyan Arab Jamahiriya'),
('LI', 'Liechtenstein'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('MO', 'Macao'),
('MK', 'Macedonia'),
('MG', 'Madagascar'),
('MW', 'Malawi'),
('MY', 'Malaysia'),
('MV', 'Maldives'),
('ML', 'Mali'),
('MT', 'Malta'),
('MH', 'Marshall Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MU', 'Mauritius'),
('YT', 'Mayotte'),
('MX', 'Mexico'),
('FM', 'Micronesia, Federated States of'),
('MD', 'Moldova, Republic of'),
('MC', 'Monaco'),
('MN', 'Mongolia'),
('ME', 'Montenegro'),
('MS', 'Montserrat'),
('MA', 'Morocco'),
('MZ', 'Mozambique'),
('MM', 'Myanmar'),
('NA', 'Namibia'),
('NR', 'Nauru'),
('NP', 'Nepal'),
('NL', 'Netherlands'),
('AN', 'Netherlands Antilles'),
('NC', 'New Caledonia'),
('NZ', 'New Zealand'),
('NI', 'Nicaragua'),
('NE', 'Niger'),
('NG', 'Nigeria'),
('NU', 'Niue'),
('NF', 'Norfolk Island'),
('MP', 'Northern Mariana Islands'),
('NO', 'Norway'),
('OM', 'Oman'),
('PK', 'Pakistan'),
('PW', 'Palau'),
('PS', 'Palestinian Territory, Occupied'),
('PA', 'Panama'),
('PG', 'Papua New Guinea'),
('PY', 'Paraguay'),
('PE', 'Peru'),
('PH', 'Philippines'),
('PN', 'Pitcairn'),
('PL', 'Poland'),
('PT', 'Portugal'),
('PR', 'Puerto Rico'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SH', 'Saint Helena'),
('KN', 'Saint Kitts and Nevis'),
('LC', 'Saint Lucia'),
('PM', 'Saint Pierre and Miquelon'),
('VC', 'Saint Vincent and the Grenadines'),
('WS', 'Samoa'),
('SM', 'San Marino'),
('ST', 'Sao Tome and Principe'),
('SA', 'Saudi Arabia'),
('SN', 'Senegal'),
('RS', 'Serbia'),
('SC', 'Seychelles'),
('SL', 'Sierra Leone'),
('SG', 'Singapore'),
('SK', 'Slovakia'),
('SI', 'Slovenia'),
('SB', 'Solomon Islands'),
('SO', 'Somalia'),
('ZA', 'South Africa'),
('GS', 'South Georgia'),
('ES', 'Spain'),
('LK', 'Sri Lanka'),
('SD', 'Sudan'),
('SR', 'Suriname'),
('SJ', 'Svalbard and Jan Mayen'),
('SZ', 'Swaziland'),
('SE', 'Sweden'),
('CH', 'Switzerland'),
('SY', 'Syrian Arab Republic'),
('TW', 'Taiwan, Province Of China'),
('TJ', 'Tajikistan'),
('TZ', 'Tanzania, United Republic of'),
('TH', 'Thailand'),
('TL', 'Timor-Leste'),
('TG', 'Togo'),
('TK', 'Tokelau'),
('TO', 'Tonga'),
('TT', 'Trinidad and Tobago'),
('TN', 'Tunisia'),
('TR', 'Turkey'),
('TM', 'Turkmenistan'),
('TC', 'Turks and Caicos Islands'),
('TV', 'Tuvalu'),
('UG', 'Uganda'),
('UA', 'Ukraine'),
('AE', 'United Arab Emirates'),
('GB', 'United Kingdom'),
('US', 'United States'),
('UM', 'United States Minor Outlying Islands'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VU', 'Vanuatu'),
('VE', 'Venezuela'),
('VN', 'Viet Nam'),
('VG', 'Virgin Islands, British'),
('VI', 'Virgin Islands, U.S.'),
('WF', 'Wallis And Futuna'),
('EH', 'Western Sahara'),
('YE', 'Yemen'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe')");



smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_email_templates`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_email_templates` (
  `template_id` int(11) unsigned NOT NULL auto_increment,
  `language` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `email_name` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `email_subject` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `email_message` text collate utf8_unicode_ci,
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`template_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

smart_mysql_query("INSERT INTO `exchangerix_email_templates` (`template_id`, `language`, `email_name`, `email_subject`, `email_message`, `modified`) VALUES
(1, 'english', 'signup', 'Welcome to exchange site!', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nDear {first_name},<br /><br />\r\nThank you for registering!<br /><br />\r\You can start to make e-currency exchanges!<br /><br />\r\nHere is your login information:<br /><br />\r\nLogin: <b>{username}</b><br />\r\nPassword: <b>{password}</b><br /><br />\r\nPlease click at <a href=\'{login_url}\'>click here</a> to login in to your account.<br /><br />Thank you.\r\n</p>', NOW()),
(2, 'english', 'activate', 'Registration confirmation email', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHi {first_name},<br /><br />\r\nThank you for registering!<br /><br />\r\nHere is your login information:<br /><br />\r\nUsername: <b>{username}</b><br />\r\nPassword: <b>{password}</b><br /><br />\r\n\r\nPlease click the following link to activate your account: <a href=\'{activate_link}\'>{activate_link}</a><br /><br />Thank you.\r\n</p>', NOW()),
(3, 'english', 'activate2', 'Account activation email', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHi {first_name},<br /><br />\r\nPlease click the following link to activate your account: <a href=\'{activate_link}\'>{activate_link}</a><br /><br />Thank you.\r\n</p>', NOW()),
(4, 'english', 'forgot_password', 'Forgot password email', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nDear {first_name},<br /><br />\r\nAs you requested, here is new password for your account:<br /><br />\r\nLogin: <b>{username}</b><br />Password: <b>{password}</b> <br /><br />\r\nPlease <a href=\'{login_url}\'>click here</a> to log in.\r\n<br /><br />\r\nThank you.\r\n</p>', NOW()),
(5, 'english', 'invite_friend', 'Invitation from your friend', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {friend_name}, <br /><br />\r\nYour friend <b>{first_name}</b> wants to invite you to register on our site.<br /><br />\r\nPlease <a href=\'{referral_link}\'>click here</a> to accept his invitation.\r\n<br /><br />\r\nBest Regards.\r\n</p>', NOW()),
(6, 'english', 'cashout_paid', 'Your cash out request was paid', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {first_name}, <br /><br />\r\nYour cash out request was paid.<br />Transaction ID: {transaction_id}<br />Amount: <b>{amount}</b><br /><br />\r\nThank you for choosing us.<br /><br />\r\nBest Regards.\r\n</p>', NOW()),
(7, 'english', 'cashout_declined', 'Your cash out request was declined', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {first_name}, <br /><br />\r\nYour cash out request #<b>{transaction_id}</b> for {amount} was declined.<br />Reason: {reason}<br /><br />\r\n</p>', NOW()),
(8, 'english', 'manual_credit', 'Your account balance was updated', '<p style=\'font-family: Verdana, Arial, Helvetica, sans-serif; font-size:13px\'>\r\nHello {first_name}, <br /><br />\r\nYou received new payment.<br /><br /> Transaction ID: <b>{transaction_id}</b><br/>Payment name: <b>{payment_type}</b><br />Amount: <b>{amount}</b><br /><br />\r\n</p>', NOW())");



smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_languages`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_languages` (
  `language_id` int(11) NOT NULL auto_increment,
  `language_code` varchar(2) collate utf8_unicode_ci NOT NULL default '',
  `language` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `currency` varchar(3) collate utf8_unicode_ci NOT NULL default '',
  `sort_order` tinyint(1) NOT NULL default '0',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  PRIMARY KEY  (`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");



smart_mysql_query("INSERT INTO `exchangerix_languages` (`language_code`, `language`, `status`) VALUES
('us', 'english', 'active')");



smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_news`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_news` (
  `news_id` int(11) unsigned NOT NULL auto_increment,
  `news_title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `news_description` text collate utf8_unicode_ci,
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");


smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_pmethods`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_pmethods` (
  `pmethod_id` int(11) unsigned NOT NULL auto_increment,
  `pmethod_title` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `min_amount` decimal(15,4) NOT NULL default '0.0000',
  `commission` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `pmethod_details` text collate utf8_unicode_ci,
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  PRIMARY KEY  (`pmethod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

smart_mysql_query("INSERT INTO `exchangerix_pmethods` (`pmethod_id`, `pmethod_title`, `pmethod_details`, `status`) VALUES
		(1, 'PayPal', 'Please enter your paypal account', 'active'),
		(2, 'Bank Check', 'Please enter following information: <br />\r\n - Your Full Name <br />\r\n - Bank Name <br />\r\n - Bank Address <br />\r\n - Account #', 'inactive'),
		(3, 'Wire Transfer', 'Please enter following information: <br />\r\n - Your Full Name <br />\r\n - Bank Name <br />\r\n - Bank Address <br />\r\n - Account #', 'active'),
		(4, 'Skrill', 'Please enter your skrill account', 'inactive')");



smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_settings`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_settings` (
  `setting_id` int(11) NOT NULL auto_increment,
  `setting_key` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `setting_value` text collate utf8_unicode_ci,
  PRIMARY KEY  (`setting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1000");

smart_mysql_query("INSERT INTO `exchangerix_settings` (`setting_key`, `setting_value`) VALUES
('website_title', 'Exchange Site'),
('website_url', '{$domain}'),
('website_mode', 'live'),
('website_home_title', 'Best Online Exchange Service'),
('email_from_name', 'Exchange Site Support'),
('website_email', 'admin@domain.com'),
('noreply_email', 'noreply@domain.com'),
('alerts_email', 'alerts@domain.com'),
('website_language', 'english'),
('multilingual', '0'),
('website_timezone', 'America/New_York'),
('website_date_format', '%d %b %Y'),
('website_currency', '$'),
('website_currency_format', '1'),
('account_activation', '0'),
('signup_captcha', '1'),
('exchange_captcha', '0'),
('login_attempts_limit', '0'),
('signup_credit', '5'),
('refer_credit', '5'),
('referral_commission', '10'),
('min_payout', '100'),
('min_transaction', '50'),
('cancel_withdrawal', '1'),
('view_list_style', '1'),
('one_review', '1'),
('homepage_reviews_limit', '5'),
('homepage_exchanges_limit', '5'),
('featured_items_limit', '12'),
('results_per_page', '12'),
('reviews_per_page', '10'),
('news_per_page', '20'),
('image_width', '120'),
('image_height', '60'),
('show_statistics', '1'),
('show_site_statistics', '1'),
('show_landing_page', '1'),
('reviews_approve', '1'),
('max_review_length', '500'),
('email_new_exchange', '0'),
('email_new_amount_request', '0'),
('email_new_review', '0'),
('email_new_ticket', '0'),
('email_new_ticket_reply', '0'),
('email_new_report', '0'),
('sms_new_amount_request', '0'),
('smtp_mail', '0'),
('smtp_port', '25'),
('smtp_host', ''),
('smtp_username', ''),
('smtp_password', ''),
('smtp_ssl', ''),
('reg_sources', 'Search Engine,Facebook,Twitter,Other'),
('addthis_id', 'YOUR-ACCOUNT-ID'),
('facebook_page', ''),
('show_fb_likebox', '0'),
('twitter_page', ''),
('facebook_connect', '0'),
('facebook_appid', ''),
('facebook_secret', ''),
('google_analytics', ''),
('email_verification', '0'),
('phone_verification', '0'),
('document_verification', '1'),
('address_verification', '1'),
('payment_proof', '1'),
('require_login', '0'),
('reserve_minutes', '20'),
('update_rates_minutes', '10'),
('operator_status', 'online'),
('contact_phone', ''),
('contact_phone2', ''),
('contact_phone3', ''),
('show_operator_hours', '0'),
('operator_hours', ''),
('operator_timezone', ''),
('chat_code', ''),
('whatsapp', ''),
('skype', ''),
('telegram', ''),
('viber', ''),
('sms_api_key', ''),
('sms_api_secret', ''),
('allowed_files', 'jpg|png|jpeg'),
('files_max_size', '5242880'),
('total_exchanges_usd', '0.00'),
('license', '{$license_key}'),
('last_admin_login', ''),
('word', '{$my_pwd}'),
('iword', '{$my_word}')");



smart_mysql_query("DROP TABLE IF EXISTS `exchangerix_users`");
smart_mysql_query("CREATE TABLE IF NOT EXISTS `exchangerix_users` (
  `user_id` int(11) unsigned NOT NULL auto_increment,
  `user_group` tinyint(1) NOT NULL default '0',
  `username` varchar(70) collate utf8_unicode_ci NOT NULL default '',
  `password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `fname` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `lname` varchar(25) collate utf8_unicode_ci NOT NULL default '',
  `gender` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `address` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `address2` varchar(70) collate utf8_unicode_ci NOT NULL default '',
  `city` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `state` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `zip` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `country` int(11) NOT NULL default '0',
  `phone` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `payment_method` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `reg_source` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `ref_id` int(11) unsigned NOT NULL default '0',
  `discount` tinyint(1) NOT NULL default '0',
  `newsletter` tinyint(1) NOT NULL default '0',
  `ip` varchar(15) collate utf8_unicode_ci NOT NULL default '', 
  `verified_email` tinyint(1) NOT NULL default '0',
  `verified_phone` tinyint(1) NOT NULL default '0',
  `verified_document` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `verified_address` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `verification_progress` varchar(3) collate utf8_unicode_ci NOT NULL default '',
  `sms_code` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `status` enum('active','inactive') collate utf8_unicode_ci NOT NULL default 'active',
  `auth_provider` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `auth_uid` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `activation_key` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `unsubscribe_key` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `login_session` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `login_count` int(8) unsigned NOT NULL default '0',
  `last_ip` varchar(15) collate utf8_unicode_ci NOT NULL default '',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `block_reason` tinytext collate utf8_unicode_ci,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$complete = 1;

	}
	else
	{
		$allerrors = "";
		foreach ($errs as $errorname)
			$allerrors .= $errorname."<br/>\n";
	}

}

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<title>Exchangerix Installation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:400,700" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />	
<style type="text/css">
<!--

body {
	background: #F9F9F9;
	font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #444;
	margin: 0;
	padding: 0;
}

a {color: #3494CF; text-decoration: underline;}
a:hover {color: #94CA29; text-decoration: none;}

h1 {
	font-family: times, Times New Roman, times-roman, georgia, Arial, Verdana, sans-serif;
	font-size: 35px;
	font-weight: normal;
	color: #444;
	margin: 10px 0;
	padding: 0;
}

form {
	margin: 0 0 0 0;
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000;
}

input.textbox {
	background-color: #FFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	margin: 0;
	padding: 8px 3px;
	border: 1px solid #E5E5E5;
}

.submit {
	padding: 6px 8px;
	border: 1px solid #94DD0B;
	background: #94DD0B;
	color: #FFFFFF;
	font-size: 14px;
	font-family: Tahoma, Verdana, Arial, sans-serif;
	font-weight: bold;
	text-align: center;
	cursor: pointer;
	border-radius: 3px;
}

.submit:hover {
	color: #FFFFFF;
	background: #9BED04;
}

.large_text {
	font-family: Verdana, Tahoma, Arial, sans-serif;
	font-size:19px;
	color:#FFFFFF;
}

-->
</style>
</head>
<table width="550" align="center" cellpadding="5" cellspacing="0" border="0" align="center">
<tr>
<td height="300" valign="middle">
      
       <h1 class="text-center"><span style="color: #a3cf58">Exchangerix</span> Installation</h1>

		<?php if ($complete == 1) { ?>
			<table width="100%" align="center" cellpadding="5" cellspacing="0" border="0">
			<tr height="50">
				<td style="border: 1px #1A8308 dotted;" bgcolor="#96E002" align="center" valign="middle">
					<span class="large_text">Congratulations! Installation complete!</span>
				</td>
			</tr>
			<tr height="200">
				<td style="border: 1px solid #EEEEEE;" bgcolor="#FFFFFF" align="center" valign="middle">
					<table width="100%" align="center" cellpadding="5" cellspacing="0" border="0">
					<tr valign="middle">
						<td nowrap="nowrap" width="50%" align="right"><span style="font-size:13px; color:#2B2B2B;">Admin Username:</span></td><td nowrap="nowrap" width="50%" align="left"><span style="font-size:20px;">&nbsp;admin</span></td>
					</tr>
					<tr valign="middle">
						<td nowrap="nowrap" align="right"><span style="font-size:13px; color:#2B2B2B;">Admin Password:</span></td><td nowrap="nowrap" align="left"><span style="font-size:20px;">&nbsp;<?php echo $rnd_pwd; ?></span></td>
					</tr>
					</table>
					<br/>
					<p><b>Note your password from admin panel.</b></p>
					<p>You can now <a target="_blank" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/">login to your control panel</a> and change your password.</a></p>
				</td>
			</tr>
			<tr height="35">
				<td nowrap="nowrap" align="center" valign="middle">
					<span style="color: #FF0000; font-weight: bold;"><u>Important</u>: Please DELETE "install.php" file from your server now!</span>
				</td>
			</tr>
			</table>
			<br/>
		<?php }else{ ?>

			<?php if (isset($allerrors)) { ?>
				<div class="alert alert-danger"><?php echo $allerrors; ?></div>
			<?php } ?>

			<form action="" method="post">
			<div style="width: 100%; background: #FFF; border: 1px solid #F2F2F2; padding: 25px; border-radius: 7px">
				<p class="text-center"><b>Please enter your license key below.</b></p>
				<p class="text-center">You can find your license key by logging into your <a target="_blank" href="http://www.exchangerix.com/c/">Member Account</a>.</p>
				<div class="form-group">
					<label for="license"><b>Your License Key:</b></label>
					<input type="text" class="form-control" name="license" id="license" value="" size="40" maxlength="24" />
				</div>
				<input type="hidden" name="action" value="install" />
				<button type="submit" class="btn btn-success" name="install">Start Installation</button>
			</div>
		  </form>

	  <?php } ?>

</td>
</tr>
</table>
</body>
</html>