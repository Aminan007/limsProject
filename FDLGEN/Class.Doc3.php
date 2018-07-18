<?php


namespace {

include_once("FDLGEN/Class.Doc1.php");

class ADoc3 extends ADoc1 {
    // for familly : Profil de document

   function __construct () {
      ADoc1::__construct();

     
     $this->attr["prf_access"]=new ActionAttribute("prf_access", "3","Accessibilités",200,"R","FREEDOM","FREEDOM_GACCESS","::controlActifProfil()","","PDOC");    
     
     $this->attr["prf_activate"]=new ActionAttribute("prf_activate", "3","Activer",210,"R","FREEDOM","MODPROF&profid=%I%&docid=%I%","::profilIsActivate(false)","ltarget=_self","PDOC");    
     
     $this->attr["prf_desactivate"]=new ActionAttribute("prf_desactivate", "3","Désactiver",220,"R","FREEDOM","MODPROF&profid=0&docid=%I%","::profilIsActivate(true)","ltarget=_self","PDOC");    
     
     
     $this->attr["prf_forcecomputing"]=new MenuAttribute("prf_forcecomputing", "3","Forcer la propagation du profil",230,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3ArecomputeProfiledDocument%28%29","R","::profilIsActivate(true)","ltarget=_self|ltitle=Force le recalcul des profils des documents associés","PDOC");    
     
     
     $this->attr["dpdoc_fr_dyn"]=new FieldSetAttribute("dpdoc_fr_dyn", "3","Dynamique","W","N","frame",$this->attr["FIELD_HIDDENS"],"","PDOC");
     
     
     $this->attr["prf_desc"]=new NormalAttribute("prf_desc", "3","Description","longtext","",false,10,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","PDOC");

     
     $this->attr["dpdoc_famid"]=new NormalAttribute("dpdoc_famid", "3","Famille (id)","docid","",false,110,"",
                                                "H",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"","::getTitle(DPDOC_FAMID):DPDOC_FAM","","","N","","","PDOC");

     
     $this->attr["dpdoc_fam"]=new NormalAttribute("dpdoc_fam", "3","Famille","text","",false,120,"%S%app=FDL&action=FDL_CARD&id=%DPDOC_FAMID%",
                                                "W",false,false,true,
						$this->attr["dpdoc_fr_dyn"],"fdl.php","lfamilies(D,DPDOC_FAM):DPDOC_FAMID,DPDOC_FAM","","","N","","elabel=famille utilisée pour les profils dynamiques","PDOC");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"prf_desc"=>30,"dpdoc_fr_dyn"=>40,"dpdoc_famid"=>50,"dpdoc_fam"=>60,"prf_access"=>70,"prf_activate"=>80,"prf_desactivate"=>90,"prf_forcecomputing"=>100];
     $this->fromids[3]=3;
     $this->fromname='PDOC';

    $this->fields["prf_desc"]="prf_desc";
    $this->fields["dpdoc_famid"]="dpdoc_famid";
    $this->fields["dpdoc_fam"]="dpdoc_fam";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Pdoc extends \PDoc {
   //  family : Profil de document

   public $dbtable="doc3";
   public $dbseq="seq_doc3";
   public $sqlcreate = array("create table doc3 (prf_desc text,dpdoc_famid text,dpdoc_fam text) inherits (doc1);",
     "create sequence seq_doc3 start 1;",
     "alter TABLE doc3 ADD primary key (id);",
     "select setval('seq_doc3', count(distinct initid)+1, false )  from only doc3;");
   

     public $fromid=3;
     public $fromname='PDOC';
     public $fromtitle="Profil de document";
     const familyName='PDOC';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc3();
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
    class_alias('\Dcp\Family\Pdoc','_Pdoc');
    class_alias('\Dcp\Family\Pdoc' , 'Doc3');
}

