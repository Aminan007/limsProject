<?php


namespace {

include_once("FDLGEN/Class.Doc5.php");

class ADoc38 extends ADoc5 {
    // for familly : Recherche spécialisée

   function __construct () {
      ADoc5::__construct();

     
     
     
     $this->attr["se_fr_function"]=new FieldSetAttribute("se_fr_function", "38","Fonction","W","N","frame",$this->attr["FIELD_HIDDENS"],"","SSEARCH");
     
     $this->attr["se_crit"]=new FieldSetAttribute("se_crit", "38","Critère","H","N","frame",$this->attr["FIELD_HIDDENS"],"","SSEARCH");
     
     
     $this->attr["se_phpfile"]=new NormalAttribute("se_phpfile", "38","Fichier PHP","text","",false,300,"",
                                                "W",false,false,false,
						$this->attr["se_fr_function"],"","","","","N","","","SSEARCH");

     
     $this->attr["se_phpfunc"]=new NormalAttribute("se_phpfunc", "38","Fonction PHP","text","",false,310,"",
                                                "W",false,false,false,
						$this->attr["se_fr_function"],"","","","","N","","","SSEARCH");

     
     $this->attr["se_phparg"]=new NormalAttribute("se_phparg", "38","Argument PHP","text","",false,320,"",
                                                "W",false,false,false,
						$this->attr["se_fr_function"],"","","","","N","","","SSEARCH");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"se_author"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"se_memo"=>70,"se_open"=>80,"se_openfolio"=>90,"se_setsysrss"=>100,"se_crit"=>110,"se_key"=>120,"se_latest"=>130,"se_case"=>140,"se_fam"=>150,"se_famid"=>160,"se_cfld"=>170,"se_idfld"=>180,"se_trash"=>190,"se_archive"=>200,"se_sublevel"=>210,"se_sysfam"=>220,"se_sqlselect"=>230,"se_idcfld"=>240,"se_ccfld"=>250,"se_orderby"=>260,"se_famonly"=>270,"se_acl"=>280,"se_static"=>290,"se_fr_function"=>300,"se_phpfile"=>310,"se_phpfunc"=>320,"se_phparg"=>330];
     $this->fromids[38]=38;
     $this->fromname='SSEARCH';

    $this->fields["se_phpfile"]="se_phpfile";
    $this->fields["se_phpfunc"]="se_phpfunc";
    $this->fields["se_phparg"]="se_phparg";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Ssearch extends \Dcp\Core\SpecialSearch {
   //  family : Recherche spécialisée

   public $dbtable="doc38";
   public $dbseq="seq_doc38";
   public $sqlcreate = array("create table doc38 (se_phpfile text,se_phpfunc text,se_phparg text) inherits (doc5);",
     "create sequence seq_doc38 start 1;",
     "alter TABLE doc38 ADD primary key (id);",
     "select setval('seq_doc38', count(distinct initid)+1, false )  from only doc38;");
   

     public $fromid=38;
     public $fromname='SSEARCH';
     public $fromtitle="Recherche spécialisée";
     const familyName='SSEARCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc38();
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
    class_alias('\Dcp\Family\Ssearch','_Ssearch');
    class_alias('\Dcp\Family\Ssearch' , 'Doc38');
}

