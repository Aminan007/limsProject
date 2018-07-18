<?php


namespace {



class ADoc8 extends ADoc {
    // for familly : image

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["img_frfile"]=new FieldSetAttribute("img_frfile", "8","image","W","N","frame",$this->attr["FIELD_HIDDENS"],"","IMAGE");
     
     $this->attr["img_fr_char"]=new FieldSetAttribute("img_fr_char", "8","caractéristiques","W","N","frame",$this->attr["FIELD_HIDDENS"],"","IMAGE");
     
     
     $this->attr["img_title"]=new NormalAttribute("img_title", "8","titre","text","",false,10,"",
                                                "R",false,true,false,
						$this->attr["img_frfile"],"","","","","N","","","IMAGE");

     
     $this->attr["img_file"]=new NormalAttribute("img_file", "8","image","image","",false,20,"",
                                                "W",true,false,true,
						$this->attr["img_frfile"],"","","","","N","","iwidth=80","IMAGE");

     
     $this->attr["img_description"]=new NormalAttribute("img_description", "8","description","longtext","",false,30,"",
                                                "W",false,false,true,
						$this->attr["img_frfile"],"","","","","N","","","IMAGE");

     
     $this->attr["img_catg"]=new NormalAttribute("img_catg", "8","catégorie","enum","",false,50,"",
                                                "W",false,false,false,
						$this->attr["img_fr_char"],"","1|photo,2|dessin","","","N","","","IMAGE");

     
		
	 $this->absoluteOrders=["img_frfile"=>10,"img_title"=>20,"img_file"=>30,"img_description"=>40,"img_fr_char"=>50,"img_catg"=>60];
     $this->fromids[8]=8;
     $this->fromname='IMAGE';

    $this->fields["img_title"]="img_title";
    $this->fields["img_file"]="img_file";
    $this->fields["img_description"]="img_description";
    $this->fields["img_catg"]="img_catg";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Image extends \Dcp\Core\Image {
   //  family : image

   public $dbtable="doc8";
   public $dbseq="seq_doc8";
   public $sqlcreate = array("create table doc8 (img_title text,img_file text,img_description text,img_catg text) inherits (doc);",
     "create sequence seq_doc8 start 1;",
     "alter TABLE doc8 ADD primary key (id);",
     "select setval('seq_doc8', count(distinct initid)+1, false )  from only doc8;");
   

     public $fromid=8;
     public $fromname='IMAGE';
     public $fromtitle="image";
     const familyName='IMAGE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc8();
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
    class_alias('\Dcp\Family\Image','_Image');
    class_alias('\Dcp\Family\Image' , 'Doc8');
}

