<?php


namespace {

include_once("FDLGEN/Class.Doc3.php");

class ADoc23 extends ADoc3 {
    // for familly : Profil de famille

   function __construct () {
      ADoc3::__construct();

     
     
     
     $this->attr["dpdoc_fr_dyn"]=new FieldSetAttribute("dpdoc_fr_dyn", "23","Dynamique","H","N","frame",$this->attr["FIELD_HIDDENS"],"","PFAM");
     
     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"prf_desc"=>30,"dpdoc_fr_dyn"=>40,"dpdoc_famid"=>50,"dpdoc_fam"=>60,"prf_access"=>70,"prf_activate"=>80,"prf_desactivate"=>90,"prf_forcecomputing"=>100];
     $this->fromids[23]=23;
     $this->fromname='PFAM';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Pfam extends \PFam {
   //  family : Profil de famille

   public $dbtable="doc23";
   public $dbseq="seq_doc23";
   public $sqlcreate = array("create table doc23 () inherits (doc3);",
     "create sequence seq_doc23 start 1;",
     "alter TABLE doc23 ADD primary key (id);",
     "select setval('seq_doc23', count(distinct initid)+1, false )  from only doc23;");
   

     public $fromid=23;
     public $fromname='PFAM';
     public $fromtitle="Profil de famille";
     const familyName='PFAM';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc23();
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
    class_alias('\Dcp\Family\Pfam','_Pfam');
    class_alias('\Dcp\Family\Pfam' , 'Doc23');
}

