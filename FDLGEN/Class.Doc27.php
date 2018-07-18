<?php


namespace {



class ADoc27 extends ADoc {
    // for familly : Post-it

   function __construct () {
      ADoc::__construct();

     
     
     $this->attr["pit_mod"]=new MenuAttribute("pit_mod", "27","Modifier le contenu",10,"%S%app=GENERIC&action=GENERIC_EDIT&id=%I%&zone=FDL:EDITBODYCARD:T","R","","","POSTIT");    
     
     $this->attr["pit_viewdoc"]=new MenuAttribute("pit_viewdoc", "27","Voir le document associé",100,"%S%app=FDL&action=FDL_CARD&id=%PIT_IDADOC%","W","","","POSTIT");    
     
     
     $this->attr["pit_fr_text"]=new FieldSetAttribute("pit_fr_text", "27","Texte","W","N","frame",$this->attr["FIELD_HIDDENS"],"","POSTIT");
     
     $this->attr["pit_fr_doc"]=new FieldSetAttribute("pit_fr_doc", "27","Attachement","W","N","frame",$this->attr["FIELD_HIDDENS"],"","POSTIT");
     
     $this->attr["pit_fr_edit"]=new FieldSetAttribute("pit_fr_edit", "27","Édition","H","N","frame",$this->attr["FIELD_HIDDENS"],"","POSTIT");
     
     
     $this->attr["pit_title"]=new NormalAttribute("pit_title", "27","Titre","text","",false,1,"",
                                                "H",false,true,false,
						$this->attr["pit_fr_text"],"","::getPostitTitle(PIT_IDADOC)","","","N","","","POSTIT");

     
     $this->attr["pit_tcom"]=new NormalAttribute("pit_tcom", "27","Commentaires","array","",false,10,"",
                                                "W",false,false,false,
						$this->attr["pit_fr_text"],"","","","","N","","","POSTIT");

     
     $this->attr["pit_com"]=new NormalAttribute("pit_com", "27","Commentaire","longtext","",true,20,"",
                                                "W",false,false,false,
						$this->attr["pit_tcom"],"","","","","N","","","POSTIT");

     
     $this->attr["pit_date"]=new NormalAttribute("pit_date", "27","Date","date","",true,30,"",
                                                "R",false,false,false,
						$this->attr["pit_tcom"],"","","","","N","","","POSTIT");

     
     $this->attr["pit_iduser"]=new NormalAttribute("pit_iduser", "27","Id utilisateur","docid","",true,40,"",
                                                "H",false,false,false,
						$this->attr["pit_tcom"],"","::getTitle(PIT_IDUSER):PIT_USER","","","N","","","POSTIT");

     
     $this->attr["pit_user"]=new NormalAttribute("pit_user", "27","Utilisateur","text","",true,50,"%S%app=FDL&action=FDL_CARD&id=%PIT_IDUSER%",
                                                "R",false,false,false,
						$this->attr["pit_tcom"],"fdl.php","lfamilly(D,IUSER,PIT_USER):PIT_IDUSER,PIT_USER","","","N","","","POSTIT");

     
     $this->attr["pit_color"]=new NormalAttribute("pit_color", "27","Couleur","color","",true,60,"",
                                                "W",false,false,false,
						$this->attr["pit_tcom"],"","","","","N","","","POSTIT");

     
     $this->attr["pit_idadoc"]=new NormalAttribute("pit_idadoc", "27","Id doc attaché","docid","",false,80,"",
                                                "H",false,false,false,
						$this->attr["pit_fr_doc"],"","::getTitle(PIT_IDADOC):PIT_ADOC","","","N","","","POSTIT");

     
     $this->attr["pit_adoc"]=new NormalAttribute("pit_adoc", "27","Doc attaché","text","",false,90,"%S%app=FDL&action=FDL_CARD&id=%PIT_IDADOC%",
                                                "R",false,false,false,
						$this->attr["pit_fr_doc"],"","","","","N","","","POSTIT");

     
     $this->attr["pit_ncom"]=new NormalAttribute("pit_ncom", "27","Nouveau commentaire","longtext","",false,120,"",
                                                "O",false,false,false,
						$this->attr["pit_fr_edit"],"","","","","N","","","POSTIT");

     
     $this->attr["pit_ncolor"]=new NormalAttribute("pit_ncolor", "27","Nouvelle couleur","color","",false,130,"",
                                                "O",false,false,false,
						$this->attr["pit_fr_edit"],"","","","","N","","","POSTIT");

     
		
	 $this->absoluteOrders=["pit_fr_text"=>10,"pit_title"=>20,"pit_tcom"=>30,"pit_com"=>40,"pit_date"=>50,"pit_iduser"=>60,"pit_user"=>70,"pit_color"=>80,"pit_mod"=>90,"pit_fr_doc"=>100,"pit_idadoc"=>110,"pit_adoc"=>120,"pit_viewdoc"=>130,"pit_fr_edit"=>140,"pit_ncom"=>150,"pit_ncolor"=>160];
     $this->fromids[27]=27;
     $this->fromname='POSTIT';

    $this->fields["pit_title"]="pit_title";
    $this->fields["pit_com"]="pit_com";
    $this->fields["pit_date"]="pit_date";
    $this->fields["pit_iduser"]="pit_iduser";
    $this->fields["pit_user"]="pit_user";
    $this->fields["pit_color"]="pit_color";
    $this->fields["pit_idadoc"]="pit_idadoc";
    $this->fields["pit_adoc"]="pit_adoc";
    $this->fields["pit_ncom"]="pit_ncom";
    $this->fields["pit_ncolor"]="pit_ncolor";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Postit extends \Dcp\Core\PostitView {
   //  family : Post-it

   public $dbtable="doc27";
   public $dbseq="seq_doc27";
   public $sqlcreate = array("create table doc27 (pit_title text,pit_com text,pit_date text,pit_iduser text,pit_user text,pit_color text,pit_idadoc text,pit_adoc text,pit_ncom text,pit_ncolor text) inherits (doc);",
     "create sequence seq_doc27 start 1;",
     "alter TABLE doc27 ADD primary key (id);",
     "select setval('seq_doc27', count(distinct initid)+1, false )  from only doc27;");
   

     public $fromid=27;
     public $fromname='POSTIT';
     public $fromtitle="Post-it";
     const familyName='POSTIT';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc27();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("pit_title", "::getPostitTitle(PIT_IDADOC)");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("PIT_USER", "::getTitle(PIT_IDUSER):PIT_USER");

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("PIT_ADOC", "::getTitle(PIT_IDADOC):PIT_ADOC");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Postit','_Postit');
    class_alias('\Dcp\Family\Postit' , 'Doc27');
}

