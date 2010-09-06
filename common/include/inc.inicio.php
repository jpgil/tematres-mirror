<?php
#   TemaTres : aplicaci�n para la gesti�n de lenguajes documentales #       #
#                                                                        #
#   Copyright (C) 2004-2008 Diego Ferreyra tematres@r020.com.ar
#   Distribuido bajo Licencia GNU Public License, versi�n 2 (de junio de 1.991) Free Software Foundation
#  
###############################################################################################################
# Include para seleccionar include o funci�n de visualizaicon de listas de t�rminos #

//Mostrar alfabeto
if($_GET[letra])
{
	echo '<div id="bodyText">';
	echo HTMLlistaAlfabeticaUnica($_GET[letra][0]);	
	$letra=trim(urldecode($_GET[letra][0]));
	if(strlen($letra)==1)
		{
		echo HTMLterminosLetra($letra);
		}
	echo '</div>';
}
//Mostrar ficha de termino o crear t�rmino
elseif(
	(is_numeric($metadata["arraydata"]["tema_id"])) ||
	($_GET[taskterm]=='addTerm')
	)
{
	include('../common/include/inc.vistaTermino.php');
}
//Vista de t�rminos seg�n estados
elseif(is_numeric($_GET[estado_id]))
{
	echo '<div id="bodyText">';
	echo HTMLlistaTerminosEstado($_GET[estado_id],"30");
	echo '</div>';
}
//Vista de busqueda avanzada
elseif(($_GET[xsearch]=='1'))
{
	echo '<div id="bodyText">';
	echo HTMLformAdvancedSearch($_GET);
	echo '</div>';
}
//Esta login y mostrar terminios libres o repetidos
elseif(($_SESSION[$_SESSION["CFGURL"]][ssuser_id])&&($_GET[verT]))
{
	echo '<div id="bodyText">';
	switch($_GET[verT]){
		case 'L':
		echo verTerminosLibres();
		break;

		case 'R':
		echo verTerminosRepetidos();
		break;			
		};
	echo '</div>';
}
//Mostrar terminos topes
else
{		
	echo HTMLtopTerms();
};
?>
