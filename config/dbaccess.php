<?php
/*
 * @author Anakeen
 * @package FDL
*/
/**
 * @author Anakeen
 */

$pgservice_core = 'lims';
$pgservice_freedom = 'lims';;
$freedom_context = "default";
$dbpsql = $pgservice_core;
$useIndexAsGuest = false;
/*
 ** Authentication mode : apache / basic / html / open
 ** --------------------------------------------------
*/
$freedom_authtype = 'html';

$freedom_authtypeparams = array(
    'html' => array(
        'auth' => array(
            'app' => 'AUTHENT',
            'action' => 'LOGINFORM',
            'args' => ''
        ) ,
        'username' => 'auth_user',
        'password' => 'auth_pass',
    ) ,
    'open' => array() ,
    'basic' => array(
        'realm' => 'freedom',
    ) ,
);
/*
 ** Providers : how username / password tuple is validated
 ** ------------------------------------------------------
*/
$freedom_authprovider = 'freedom';

$freedom_providers = array(
    'freedom' => array(
        'connection' => 'service=' . $pgservice_core,
    ) ,
    'file' => array(
        'authfile' => '/var/www/html/lims//.freedompwd',
    ) ,
);
/*
 ** Include local/override config
 ** -----------------------------
*/
$local_dbaccess = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'local-dbaccess.php';
if (file_exists($local_dbaccess)) {
    include ($local_dbaccess);
}
?>
