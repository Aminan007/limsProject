<?php


namespace {



class ADoc1003 extends ADoc {
    // for familly : Accord

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["was_fr_ident"]=new FieldSetAttribute("was_fr_ident", "1003","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","WASK");
     
     $this->attr["dpdoc_fr_dyn"]=new FieldSetAttribute("dpdoc_fr_dyn", "1003","Profil dynamique","W","N","frame",$this->attr["FIELD_HIDDENS"],"","WASK");
     
     
     $this->attr["was_ref"]=new NormalAttribute("was_ref", "1003","Référence","text","",false,20,"",
                                                "W",true,true,false,
						$this->attr["was_fr_ident"],"","","","","N","","","WASK");

     
     $this->attr["was_ask"]=new NormalAttribute("was_ask", "1003","Question","longtext","",false,30,"",
                                                "W",false,false,false,
						$this->attr["was_fr_ident"],"","","","","N","","","WASK");

     
     $this->attr["was_t_answer"]=new NormalAttribute("was_t_answer", "1003","Réponses possibles","array","",false,60,"",
                                                "W",false,false,false,
						$this->attr["was_fr_ident"],"","","","","N","","","WASK");

     
     $this->attr["was_keys"]=new NormalAttribute("was_keys", "1003","Clef","text","",true,70,"",
                                                "W",false,false,false,
						$this->attr["was_t_answer"],"","","","","N","","","WASK");

     
     $this->attr["was_labels"]=new NormalAttribute("was_labels", "1003","Libellé","text","",true,80,"",
                                                "W",false,false,false,
						$this->attr["was_t_answer"],"","","","","N","","","WASK");

     
     $this->attr["dpdoc_famid"]=new NormalAttribute("dpdoc_famid", "1003","Famille (id)","docid","",false,210,"",
                                                "H",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"","::getTitle(DPDOC_FAMID):DPDOC_FAM","","","N","","","WASK");

     
     $this->attr["dpdoc_fam"]=new NormalAttribute("dpdoc_fam", "1003","Famille","text","",false,220,"%S%app=FDL&action=FDL_CARD&id=%DPDOC_FAMID%",
                                                "W",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"fdl.php","lfamilies(D,DPDOC_FAM):DPDOC_FAMID,DPDOC_FAM","","","N","","","WASK");

     
		
	 $this->absoluteOrders=["was_fr_ident"=>10,"was_ref"=>20,"was_ask"=>30,"was_t_answer"=>40,"was_keys"=>50,"was_labels"=>60,"dpdoc_fr_dyn"=>70,"dpdoc_famid"=>80,"dpdoc_fam"=>90];
     $this->fromids[1003]=1003;
     $this->fromname='WASK';

    $this->fields["was_ref"]="was_ref";
    $this->fields["was_ask"]="was_ask";
    $this->fields["was_keys"]="was_keys";
    $this->fields["was_labels"]="was_labels";
    $this->fields["dpdoc_famid"]="dpdoc_famid";
    $this->fields["dpdoc_fam"]="dpdoc_fam";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Wask extends \Dcp\Core\Wask {
   //  family : Accord

   public $dbtable="doc1003";
   public $dbseq="seq_doc1003";
   public $sqlcreate = array("create table doc1003 (was_ref text,was_ask text,was_keys text,was_labels text,dpdoc_famid text,dpdoc_fam text) inherits (doc);",
     "create sequence seq_doc1003 start 1;",
     "alter TABLE doc1003 ADD primary key (id);",
     "select setval('seq_doc1003', count(distinct initid)+1, false )  from only doc1003;");
   

     public $fromid=1003;
     public $fromname='WASK';
     public $fromtitle="Accord";
     const familyName='WASK';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1003();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("DPDOC_FAM", "::getTitle(DPDOC_FAMID):DPDOC_FAM");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Wask','_Wask');
    class_alias('\Dcp\Family\Wask' , 'Doc1003');
}

