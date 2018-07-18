<?php


namespace {


 require_once "FDLGEN/Class.Doc2.php"; 
class ADoc18 extends ADoc2 {
    // for familly : intercalaire

   function __construct () {
      ADoc2::__construct();

     
     
     
     
		
     $this->fromids[18]=18;
     $this->fromname='GUIDECARD';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Guidecard extends \Dcp\Family\Dir {
   //  family : intercalaire

   public $dbtable="doc18";
   public $dbseq="seq_doc18";
   public $sqlcreate = array("create table doc18 () inherits (doc2);",
     "create sequence seq_doc18 start 1;",
     "alter TABLE doc18 ADD primary key (id);",
     "select setval('seq_doc18', count(distinct initid)+1, false )  from only doc18;");
   

     public $fromid=18;
     public $fromname='GUIDECARD';
     public $fromtitle="intercalaire";
     const familyName='GUIDECARD';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc18();
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
    class_alias('\Dcp\Family\Guidecard','_Guidecard');
    class_alias('\Dcp\Family\Guidecard' , 'Doc18');
}

