<?php


namespace {

include_once("FDLGEN/Class.Doc2.php");

class ADoc1002 extends ADoc2 {
    // for familly : Archive

   function __construct () {
      ADoc2::__construct();

     
     
     $this->attr["arc_listc"]=new MenuAttribute("arc_listc", "1002","Voir les documents archivés",10,"%S%app=GENERIC&action=GENERIC_LIST&dirid=%ID%&famid=0","R","::equal('arc_status,'C)","submenu=Archivage|ltarget=flist","ARCHIVING");    
     
     $this->attr["arc_close"]=new MenuAttribute("arc_close", "1002","Archiver les documents",10,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3Aarc_close%28%29","R","::equal('arc_status,'O)","lconfirm=yes|ltarget=_self|submenu=Archivage|ltitle=Réaliser l'archivage des documents inclus dans l'archive","ARCHIVING");    
     
     $this->attr["arc_list"]=new MenuAttribute("arc_list", "1002","Voir les documents",10,"%S%app=GENERIC&action=GENERIC_LIST&dirid=%ID%&famid=0","R","::equal('arc_status,'O)","submenu=Archivage|ltarget=flist","ARCHIVING");    
     
     $this->attr["arc_modprof"]=new MenuAttribute("arc_modprof", "1002","Gérer les droits des documents archivés",20,"%S%app=FREEDOM&action=FREEDOM_GACCESS&id=%ARC_PROFIL%","R","","submenu=Archivage","ARCHIVING");    
     
     $this->attr["arc_reopen"]=new MenuAttribute("arc_reopen", "1002","Désarchiver les documents archivés",30,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3Aarc_reopen%28%29","R","::equal('arc_status,'C)","lconfirm=yes|ltarget=_self|submenu=Archivage|ltitle=Désarchiver les documents archivés","ARCHIVING");    
     
     $this->attr["arc_purge"]=new MenuAttribute("arc_purge", "1002","Détruire les documents archivé",40,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3Aarc_purge%28%29","R","::equal('arc_status,'C)","lconfirm=yes|ltarget=_self|submenu=Archivage|ltitle=Supprimer définitivement les documents archivés|tconfirm=Manipulation irréversible
Détruire les documents archivés ?","ARCHIVING");    
     
     $this->attr["arc_clear"]=new MenuAttribute("arc_clear", "1002","Vider l'archive de son contenu",50,"%S%app=FDL&action=FDL_METHOD&id=%I%&method=%3A%3Aarc_clear%28%29","R","::equal('arc_status,'O)","lconfirm=yes|ltarget=_self|submenu=Archivage","ARCHIVING");    
     
     
     $this->attr["arc_tab_purge"]=new FieldSetAttribute("arc_tab_purge", "1002","Purge","R","N","tab",$this->attr["FIELD_HIDDENS"],"","ARCHIVING");
     
     $this->attr["arc_fr_purge"]=new FieldSetAttribute("arc_fr_purge", "1002","Purge","R","N","frame",$this->attr["arc_tab_purge"],"vlabel=none","ARCHIVING");
     
     
     $this->attr["arc_status"]=new NormalAttribute("arc_status", "1002","Statut","enum","",false,100,"",
                                                "R",false,false,true,
						$this->attr["fr_basic"],"","O|Ouvert,C|Clôturé,P|Purgé","","","N","","system=yes","ARCHIVING");

     
     $this->attr["arc_clotdate"]=new NormalAttribute("arc_clotdate", "1002","Date de clôture","date","",false,110,"",
                                                "R",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","ARCHIVING");

     
     $this->attr["arc_profil"]=new NormalAttribute("arc_profil", "1002","Profil applicable","docid","PDIR",false,120,"",
                                                "R",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","ARCHIVING");

     
     $this->attr["arc_purgedate"]=new NormalAttribute("arc_purgedate", "1002","Date de destruction","date","",false,140,"",
                                                "R",false,false,false,
						$this->attr["arc_fr_purge"],"","","","","N","","","ARCHIVING");

     
     $this->attr["arc_purgemanif"]=new NormalAttribute("arc_purgemanif", "1002","Documents détruits","htmltext","",false,150,"",
                                                "R",false,false,false,
						$this->attr["arc_fr_purge"],"","","","","N","","","ARCHIVING");

     
     $this->attr["gui_color"]=new NormalAttribute("gui_color", "1002","Couleur intercalaire","color","",false,30,"",
                                                "H",false,false,false,
						$this->attr["fr_basic"],"","","","","N","","","ARCHIVING");

     
     $this->attr["gui_isrss"]=new NormalAttribute("gui_isrss", "1002","Utilisable comme flux RSS","enum","",false,32,"",
                                                "H",false,false,false,
						$this->attr["fr_basic"],"","no|non,yes|oui","","","N","bool","bmenu=no|system=yes","ARCHIVING");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"arc_status"=>70,"arc_clotdate"=>80,"arc_profil"=>90,"arc_listc"=>100,"arc_list"=>110,"arc_close"=>120,"fld_open"=>130,"arc_modprof"=>140,"arc_reopen"=>150,"fld_copybasket"=>160,"arc_purge"=>170,"fld_openfolio"=>180,"arc_clear"=>190,"fld_insertdoc"=>200,"fld_setsysrss"=>210,"arc_tab_purge"=>220,"arc_fr_purge"=>230,"arc_purgedate"=>240,"arc_purgemanif"=>250,"fld_fr_rest"=>260,"fld_allbut"=>270,"fld_tfam"=>280,"fld_fam"=>290,"fld_famids"=>300,"fld_subfam"=>310,"fld_fr_prof"=>320,"fld_pdoc"=>330,"fld_pdocid"=>340,"fld_pdir"=>350,"fld_pdirid"=>360];
     $this->fromids[1002]=1002;
     $this->fromname='ARCHIVING';

    $this->fields["arc_status"]="arc_status";
    $this->fields["arc_clotdate"]="arc_clotdate";
    $this->fields["arc_profil"]="arc_profil";
    $this->fields["arc_purgedate"]="arc_purgedate";
    $this->fields["arc_purgemanif"]="arc_purgemanif";
    $this->fields["gui_color"]="gui_color";
    $this->fields["gui_isrss"]="gui_isrss";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Archiving extends \Dcp\Core\Archiving {
   //  family : Archive

   public $dbtable="doc1002";
   public $dbseq="seq_doc1002";
   public $sqlcreate = array("create table doc1002 (arc_status text,arc_clotdate date,arc_profil text,arc_purgedate date,arc_purgemanif text,gui_color text,gui_isrss text) inherits (doc2);",
     "create sequence seq_doc1002 start 1;",
     "alter TABLE doc1002 ADD primary key (id);",
     "select setval('seq_doc1002', count(distinct initid)+1, false )  from only doc1002;");
   

     public $fromid=1002;
     public $fromname='ARCHIVING';
     public $fromtitle="Archive";
     const familyName='ARCHIVING';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1002();
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
    class_alias('\Dcp\Family\Archiving','_Archiving');
    class_alias('\Dcp\Family\Archiving' , 'Doc1002');
}

