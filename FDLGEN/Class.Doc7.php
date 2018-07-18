<?php


namespace {



class ADoc7 extends ADoc {
    // for familly : fichiers

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["fi_fr_oformat"]=new FieldSetAttribute("fi_fr_oformat", "7","Fichiers","W","N","frame",$this->attr["FIELD_HIDDENS"],"","FILE");
     
     $this->attr["fi_frdesc"]=new FieldSetAttribute("fi_frdesc", "7","description","W","N","frame",$this->attr["FIELD_HIDDENS"],"","FILE");
     
     
     $this->attr["fi_title"]=new NormalAttribute("fi_title", "7","titre","text","",false,10,"",
                                                "R",false,true,false,
						$this->attr["fi_frdesc"],"","","","","N","","","FILE");

     
     $this->attr["fi_titlew"]=new NormalAttribute("fi_titlew", "7","titre","text","",false,15,"",
                                                "O",false,false,false,
						$this->attr["fi_frdesc"],"","","","","N","","","FILE");

     
     $this->attr["fi_subject"]=new NormalAttribute("fi_subject", "7","sujet","text","",false,20,"",
                                                "W",false,false,true,
						$this->attr["fi_frdesc"],"","","","","N","","","FILE");

     
     $this->attr["fi_keyword"]=new NormalAttribute("fi_keyword", "7","mots-clés","text","",false,30,"",
                                                "W",false,false,false,
						$this->attr["fi_frdesc"],"","","","","N","","","FILE");

     
     $this->attr["fi_description"]=new NormalAttribute("fi_description", "7","résumé","longtext","",false,40,"",
                                                "W",false,false,false,
						$this->attr["fi_frdesc"],"","","","","N","","","FILE");

     
     $this->attr["fi_file"]=new NormalAttribute("fi_file", "7","principal","file","",false,50,"",
                                                "W",true,false,true,
						$this->attr["fi_fr_oformat"],"","","","","N","","","FILE");

     
     $this->attr["ft_t_oformat"]=new NormalAttribute("ft_t_oformat", "7","autres","array","",false,500,"",
                                                "W",false,false,false,
						$this->attr["fi_fr_oformat"],"","","","","N","","","FILE");

     
     $this->attr["fi_ofile"]=new NormalAttribute("fi_ofile", "7","fichier","file","",true,510,"",
                                                "W",false,false,false,
						$this->attr["ft_t_oformat"],"","","","","N","","","FILE");

     
		
	 $this->absoluteOrders=["fi_frdesc"=>10,"fi_title"=>20,"fi_titlew"=>30,"fi_subject"=>40,"fi_keyword"=>50,"fi_description"=>60,"fi_fr_oformat"=>70,"fi_file"=>80,"ft_t_oformat"=>90,"fi_ofile"=>100];
     $this->fromids[7]=7;
     $this->fromname='FILE';

    $this->fields["fi_title"]="fi_title";
    $this->fields["fi_titlew"]="fi_titlew";
    $this->fields["fi_subject"]="fi_subject";
    $this->fields["fi_keyword"]="fi_keyword";
    $this->fields["fi_description"]="fi_description";
    $this->fields["fi_file"]="fi_file";
    $this->fields["fi_ofile"]="fi_ofile";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class File extends \Dcp\Core\File {
   //  family : fichiers

   public $dbtable="doc7";
   public $dbseq="seq_doc7";
   public $sqlcreate = array("create table doc7 (fi_title text,fi_titlew text,fi_subject text,fi_keyword text,fi_description text,fi_file text,fi_ofile text) inherits (doc);",
     "create sequence seq_doc7 start 1;",
     "alter TABLE doc7 ADD primary key (id);",
     "select setval('seq_doc7', count(distinct initid)+1, false )  from only doc7;");
   

     public $fromid=7;
     public $fromname='FILE';
     public $fromtitle="fichiers";
     const familyName='FILE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc7();
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
    class_alias('\Dcp\Family\File','_File');
    class_alias('\Dcp\Family\File' , 'Doc7');
}

