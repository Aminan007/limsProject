<?php


namespace {


 require_once "FDLGEN/Class.Doc1.php"; 
class ADoc24 extends ADoc1 {
    // for familly : texte

   function __construct () {
      ADoc1::__construct();

     
     
     
     $this->attr["txt_fr_anx"]=new FieldSetAttribute("txt_fr_anx", "24","annexes","W","N","frame",$this->attr["FIELD_HIDDENS"],"","TEXT");
     
     
     $this->attr["ba_title"]=new NormalAttribute("ba_title", "24","titre","text","",false,1,"",
                                                "O",true,true,false,
						$this->attr["fr_basic"],"","","","","N","","","TEXT");

     
     $this->attr["txt_text"]=new NormalAttribute("txt_text", "24","texte","htmltext","",false,20,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","vlabel=none","TEXT");

     
     $this->attr["txt_t_img"]=new NormalAttribute("txt_t_img", "24","images","array","",false,40,"",
                                                "O",false,false,false,
						$this->attr["txt_fr_anx"],"","","","","N","","","TEXT");

     
     $this->attr["txt_img"]=new NormalAttribute("txt_img", "24","images","image","",true,50,"",
                                                "O",false,false,false,
						$this->attr["txt_t_img"],"","","","","N","","","TEXT");

     
     $this->attr["txt_img_ori"]=new NormalAttribute("txt_img_ori", "24","source","file","",true,60,"",
                                                "O",false,false,false,
						$this->attr["txt_t_img"],"","","","","N","","","TEXT");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"txt_text"=>30,"txt_fr_anx"=>40,"txt_t_img"=>50,"txt_img"=>60,"txt_img_ori"=>70];
     $this->fromids[24]=24;
     $this->fromname='TEXT';

    $this->fields["ba_title"]="ba_title";
    $this->fields["txt_text"]="txt_text";
    $this->fields["txt_img"]="txt_img";
    $this->fields["txt_img_ori"]="txt_img_ori";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Text extends \Dcp\Family\Base {
   //  family : texte

   public $dbtable="doc24";
   public $dbseq="seq_doc24";
   public $sqlcreate = array("create table doc24 (ba_title text,txt_text text,txt_img text,txt_img_ori text) inherits (doc1);",
     "create sequence seq_doc24 start 1;",
     "alter TABLE doc24 ADD primary key (id);",
     "select setval('seq_doc24', count(distinct initid)+1, false )  from only doc24;");
   

     public $fromid=24;
     public $fromname='TEXT';
     public $fromtitle="texte";
     const familyName='TEXT';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc24();
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
    class_alias('\Dcp\Family\Text','_Text');
    class_alias('\Dcp\Family\Text' , 'Doc24');
}

