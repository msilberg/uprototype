<?php
	require_once("/var/www/public_html/uprototype/core/loader.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>test</title>
		<meta name="author" content="mike" />
		<!-- Date: 2011-12-27 -->
	</head>
	<body>
	<?php
		print geoip_country_code_by_name($_SERVER['REMOTE_ADDR'])."<br/>";
		print_r(geoip_region_name_by_code($_SERVER['REMOTE_ADDR']))
	?>
	</body>
</html>