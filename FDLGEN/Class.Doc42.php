<?php


namespace {



class ADoc42 extends ADoc {
    // for familly : Minuteur

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["tm_fr_ident"]=new FieldSetAttribute("tm_fr_ident", "42","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","TIMER");
     
     
     $this->attr["tm_title"]=new NormalAttribute("tm_title", "42","Titre","text","",false,20,"",
                                                "W",true,true,false,
						$this->attr["tm_fr_ident"],"","","","","N","","","TIMER");

     
     $this->attr["tm_family"]=new NormalAttribute("tm_family", "42","Famille","docid","x",false,30,"",
                                                "W",false,false,false,
						$this->attr["tm_fr_ident"],"fdl.php","lfamilies(D, CT):TM_FAMILY,CT","","","N","","elabel=famille compatible avec ce timer","TIMER");

     
     $this->attr["tm_workflow"]=new NormalAttribute("tm_workflow", "42","Famille cycle","docid","x",false,40,"",
                                                "W",false,false,false,
						$this->attr["tm_fr_ident"],"fdl.php","lfamilies(D, CT,20):TM_WORKFLOW,CT","","","N","","elabel=famille cycle pour le choix des états","TIMER");

     
     $this->attr["tm_dyndate"]=new NormalAttribute("tm_dyndate", "42","Date de référence","text","",false,50,"",
                                                "W",false,false,false,
						$this->attr["tm_fr_ident"],"fdl.php","getFamAttribute(D,TM_FAMILY,'date|timestamp,0,TM_DYNDATE):TM_DYNDATE","","","N","","elabel=date d'exécution de la première action|showempty=Date d'attachement du minuteur","TIMER");

     
     $this->attr["tm_refdaydelta"]=new NormalAttribute("tm_refdaydelta", "42","Décalage (en jours)","double","",false,60,"",
                                                "W",false,false,false,
						$this->attr["tm_fr_ident"],"","","","::isFloat(tm_refdaydelta)","N","","cwidth=50px","TIMER");

     
     $this->attr["tm_refhourdelta"]=new NormalAttribute("tm_refhourdelta", "42","Décalage (en heures)","double","",false,70,"",
                                                "W",false,false,false,
						$this->attr["tm_fr_ident"],"","","","::isFloat(tm_refhourdelta)","N","","cwidth=50px","TIMER");

     
     $this->attr["tm_t_config"]=new NormalAttribute("tm_t_config", "42","Configuration","array","",false,80,"",
                                                "W",false,false,false,
						$this->attr["tm_fr_ident"],"","","","","N","","vlabel=up","TIMER");

     
     $this->attr["tm_delay"]=new NormalAttribute("tm_delay", "42","Délai (en jours)","double","",true,90,"",
                                                "W",false,false,false,
						$this->attr["tm_t_config"],"","","","::isFloat(tm_delay)","N","","cwidth=50px","TIMER");

     
     $this->attr["tm_hdelay"]=new NormalAttribute("tm_hdelay", "42","Délai (en heures)","double","",true,100,"",
                                                "W",false,false,false,
						$this->attr["tm_t_config"],"","","","::isFloat(tm_hdelay)","N","","cwidth=50px","TIMER");

     
     $this->attr["tm_iteration"]=new NormalAttribute("tm_iteration", "42","Nombre d'itérations","int","",true,110,"",
                                                "W",false,false,false,
						$this->attr["tm_t_config"],"","","","::isInteger(tm_iteration)","N","","cwidth=50px","TIMER");

     
     $this->attr["tm_tmail"]=new NormalAttribute("tm_tmail", "42","Modèle de mail","docid","MAILTEMPLATE",true,120,"",
                                                "W",false,false,false,
						$this->attr["tm_t_config"],"","","%S%app=GENERIC&action=GENERIC_EDIT&famid=MAILTEMPLATE&TMAIL_FAMILY=%TM_FAMILY%&TMAIL_WORKFLOW=%TM_WORKFLOW%&id=%TM_TMAIL%","","N","","multiple=yes","TIMER");

     
     $this->attr["tm_state"]=new NormalAttribute("tm_state", "42","Nouvel état","text","",true,130,"",
                                                "W",false,false,false,
						$this->attr["tm_t_config"],"fdl.php","lstates(D,TM_WORKFLOW,TM_STATE):TM_STATE","","","N","","","TIMER");

     
     $this->attr["tm_method"]=new NormalAttribute("tm_method", "42","Méthode","text","",true,140,"",
                                                "W",false,false,false,
						$this->attr["tm_t_config"],"fdl.php","lmethods(D,TM_FAMILY,TM_METHOD):TM_METHOD","","","N","","","TIMER");

     
		
	 $this->absoluteOrders=["tm_fr_ident"=>10,"tm_title"=>20,"tm_family"=>30,"tm_workflow"=>40,"tm_dyndate"=>50,"tm_refdaydelta"=>60,"tm_refhourdelta"=>70,"tm_t_config"=>80,"tm_delay"=>90,"tm_hdelay"=>100,"tm_iteration"=>110,"tm_tmail"=>120,"tm_state"=>130,"tm_method"=>140];
     $this->fromids[42]=42;
     $this->fromname='TIMER';

    $this->fields["tm_title"]="tm_title";
    $this->fields["tm_family"]="tm_family";
    $this->fields["tm_workflow"]="tm_workflow";
    $this->fields["tm_dyndate"]="tm_dyndate";
    $this->fields["tm_refdaydelta"]="tm_refdaydelta";
    $this->fields["tm_refhourdelta"]="tm_refhourdelta";
    $this->fields["tm_delay"]="tm_delay";
    $this->fields["tm_hdelay"]="tm_hdelay";
    $this->fields["tm_iteration"]="tm_iteration";
    $this->fields["tm_tmail"]="tm_tmail";
    $this->fields["tm_state"]="tm_state";
    $this->fields["tm_method"]="tm_method";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Timer extends \Dcp\Core\Timer {
   //  family : Minuteur

   public $dbtable="doc42";
   public $dbseq="seq_doc42";
   public $sqlcreate = array("create table doc42 (tm_title text,tm_family text,tm_workflow text,tm_dyndate text,tm_refdaydelta float8,tm_refhourdelta float8,tm_delay text,tm_hdelay text,tm_iteration text,tm_tmail text,tm_state text,tm_method text) inherits (doc);",
     "create sequence seq_doc42 start 1;",
     "alter TABLE doc42 ADD primary key (id);",
     "select setval('seq_doc42', count(distinct initid)+1, false )  from only doc42;");
   

     public $fromid=42;
     public $fromname='TIMER';
     public $fromtitle="Minuteur";
     const familyName='TIMER';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc42();
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
    class_alias('\Dcp\Family\Timer','_Timer');
    class_alias('\Dcp\Family\Timer' , 'Doc42');
}

