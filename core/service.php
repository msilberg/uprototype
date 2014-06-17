<?php
class service extends fhtml
{
    static $attr=NULL;
    static $element=NULL;
    static $except=NULL;

    protected function check_post_var($var)
    {
        return (isset($_POST[$var]))? $_POST[$var] : NULL;
    }
    protected function screen_class($fname)
    {
        return substr($fname,0,strlen(data::$scr_format)*(-1));
    }
    private function check_except($scr)
    {
        if (!is_array(self::$except)) return FALSE;
        return (in_array($scr,self::$except))? TRUE : FALSE;
    }
    private function add_elem()
    {
        switch (self::$attr)
        {
            case "all":
                foreach (data::$scrf as $key=>$fval)
                {
                    if (self::check_except(self::screen_class($key))) continue;
                    data::$scrf[$key][]=self::$element;
                }
                break;
            default:
                foreach (explode(",",self::$attr) as $fval)
                {
                    if (self::check_except($fval)) continue;
                    data::$scrf[$fval.data::$scr_format][]=self::$element;
                }
        }
    }
    protected function make_scrf()
    {
        // making screen files array
        data::$scrf=array_fill_keys(db::files_list("screens"),NULL);
        foreach (db::get_config("map.xml") as $val)
            foreach ($val as $sval)
            {
                self::$attr=(string)$val->attributes()->screens;
                $link=(string)$sval->attributes()->href;
                self::$except=(isset($sval->attributes()->except))? explode(",",(string)$sval->attributes()->except) : NULL;
                if (isset($sval->part))
                    foreach ($sval as $thval)
                    {
                        self::$element=array("link"=>$link,"area"=>(string)$thval);
                        self::add_elem();
                    }
                else
                {
                    self::$element=array("link"=>$link,"area"=>(string)$sval);
                    self::add_elem();
                }
            }
    }
    protected function log_in()
    {
        $uid=db::look_for_user();
        if (data::logged_in() || !$uid) return false;
        $_SESSION['uid']=$uid;
        header("location:".data::$traddr."run/");
        db::add_history(1);
    }
    protected function log_out()
    {
        db::add_history(0);
        include self::$raddr."core/outse.inc";
    }
}