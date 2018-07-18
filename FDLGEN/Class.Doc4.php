<?php


namespace {

include_once("FDLGEN/Class.Doc3.php");

class ADoc4 extends ADoc3 {
    // for familly : Profil de dossier

   function __construct () {
      ADoc3::__construct();

     
     
     
     
		
     $this->fromids[4]=4;
     $this->fromname='PDIR';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Pdir extends \PDir {
   //  family : Profil de dossier

   public $dbtable="doc4";
   public $dbseq="seq_doc4";
   public $sqlcreate = array("create table doc4 () inherits (doc3);",
     "create sequence seq_doc4 start 1;",
     "alter TABLE doc4 ADD primary key (id);",
     "select setval('seq_doc4', count(distinct initid)+1, false )  from only doc4;");
   

     public $fromid=4;
     public $fromname='PDIR';
     public $fromtitle="Profil de dossier";
     const familyName='PDIR';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc4();
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
    class_alias('\Dcp\Family\Pdir','_Pdir');
    class_alias('\Dcp\Family\Pdir' , 'Doc4');
}

