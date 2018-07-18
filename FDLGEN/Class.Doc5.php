<?php


namespace {

include_once("FDLGEN/Class.Doc1.php");

class ADoc5 extends ADoc1 {
    // for familly : Recherche

   function __construct () {
      ADoc1::__construct();

     
     
     $this->attr["se_open"]=new MenuAttribute("se_open", "5","Ouvrir",20,"%S%app=FREEDOM&action=FREEDOM_VIEW&dirid=%I%","R","","","SEARCH");    
     
     $this->attr["se_openfolio"]=new MenuAttribute("se_openfolio", "5","Ouvrir comme une chemise",30,"C%S%app=FREEDOM&action=OPENFOLIO&id=%I%","R","","","SEARCH");    
     
     $this->attr["se_setsysrss"]=new MenuAttribute("se_setsysrss", "5","RSS visible/masquée aux utilisateurs",40,"C%S%app=FREEDOM&action=SETSYSRSS&id=%I%","R","","ltarget=_self","SEARCH");    
     
     
     $this->attr["se_crit"]=new FieldSetAttribute("se_crit", "5","Critère","W","N","frame",$this->attr["FIELD_HIDDENS"],"","SEARCH");
     
     
     $this->attr["se_author"]=new NormalAttribute("se_author", "5","Auteur","account","",false,29,"",
                                                "R",false,false,false,
						$this->attr["fr_basic"],"fdl.php","fdlGetAccounts(CT,15,\"\"):se_author,CT","","","N","","","SEARCH");

     
     $this->attr["gui_color"]=new NormalAttribute("gui_color", "5","Couleur intercalaire","color","",false,30,"",
                                                "O",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","SEARCH");

     
     $this->attr["gui_isrss"]=new NormalAttribute("gui_isrss", "5","Utilisable comme flux RSS","enum","",false,32,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"","no|non,yes|oui","","","N","bool","bmenu=no|system=yes","SEARCH");

     
     $this->attr["gui_sysrss"]=new NormalAttribute("gui_sysrss", "5","Flux RSS système","enum","",false,33,"",
                                                "R",false,false,false,
						$this->attr["fr_basic"],"","no|non,yes|oui","","","N","bool","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_memo"]=new NormalAttribute("se_memo", "5","À utiliser dans les menus","enum","",false,40,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"","no|non,yes|oui","","","N","bool","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_key"]=new NormalAttribute("se_key", "5","Mot-clef","text","",false,100,"",
                                                "W",false,false,true,
						$this->attr["se_crit"],"","","","","N","","","SEARCH");

     
     $this->attr["se_latest"]=new NormalAttribute("se_latest", "5","Révision","enum","",false,110,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"","yes|courante,no|toutes les révisions,fixed|dernière révision,allfixed|sans la courante,lastfixed|dernière parmi les révisions effectuées","","","N","","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_case"]=new NormalAttribute("se_case", "5","Mode","enum","",false,120,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"","no|expression sans casse,yes|expression avec casse,full|mot complet","","","N","","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_fam"]=new NormalAttribute("se_fam", "5","Famille","text","",false,130,"%S%&app=FDL&action=FDL_CARD&id=%SE_FAMID%",
                                                "W",false,false,true,
						$this->attr["se_crit"],"fdl.php","lfamilies(D,SE_FAM):SE_FAMID,SE_FAM","","","N","","","SEARCH");

     
     $this->attr["se_famid"]=new NormalAttribute("se_famid", "5","Famille (id)","docid","",false,140,"",
                                                "H",false,false,false,
						$this->attr["se_crit"],"","::getTitle(SE_FAMID):SE_FAM","","","N","","","SEARCH");

     
     $this->attr["se_cfld"]=new NormalAttribute("se_cfld", "5","À partir du dossier","text","",false,150,"%S%&app=FDL&action=FDL_CARD&id=%SE_IDFLD%",
                                                "R",false,false,false,
						$this->attr["se_crit"],"","","","","N","","","SEARCH");

     
     $this->attr["se_idfld"]=new NormalAttribute("se_idfld", "5","Dossier racine","docid","",false,160,"",
                                                "H",false,false,false,
						$this->attr["se_crit"],"","::getTitle(SE_IDFLD):SE_CFLD","","","N","","","SEARCH");

     
     $this->attr["se_trash"]=new NormalAttribute("se_trash", "5","Dans la poubelle","enum","",false,165,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"","no|non,only|seulement,also|aussi","","","N","","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_archive"]=new NormalAttribute("se_archive", "5","Dans l'archive","docid","ARCHIVING",false,166,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"fdl.php","lfamily(D,ARCHIVING,CT,0,arc_status='C'):SE_ARCHIVE,CT","","","N","","","SEARCH");

     
     $this->attr["se_sysfam"]=new NormalAttribute("se_sysfam", "5","Inclure les documents système","enum","",false,170,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"","no|non,yes|oui","","","N","bool","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_sublevel"]=new NormalAttribute("se_sublevel", "5","Profondeur de recherche","int","",false,170,"",
                                                "H",false,false,false,
						$this->attr["se_crit"],"","","","::isInteger(se_sublevel)","N","","","SEARCH");

     
     $this->attr["se_sqlselect"]=new NormalAttribute("se_sqlselect", "5","Requête sql","text","",false,180,"",
                                                "H",false,false,false,
						$this->attr["se_crit"],"","","","","N","","","SEARCH");

     
     $this->attr["se_idcfld"]=new NormalAttribute("se_idcfld", "5","Id dossier père courant","docid","",false,190,"",
                                                "H",false,false,false,
						$this->attr["se_crit"],"","::getTitle(SE_IDCFLD):SE_CCFLD","","","N","","","SEARCH");

     
     $this->attr["se_ccfld"]=new NormalAttribute("se_ccfld", "5","Dossier père courant","text","",false,200,"%S%&app=FDL&action=FDL_CARD&id=%SE_IDCFLD%",
                                                "R",false,false,false,
						$this->attr["se_crit"],"","","","","N","","","SEARCH");

     
     $this->attr["se_orderby"]=new NormalAttribute("se_orderby", "5","Trié par","text","",false,210,"",
                                                "R",false,false,false,
						$this->attr["se_crit"],"","","","","N","","","SEARCH");

     
     $this->attr["se_famonly"]=new NormalAttribute("se_famonly", "5","Sans sous famille","enum","",false,220,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"","no|Avec les sous familles,yes|Sans les sous familles","","","N","","bmenu=no|system=yes","SEARCH");

     
     $this->attr["se_acl"]=new NormalAttribute("se_acl", "5","Document","enum","",true,230,"",
                                                "W",false,false,false,
						$this->attr["se_crit"],"","edit|Modifiable,delete|Supprimable","","","N","","bmenu=no|system=yes|multiple=yes|eformat=hcheck|eunset=yes","SEARCH");

     
     $this->attr["se_static"]=new NormalAttribute("se_static", "5","Requête statique","text","",false,240,"",
                                                "H",false,false,false,
						$this->attr["se_crit"],"","","","","N","","","SEARCH");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"se_author"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"se_memo"=>70,"se_open"=>80,"se_openfolio"=>90,"se_setsysrss"=>100,"se_crit"=>110,"se_key"=>120,"se_latest"=>130,"se_case"=>140,"se_fam"=>150,"se_famid"=>160,"se_cfld"=>170,"se_idfld"=>180,"se_trash"=>190,"se_archive"=>200,"se_sysfam"=>210,"se_sublevel"=>220,"se_sqlselect"=>230,"se_idcfld"=>240,"se_ccfld"=>250,"se_orderby"=>260,"se_famonly"=>270,"se_acl"=>280,"se_static"=>290];
     $this->fromids[5]=5;
     $this->fromname='SEARCH';

    $this->fields["se_author"]="se_author";
    $this->fields["gui_color"]="gui_color";
    $this->fields["gui_isrss"]="gui_isrss";
    $this->fields["gui_sysrss"]="gui_sysrss";
    $this->fields["se_memo"]="se_memo";
    $this->fields["se_key"]="se_key";
    $this->fields["se_latest"]="se_latest";
    $this->fields["se_case"]="se_case";
    $this->fields["se_fam"]="se_fam";
    $this->fields["se_famid"]="se_famid";
    $this->fields["se_cfld"]="se_cfld";
    $this->fields["se_idfld"]="se_idfld";
    $this->fields["se_trash"]="se_trash";
    $this->fields["se_archive"]="se_archive";
    $this->fields["se_sysfam"]="se_sysfam";
    $this->fields["se_sublevel"]="se_sublevel";
    $this->fields["se_sqlselect"]="se_sqlselect";
    $this->fields["se_idcfld"]="se_idcfld";
    $this->fields["se_ccfld"]="se_ccfld";
    $this->fields["se_orderby"]="se_orderby";
    $this->fields["se_famonly"]="se_famonly";
    $this->fields["se_acl"]="se_acl";
    $this->fields["se_static"]="se_static";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Search extends \DocSearch {
   //  family : Recherche

   public $dbtable="doc5";
   public $dbseq="seq_doc5";
   public $sqlcreate = array("create table doc5 (se_author text,gui_color text,gui_isrss text,gui_sysrss text,se_memo text,se_key text,se_latest text,se_case text,se_fam text,se_famid text,se_cfld text,se_idfld text,se_trash text,se_archive text,se_sysfam text,se_sublevel int4,se_sqlselect text,se_idcfld text,se_ccfld text,se_orderby text,se_famonly text,se_acl text,se_static text) inherits (doc1);",
     "create sequence seq_doc5 start 1;",
     "alter TABLE doc5 ADD primary key (id);",
     "select setval('seq_doc5', count(distinct initid)+1, false )  from only doc5;");
   

     public $fromid=5;
     public $fromname='SEARCH';
     public $fromtitle="Recherche";
     const familyName='SEARCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc5();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("SE_FAM", "::getTitle(SE_FAMID):SE_FAM");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("SE_CFLD", "::getTitle(SE_IDFLD):SE_CFLD");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("SE_CCFLD", "::getTitle(SE_IDCFLD):SE_CCFLD");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Search','_Search');
    class_alias('\Dcp\Family\Search' , 'Doc5');
}

