<?php


namespace {



class ADoc1 extends ADoc {
    // for familly : de base

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["fr_basic"]=new FieldSetAttribute("fr_basic", "1","Basique","W","N","frame",$this->attr["FIELD_HIDDENS"],"","BASE");
     
     
     $this->attr["ba_title"]=new NormalAttribute("ba_title", "1","Titre","text","",false,1,"",
                                                "O",true,true,false,
						$this->attr["fr_basic"],"","","","","N","","","BASE");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20];
     $this->fromids[1]=1;
     $this->fromname='BASE';

    $this->fields["ba_title"]="ba_title";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Base extends \Dcp\Family\Document {
   //  family : de base

   public $dbtable="doc1";
   public $dbseq="seq_doc1";
   public $sqlcreate = array("create table doc1 (ba_title text) inherits (doc);",
     "create sequence seq_doc1 start 1;",
     "alter TABLE doc1 ADD primary key (id);",
     "select setval('seq_doc1', count(distinct initid)+1, false )  from only doc1;");
   

     public $fromid=1;
     public $fromname='BASE';
     public $fromtitle="de base";
     const familyName='BASE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1();
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
    class_alias('\Dcp\Family\Base','_Base');
    class_alias('\Dcp\Family\Base' , 'Doc1');
}

