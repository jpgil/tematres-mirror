<?php
#   TemaTres : aplicaci�n para la gesti�n de lenguajes documentales #       #
#                                                                        #
#   Copyright (C) 2004-2008 Diego Ferreyra tematres@r020.com.ar
#   Distribuido bajo Licencia GNU Public License, versi�n 2 (de junio de 1.991) Free Software Foundation
#  
###############################################################################################################
#   Include para seleccionar include o funci�n de formulario de edici�n

//array de acciones posibles para asociar t�rminos
$arrayTaskExistTerms=array("addBT","addRT","addFreeUF","addFreeNT");

//verificar que hay datos de un termino y que hubiera session
if($_SESSION[$_SESSION["CFGURL"]][ssuser_id])
{
	switch($_GET[taskterm])
	{
		case 'addBT':
		echo HTMLformAssociateExistTerms($_GET[taskterm],$metadata["arraydata"],$term_id);
		break;

		case 'addRT':
		echo HTMLformAssociateExistTerms($_GET[taskterm],$metadata["arraydata"],$term_id);
		break;

		case 'addFreeUF':
		echo HTMLformAssociateExistTerms($_GET[taskterm],$metadata["arraydata"],$term_id);
		break;

		case 'addFreeNT':
		echo HTMLformAssociateExistTerms($_GET[taskterm],$metadata["arraydata"],$term_id);
		break;

		case 'addEQ':
		echo HTMLformAltaEquivalenciaTermino(ARRAYverDatosTermino($tema));
		break;

		case 'editNote':
		include('inc.abmNota.php');	
		break;

		case 'addNT':
		echo HTMLformEditTerms($_GET[taskterm],$metadata["arraydata"]);
		break;

		case 'addUF':
		echo HTMLformEditTerms($_GET[taskterm],$metadata["arraydata"]);
		break;

		case 'addTerm':
		echo HTMLformEditTerms($_GET[taskterm],$metadata["arraydata"]);
		break;
		
		case 'editTerm':
		echo HTMLformEditTerms($_GET[taskterm],$metadata["arraydata"]);
		break;
		
		case 'findTargetTerm':
		echo HTMLformAssociateTargetTerms($metadata["arraydata"]);
		break;
		
		default:
		echo HTMLbodyTermino($metadata["arraydata"]);
	}

} 
elseif($metadata["arraydata"])
{
		echo HTMLbodyTermino($metadata["arraydata"]);
}
?>
