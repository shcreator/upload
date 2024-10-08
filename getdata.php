<?php
/*******************************************************************\
 * Exchangerix v2.0
 * http://www.exchangerix.com
 *
 * Copyright (c) 2018 Exchangerix Software. All rights reserved.
 * ---------- Exchangerix IS NOT FREE SOFTWARE ----------
\*******************************************************************/

	session_start();
	require_once("inc/config.inc.php");
	
	$what = getGetparameter('what');
			
	if (isset($what) && $what=="rate" && isset($_GET['direction']) && is_numeric($_GET['direction']))
	{
		unset($rate_up);
		
		$exdirection_id = (int)$_GET['direction'];
		
		$result = smart_mysql_query("SELECT *, TIMESTAMPDIFF(MINUTE,updated,NOW()) AS last_update_mins FROM exchangerix_exdirections WHERE exdirection_id='$exdirection_id' LIMIT 1");
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_array($result);
			
			$updated = 0;
			
			// update rate ///////////////////
			if ($row['auto_rate'] == 1 && $row['last_update_mins'] > 1)
			{
					$from 	= GetCurrencyCode($row['from_currency']);
					$to 	= GetCurrencyCode($row['to_currency']);
										
					exchagerix_update_rate($from, $to, $row['fee'], $row['exdirection_id']);
						
					$old_rate	 	= $row['exchange_rate'];	
					$exchange_rate  = GetDirectionRate($row['exdirection_id']);
					
					$updated = 1;
					
					if ($old_rate != $exchange_rate)
					{
						if ($old_rate > $exchange_rate) $rate_up = 1;
						if ($old_rate < $exchange_rate) $rate_up = 2;
					}										
			}			
			
		?>
					
					<?php if (isset($rate_up) && $rate_up == 1) { ?><i id="rate_arrow" class='fa fa-arrow-up' style='color: #2f9e2d'></i><?php }elseif(isset($rate_up) && $rate_up == 2){ ?><i id="rate_arrow" class='fa fa-arrow-down' style='color: #f75c5d'></i><?php } ?>
				
					<span id="ex_rate_live" style="color: <?php if (isset($rate_up) && $rate_up == 1) echo "#2f9e2d"; elseif(isset($rate_up) && $rate_up == 2) echo "#f75c5d"; else echo "#000" ?>"><?php echo $row['from_rate']; ?> <?php echo GetCurrencyCode($row['from_currency']); ?> = <?php echo $row['to_rate']; ?> <?php echo GetCurrencyCode($row['to_currency']); ?></span>
					
					<script type="text/javascript">
						$('#rate_arrow').delay(800).fadeOut('slow');
						$('#ex_rate_live')
							  .delay(1100)
							  .queue(function (next) { 
							    $(this).css('color', '#000'); 
							    next(); 
						});						
					</script>
				
				
	<?php
		
		}	
	}
	else
	{
		$cc = 0;
		$result = smart_mysql_query("SELECT * FROM exchangerix_exchanges ORDER BY created DESC LIMIT ".HOMEPAGE_EXCHANGES_LIMIT);
        if (mysqli_num_rows($result) > 0) // WHERE (status='confirmed' OR status='pending' OR status='waiting') 
		{
			while ($row = mysqli_fetch_array($result)) { $cc++;
		?>
			<div style="background: <?php echo ($cc%2 == 0) ? "#F9F9F9" : "#FFF"; ?>; padding: 5px; margin-bottom: 5px; border-bottom: 1px solid #EEE">
				<small class="pull-right" style="background: #EEE; border-radius: 3px; font-size: 11px; padding: 3px 7px; color: #333; display: block;"><?php echo findTimeAgo($row['created']); ?></small><br>
				<?php if ($row['country_code'] != "") { ?><img src="<?php SITE_URL; ?>images/flags/<?php echo $row['country_code']; ?>.png" width="16" height="11" /> <?php } ?>
				<a href="<?php echo SITE_URL; ?>exchange.php?currency_send=<?php echo $row['from_currency_id']; ?>&currency_receive=<?php echo $row['to_currency_id']; ?>"><?php echo $row['from_currency']; ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo $row['to_currency']; ?></a><br>
				 <?php echo GetCurrencyImg($row['from_currency_id'], $width=25); ?> <b><?php echo number_format($row['exchange_amount'], 2, '.', ''); ?></b> <sup><?php echo GetCurCode($row['from_currency']); ?></sup> &nbsp; <i class="fa fa-exchange" aria-hidden="true" style="color: #5bbc2e"></i> &nbsp; <?php echo GetCurrencyImg($row['to_currency_id'], $width=25); ?> <b><?php echo number_format($row['receive_amount'], 2, '.', ''); ?></b> <sup><?php echo GetCurCode($row['to_currency']); ?></sup><br>
			</div>
		<?php	}

		}else{ echo "<p class='text-center'>No exchanges at this time.</p>"; }
		
	}
		
?>