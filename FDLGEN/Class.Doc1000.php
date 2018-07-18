<?php


namespace {



class ADoc1000 extends ADoc {
    // for familly : Aide en ligne

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["help_fr_family"]=new FieldSetAttribute("help_fr_family", "1000","Paramètres de famille","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","HELPPAGE");
     
     $this->attr["help_fr_identification"]=new FieldSetAttribute("help_fr_identification", "1000","Aide","W","N","frame",$this->attr["FIELD_HIDDENS"],"","HELPPAGE");
     
     
     $this->attr["help_t_family"]=new NormalAttribute("help_t_family", "1000","Langues","array","",false,20,"",
                                                "W",false,false,false,
						$this->attr["help_fr_family"],"","","","","Q","","","HELPPAGE");

     
     $this->attr["help_family"]=new NormalAttribute("help_family", "1000","Famille","docid","x",false,20,"",
                                                "R",false,false,true,
						$this->attr["help_fr_identification"],"fdl.php","lfamilies(D,CT):HELP_FAMILY,CT","","","N","","","HELPPAGE");

     
     $this->attr["help_t_help"]=new NormalAttribute("help_t_help", "1000","Description","array","",false,30,"",
                                                "W",false,false,false,
						$this->attr["help_fr_identification"],"helppage.php","FDL:helppage_edithelp(A,D,ID):","","","N","","empty=yes","HELPPAGE");

     
     $this->attr["help_p_lang_name"]=new NormalAttribute("help_p_lang_name", "1000","Libellé de la langue","text","",true,30,"",
                                                "W",false,false,false,
						$this->attr["help_t_family"],"","","","","Q","","","HELPPAGE");

     
     $this->attr["help_p_lang_key"]=new NormalAttribute("help_p_lang_key", "1000","Langue","text","",true,40,"",
                                                "W",false,false,false,
						$this->attr["help_t_family"],"","","","","Q","","","HELPPAGE");

     
     $this->attr["help_name"]=new NormalAttribute("help_name", "1000","Libellé","text","",true,40,"",
                                                "W",false,false,false,
						$this->attr["help_t_help"],"","","","","N","","","HELPPAGE");

     
     $this->attr["help_lang"]=new NormalAttribute("help_lang", "1000","Langue du libellé","enum","",true,50,"",
                                                "W",false,false,false,
						$this->attr["help_t_help"],"helppage.php","helppageenumlang()","","","N","","","HELPPAGE");

     
     $this->attr["help_description"]=new NormalAttribute("help_description", "1000","Description","longtext","",true,60,"",
                                                "W",false,false,false,
						$this->attr["help_t_help"],"","","","","N","","","HELPPAGE");

     
     $this->attr["help_t_sections"]=new NormalAttribute("help_t_sections", "1000","Rubriques","array","",false,70,"",
                                                "W",false,false,false,
						$this->attr["help_fr_identification"],"helppage.php","FDL:helppage_editsection(A,D,ID):","","","N","","empty=yes","HELPPAGE");

     
     $this->attr["help_sec_order"]=new NormalAttribute("help_sec_order", "1000","Ordre de la rubrique","int","",true,80,"",
                                                "W",false,false,false,
						$this->attr["help_t_sections"],"","","","::isInteger(help_sec_order)","N","","","HELPPAGE");

     
     $this->attr["help_sec_name"]=new NormalAttribute("help_sec_name", "1000","Nom de la rubrique","text","",true,90,"",
                                                "W",false,false,false,
						$this->attr["help_t_sections"],"","","","","N","","","HELPPAGE");

     
     $this->attr["help_sec_lang"]=new NormalAttribute("help_sec_lang", "1000","Langue","enum","",true,100,"",
                                                "W",false,false,false,
						$this->attr["help_t_sections"],"helppage.php","helppageenumlang()","","","N","","","HELPPAGE");

     
     $this->attr["help_sec_key"]=new NormalAttribute("help_sec_key", "1000","Clé de la rubrique","text","",true,110,"",
                                                "W",false,false,false,
						$this->attr["help_t_sections"],"helppage.php","helppage_getHelpAttr(HELP_FAMILY, HELP_SEC_KEY):HELP_SEC_KEY,HELP_SEC_NAME","","::isString(HELP_SEC_KEY,[a-zA-Z0-9_]+)","N","","","HELPPAGE");

     
     $this->attr["help_sec_text"]=new NormalAttribute("help_sec_text", "1000","Texte","htmltext","",true,120,"",
                                                "W",false,false,false,
						$this->attr["help_t_sections"],"","","","","N","","","HELPPAGE");

     
		
	 $this->absoluteOrders=["help_fr_family"=>10,"help_t_family"=>20,"help_p_lang_name"=>30,"help_p_lang_key"=>40,"help_fr_identification"=>50,"help_family"=>60,"help_t_help"=>70,"help_name"=>80,"help_lang"=>90,"help_description"=>100,"help_t_sections"=>110,"help_sec_order"=>120,"help_sec_name"=>130,"help_sec_lang"=>140,"help_sec_key"=>150,"help_sec_text"=>160];
     $this->fromids[1000]=1000;
     $this->fromname='HELPPAGE';

    $this->fields["help_family"]="help_family";
    $this->fields["help_name"]="help_name";
    $this->fields["help_lang"]="help_lang";
    $this->fields["help_description"]="help_description";
    $this->fields["help_sec_order"]="help_sec_order";
    $this->fields["help_sec_name"]="help_sec_name";
    $this->fields["help_sec_lang"]="help_sec_lang";
    $this->fields["help_sec_key"]="help_sec_key";
    $this->fields["help_sec_text"]="help_sec_text";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Helppage extends \Dcp\Core\HelpPage {
   //  family : Aide en ligne

   public $dbtable="doc1000";
   public $dbseq="seq_doc1000";
   public $sqlcreate = array("create table doc1000 (help_family text,help_name text,help_lang text,help_description text,help_sec_order text,help_sec_name text,help_sec_lang text,help_sec_key text,help_sec_text text) inherits (doc);",
     "create sequence seq_doc1000 start 1;",
     "alter TABLE doc1000 ADD primary key (id);",
     "select setval('seq_doc1000', count(distinct initid)+1, false )  from only doc1000;");
   

     public $fromid=1000;
     public $fromname='HELPPAGE';
     public $fromtitle="Aide en ligne";
     const familyName='HELPPAGE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1000();
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
    class_alias('\Dcp\Family\Helppage','_Helppage');
    class_alias('\Dcp\Family\Helppage' , 'Doc1000');
}

