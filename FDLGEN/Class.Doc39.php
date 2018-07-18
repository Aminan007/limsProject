<?php


namespace {



class ADoc39 extends ADoc {
    // for familly : État libre

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["frst_fr_ident"]=new FieldSetAttribute("frst_fr_ident", "39","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","FREESTATE");
     
     
     $this->attr["frst_name"]=new NormalAttribute("frst_name", "39","Nom","text","",false,10,"",
                                                "W",false,true,false,
						$this->attr["frst_fr_ident"],"","","","","N","","","FREESTATE");

     
     $this->attr["frst_desc"]=new NormalAttribute("frst_desc", "39","Description","longtext","",false,20,"",
                                                "W",false,false,true,
						$this->attr["frst_fr_ident"],"","","","","N","","","FREESTATE");

     
     $this->attr["frst_famid"]=new NormalAttribute("frst_famid", "39","Famille (id)","docid","",false,30,"",
                                                "H",false,false,false,
						$this->attr["frst_fr_ident"],"","::getTitle(FRST_FAMID):FRST_FAM","","","N","","","FREESTATE");

     
     $this->attr["frst_fam"]=new NormalAttribute("frst_fam", "39","Famille","text","",false,40,"%S%app=FDL&action=FDL_CARD&id=%FRST_FAMID%",
                                                "W",false,false,true,
						$this->attr["frst_fr_ident"],"fdl.php","lfamilies(D,FRST_FAM):FRST_FAMID,FRST_FAM","","","N","","elabel=restreindre l'usage à la famille spécifiée","FREESTATE");

     
     $this->attr["frst_color"]=new NormalAttribute("frst_color", "39","Couleur","color","",false,50,"",
                                                "W",false,false,false,
						$this->attr["frst_fr_ident"],"","","","","N","","elabel=couleur représentant l'état","FREESTATE");

     
		
	 $this->absoluteOrders=["frst_fr_ident"=>10,"frst_name"=>20,"frst_desc"=>30,"frst_famid"=>40,"frst_fam"=>50,"frst_color"=>60];
     $this->fromids[39]=39;
     $this->fromname='FREESTATE';

    $this->fields["frst_name"]="frst_name";
    $this->fields["frst_desc"]="frst_desc";
    $this->fields["frst_famid"]="frst_famid";
    $this->fields["frst_fam"]="frst_fam";
    $this->fields["frst_color"]="frst_color";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Freestate extends \Dcp\Family\Document {
   //  family : État libre

   public $dbtable="doc39";
   public $dbseq="seq_doc39";
   public $sqlcreate = array("create table doc39 (frst_name text,frst_desc text,frst_famid text,frst_fam text,frst_color text) inherits (doc);",
     "create sequence seq_doc39 start 1;",
     "alter TABLE doc39 ADD primary key (id);",
     "select setval('seq_doc39', count(distinct initid)+1, false )  from only doc39;");
   

     public $fromid=39;
     public $fromname='FREESTATE';
     public $fromtitle="État libre";
     const familyName='FREESTATE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc39();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("FRST_FAM", "::getTitle(FRST_FAMID):FRST_FAM");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Freestate','_Freestate');
    class_alias('\Dcp\Family\Freestate' , 'Doc39');
}

