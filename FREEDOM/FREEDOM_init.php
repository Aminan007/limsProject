<?php

/**
 * @author Anakeen
 */

// ---------------------------------------------------------------
// $Id: FREEDOM_init.php.in,v 1.19 2008/11/13 16:48:13 eric Exp $
// $Source: /home/cvsroot/anakeen/freedom/freedom/App/Freedom/FREEDOM_init.php.in,v $
// ---------------------------------------------------------------

global $app_const;

$app_const= 
array(
      "INIT" => "yes",
      "VERSION"			=>"3.2.23-6",	    
      "ROOTFLD" => array(		
			 "val"=>"9",
			 "descr"=> N_("root folder id")),

      "FULLTEXT_HIGHTLIGHTSIZE" => array(		
				    "val"=>"200",
				    "descr"=> N_("Limit of text size (in Ko) for highlight text"),
				    "global"=>"Y"),
      "FREEDOM_FULLTEXT_RESULT" => array(
					 "val" => 100,
					 "descr" => "",
					 "global" => "Y",
					 "user" => "N"
					 ),
      "FREEDOM_IDBASKET" => array(		
				  "val"=>"",
				  "descr"=> N_("id of the basket folder"),
				  "global"=>"Y",
				  "kind"=>"static",
				  "user"=>"Y"
				  ),
      "FREEDOM_UPLOADDIR" => array(		
				   "val"=>"./var/tmp",
				   "descr"=> N_("directory to upload archive"),
				   "global"=>"Y",
				   "user"=>"N"
				   ),
      "FREEDOM_VIEWFRAME" => array(		
				   "val"=>"navigator",
				   "descr"=> N_("mode to navigate in folders"),
				   "global"=>"Y",
				   "user"=>"Y",
				   "kind"=>"enum(navigator|folder)"
				   ),
      "FREEDOM_UBOOK" => array(		
			       "val"=>"",
			       "descr"=> N_("bookmark folders"),
			       "global"=>"Y",
			       "user"=>"Y"
			       ),
      "FREEDOM_EXPORTCOLS" => array(		
			       "val"=>"",
			       "descr"=> N_("user preferences when export family"),
			       "global"=>"Y",
			       "user"=>"Y"
			       ),

      "FREEDOM_CSVSEPARATOR" => array(
			       "val"=>";",
			       "descr"=> N_("user csv separator preferences when import documents"),
			       "global"=>"Y",
			       "user"=>"Y"
			       ),
      "FREEDOM_CSVENCLOSURE" => array(
			       "val"=>"",
			       "descr"=> N_("user csv enclosure preferences when import documents"),
			       "global"=>"Y",
			       "user"=>"Y"
			       ),
      "FREEDOM_CSVLINEBREAK" => array(
			       "val"=>'\n',
			       "descr"=> N_("user csv line break preferences when import documents"),
			       "global"=>"Y",
			       "user"=>"Y"
			       )
	     
      );
	     
	     
	     
?>
