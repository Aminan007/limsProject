<?php


namespace {



class ADoc1063 extends ADoc {
    // for familly : Chapitre

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["chap_fr_content"]=new FieldSetAttribute("chap_fr_content", "1063","Contenu","W","N","frame",$this->attr["FIELD_HIDDENS"],"","CHAPTER");
     
     $this->attr["chap_fr_ident"]=new FieldSetAttribute("chap_fr_ident", "1063","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","CHAPTER");
     
     
     $this->attr["chap_level"]=new NormalAttribute("chap_level", "1063","Numérotation","text","",false,10,"",
                                                "W",true,true,false,
						$this->attr["chap_fr_ident"],"","","","","N","","","CHAPTER");

     
     $this->attr["chap_title"]=new NormalAttribute("chap_title", "1063","Titre","text","",false,20,"",
                                                "W",true,true,false,
						$this->attr["chap_fr_ident"],"","","","","N","","","CHAPTER");

     
     $this->attr["chap_comment"]=new NormalAttribute("chap_comment", "1063","Commentaire","longtext","",false,30,"",
                                                "W",false,false,true,
						$this->attr["chap_fr_ident"],"","","","","N","","","CHAPTER");

     
     $this->attr["chap_bookid"]=new NormalAttribute("chap_bookid", "1063","Identificateur livre","docid","",false,40,"",
                                                "H",true,false,false,
						$this->attr["chap_fr_ident"],"","::getTitle(CHAP_BOOKID):CHAP_BOOK","","","N","","","CHAPTER");

     
     $this->attr["chap_book"]=new NormalAttribute("chap_book", "1063","LIvre","text","",false,50,"%S%app=FDL&action=FDL_CARD&latest=Y&id=%CHAP_BOOKID%",
                                                "W",true,false,true,
						$this->attr["chap_fr_ident"],"fdl.php","lfamily(D,BOOK,CHAP_BOOK):CHAP_BOOKID,CHAP_BOOK","","","N","","","CHAPTER");

     
     $this->attr["chap_content"]=new NormalAttribute("chap_content", "1063","Contenu","htmltext","",false,70,"",
                                                "W",false,false,false,
						$this->attr["chap_fr_content"],"","","","","N","","vlabel=none|editheight=300px","CHAPTER");

     
		
	 $this->absoluteOrders=["chap_fr_ident"=>10,"chap_level"=>20,"chap_title"=>30,"chap_comment"=>40,"chap_bookid"=>50,"chap_book"=>60,"chap_fr_content"=>70,"chap_content"=>80];
     $this->fromids[1063]=1063;
     $this->fromname='CHAPTER';

    $this->fields["chap_level"]="chap_level";
    $this->fields["chap_title"]="chap_title";
    $this->fields["chap_comment"]="chap_comment";
    $this->fields["chap_bookid"]="chap_bookid";
    $this->fields["chap_book"]="chap_book";
    $this->fields["chap_content"]="chap_content";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Chapter extends \Dcp\Book\Chapter {
   //  family : Chapitre

   public $dbtable="doc1063";
   public $dbseq="seq_doc1063";
   public $sqlcreate = array("create table doc1063 (chap_level text,chap_title text,chap_comment text,chap_bookid text,chap_book text,chap_content text) inherits (doc);",
     "create sequence seq_doc1063 start 1;",
     "alter TABLE doc1063 ADD primary key (id);",
     "select setval('seq_doc1063', count(distinct initid)+1, false )  from only doc1063;");
   

     public $fromid=1063;
     public $fromname='CHAPTER';
     public $fromtitle="Chapitre";
     const familyName='CHAPTER';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1063();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("CHAP_BOOK", "::getTitle(CHAP_BOOKID):CHAP_BOOK");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Chapter','_Chapter');
    class_alias('\Dcp\Family\Chapter' , 'Doc1063');
}

