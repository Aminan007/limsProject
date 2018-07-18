<?php


namespace {


 require_once "FDLGEN/Class.Doc16.php"; 
class ADoc19 extends ADoc16 {
    // for familly : intercalaire dynamique

   function __construct () {
      ADoc16::__construct();

     
     
     
     
		
     $this->fromids[19]=19;
     $this->fromname='SGUIDECARD';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Sguidecard extends \Dcp\Family\Dsearch {
   //  family : intercalaire dynamique

   public $dbtable="doc19";
   public $dbseq="seq_doc19";
   public $sqlcreate = array("create table doc19 () inherits (doc16);",
     "create sequence seq_doc19 start 1;",
     "alter TABLE doc19 ADD primary key (id);",
     "select setval('seq_doc19', count(distinct initid)+1, false )  from only doc19;");
   

     public $fromid=19;
     public $fromname='SGUIDECARD';
     public $fromtitle="intercalaire dynamique";
     const familyName='SGUIDECARD';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc19();
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
    class_alias('\Dcp\Family\Sguidecard','_Sguidecard');
    class_alias('\Dcp\Family\Sguidecard' , 'Doc19');
}

