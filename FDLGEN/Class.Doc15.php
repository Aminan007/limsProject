<?php


namespace {



class ADoc15 extends ADoc {
    // for familly : Mail

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["mail_fr"]=new FieldSetAttribute("mail_fr", "15","Adresses","W","N","frame",$this->attr["FIELD_HIDDENS"],"","MAIL");
     
     $this->attr["mail_fr_cm"]=new FieldSetAttribute("mail_fr_cm", "15","Commentaire","W","N","frame",$this->attr["FIELD_HIDDENS"],"","MAIL");
     
     
     $this->attr["mail_from"]=new NormalAttribute("mail_from", "15","De","text","",false,20,"",
                                                "R",false,false,true,
						$this->attr["mail_fr"],"","","","","N","","","MAIL");

     
     $this->attr["mail_dest"]=new NormalAttribute("mail_dest", "15","Destinataires","array","",false,30,"",
                                                "W",false,false,false,
						$this->attr["mail_fr"],"","","","","N","","","MAIL");

     
     $this->attr["mail_copymode"]=new NormalAttribute("mail_copymode", "15","","enum","",true,40,"",
                                                "W",false,false,true,
						$this->attr["mail_dest"],"","to|À,cc|Cc,bcc|Bcc","","","N","","system=yes","MAIL");

     
     $this->attr["mail_recipid"]=new NormalAttribute("mail_recipid", "15","Id destinataire","docid","",true,50,"",
                                                "H",false,false,false,
						$this->attr["mail_dest"],"","","","","N","","","MAIL");

     
     $this->attr["mail_recip"]=new NormalAttribute("mail_recip", "15","Destinataire","text","",true,60,"",
                                                "W",false,false,true,
						$this->attr["mail_dest"],"fdl.php","lmail(D,MAIL_RECIP):MAIL_RECIP,MAIL_RECIPID,MAIL_SENDFORMAT","","","N","","","MAIL");

     
     $this->attr["mail_sendformat"]=new NormalAttribute("mail_sendformat", "15","Notif.","enum","",true,70,"",
                                                "W",false,false,true,
						$this->attr["mail_dest"],"","plain|document complet,link|notification avec lien vers le document","","","N","bool","system=yes","MAIL");

     
     $this->attr["mail_subject"]=new NormalAttribute("mail_subject", "15","Sujet","text","",false,80,"",
                                                "W",false,false,true,
						$this->attr["mail_fr"],"","","","","N","","","MAIL");

     
     $this->attr["mail_savecopy"]=new NormalAttribute("mail_savecopy", "15","Enregistrer une copie","enum","",false,90,"",
                                                "W",false,false,false,
						$this->attr["mail_fr"],"","no|Pas de copie,yes|Copie sur le serveur","","","N","","eformat=bool|system=yes|elabel=enregistrer une copie du message sur le serveur","MAIL");

     
     $this->attr["mail_cm"]=new NormalAttribute("mail_cm", "15","Commentaire","longtext","",false,110,"",
                                                "W",false,false,true,
						$this->attr["mail_fr_cm"],"","","","","N","","","MAIL");

     
     $this->attr["mail_format"]=new NormalAttribute("mail_format", "15","Format","enum","",false,120,"",
                                                "W",false,false,true,
						$this->attr["mail_fr_cm"],"","html|HTML,pdf|PDF,htmlpdf|HTML & PDF","","","N","","system=yes","MAIL");

     
		
	 $this->absoluteOrders=["mail_fr"=>10,"mail_from"=>20,"mail_dest"=>30,"mail_copymode"=>40,"mail_recipid"=>50,"mail_recip"=>60,"mail_sendformat"=>70,"mail_subject"=>80,"mail_savecopy"=>90,"mail_fr_cm"=>100,"mail_cm"=>110,"mail_format"=>120];
     $this->fromids[15]=15;
     $this->fromname='MAIL';

    $this->fields["mail_from"]="mail_from";
    $this->fields["mail_copymode"]="mail_copymode";
    $this->fields["mail_recipid"]="mail_recipid";
    $this->fields["mail_recip"]="mail_recip";
    $this->fields["mail_sendformat"]="mail_sendformat";
    $this->fields["mail_subject"]="mail_subject";
    $this->fields["mail_savecopy"]="mail_savecopy";
    $this->fields["mail_cm"]="mail_cm";
    $this->fields["mail_format"]="mail_format";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Mail extends \Dcp\Core\MailEdit {
   //  family : Mail

   public $dbtable="doc15";
   public $dbseq="seq_doc15";
   public $sqlcreate = array("create table doc15 (mail_from text,mail_copymode text,mail_recipid text,mail_recip text,mail_sendformat text,mail_subject text,mail_savecopy text,mail_cm text,mail_format text) inherits (doc);",
     "create sequence seq_doc15 start 1;",
     "alter TABLE doc15 ADD primary key (id);",
     "select setval('seq_doc15', count(distinct initid)+1, false )  from only doc15;");
   

     public $fromid=15;
     public $fromname='MAIL';
     public $fromtitle="Mail";
     const familyName='MAIL';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc15();
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
    class_alias('\Dcp\Family\Mail','_Mail');
    class_alias('\Dcp\Family\Mail' , 'Doc15');
}

