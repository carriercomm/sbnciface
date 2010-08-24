<?php
/*
 * $Id$
 *
 * Copyright (C) 2010 Conny Sj�blom <biohzn@mustis.org>
 * Copyright (C) 2010 Arne Jensen <darkdevil@darkdevil.dk>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
/*
 * The BNCs Server settings.
*/
?>
<?php
if (isset($_POST['jump'])) {

    $sbnc->Call('jump');
    $_SESSION['msg'] = $lang['reconnecting'];
} elseif (isset($_POST['serversettings'])) {

    $admin = $sbnc->Call('getvalue', array('admin'));

    if ($admin == 1) {
        if (!empty($_POST['server'])) {
            $sbnc->CallAs($ident, "setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['port'])) {
            $sbnc->CallAs($ident, "setvalue", array("port", $_POST['port']));
        }
        if (!empty($_POST['password'])) {
            $sbnc->CallAs($ident, "setvalue", array("serverpassword", $_POST['password']));
        }
        if (!empty($_POST['server'])) {
            $sbnc->CallAs($ident, "setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['vhost'])) {
            $sbnc->CallAs($ident, "setvalue", array("vhost", $_POST['vhost']));
        }
    } else {
        if (!empty($_POST['server'])) {
            $sbnc->Call("setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['port'])) {
            $sbnc->Call("setvalue", array("port", $_POST['port']));
        }
        if (!empty($_POST['password'])) {
            $sbnc->Call("setvalue", array("serverpassword", $_POST['password']));
        }
        if (!empty($_POST['server'])) {
            $sbnc->Call("setvalue", array("server", $_POST['server']));
        }
        if (!empty($_POST['vhost'])) {
            $sbnc->Call("setvalue", array("vhost", $_POST['vhost']));
        }
    }
    $_SESSION['msg'] = $lang['settings_saved'];
}
?>
<?php if (!empty($_SESSION['username'])) { ?>
<div id="content">
        <?php if (!empty($_SESSION['msg'])) {
            echo "<div class=\"success\">";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }
        ?>
    <form action="" method="POST">
        <table id="tbl" align="center" width="400">
            <tr>
                <td width="40%"><?php echo $lang['server']; ?>:</td><td width="60%"><input type="text" name="server" size="33" value="<?php echo $sbnc->Call("getvalue", array("server")); ?>" <?php echo getLockSetting("server"); ?>/></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['port']; ?>:</td><td width="60%"><input type="text" name="port" size="33" value="<?php echo $sbnc->Call("getvalue", array("port")); ?>" <?php echo getLockSetting("port"); ?>/></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['password']; ?>:</td><td width="60%"><input type="text" name="password" size="33" value="<?php echo $sbnc->Call("getvalue", array("serverpass")); ?>" <?php echo getLockSetting("serverpass"); ?>/></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $lang['vhost']; ?>:</td><td width="60%"><select name="vhost" style="width:225px;" <?php echo getLockSetting("vhost"); ?>><?php foreach($sbnc->Call("getvhosts") as $vhost) {
                                echo '<option value="'.$vhost[0].'"';
                                if($sbnc->CallAs($user, "getvalue", array("vhost"))==$vhost[0]) {
                                    echo ' selected';
                                } echo


                                '>'.$vhost[3].'</option>';
    } ?></select></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="<?php echo $lang['save_changes']; ?>" name="serversettings" /> <input type="submit" value="<?php echo $lang['jump']; ?>" name="jump" /></td>
            </tr>
        </table>
    </form>
</div>
    <?php } ?>
