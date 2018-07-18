<?php


namespace {


 require_once "FDLGEN/Class.Doc2.php"; 
class ADoc26 extends ADoc2 {
    // for familly : Porte-documents

   function __construct () {
      ADoc2::__construct();

     
     
     $this->attr["fld_copybasket"]=new MenuAttribute("fld_copybasket", "26","Insérer le porte-document",20,"","H","","","BASKET");    
     
     $this->attr["fld_clear"]=new MenuAttribute("fld_clear", "26","Vider",20,"[basket]%S%app=FREEDOM&action=FREEDOM_CLEARFLD&id=%I%","W","","","BASKET");    
     
     
     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"fld_clear"=>70,"fld_open"=>80,"fld_openfolio"=>90,"fld_insertdoc"=>100,"fld_setsysrss"=>110,"fld_fr_rest"=>120,"fld_allbut"=>130,"fld_tfam"=>140,"fld_fam"=>150,"fld_famids"=>160,"fld_subfam"=>170,"fld_fr_prof"=>180,"fld_pdoc"=>190,"fld_pdocid"=>200,"fld_pdir"=>210,"fld_pdirid"=>220,"fld_copybasket"=>230];
     $this->fromids[26]=26;
     $this->fromname='BASKET';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Basket extends \Dcp\Family\Dir {
   //  family : Porte-documents

   public $dbtable="doc26";
   public $dbseq="seq_doc26";
   public $sqlcreate = array("create table doc26 () inherits (doc2);",
     "create sequence seq_doc26 start 1;",
     "alter TABLE doc26 ADD primary key (id);",
     "select setval('seq_doc26', count(distinct initid)+1, false )  from only doc26;");
   

     public $fromid=26;
     public $fromname='BASKET';
     public $fromtitle="Porte-documents";
     const familyName='BASKET';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc26();
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
    class_alias('\Dcp\Family\Basket','_Basket');
    class_alias('\Dcp\Family\Basket' , 'Doc26');
}

