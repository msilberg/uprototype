<?php
class fhtml extends data
{
    protected function body()
    {
        if (data::logged_in())
        {
            self::screens();
            self::js_methods();
        }
        else include "html/login.php";
    }
    protected function logout()
    {
        if (!data::logged_in()) return false;
        include "html/logout.php";
    }
    protected function js_methods()
    {
        print "<script type=\"text/javascript\" language=\"JavaScript\">\n";
        foreach (data::$scrf as $key=>$val)
        {
            $class=service::screen_class($key);
            print "screens.$class=$('div.$class');\n";
        }
        print "</script>\n";
    }
    protected function screens()
    {
        service::make_scrf();
        print "<form name=\"run-form\" method=\"GET\" action=\"".data::$traddr."run/\"><div class=\"screens\">\n";
        foreach (data::$scrf as $key=>$val)
        {
            $class=service::screen_class($key);
            print "<div class=\"$class\"".(($class=="start")?NULL:" style=\"display:none;\"").">
					<img src=\"".data::$scr.$key."\" usemap=\"#navi".(++$i)."\" border=\"0\" /></div>\n";
            if (is_array($val))
            {
                print "<map name=\"navi$i\">\n";
                foreach ($val as $sval)
                    print "<area shape=\"poly\" coords=\"".$sval['area'].
                        "\" onClick=\"changeScreen(screens.$class,screens.".$sval['link'].")\" />\n";
                print "</map>\n";
            }
        }
        print "</div></form>\n";
    }
}