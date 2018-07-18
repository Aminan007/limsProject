<?php


namespace {

include_once("FDLGEN/Class.Doc1.php");

class ADoc28 extends ADoc1 {
    // for familly : Contrôle de vues

   function __construct () {
      ADoc1::__construct();

     
     
     
     $this->attr["cv_fr_default"]=new FieldSetAttribute("cv_fr_default", "28","Vues par défauts","W","N","frame",$this->attr["FIELD_HIDDENS"],"","CVDOC");
     
     $this->attr["dpdoc_fr_dyn"]=new FieldSetAttribute("dpdoc_fr_dyn", "28","Profil dynamique","W","N","frame",$this->attr["FIELD_HIDDENS"],"","CVDOC");
     
     
     $this->attr["cv_desc"]=new NormalAttribute("cv_desc", "28","Description","longtext","",false,20,"",
                                                "W",false,false,true,
						$this->attr["fr_basic"],"","","","","N","","","CVDOC");

     
     $this->attr["cv_famid"]=new NormalAttribute("cv_famid", "28","Famille (id)","docid","",false,30,"",
                                                "H",false,false,false,
						$this->attr["fr_basic"],"","::getTitle(CV_FAMID):CV_FAM","","","N","","","CVDOC");

     
     $this->attr["cv_fam"]=new NormalAttribute("cv_fam", "28","Famille","text","",false,40,"%S%app=FDL&action=FDL_CARD&id=%CV_FAMID%",
                                                "W",false,true,false,
						$this->attr["fr_basic"],"fdl.php","lfamilies(D,CV_FAM):CV_FAMID,CV_FAM","","","N","","","CVDOC");

     
     $this->attr["cv_t_views"]=new NormalAttribute("cv_t_views", "28","Vues","array","",false,100,"",
                                                "W",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","empty=yes|vlabel=up|rowviewzone=FDL:CVDOC_ARRAY_VIEW|roweditzone=FDL:CVDOC_ARRAY_VIEW","CVDOC");

     
     $this->attr["cv_idview"]=new NormalAttribute("cv_idview", "28","Identifiant de la vue","text","",true,110,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"","","","::isIdValid(CV_IDVIEW)","N","","","CVDOC");

     
     $this->attr["cv_lview"]=new NormalAttribute("cv_lview", "28","Label","text","",true,120,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"","","","::isLabelValid(CV_LVIEW)","N","","","CVDOC");

     
     $this->attr["cv_kview"]=new NormalAttribute("cv_kview", "28","Type","enum","",true,130,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"-","VCONS|Consultation,VEDIT|Edition","","","N","","system=yes","CVDOC");

     
     $this->attr["cv_zview"]=new NormalAttribute("cv_zview", "28","Zone (Layout)","text","",true,140,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"fdl.php","lzone(D,CV_KVIEW,CV_FAMID):CV_ZVIEW","","","N","","autosuggest=no|showempty=&lt;aucun>","CVDOC");

     
     $this->attr["cv_mskid"]=new NormalAttribute("cv_mskid", "28","Masque","docid","MASK",true,150,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"","::getTitle(CV_MSKID):CV_MSK","","","N","","showempty=&lt;aucun>","CVDOC");

     
     $this->attr["cv_msk"]=new NormalAttribute("cv_msk", "28","Masque(titre)","text","",true,160,"%S%app=FDL&action=FDL_CARD&id=%CV_MSKID%",
                                                "H",false,false,false,
						$this->attr["cv_t_views"],"fdl.php","lmask(D,CV_MSK,CV_FAMID):CV_MSKID,CV_MSK","","","N","","","CVDOC");

     
     $this->attr["cv_order"]=new NormalAttribute("cv_order", "28","Ordre de sélection","int","",true,170,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"","","","::isInteger(cv_order)","N","","elabel=ordre d'accès pour le profilage|esize=3|showempty=&lt;aucun>","CVDOC");

     
     $this->attr["cv_displayed"]=new NormalAttribute("cv_displayed", "28","Affichable","enum","",true,180,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"","no|non,yes|oui","","","N","bool","system=yes","CVDOC");

     
     $this->attr["cv_menu"]=new NormalAttribute("cv_menu", "28","Menu","text","",true,190,"",
                                                "W",false,false,false,
						$this->attr["cv_t_views"],"","","","","N","","elabel=nom du sous menu|showempty=&lt;aucun>","CVDOC");

     
     $this->attr["cv_idcview"]=new NormalAttribute("cv_idcview", "28","Id création vues par défaut","text","",false,210,"",
                                                "H",false,false,false,
						$this->attr["cv_fr_default"],"","::computeCreationViewLabel(CV_IDCVIEW):CV_LCVIEW","","","N","","","CVDOC");

     
     $this->attr["cv_lcview"]=new NormalAttribute("cv_lcview", "28","Création vue","text","",false,220,"",
                                                "W",false,false,false,
						$this->attr["cv_fr_default"],"fdl.php","lview(CV_IDVIEW,CV_LVIEW):CV_IDCVIEW,CV_LCVIEW","","::isCreationViewValid(CV_IDCVIEW,CV_LCVIEW,CV_IDVIEW)","N","","autosuggest=no","CVDOC");

     
     $this->attr["dpdoc_famid"]=new NormalAttribute("dpdoc_famid", "28","Famille pour le profil","docid","-1",false,410,"",
                                                "W",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"fdl.php","lfamilies(D,CT):DPDOC_FAMID,CT","","","N","","elabel=famille utilisée pour les profils dynamiques","CVDOC");

     
     $this->attr["dpdoc_fam"]=new NormalAttribute("dpdoc_fam", "28","Famille pour le profil (titre)","text","",false,420,"",
                                                "H",false,false,false,
						$this->attr["dpdoc_fr_dyn"],"","::getTitle(DPDOC_FAMID)","","","N","","","CVDOC");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"cv_desc"=>30,"cv_famid"=>40,"cv_fam"=>50,"cv_t_views"=>60,"cv_idview"=>70,"cv_lview"=>80,"cv_kview"=>90,"cv_zview"=>100,"cv_mskid"=>110,"cv_msk"=>120,"cv_order"=>130,"cv_displayed"=>140,"cv_menu"=>150,"cv_fr_default"=>160,"cv_idcview"=>170,"cv_lcview"=>180,"dpdoc_fr_dyn"=>190,"dpdoc_famid"=>200,"dpdoc_fam"=>210];
     $this->fromids[28]=28;
     $this->fromname='CVDOC';

    $this->fields["cv_desc"]="cv_desc";
    $this->fields["cv_famid"]="cv_famid";
    $this->fields["cv_fam"]="cv_fam";
    $this->fields["cv_idview"]="cv_idview";
    $this->fields["cv_lview"]="cv_lview";
    $this->fields["cv_kview"]="cv_kview";
    $this->fields["cv_zview"]="cv_zview";
    $this->fields["cv_mskid"]="cv_mskid";
    $this->fields["cv_msk"]="cv_msk";
    $this->fields["cv_order"]="cv_order";
    $this->fields["cv_displayed"]="cv_displayed";
    $this->fields["cv_menu"]="cv_menu";
    $this->fields["cv_idcview"]="cv_idcview";
    $this->fields["cv_lcview"]="cv_lcview";
    $this->fields["dpdoc_famid"]="dpdoc_famid";
    $this->fields["dpdoc_fam"]="dpdoc_fam";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Cvdoc extends \Dcp\Core\Cvdoc {
   //  family : Contrôle de vues

   public $dbtable="doc28";
   public $dbseq="seq_doc28";
   public $sqlcreate = array("create table doc28 (cv_desc text,cv_famid text,cv_fam text,cv_idview text,cv_lview text,cv_kview text,cv_zview text,cv_mskid text,cv_msk text,cv_order text,cv_displayed text,cv_menu text,cv_idcview text,cv_lcview text,dpdoc_famid text,dpdoc_fam text) inherits (doc1);",
     "create sequence seq_doc28 start 1;",
     "alter TABLE doc28 ADD primary key (id);",
     "select setval('seq_doc28', count(distinct initid)+1, false )  from only doc28;");
   

     public $fromid=28;
     public $fromname='CVDOC';
     public $fromtitle="Contrôle de vues";
     const familyName='CVDOC';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc28();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("CV_FAM", "::getTitle(CV_FAMID):CV_FAM");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("CV_MSK", "::getTitle(CV_MSKID):CV_MSK");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("CV_LCVIEW", "::computeCreationViewLabel(CV_IDCVIEW):CV_LCVIEW");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("dpdoc_fam", "::getTitle(DPDOC_FAMID)");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Cvdoc','_Cvdoc');
    class_alias('\Dcp\Family\Cvdoc' , 'Doc28');
}

