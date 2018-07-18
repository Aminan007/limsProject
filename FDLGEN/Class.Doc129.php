<?php


namespace {

include_once("FDLGEN/Class.Doc2.php");

class ADoc129 extends ADoc2 {
    // for familly : Groupe de personnes

   function __construct () {
      ADoc2::__construct();

     
     
     $this->attr["grp_adduser"]=new MenuAttribute("grp_adduser", "129","Gérer les membres",1,"%S%app=FDL&action=EDITINSERTDOCUMENT&famid=IUSER&id=%I%","R","::controlAclAccess(\"modify\")","ltarget=_self","GROUP");    
     
     $this->attr["grp_refresh"]=new MenuAttribute("grp_refresh", "129","Rafraîchir",2,"%S%app=FDL&action=FDL_METHOD&method=refreshGroup&id=%I%","W","::canEditMenu()","ltarget=_self","GROUP");    
     
     
     $this->attr["fld_fr_prof"]=new FieldSetAttribute("fld_fr_prof", "129","Profils par défaut","H","N","frame",$this->attr["FIELD_HIDDENS"],"","GROUP");
     
     $this->attr["fr_basic"]=new FieldSetAttribute("fr_basic", "129","basique","H","N","frame",$this->attr["FIELD_HIDDENS"],"","GROUP");
     
     $this->attr["fld_fr_rest"]=new FieldSetAttribute("fld_fr_rest", "129","Restrictions","H","N","frame",$this->attr["FIELD_HIDDENS"],"","GROUP");
     
     $this->attr["grp_fr_ident"]=new FieldSetAttribute("grp_fr_ident", "129","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","GROUP");
     
     $this->attr["grp_fr"]=new FieldSetAttribute("grp_fr", "129","Groupes","W","N","frame",$this->attr["FIELD_HIDDENS"],"","GROUP");
     
     
     $this->attr["ba_title"]=new NormalAttribute("ba_title", "129","titre","text","",false,1,"",
                                                "H",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","GROUP");

     
     $this->attr["grp_name"]=new NormalAttribute("grp_name", "129","nom","text","",false,110,"",
                                                "W",true,true,false,
						$this->attr["grp_fr_ident"],"","","","","N","","esize=30","GROUP");

     
     $this->attr["grp_mail"]=new NormalAttribute("grp_mail", "129","mail","text","",false,120,"mailto:%GRP_MAIL%",
                                                "R",false,false,true,
						$this->attr["grp_fr_ident"],"","","","","N","","","GROUP");

     
     $this->attr["grp_hasmail"]=new NormalAttribute("grp_hasmail", "129","sans adresse mail de groupe","enum","",false,130,"",
                                                "W",false,false,true,
						$this->attr["grp_fr_ident"],"","yes|adresses regroupées,no|sans adresse mail","","","N","bool","system=yes|bmenu=no|elabel=permet d'éviter le calcul du mail de groupe lorsque le groupe contient beaucoup de membres","GROUP");

     
     $this->attr["grp_idgroup"]=new NormalAttribute("grp_idgroup", "129","sous groupes","account","",true,510,"",
                                                "R",false,false,false,
						$this->attr["grp_fr"],"fdl.php","fdlGetAccounts(CT,15,\"multiple=yes|showempty=Aucun sous groupe\"):grp_idgroup,CT","","","N","","multiple=yes|showempty=Aucun sous groupe","GROUP");

     
     $this->attr["grp_idpgroup"]=new NormalAttribute("grp_idpgroup", "129","groupes parents","account","",true,511,"",
                                                "R",false,false,false,
						$this->attr["grp_fr"],"fdl.php","fdlGetAccounts(CT,15,\"multiple=yes|showempty=Aucun groupe parent\"):grp_idpgroup,CT","","","N","","multiple=yes|showempty=Aucun groupe parent","GROUP");

     
     $this->attr["grp_isrefreshed"]=new NormalAttribute("grp_isrefreshed", "129","est rafraîchi","enum","",false,512,"",
                                                "H",false,false,false,
						$this->attr["grp_fr"],"","1|oui,0|non","","","N","","system=yes|bmenu=no","GROUP");

     
     $this->attr["fld_tfam"]=new NormalAttribute("fld_tfam", "129","Familles filtrées","array","",false,1005,"",
                                                "W",false,false,false,
						$this->attr["fld_fr_rest"],"","","","","N","","vlabel=none","GROUP");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"grp_adduser"=>70,"grp_refresh"=>80,"fld_open"=>90,"fld_copybasket"=>100,"fld_openfolio"=>110,"fld_insertdoc"=>120,"fld_setsysrss"=>130,"grp_fr_ident"=>140,"grp_name"=>150,"grp_mail"=>160,"grp_hasmail"=>170,"grp_fr"=>180,"grp_idgroup"=>190,"grp_idpgroup"=>200,"grp_isrefreshed"=>210,"fld_fr_rest"=>220,"fld_allbut"=>230,"fld_tfam"=>240,"fld_fam"=>250,"fld_famids"=>260,"fld_subfam"=>270,"fld_fr_prof"=>280,"fld_pdoc"=>290,"fld_pdocid"=>300,"fld_pdir"=>310,"fld_pdirid"=>320];
     $this->fromids[129]=129;
     $this->fromname='GROUP';

    $this->fields["ba_title"]="ba_title";
    $this->fields["grp_name"]="grp_name";
    $this->fields["grp_mail"]="grp_mail";
    $this->fields["grp_hasmail"]="grp_hasmail";
    $this->fields["grp_idgroup"]="grp_idgroup";
    $this->fields["grp_idpgroup"]="grp_idpgroup";
    $this->fields["grp_isrefreshed"]="grp_isrefreshed";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Group extends \Dcp\Core\AccountCollection {
   //  family : Groupe de personnes

   public $dbtable="doc129";
   public $dbseq="seq_doc129";
   public $sqlcreate = array("create table doc129 (ba_title text,grp_name text,grp_mail text,grp_hasmail text,grp_idgroup text,grp_idpgroup text,grp_isrefreshed text) inherits (doc2);",
     "create sequence seq_doc129 start 1;",
     "alter TABLE doc129 ADD primary key (id);",
     "select setval('seq_doc129', count(distinct initid)+1, false )  from only doc129;");
   

     public $fromid=129;
     public $fromname='GROUP';
     public $fromtitle="Groupe de personnes";
     const familyName='GROUP';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc129();
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
    class_alias('\Dcp\Family\Group','_Group');
    class_alias('\Dcp\Family\Group' , 'Doc129');
}

