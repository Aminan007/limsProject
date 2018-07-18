<?php
/*
 * @author Anakeen
 * @package FDL
 */
/**
 * @author Anakeen
 */
// ---------------------------------------------------------------
// $Id:  $
// ---------------------------------------------------------------
global $app_const;

$app_const = array(
    "INIT" => "yes",
    "VERSION" => "3.2.8-0",
    "DATA_LCDATE" => array(
        "val" => "iso",
        "descr" => N_("format in date") ,
        "kind" => "enum(iso|local)",
        "global" => "Y"
    ) ,
    "DATA_DEBUG" => array(
        "val" => "no",
        "descr" => N_("debug mode") ,
        "kind" => "enum(no|yes)",
        "global" => "N"
    )
);
?>
