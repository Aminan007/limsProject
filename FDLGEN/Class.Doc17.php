<?php


namespace {

include_once("FDLGEN/Class.Doc2.php");

class ADoc17 extends ADoc2 {
    // for familly : chemise

   function __construct () {
      ADoc2::__construct();

     
     
     $this->attr["pfl_open"]=new MenuAttribute("pfl_open", "17","ouvrir",10,"%S%&app=FREEDOM&action=OPENFOLIO&id=%I%","W","","","PORTFOLIO");    
     
     $this->attr["fld_open"]=new MenuAttribute("fld_open", "17","ouvrir",20,"","H","","","PORTFOLIO");    
     
     $this->attr["fld_openfolio"]=new MenuAttribute("fld_openfolio", "17","ouvrir comme une chemise",20,"","H","","","PORTFOLIO");    
     
     
     $this->attr["pfl_fr_init"]=new FieldSetAttribute("pfl_fr_init", "17","Affichage de la chemise","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","PORTFOLIO");
     
     
     $this->attr["pfl_liststyle"]=new NormalAttribute("pfl_liststyle", "17","style de la liste","enum","",false,110,"",
                                                "W",false,false,false,
						$this->attr["pfl_fr_init"],"","list|Liste,icon|Icone","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_savetab"]=new NormalAttribute("pfl_savetab", "17","affichage dernier onglet consulté","enum","",false,120,"",
                                                "W",false,false,false,
						$this->attr["pfl_fr_init"],"","0|Non,1|Oui","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_savedispo"]=new NormalAttribute("pfl_savedispo", "17","affichage dernière disposition","enum","",false,130,"",
                                                "W",false,false,false,
						$this->attr["pfl_fr_init"],"","1|Oui,0|Non","","","Q","","elabel=affichage des derniers documents consultés","PORTFOLIO");

     
     $this->attr["pfl_t_linktab"]=new NormalAttribute("pfl_t_linktab", "17","Onglets à lier (dynamique)","array","",false,140,"",
                                                "W",false,false,false,
						$this->attr["pfl_fr_init"],"","","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_idlinktab"]=new NormalAttribute("pfl_idlinktab", "17","id onglet à lier","docid","DIR",true,150,"",
                                                "W",false,false,false,
						$this->attr["pfl_t_linktab"],"fdl.php","ltabs(D,CT):PFL_IDLINKTAB,CT","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_linktab"]=new NormalAttribute("pfl_linktab", "17","onglet à lier","text","",true,160,"",
                                                "H",false,false,false,
						$this->attr["pfl_t_linktab"],"","::getTitle(PFL_IDLINKTAB)","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_t_copytab"]=new NormalAttribute("pfl_t_copytab", "17","Onglets à copier pour les nouveaux documents","array","",false,170,"",
                                                "W",false,false,false,
						$this->attr["pfl_fr_init"],"","","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_idcopytab"]=new NormalAttribute("pfl_idcopytab", "17","id onglet à copier","docid","DIR",true,180,"",
                                                "W",false,false,false,
						$this->attr["pfl_t_copytab"],"fdl.php","ltabs(D,CT):PFL_IDCOPYTAB,CT","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_copytab"]=new NormalAttribute("pfl_copytab", "17","onglet à copier","text","",true,190,"",
                                                "H",false,false,false,
						$this->attr["pfl_t_copytab"],"","::getTitle(PFL_IDCOPYTAB)","","","Q","","","PORTFOLIO");

     
     $this->attr["pfl_iddef"]=new NormalAttribute("pfl_iddef", "17","id chemise defaut","docid","",false,1100,"",
                                                "H",false,false,false,
						$this->attr["fld_fr_prof"],"","","","","N","","","PORTFOLIO");

     
     $this->attr["pfl_def"]=new NormalAttribute("pfl_def", "17","chemise defaut","text","",false,1110,"%S%&app=FDL&action=FDL_CARD&id=%PFL_IDDEF%",
                                                "H",false,false,false,
						$this->attr["fld_fr_prof"],"fdl.php","lfamily(D,PORTFOLIO,PFL_DEF):PFL_IDDEF,PFL_DEF","%S%&app=FREEDOM&action=OPENFOLIO&id=%PFL_IDDEF%","","N","","","PORTFOLIO");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"pfl_open"=>70,"fld_openfolio"=>80,"fld_copybasket"=>90,"fld_insertdoc"=>100,"fld_setsysrss"=>110,"pfl_fr_init"=>120,"pfl_liststyle"=>130,"pfl_savetab"=>140,"pfl_savedispo"=>150,"pfl_t_linktab"=>160,"pfl_idlinktab"=>170,"pfl_linktab"=>180,"pfl_t_copytab"=>190,"pfl_idcopytab"=>200,"pfl_copytab"=>210,"fld_fr_rest"=>220,"fld_allbut"=>230,"fld_tfam"=>240,"fld_fam"=>250,"fld_famids"=>260,"fld_subfam"=>270,"fld_fr_prof"=>280,"fld_pdoc"=>290,"fld_pdocid"=>300,"fld_pdir"=>310,"fld_pdirid"=>320,"pfl_iddef"=>330,"pfl_def"=>340,"fld_open"=>350];
     $this->fromids[17]=17;
     $this->fromname='PORTFOLIO';

    $this->fields["pfl_iddef"]="pfl_iddef";
    $this->fields["pfl_def"]="pfl_def";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Portfolio extends \Dcp\Core\PortFolio {
   //  family : chemise

   public $dbtable="doc17";
   public $dbseq="seq_doc17";
   public $sqlcreate = array("create table doc17 (pfl_iddef text,pfl_def text) inherits (doc2);",
     "create sequence seq_doc17 start 1;",
     "alter TABLE doc17 ADD primary key (id);",
     "select setval('seq_doc17', count(distinct initid)+1, false )  from only doc17;");
   

     public $fromid=17;
     public $fromname='PORTFOLIO';
     public $fromtitle="chemise";
     const familyName='PORTFOLIO';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc17();
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
    class_alias('\Dcp\Family\Portfolio','_Portfolio');
    class_alias('\Dcp\Family\Portfolio' , 'Doc17');
}

