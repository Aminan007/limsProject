<?php


namespace {

include_once("FDLGEN/Class.Doc3.php");

class ADoc6 extends ADoc3 {
    // for familly : Profil de recherche

   function __construct () {
      ADoc3::__construct();

     
     
     
     
		
     $this->fromids[6]=6;
     $this->fromname='PSEARCH';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Psearch extends \PDocSearch {
   //  family : Profil de recherche

   public $dbtable="doc6";
   public $dbseq="seq_doc6";
   public $sqlcreate = array("create table doc6 () inherits (doc3);",
     "create sequence seq_doc6 start 1;",
     "alter TABLE doc6 ADD primary key (id);",
     "select setval('seq_doc6', count(distinct initid)+1, false )  from only doc6;");
   

     public $fromid=6;
     public $fromname='PSEARCH';
     public $fromtitle="Profil de recherche";
     const familyName='PSEARCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc6();
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
    class_alias('\Dcp\Family\Psearch','_Psearch');
    class_alias('\Dcp\Family\Psearch' , 'Doc6');
}

