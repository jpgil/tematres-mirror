<?php
#   TemaTres : aplicaci�n para la gesti�n de lenguajes documentales #       #
#                                                                        #
#   Copyright (C) 2004-2008 Diego Ferreyra tematres@r020.com.ar
#   Distribuido bajo Licencia GNU Public License, versi�n 2 (de junio de 1.991) Free Software Foundation
#  
###############################################################################################################
# ARCHIVO DE CONFIGURACION == CONFIG FILE #


include('db.tematres.php');
include('../common/include/fun.gral.php');

// Conexi�n con la BD || => proceso de instalaci�n
$db = ConectarseMySqli("$DBCFG[Server]", "$DBCFG[DBLogin]","$DBCFG[DBPass]", "$DBCFG[DBName]");

if(!$db)
	{
		header("Location:install.php");
	}

//Agregado para la version mutil
include('../common/include/config.tematres.php');



/*
$CFG["Version"]        = "TemaTres 1.1 beta";

$CFG["VersionWebService"]        = "0.4";
*/

// ID del Tesauro por DEFAULT
$CFG["DFT_TESA"] ='1';

//Config Sites availables for URL search
$CFG["SEARCH_URL_SITES"] =array("wikipedia","Google exacto","Google scholar","Google images","Google books");

// Config URI base for XML URI as identifiers. If null, use URI vocabulary
$CFG["_URI_BASE_ID"] = '';

// Config char beween _URI_BASE_ID and term ID. If null, use '?tema=' for HTTP response
$CFG["_URI_SEPARATOR_ID"] ='?tema=';

// Config char encode (only can be: utf-8 or iso-8859-1)
$CFG["_CHAR_ENCODE"] ='utf-8';


// use term codes to sort the terms
$CFG["_USE_CODE"] ='1';

// Maximum level of depth in the tree of items for display on the same page [M�ximo nivel de profundidad en el �rbol de temas para la visualizaci�n en una misma p�gina]
define('CFG_MAX_TREE_DEEP','3');

// Status details visible for any users [Detalles del estado de terminos visibles para todos los usurios] 0 => no public details / 1 => public details
define('CFG_VIEW_STATUS','1');

// Available Web simple web services (1 = Yes, 0 = No: default: 1)
define('CFG_SIMPLE_WEB_SERVICE','1');

// 	Minimum characters for search operations / n�mero m�nimo de caracteres para operaciones de b�squeda 
/*
define('CFG_MIN_SEARCH_SIZE','1');
*/


include('../common/include/session.php');
include('../common/include/fun.sql.php');
include('../common/include/fun.xml.php');
include('../common/include/fun.html.php');
include('../common/include/fun.html_forms.php');
//////////////////// ADMINISTRACION y GESTION ////////////////////////////
if($_SESSION[$_SESSION["CFGURL"]][ssuser_id]){
  require('../common/include/fun.admin.php');
  };
?>
