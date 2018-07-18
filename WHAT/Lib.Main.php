<?php
/*
 * @author Anakeen
 * @package FDL
*/
/**
 * Main first level function
 *
 * @author Anakeen
 * @version $Id: Lib.Common.php,v 1.50 2008/09/11 14:50:04 eric Exp $
 * @package FDL
 * @subpackage CORE
 */
/**
 */
include_once ("WHAT/Lib.Common.php");
/**
 * @param Authenticator $auth
 * @param Action $action
 */
function getMainAction($auth, &$action)
{
    include_once ('Class.Action.php');
    include_once ('Class.Application.php');
    include_once ('Class.Session.php');
    include_once ('Lib.Http.php');
    include_once ('Lib.Phpini.php');
    include_once ('Class.Log.php');
    include_once ('Class.DbObj.php');
    
    $CoreNull = "";
    
    global $_GET;
    $defaultapp = false;
    if (!getHttpVars("app")) {
        $defaultapp = true;
        $_GET["app"] = "CORE";
        if (!empty($_SERVER["FREEDOM_ACCESS"])) {
            $_GET["app"] = $_SERVER["FREEDOM_ACCESS"];
            $_GET["action"] = "";
        } else {
            $defaultapp = false;
            $_GET["action"] = "INVALID";
        }
    }
    
    if (isset($auth->auth_session)) {
        $session = $auth->auth_session;
    } else {
        $session = new Session();
        if (isset($_COOKIE[Session::PARAMNAME])) $sess_num = $_COOKIE[Session::PARAMNAME];
        else $sess_num = GetHttpVars(Session::PARAMNAME); //$_GET["session"];
        if (!$session->Set($sess_num)) {
            print "<strong>:~((</strong>";
            exit;
        };
    }
    $core = new Application();
    $core->Set("CORE", $CoreNull, $session);
    
    if (isset($_SERVER['PHP_AUTH_USER']) && ($core->user->login != $_SERVER['PHP_AUTH_USER'])) {
        // reopen a new session
        $session->Set("");
        $core->SetSession($session);
    }
    if ($defaultapp && $core->GetParam("CORE_START_APP")) {
        $_GET["app"] = $core->GetParam("CORE_START_APP");
    }
    
    \Dcp\Core\LibPhpini::setCoreApplication($core);
    \Dcp\Core\LibPhpini::applyLimits();
    //$core->SetSession($session);
    // ----------------------------------------
    // Init PUBLISH URL from script name
    initMainVolatileParam($core, $session);
    // ----------------------------------------
    // Init Application & Actions Objects
    $appl = new Application();
    $err = $appl->Set(getHttpVars("app") , $core, $session);
    if ($err) {
        print $err;
        exit;
    }
    
    if (($appl->machine != "") && ($_SERVER['SERVER_NAME'] != $appl->machine)) { // special machine to redirect
        if (substr($_SERVER['REQUEST_URI'], 0, 6) == "http:/") {
            $aquest = parse_url($_SERVER['REQUEST_URI']);
            $aquest['host'] = $appl->machine;
            $puburl = glue_url($aquest);
        } else {
            $puburl = "http://" . $appl->machine . $_SERVER['REQUEST_URI'];
        }
        
        Header("Location: $puburl");
        exit;
    }
    // ----------------------------------------
    // test SSL mode needed or not
    // redirect if needed
    if ($appl->ssl == "Y") {
        if ($_SERVER['HTTPS'] != 'on') {
            // redirect to go to ssl http
            $sslurl = "https://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
            Header("Location: $sslurl");
            exit;
        }
        
        $core->SetVolatileParam("CORE_BGCOLOR", $core->GetParam("CORE_SSLBGCOLOR"));
    }
    // -----------------------------------------------
    // now we are in correct protocol (http or https)
    $action = new Action();
    $action->Set(getHttpVars("action") , $appl);
    
    if ($auth) {
        $core_lang = $auth->getSessionVar('CORE_LANG');
        if ($core_lang != '') {
            $action->setParamU('CORE_LANG', $core_lang);
            $auth->setSessionVar('CORE_LANG', '');
        }
        $action->auth = & $auth;
        $core->SetVolatileParam("CORE_BASICAUTH", '&authtype=basic');
    } else $core->SetVolatileParam("CORE_BASICAUTH", '');
    
    initExplorerParam($core);
    // init for gettext
    setLanguage($action->Getparam("CORE_LANG"));
    
    $action->log->debug("gettext init for " . $action->parent->name . $action->Getparam("CORE_LANG"));
}

function stripUrlSlahes($url)
{
    $pos = mb_strpos($url, '://');
    return mb_substr($url, 0, $pos + 3) . preg_replace('/\/+/u', '/', mb_substr($url, $pos + 3));
}
/**
 * init user agent volatile param
 * @param Application $app
 * @param mixed $defaultValue
 */
function initExplorerParam(Application & $app, $defaultValue = false)
{
    $explorerP = getExplorerParamtersName();
    foreach ($explorerP as $ep) {
        $app->SetVolatileParam($ep, $defaultValue);
    }
    if (!empty($_SERVER["HTTP_HOST"])) {
        initExplorerWebParam($app);
    }
}

function getExplorerParamtersName()
{
    return array(
        "ISIE",
        "ISIE6",
        "ISIE7",
        "ISIE8",
        "ISIE9",
        "ISIE10",
        "ISAPPLEWEBKIT",
        "ISSAFARI",
        "ISCHROME"
    );
}
/**
 * set volatile patram to detect web user agent
 * @param Application $app
 */
function initExplorerWebParam(Application & $app)
{
    $nav = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $pos = strpos($nav, "MSIE");
    if ($app->session->Read("navigator", "") == "") {
        if ($pos !== false) {
            $app->session->Register("navigator", "EXPLORER");
            if (preg_match("/MSIE ([0-9.]+).*/", $nav, $reg)) {
                $app->session->Register("navversion", $reg[1]);
            }
        } else {
            $app->session->Register("navigator", "NETSCAPE");
            if (preg_match("|([a-zA-Z]+)/([0-9.]+).*|", $nav, $reg)) {
                $app->session->Register("navversion", $reg[2]);
            }
        }
    }
    
    $ISIE6 = false;
    $ISIE7 = false;
    $ISIE8 = false;
    $ISIE9 = false;
    $ISIE10 = false;
    $ISAPPLEWEBKIT = false;
    $ISSAFARI = false;
    $ISCHROME = false;
    if (preg_match('/MSIE ([0-9]+).*/', $nav, $match)) {
        switch ($match[1]) {
            case "6":
                $ISIE6 = true;
                break;

            case "7":
                $ISIE7 = true;
                break;

            case "8":
                $ISIE8 = true;
                break;

            case "9":
                $ISIE9 = true;
                break;

            case "10":
                $ISIE10 = true;
                break;
        }
    } elseif (preg_match('|\bAppleWebKit/(.*?)\b|', $nav, $match)) {
        $ISAPPLEWEBKIT = true;
        if (preg_match('|\bChrome/(.*?)\b|', $nav, $match)) {
            $ISCHROME = true;
        } elseif (preg_match('|\bSafari/(.*?)\b|', $nav, $match)) {
            $ISSAFARI = true;
        }
    }
    
    $app->SetVolatileParam("ISIE", ($app->session->read("navigator") == "EXPLORER"));
    $app->SetVolatileParam("ISIE6", ($ISIE6 === true));
    $app->SetVolatileParam("ISIE7", ($ISIE7 === true));
    $app->SetVolatileParam("ISIE8", ($ISIE8 === true));
    $app->SetVolatileParam("ISIE9", ($ISIE9 === true));
    $app->SetVolatileParam("ISIE10", ($ISIE10 === true));
    $app->SetVolatileParam("ISAPPLEWEBKIT", ($ISAPPLEWEBKIT === true));
    $app->SetVolatileParam("ISSAFARI", ($ISSAFARI === true));
    $app->SetVolatileParam("ISCHROME", ($ISCHROME === true));
}
/**
 * Set various core URLs params
 *
 * @param Application $core
 * @param Session $session
 */
function initMainVolatileParam(Application & $core, Session & $session = null)
{
    if (php_sapi_name() == 'cli') {
        _initMainVolatileParamCli($core);
    } else {
        _initMainVolatileParamWeb($core, $session);
    }
}

function _initMainVolatileParamCli(Application & $core)
{
    $hostname = LibSystem::getHostName();
    $puburl = $core->GetParam("CORE_PUBURL", "http://" . $hostname . "/freedom");
    
    $absindex = $core->GetParam("CORE_URLINDEX");
    if ($absindex == '') {
        $absindex = "$puburl/"; // try default
        
    }
    $core_externurl = ($absindex) ? stripUrlSlahes($absindex) : stripUrlSlahes($puburl . "/");
    $core_mailaction = $core->getParam("CORE_MAILACTION");
    $core_mailactionurl = ($core_mailaction != '') ? ($core_mailaction) : ($core_externurl . "?app=FDL&action=OPENDOC&mode=view");
    
    $core->SetVolatileParam("CORE_EXTERNURL", $core_externurl);
    $core->SetVolatileParam("CORE_PUBURL", "."); // relative links
    $core->SetVolatileParam("CORE_ABSURL", $puburl . "/"); // absolute links
    $core->SetVolatileParam("CORE_JSURL", "WHAT/Layout");
    $core->SetVolatileParam("CORE_ROOTURL", "$absindex?sole=R&");
    $core->SetVolatileParam("CORE_BASEURL", "$absindex?sole=A&");
    $core->SetVolatileParam("CORE_SBASEURL", "$absindex?sole=A&"); // no session
    $core->SetVolatileParam("CORE_STANDURL", "$absindex?sole=Y&");
    $core->SetVolatileParam("CORE_SSTANDURL", "$absindex?sole=Y&"); // no session
    $core->SetVolatileParam("CORE_ASTANDURL", "$absindex?sole=Y&"); // absolute links
    $core->SetVolatileParam("CORE_MAILACTIONURL", $core_mailactionurl);
}

function _initMainVolatileParamWeb(Application & $core, Session & $session = null)
{
    $indexphp = basename($_SERVER["SCRIPT_NAME"]);
    $pattern = preg_quote($indexphp, "|");
    if (preg_match("|(.*)/$pattern|", $_SERVER['SCRIPT_NAME'], $reg)) {
        // determine publish url (detect ssl require)
        if (empty($_SERVER['HTTPS'])) $_SERVER['HTTPS'] = "off";
        if ($_SERVER['HTTPS'] != 'on') $puburl = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $reg[1];
        else $puburl = "https://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $reg[1];
    } else {
        // it is not allowed
        print "<strong>:~(</strong>";
        exit;
    }
    $add_args = "";
    if (array_key_exists('authtype', $_GET)) {
        $add_args.= "&authtype=" . $_GET['authtype'];
    }
    $puburl = stripUrlSlahes($puburl);
    $urlindex = $core->getParam("CORE_URLINDEX");
    $core_externurl = ($urlindex) ? stripUrlSlahes($urlindex) : stripUrlSlahes($puburl . "/");
    $core_mailaction = $core->getParam("CORE_MAILACTION");
    $core_mailactionurl = ($core_mailaction != '') ? ($core_mailaction) : ($core_externurl . "?app=FDL&action=OPENDOC&mode=view");
    
    $sessKey = isset($session->id) ? $session->getUKey(getParam("WVERSION")) : uniqid(getParam("WVERSION"));
    $core->SetVolatileParam("CORE_EXTERNURL", $core_externurl);
    $core->SetVolatileParam("CORE_PUBURL", "."); // relative links
    $core->SetVolatileParam("CORE_ABSURL", stripUrlSlahes($puburl . "/")); // absolute links
    $core->SetVolatileParam("CORE_JSURL", "WHAT/Layout");
    $core->SetVolatileParam("CORE_ROOTURL", "?sole=R$add_args&");
    $core->SetVolatileParam("CORE_BASEURL", "?sole=A$add_args&");
    $core->SetVolatileParam("CORE_SBASEURL", "?sole=A&_uKey_=$sessKey$add_args&");
    $core->SetVolatileParam("CORE_STANDURL", "?sole=Y$add_args&");
    $core->SetVolatileParam("CORE_SSTANDURL", "?sole=Y&_uKey_=$sessKey$add_args&");
    $core->SetVolatileParam("CORE_ASTANDURL", "$puburl/$indexphp?sole=Y$add_args&"); // absolute links
    $core->SetVolatileParam("CORE_MAILACTIONURL", $core_mailactionurl);
}
/**
 * execute action
 * app and action http param
 * @param Action $action
 * @param string $out
 */
function executeAction(&$action, &$out = null)
{
    $standalone = GetHttpVars("sole", "Y");
    if ($standalone != "A") {
        if ($out !== null) $out = $action->execute();
        else echo ($action->execute());
    } else {
        if ((isset($action->parent)) && ($action->parent->with_frame != "Y")) {
            // This document is not completed : does not contain header and footer
            // HTML body result
            // achieve action
            $body = ($action->execute());
            // write HTML header
            $head = new Layout($action->GetLayoutFile("htmltablehead.xml") , $action);
            // copy JS ref & code from action to header
            //$head->jsref = $action->parent->GetJsRef();
            //$head->jscode = $action->parent->GetJsCode();
            $head->set("TITLE", _($action->parent->short_name));
            if ($out !== null) {
                $out = $head->gen();
                $out.= $body;
                $foot = new Layout($action->GetLayoutFile("htmltablefoot.xml") , $action);
                $out.= $foot->gen();
            } else {
                echo ($head->gen());
                // write HTML body
                echo ($body);
                // write HTML footer
                $foot = new Layout($action->GetLayoutFile("htmltablefoot.xml") , $action);
                echo ($foot->gen());
            }
        } else {
            // This document is completed
            if ($out !== null) $out = $action->execute();
            else echo ($action->execute());
        }
    }
}

function checkWshExecUid($file)
{
    $uid = posix_getuid();
    if ($uid === 0) {
        throw new \Dcp\Exception(sprintf("Error: this script must NOT be run as root (uid 0).\n"));
    }
    if (($owner = fileowner($file)) === false) {
        throw new \Dcp\Exception(sprintf("Error: could not get owner of file '%s'.\n", $file));
    }
    if ($owner !== $uid) {
        $msg = <<<'EOF'
Error: current uid %d does not match owner %d of file '%s'.

You might need to either:
- run the script under the webserver's user;
- or set proper ownership of context's files to that of the webserver's user.

EOF;
        throw new \Dcp\Exception(sprintf($msg, $uid, $owner, $file));
    }
}
/**
 * @param Exception|Error $e
 * @throws \Dcp\Core\Exception
 */
function handleActionException($e)
{
    global $action;
    
    if (php_sapi_name() !== "cli") {
        if (method_exists($e, "addHttpHeader")) {
            /**
             * @var \Dcp\Exception $e
             */
            if ($e->getHttpHeader()) {
                header($e->getHttpHeader());
            } else {
                header("HTTP/1.1 500 Dynacase Uncaught Exception");
            }
        } else {
            header("HTTP/1.1 500 Dynacase Uncaught Exception");
        }
    }
    
    $displayMsg = \Dcp\Core\LogException::logMessage($e, $errId);
    if (isset($action) && is_a($action, 'Action') && isset($action->parent)) {
        
        if ($action->parent->name === ApplicationParameterManager::getParameterValue("CORE", "CORE_START_APP")) {
            $action->parent->session->Close();
            $action->exitError(_("You don't have access to any content. Please contact your administrator."));
        } else {
            
            if (php_sapi_name() === 'cli') {
                fwrite(STDERR, sprintf("[%s]: %s\n", $errId, $displayMsg));
            } else {
                $action->exitError($displayMsg, true, $errId);
            }
        }
    } else {
        if (php_sapi_name() === 'cli') {
            fwrite(STDERR, sprintf("[%s]: %s\n", $errId, $displayMsg));
        } else {
            print htmlspecialchars(sprintf("[%s]: %s\n", $errId, $displayMsg));
        }
        exit(1);
    }
}

function isInteractiveCLI()
{
    if (php_sapi_name() !== 'cli') {
        return false;
    }
    if (function_exists('posix_isatty')) {
        return (posix_isatty(STDIN) || posix_isatty(STDOUT) || posix_isatty(STDERR));
    }
    return true;
}

function _wsh_send_error($errMsg, $expand = array())
{
    global $action;
    $wshError = new Dcp\WSHMailError($action, $errMsg);
    $wshError->prefix = sprintf('%s %s ', date('c') , php_uname('n'));
    $wshError->addExpand($expand);
    $wshError->autosend();
}
/**
 * Handle exceptions by logging errors or by sending mails
 * depending if the program is used in a CLI or not.
 *
 * @param Throwable $e
 * @param bool $callStack If set to false: the error message is minimal.
 * Otherwise the error message is the call stack.
 */
function _wsh_exception_handler($e, $callStack = true)
{
    if ($callStack === true) {
        $errMsg = \Dcp\Core\LogException::formatErrorLogException($e);
        error_log($errMsg);
    } else {
        $errMsg = $e->getMessage();
    }
    
    if (!isInteractiveCLI()) {
        $expand = array(
            'm' => preg_replace('/^([^\n]*).*/s', '\1', $e->getMessage())
        );
        _wsh_send_error($errMsg, $expand);
    }
    
    exit(255);
}

function _wsh_shutdown_handler()
{
    global $argv;
    
    $error = error_get_last();
    if ($error === null) {
        /* No error */
        return;
    }
    /* Process error */
    switch ($error["type"]) {
        case E_ERROR:
            $title = "Runtime Error";
            break;

        case E_CORE_ERROR:
            $title = "Startup Error";
            break;

        case E_PARSE:
            $title = "Parse Error";
            break;

        case E_COMPILE_ERROR:
            $title = "Compile Error";
            break;

        case E_RECOVERABLE_ERROR:
            $title = "Recoverable Error";
            break;

        default:
            return;
    }
    
    $pid = getmypid();
    $errMsg = <<<EOF
$pid> Dynacase $title
EOF;
    
    if (php_sapi_name() == 'cli' && is_array($argv)) {
        $errMsg.= sprintf("\n%s> Command line arguments: %s", $pid, join(' ', array_map("escapeshellarg", $argv)));
        $errMsg.= sprintf("\n%s> error_log: %s", $pid, ini_get('error_log'));
        $errMsg.= "\n";
    }
    
    $errMsg.= <<<EOF
$pid> Type:    ${error['type']}
$pid> Message: ${error['message']}
$pid> File:    ${error['file']}
$pid> Line:    ${error['line']}
EOF;
    
    error_log($errMsg);
    if (!isInteractiveCLI()) {
        $expand = array(
            'm' => preg_replace('/^([^\n]*).*/s', '\1', $error['message'])
        );
        _wsh_send_error($errMsg, $expand);
    }
}

function enable_wsh_safetybelts()
{
    set_exception_handler("_wsh_exception_handler");
    register_shutdown_function("_wsh_shutdown_handler");
}
/**
 * @param Throwable $e
 * @deprecated use Dcp\Core\LogException::formatErrorLogException()
 * @return string
 */
function formatErrorLogException($e)
{
    return \Dcp\Core\LogException::formatErrorLogException($e);
}
/**
 * @param Exception|Error  $e
 */
function errorLogException($e)
{
    \Dcp\Core\LogException::writeLog($e);
}

function handleFatalShutdown()
{
    global $action;
    
    $error = error_get_last();
    
    if ($error !== NULL && $action) {
        
        if (in_array($error["type"], array(
            E_ERROR,
            E_PARSE,
            E_COMPILE_ERROR,
            E_CORE_ERROR,
            E_USER_ERROR,
            E_RECOVERABLE_ERROR
        ))) {
            ob_get_clean();
            if (!headers_sent()) {
                header("HTTP/1.1 500 Dynacase Fatal Error");
            }
            
            $displayMsg = \Dcp\Core\LogException::logMessage($error, $errId);
            if ($action) {
                $action->exitError($displayMsg, false, $errId);
            } else {
                print $displayMsg;
            }
            // Fatal error are already logged by PHP
            
        }
    }
}

set_exception_handler('handleActionException');

