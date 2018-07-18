<?php


namespace {



class ADoc1001 extends ADoc {
    // for familly : Message envoyé

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["emsg_fr_parameters"]=new FieldSetAttribute("emsg_fr_parameters", "1001","Paramètres","W","Q","frame",$this->attr["FIELD_HIDDENS"],"","SENTMESSAGE");
     
     $this->attr["emsg_fr_ident"]=new FieldSetAttribute("emsg_fr_ident", "1001","Identification","R","N","frame",$this->attr["FIELD_HIDDENS"],"","SENTMESSAGE");
     
     $this->attr["emsg_fr_bodies"]=new FieldSetAttribute("emsg_fr_bodies", "1001","Corps de messages","R","N","frame",$this->attr["FIELD_HIDDENS"],"","SENTMESSAGE");
     
     
     $this->attr["emsg_editcontrol"]=new NormalAttribute("emsg_editcontrol", "1001","Force la lecture seule","enum","",false,20,"",
                                                "W",false,false,false,
						$this->attr["emsg_fr_parameters"],"","lockedit|Droit édit verrouillé,freeedit|Droit édit libre","","","Q","","system=yes|bmenu=no","SENTMESSAGE");

     
     $this->attr["emsg_refid"]=new NormalAttribute("emsg_refid", "1001","Document référence","docid","x",false,110,"",
                                                "R",false,false,false,
						$this->attr["emsg_fr_ident"],"","","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_from"]=new NormalAttribute("emsg_from", "1001","De","text","",false,120,"",
                                                "S",false,false,false,
						$this->attr["emsg_fr_ident"],"","","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_t_recipient"]=new NormalAttribute("emsg_t_recipient", "1001","Destinataires","array","",false,500,"",
                                                "U",false,false,false,
						$this->attr["emsg_fr_ident"],"","","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_sendtype"]=new NormalAttribute("emsg_sendtype", "1001","Type","enum","",true,510,"",
                                                "S",false,false,false,
						$this->attr["emsg_t_recipient"],"","to|Pour,cc|Copie,bcc|Copie cachée","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_recipient"]=new NormalAttribute("emsg_recipient", "1001","Destinataire","text","",true,520,"",
                                                "S",false,false,false,
						$this->attr["emsg_t_recipient"],"","","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_subject"]=new NormalAttribute("emsg_subject", "1001","Sujet","text","",false,530,"",
                                                "S",false,true,false,
						$this->attr["emsg_fr_ident"],"","","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_date"]=new NormalAttribute("emsg_date", "1001","Date","timestamp","%d %B %Y %H:%S",false,540,"",
                                                "S",false,false,false,
						$this->attr["emsg_fr_ident"],"","","","","N","","iwidth=64px","SENTMESSAGE");

     
     $this->attr["emsg_size"]=new NormalAttribute("emsg_size", "1001","Taille","int","",false,550,"",
                                                "R",false,false,false,
						$this->attr["emsg_fr_ident"],"","","","::isInteger(emsg_size)","N","","","SENTMESSAGE");

     
     $this->attr["emsg_textbody"]=new NormalAttribute("emsg_textbody", "1001","Texte","longtext","",false,570,"",
                                                "R",false,false,false,
						$this->attr["emsg_fr_bodies"],"","","","","N","","vlabel=up","SENTMESSAGE");

     
     $this->attr["emsg_htmlbody"]=new NormalAttribute("emsg_htmlbody", "1001","Texte formaté","ifile","",false,580,"",
                                                "R",false,false,false,
						$this->attr["emsg_fr_bodies"],"","","","","N","","vlabel=up","SENTMESSAGE");

     
     $this->attr["emsg_t_attach"]=new NormalAttribute("emsg_t_attach", "1001","Attachements","array","",false,590,"",
                                                "R",false,false,false,
						$this->attr["emsg_fr_bodies"],"","","","","N","","","SENTMESSAGE");

     
     $this->attr["emsg_attach"]=new NormalAttribute("emsg_attach", "1001","Fichier","file","",true,600,"",
                                                "R",false,false,false,
						$this->attr["emsg_t_attach"],"","","","","N","","vlabel=none","SENTMESSAGE");

     
		
	 $this->absoluteOrders=["emsg_fr_parameters"=>10,"emsg_editcontrol"=>20,"emsg_fr_ident"=>30,"emsg_refid"=>40,"emsg_from"=>50,"emsg_t_recipient"=>60,"emsg_sendtype"=>70,"emsg_recipient"=>80,"emsg_subject"=>90,"emsg_date"=>100,"emsg_size"=>110,"emsg_fr_bodies"=>120,"emsg_textbody"=>130,"emsg_htmlbody"=>140,"emsg_t_attach"=>150,"emsg_attach"=>160];
     $this->fromids[1001]=1001;
     $this->fromname='SENTMESSAGE';

    $this->fields["emsg_refid"]="emsg_refid";
    $this->fields["emsg_from"]="emsg_from";
    $this->fields["emsg_sendtype"]="emsg_sendtype";
    $this->fields["emsg_recipient"]="emsg_recipient";
    $this->fields["emsg_subject"]="emsg_subject";
    $this->fields["emsg_date"]="emsg_date";
    $this->fields["emsg_size"]="emsg_size";
    $this->fields["emsg_textbody"]="emsg_textbody";
    $this->fields["emsg_htmlbody"]="emsg_htmlbody";
    $this->fields["emsg_attach"]="emsg_attach";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Sentmessage extends \Dcp\Core\SentEmail {
   //  family : Message envoyé

   public $dbtable="doc1001";
   public $dbseq="seq_doc1001";
   public $sqlcreate = array("create table doc1001 (emsg_refid text,emsg_from text,emsg_sendtype text,emsg_recipient text,emsg_subject text,emsg_date timestamp without time zone,emsg_size int4,emsg_textbody text,emsg_htmlbody text,emsg_attach text) inherits (doc);",
     "create sequence seq_doc1001 start 1;",
     "alter TABLE doc1001 ADD primary key (id);",
     "select setval('seq_doc1001', count(distinct initid)+1, false )  from only doc1001;");
   

     public $fromid=1001;
     public $fromname='SENTMESSAGE';
     public $fromtitle="Message envoyé";
     const familyName='SENTMESSAGE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1001();
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
    class_alias('\Dcp\Family\Sentmessage','_Sentmessage');
    class_alias('\Dcp\Family\Sentmessage' , 'Doc1001');
}

