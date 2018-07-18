<?php


namespace {



class ADoc37 extends ADoc {
    // for familly : Processus

   function __construct () {
      ADoc::__construct();

     
     
     $this->attr["exec_bgexec"]=new MenuAttribute("exec_bgexec", "37","Exécuter maintenant",10,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3AbgExecute%28%29","R","::isLatestExec()","","EXEC");    
     
     $this->attr["exec_reset"]=new MenuAttribute("exec_reset", "37","Abandonner l'exécution en cours",20,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3AresetExecute%28%29","R","::isInprogress()","ltarget=_self","EXEC");    
     
     
     $this->attr["exec_fr_param"]=new FieldSetAttribute("exec_fr_param", "37","Paramètre","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","EXEC");
     
     $this->attr["exec_fr_ident"]=new FieldSetAttribute("exec_fr_ident", "37","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","EXEC");
     
     $this->attr["exec_fr_batch"]=new FieldSetAttribute("exec_fr_batch", "37","Traitement","W","N","frame",$this->attr["FIELD_HIDDENS"],"","EXEC");
     
     $this->attr["exec_fr_date"]=new FieldSetAttribute("exec_fr_date", "37","Dates","W","N","frame",$this->attr["FIELD_HIDDENS"],"","EXEC");
     
     $this->attr["exec_fr_cr"]=new FieldSetAttribute("exec_fr_cr", "37","Compte-rendu","W","N","frame",$this->attr["FIELD_HIDDENS"],"","EXEC");
     
     
     $this->attr["exec_idadmin"]=new NormalAttribute("exec_idadmin", "37","Administrateur","docid","IUSER",false,20,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_param"],"","","","","Q","","elabel=recevra en copie les couriels des rapports d'exécution","EXEC");

     
     $this->attr["exec_iduser"]=new NormalAttribute("exec_iduser", "37","Exécutant","docid","IUSER",false,20,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_ident"],"","","","","N","","doctitle=EXEC_USER","EXEC");

     
     $this->attr["exec_user"]=new NormalAttribute("exec_user", "37","Exécutant (titre)","text","",false,21,"",
                                                "H",false,false,false,
						$this->attr["exec_fr_ident"],"","::getLastTitle(exec_iduser,' )","","","A","","autotitle=yes|relativeOrder=exec_iduser","EXEC");

     
     $this->attr["exec_idref"]=new NormalAttribute("exec_idref", "37","Issue de","docid","BATCH",false,40,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_ident"],"","","","","N","","doctitle=EXEC_REF","EXEC");

     
     $this->attr["exec_ref"]=new NormalAttribute("exec_ref", "37","Issue de (titre)","text","",false,41,"",
                                                "H",false,false,false,
						$this->attr["exec_fr_ident"],"","::getLastTitle(exec_idref,' )","","","A","","autotitle=yes|relativeOrder=exec_idref","EXEC");

     
     $this->attr["exec_status"]=new NormalAttribute("exec_status", "37","Exécution","enum","",false,60,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_ident"],"","none|Non,progressing|En cours,waiting|En attente","","","N","","system=yes","EXEC");

     
     $this->attr["exec_title"]=new NormalAttribute("exec_title", "37","Titre","text","",false,60,"",
                                                "W",false,true,false,
						$this->attr["exec_fr_ident"],"","","","","N","","","EXEC");

     
     $this->attr["exec_statusdate"]=new NormalAttribute("exec_statusdate", "37","Exécution depuis","timestamp","",false,70,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_ident"],"","","","","N","","","EXEC");

     
     $this->attr["exec_application"]=new NormalAttribute("exec_application", "37","Application","text","",false,90,"",
                                                "W",false,true,false,
						$this->attr["exec_fr_batch"],"fdl.php","lapplications(EXEC_APPLICATION):EXEC_APPLICATION","","","N","","","EXEC");

     
     $this->attr["exec_action"]=new NormalAttribute("exec_action", "37","Action","text","",false,100,"",
                                                "W",false,true,false,
						$this->attr["exec_fr_batch"],"fdl.php","lactions(EXEC_APPLICATION,EXEC_ACTION):EXEC_ACTION","","","N","","","EXEC");

     
     $this->attr["exec_api"]=new NormalAttribute("exec_api", "37","Api","text","",false,110,"",
                                                "W",false,true,false,
						$this->attr["exec_fr_batch"],"fdl.php","lapi(EXEC_API):EXEC_API","","","N","","","EXEC");

     
     $this->attr["exec_t_parameters"]=new NormalAttribute("exec_t_parameters", "37","Paramètres","array","",false,120,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_batch"],"","","","","N","","","EXEC");

     
     $this->attr["exec_idvar"]=new NormalAttribute("exec_idvar", "37","Variable","text","",true,130,"",
                                                "W",false,false,false,
						$this->attr["exec_t_parameters"],"","","","","N","","","EXEC");

     
     $this->attr["exec_valuevar"]=new NormalAttribute("exec_valuevar", "37","Valeur","text","",true,140,"",
                                                "W",false,false,false,
						$this->attr["exec_t_parameters"],"","","","","N","","","EXEC");

     
     $this->attr["exec_prevdate"]=new NormalAttribute("exec_prevdate", "37","Précédente date d'exécution","timestamp","",false,160,"%S%app=FDL&action=FDL_CARD&id=%I%&latest=P",
                                                "R",false,false,true,
						$this->attr["exec_fr_date"],"","::getPrevExecDate()","","","N","","ltitle=Voir l'exécution précédente","EXEC");

     
     $this->attr["exec_nextdate"]=new NormalAttribute("exec_nextdate", "37","Prochaine date d'exécution","timestamp","",false,170,"",
                                                "R",false,false,true,
						$this->attr["exec_fr_date"],"","","","","N","","","EXEC");

     
     $this->attr["exec_handnextdate"]=new NormalAttribute("exec_handnextdate", "37","À exécuter le","timestamp","",false,180,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_date"],"","","","::isFutureDate(EXEC_HANDNEXTDATE)","N","","","EXEC");

     
     $this->attr["exec_periodday"]=new NormalAttribute("exec_periodday", "37","Période en jours","int","",false,190,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_date"],"","","","::isInteger(exec_periodday)","N","","elabel=à faire tous les n jours|esize=3","EXEC");

     
     $this->attr["exec_periodhour"]=new NormalAttribute("exec_periodhour", "37","Période en heures","int","",false,200,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_date"],"","","","::isInteger(exec_periodhour)","N","","elabel=à faire tous les n heures|esize=3","EXEC");

     
     $this->attr["exec_periodmin"]=new NormalAttribute("exec_periodmin", "37","Période en minutes","int","",false,210,"",
                                                "W",false,false,false,
						$this->attr["exec_fr_date"],"","","","::isInteger(exec_periodmin)","N","","elabel=à faire tous les n minutes|esize=3","EXEC");

     
     $this->attr["exec_periodenddate"]=new NormalAttribute("exec_periodenddate", "37","Jusqu'au","timestamp","",false,220,"",
                                                "H",false,false,false,
						$this->attr["exec_fr_date"],"","","","::isFutureDate(EXEC_PERIODENDDATE)","N","","","EXEC");

     
     $this->attr["exec_perioddaynumber"]=new NormalAttribute("exec_perioddaynumber", "37","Jour de la semaine","enum","",false,230,"",
                                                "H",false,false,false,
						$this->attr["exec_fr_date"],""," |---,1|Lundi,2|Mardi,3|Mercredi,4|Jeudi,5|Vendredi,6|Samedi,7|Dimanche","","","N","","system=yes,bmenu=no","EXEC");

     
     $this->attr["exec_date"]=new NormalAttribute("exec_date", "37","Date d'exécution","timestamp","%A %d %B %Y %X",false,270,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_cr"],"","","","","N","","","EXEC");

     
     $this->attr["exec_elapsed"]=new NormalAttribute("exec_elapsed", "37","Durée d'exécution","time","%H:%M:%S",false,280,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_cr"],"","","","","N","","","EXEC");

     
     $this->attr["exec_state"]=new NormalAttribute("exec_state", "37","Statut","text","",false,290,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_cr"],"","","","","N","","","EXEC");

     
     $this->attr["exec_detail"]=new NormalAttribute("exec_detail", "37","Détail","ifile","",false,300,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_cr"],"","","","","N","","","EXEC");

     
     $this->attr["exec_detaillog"]=new NormalAttribute("exec_detaillog", "37","Log","longtext","",false,310,"",
                                                "R",false,false,false,
						$this->attr["exec_fr_cr"],"","","","","N","","","EXEC");

     
		
	 $this->absoluteOrders=["exec_fr_param"=>10,"exec_idadmin"=>20,"exec_fr_ident"=>30,"exec_iduser"=>40,"exec_user"=>50,"exec_idref"=>60,"exec_ref"=>70,"exec_status"=>80,"exec_title"=>90,"exec_statusdate"=>100,"exec_bgexec"=>110,"exec_reset"=>120,"exec_fr_batch"=>130,"exec_application"=>140,"exec_action"=>150,"exec_api"=>160,"exec_t_parameters"=>170,"exec_idvar"=>180,"exec_valuevar"=>190,"exec_fr_date"=>200,"exec_prevdate"=>210,"exec_nextdate"=>220,"exec_handnextdate"=>230,"exec_periodday"=>240,"exec_periodhour"=>250,"exec_periodmin"=>260,"exec_periodenddate"=>270,"exec_perioddaynumber"=>280,"exec_fr_cr"=>290,"exec_date"=>300,"exec_elapsed"=>310,"exec_state"=>320,"exec_detail"=>330,"exec_detaillog"=>340];
     $this->fromids[37]=37;
     $this->fromname='EXEC';

    $this->fields["exec_iduser"]="exec_iduser";
    $this->fields["exec_user"]="exec_user";
    $this->fields["exec_idref"]="exec_idref";
    $this->fields["exec_ref"]="exec_ref";
    $this->fields["exec_status"]="exec_status";
    $this->fields["exec_title"]="exec_title";
    $this->fields["exec_statusdate"]="exec_statusdate";
    $this->fields["exec_application"]="exec_application";
    $this->fields["exec_action"]="exec_action";
    $this->fields["exec_api"]="exec_api";
    $this->fields["exec_idvar"]="exec_idvar";
    $this->fields["exec_valuevar"]="exec_valuevar";
    $this->fields["exec_prevdate"]="exec_prevdate";
    $this->fields["exec_nextdate"]="exec_nextdate";
    $this->fields["exec_handnextdate"]="exec_handnextdate";
    $this->fields["exec_periodday"]="exec_periodday";
    $this->fields["exec_periodhour"]="exec_periodhour";
    $this->fields["exec_periodmin"]="exec_periodmin";
    $this->fields["exec_periodenddate"]="exec_periodenddate";
    $this->fields["exec_perioddaynumber"]="exec_perioddaynumber";
    $this->fields["exec_date"]="exec_date";
    $this->fields["exec_elapsed"]="exec_elapsed";
    $this->fields["exec_state"]="exec_state";
    $this->fields["exec_detail"]="exec_detail";
    $this->fields["exec_detaillog"]="exec_detaillog";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Exec extends \Dcp\Core\ExecProcessus {
   //  family : Processus

   public $dbtable="doc37";
   public $dbseq="seq_doc37";
   public $sqlcreate = array("create table doc37 (exec_iduser text,exec_user text,exec_idref text,exec_ref text,exec_status text,exec_title text,exec_statusdate timestamp without time zone,exec_application text,exec_action text,exec_api text,exec_idvar text,exec_valuevar text,exec_prevdate timestamp without time zone,exec_nextdate timestamp without time zone,exec_handnextdate timestamp without time zone,exec_periodday int4,exec_periodhour int4,exec_periodmin int4,exec_periodenddate timestamp without time zone,exec_perioddaynumber text,exec_date timestamp without time zone,exec_elapsed time,exec_state text,exec_detail text,exec_detaillog text) inherits (doc);",
     "create sequence seq_doc37 start 1;",
     "alter TABLE doc37 ADD primary key (id);",
     "select setval('seq_doc37', count(distinct initid)+1, false )  from only doc37;");
   

     public $fromid=37;
     public $fromname='EXEC';
     public $fromtitle="Processus";
     const familyName='EXEC';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc37();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("exec_prevdate", "::getPrevExecDate()");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("exec_user", "::getLastTitle(exec_iduser,' )");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("exec_ref", "::getLastTitle(exec_idref,' )");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Exec','_Exec');
    class_alias('\Dcp\Family\Exec' , 'Doc37');
}

