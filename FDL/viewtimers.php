<?php
/*
 * @author Anakeen
 * @package FDL
*/
/**
 * View Attached timer
 *
 * @author Anakeen
 * @version $Id: viewtimers.php,v 1.4 2009/01/02 17:43:50 eric Exp $
 * @package FDL
 * @subpackage
 */
/**
 */

include_once ("FDL/Class.Doc.php");
/**
 * View timers attached to a document
 * @param Action &$action current action
 * @global id int Http var : document identifier to see
 */
function viewtimers(Action & $action)
{
    $docid = getHttpVars("id");
    $szone = (getHttpVars("szone") == "Y");
    $dbaccess = $action->dbaccess;
    $action->parent->AddJsRef($action->GetParam("CORE_JSURL") . "/resizeimg.js");
    $doc = new_Doc($dbaccess, $docid, true);
    if (!$doc->isAlive()) {
        $action->exitError(sprintf(_("document not alive %s") , $docid));
    }
    $err = $doc->control('view');
    if ($err) $action->exitError($err);
    $prev = array();
    $timers = $doc->getAttachedTimers();
    foreach ($timers as $k => $v) {
        /**
         * @var \Dcp\Core\Timer $timer
         */
        $timer = new_doc($dbaccess, $v["timerid"]);
        if ($timer->isAlive()) {
            $iprev = $timer->getPrevisions($v["attachdate"], $v["tododate"], $v["level"]);
            foreach ($iprev as $pk => $pv) {
                $iprev[$pk]["timerid"] = $timer->id;
                $iprev[$pk]["timertitle"] = $timer->getHTMLTitle();
            }
            $prev = array_merge($prev, $iprev);
        }
    }
    
    foreach ($prev as $k => $v) {
        $prev[$k]["tmaila"] = "";
        $prev[$k]["state"] = "";
        $prev[$k]["method"] = "";
        if ($v["actions"]["state"]) $prev[$k]["state"] = htmlspecialchars(_($v["actions"]["state"]) , ENT_QUOTES);
        else $prev[$k]["state"] = false;
        if ($v["actions"]["tmail"]) {
            $prev[$k]["tmail"] = true;
            $prev[$k]["tmaila"] = $timer->getHtmlValue($timer->getAttribute("tm_tmail") , $v["actions"]["tmail"]);
        } else $prev[$k]["tmail"] = false;
        if ($v["actions"]["method"]) $prev[$k]["method"] = htmlspecialchars(($v["actions"]["method"]) , ENT_QUOTES);
        else $prev[$k]["method"] = false;
        $prev[$k]["hdelay"] = htmlspecialchars(humandelay($v["execdelay"]) , ENT_QUOTES);
        $prev[$k]["oddoreven"] = htmlspecialchars((($k % 2 == 0) ? "even" : "odd") , ENT_QUOTES);
    }
    
    usort($prev, "sortprevision");
    $action->lay->setBlockData("PREV", $prev);
    $action->lay->rSet("docid", $doc->id);
    $action->lay->eSet("iconsrc", $doc->getIcon());
    $action->lay->eSet("doctitle", $doc->getTitle());
    $action->lay->rSet("szone", $szone);
}

function sortprevision($a, $b)
{
    if ($a["execdelay"] > $b["execdelay"]) return 1;
    elseif ($a["execdelay"] < $b["execdelay"]) return -1;
    return 0;
}

function humandelay($dd)
{
    $s = "";
    if ($dd > 1) {
        $j = intval($dd);
        if ($j > 1) $s.= sprintf(_("%d days") , $j);
        else $s.= sprintf(_("%d day") , $j);
        $s.= " ";
        $dd = $dd - $j;
    }
    $dd = $dd * 24;
    
    if ($dd > 1) {
        $j = intval($dd);
        if ($j > 1) $s.= sprintf(_("%d hours") , $j);
        else $s.= sprintf(_("%d hour") , $j);
        $s.= " ";
        $dd = $dd - $j;
    }
    $dd = $dd * 60;
    if ($dd > 1) {
        $j = intval($dd);
        if ($j > 1) $s.= sprintf(_("%d minutes") , $j);
        else $s.= sprintf(_("%d minute") , $j);
        $s.= " ";
        $dd = $dd - $j;
    }
    return $s;
}
