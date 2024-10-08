<?php
/*******************************************************************\
 * Exchangerix v2.0
 * http://www.exchangerix.com
 *
 * Copyright (c) 2018 Exchangerix Software. All rights reserved.
 * ---------- Exchangerix IS NOT FREE SOFTWARE ----------
\*******************************************************************/

	if (file_exists("./install.php"))
	{
		header ("Location: install.php");
		exit();
	}

	session_start();
	require_once("inc/config.inc.php");

	// save referral id //////////////////////////////////////////////
	if (isset($_GET['ref']) && is_numeric($_GET['ref']))
	{
		$ref_id = (int)$_GET['ref'];
		setReferral($ref_id);

		header("Location: index.php");
		exit();
	}

	// set language ///////////////////////////////////////////////////
	if (isset($_GET['lang']) && $_GET['lang'] != "")
	{
		$site_lang	= strtolower(getGetParameter('lang'));
		$site_lang	= preg_replace("/[^0-9a-zA-Z]/", " ", $site_lang);
		$site_lang	= substr(trim($site_lang), 0, 30);
		
		if ($site_lang != "")
		{
			setcookie("site_lang", $site_lang, time()+3600*24*365, '/');
		}

		header("Location: index.php");
		exit();
	}

	$content = GetContent('home');
	
	// some cron // RESERVE_MINUTES
	smart_mysql_query("UPDATE exchangerix_exchanges SET status='timeout' WHERE (created < (NOW() - INTERVAL 120 MINUTE) AND status='waiting')");


	///////////////  Page config  ///////////////
	$PAGE_TITLE			= SITE_HOME_TITLE;
	$PAGE_DESCRIPTION	= $content['meta_description'];
	$PAGE_KEYWORDS		= $content['meta_keywords'];

	$bg_dark = 1;
	require_once("inc/header.inc.php");

?>

				
<?php
	
	$cc = 0;
	$res_query = "SELECT * FROM exchangerix_currencies WHERE image!='' AND (reserve > 0 || reserve='') AND (allow_send='1' OR allow_receive='1') AND status='active' ORDER BY RAND()";
	$res_result = smart_mysql_query($res_query);
	
	if (mysqli_num_rows($res_result) > 0)
	{
?>
	
		<div class="row hidden-xs" style="background: #F9F9F9; margin: 10px 0;">
			<div class="col-md-5 col-sm-6">
				<h2 style="white-space: nowrap; padding-top: 10px;">Fast Exchange in Minutes Between</h2>
			</div>
			<div class="col-md-7 col-sm-6">
				<div id="myCarousel" class="carousel fdi-Carousel slide">
                        <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                            <div class="carousel-inner onebyone-carosel">

									<?php while ($row_res = mysqli_fetch_array($res_result)) { $cc++; if ($row_res['$row_res'] != "" && $row_res['$row_res'] != "http://") $elink1 = $row_res['website']; else $elink1 = "#"; ?>
									<div class="item <?php echo ($cc == 1) ? "active" : ""; ?>">
										<div class="col-xs-3">
											<?php if ($elink1 != "#") { ?><a href="<?php echo $elink1; ?>" target="_blank"><?php } ?>
												<img src="<?php echo SITE_URL; ?>images/currencies/<?php echo $row_res['image']; ?>" width="44" height="44" border="0" style="margin: 8px; border-radius: 50%;" class="img-responsive" />
											<?php if ($elink1 != "#") { ?></a><?php } ?>
										</div>
									</div>
									<?php } ?>
   
                            </div>
                        </div>
				</div>			
									
			</div>
		</div>

<?php }	?>				


		<div class="row">
			<div class="col-md-8">
	
	
	<div class="widget" style="background: #f1f9ed; border: 1px solid #deedd7">
	<h1 class="home_h1 text-center">Start Exchange</h1>
	
		<form action="<?php echo SITE_URL; ?>exchange.php" method="get" name="form3">
		<div class="row">
			<div class="col-md-4 col-md-offset-2">     
			  
			  <h3><i class="fa fa-arrow-up fa-lg" aria-hidden="true" style="color: #8dc6fb"></i> SEND</h3>

				<select class="selectpicker show-menu-arrow show-tick form-control" id="currency_send" name="currency_send" title="select" required>
				<!--<option value="">--- select ---</option>-->
					<?php
							
						if (!isLoggedIn()) $asql = " hide_from_visitors!='1' AND "; else $asql = "";
						
						$sql_curr_send = smart_mysql_query("SELECT * FROM exchangerix_currencies WHERE currency_id IN (SELECT from_currency FROM exchangerix_exdirections WHERE $asql status='active') AND (reserve > 0 || reserve='') AND allow_send='1' AND status='active' ORDER BY sort_order DESC, currency_name ASC");
						if (mysqli_num_rows($sql_curr_send) > 0)
						{
							while ($row_curr_send = mysqli_fetch_array($sql_curr_send))
							{
								if ($row_curr_send['is_crypto'] != 1) $show_ccode = " ".$row_curr_send['currency_code']; else $show_ccode = "";
								if ($row_curr_send['default_send'] == 1) $selected = " selected=\"selected\""; else $selected = "";
								echo "<option value=\"".$row_curr_send['currency_id']."\"".$selected." data-content=\"<img src='".SITE_URL."images/currencies/".$row_curr_send['image']."' width='33' height='33' class='imgrs'><span style='font-size: 15px'> ".$row_curr_send['currency_name'].$show_ccode."</span>\">".$row_curr_send['currency_name'];
								echo $show_ccode;
								echo "</option>";
							}
						}
					?>
				</select>
				<br>
				
		   </div>
		   <div class="col-md-1 text-center hidden-xs"><br><br><i class="fa fa-exchange fa-2x"></i></div>
		   <div class="col-md-4">

			  <br class="visible-xs">
			  <h3>RECEIVE <i class="fa fa-arrow-down fa-lg" aria-hidden="true" style="color: #5cb85c"></i></h3>

				<select class="selectpicker show-menu-arrow show-tick form-control" id="currency_receive" name="currency_receive" title="select" required>
				<!--<option value="">--- select ---</option>-->
					<?php
						$sql_curr_receive = smart_mysql_query("SELECT * FROM exchangerix_currencies WHERE currency_id IN (SELECT to_currency FROM exchangerix_exdirections WHERE $asql status='active') AND (reserve > 0 || reserve='') AND allow_send='1' AND status='active' ORDER BY sort_order DESC, currency_name ASC");
						if (mysqli_num_rows($sql_curr_receive) > 0)
						{
							while ($row_curr_receive = mysqli_fetch_array($sql_curr_receive))
							{
								if ($row_curr_receive['is_crypto'] != 1) $show_ccode = " ".$row_curr_receive['currency_code']; else $show_ccode = "";
								if ($row_curr_receive['default_receive'] == 1) $selected = " selected=\"selected\""; else $selected = "";
								echo "<option value=\"".$row_curr_receive['currency_id']."\"".$selected." data-content=\"<img src='".SITE_URL."images/currencies/".$row_curr_receive['image']."' width='33' height='33' class='imgrs'><span style='font-size: 15px'> ".$row_curr_receive['currency_name'].$show_ccode."</span>\">".$row_curr_receive['currency_name'];
								echo $show_ccode;
								echo "</option>";
							}
						}
					?>
				</select>
				<br><br>
			   
		   </div>
          </div>
          
 		   		<hr style="margin: 0 0 8px 0">
			  	<p class="home_btn" align="center"><button type="submit" id="exbutton" class="btn btn-success btn-lg"><i class="fa fa-refresh" id="resh" aria-hidden="true"></i> Exchange</button></p>		   
		   </form>         
		
	</div>

		<?php if ($content['text'] != "") { ?>
			<div style="background: #FFF; padding: 15px; margin: 30px 0 10px 0;">
				<?php echo $content['text']; ?>
			</div>
		<?php } ?>
		

		<?php
			$ee = 0;
			$res_query3 = "SELECT *, sum(exchange_amount) exchange_amount, sum(receive_amount) receive_amount FROM exchangerix_exchanges WHERE date_sub(curdate(), interval 7 day) <= created AND status='confirmed' GROUP BY from_currency, to_currency ORDER BY created DESC LIMIT 7";
			$res_result3 = smart_mysql_query($res_query3);
			
			if (mysqli_num_rows($res_result3) > 0)
			{	
		?>
			<div class="widget hidden-xs">
				<h2><i class="fa fa-line-chart" aria-hidden="true"></i> Tranding Directions of the Week</h2>
		
				<div class="table-responsive">
				 <table align="center" width="100%" border="0" cellpadding="3" cellspacing="0">
					<tr>
						<th width="56%">Direction</th>
						<th width="22%"><i class="fa fa-arrow-up" aria-hidden="true"></i> Total Sent</th>
						<th width="22%">Total Received <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
					</tr>
				<?php while ($row_res3 = mysqli_fetch_array($res_result3)) { $ee++; ?>
					<tr class="href-row <?php echo ($ee%2 == 0) ? "row_even" : "row_odd"; ?>" style="cursor: pointer; margin-bottom: 5px; border-bottom: 1px solid #EEE" data-href="<?php echo SITE_URL; ?>exchange.php?currency_send=<?php echo $row_res3['from_currency_id']; ?>&currency_receive=<?php echo $row_res3['to_currency_id']; ?>">
					<td><p><h4><?php echo GetCurrencyImg($row_res3['from_currency_id']); ?> <?php echo $row_res3['from_currency']; ?> <i class="fa fa-long-arrow-right" aria-hidden="true" style="color: #000"></i> <?php echo GetCurrencyImg($row_res3['to_currency_id']); ?> <?php echo $row_res3['to_currency']; ?></h4></p></td>
					<td style="padding-left: 30px;"><b style="font-size: 17px;"><?php echo number_format($row_res3['exchange_amount'], 2, '.', ''); ?></b> <sup><?php echo GetCurCode($row_res3['from_currency']); ?></sup> </td>
					<td style="padding-left: 30px;"><b style="font-size: 17px;"><?php echo number_format($row_res3['receive_amount'], 2, '.', ''); ?></b> <sup><?php echo GetCurCode($row_res3['to_currency']); ?></sup></td>
					</tr>
				<?php } ?>
				</table>
				</div>
			
			</div>
			
		<?php }	?>
	
	
	<?php
	
		$news_result = smart_mysql_query("SELECT *, DATE_FORMAT(added, '".DATE_FORMAT."') AS news_date FROM exchangerix_news WHERE status='active' ORDER BY added DESC LIMIT 5");
		$news_total = mysqli_num_rows($news_result);
		
		if ($news_total > 0) {
		
		?>
		
		<div style="background: #FFF; padding: 15px; margin: 5px 0; border-radius: 7px;">
		<h3><?php echo CBE1_NEWS_TITLE; ?></h3>

		<?php while ($news_row = mysqli_fetch_array($news_result)) { ?>
		<div class="news_info">
			<div class="news_date"><?php echo $news_row['news_date']; ?></div>
			<div class="news_title"><h4><a href="<?php echo SITE_URL; ?>news.php?id=<?php echo $news_row['news_id']; ?>"><?php echo $news_row['news_title']; ?></h4></a></div>
		</div>
		<?php } ?>
		</div>
	<?php } ?>

</div>
<div class="col-md-4">
	
<?php
	
	$res_query = "SELECT * FROM exchangerix_currencies WHERE (reserve > 0 OR reserve='') AND status='active' ORDER BY sort_order DESC, currency_name ASC"; // AND currency_id IN (SELECT to_currency FROM exchangerix_exdirections WHERE status='active')
	$res_result = smart_mysql_query($res_query);
	$cc = 0;
	
	if (mysqli_num_rows($res_result) > 0) //want more link hover //dev
	{
?>
		<div class="widget">
		<h1><i class="fa fa-bars" aria-hidden="true"></i> Our Reserves</h1>
		
		<table width="100%">
		<?php while ($row_res = mysqli_fetch_array($res_result)) { $cc++; ?>
		<tr style="background: <?php if (($cc%2) == 0) echo "#F9F9F9"; else echo "#FFF"; ?>">
			<td width="15%"><img src="<?php echo SITE_URL; ?>images/currencies/<?php echo $row_res['image']; ?>" width="33" height="33" border="0" style="margin: 3px; border-radius: 50%;" /></td>
			<td width="40%"><b><?php echo $row_res['currency_name']; ?></b><br></td>
			<td width="45%" align="right"><?php echo ($row_res['reserve'] == 0) ? "<span class='label label-success'>unlimited</span> <sup>".$row_res['currency_code']."</sup>" : "<b>".GetCurrencyReserve($row_res['currency_id'])."</b> <sup>".$row_res['currency_code']."</sup>"; ?>&nbsp;</td>
		</tr>
		<?php } ?>
		</table>
		</div>

<?php }	?>


		<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				//$("#loader").show();
				$("#show").hide().delay(3000).fadeIn();
				function update_stats() {
					$('#show').each(function(){
						$("#loader").show().delay(3000).fadeOut();
						$(this).hide().load('<?php SITE_URL; ?>getdata.php').fadeIn('slow');
						//$("#loader").hide();
					});
				}
				update_stats();
				setInterval(update_stats, 120000);
			});
		</script>

		<div class="widget">
			<h1><i class="fa fa-exchange" aria-hidden="true"></i> Latest Exchanges</h1>
			
			<div id="loader"><p align="center"><img src="<?php echo SITE_URL; ?>images/loading_line.gif" /></p></div>
			<div id="show"></div>
		</div>


		<div class="widget">
		<h1><i class="fa fa-comments-o fa-lg" aria-hidden="true"></i> Testimonials <?php if (GetTestimonialsTotal() > 0) { ?><a href="<?php echo SITE_URL; ?>testimonials.php"><span class="testimonials-count" style="font-size: 19px; padding: 3px 15px; margin: 3px; position: relative;
  top: -0.5em; color: #328813; border: 1px solid #328813; border-radius: 5px;"><?php echo number_format(GetTestimonialsTotal()) ; ?></span></a><?php } ?></h1>
			
				<?php
					
					$res2_query = "SELECT * FROM exchangerix_reviews r LEFT JOIN exchangerix_exchanges e ON r.exchange_id=e.exchange_id WHERE r.status='active' ORDER BY r.added LIMIT ".HOMEPAGE_REVIEWS_LIMIT;
					$res2_result = smart_mysql_query($res2_query);
					$total2_res = mysqli_num_rows($res2_result);
					$cc = 0;
					
					if ($total2_res > 0)
					{
				?>
					<a class="pull-right" href="<?php echo SITE_URL; ?>testimonials.php" style="color: #777; padding-bottom: 11px;"><i class="fa fa-comments"></i> view all</a>
					
					<div class="carousel slide" data-ride="carousel" id="quote-carousel">
					    <ol class="carousel-indicators">
				          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
						  <?php for ($e=1; $e<$total2_res; $e++) { ?>
				          	<li data-target="#quote-carousel" data-slide-to="<?php echo $e; ?>"></li>
				          <?php } ?>
				        </ol>
					<div class="carousel-inner">					
						<?php while ($row2_res = mysqli_fetch_array($res2_result)) { $cc++; ?>
						<div class="item <?php if ($cc == 1) echo "active"; ?>">
			            <blockquote>
			              <div class="row">
			                <div class="col-sm-12">
			                			
								<center>
									<?php for ($i=0; $i<5;$i++) { ?><i class="fa fa-star" style="font-size: 20px; margin-right: 3px; color: <?php echo ($i<$row2_res['rating']) ? "#ecb801" : "#CCC"; ?>"></i><?php } ?>							
								</center>
								 by <i class="fa fa-user-o" aria-hidden="true"></i> <b><?php echo ($row2_res['author'] == "") ? GetUsername($row2_res['user_id'], $hide_lastname = 1) : $row2_res['author']; ?></b><br><br>
								<?php if ($row2_res['from_currency'] != "" &&  $row2_res['from_currency'] != "") { ?>
								<a href="<?php echo SITE_URL; ?>exchange.php?currency_send=<?php echo $row2_res['from_currency_id']; ?>&currency_receive=<?php echo $row2_res['to_currency_id']; ?>"><?php echo GetCurrencyImg($row2_res['from_currency_id'], $width=27); ?> <b><?php echo $row2_res['from_currency']; ?> <i class="fa fa-long-arrow-right" aria-hidden="true" style="color: #000"></i></b> <?php echo GetCurrencyImg($row2_res['to_currency_id'], $width=27); ?> <b><?php echo $row2_res['to_currency']; ?></b></a>
								<br>
								<?php } ?>
								<b style="font-size: 17px"><?php echo $row2_res['review_title']; ?></b>
								<p style="text-align: justify"><?php echo $row2_res['review']; ?></p>
							
							</div>
			              </div>
			            </blockquote>
						</div>
						<?php } ?>	
					</div>
					</div>
				
				<?php }else{ ?>		
					<p class="text-center">No testimonias at this time.<?php //echo CBE1_TESTIMONIALS_NO; ?></p>
				<?php } ?>
				
		</div>	
		
		
		<!--
			<div class="widget">
				<h1>Exchange Status</h1>
				<form action="<?php echo SITE_URL; ?>check_status.php" method="post">
				<input type="text" class="form-control" name="exchange_id" value="" placeholder="your exchange id">
				<input type="hidden" name"action" value="check_status"
				<button type="submit" class="btn btn-suceess">Check</button>
				</form>
			</div>
		-->
	
</div>
</div>

	<?php if (SHOW_SITE_STATS == 1) { ?>
	<div class="row" style="background:#f9fcf9; padding: 15px; margin: 20px 0 10px 0; border-radius: 7px;">
		<div class="col-md-3 text-center">
			<?php $all_clients_row = mysqli_fetch_array(smart_mysql_query("SELECT count( DISTINCT(client_email) ) as total FROM exchangerix_exchanges WHERE user_id='0'")); $all_clients_num = $all_clients_row['total']; ?>
			<h2><?php echo (GetUsersTotal() + $all_clients_num); ?></h2>
			<h3><i class="fa fa-users" aria-hidden="true"></i> Clients trust us</h3>
		</div>
		<div class="col-md-3 text-center">
			<?php $all_t_stats_row = mysqli_fetch_array(smart_mysql_query("SELECT COUNT(*) AS total FROM exchangerix_exchanges WHERE created > DATE_SUB(NOW(), INTERVAL 1 DAY)")); $all_t_stats = $all_t_stats_row['total']; // status='confirmed' AND ?>
			<h2><?php echo $all_t_stats; ?></h2>			
			<h3><i class="fa fa-exchange" aria-hidden="true"></i> Exchanges Today</h3>
		</div>		
		<div class="col-md-3 text-center">
			<?php $all_t_stats_row = mysqli_fetch_array(smart_mysql_query("SELECT COUNT(*) AS total FROM exchangerix_exchanges")); $all_t_stats = $all_t_stats_row['total']; //  WHERE status='confirmed' ?>
			<h2><?php echo $all_t_stats; ?></h2>			
			<h3><i class="fa fa-refresh" aria-hidden="true"></i> Total Exchanges</h3>
		</div>
		<div class="col-md-3 text-center">
			<h2>$<?php echo number_format(floatval(getsetting('total_exchanges_usd'))); ?></h2>			
			<h3><i class="fa fa-money" aria-hidden="true"></i> Exchanged (in USD)</h3>
		</div>
	</div>
	<?php } ?>

</div>
</div>


<?php require_once("inc/footer.inc.php"); ?>