<?php


namespace {



class ADoc1064 extends ADoc {
    // for familly : Assemblage

   function __construct () {
      ADoc::__construct();

     
     
     $this->attr["coll_gen_allodt"]=new MenuAttribute("coll_gen_allodt", "1064","<b>Assembler</b>",30,"%S%app=FDL&action=FDL_METHOD&method=collating&id=%I%","R","::canEditMenu()","ltarget=_self|ltitle=Assembler l'ensemble des chapitres","COLLATING");    
     
     
     $this->attr["coll_fr_info"]=new FieldSetAttribute("coll_fr_info", "1064","Contenu","W","N","frame",$this->attr["FIELD_HIDDENS"],"","COLLATING");
     
     $this->attr["coll_fr_product"]=new FieldSetAttribute("coll_fr_product", "1064","Génération","W","N","frame",$this->attr["FIELD_HIDDENS"],"","COLLATING");
     
     $this->attr["coll_fr_chapters"]=new FieldSetAttribute("coll_fr_chapters", "1064","Mise en pages","W","N","frame",$this->attr["FIELD_HIDDENS"],"vlabel=none","COLLATING");
     
     
     $this->attr["coll_title"]=new NormalAttribute("coll_title", "1064","Titre","text","",false,2010,"",
                                                "W",false,true,false,
						$this->attr["coll_fr_info"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_abstract"]=new NormalAttribute("coll_abstract", "1064","Résumé","longtext","",false,2020,"",
                                                "W",false,false,false,
						$this->attr["coll_fr_info"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_allott"]=new NormalAttribute("coll_allott", "1064","Fichier principal","file","",false,2030,"",
                                                "W",true,false,false,
						$this->attr["coll_fr_info"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_datemodif"]=new NormalAttribute("coll_datemodif", "1064","Date de dernière modification","timestamp","",false,2050,"",
                                                "R",false,false,false,
						$this->attr["coll_fr_product"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_allodt"]=new NormalAttribute("coll_allodt", "1064","Fichier assemblé","file","",false,2060,"",
                                                "R",false,false,false,
						$this->attr["coll_fr_product"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_allpdf"]=new NormalAttribute("coll_allpdf", "1064","Version PDF","file","",false,2070,"",
                                                "R",false,false,false,
						$this->attr["coll_fr_product"],"","::convertVaultFile(COLL_ALLODT,'pdf)","","","N","","","COLLATING");

     
     $this->attr["coll_datepdf"]=new NormalAttribute("coll_datepdf", "1064","Date de production","timestamp","",false,2080,"",
                                                "R",false,false,false,
						$this->attr["coll_fr_product"],"","::getFileInfo(COLL_ALLPDF,'mdate)","","","N","","","COLLATING");

     
     $this->attr["coll_t_chapters"]=new NormalAttribute("coll_t_chapters", "1064","Chapitres","array","",false,2100,"",
                                                "W",false,false,false,
						$this->attr["coll_fr_chapters"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_famid"]=new NormalAttribute("coll_famid", "1064","Famille (id)","docid","",true,2110,"",
                                                "H",false,false,false,
						$this->attr["coll_t_chapters"],"","::getTitle(COLL_FAMID):COLL_FAM","","","N","","","COLLATING");

     
     $this->attr["coll_fam"]=new NormalAttribute("coll_fam", "1064","Famille","text","",true,2120,"%S%app=FDL&action=FDL_CARD&id=%COLL_FAMID%",
                                                "W",false,false,false,
						$this->attr["coll_t_chapters"],"fdl.php","lfamilies(D,COLL_FAM):COLL_FAMID,COLL_FAM","","","N","","","COLLATING");

     
     $this->attr["coll_chapid"]=new NormalAttribute("coll_chapid", "1064","Chapitre (id)","docid","",true,2130,"",
                                                "H",false,false,false,
						$this->attr["coll_t_chapters"],"","::getTitle(COLL_CHAPID):COLL_CHAP","","","N","","","COLLATING");

     
     $this->attr["coll_chap"]=new NormalAttribute("coll_chap", "1064","Chapitre","text","",true,2140,"%S%app=FDL&action=FDL_CARD&id=%COLL_CHAPID%",
                                                "W",false,false,false,
						$this->attr["coll_t_chapters"],"fdl.php","lfamily(D,COLL_FAMID,COLL_CHAP):COLL_CHAPID,COLL_CHAP","","","N","","","COLLATING");

     
     $this->attr["coll_attrid"]=new NormalAttribute("coll_attrid", "1064","Attribut","text","",true,2150,"",
                                                "W",false,false,false,
						$this->attr["coll_t_chapters"],"fdl.php","getFamAttribute(D,COLL_FAMID,'file,0,COLL_ATTRID):COLL_ATTRID","","","N","","","COLLATING");

     
     $this->attr["coll_chapfile"]=new NormalAttribute("coll_chapfile", "1064","Fichier","file","",true,2160,"",
                                                "R",false,false,false,
						$this->attr["coll_t_chapters"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_statefilter"]=new NormalAttribute("coll_statefilter", "1064","État attendu","text","",true,2170,"",
                                                "W",false,false,false,
						$this->attr["coll_t_chapters"],"book.php","lbookstates(D,COLL_CHAPID):COLL_STATEFILTER","","","N","","","COLLATING");

     
     $this->attr["coll_chapstate"]=new NormalAttribute("coll_chapstate", "1064","État réel","text","",true,2180,"",
                                                "R",false,false,false,
						$this->attr["coll_t_chapters"],"","","","","N","","","COLLATING");

     
     $this->attr["coll_chapfiledate"]=new NormalAttribute("coll_chapfiledate", "1064","Date","timestamp","",true,2190,"",
                                                "R",false,false,false,
						$this->attr["coll_t_chapters"],"","","","","N","","","COLLATING");

     
		
	 $this->absoluteOrders=["coll_gen_allodt"=>10,"coll_fr_info"=>20,"coll_title"=>30,"coll_abstract"=>40,"coll_allott"=>50,"coll_fr_product"=>60,"coll_datemodif"=>70,"coll_allodt"=>80,"coll_allpdf"=>90,"coll_datepdf"=>100,"coll_fr_chapters"=>110,"coll_t_chapters"=>120,"coll_famid"=>130,"coll_fam"=>140,"coll_chapid"=>150,"coll_chap"=>160,"coll_attrid"=>170,"coll_chapfile"=>180,"coll_statefilter"=>190,"coll_chapstate"=>200,"coll_chapfiledate"=>210];
     $this->fromids[1064]=1064;
     $this->fromname='COLLATING';

    $this->fields["coll_title"]="coll_title";
    $this->fields["coll_abstract"]="coll_abstract";
    $this->fields["coll_allott"]="coll_allott";
    $this->fields["coll_datemodif"]="coll_datemodif";
    $this->fields["coll_allodt"]="coll_allodt";
    $this->fields["coll_allpdf"]="coll_allpdf";
    $this->fields["coll_datepdf"]="coll_datepdf";
    $this->fields["coll_famid"]="coll_famid";
    $this->fields["coll_fam"]="coll_fam";
    $this->fields["coll_chapid"]="coll_chapid";
    $this->fields["coll_chap"]="coll_chap";
    $this->fields["coll_attrid"]="coll_attrid";
    $this->fields["coll_chapfile"]="coll_chapfile";
    $this->fields["coll_statefilter"]="coll_statefilter";
    $this->fields["coll_chapstate"]="coll_chapstate";
    $this->fields["coll_chapfiledate"]="coll_chapfiledate";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Collating extends \Dcp\Book\Collating {
   //  family : Assemblage

   public $dbtable="doc1064";
   public $dbseq="seq_doc1064";
   public $sqlcreate = array("create table doc1064 (coll_title text,coll_abstract text,coll_allott text,coll_datemodif timestamp without time zone,coll_allodt text,coll_allpdf text,coll_datepdf timestamp without time zone,coll_famid text,coll_fam text,coll_chapid text,coll_chap text,coll_attrid text,coll_chapfile text,coll_statefilter text,coll_chapstate text,coll_chapfiledate text) inherits (doc);",
     "create sequence seq_doc1064 start 1;",
     "alter TABLE doc1064 ADD primary key (id);",
     "select setval('seq_doc1064', count(distinct initid)+1, false )  from only doc1064;");
   

     public $fromid=1064;
     public $fromname='COLLATING';
     public $fromtitle="Assemblage";
     const familyName='COLLATING';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1064();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("coll_allpdf", "::convertVaultFile(COLL_ALLODT,'pdf)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("coll_datepdf", "::getFileInfo(COLL_ALLPDF,'mdate)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("COLL_FAM", "::getTitle(COLL_FAMID):COLL_FAM");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("COLL_CHAP", "::getTitle(COLL_CHAPID):COLL_CHAP");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Collating','_Collating');
    class_alias('\Dcp\Family\Collating' , 'Doc1064');
}

