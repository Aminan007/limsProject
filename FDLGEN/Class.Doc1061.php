<?php


namespace {

include_once("FDLGEN/Class.Doc2.php");

class ADoc1061 extends ADoc2 {
    // for familly : Livre

   function __construct () {
      ADoc2::__construct();

     
     
     $this->attr["book_addchapter"]=new MenuAttribute("book_addchapter", "1061","Insérer un nouveau chapitre",10,"%S%app=GENERIC&action=GENERIC_EDIT&classid=CHAPTER&chap_bookid=%INITID%&chap_book=%T%&dirid=%INITID%","R","::controlAclAccess(modify)","","BOOK");    
     
     $this->attr["book_open"]=new MenuAttribute("book_open", "1061","Ouvrir",20,"%S%app=FDL&action=FDL_CARD&id=%I%&zone=BOOK:OPENBOOK","R","","","BOOK");    
     
     $this->attr["book_gen_html"]=new MenuAttribute("book_gen_html", "1061","Visualisation",30,"%S%app=FDL&action=IMPCARD&id=%I%&zone=BOOK:GENHTML:S","R","","","BOOK");    
     
     $this->attr["book_gen_pdf"]=new MenuAttribute("book_gen_pdf", "1061","Génération PDF",40,"%S%app=FDL&action=IMPCARD&id=%I%&zone=BOOK:GENPDF:S","R","","","BOOK");    
     
     $this->attr["fld_open"]=new MenuAttribute("fld_open", "1061","Ouvrir",20,"%S%app=FREEDOM&action=FREEDOM_VIEW&dirid=%I%","H","","","BOOK");    
     
     
     $this->attr["book_fr_info"]=new FieldSetAttribute("book_fr_info", "1061","Contenu","W","N","frame",$this->attr["FIELD_HIDDENS"],"","BOOK");
     
     $this->attr["book_fr_pages"]=new FieldSetAttribute("book_fr_pages", "1061","Mise en pages","W","N","frame",$this->attr["FIELD_HIDDENS"],"","BOOK");
     
     $this->attr["fld_fr_prof"]=new FieldSetAttribute("fld_fr_prof", "1061","Profils par défaut","H","N","frame",$this->attr["FIELD_HIDDENS"],"","BOOK");
     
     $this->attr["fld_fr_rest"]=new FieldSetAttribute("fld_fr_rest", "1061","Restrictions","H","N","frame",$this->attr["FIELD_HIDDENS"],"","BOOK");
     
     
     $this->attr["book_abstract"]=new NormalAttribute("book_abstract", "1061","Résumé","longtext","",false,110,"",
                                                "W",false,false,false,
						$this->attr["book_fr_info"],"","","","","N","","vlabel=up","BOOK");

     
     $this->attr["book_pdf"]=new NormalAttribute("book_pdf", "1061","PDF","file","",false,120,"",
                                                "R",false,false,false,
						$this->attr["book_fr_info"],"","","","","N","","","BOOK");

     
     $this->attr["book_datepdf"]=new NormalAttribute("book_datepdf", "1061","Date de production","timestamp","",false,130,"",
                                                "R",false,false,false,
						$this->attr["book_fr_info"],"","::getFileDate(BOOK_PDF)","","","N","","","BOOK");

     
     $this->attr["book_toc"]=new NormalAttribute("book_toc", "1061","Table des matières","enum","",false,140,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","yes|Avec table des matières,no|Sans table des matières","","","N","","system=yes|bmenu=no","BOOK");

     
     $this->attr["book_headleft"]=new NormalAttribute("book_headleft", "1061","Entête gauche","text","",false,150,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","elabel=utiliser ##PAGES## et ##PAGE## pour la numérotation des pages","BOOK");

     
     $this->attr["book_headmiddle"]=new NormalAttribute("book_headmiddle", "1061","Entête centre","text","",false,160,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","","BOOK");

     
     $this->attr["book_headright"]=new NormalAttribute("book_headright", "1061","Entête droite","text","",false,170,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","","BOOK");

     
     $this->attr["book_footleft"]=new NormalAttribute("book_footleft", "1061","Pied de page gauche","text","",false,180,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","","BOOK");

     
     $this->attr["book_footmiddle"]=new NormalAttribute("book_footmiddle", "1061","Pied de page centre","text","",false,190,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","","BOOK");

     
     $this->attr["book_footright"]=new NormalAttribute("book_footright", "1061","Pied de page droite","text","",false,200,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","","BOOK");

     
     $this->attr["book_tplodt"]=new NormalAttribute("book_tplodt", "1061","Style OpenDocument","file","",false,210,"",
                                                "W",false,false,false,
						$this->attr["book_fr_pages"],"","","","","N","","search=no","BOOK");

     
     $this->attr["ba_desc"]=new NormalAttribute("ba_desc", "1061","Sujet","longtext","",false,20,"",
                                                "W",false,false,true,
						$this->attr["fr_basic"],"","","","","N","","","BOOK");

     
		
	 $this->absoluteOrders=["fr_basic"=>10,"ba_title"=>20,"ba_desc"=>30,"gui_color"=>40,"gui_isrss"=>50,"gui_sysrss"=>60,"book_addchapter"=>70,"fld_open"=>80,"book_open"=>90,"fld_copybasket"=>100,"book_gen_html"=>110,"book_gen_pdf"=>120,"fld_openfolio"=>130,"fld_insertdoc"=>140,"fld_setsysrss"=>150,"book_fr_info"=>160,"book_abstract"=>170,"book_pdf"=>180,"book_datepdf"=>190,"book_fr_pages"=>200,"book_toc"=>210,"book_headleft"=>220,"book_headmiddle"=>230,"book_headright"=>240,"book_footleft"=>250,"book_footmiddle"=>260,"book_footright"=>270,"book_tplodt"=>280,"fld_fr_rest"=>290,"fld_allbut"=>300,"fld_tfam"=>310,"fld_fam"=>320,"fld_famids"=>330,"fld_subfam"=>340,"fld_fr_prof"=>350,"fld_pdoc"=>360,"fld_pdocid"=>370,"fld_pdir"=>380,"fld_pdirid"=>390];
     $this->fromids[1061]=1061;
     $this->fromname='BOOK';

    $this->fields["book_abstract"]="book_abstract";
    $this->fields["book_pdf"]="book_pdf";
    $this->fields["book_datepdf"]="book_datepdf";
    $this->fields["book_toc"]="book_toc";
    $this->fields["book_headleft"]="book_headleft";
    $this->fields["book_headmiddle"]="book_headmiddle";
    $this->fields["book_headright"]="book_headright";
    $this->fields["book_footleft"]="book_footleft";
    $this->fields["book_footmiddle"]="book_footmiddle";
    $this->fields["book_footright"]="book_footright";
    $this->fields["book_tplodt"]="book_tplodt";
    $this->fields["ba_desc"]="ba_desc";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Book extends \Dcp\Book\Book {
   //  family : Livre

   public $dbtable="doc1061";
   public $dbseq="seq_doc1061";
   public $sqlcreate = array("create table doc1061 (book_abstract text,book_pdf text,book_datepdf timestamp without time zone,book_toc text,book_headleft text,book_headmiddle text,book_headright text,book_footleft text,book_footmiddle text,book_footright text,book_tplodt text,ba_desc text) inherits (doc2);",
     "create sequence seq_doc1061 start 1;",
     "alter TABLE doc1061 ADD primary key (id);",
     "select setval('seq_doc1061', count(distinct initid)+1, false )  from only doc1061;");
   

     public $fromid=1061;
     public $fromname='BOOK';
     public $fromtitle="Livre";
     const familyName='BOOK';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc1061();
          if (isset($this->attributes->fields))  $this->fields += $this->attributes->fields;
        }
        parent::__construct($dbaccess, intval($id), $res, $dbid);
        $this->postConstructor();
   }

   function SpecRefreshGen($onlyspec=false) {
       $err = parent::specRefreshGen();

       $err .= ($err!=''?"\n":'') . $this->specRefreshGenAttribute("book_datepdf", "::getFileDate(BOOK_PDF)");


       return $err;
   }
   


}
}
     
// alias name for the class
namespace {
    class_alias('\Dcp\Family\Book','_Book');
    class_alias('\Dcp\Family\Book' , 'Doc1061');
}

