<?php
/*
 * @author Anakeen
 * @package FDL
*/
/**
 * Display interface to change password in case of expiration
 *
 * @author Anakeen
 * @version $Id: chgpasswd.php,v 1.9 2005/11/14 17:13:10 eric Exp $
 * @package FDL
 * @subpackage
 */
/**
 */

global $_POST;

if ($_POST["login"] == "") {
    print _("no login : passwd unchanged");
    exit;
}
include_once ("Class.Application.php");
include_once ("Class.User.php");
include_once ('Class.SessionCache.php');
include_once ('Lib.Prefix.php');

bindtextdomain("what", "$pubdir/locale");
textdomain("what");
setlocale(LC_MESSAGES, getenv("LANG"));

$CoreNull = "";
$core = new Application();
$core->Set("CORE", $CoreNull);
$action = new Action();
$action->Set("", $core);

$core->user = new Account();
$core->user->setLoginName($_POST["login"]);

if (!$core->user->isAffected()) {
    print _("unknown login : passwd unchanged");
    exit;
}

if ($_POST["passwd1"] != $_POST["passwd2"]) {
    print _("password are not identicals : not changed");
    exit;
}
if ($_POST["passwd1"] == "") {
    print _("empty password : not changed");
    exit;
}
$core->user->password_new = stripslashes($_POST["passwd1"]);
$core->user->expires = 0;
$core->user->modify();

global $_SERVER;

Header("Location: http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/what/index.php?sole=R");
exit;
?>
