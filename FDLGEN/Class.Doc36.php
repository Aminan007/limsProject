<?php


namespace {

include_once("FDLGEN/Class.Doc17.php");

class ADoc36 extends ADoc17 {
    // for familly : Traitement

   function __construct () {
      ADoc17::__construct();

     
     
     $this->attr["batch_plan"]=new MenuAttribute("batch_plan", "36","Planification",10,"%S%app=FREEDOM&action=FREEDOM_PROCESSTOEXEC&id=%I%","W","::canExecute(FREEDOM,FREEDOM_PROCESSTOEXEC)","","BATCH");    
     
     
     $this->attr["batch_fr_ident"]=new FieldSetAttribute("batch_fr_ident", "36","Identification","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","BATCH");
     
     
     $this->attr["batch_title"]=new NormalAttribute("batch_title", "36","Titre","text","",false,20,"",
                                                "W",true,false,false,
						$this->attr["batch_fr_ident"],"","","","","Q","","","BATCH");

     
     $this->attr["batch_desc"]=new NormalAttribute("batch_desc", "36","Description","longtext","",false,30,"",
                                                "W",false,false,false,
						$this->attr["batch_fr_ident"],"","","","","Q","","","BATCH");

     
     $this->attr["batch_idfam"]=new NormalAttribute("batch_idfam", "36","Id famille","docid","FAMILY",false,40,"",
                                                "W",false,false,false,
						$this->attr["batch_fr_ident"],"fdl.php","lfamilies(D,CT):BATCH_IDFAM,CT","","","Q","","","BATCH");

     
     $this->attr["batch_fam"]=new NormalAttribute("batch_fam", "36","Famille","text","",false,50,"",
                                                "H",false,false,false,
						$this->attr["batch_fr_ident"],"","::getTitle(BATCH_IDFAM)","","","Q","","","BATCH");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"pfl_open"=>70,"batch_plan"=>80,"batch_fr_ident"=>90,"batch_title"=>100,"batch_desc"=>110,"batch_idfam"=>120,"batch_fam"=>130,"fld_openfolio"=>140,"fld_copybasket"=>150,"fld_insertdoc"=>160,"fld_setsysrss"=>170,"pfl_fr_init"=>180,"pfl_liststyle"=>190,"pfl_savetab"=>200,"pfl_savedispo"=>210,"pfl_t_linktab"=>220,"pfl_idlinktab"=>230,"pfl_linktab"=>240,"pfl_t_copytab"=>250,"pfl_idcopytab"=>260,"pfl_copytab"=>270,"fld_fr_rest"=>280,"fld_allbut"=>290,"fld_tfam"=>300,"fld_fam"=>310,"fld_famids"=>320,"fld_subfam"=>330,"fld_fr_prof"=>340,"fld_pdoc"=>350,"fld_pdocid"=>360,"fld_pdir"=>370,"fld_pdirid"=>380,"pfl_iddef"=>390,"pfl_def"=>400,"fld_open"=>410];
     $this->fromids[36]=36;
     $this->fromname='BATCH';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Batch extends \Dcp\Core\BatchDocument {
   //  family : Traitement

   public $dbtable="doc36";
   public $dbseq="seq_doc36";
   public $sqlcreate = array("create table doc36 () inherits (doc17);",
     "create sequence seq_doc36 start 1;",
     "alter TABLE doc36 ADD primary key (id);",
     "select setval('seq_doc36', count(distinct initid)+1, false )  from only doc36;");
   

     public $fromid=36;
     public $fromname='BATCH';
     public $fromtitle="Traitement";
     const familyName='BATCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc36();
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
    class_alias('\Dcp\Family\Batch','_Batch');
    class_alias('\Dcp\Family\Batch' , 'Doc36');
}

