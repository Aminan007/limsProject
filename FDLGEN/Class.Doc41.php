<?php


namespace {



class ADoc41 extends ADoc {
    // for familly : Modèle de mail

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["tmail_fr"]=new FieldSetAttribute("tmail_fr", "41","Entête","W","N","frame",$this->attr["FIELD_HIDDENS"],"","MAILTEMPLATE");
     
     $this->attr["tmail_fr_content"]=new FieldSetAttribute("tmail_fr_content", "41","Contenu","W","N","frame",$this->attr["FIELD_HIDDENS"],"","MAILTEMPLATE");
     
     
     $this->attr["tmail_title"]=new NormalAttribute("tmail_title", "41","Titre","text","",false,20,"",
                                                "O",true,true,false,
						$this->attr["tmail_fr"],"","","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_family"]=new NormalAttribute("tmail_family", "41","Famille","docid","x",false,30,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr"],"fdl.php","lfamilies(D, CT):TMAIL_FAMILY,CT","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_workflow"]=new NormalAttribute("tmail_workflow", "41","Famille cycle","docid","x",false,40,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr"],"fdl.php","lfamilies(D, CT,20):TMAIL_WORKFLOW,CT","","","N","","elabel=famille cycle pour récupérer le commentaire ou les paramètres de transition","MAILTEMPLATE");

     
     $this->attr["tmail_t_from"]=new NormalAttribute("tmail_t_from", "41","Émetteur","array","",false,50,"",
                                                "U",false,false,false,
						$this->attr["tmail_fr"],"","","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_fromtype"]=new NormalAttribute("tmail_fromtype", "41","type","enum","",true,60,"",
                                                "W",false,false,false,
						$this->attr["tmail_t_from"],"","F|Adresse fixe,A|Attribut texte,D|Attribut relation,E|Paramètre de famille texte,DE|Paramètre de famille relation,P|Paramètres globaux,WA|Attribut cycle,WD|Relation cycle,WE|Paramètre cycle","","","N","","system=yes|bmenu=no","MAILTEMPLATE");

     
     $this->attr["tmail_from"]=new NormalAttribute("tmail_from", "41","De","text","",true,70,"",
                                                "W",false,false,false,
						$this->attr["tmail_t_from"],"fdl.php","tplmail(D,TMAIL_FROMTYPE,TMAIL_FAMILY,TMAIL_WORKFLOW,TMAIL_FROM):TMAIL_FROM","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_dest"]=new NormalAttribute("tmail_dest", "41","Destinataires","array","",false,80,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr"],"","","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_copymode"]=new NormalAttribute("tmail_copymode", "41","-","enum","",true,90,"",
                                                "W",false,false,false,
						$this->attr["tmail_dest"],"","to|À,cc|Cc,bcc|Bcc","","","N","","system=yes|bmenu=no","MAILTEMPLATE");

     
     $this->attr["tmail_desttype"]=new NormalAttribute("tmail_desttype", "41","Type","enum","",true,100,"",
                                                "W",false,false,false,
						$this->attr["tmail_dest"],"","F|Adresse fixe,A|Attribut texte,D|Attribut relation,E|Paramètre de famille texte,DE|Paramètre de famille relation,P|Paramètres globaux,WA|Attribut cycle,WD|Relation cycle,WE|Paramètre cycle,RD|Document destinataire","","","N","","system=yes|bmenu=no","MAILTEMPLATE");

     
     $this->attr["tmail_recip"]=new NormalAttribute("tmail_recip", "41","Destinataire","text","",true,110,"",
                                                "W",false,false,false,
						$this->attr["tmail_dest"],"fdl.php","tplmail(D,TMAIL_DESTTYPE,TMAIL_FAMILY,TMAIL_WORKFLOW,TMAIL_RECIP):TMAIL_RECIP","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_subject"]=new NormalAttribute("tmail_subject", "41","Sujet","text","",false,120,"",
                                                "W",false,false,true,
						$this->attr["tmail_fr"],"","","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_savecopy"]=new NormalAttribute("tmail_savecopy", "41","Enregistrer une copie","enum","",false,140,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr_content"],"","no|Pas de copie,yes|Copie sur le serveur","","","N","","eformat=bool|system=yes|bmenu=no|elabel=enregistrer une copie du message sur le serveur lors de l'envoi","MAILTEMPLATE");

     
     $this->attr["tmail_ulink"]=new NormalAttribute("tmail_ulink", "41","Avec liens","enum","",false,150,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr_content"],"","no|Sans lien,yes|Avec liens","","","N","","eformat=bool|system=yes|bmenu=no","MAILTEMPLATE");

     
     $this->attr["tmail_body"]=new NormalAttribute("tmail_body", "41","Corps","htmltext","",false,160,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr_content"],"","","","","N","","jsonconf={\"addPlugins\": [\"docattr\"]}|allowedcontent=all","MAILTEMPLATE");

     
     $this->attr["tmail_t_attach"]=new NormalAttribute("tmail_t_attach", "41","Attachements","array","",false,170,"",
                                                "W",false,false,false,
						$this->attr["tmail_fr_content"],"","","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_attach"]=new NormalAttribute("tmail_attach", "41","Attachement","text","",true,180,"",
                                                "W",false,false,false,
						$this->attr["tmail_t_attach"],"fdl.php","tplmail(D,'G,TMAIL_FAMILY,TMAIL_WORKFLOW,TMAIL_ATTACH):TMAIL_ATTACH","","","N","","","MAILTEMPLATE");

     
     $this->attr["tmail_format"]=new NormalAttribute("tmail_format", "41","Format","enum","",false,190,"",
                                                "H",false,false,false,
						$this->attr["tmail_fr_content"],"","html|HTML,pdf|PDF,htmlpdf|HTML & PDF","","","N","","system=yes|bmenu=no","MAILTEMPLATE");

     
		
	 $this->absoluteOrders=["tmail_fr"=>10,"tmail_title"=>20,"tmail_family"=>30,"tmail_workflow"=>40,"tmail_t_from"=>50,"tmail_fromtype"=>60,"tmail_from"=>70,"tmail_dest"=>80,"tmail_copymode"=>90,"tmail_desttype"=>100,"tmail_recip"=>110,"tmail_subject"=>120,"tmail_fr_content"=>130,"tmail_savecopy"=>140,"tmail_ulink"=>150,"tmail_body"=>160,"tmail_t_attach"=>170,"tmail_attach"=>180,"tmail_format"=>190];
     $this->fromids[41]=41;
     $this->fromname='MAILTEMPLATE';

    $this->fields["tmail_title"]="tmail_title";
    $this->fields["tmail_family"]="tmail_family";
    $this->fields["tmail_workflow"]="tmail_workflow";
    $this->fields["tmail_fromtype"]="tmail_fromtype";
    $this->fields["tmail_from"]="tmail_from";
    $this->fields["tmail_copymode"]="tmail_copymode";
    $this->fields["tmail_desttype"]="tmail_desttype";
    $this->fields["tmail_recip"]="tmail_recip";
    $this->fields["tmail_subject"]="tmail_subject";
    $this->fields["tmail_savecopy"]="tmail_savecopy";
    $this->fields["tmail_ulink"]="tmail_ulink";
    $this->fields["tmail_body"]="tmail_body";
    $this->fields["tmail_attach"]="tmail_attach";
    $this->fields["tmail_format"]="tmail_format";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Mailtemplate extends \Dcp\Core\MailTemplate {
   //  family : Modèle de mail

   public $dbtable="doc41";
   public $dbseq="seq_doc41";
   public $sqlcreate = array("create table doc41 (tmail_title text,tmail_family text,tmail_workflow text,tmail_fromtype text,tmail_from text,tmail_copymode text,tmail_desttype text,tmail_recip text,tmail_subject text,tmail_savecopy text,tmail_ulink text,tmail_body text,tmail_attach text,tmail_format text) inherits (doc);",
     "create sequence seq_doc41 start 1;",
     "alter TABLE doc41 ADD primary key (id);",
     "select setval('seq_doc41', count(distinct initid)+1, false )  from only doc41;");
   

     public $fromid=41;
     public $fromname='MAILTEMPLATE';
     public $fromtitle="Modèle de mail";
     const familyName='MAILTEMPLATE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc41();
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
    class_alias('\Dcp\Family\Mailtemplate','_Mailtemplate');
    class_alias('\Dcp\Family\Mailtemplate' , 'Doc41');
}

