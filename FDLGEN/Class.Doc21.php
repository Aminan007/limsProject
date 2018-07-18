<?php


namespace {

include_once("FDLGEN/Class.Doc1.php");

class ADoc21 extends ADoc1 {
    // for familly : Masque de saisie

   function __construct () {
      ADoc1::__construct();

     
     
     
     $this->attr["msk_fr_rest"]=new FieldSetAttribute("msk_fr_rest", "21","Famille","W","N","frame",$this->attr["FIELD_HIDDENS"],"","MASK");
     
     
     $this->attr["msk_famid"]=new NormalAttribute("msk_famid", "21","Famille","docid","FAMILIES",false,10,"",
                                                "W",true,false,false,
						$this->attr["msk_fr_rest"],"fdl.php","lfamilies(D,CT):MSK_FAMID,CT","","","N","","","MASK");

     
     $this->attr["msk_fam"]=new NormalAttribute("msk_fam", "21","Famille (titre)","text","",false,20,"",
                                                "H",false,true,false,
						$this->attr["msk_fr_rest"],"","::getTitle(MSK_FAMID)","","","N","","","MASK");

     
     $this->attr["msk_t_contain"]=new NormalAttribute("msk_t_contain", "21","Contenu","array","",false,30,"",
                                                "W",false,false,false,
						$this->attr["msk_fr_rest"],"","","","","N","","","MASK");

     
     $this->attr["msk_attrids"]=new NormalAttribute("msk_attrids", "21","Attrid","text","",true,40,"",
                                                "W",false,false,false,
						$this->attr["msk_t_contain"],"","","","","N","","","MASK");

     
     $this->attr["msk_visibilities"]=new NormalAttribute("msk_visibilities", "21","Visibilité","text","",true,50,"",
                                                "W",false,false,false,
						$this->attr["msk_t_contain"],"","","","","N","","","MASK");

     
     $this->attr["msk_needeeds"]=new NormalAttribute("msk_needeeds", "21","Obligatoire","text","",true,60,"",
                                                "W",false,false,false,
						$this->attr["msk_t_contain"],"","","","","N","","","MASK");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"msk_fr_rest"=>30,"msk_famid"=>40,"msk_fam"=>50,"msk_t_contain"=>60,"msk_attrids"=>70,"msk_visibilities"=>80,"msk_needeeds"=>90];
     $this->fromids[21]=21;
     $this->fromname='MASK';

    $this->fields["msk_famid"]="msk_famid";
    $this->fields["msk_fam"]="msk_fam";
    $this->fields["msk_attrids"]="msk_attrids";
    $this->fields["msk_visibilities"]="msk_visibilities";
    $this->fields["msk_needeeds"]="msk_needeeds";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Mask extends \Dcp\Core\Mask {
   //  family : Masque de saisie

   public $dbtable="doc21";
   public $dbseq="seq_doc21";
   public $sqlcreate = array("create table doc21 (msk_famid text,msk_fam text,msk_attrids text,msk_visibilities text,msk_needeeds text) inherits (doc1);",
     "create sequence seq_doc21 start 1;",
     "alter TABLE doc21 ADD primary key (id);",
     "select setval('seq_doc21', count(distinct initid)+1, false )  from only doc21;");
   

     public $fromid=21;
     public $fromname='MASK';
     public $fromtitle="Masque de saisie";
     const familyName='MASK';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc21();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("msk_fam", "::getTitle(MSK_FAMID)");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Mask','_Mask');
    class_alias('\Dcp\Family\Mask' , 'Doc21');
}

