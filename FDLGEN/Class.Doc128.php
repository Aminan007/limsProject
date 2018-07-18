<?php


namespace {



class ADoc128 extends ADoc {
    // for familly : utilisateur

   function __construct () {
      ADoc::__construct();

     
     
     $this->attr["us_menuresetlogfails"]=new MenuAttribute("us_menuresetlogfails", "128","Réinitialiser échecs de connexion",10,"%S%app=FDL&action=FDL_METHOD&method=resetLoginFailure&id=%I%","W","::menuResetLoginFailure()","ltarget=_self|submenu=Compte","IUSER");    
     
     $this->attr["us_activateaccount"]=new MenuAttribute("us_activateaccount", "128","Activer le compte",20,"%S%app=FDL&action=FDL_METHOD&method=activateAccount&id=%I%","W","::menuActivateAccount()","ltarget=_self|submenu=Compte","IUSER");    
     
     $this->attr["us_desactivateaccount"]=new MenuAttribute("us_desactivateaccount", "128","Désactiver le compte",30,"%S%app=FDL&action=FDL_METHOD&method=deactivateAccount&id=%I%","W","::menuDeactivateAccount()","ltarget=_self|submenu=Compte","IUSER");    
     
     $this->attr["us_inituser"]=new MenuAttribute("us_inituser", "128","Actualiser les utilisateurs",40,"%S%&app=FUSERS&action=FUSERS_IUSER","W","::canExecute(FUSERS,FUSERS_IUSER)","global=yes|onlyglobal=yes|lconfirm=yes","IUSER");    
     
     
     $this->attr["us_fr_privacy"]=new FieldSetAttribute("us_fr_privacy", "128","confidentialité","H","N","frame",$this->attr["FIELD_HIDDENS"],"","IUSER");
     
     $this->attr["us_fr_default"]=new FieldSetAttribute("us_fr_default", "128","Paramètre","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","IUSER");
     
     $this->attr["us_tab_system"]=new FieldSetAttribute("us_tab_system", "128","Système","W","N","tab",$this->attr["FIELD_HIDDENS"],"","IUSER");
     
     $this->attr["us_fr_intranet"]=new FieldSetAttribute("us_fr_intranet", "128","Identification intranet","R","N","frame",$this->attr["us_tab_system"],"","IUSER");
     
     $this->attr["us_fr_substitute"]=new FieldSetAttribute("us_fr_substitute", "128","Suppléants","R","N","frame",$this->attr["us_tab_system"],"","IUSER");
     
     $this->attr["us_fr_userchange"]=new FieldSetAttribute("us_fr_userchange", "128","Mot de passe","W","N","frame",$this->attr["us_tab_system"],"","IUSER");
     
     $this->attr["us_fr_security"]=new FieldSetAttribute("us_fr_security", "128","Sécurité","R","N","frame",$this->attr["us_tab_system"],"","IUSER");
     
     $this->attr["us_fr_ident"]=new FieldSetAttribute("us_fr_ident", "128","État civil","W","N","frame",$this->attr["FIELD_HIDDENS"],"","IUSER");
     
     
     $this->attr["us_defaultgroup"]=new NormalAttribute("us_defaultgroup", "128","Groupe par défaut","account","",false,20,"",
                                                "W",false,false,false,
						$this->attr["us_fr_default"],"fdl.php","fdlGetAccounts(CT,15,\"match=group\"):us_defaultgroup,CT","","","Q","","match=group","IUSER");

     
     $this->attr["us_lname"]=new NormalAttribute("us_lname", "128","nom","text","",false,30,"",
                                                "W",true,true,false,
						$this->attr["us_fr_ident"],"","","","","N","","","IUSER");

     
     $this->attr["us_fname"]=new NormalAttribute("us_fname", "128","prénom","text","",false,35,"",
                                                "W",true,true,false,
						$this->attr["us_fr_ident"],"","","","","N","","","IUSER");

     
     $this->attr["us_mail"]=new NormalAttribute("us_mail", "128","mail","text","",false,40,"mailto:%US_MAIL%",
                                                "R",false,false,true,
						$this->attr["us_fr_ident"],"","","","","N","","","IUSER");

     
     $this->attr["us_extmail"]=new NormalAttribute("us_extmail", "128","mail principal","text","",false,45,"",
                                                "O",false,false,false,
						$this->attr["us_fr_ident"],"","","","::parseMail(US_EXTMAIL)","N","","esize=30","IUSER");

     
     $this->attr["us_meid"]=new NormalAttribute("us_meid", "128","utilisateur id","account","",false,100020,"",
                                                "H",false,false,false,
						$this->attr["us_fr_intranet"],"fdl.php","fdlGetAccounts(CT,15,\"\"):us_meid,CT","","","N","","","IUSER");

     
     $this->attr["us_login"]=new NormalAttribute("us_login", "128","login","text","",false,100030,"",
                                                "R",true,false,false,
						$this->attr["us_fr_intranet"],"","","","::ConstraintLogin(US_LOGIN)","N","","elabel=saisissez '-' pour indiquer qu'il n'y a pas de login|esize=20","IUSER");

     
     $this->attr["us_whatid"]=new NormalAttribute("us_whatid", "128","identifiant","text","",false,100040,"",
                                                "R",false,false,false,
						$this->attr["us_fr_intranet"],"","","","","N","","esize=4","IUSER");

     
     $this->attr["us_t_roles"]=new NormalAttribute("us_t_roles", "128","Rôles","array","",false,100050,"",
                                                "R",false,false,false,
						$this->attr["us_fr_intranet"],"","","","","N","","showempty=Aucun rôle","IUSER");

     
     $this->attr["us_roles"]=new NormalAttribute("us_roles", "128","Rôle","account","",true,100060,"",
                                                "W",false,false,false,
						$this->attr["us_t_roles"],"fdl.php","fdlGetAccounts(CT,15,\"creation={autoclose:\\\"yes\\\"}|match=role\"):us_roles,CT","","","N","","creation={autoclose:\"yes\"}|match=role","IUSER");

     
     $this->attr["us_rolesorigin"]=new NormalAttribute("us_rolesorigin", "128","Origine","enum","",true,100070,"",
                                                "R",false,false,false,
						$this->attr["us_t_roles"],"","internal|Affectation directe,group|Obtenu par","","","N","","eformat=bool|system=yes|bmenu=no","IUSER");

     
     $this->attr["us_rolegorigin"]=new NormalAttribute("us_rolegorigin", "128","Groupe","account","",true,100080,"",
                                                "R",false,false,false,
						$this->attr["us_t_roles"],"fdl.php","fdlGetAccounts(CT,15,\"multiple=yes|match=group\"):us_rolegorigin,CT","","","N","","multiple=yes|match=group","IUSER");

     
     $this->attr["us_groups"]=new NormalAttribute("us_groups", "128","groupes d'appartenance","array","",false,100090,"",
                                                "R",false,false,false,
						$this->attr["us_fr_intranet"],"","","","","N","","showempty=Aucun groupe","IUSER");

     
     $this->attr["us_group"]=new NormalAttribute("us_group", "128","Groupe (titre)","text","",true,100111,"",
                                                "H",false,false,false,
						$this->attr["us_groups"],"","::getLastTitle(us_idgroup,' )","","","A","","autotitle=yes|relativeOrder=us_idgroup","IUSER");

     
     $this->attr["us_idgroup"]=new NormalAttribute("us_idgroup", "128","Groupe","account","",true,100110,"",
                                                "W",false,false,false,
						$this->attr["us_groups"],"fdl.php","fdlGetAccounts(CT,15,\"isuser=yes|doctitle=us_group|match=group\"):us_idgroup,CT","","","N","","isuser=yes|doctitle=us_group|match=group","IUSER");

     
     $this->attr["us_expires"]=new NormalAttribute("us_expires", "128","date d'expiration epoch","int","",false,100120,"",
                                                "H",false,false,false,
						$this->attr["us_fr_intranet"],"","","","::isInteger(us_expires)","N","","","IUSER");

     
     $this->attr["us_daydelay"]=new NormalAttribute("us_daydelay", "128","délai d'expiration en jours","int","",false,100130,"",
                                                "H",false,false,false,
						$this->attr["us_fr_intranet"],"","","","::isInteger(us_daydelay)","N","","elabel=mettre -1 pour annuler l'expiration|esize=3","IUSER");

     
     $this->attr["us_expiresd"]=new NormalAttribute("us_expiresd", "128","date d'expiration","date","",false,100140,"",
                                                "H",false,false,false,
						$this->attr["us_fr_intranet"],"","","","::ConstraintExpires(US_EXPIRESD,US_EXPIREST,US_DAYDELAY)","N","","","IUSER");

     
     $this->attr["us_expirest"]=new NormalAttribute("us_expirest", "128","heure d'expiration","time","",false,100150,"",
                                                "H",false,false,false,
						$this->attr["us_fr_intranet"],"","","","","N","","","IUSER");

     
     $this->attr["us_passdelay"]=new NormalAttribute("us_passdelay", "128","délai d'expiration epoch","int","",false,100160,"",
                                                "H",false,false,false,
						$this->attr["us_fr_intranet"],"","","","::isInteger(us_passdelay)","N","","","IUSER");

     
     $this->attr["us_ldapdn"]=new NormalAttribute("us_ldapdn", "128","login LDAP","text","",false,100170,"",
                                                "R",false,false,false,
						$this->attr["us_fr_intranet"],"","","","","N","","","IUSER");

     
     $this->attr["us_substitute"]=new NormalAttribute("us_substitute", "128","Suppléant","account","",false,100190,"",
                                                "W",false,false,false,
						$this->attr["us_fr_substitute"],"fdl.php","fdlGetAccounts(CT,15,\"\"):us_substitute,CT","","","N","","","IUSER");

     
     $this->attr["us_incumbents"]=new NormalAttribute("us_incumbents", "128","Titulaires","account","",true,100200,"",
                                                "R",false,false,false,
						$this->attr["us_fr_substitute"],"fdl.php","fdlGetAccounts(CT,15,\"multiple=yes\"):us_incumbents,CT","","","N","","multiple=yes","IUSER");

     
     $this->attr["us_passwd1"]=new NormalAttribute("us_passwd1", "128","nouveau mot de passe","password","",false,100220,"",
                                                "O",false,false,false,
						$this->attr["us_fr_userchange"],"","","","::testForcePassword(US_PASSWD1)","N","","esize=10","IUSER");

     
     $this->attr["us_passwd2"]=new NormalAttribute("us_passwd2", "128","confirmation mot de passe","password","",false,100230,"",
                                                "O",false,false,false,
						$this->attr["us_fr_userchange"],"","","","::ConstraintPassword(US_PASSWD1,US_PASSWD2,US_LOGIN)","N","","esize=10","IUSER");

     
     $this->attr["us_status"]=new NormalAttribute("us_status", "128","état du compte","enum","",false,100305,"",
                                                "R",false,false,false,
						$this->attr["us_fr_security"],"","A|activé,D|désactivé","","","N","","system=yes","IUSER");

     
     $this->attr["us_loginfailure"]=new NormalAttribute("us_loginfailure", "128","échecs de connexion","int","",false,100310,"",
                                                "R",false,false,false,
						$this->attr["us_fr_security"],"","","","::isInteger(us_loginfailure)","N","","","IUSER");

     
     $this->attr["us_accexpiredate"]=new NormalAttribute("us_accexpiredate", "128","Date d'expiration du compte","date","",false,100320,"",
                                                "R",false,false,false,
						$this->attr["us_fr_security"],"","","","","N","","","IUSER");

     
		
	 $this->absoluteOrders=["us_fr_privacy"=>10,"us_menuresetlogfails"=>20,"us_fr_default"=>30,"us_defaultgroup"=>40,"us_activateaccount"=>50,"us_fr_ident"=>60,"us_lname"=>70,"us_fname"=>80,"us_mail"=>90,"us_extmail"=>100,"us_desactivateaccount"=>110,"us_inituser"=>120,"us_tab_system"=>130,"us_fr_intranet"=>140,"us_meid"=>150,"us_login"=>160,"us_whatid"=>170,"us_t_roles"=>180,"us_roles"=>190,"us_rolesorigin"=>200,"us_rolegorigin"=>210,"us_groups"=>220,"us_idgroup"=>230,"us_group"=>240,"us_expires"=>250,"us_daydelay"=>260,"us_expiresd"=>270,"us_expirest"=>280,"us_passdelay"=>290,"us_ldapdn"=>300,"us_fr_substitute"=>310,"us_substitute"=>320,"us_incumbents"=>330,"us_fr_userchange"=>340,"us_passwd1"=>350,"us_passwd2"=>360,"us_fr_security"=>370,"us_status"=>380,"us_loginfailure"=>390,"us_accexpiredate"=>400];
     $this->fromids[128]=128;
     $this->fromname='IUSER';

    $this->fields["us_lname"]="us_lname";
    $this->fields["us_fname"]="us_fname";
    $this->fields["us_mail"]="us_mail";
    $this->fields["us_extmail"]="us_extmail";
    $this->fields["us_meid"]="us_meid";
    $this->fields["us_login"]="us_login";
    $this->fields["us_whatid"]="us_whatid";
    $this->fields["us_roles"]="us_roles";
    $this->fields["us_rolesorigin"]="us_rolesorigin";
    $this->fields["us_rolegorigin"]="us_rolegorigin";
    $this->fields["us_group"]="us_group";
    $this->fields["us_idgroup"]="us_idgroup";
    $this->fields["us_expires"]="us_expires";
    $this->fields["us_daydelay"]="us_daydelay";
    $this->fields["us_expiresd"]="us_expiresd";
    $this->fields["us_expirest"]="us_expirest";
    $this->fields["us_passdelay"]="us_passdelay";
    $this->fields["us_ldapdn"]="us_ldapdn";
    $this->fields["us_substitute"]="us_substitute";
    $this->fields["us_incumbents"]="us_incumbents";
    $this->fields["us_passwd1"]="us_passwd1";
    $this->fields["us_passwd2"]="us_passwd2";
    $this->fields["us_status"]="us_status";
    $this->fields["us_loginfailure"]="us_loginfailure";
    $this->fields["us_accexpiredate"]="us_accexpiredate";
   }
}


        }

namespace {

        


class _Method_IUSER extends \Dcp\Core\UserAccount {
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
class Iuser extends \_Method_IUSER {
   //  family : utilisateur

   public $dbtable="doc128";
   public $dbseq="seq_doc128";
   public $sqlcreate = array("create table doc128 (us_lname text,us_fname text,us_mail text,us_extmail text,us_meid text,us_login text,us_whatid text,us_roles text,us_rolesorigin text,us_rolegorigin text,us_group text,us_idgroup text,us_expires int4,us_daydelay int4,us_expiresd date,us_expirest time,us_passdelay int4,us_ldapdn text,us_substitute text,us_incumbents text,us_passwd1 text,us_passwd2 text,us_status text,us_loginfailure int4,us_accexpiredate date) inherits (doc);",
     "create sequence seq_doc128 start 1;",
     "alter TABLE doc128 ADD primary key (id);",
     "select setval('seq_doc128', count(distinct initid)+1, false )  from only doc128;");
   

     public $fromid=128;
     public $fromname='IUSER';
     public $fromtitle="utilisateur";
     const familyName='IUSER';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc128();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("us_group", "::getTitle(US_IDGROUP)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("us_group", "::getLastTitle(us_idgroup,' )");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Iuser','_Iuser');
    class_alias('\Dcp\Family\Iuser' , 'Doc128');
}

