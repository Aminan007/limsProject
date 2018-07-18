<?php


namespace {

include_once("FDLGEN/Class.Doc129.php");

class ADoc127 extends ADoc129 {
    // for familly : Groupe d'utilisateurs

   function __construct () {
      ADoc129::__construct();

     
     
     $this->attr["grp_choosegroup"]=new MenuAttribute("grp_choosegroup", "127","Modifier la hiérarchie",10,"%S%app=FDL&action=OPENDOC&zone=USERCARD:CHOOSEGROUP&id=%ID%","R","::canEditMenu()","","IGROUP");    
     
     
     $this->attr["grp_fr_intranet"]=new FieldSetAttribute("grp_fr_intranet", "127","Système","W","N","frame",$this->attr["FIELD_HIDDENS"],"","IGROUP");
     
     
     $this->attr["us_login"]=new NormalAttribute("us_login", "127","identifiant","text","",false,200,"",
                                                "W",true,false,false,
						$this->attr["grp_fr_intranet"],"","","","::ConstraintLogin(US_LOGIN)","N","","esize=20","IGROUP");

     
     $this->attr["us_whatid"]=new NormalAttribute("us_whatid", "127","identifiant système","int","",false,210,"",
                                                "R",false,false,false,
						$this->attr["grp_fr_intranet"],"","","","::isInteger(us_whatid)","N","","","IGROUP");

     
     $this->attr["us_meid"]=new NormalAttribute("us_meid", "127","groupe id","account","",false,220,"",
                                                "H",false,false,false,
						$this->attr["grp_fr_intranet"],"fdl.php","fdlGetAccounts(CT,15,\"\"):us_meid,CT","","","N","","","IGROUP");

     
     $this->attr["grp_roles"]=new NormalAttribute("grp_roles", "127","Rôles associés","docid","ROLE",true,310,"",
                                                "W",false,false,false,
						$this->attr["grp_fr_intranet"],"","","","","N","","creation={autoclose:\"yes\"}|multiple=yes|showempty=Aucun rôle","IGROUP");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"grp_adduser"=>30,"grp_refresh"=>40,"grp_choosegroup"=>50,"fld_open"=>60,"fld_copybasket"=>70,"fld_openfolio"=>80,"fld_insertdoc"=>90,"fld_setsysrss"=>100,"grp_fr_ident"=>110,"grp_name"=>120,"grp_mail"=>130,"grp_hasmail"=>140,"grp_fr_intranet"=>150,"us_login"=>160,"us_whatid"=>170,"us_meid"=>180,"grp_roles"=>190,"grp_fr"=>200,"grp_idgroup"=>210,"grp_idpgroup"=>220,"grp_isrefreshed"=>230,"fld_fr_rest"=>240,"fld_fr_prof"=>250,"ba_desc"=>260,"gui_color"=>270,"gui_isrss"=>280,"gui_sysrss"=>290,"fld_allbut"=>300,"fld_tfam"=>310,"fld_pdoc"=>320,"fld_pdocid"=>330,"fld_pdir"=>340,"fld_pdirid"=>350,"fld_fam"=>360,"fld_famids"=>370,"fld_subfam"=>380];
     $this->fromids[127]=127;
     $this->fromname='IGROUP';

    $this->fields["us_login"]="us_login";
    $this->fields["us_whatid"]="us_whatid";
    $this->fields["us_meid"]="us_meid";
    $this->fields["grp_roles"]="grp_roles";
   }
}


        }

namespace {

        


class _Method_IGROUP extends \Dcp\Core\GroupAccount {
   /*
 * @author Anakeen
 * @package FDL
*/
/**
 * Intranet User & Group  manipulation
 *
 * @author Anakeen
 * @version $Id: Method.DocIntranet.php,v 1.23 2008/04/15 07:11:04 eric Exp $
 * @package FDL
 * @subpackage USERCARD
 */
/**
 */

    /**
     * @var Account
     */
    public $wuser;
    /**
     * verify if the login syntax is correct and if the login not already exist
     * @param string $login login to test
     * @return array 2 items $err & $sug for view result of the constraint
     */
    function ConstraintLogin($login)
    {
        $sug = array(
            "-"
        );
        $err = '';
        if ($login == "") {
            $err = _("the login must not be empty");
        } else if ($login == "-") {
        } else if ($login == "-") {
        } else {
            if ($err == "") {
                return $this->ExistsLogin($login);
            }
        }
        return array(
            "err" => $err,
            "sug" => $sug
        );
    }
    /**
     * verify if the login not already exist
     * @param string $login login to test
     * @return array 2 items $err & $sug for view result of the constraint
     */
    function ExistsLogin($login, $unused = 0)
    {
        $sug = array();
        
        $id = $this->getRawValue("US_WHATID");
        
        $q = new QueryDb("", "Account");
        $q->AddQuery(sprintf("login='%s'", pg_escape_string(mb_strtolower($login))));
        if ($id) $q->AddQuery(sprintf("id != %d", $id));
        $q->Query(0, 0, "TABLE");
        $err = $q->basic_elem->msg_err;
        if (($err == "") && ($q->nb > 0)) $err = _("login yet use");
        
        return array(
            "err" => $err,
            "sug" => $sug
        );
    }
    
    function preCreated()
    {
        if ($this->getRawValue("US_WHATID") != "") {
            include_once ('FDL/Lib.Dir.php');
            
            $filter = array(
                "us_whatid = '" . intval($this->getRawValue("US_WHATID")) . "'"
            );
            $tdoc = internalGetDocCollection($this->dbaccess, 0, 0, "ALL", $filter, 1, "TABLE", $this->fromid);
            if (count($tdoc) > 0) return _("system id already set in database\nThis kind of document can not be duplicated");
        }
        return '';
    }
    /**
     * avoid deletion of system document
     */
    function preDocDelete()
    {
        $err = parent::preDocDelete();
        if ($err == "") {
            $uid = $this->getRawValue("us_whatid");
            if (($uid > 0) && ($uid < 10)) $err = _("this system user cannot be deleted");
        }
        return $err;
    }
    /**
     * get system id account from document id account
     * @param array $accountIds
     * @return array
     */
    public function getSystemIds(array $accountIds)
    {
        $accountIds = array_unique($accountIds);
        $kr = array_search('', $accountIds);
        if ($kr !== false) unset($accountIds[$kr]);
        $sysIds = array();
        if (count($accountIds) > 0) {
            $sql = sprintf("select id from users where fid in (%s)", implode(',', $accountIds));
            simpleQuery($this->dbaccess, $sql, $sysIds, true, false);
            $sysIds = array_unique($sysIds);
        }
        return $sysIds;
    }
    /**
     * interface to affect group for an user
     * @templateController interface to view group tree and select group
     * @param string $target window target name for hyperlink destination
     * @param bool $ulink if false hyperlink are not generated
     * @param bool $abstract if true only abstract attribute are generated
     */
    function ChooseGroup($target = "_self", $ulink = true, $abstract = false)
    {
        global $action;
        
        $action->parent->AddJsRef($action->GetParam("CORE_PUBURL") . "/FDL/Layout/mktree.js");
        $action->parent->addCssRef($action->GetParam("CORE_PUBURL") . "/USERCARD/Layout/choosegroup.css");
        
        $err = '';
        $iduser = $this->getRawValue("US_WHATID");
        if ($iduser > 0) {
            $user = $this->getAccount();
            if (!$user->isAffected()) {
                return sprintf(_("user #%d does not exist") , $iduser);
            }
            $ugroup = $user->GetGroupsId();
        } else {
            $ugroup = array(
                "2"
            ); // default what group
            
        }
        
        $tgroup = array();
        
        $this->lay->set("wid", ($iduser == "") ? "0" : $iduser);
        
        $q2 = new queryDb("", "Account");
        $groups = $q2->Query(0, 0, "TABLE", "select users.*, groups.idgroup from users, groups where users.id = groups.iduser and users.accounttype='G'");
        
        $q2 = new queryDb("", "Account");
        $mgroups = $q2->Query(0, 0, "TABLE", "select users.* from users where accounttype='G' and id not in (select iduser from groups, users u where groups.idgroup = u.id and u.accounttype='G')");
        
        if ($groups) {
            foreach ($groups as $k => $v) {
                $v["login"] = htmlspecialchars($v["login"]);
                $v["firstname"] = htmlspecialchars($v["firstname"]);
                $v["lastname"] = htmlspecialchars($v["lastname"]);
                $groupuniq[$v["id"]] = $v;
                
                if (in_array($v["id"], $ugroup)) {
                    $groupuniq[$v["id"]]["checkbox"] = "checked";
                } else {
                    $groupuniq[$v["id"]]["checkbox"] = "";
                }
            }
        } else {
            $groups = array();
        }
        
        $iconGroup = $this->getIcon('', 14);
        
        if ($mgroups) {
            foreach ($mgroups as $k => $v) {
                $v["login"] = htmlspecialchars($v["login"]);
                $v["firstname"] = htmlspecialchars($v["firstname"]);
                $v["lastname"] = htmlspecialchars($v["lastname"]);
                $cgroup = $this->_getChildsGroup($v["id"], $groups);
                $tgroup[$k] = $v;
                $tgroup[$k]["SUBUL"] = $cgroup;
                $fid = $v["fid"];
                if ($fid) {
                    $tdoc = getTDoc($this->dbaccess, $fid);
                    $icon = $this->getIcon($tdoc["icon"], 14);
                    $tgroup[$k]["icon"] = $icon;
                } else {
                    $tgroup[$k]["icon"] = $iconGroup;
                }
                
                $groupuniq[$v["id"]] = $v;
                if (in_array($v["id"], $ugroup)) {
                    $groupuniq[$v["id"]]["checkbox"] = "checked";
                } else {
                    $groupuniq[$v["id"]]["checkbox"] = "";
                }
            }
        }
        $this->lay->setBlockData("LI", $tgroup);
        uasort($groupuniq, array(
            get_class($this) ,
            "_cmpgroup"
        ));
        $this->lay->setBlockData("SELECTGROUP", $groupuniq);
        return $err;
    }
    /**
     * internal function use for choosegroup
     * use to compute displayed group tree
     */
    function _getChildsGroup($id, $groups)
    {
        
        $tlay = array();
        foreach ($groups as $k => $v) {
            if ($v["idgroup"] == $id) {
                $tlay[$k] = $v;
                $tlay[$k]["SUBUL"] = $this->_getChildsGroup($v["id"], $groups);
                $fid = $v["fid"];
                if ($fid) {
                    $tdoc = getTDoc($this->dbaccess, $fid);
                    $icon = $this->getIcon($tdoc["icon"]);
                    $tlay[$k]["icon"] = $icon;
                } else {
                    $tlay[$k]["icon"] = "Images/igroup.gif";
                }
            }
        }
        
        if (count($tlay) == 0) return "";
        global $action;
        $lay = new Layout("USERCARD/Layout/ligroup.xml", $action);
        uasort($tlay, array(
            get_class($this) ,
            "_cmpgroup"
        ));
        $lay->setBlockData("LI", $tlay);
        return $lay->gen();
    }
    /**
     * to sort group by name
     */
    static function _cmpgroup($a, $b)
    {
        return strcasecmp($a['lastname'], $b['lastname']);
    }
    /**
     * affect new groups to the user
     * @global gidnew  string Http var : egual Y to say effectif change (to not suppress group if gid not set)
     * @global gid string Http var : array of new groups id
     */
    function setGroups()
    {
        include_once ("FDL/Lib.Usercard.php");
        
        global $_POST;
        $err = '';
        $gidnew = isset($_POST["gidnew"]) ? $_POST["gidnew"] : '';
        $tgid = array(); // group ids will be modified
        if ($gidnew == "Y") {
            /**
             * @var int[] $gids
             */
            $gids = $_POST["gid"];
            if ($gids == "") $gids = array();
            
            $gAccount = $this->getAccount();
            $rgid = $gAccount->GetGroupsId();
            if ((count($rgid) != count($gids)) || (count(array_diff($rgid, $gids)) != 0)) {
                $gdel = array_diff($rgid, $gids);
                $gadd = array_diff($gids, $rgid);
                // add group
                $g = new Group("", $gAccount->id);
                foreach ($gadd as $gid) {
                    $g->iduser = $gAccount->id;
                    $g->idgroup = $gid;
                    // insert in folder group
                    $gdoc = $this->getDocUser($gid);
                    //  $gdoc->insertMember($this->id);
                    $err.= $gdoc->insertDocument($this->id); // add in group is set here by postInsert
                    $tgid[$gid] = $gid;
                }
                foreach ($gdel as $gid) {
                    $g->iduser = $gid;
                    //$aerr.=$g->SuppressUser($user->id,true);
                    // delete in folder group
                    $gdoc = $this->getDocUser($gid);
                    if (!method_exists($gdoc, "deleteMember")) AddWarningMsg("no group $gid/" . $gdoc->id);
                    else {
                        // $gdoc->deleteMember($this->id);
                        $err = $gdoc->removeDocument($this->id);
                        $tgid[$gid] = $gid;
                    }
                }
                // $g->FreedomCopyGroup();
                //if ($user->isgroup=='Y')  $tgid[$user->id]=$user->id;
                
            }
        }
        // it is now set in bacground
        //  refreshGroups($tgid,true);
        return $err;
    }
    /**
     * return document objet from what id (user or group)
     * @param int $wid what identifier
     * @return \Dcp\Family\Iuser|\Dcp\Family\IGROUP the object document (false if not found)
     */
    function getDocUser($wid)
    {
        $u = new Account("", $wid);
        if ($u->isAffected()) {
            if ($u->fid > 0) {
                $du = new_Doc($this->dbaccess, $u->fid);
                if ($du->isAlive()) return $du;
            }
        }
        return false;
    }
    /**
     * return system account object conform to whatid
     * @param bool $nocache set to true if need to reload user object from database
     * @return Account return false if not found
     */
    function getAccount($nocache = false)
    {
        if ($nocache) {
            $this->wuser=null; // needed for reaffect new values
            
        } elseif ($this->wuser) {
            if ($this->wuser->fid != $this->getRawValue("us_whatid")) {
                $this->wuser=null; // clear cache when reaffect
                
            }
        }
        
        if (!isset($this->wuser)) {
            $wid = $this->getRawValue("us_whatid");
            if ($wid > 0) {
                $this->wuser = new Account("", $wid);
            }
        }
        if (!isset($this->wuser)) return false;
        return $this->wuser;
    }
    /**
     * return what user object conform to whatid
     * @deprecated use getAccount instead
     * @return Account return false if not found
     */
    function getWuser($nocache = false)
    {
        return $this->getAccount($nocache);
    }
    /**
     * reset wuser
     */
    protected function postAffect(array $data, $more, $reset)
    {
        if (isset($this->wuser)) {
            $this->wuser=null;
        }
    }
    

   

}

}

namespace Dcp\Family {
class Igroup extends \_Method_IGROUP {
   //  family : Groupe d'utilisateurs

   public $dbtable="doc127";
   public $dbseq="seq_doc127";
   public $sqlcreate = array("create table doc127 (us_login text,us_whatid int4,us_meid text,grp_roles text) inherits (doc129);",
     "create sequence seq_doc127 start 1;",
     "alter TABLE doc127 ADD primary key (id);",
     "select setval('seq_doc127', count(distinct initid)+1, false )  from only doc127;");
   

     public $fromid=127;
     public $fromname='IGROUP';
     public $fromtitle="Groupe d'utilisateurs";
     const familyName='IGROUP';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc127();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Igroup','_Igroup');
    class_alias('\Dcp\Family\Igroup' , 'Doc127');
}

