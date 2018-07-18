<?php


namespace {

include_once("FDLGEN/Class.Doc5.php");

class ADoc16 extends ADoc5 {
    // for familly : Recherche détaillée

   function __construct () {
      ADoc5::__construct();

     
     
     
     $this->attr["se_fr_detail"]=new FieldSetAttribute("se_fr_detail", "16","Conditions","W","N","frame",$this->attr["FIELD_HIDDENS"],"","DSEARCH");
     
     
     $this->attr["se_ol"]=new NormalAttribute("se_ol", "16","Condition","enum","",false,300,"",
                                                "W",false,false,false,
						$this->attr["se_fr_detail"],"","and|satisfait toutes les conditions,or|satisfait au moins une condition,perso|personnalisée","","","N","","system=yes|bmenu=no","DSEARCH");

     
     $this->attr["se_t_detail"]=new NormalAttribute("se_t_detail", "16","Conditions","array","",false,310,"",
                                                "W",false,false,false,
						$this->attr["se_fr_detail"],"","","","::checkConditions()","N","","","DSEARCH");

     
     $this->attr["se_ols"]=new NormalAttribute("se_ols", "16","Opérateur","enum","",true,320,"",
                                                "W",false,false,false,
						$this->attr["se_t_detail"],"","and|et,or|ou","","","N","","system=yes|bmenu=no","DSEARCH");

     
     $this->attr["se_leftp"]=new NormalAttribute("se_leftp", "16","Parenthèse gauche","enum","",true,330,"",
                                                "W",false,false,false,
						$this->attr["se_t_detail"],"","no| ,yes|(","","","N","","system=yes|bmenu=no","DSEARCH");

     
     $this->attr["se_attrids"]=new NormalAttribute("se_attrids", "16","Attributs","text","",true,340,"",
                                                "W",false,false,false,
						$this->attr["se_t_detail"],"","","","","N","","","DSEARCH");

     
     $this->attr["se_funcs"]=new NormalAttribute("se_funcs", "16","Fonctions","text","",true,350,"",
                                                "W",false,false,false,
						$this->attr["se_t_detail"],"","","","","N","","","DSEARCH");

     
     $this->attr["se_keys"]=new NormalAttribute("se_keys", "16","Mot-clefs","text","",true,360,"",
                                                "W",false,false,false,
						$this->attr["se_t_detail"],"","","","::isValidCondition(SE_ATTRIDS,SE_FUNCS,SE_KEYS)","N","","","DSEARCH");

     
     $this->attr["se_rightp"]=new NormalAttribute("se_rightp", "16","Parenthèse droite","enum","",true,370,"",
                                                "W",false,false,false,
						$this->attr["se_t_detail"],"","no| ,yes|)","","","N","","system=yes|bmenu=no","DSEARCH");

     
     $this->attr["se_t_filters"]=new NormalAttribute("se_t_filters", "16","Filtres","array","",false,380,"",
                                                "R",false,false,false,
						$this->attr["se_fr_detail"],"","","","","N","","empty=yes","DSEARCH");

     
     $this->attr["se_filter"]=new NormalAttribute("se_filter", "16","Filtre","xml","",true,380,"",
                                                "R",false,false,false,
						$this->attr["se_t_filters"],"","","","","N","","","DSEARCH");

     
     $this->attr["se_typefilter"]=new NormalAttribute("se_typefilter", "16","Type","enum","",true,390,"",
                                                "R",false,false,false,
						$this->attr["se_t_filters"],"","specified|Spécifié,generated|Généré","","","N","","system=yes|bmenu=no","DSEARCH");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"se_author"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"se_memo"=>70,"se_open"=>80,"se_openfolio"=>90,"se_setsysrss"=>100,"se_crit"=>110,"se_key"=>120,"se_latest"=>130,"se_case"=>140,"se_fam"=>150,"se_famid"=>160,"se_cfld"=>170,"se_idfld"=>180,"se_trash"=>190,"se_archive"=>200,"se_sublevel"=>210,"se_sysfam"=>220,"se_sqlselect"=>230,"se_idcfld"=>240,"se_ccfld"=>250,"se_orderby"=>260,"se_famonly"=>270,"se_acl"=>280,"se_static"=>290,"se_fr_detail"=>300,"se_ol"=>310,"se_t_detail"=>320,"se_ols"=>330,"se_leftp"=>340,"se_attrids"=>350,"se_funcs"=>360,"se_keys"=>370,"se_rightp"=>380,"se_t_filters"=>390,"se_filter"=>400,"se_typefilter"=>410];
     $this->fromids[16]=16;
     $this->fromname='DSEARCH';

    $this->fields["se_ol"]="se_ol";
    $this->fields["se_ols"]="se_ols";
    $this->fields["se_leftp"]="se_leftp";
    $this->fields["se_attrids"]="se_attrids";
    $this->fields["se_funcs"]="se_funcs";
    $this->fields["se_keys"]="se_keys";
    $this->fields["se_rightp"]="se_rightp";
    $this->fields["se_filter"]="se_filter";
    $this->fields["se_typefilter"]="se_typefilter";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Dsearch extends \Dcp\Core\DetailSearch {
   //  family : Recherche détaillée

   public $dbtable="doc16";
   public $dbseq="seq_doc16";
   public $sqlcreate = array("create table doc16 (se_ol text,se_ols text,se_leftp text,se_attrids text,se_funcs text,se_keys text,se_rightp text,se_filter text,se_typefilter text) inherits (doc5);",
     "create sequence seq_doc16 start 1;",
     "alter TABLE doc16 ADD primary key (id);",
     "select setval('seq_doc16', count(distinct initid)+1, false )  from only doc16;");
   

     public $fromid=16;
     public $fromname='DSEARCH';
     public $fromtitle="Recherche détaillée";
     const familyName='DSEARCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc16();
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
    class_alias('\Dcp\Family\Dsearch','_Dsearch');
    class_alias('\Dcp\Family\Dsearch' , 'Doc16');
}

