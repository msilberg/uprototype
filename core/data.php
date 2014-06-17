<?php
class data
{
	// --== Variables ==--
	/*
	 * Gear state types
	 * NULL - login
	 * 0 - login or password are incorrect
	 * 1 - screenshots
	 */
	
	static $raddr="/var/www/public_html/uprototype/";
	static $traddr="http://localhost/public_html/uprototype/";
	static $scr_format=".jpg";
	static $scr; // screens directory
	static $scrf; // screens files array
		
	/*
	 * -== Constructor ==--
	 */
	function __construct()
	{
		include self::$raddr."core/inse.inc";
		self::$scr=self::$traddr."screens/";
		if (isset($_POST['logbtn']))
		{
			$_SESSION['login']=(isset($_POST['login']))? $_POST['login'] : NULL;
			$_SESSION['psswd']=(isset($_POST['psswd']))? $_POST['psswd'] : NULL;
			service::log_in();
		}
		if (isset($_GET['logout'])) service::log_out();
	}
	/*
	 * --== Functions ==--
	 */
	protected function logged_in()
	{
		return (isset($_SESSION['uid']))? TRUE : FALSE;
	}
	public function logout_otp()
	{
		fhtml::logout();
	}
	public function body_otp()
	{
		fhtml::body();
	}
	public function style_otp()
	{
		foreach (db::files_list("styles") as $val)
			print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".data::$traddr."styles/$val\" />\n";
	}
	public function js_otp()
	{
		foreach (db::files_list("js") as $val)
			print "<script type=\"text/javascript\" language=\"JavaScript\" src=\"".data::$traddr."js/$val\"></script>\n";
	}
}