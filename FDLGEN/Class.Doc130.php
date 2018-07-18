<?php


namespace {



class ADoc130 extends ADoc {
    // for familly : Rôle

   function __construct () {
      ADoc::__construct();

     
     
     
     $this->attr["role_fr_ident"]=new FieldSetAttribute("role_fr_ident", "130","Identification","W","N","frame",$this->attr["FIELD_HIDDENS"],"","ROLE");
     
     
     $this->attr["role_login"]=new NormalAttribute("role_login", "130","Référence","text","",false,110,"",
                                                "R",false,false,false,
						$this->attr["role_fr_ident"],"","","","::isUniqueLogin(ROLE_LOGIN)","N","","","ROLE");

     
     $this->attr["role_name"]=new NormalAttribute("role_name", "130","Libellé","text","",false,120,"",
                                                "W",true,true,false,
						$this->attr["role_fr_ident"],"","","","","N","","","ROLE");

     
     $this->attr["us_whatid"]=new NormalAttribute("us_whatid", "130","Identifiant système","int","",false,200,"",
                                                "R",false,false,false,
						$this->attr["role_fr_ident"],"","","","::isInteger(us_whatid)","N","","","ROLE");

     
		
	 $this->absoluteOrders=["role_fr_ident"=>10,"role_login"=>20,"role_name"=>30,"us_whatid"=>40];
     $this->fromids[130]=130;
     $this->fromname='ROLE';

    $this->fields["role_login"]="role_login";
    $this->fields["role_name"]="role_name";
    $this->fields["us_whatid"]="us_whatid";
   }
}


        }

namespace {

        


}

namespace Dcp\Family {
class Role extends \Dcp\Core\RoleAccount {
   //  family : Rôle

   public $dbtable="doc130";
   public $dbseq="seq_doc130";
   public $sqlcreate = array("create table doc130 (role_login text,role_name text,us_whatid int4) inherits (doc);",
     "create sequence seq_doc130 start 1;",
     "alter TABLE doc130 ADD primary key (id);",
     "select setval('seq_doc130', count(distinct initid)+1, false )  from only doc130;");
   

     public $fromid=130;
     public $fromname='ROLE';
     public $fromtitle="Rôle";
     const familyName='ROLE';

   function __construct ($dbaccess='', $id='',$res='',$dbid=0) {
        if (empty($this->attributes)) {
           $this->attributes = new \ADoc130();
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
    class_alias('\Dcp\Family\Role','_Role');
    class_alias('\Dcp\Family\Role' , 'Doc130');
}

