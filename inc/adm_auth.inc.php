<?php
/*******************************************************************\
 * Exchangerix v2.0
 * http://www.exchangerix.com
 *
 * Copyright (c) 2018 Exchangerix Software. All rights reserved.
 * ---------- Exchangerix IS NOT FREE SOFTWARE ----------
\*******************************************************************/

	if (!(isset($_SESSION['adm']['id']) && is_numeric($_SESSION['adm']['id'])))
	{
		header("Location: login.php");
		exit();
	}
	else
	{
		$admin_panel = 1;
	}

?>