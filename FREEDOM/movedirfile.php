<?php
/*
 * @author Anakeen
 * @package FDL
*/
/**
 * Generated Header (not documented yet)
 *
 * @author Anakeen
 * @version $Id: movedirfile.php,v 1.12 2008/03/14 13:58:03 eric Exp $
 * @package FDL
 * @subpackage GED
 */
/**
 */

include_once ("FDL/Lib.Dir.php");
include_once ("FDL/freedom_util.php");
// -----------------------------------
function movedirfile(Action & $action)
{
    // -----------------------------------
    // Get all the params
    $todirid = GetHttpVars("todirid");
    $fromdirid = GetHttpVars("fromdirid");
    $docid = GetHttpVars("docid");
    $return = GetHttpVars("return"); // return action may be folio
    $dbaccess = $action->dbaccess;
    
    $doc = new_Doc($dbaccess, $docid);
    // add before suppress
    
    /**
     * @var Dir $dir
     */
    $dir = new_Doc($dbaccess, $todirid);
    if ($dir->locked == - 1) { // it is revised document
        $ldocid = $dir->getLatestId();
        if ($ldocid != $dir->id) $dir = new_Doc($dbaccess, $ldocid);
    }
    $err = $dir->AddFile($docid);
    if ($err != "") $action->exitError($err);
    
    $action->AddLogMsg(sprintf(_("%s has been added in %s folder") , $doc->title, $dir->title));
    
    $dir2 = new_Doc($dbaccess, $fromdirid);
    if ($dir2->locked == - 1) { // it is revised document
        $ldocid = $dir2->getLatestId();
        if ($ldocid != $dir2->id) $dir2 = new_Doc($dbaccess, $ldocid);
    }
    
    if (method_exists($dir2, "DelFile")) {
        $err = $dir2->DelFile($docid);
        if ($err != "") $action->exitError($err);
        
        $action->AddLogMsg(sprintf(_("%s has been removed in %s folder") , $doc->title, $dir2->title));
    }
    if (($doc->prelid == 0) && ($err == "")) { // because deletion id done after add
        $doc->prelid = $dir->initid;
        $doc->modify(true, array(
            "prelid"
        ) , true);
    }
    
    if ($return == "folio") redirect($action, GetHttpVars("app") , "FOLIOLIST&dirid=$todirid");
    else redirect($action, GetHttpVars("app") , "FREEDOM_VIEW&dirid=$todirid");
}
