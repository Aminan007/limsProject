<?php


namespace {

include_once("FDLGEN/Class.Doc1.php");

class ADoc2 extends ADoc1 {
    // for familly : dossier

   function __construct () {
      ADoc1::__construct();

     
     
     $this->attr["fld_open"]=new MenuAttribute("fld_open", "2","Ouvrir",20,"%S%app=FREEDOM&action=FREEDOM_VIEW&dirid=%I%","R","","","DIR");    
     
     $this->attr["fld_copybasket"]=new MenuAttribute("fld_copybasket", "2","Insérer le porte-document",30,"C%S%app=FREEDOM&action=FREEDOM_INSERTFLD&id=%I%&dirid={FREEDOM_IDBASKET}&clean=Y","R","","","DIR");    
     
     $this->attr["fld_openfolio"]=new MenuAttribute("fld_openfolio", "2","Ouvrir comme une chemise",40,"C%S%app=FREEDOM&action=OPENFOLIO&id=%I%","R","","","DIR");    
     
     $this->attr["fld_insertdoc"]=new MenuAttribute("fld_insertdoc", "2","Insérer des documents",50,"C%S%app=FDL&action=EDITINSERTDOCUMENT&id=%I%","R","","ltarget=_self","DIR");    
     
     $this->attr["fld_setsysrss"]=new MenuAttribute("fld_setsysrss", "2","RSS visible/masquée aux utilisateurs",60,"C%S%app=FREEDOM&action=SETSYSRSS&id=%I%","R","","ltarget=_self","DIR");    
     
     
     $this->attr["fld_fr_rest"]=new FieldSetAttribute("fld_fr_rest", "2","Restrictions","R","N","frame",$this->attr["FIELD_HIDDENS"],"","DIR");
     
     $this->attr["fld_fr_prof"]=new FieldSetAttribute("fld_fr_prof", "2","Profils par défaut","R","N","frame",$this->attr["FIELD_HIDDENS"],"","DIR");
     
     
     $this->attr["ba_desc"]=new NormalAttribute("ba_desc", "2","Description","longtext","",false,20,"",
                                                "W",false,false,true,
						$this->attr["fr_basic"],"","","","","N","","","DIR");

     
     $this->attr["gui_color"]=new NormalAttribute("gui_color", "2","Couleur intercalaire","color","",false,30,"",
                                                "O",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","DIR");

     
     $this->attr["gui_isrss"]=new NormalAttribute("gui_isrss", "2","Utilisable comme flux RSS","enum","",false,32,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"","no|non,yes|oui","","","N","bool","bmenu=no|system=yes","DIR");

     
     $this->attr["gui_sysrss"]=new NormalAttribute("gui_sysrss", "2","Flux RSS système","enum","",false,33,"",
                                                "R",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","bmenu=no|system=yes","DIR");

     
     $this->attr["fld_allbut"]=new NormalAttribute("fld_allbut", "2","Tout ou rien","enum","",false,1000,"",
                                                "W",false,false,false,
						$this->attr["fld_fr_rest"],"-","0|tout sauf,1|seulement","","","N","","system=yes","DIR");

     
     $this->attr["fld_tfam"]=new NormalAttribute("fld_tfam", "2","Familles filtrées","array","",false,1005,"",
                                                "W",false,false,false,
						$this->attr["fld_fr_rest"],"","","","","N","","vlabel=none","DIR");

     
     $this->attr["fld_fam"]=new NormalAttribute("fld_fam", "2","Familles (titre)","text","",true,1010,"",
                                                "H",false,false,false,
						$this->attr["fld_tfam"],"","::getTitle(FLD_FAMIDS)","","","N","","","DIR");

     
     $this->attr["fld_famids"]=new NormalAttribute("fld_famids", "2","Familles","docid","-1",true,1015,"",
                                                "W",false,false,false,
						$this->attr["fld_tfam"],"fdl.php","lfamilies(D,CT):FLD_FAMIDS,CT","","","N","","","DIR");

     
     $this->attr["fld_subfam"]=new NormalAttribute("fld_subfam", "2","Restriction sous famille","enum","",true,1020,"",
                                                "W",false,false,false,
						$this->attr["fld_tfam"],"","yes|inclure les sous familles,no|ne pas inclure les sous familles","","","N","bool","bmenu=no|system=yes","DIR");

     
     $this->attr["fld_pdoc"]=new NormalAttribute("fld_pdoc", "2","Profil par défaut de document (titre)","text","",false,1030,"",
                                                "H",false,false,false,
						$this->attr["fld_fr_prof"],"","::getTitle(FLD_PDOCID)","","","N","","","DIR");

     
     $this->attr["fld_pdocid"]=new NormalAttribute("fld_pdocid", "2","Profil par défaut de document","docid","PDOC",false,1040,"",
                                                "W",false,false,false,
						$this->attr["fld_fr_prof"],"fdl.php","lfamilly(D,PDOC,CT):FLD_PDOCID,CT","","","N","","","DIR");

     
     $this->attr["fld_pdir"]=new NormalAttribute("fld_pdir", "2","Profil par défaut de dossier (titre)","text","",false,1050,"",
                                                "H",false,false,false,
						$this->attr["fld_fr_prof"],"","::getTitle(FLD_PDIRID):FLD_PDIR","","","N","","","DIR");

     
     $this->attr["fld_pdirid"]=new NormalAttribute("fld_pdirid", "2","Profil par défaut de dossier","docid","PDIR",false,1060,"",
                                                "W",false,false,false,
						$this->attr["fld_fr_prof"],"fdl.php","lfamilly(D,PDIR,CT):FLD_PDIRID,CT","","","N","","","DIR");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"fld_open"=>70,"fld_copybasket"=>80,"fld_openfolio"=>90,"fld_insertdoc"=>100,"fld_setsysrss"=>110,"fld_fr_rest"=>120,"fld_allbut"=>130,"fld_tfam"=>140,"fld_fam"=>150,"fld_famids"=>160,"fld_subfam"=>170,"fld_fr_prof"=>180,"fld_pdoc"=>190,"fld_pdocid"=>200,"fld_pdir"=>210,"fld_pdirid"=>220];
     $this->fromids[2]=2;
     $this->fromname='DIR';

    $this->fields["ba_desc"]="ba_desc";
    $this->fields["gui_color"]="gui_color";
    $this->fields["gui_isrss"]="gui_isrss";
    $this->fields["gui_sysrss"]="gui_sysrss";
    $this->fields["fld_allbut"]="fld_allbut";
    $this->fields["fld_fam"]="fld_fam";
    $this->fields["fld_famids"]="fld_famids";
    $this->fields["fld_subfam"]="fld_subfam";
    $this->fields["fld_pdoc"]="fld_pdoc";
    $this->fields["fld_pdocid"]="fld_pdocid";
    $this->fields["fld_pdir"]="fld_pdir";
    $this->fields["fld_pdirid"]="fld_pdirid";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Dir extends \Dir {
   //  family : dossier

   public $dbtable="doc2";
   public $dbseq="seq_doc2";
   public $sqlcreate = array("create table doc2 (ba_desc text,gui_color text,gui_isrss text,gui_sysrss text,fld_allbut text,fld_fam text,fld_famids text,fld_subfam text,fld_pdoc text,fld_pdocid text,fld_pdir text,fld_pdirid text) inherits (doc1);",
     "create sequence seq_doc2 start 1;",
     "alter TABLE doc2 ADD primary key (id);",
     "select setval('seq_doc2', count(distinct initid)+1, false )  from only doc2;");
   

     public $fromid=2;
     public $fromname='DIR';
     public $fromtitle="dossier";
     const familyName='DIR';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc2();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("fld_fam", "::getTitle(FLD_FAMIDS)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("fld_pdoc", "::getTitle(FLD_PDOCID)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("FLD_PDIR", "::getTitle(FLD_PDIRID):FLD_PDIR");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Dir','_Dir');
    class_alias('\Dcp\Family\Dir' , 'Doc2');
}

