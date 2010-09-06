<?php
#   TemaTres : aplicaci�n para la gesti�n de lenguajes documentales #       #
#                                                                        #
#   Copyright (C) 2004-2008 Diego Ferreyra tematres@r020.com.ar
#   Distribuido bajo Licencia GNU Public License, versi�n 2 (de junio de 1.991) Free Software Foundation
#  
###############################################################################################################
# Funciones para presentar formularios HTML. #
#


function HTMLformAssociateExistTerms($taskterm,$ARRAYtermino,$term_id="0")
{
	switch ($taskterm)
	{
	case 'addRT': 
    $nombre_pantalla=LABEL_AgregarTR.' <a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>';
	break;

	case 'addBT': 
    $nombre_pantalla=sprintf(LABEL_AgregarTG,'<a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>');
	break;

	case 'addFreeUF': 
    $nombre_pantalla=sprintf(LABEL_existAgregarUP,'<a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>');
	break;

	case 'addFreeNT': 
    $nombre_pantalla=sprintf(LABEL_existAgregarTE,'<a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>');
	break;

	default: '';
	}
	
 if(doValue($_POST,FORM_LABEL_buscarTermino)){
     
	 $expresBusca=doValue($_POST,FORM_LABEL_buscarTermino);     
	 
	 //seleccionar SQL adecuado a la operacion
	 if(($taskterm=='addFreeNT') || ($taskterm=='addFreeUF'))
	 {
		 $sql_busca=SQLsearchFreeTerms("$expresBusca");
	 }
	 else
	 {
		 $sql_busca=SQLbuscaTR("$ARRAYtermino[idTema]","$expresBusca");
	 }
	 

     $search_leyenda='<h3>'.$sql_busca[cant].' '.MSG_ResultBusca.' '.$expresBusca.'".</h3>'."\n\r";
     
	 if($sql_busca[cant]>0){
		 $row_result='<ol style="list-style-position:inside;">';
		 while($resulta_busca=mysqli_fetch_row($sql_busca[datos])){
				 $row_result.='<li><a href="'.$PHP_SELF.'?tema='.$resulta_busca[0].'" class="link_secundario">'.LABEL_Detalle.'</a> |';
				 $row_result.=' <a href="'.$PHP_SELF.'?rema_id='.$resulta_busca[0].'&amp;tema='.$ARRAYtermino[idTema].'&amp;taskrelations='.$taskterm.'">'.$resulta_busca[1].'</a></li>';
				 };
 		 $row_result.='</ol>'."\n\r";
      };// fin de if result

};//fin de if buscar

$rows.='<div id="bodyText">
<a class="topOfPage" href="javascript: history.go(-1);">'.LABEL_Anterior.'</a>
<h1>'.LABEL_EditorTermino.'</h1>
  <fieldset>
    <legend>'.$nombre_pantalla.'</legend>
	 <form class="formdiv" name="busca_rel" action="'.$PHP_SELF.'" method="POST" onsubmit="return checkrequired(this)">'.LABEL_BuscaTermino.':
		<input name="'.FORM_LABEL_buscarTermino.'" type="text" id="addExistTerm" size="15" maxlength="50"/>
  	  <input type="submit" name="boton" value="'.LABEL_Buscar.'"/>
	  <input type="button"  name="cancelar" type="button" onClick="location.href=\'index.php?tema='.$ARRAYtermino[idTema].'\'" value="'.ucfirst(LABEL_Cancelar).'"/>
	  <input type="hidden" name="tema" value="'.$ARRAYtermino[idTema].'"/>
	  <input type="hidden" name="'.$hidden.'" value="'.$ARRAYtermino[idTema].'"/>
	  <input type="hidden" name="taskterm" value="'.$taskterm.'"/>	  
 </form>';
$rows.=$search_leyenda;
$rows.=$row_result;
$rows.='</fieldset>';
$rows.='   </div>';

return $rows;	
}


/*
 * Form for edit or add terms
3 casos:
- Alta y edici�n de un t�rmino nuevo.
- Alta de un t�rmino no preferido de un t�rmino preferido.
- Alta de un t�rmino subordinado a un t�rmino.
* 
*/
function HTMLformEditTerms($taskterm,$ARRAYtermino="0")
{

switch($taskterm)
{
	case 'addTerm':// add term
	$nombre_pantalla=LABEL_AgregarT;
	$hidden='<INPUT TYPE="HIDDEN"  name="alta_t" value="new" />';
	$hidden.='<div><label for="estado_id" accesskey="e">'.ucfirst(LABEL_Candidato).'</label><input type="checkbox" name="estado_id" id="estado_id" value="12" alt="'.ucfirst(LABEL_Candidato).'" /> </div>';
	$help_rows='<p class="help">'.HELP_variosTerminos.'</p>';
	break;

	case 'editTerm'://Edici�n de un t�rmino $edit_id
	$nombre_pantalla=LABEL_editT.' <a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>';
	$vista_titulo_tema=$ARRAYtermino[titTema];
	$vista_desc_tema=$ARRAYtermino[descTema];
	$hidden='<INPUT TYPE="HIDDEN"  name="edit_id_tema" value="'.$ARRAYtermino[idTema].'" />';
	break;

	case 'addNT':// add narowwer term
	$nombre_pantalla=LABEL_AgregarTE.' <a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>';
	$hidden.='<INPUT TYPE="HIDDEN"  name="id_termino_sub" value="'.$ARRAYtermino[idTema].'" />';
	$help_rows='<p class="help">'.HELP_variosTerminos.'</p>';
	break;

	case 'addUF'://Alta de un t�rmino no preferido a $id_uf
	$nombre_pantalla=LABEL_AgregarUP.' <a href="'.$PHP_SELF.'?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a>';
	$hidden='<INPUT TYPE="HIDDEN"  name="id_termino_uf" value="'.$ARRAYtermino[idTema].'" />';
	$help_rows='<p class="help">'.HELP_variosTerminos.'</p>';
	break;
};

$rows.='<div id="bodyText">
<a class="topOfPage" href="javascript: history.go(-1);">'.LABEL_Anterior.'</a>
<h1>'.LABEL_EditorTermino .'</h1>
  <fieldset>
    <legend>'.$nombre_pantalla.'</legend>

   <form class="formdiv" name="alta_t" action="index.php" method="post" onsubmit="return checkrequired(this)">
	<div><label for="'.FORM_LABEL_termino .'" accesskey="t">'.LABEL_Termino.'</label>
	<textarea rows="2" cols="50" name="'.FORM_LABEL_termino .'" id="addTerms">'.$vista_titulo_tema.'</textarea>
	</div>';
$rows.=$hidden;
$rows.='<div class="submit_form" align="center">';
$rows.='<input type="submit"  name="boton" value="'.LABEL_Enviar.'"/>';
$rows.='<input type="button"  name="cancelar" type="button" onClick="location.href=\'index.php?tema='.$ARRAYtermino[idTema].'>\'" value="'.ucfirst(LABEL_Cancelar).'"/>';
$rows.='</div>';
$rows.='</form>';
$rows.='  </fieldset>';
  
$rows.=$help_rows;
  
$rows.='</div>';
return $rows;	
}




/*
Advanced search form
* 
*/
function HTMLformAdvancedSearch($array) 
{

GLOBAL $CFG;

$rows.=' <fieldset>
    <legend>'.ucfirst(LABEL_BusquedaAvanzada).'</legend>
   <form class="formdiv" name="advancedsearch" action="index.php#xstring" method="get" onsubmit="return checkrequired(this)">';
    $LABEL_Termino=ucfirst(LABEL_Termino);
    $LABEL_esNoPreferido=ucfirst(LABEL_esNoPreferido);
    $LABEL_CODE=ucfirst(LABEL_CODE);
		
	$rows.='<div><label for="ws" accesskey="f">'.ucfirst(LABEL_QueBuscar).'</label>';
	$rows.='<select id="ws" name="ws">';

	$arrayWS=($CFG["_USE_CODE"]=='1') ? array("t#$LABEL_Termino","uf#$LABEL_esNoPreferido","c#$LABEL_CODE") : array("t#$LABEL_Termino","uf#$LABEL_esNoPreferido");  

	$rows.=doSelectForm($arrayWS,"$_GET[ws]");
	$rows.='</select>';
//	$rows.='<input name="isUF" type="checkbox" id="isUF" value="1" '.do_check('1',$_GET[isUF],"checked").'/>';
	$rows.='</div>';


	$rows.='<div><label for="xstring" accesskey="s">'.ucfirst(LABEL_BuscaTermino).'</label>';
	$rows.='<input name="xstring" type="text" id="xstring" size="25" maxlength="50" value="'.$_GET[xstring].'"/>';
	$rows.='</div>';
	
	$rows.='<div><label for="isExactMatch" accesskey="f">'.ucfirst(LABEL_esFraseExacta).'</label>';
	$rows.='<input name="isExactMatch" type="checkbox" id="isExactMatch" value="1" '.do_check('1',$_GET[isExactMatch],"checked").'/>';
	$rows.='</div>';


	//Evaluar si hay top terms
	$sqlTopTerm=SQLverTopTerm();
	if($sqlTopTerm[cant])
	{
		while ($arrayTopTerms=mysqli_fetch_array($sqlTopTerm[datos])) 
		{
			$formSelectTopTerms[]=$arrayTopTerms[tema_id].'#'.$arrayTopTerms[tema];
		}
		$rows.='<div><label for="hasTopTerm" accesskey="t">'.ucfirst(LABEL_TopTerm).'</label>';
		$rows.='<select id="hasTopTerm" name="hasTopTerm">';
		$rows.='<option value="">'.ucfirst(LABEL_Todos).'</option>';
		$rows.=doSelectForm($formSelectTopTerms,"$_GET[hasTopTerm]");
		$rows.='</select>';
		$rows.='</div>';
	}
    
	//Evaluar si hay notas
	$resumen=ARRAYresumen($_SESSION[id_tesa],"G","");
	if (is_array($resumen["cant_notas"])) 
	{
		
		$arrayTiposNotas= array('NA'=>LABEL_NA,'NH'=>LABEL_NH,'NC'=>LABEL_NC,'NB'=>LABEL_NB,'NP'=>LABEL_NP);

		foreach ($resumen["cant_notas"] as $knotas => $vnotas) 
		{
			$formSelectTipoNota[]=$knotas.'#'.$arrayTiposNotas[$knotas].' ('.$vnotas.')';			 
		}
	$rows.='<div><label for="hasNote" accesskey="n">'.ucfirst(LABEL_tipoNota).'</label>';
	$rows.='<select id="hasNote" name="hasNote">';
	$rows.='<option value="">'.ucfirst(LABEL_Todos).'</option>';
	$rows.=doSelectForm($formSelectTipoNota,"$_GET[hasNote]");
	$rows.='</select>';
	$rows.='</div>';
	}
	
  	
   	//Evaluar si hay terminos
    $sqlTermsByDates=SQLtermsByDate();   	
	if($sqlTermsByDates[cant])
	{   	
		GLOBAL $MONTHS;
		while ($arrayTermsByDates=mysqli_fetch_array($sqlTermsByDates[datos])) 
		{
			//normalizacion de fechas
			$arrayTermsByDates[months]=(strlen($arrayTermsByDates[months])==1) ? '0'.$arrayTermsByDates[months] : $arrayTermsByDates[months];
			
			$formSelectByDate[]=$arrayTermsByDates[years].'-'.$arrayTermsByDates[months].'#'.$MONTHS["$arrayTermsByDates[months]"].'/'.$arrayTermsByDates[years].' ('.$arrayTermsByDates[cant].')';
		}

		$rows.='<div><label for="fromDate" accesskey="d">'.ucfirst(LABEL_DesdeFecha).'</label>';
		$rows.='<select id="fromDate" name="fromDate">';
		$rows.='<option value="">'.ucfirst(LABEL_Todos).'</option>';
		$rows.=doSelectForm($formSelectByDate,"$_GET[fromDate]");
		$rows.='</select>'.ucfirst(LABEL_mes).'/'.ucfirst(LABEL_ano);
		$rows.='</div>';
	};
	
   	//Evaluar si hay candidatos
    $sqlTermsByDeep=SQLTermDeep();   	
	if($sqlTermsByDeep[cant]>1)
	{   	
		while ($arrayTermsByDeep=mysqli_fetch_array($sqlTermsByDeep[datos])) 
		{
			
			$formSelectByDeep[]=$arrayTermsByDeep[tdeep].'#'.$arrayTermsByDeep[tdeep].' ('.$arrayTermsByDeep[cant].')';
			
		}
		$rows.='<div><label for="termDeep" accesskey="e">'.ucfirst(LABEL_ProfundidadTermino).'</label>';
		$rows.='<select id="termDeep" name="termDeep">';
		$rows.='<option value="">'.ucfirst(LABEL_Todos).'</option>';
		$rows.=doSelectForm($formSelectByDeep,"$_GET[termDeep]");
		$rows.='</select>';
		$rows.='</div>';
	};
	
$rows.='<div class="submit_form" align="center">';	
$rows.='<input type="submit"  id="boton" name="boton" value="'.LABEL_Enviar.'"/>';
$rows.='<input type="hidden"  name="xsearch" id="xsearch" value="1"/>';
$rows.='<input type="button"  name="cancelar" type="button" onClick="location.href=\'index.php\'" value="'.ucfirst(LABEL_Cancelar).'"/>';
$rows.='</div>';
$rows.='</form>';
$rows.='  </fieldset>';


if($_GET[boton]==LABEL_Enviar)
{
	$rows.=HTMLadvancedSearchResult($_GET);
}


return $rows;
}



/*
Register web services provider
* 
*/
function HTMLformTargetVocabulary($tvocab_id="0") 
{

GLOBAL $CFG;

$array=($tvocab_id>0) ? ARRAYtargetVocabulary($tvocab_id) : array();

$array[tvocab_status] = (is_numeric($array[tvocab_status])) ? $array[tvocab_status] : '1';

$doAdmin= ($array[tvocab_id]>0) ? 'saveTargetVocabulary' : 'addTargetVocabulary';



$rows.=' <fieldset>
    <legend><a href="admin.php?vocabulario_id=list">'.ucfirst(LABEL_lcConfig).'</a> &middot; '.ucfirst(LABEL_TargetVocabularyWS).'</legend>
   <form class="formdiv" name="abmTargetVocabulary" action="admin.php" method="post" onsubmit="return checkrequired(this)">';
	
	if($array[tvocab_id])
	{
		$rows.='<div><label for="tvocab_label">'.ucfirst(LABEL_Titulo).'</label>';
		$rows.='<a id="tvocab_title" href="'.$array[tvocab_url].'">'.$array[tvocab_title].'</a>';
		$rows.='</div>';
		
		$link2tterms='<a href="admin.php?doAdmin=seeTermsTargetVocabulary&amp;tvocab_id='.$array[tvocab_id].'">'.$array[cant].' '.LABEL_Terminos.'</a>';
	}
	

	$rows.='<div><label for="tvocab_label" accesskey="l">'.ucfirst(LABEL_tvocab_label).'</label>';
	$rows.='<input name="tvocab_label" type="text" id="tvocab_label" size="25" maxlength="50" value="'.$array[tvocab_label].'"/>';
	$rows.='</div>';

	$rows.='<div><label for="tvocab_tag" accesskey="t">'.ucfirst(LABEL_tvocab_tag).'</label>';
	$rows.='<input name="tvocab_tag" type="text" id="tvocab_tag" size="5" maxlength="5" value="'.$array[tvocab_tag].'"/>';
	$rows.='</div>';

	$rows.='<div><label for="tvocab_uri_service" accesskey="u">'.ucfirst(LABEL_tvocab_uri_service).'</label>';
	if($array[tvocab_id])
	{
		$rows.='<span id="tvocab_uri_service">'.$array[tvocab_uri_service].'</span>';
	}
	else 
	{
		$rows.='<input name="tvocab_uri_service" type="text" id="tvocab_uri_service" size="50" maxlength="250"  value="'.$array[tvocab_uri_service].'"/>';
	}
	
	$rows.='</div>';

	$rows.='<div><label for="tvocab_status" accesskey="u">'.ucfirst(LABEL_enable).'</label>';
	$rows.='<input name="tvocab_status" type="checkbox" id="tvocab_status" value="1" '.do_check('1',$array[tvocab_status],"checked").'"/>'.$link2tterms;
	$rows.='</div>';
	
$rows.='<div class="submit_form" align="center">';	
$rows.='<input type="submit"  id="boton" name="botonTargetVocabulary" value="'.LABEL_Enviar.'"/>';
$rows.='<input type="hidden"  id="tvocab_id" name="tvocab_id" value="'.$array[tvocab_id].'"/>';
$rows.='<input type="hidden"  name="doAdmin" id="doAdmin" value="'.$doAdmin.'"/>';
$rows.='<input type="button"  name="cancelar" type="button" onClick="location.href=\'admin.php\'" value="'.ucfirst(LABEL_Cancelar).'"/>';
$rows.='</div>';
$rows.='</form>';
$rows.='  </fieldset>';

return $rows;
}


/*
Asociaci�n con datos provistos por web services terminol�gicos TemaTres
*/
function HTMLformAssociateTargetTerms($ARRAYtermino,$term_id="0")
{

$sql=SQLtargetVocabulary("1");

$rows='<div id="bodyText">';
$rows.='<a class="topOfPage" href="javascript: history.go(-1);">'.LABEL_Anterior.'</a>';
$rows.='<h1>'.LABEL_EditorTermino.'</h1>';
$rows.='  <fieldset>';
$rows.='    <legend>'.LABEL_relacion_vocabulario.' <a href="index.php?tema='.$ARRAYtermino[idTema].'">'.$ARRAYtermino[titTema].'</a></legend>';

if(!$sql[cant]){
	//No hay vocabularios de referencia, solo vocabulario principal
	$rows.='<p class="error">'.ucfirst(LABEL_NO_vocabulario_referencia).'</p>';
	} else {
	//Hay vobularios de referencia
	$array_vocabularios=array();
	while($array=mysqli_fetch_array($sql[datos])){
		if($array[vocabulario_id]!=='1'){
			//vocabularios que no sean el vocabulario principal
			array_push($array_vocabularios,$array[tvocab_id].'#'.FixEncoding($array[tvocab_label]));
			}
		};

	$rows.='<form class="formdiv" name="alta_tt" action="index.php" method="get" onsubmit="return checkrequired(this)">';
	$rows.='<div>';
	$rows.='<label for="tvocab_id" accesskey="t">';
	$rows.=FORM_LABEL_nombre_vocabulario.'*</label>';
	$rows.='<select id="tvocab_id" name="tvocab_id">';
	$rows.='<optgroup label="'.FORM_LABEL_nombre_vocabulario.'">';
	$rows.=doSelectForm($array_vocabularios,"");
	$rows.='</optgroup>';
	$rows.='</select><br/>';
	$rows.='</div>';
	
	$rows.='<div>';
	$rows.='<label for="string2search" accesskey="s">';
	$rows.=LABEL_Buscar.'</label>';
	$rows.='<input name="string2search" type="text" id="string2search" size="15" maxlength="50"/>';
	$rows.='</div>';
	
	$rows.='<div class="submit_form" align="center">';
  	$rows.='  <input type="submit" name="boton" value="'.LABEL_Buscar.'"/>
	  <input type="button"  name="cancelar" type="button" onClick="location.href=\'index.php?tema='.$ARRAYtermino[idTema].'\'" value="'.ucfirst(LABEL_Cancelar).'"/>
	  <input type="hidden" name="tema" value="'.$ARRAYtermino[idTema].'"/>
	  <input type="hidden" name="taskterm" value="findTargetTerm"/>';	  
	$rows.='</div>';
	$rows.='</form>';
	}
$rows.='  </fieldset>';

if(($_GET[string2search]) && ($_GET[tvocab_id])){
	require('vocabularyservices.php')	;

	$arrayVocab=ARRAYtargetVocabulary($_GET[tvocab_id]);

	$arrayTerm=xmlVocabulary2array($arrayVocab[tvocab_uri_service].'?task=search&arg='.urlencode($_GET[string2search]));
	
	$rows.=HTMLtargetVocabularySearchResult($arrayTerm,$_GET[string2search],$arrayVocab,$ARRAYtermino[idTema]);


};//fin de if buscar
$rows.='   </div>';

return $rows;	
}





function HTMLtargetVocabularySearchResult($array,$string_search,$arrayVocab,$tema_id){

	$tag_type='ol';
	
	$div_title='Resultados para <i>'.$string_search.'</i> en '.FixEncoding($arrayVocab[tvocab_title]).': ';
	
	$rows.='<h3>'.$div_title.' ('.$array["resume"]["cant_result"].')</h3><'.$tag_type.'>';
	
	if($array["resume"]["cant_result"]>"0")	{	
	foreach ($array["result"] as $key => $value){
				while (list( $k, $v ) = each( $value )){
					$i=++$i;
					//Controlar que no sea un resultado unico
					if(is_array($v)){						
						$rows.='<li>';
						$rows.='<a title="" href="'.$PHP_SELF.'?tema='.$tema_id.'&amp;tvocab_id='.$arrayVocab[tvocab_id].'&amp;tgetTerm_id='.$v[term_id].'&amp;taskrelations=addTgetTerm">'.FixEncoding($v[string]).'</a>';
						$rows.='</li>';
			
						} else {

							//controlar que sea la ultima
							if(count($value)==$i){
								$rows.='<li>';
								$rows.='<a title="" href="'.$PHP_SELF.'?tema='.$tema_id.'&amp;tvocab_id='.$arrayVocab[tvocab_id].'&amp;tgetTerm_id='.$value[term_id].'&amp;taskrelations=addTgetTerm">'.FixEncoding($value[string]).'</a>';
								$rows.='</li>';
								}
						}
				}
		}		
	$rows.='</'.$tag_type.'>';
	}

/*
if($cantResult==0)
{
	$rows.=HTMLdidYouMean($arrayVocab,$string_search,$tema_id);
}
*/
return $rows;
}




function HTMLformAltaEquivalenciaTermino($ARRAYTermino){

$LabelEE=id_EQ.'#'.LABEL_termino_equivalente;
$LabelIE=id_EQ_PARCIAL.'#'.LABEL_termino_parcial_equivalente;
$LabelNE=id_EQ_NO.'#'.LABEL_termino_no_equivalente;

$sql=SQLdatosVocabulario();

$rows='<div id="bodyText">';
$rows.='<a class="topOfPage" href="javascript: history.go(-1);">'.LABEL_Anterior.'</a>';
$rows.='<h1>'.LABEL_EditorTermino.'</h1>';
$rows.='  <fieldset>';
$rows.='    <legend>'.LABEL_relacion_vocabulario.' <a href="index.php?tema='.$ARRAYTermino[idTema].'">'.$ARRAYTermino[titTema].'</a></legend>';

if($sql[cant]=='1'){
	//No hay vocabularios de referencia, solo vocabulario principal
	$rows.='<p class="error">'.ucfirst(LABEL_NO_vocabulario_referencia).'</p>';
	} else {
	//Hay vobularios de referencia
	$array_vocabularios=array();
	while($array=mysqli_fetch_array($sql[datos])){
		if($array[vocabulario_id]!=='1'){
			//vocabularios que no sean el vocabulario principal
			array_push($array_vocabularios,$array[vocabulario_id].'#'.$array[titulo]);
			}
		};

	$rows.='<form class="formdiv" name="alta_t" action="index.php" method="post" onsubmit="return checkrequired(this)">';
	$rows.=LABEL_Termino.':<br/>';
	$rows.='<textarea rows="2" cols="50" name="'.FORM_LABEL_termino.'" id="'.FORM_LABEL_termino.'"></textarea>';
	$rows.='<label for="ref_vocabulario_id" accesskey="t">';
	$rows.=FORM_LABEL_nombre_vocabulario.'*</label>';
	$rows.='<select id="ref_vocabulario_id" name="ref_vocabulario_id">';
	$rows.='<optgroup label="'.FORM_LABEL_nombre_vocabulario.'">';
	$rows.=doSelectForm($array_vocabularios,"");
	$rows.='</optgroup>';
	$rows.='</select><br/>';
	$rows.='<label for="tipo_equivalencia" accesskey="e">';
	$rows.=FORM_LABEL_tipo_equivalencia.'*</label>';
	$rows.='<select id="tipo_equivalencia" name="tipo_equivalencia">';
	$rows.='<optgroup label="'.FORM_LABEL_tipo_equivalencia.'">';
	$rows.=doSelectForm(array("$LabelEE","$LabelIE","$LabelNE"),"");
	$rows.='</optgroup>';
	$rows.='</select><br/>';
	$rows.='<div class="submit_form" align="center">';	
	$rows.='<input type="submit"  name="boton" value="'.LABEL_Enviar.'"/>';
	$rows.=' | <input type="button"  name="cancelar" type="button" onClick="location.href=\'index.php?tema='.$ARRAYTermino[idTema].'\'" value="'.ucfirst(LABEL_Cancelar).'"/>';
	$rows.='<INPUT TYPE="HIDDEN"  name="id_termino_eq" value="'.$ARRAYTermino[idTema].'" />';
	$rows.='</div>';
	$rows.='</form>';
	}
$rows.='  </fieldset>';
$rows.='</div>';

return $rows;
}

#######################################################################
?>
