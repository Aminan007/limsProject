<?php


namespace {

include_once("FDLGEN/Class.Doc1.php");

class ADoc20 extends ADoc1 {
    // for familly : Cycle de vie

   function __construct () {
      ADoc1::__construct();

     
     $this->attr["wf_graph"]=new ActionAttribute("wf_graph", "20","Voir le graphe",10,"R","FDL","WORKFLOW_GRAPH&id=%I%","","mwidth=900px|mheight=400px","WDOC");    
     
     $this->attr["wf_graphc"]=new ActionAttribute("wf_graphc", "20","Voir le graphe complet",15,"H","FDL","VIEW_WORKFLOW_GRAPH&type=complet&id=%I%","","","WDOC");    
     
     
     $this->attr["wf_init"]=new MenuAttribute("wf_init", "20","Initialisation",30,"%S%app=FDL&action=WORKFLOW_INIT&id=%I%","W","::canExecute(FDL,WORKFLOW_INIT)","ltarget=_self","WDOC");    
     
     
     $this->attr["dpdoc_fr_dyn"]=new FieldSetAttribute("dpdoc_fr_dyn", "20","Profil dynamique","W","N","frame",$this->attr["FIELD_HIDDENS"],"","WDOC");
     
     $this->attr["wf_tab_states"]=new FieldSetAttribute("wf_tab_states", "20","Étapes","W","N","tab",$this->attr["FIELD_HIDDENS"],"","WDOC");
     
     $this->attr["wf_tab_transitions"]=new FieldSetAttribute("wf_tab_transitions", "20","Transitions","W","N","tab",$this->attr["FIELD_HIDDENS"],"","WDOC");
     
     
     $this->attr["wf_desc"]=new NormalAttribute("wf_desc", "20","description","longtext","",false,20,"",
                                                "W",false,false,true,
						$this->attr["fr_basic"],"","","","","N","","","WDOC");

     
     $this->attr["wf_famid"]=new NormalAttribute("wf_famid", "20","Famille","docid","-1",false,40,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"fdl.php","lfamilies(D,CT):WF_FAMID,CT","","","N","","","WDOC");

     
     $this->attr["wf_fam"]=new NormalAttribute("wf_fam", "20","Famille (titre)","text","",false,50,"",
                                                "H",false,true,false,
						$this->attr["fr_basic"],"","::getTitle(WF_FAMID)","","","N","","elabel=famille compatible avec ce cycle","WDOC");

     
     $this->attr["dpdoc_famid"]=new NormalAttribute("dpdoc_famid", "20","Famille","docid","-1",false,110,"",
                                                "W",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"fdl.php","lfamilies(D,CT):DPDOC_FAMID,CT","","","N","","","WDOC");

     
     $this->attr["dpdoc_fam"]=new NormalAttribute("dpdoc_fam", "20","Famille (titre)","text","",false,120,"",
                                                "H",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"","::getTitle(DPDOC_FAMID)","","","N","","elabel=famille utilisée pour le profil dynamique","WDOC");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"wf_desc"=>30,"wf_famid"=>40,"wf_fam"=>50,"wf_graph"=>60,"wf_graphc"=>70,"wf_init"=>80,"dpdoc_fr_dyn"=>90,"dpdoc_famid"=>100,"dpdoc_fam"=>110,"wf_tab_states"=>120,"wf_tab_transitions"=>130];
     $this->fromids[20]=20;
     $this->fromname='WDOC';

    $this->fields["wf_desc"]="wf_desc";
    $this->fields["wf_famid"]="wf_famid";
    $this->fields["wf_fam"]="wf_fam";
    $this->fields["dpdoc_famid"]="dpdoc_famid";
    $this->fields["dpdoc_fam"]="dpdoc_fam";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Wdoc extends \WDoc {
   //  family : Cycle de vie

   public $dbtable="doc20";
   public $dbseq="seq_doc20";
   public $sqlcreate = array("create table doc20 (wf_desc text,wf_famid text,wf_fam text,dpdoc_famid text,dpdoc_fam text) inherits (doc1);",
     "create sequence seq_doc20 start 1;",
     "alter TABLE doc20 ADD primary key (id);",
     "select setval('seq_doc20', count(distinct initid)+1, false )  from only doc20;");
   

     public $fromid=20;
     public $fromname='WDOC';
     public $fromtitle="Cycle de vie";
     const familyName='WDOC';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc20();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("wf_fam", "::getTitle(WF_FAMID)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("dpdoc_fam", "::getTitle(DPDOC_FAMID)");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Wdoc','_Wdoc');
    class_alias('\Dcp\Family\Wdoc' , 'Doc20');
}

