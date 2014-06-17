<?php
new dbconnect();
class db extends service
{
	protected function get_config($file)
	{
		$xml=simplexml_load_file(data::$raddr."config/".$file);
		return $xml->children();
	}
	protected function files_list($subdir)
	{
		$dir=opendir(data::$raddr.$subdir."/") or die("Can't open directory ".$subdir);
		while ($file=readdir($dir))	if ($file!="." && $file!="..") $arr[]=$file;
		return $arr;
	}
	protected function look_for_user()
	{
		if (!isset($_SESSION['login']) || !isset($_SESSION['psswd'])) return false;
		$res=mysql_query("SELECT id FROM users WHERE login='".md5($_SESSION['login'])."' && psswd='".md5($_SESSION['psswd'])."'");
		if (mysql_num_rows($res)==0) return false;
		while ($a_row=mysql_fetch_object($res)) return $a_row->id;
	}
	protected function add_history($act)
	{
		mysql_query("INSERT INTO history(ip,country,detailed,action,user_id)
			VALUES('".$_SERVER['REMOTE_ADDR']."','".geoip_country_code_by_name($_SERVER['REMOTE_ADDR'])."',
			'".implode("/", geoip_record_by_name($_SERVER['REMOTE_ADDR']))."','$act','".$_SESSION['uid']."')");
	}
}
?>