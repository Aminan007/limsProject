<?php


namespace {

include_once("FDLGEN/Class.Doc36.php");

class ADoc1004 extends ADoc36 {
    // for familly : Publipostage

   function __construct () {
      ADoc36::__construct();

     
     $this->attr["pubm_send"]=new ActionAttribute("pubm_send", "1004","Envoyer",200,"W","FDL","IMPCARD&zone=FDL:FDL_PUBMAIL","","submenu=actions|lconfirm=yes","PUBLIMAIL");    
     
     $this->attr["pubm_display"]=new ActionAttribute("pubm_display", "1004","Afficher",200,"W","FDL","VIEWSCARD&zone=FDL:FDL_PUBDISPLAY","","submenu=actions|barmenu=yes","PUBLIMAIL");    
     
     $this->attr["pubm_preview"]=new ActionAttribute("pubm_preview", "1004","Prévisualisation",205,"W","FDL","VIEWSCARD&zone=FDL:FDL_PUBPREVIEW","","submenu=actions","PUBLIMAIL");    
     
     $this->attr["pubm_print"]=new ActionAttribute("pubm_print", "1004","Imprimer",210,"W","FDL","VIEWSCARD&zone=FDL:FDL_PUBPRINT","","submenu=actions|barmenu=yes","PUBLIMAIL");    
     
     
     
     $this->attr["fr_basic"]=new FieldSetAttribute("fr_basic", "1004","Basique","H","N","frame",$this->attr["FIELD_HIDDENS"],"","PUBLIMAIL");
     
     $this->attr["pubm_fr_ident"]=new FieldSetAttribute("pubm_fr_ident", "1004","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","PUBLIMAIL");
     
     $this->attr["pubm_fr_body"]=new FieldSetAttribute("pubm_fr_body", "1004","Corps","W","N","frame",$this->attr["FIELD_HIDDENS"],"","PUBLIMAIL");
     
     $this->attr["pubm_fr_att"]=new FieldSetAttribute("pubm_fr_att", "1004","Attachements","W","N","frame",$this->attr["FIELD_HIDDENS"],"","PUBLIMAIL");
     
     $this->attr["pubm_fr_config"]=new FieldSetAttribute("pubm_fr_config", "1004","Configuration","W","N","frame",$this->attr["FIELD_HIDDENS"],"","PUBLIMAIL");
     
     
     $this->attr["ba_title"]=new NormalAttribute("ba_title", "1004","Titre","text","",false,1,"",
                                                "H",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_title"]=new NormalAttribute("pubm_title", "1004","Sujet","text","",false,110,"",
                                                "W",true,true,false,
						$this->attr["pubm_fr_ident"],"","","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_body"]=new NormalAttribute("pubm_body", "1004","Corps du message","htmltext","",false,140,"",
                                                "W",false,false,false,
						$this->attr["pubm_fr_body"],"","","","","N","","toolbar=DocAttr","PUBLIMAIL");

     
     $this->attr["pubm_bgimg"]=new NormalAttribute("pubm_bgimg", "1004","Image de fond","image","",false,150,"",
                                                "W",false,false,false,
						$this->attr["pubm_fr_body"],"","","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_t_att"]=new NormalAttribute("pubm_t_att", "1004","Attachements","array","",false,170,"",
                                                "W",false,false,false,
						$this->attr["pubm_fr_att"],"","","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_adesc"]=new NormalAttribute("pubm_adesc", "1004","Description","text","",true,180,"",
                                                "W",false,false,false,
						$this->attr["pubm_t_att"],"","","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_fdesc"]=new NormalAttribute("pubm_fdesc", "1004","Fichier","file","",true,190,"",
                                                "W",false,false,false,
						$this->attr["pubm_t_att"],"","","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_idfam"]=new NormalAttribute("pubm_idfam", "1004","Id famille","docid","",false,230,"",
                                                "H",false,false,false,
						$this->attr["pubm_fr_config"],"","::getTitle(PUBM_IDFAM):PUBM_FAM","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_fam"]=new NormalAttribute("pubm_fam", "1004","Famille du lot","text","",false,240,"%S%app=FDL&action=FDL_CARD&id=%PUBM_IDFAM%",
                                                "W",false,false,false,
						$this->attr["pubm_fr_config"],"fdl.php","lfamilies(D,PUBM_FAM):PUBM_IDFAM,PUBM_FAM","","","N","","","PUBLIMAIL");

     
     $this->attr["pubm_mailatt"]=new NormalAttribute("pubm_mailatt", "1004","Attribut mail","text","",false,250,"",
                                                "W",false,false,false,
						$this->attr["pubm_fr_config"],"fdl.php","getSortAttr(D,PUBM_IDFAM):PUBM_MAILATT","","","N","","","PUBLIMAIL");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"pfl_open"=>70,"batch_plan"=>80,"batch_fr_ident"=>90,"batch_title"=>100,"batch_desc"=>110,"batch_idfam"=>120,"batch_fam"=>130,"fld_openfolio"=>140,"fld_copybasket"=>150,"fld_insertdoc"=>160,"fld_setsysrss"=>170,"pubm_fr_ident"=>180,"pubm_title"=>190,"pfl_fr_init"=>200,"pfl_liststyle"=>210,"pfl_savetab"=>220,"pfl_savedispo"=>230,"pfl_t_linktab"=>240,"pfl_idlinktab"=>250,"pfl_linktab"=>260,"pfl_t_copytab"=>270,"pfl_idcopytab"=>280,"pfl_copytab"=>290,"pubm_fr_body"=>300,"pubm_body"=>310,"pubm_bgimg"=>320,"pubm_fr_att"=>330,"pubm_t_att"=>340,"pubm_adesc"=>350,"pubm_fdesc"=>360,"pubm_display"=>370,"pubm_send"=>380,"pubm_preview"=>390,"pubm_print"=>400,"pubm_fr_config"=>410,"pubm_idfam"=>420,"pubm_fam"=>430,"pubm_mailatt"=>440,"fld_fr_rest"=>450,"fld_allbut"=>460,"fld_tfam"=>470,"fld_fam"=>480,"fld_famids"=>490,"fld_subfam"=>500,"fld_fr_prof"=>510,"fld_pdoc"=>520,"fld_pdocid"=>530,"fld_pdir"=>540,"fld_pdirid"=>550,"pfl_iddef"=>560,"pfl_def"=>570,"fld_open"=>580];
     $this->fromids[1004]=1004;
     $this->fromname='PUBLIMAIL';

    $this->fields["ba_title"]="ba_title";
    $this->fields["pubm_title"]="pubm_title";
    $this->fields["pubm_body"]="pubm_body";
    $this->fields["pubm_bgimg"]="pubm_bgimg";
    $this->fields["pubm_adesc"]="pubm_adesc";
    $this->fields["pubm_fdesc"]="pubm_fdesc";
    $this->fields["pubm_idfam"]="pubm_idfam";
    $this->fields["pubm_fam"]="pubm_fam";
    $this->fields["pubm_mailatt"]="pubm_mailatt";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Publimail extends \Dcp\Core\Emailing {
   //  family : Publipostage

   public $dbtable="doc1004";
   public $dbseq="seq_doc1004";
   public $sqlcreate = array("create table doc1004 (ba_title text,pubm_title text,pubm_body text,pubm_bgimg text,pubm_adesc text,pubm_fdesc text,pubm_idfam text,pubm_fam text,pubm_mailatt text) inherits (doc36);",
     "create sequence seq_doc1004 start 1;",
     "alter TABLE doc1004 ADD primary key (id);",
     "select setval('seq_doc1004', count(distinct initid)+1, false )  from only doc1004;");
   

     public $fromid=1004;
     public $fromname='PUBLIMAIL';
     public $fromtitle="Publipostage";
     const familyName='PUBLIMAIL';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1004();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("PUBM_FAM", "::getTitle(PUBM_IDFAM):PUBM_FAM");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Publimail','_Publimail');
    class_alias('\Dcp\Family\Publimail' , 'Doc1004');
}

