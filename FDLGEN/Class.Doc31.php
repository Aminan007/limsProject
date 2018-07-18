<?php


namespace {

include_once("FDLGEN/Class.Doc5.php");

class ADoc31 extends ADoc5 {
    // for familly : Recherche groupée

   function __construct () {
      ADoc5::__construct();

     
     
     
     $this->attr["se_crit"]=new FieldSetAttribute("se_crit", "31","Critère","H","N","frame",$this->attr["FIELD_HIDDENS"],"","MSEARCH");
     
     $this->attr["se_fr_searches"]=new FieldSetAttribute("se_fr_searches", "31","Les recherches","W","N","frame",$this->attr["FIELD_HIDDENS"],"","MSEARCH");
     
     
     $this->attr["seg_t_cond"]=new NormalAttribute("seg_t_cond", "31","Ensemble de recherche","array","",false,110,"",
                                                "W",false,false,false,
						$this->attr["se_fr_searches"],"","","","","N","","","MSEARCH");

     
     $this->attr["seg_idcond"]=new NormalAttribute("seg_idcond", "31","Recherche","docid","SEG_IDCOND",true,120,"",
                                                "W",false,false,false,
						$this->attr["seg_t_cond"],"fdl.php","lsearches(D,CT):SEG_IDCOND,CT","","","N","","doctitle=seg_cond","MSEARCH");

     
     $this->attr["seg_cond"]=new NormalAttribute("seg_cond", "31","Recherche (titre)","text","",true,121,"",
                                                "H",false,false,false,
						$this->attr["seg_t_cond"],"","::getLastTitle(seg_idcond,' )","","","A","","autotitle=yes|relativeOrder=seg_idcond","MSEARCH");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"se_author"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"se_memo"=>70,"se_open"=>80,"se_openfolio"=>90,"se_setsysrss"=>100,"se_crit"=>110,"se_key"=>120,"se_latest"=>130,"se_case"=>140,"se_fam"=>150,"se_famid"=>160,"se_cfld"=>170,"se_idfld"=>180,"se_trash"=>190,"se_archive"=>200,"se_sublevel"=>210,"se_sysfam"=>220,"se_sqlselect"=>230,"se_idcfld"=>240,"se_ccfld"=>250,"se_orderby"=>260,"se_famonly"=>270,"se_acl"=>280,"se_static"=>290,"se_fr_searches"=>300,"seg_t_cond"=>310,"seg_idcond"=>320,"seg_cond"=>330];
     $this->fromids[31]=31;
     $this->fromname='MSEARCH';

    $this->fields["seg_idcond"]="seg_idcond";
    $this->fields["seg_cond"]="seg_cond";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Msearch extends \Dcp\Core\GroupedSearch {
   //  family : Recherche groupée

   public $dbtable="doc31";
   public $dbseq="seq_doc31";
   public $sqlcreate = array("create table doc31 (seg_idcond text,seg_cond text) inherits (doc5);",
     "create sequence seq_doc31 start 1;",
     "alter TABLE doc31 ADD primary key (id);",
     "select setval('seq_doc31', count(distinct initid)+1, false )  from only doc31;");
   

     public $fromid=31;
     public $fromname='MSEARCH';
     public $fromtitle="Recherche groupée";
     const familyName='MSEARCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc31();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("seg_cond", "::getLastTitle(seg_idcond,' )");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Msearch','_Msearch');
    class_alias('\Dcp\Family\Msearch' , 'Doc31');
}

