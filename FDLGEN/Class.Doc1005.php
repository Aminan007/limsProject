<?php


namespace {


 require_once "FDLGEN/Class.Doc36.php"; 
class ADoc1005 extends ADoc36 {
    // for familly : Action basique

   function __construct () {
      ADoc36::__construct();

     
     $this->attr["bbatch_lock"]=new ActionAttribute("bbatch_lock", "1005","Verrouiller",200,"W","FDL","LOCKFILE","","submenu=actions|batchfolder=yes","BASICBATCH");    
     
     $this->attr["bbatch_unlock"]=new ActionAttribute("bbatch_unlock", "1005","Déverrouiller",210,"W","FDL","UNLOCKFILE","","submenu=actions|batchfolder=yes","BASICBATCH");    
     
     $this->attr["bbatch_delete"]=new ActionAttribute("bbatch_delete", "1005","Supprimer",220,"W","GENERIC","GENERIC_DEL","","submenu=actions|batchfolder=yes","BASICBATCH");    
     
     $this->attr["bbatch_copy"]=new ActionAttribute("bbatch_copy", "1005","Dupliquer",220,"W","GENERIC","GENERIC_DUPLICATE","","submenu=actions|batchfolder=yes","BASICBATCH");    
     
     
     
     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"pfl_open"=>70,"batch_plan"=>80,"batch_fr_ident"=>90,"batch_title"=>100,"batch_desc"=>110,"batch_idfam"=>120,"batch_fam"=>130,"fld_openfolio"=>140,"fld_copybasket"=>150,"fld_insertdoc"=>160,"fld_setsysrss"=>170,"pfl_fr_init"=>180,"pfl_liststyle"=>190,"pfl_savetab"=>200,"pfl_savedispo"=>210,"pfl_t_linktab"=>220,"pfl_idlinktab"=>230,"pfl_linktab"=>240,"pfl_t_copytab"=>250,"pfl_idcopytab"=>260,"pfl_copytab"=>270,"bbatch_lock"=>280,"bbatch_unlock"=>290,"bbatch_delete"=>300,"bbatch_copy"=>310,"fld_fr_rest"=>320,"fld_allbut"=>330,"fld_tfam"=>340,"fld_fam"=>350,"fld_famids"=>360,"fld_subfam"=>370,"fld_fr_prof"=>380,"fld_pdoc"=>390,"fld_pdocid"=>400,"fld_pdir"=>410,"fld_pdirid"=>420,"pfl_iddef"=>430,"pfl_def"=>440,"fld_open"=>450];
     $this->fromids[1005]=1005;
     $this->fromname='BASICBATCH';

   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Basicbatch extends \Dcp\Family\Batch {
   //  family : Action basique

   public $dbtable="doc1005";
   public $dbseq="seq_doc1005";
   public $sqlcreate = array("create table doc1005 () inherits (doc36);",
     "create sequence seq_doc1005 start 1;",
     "alter TABLE doc1005 ADD primary key (id);",
     "select setval('seq_doc1005', count(distinct initid)+1, false )  from only doc1005;");
   

     public $fromid=1005;
     public $fromname='BASICBATCH';
     public $fromtitle="Action basique";
     const familyName='BASICBATCH';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1005();
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
    class_alias('\Dcp\Family\Basicbatch','_Basicbatch');
    class_alias('\Dcp\Family\Basicbatch' , 'Doc1005');
}

