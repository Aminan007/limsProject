<?php
/*
 * @author Anakeen
 * @package FDL
*/
/**
 * @author Anakeen
 */
// ---------------------------------------------------------------
// $Id: FDL_init.php.in,v 1.29 2009/01/07 18:04:19 eric Exp $
// $Source: /home/cvsroot/anakeen/freedom/freedom/App/Fdl/FDL_init.php.in,v $
// ---------------------------------------------------------------
global $app_const;

$app_const = array(
    "INIT" => "yes",
    "VERSION" => "3.2.23-6",
    "ENUM_TITLE_SIZE" => array(
        "val" => "40",
        "user" => "Y",
        "global" => "Y",
        "descr" => N_("string limit for popup enum")
    ) ,
    "FDL_BCC" => array(
        "val" => "no",
        "descr" => N_("send mail copy") ,
        "user" => "Y",
        "global" => "Y",
        "kind" => "enum(yes|no)"
    ) ,
    
    "FDL_HD2SIZE" => array(
        "val" => "600",
        "descr" => N_("horizontal size for secondary windows") ,
        "user" => "Y",
        "global" => "Y"
    ) ,
    "FDL_VD2SIZE" => array(
        "val" => "400",
        "descr" => N_("vertical size for secondary windows") ,
        "user" => "Y",
        "global" => "Y"
    ) ,
    "FDL_OLDFILEINPUTCOMPAT" => array(
        "val" => "no",
        "descr" => N_("Use old file inputs compatibity form") ,
        "user" => "N",
        "global" => "Y",
        "kind" => "enum(yes|no)"
    ) ,
    "FDL_FOLDERMAXITEM" => array(
        "val" => "1000",
        "descr" => N_("max items return when open a folder") ,
        "user" => "N",
        "global" => "Y"
    ) ,
    "FDL_MAX_FGEXPORTDOC" => array(
        "val" => "100",
        "descr" => N_("maximum document can be imported directly") ,
        "user" => "N",
        "global" => "Y"
    ) ,
    "SOCIETY_COORD" => array(
        "val" => "SomeOne<BR>12 paradise road<BR>34000 NewYork<BR>Phone:08.789.678<BR>Fax:09.5627.32",
        "global" => "Y",
        "descr" => N_("name and address of our society")
    ) ,
    "SOCIETY_LOGO" => array(
        "val" => "Images/logo.png",
        "global" => "Y",
        "descr" => N_("logo of our society")
    ) ,
    "SOCIETY_TOWN" => array(
        "val" => "New York",
        "global" => "Y",
        "descr" => N_("town of our society")
    ) ,
    "SOCIETY_NAME" => array(
        "val" => "SomeOne",
        "global" => "Y",
        "descr" => N_("name of our society")
    ) ,
    "SOCIETY_PHONE" => array(
        "val" => "00 00 00 00",
        "global" => "Y",
        "descr" => N_("phone of our society")
    ) ,
    "FDL_CTRLKEY" => array(
        "val" => "yes",
        "global" => "Y",
        "user" => "Y",
        "descr" => N_("use ctrl key in popup menu") ,
        "kind" => "enum(yes|no)"
    ) ,
    "FDL_VIEWALTERN" => array(
        "val" => "yes",
        "global" => "Y",
        "user" => "Y",
        "descr" => N_("view altern color in document fieldset") ,
        "kind" => "enum(yes|no)"
    ) ,
    "MVIEW_GEO" => array(
        "val" => "",
        "global" => "Y",
        "user" => "Y",
        "kind" => "static",
        "descr" => N_("geometry of mini view")
    ) ,
    "SMTP_HOST" => array(
        "val" => "localhost",
        "global" => "Y",
        "user" => "N",
        "descr" => N_("SMTP host")
    ) ,
    "SMTP_PORT" => array(
        "val" => "25",
        "global" => "Y",
        "user" => "N",
        "descr" => N_("SMTP port")
    ) ,
    "SMTP_LOGIN" => array(
        "val" => "",
        "global" => "Y",
        "user" => "N",
        "descr" => N_("SMTP login")
    ) ,
    "SMTP_PASSWORD" => array(
        "val" => "",
        "global" => "Y",
        "kind" => "password",
        "user" => "N",
        "descr" => N_("SMTP password")
    ) ,
    
    "SMTP_FROM" => array(
        "val" => "",
        "global" => "Y",
        "user" => "N",
        "descr" => N_("SMTP default from if not")
    ) ,
    "SMTP_SENDER" => array(
        "val" => "",
        "global" => "Y",
        "user" => "N",
        "descr" => N_("SMTP sender")
    ) ,
    "FDL_FULLIDX" => array(
        "val" => "gist",
        "descr" => N_("fulltext index mode") ,
        "user" => "N",
        "global" => "Y",
        "kind" => "enum(gist|gin)"
    ) ,
    "FDL_TIMERHOURLIMIT" => array(
        "val" => "2",
        "descr" => N_("hour number where timer can be execute until date is reached") ,
        "user" => "N",
        "global" => "Y"
    ) ,
    "REPORT_DEFAULT_CSV" => array(
        "val" => "[]",
        "descr" => N_("fulltext index mode") ,
        "user" => "Y"
    ) ,
    "LDAP_SERVEUR" => array(
        "val" => "localhost",
        "descr" => N_("LDAP server name") ,
        "global" => "Y"
    ) ,
    "LDAP_PORT" => array(
        "val" => "389",
        "descr" => N_("LDAP server port") ,
        "global" => "Y"
    ) ,
    "LDAP_ROOT" => array(
        "val" => "o=Anakeen,c=fr",
        "descr" => N_("LDAP server root") ,
        "global" => "Y"
    ) ,
    "LDAP_ROOTDN" => array(
        "val" => "cn=Manager,o=Anakeen,c=fr",
        "descr" => N_("LDAP admin identificatot") ,
        "global" => "Y"
    ) ,
    "LDAP_ROOTPW" => array(
        "val" => "secret",
        "descr" => N_("LDAP admin passord") ,
        "kind" => "password",
        "global" => "Y"
    ) ,
    "LDAP_ENABLED" => array(
        "val" => "no",
        "descr" => N_("LDAP activated") ,
        "kind" => "enum(yes|no)",
        "global" => "Y"
    ) ,
    "FOOTER_ZONE_VIEW" => array(
        "val" => "{}",
        "descr" => N_("View Zones for FOOTER") ,
        "global" => "Y"
    ) ,
    "FOOTER_ZONE_EDIT" => array(
        "val" => "{}",
        "descr" => N_("EDIT Zones for FOOTER") ,
        "global" => "Y"
    ) ,
    "EXPORT_CSVSEPARATOR" => array(
        "val" => ";",
        "descr" => N_("user csv separator preferences when export documents") ,
        "global" => "Y",
        "user" => "Y"
    ) ,
    "EXPORT_CSVENCLOSURE" => array(
        "val" => "",
        "descr" => N_("user csv enclosure preferences when export documents") ,
        "global" => "Y",
        "user" => "Y"
    ) ,
);
