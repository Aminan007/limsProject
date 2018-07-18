<?php


namespace {

include_once("FDLGEN/Class.Doc16.php");

class ADoc25 extends ADoc16 {
    // for familly : Rapport

   function __construct () {
      ADoc16::__construct();

     
     
     $this->attr["rep_csv"]=new MenuAttribute("rep_csv", "25","Export CSV",5,"%S%app=FDL&action=REPORT_EXPORT_CSV&id=%I%&displayForm=true","W","","","REPORT");    
     
     $this->attr["rep_imp"]=new MenuAttribute("rep_imp", "25","Version imprimable",20,"%S%app=FDL&action=IMPCARD&props=N&dochead=N&id=%I%&ulink=N","W","","barmenu=yes","REPORT");    
     
     
     $this->attr["rep_fr_param"]=new FieldSetAttribute("rep_fr_param", "25","Paramètres","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","REPORT");
     
     $this->attr["rep_tab_presentation"]=new FieldSetAttribute("rep_tab_presentation", "25","Présentation","W","N","tab",$this->attr["FIELD_HIDDENS"],"","REPORT");
     
     $this->attr["rep_fr_presentation"]=new FieldSetAttribute("rep_fr_presentation", "25","Présentation","W","N","frame",$this->attr["rep_tab_presentation"],"","REPORT");
     
     
     $this->attr["rep_noaccesstext"]=new NormalAttribute("rep_noaccesstext", "25","Texte à afficher pour les valeurs protégées","htmltext","",false,105,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_param"],"","","","","Q","","elabel=Dans la cas où un attribut est protégé (visibilité I)","REPORT");

     
     $this->attr["rep_maxdisplaylimit"]=new NormalAttribute("rep_maxdisplaylimit", "25","Limite d'affichage pour le nombre de rangées","int","",false,110,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_param"],"","","","::isInteger(rep_maxdisplaylimit)","Q","","","REPORT");

     
     $this->attr["rep_caption"]=new NormalAttribute("rep_caption", "25","Description","longtext","",false,1020,"",
                                                "W",false,false,true,
						$this->attr["rep_fr_presentation"],"","","","","N","","","REPORT");

     
     $this->attr["rep_sort"]=new NormalAttribute("rep_sort", "25","Tri","text","",false,1030,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"fdl.php","getReportSortableColumns(D,SE_FAMID,REP_SORT):REP_IDSORT,REP_SORT,REP_ORDERSORT","","","N","","","REPORT");

     
     $this->attr["rep_idsort"]=new NormalAttribute("rep_idsort", "25","Id tri","text","",false,1040,"",
                                                "H",false,false,false,
						$this->attr["rep_fr_presentation"],"","","","","N","","","REPORT");

     
     $this->attr["rep_ordersort"]=new NormalAttribute("rep_ordersort", "25","Ordre","enum","",false,1050,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"","asc|ascendant,desc|descendant","","","N","","system=yes|bmenu=no","REPORT");

     
     $this->attr["rep_limit"]=new NormalAttribute("rep_limit", "25","Limite","int","",false,1060,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"","","","::isInteger(rep_limit)","N","","elabel=nombre maximum de documents retournés|esize=3","REPORT");

     
     $this->attr["rep_tcols"]=new NormalAttribute("rep_tcols", "25","Colonnes","array","",false,1080,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"fdl.php","FDL:REPORTCHOOSECOLUMNS(A,ID):","","","N","","ltitle=Choisir les colonnes du rapport|lsymbol=Choisir les colonnes|mwidth=800|mheight=600","REPORT");

     
     $this->attr["rep_lcols"]=new NormalAttribute("rep_lcols", "25","Label","text","",true,1090,"",
                                                "W",false,false,false,
						$this->attr["rep_tcols"],"fdl.php","getReportColumns(D,SE_FAMID,REP_LCOLS):REP_IDCOLS,REP_LCOLS,REP_DISPLAYOPTION","","","N","","","REPORT");

     
     $this->attr["rep_idcols"]=new NormalAttribute("rep_idcols", "25","Id colonnes","text","",true,1100,"",
                                                "H",false,false,false,
						$this->attr["rep_tcols"],"","","","","N","","","REPORT");

     
     $this->attr["rep_displayoption"]=new NormalAttribute("rep_displayoption", "25","Option de présentation","text","",true,1110,"",
                                                "H",false,false,false,
						$this->attr["rep_tcols"],"","","","","N","","","REPORT");

     
     $this->attr["rep_colors"]=new NormalAttribute("rep_colors", "25","Couleur","color","",true,1120,"",
                                                "W",false,false,false,
						$this->attr["rep_tcols"],"","","","","N","","cwidth=110px","REPORT");

     
     $this->attr["rep_foots"]=new NormalAttribute("rep_foots", "25","Pied de tableau","enum","",true,1130,"",
                                                "W",false,false,false,
						$this->attr["rep_tcols"],"-","NONE| ,SUM|Somme,MOY|Moyenne,CARD|Cardinal","","","N","","system=yes|cwidth=110px","REPORT");

     
     $this->attr["rep_style"]=new NormalAttribute("rep_style", "25","Style","enum","",false,1140,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"-","standard1|Standard (Thème 1),standard2|Standard (Thème 2),standard3|Standard (Thème 3),reportHBlue|Bleu horizontal,reportVGreen|Vert vertical,reportHYellow|Jaune horizontal,reportHInverse|Inverse vidéo,  |Personnalisé...","","","N","","system=yes","REPORT");

     
     $this->attr["rep_colorhf"]=new NormalAttribute("rep_colorhf", "25","Couleur entête","color","",false,1150,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"","::nothing(REP_STYLE)","","","N","","elabel=couleur du fond pour l'entête et le pied de tableau","REPORT");

     
     $this->attr["rep_colorodd"]=new NormalAttribute("rep_colorodd", "25","Couleur impaire","color","",false,1160,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"","::nothing(REP_STYLE)","","","N","","elabel=couleur du fond pour les rangées impaires","REPORT");

     
     $this->attr["rep_coloreven"]=new NormalAttribute("rep_coloreven", "25","Couleur paire","color","",false,1170,"",
                                                "W",false,false,false,
						$this->attr["rep_fr_presentation"],"","::nothing(REP_STYLE)","","","N","","elabel=couleur du fond pour les rangées paires","REPORT");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"se_author"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"se_memo"=>70,"rep_csv"=>80,"rep_imp"=>90,"se_open"=>100,"se_openfolio"=>110,"se_setsysrss"=>120,"se_crit"=>130,"se_key"=>140,"se_latest"=>150,"se_case"=>160,"se_fam"=>170,"se_famid"=>180,"se_cfld"=>190,"se_idfld"=>200,"se_trash"=>210,"se_archive"=>220,"se_sublevel"=>230,"se_sysfam"=>240,"se_sqlselect"=>250,"se_idcfld"=>260,"se_ccfld"=>270,"se_orderby"=>280,"se_famonly"=>290,"se_acl"=>300,"se_static"=>310,"rep_fr_param"=>320,"rep_noaccesstext"=>330,"rep_maxdisplaylimit"=>340,"se_fr_detail"=>350,"se_ol"=>360,"se_t_detail"=>370,"se_ols"=>380,"se_leftp"=>390,"se_attrids"=>400,"se_funcs"=>410,"se_keys"=>420,"se_rightp"=>430,"se_t_filters"=>440,"se_filter"=>450,"se_typefilter"=>460,"rep_tab_presentation"=>470,"rep_fr_presentation"=>480,"rep_caption"=>490,"rep_sort"=>500,"rep_idsort"=>510,"rep_ordersort"=>520,"rep_limit"=>530,"rep_tcols"=>540,"rep_lcols"=>550,"rep_idcols"=>560,"rep_displayoption"=>570,"rep_colors"=>580,"rep_foots"=>590,"rep_style"=>600,"rep_colorhf"=>610,"rep_colorodd"=>620,"rep_coloreven"=>630];
     $this->fromids[25]=25;
     $this->fromname='REPORT';

    $this->fields["rep_caption"]="rep_caption";
    $this->fields["rep_sort"]="rep_sort";
    $this->fields["rep_idsort"]="rep_idsort";
    $this->fields["rep_ordersort"]="rep_ordersort";
    $this->fields["rep_limit"]="rep_limit";
    $this->fields["rep_lcols"]="rep_lcols";
    $this->fields["rep_idcols"]="rep_idcols";
    $this->fields["rep_displayoption"]="rep_displayoption";
    $this->fields["rep_colors"]="rep_colors";
    $this->fields["rep_foots"]="rep_foots";
    $this->fields["rep_style"]="rep_style";
    $this->fields["rep_colorhf"]="rep_colorhf";
    $this->fields["rep_colorodd"]="rep_colorodd";
    $this->fields["rep_coloreven"]="rep_coloreven";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Report extends \Dcp\Core\Report {
   //  family : Rapport

   public $dbtable="doc25";
   public $dbseq="seq_doc25";
   public $sqlcreate = array("create table doc25 (rep_caption text,rep_sort text,rep_idsort text,rep_ordersort text,rep_limit int4,rep_lcols text,rep_idcols text,rep_displayoption text,rep_colors text,rep_foots text,rep_style text,rep_colorhf text,rep_colorodd text,rep_coloreven text) inherits (doc16);",
     "create sequence seq_doc25 start 1;",
     "alter TABLE doc25 ADD primary key (id);",
     "select setval('seq_doc25', count(distinct initid)+1, false )  from only doc25;");
   

     public $fromid=25;
     public $fromname='REPORT';
     public $fromtitle="Rapport";
     const familyName='REPORT';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc25();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("rep_colorhf", "::nothing(REP_STYLE)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("rep_colorodd", "::nothing(REP_STYLE)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("rep_coloreven", "::nothing(REP_STYLE)");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Report','_Report');
    class_alias('\Dcp\Family\Report' , 'Doc25');
}

