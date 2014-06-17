<div class="login-frame">
    <form name="form1" method="POST" action="<?php echo data::$traddr ?>">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td align="center" colspan="2"><h2>U Navigator Prototype</h2></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    if (isset($_POST['logbtn']) && !data->logged_in())
							print "<div class=\"warn\">User's login or password is incorrect</div>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Login:</td>
                <td><input type="text" class="input-style" name="login" maxlength="20" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" class="input-style" name="psswd" maxlength="20" /></td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input class="logbtn-style" type="submit" name="logbtn" value="Enter" />
                </td>
            </tr>
        </table>
    </form>
</div>