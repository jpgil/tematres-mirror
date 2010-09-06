<?php
#   TemaTres : aplicaci�n para la gesti�n de lenguajes documentales #       #
#                                                                        #
#   Distribuido bajo Licencia GNU Public License, versi�n 2 (de junio de 1.991) Free Software Foundation
#   #
###############################################################################################################
#
define("LANG","es");

define("TR_acronimo","TR");
define("TE_acronimo","TE");
define("TG_acronimo","TG");
define("UP_acronimo","UP");

define("TR_termino","T�rmino relacionado");
define("TE_termino","T�rmino espec�fico");
define("TG_termino","T�rmino general");
define("UP_termino","Usado por");
/* v 9.5 */
define("USE_termino","USE");

define("MENU_ListaSis","Lista sistem�tica");
define("MENU_ListaAbc","Lista alfab�tica");
define("MENU_Sobre","Sobre...");
define("MENU_Inicio","Inicio");

define("MENU_MiCuenta","Mi cuenta");
define("MENU_Usuarios","Usuarios");
define("MENU_NuevoUsuario","Nuevo usuario");
define("MENU_DatosTesauro","Datos del vocabulario");

define("MENU_AgregarT","Agregar T�rmino");
define("MENU_EditT","Editar T�rmino");
define("MENU_BorrarT","eliminar T�rmino");
define("MENU_AgregarTG","subordinar a un t�rmino");
define("MENU_AgregarTE","t�rmino subordinado");
define("MENU_AgregarTR","t�rmino relacionado");
define("MENU_AgregarUP","t�rmino equivalente");



define("MENU_MisDatos","Mis datos");
define("MENU_Caducar","Caducar");
define("MENU_Habilitar","Habilitar");
define("MENU_Salir","Salir");

define("LABEL_Menu","Men�");
define("LABEL_Opciones","Opciones");
define("LABEL_Admin","Administraci�n");
define("LABEL_Agregar","Agregar");
define("LABEL_editT","Modificar t�rmino ");
define("LABEL_EditorTermino","Editor de t�rmino");
define("LABEL_Termino","T�rmino");
define("LABEL_NotaAlcance","Nota de alcance");
define("LABEL_AgregarT","Alta de t�rmino");
define("LABEL_AgregarTG","Subordinar %s a t�rmino superior");
define("LABEL_AgregarTE","Alta de un t�rmino subordinado a ");
define("LABEL_AgregarUP","Alta de un t�rmino equivalente para ");
define("LABEL_AgregarTR","Alta de t�rmino relacionado con ");
define("LABEL_EliminarTE","Eliminar t�rmino");
define("LABEL_Detalle","detalles");
define("LABEL_EditarNota","editar nota");


define("LABEL_Autor","Autor");
define("LABEL_URI","URI");
define("LABEL_Version","Generado por");
define("LABEL_Idioma","Idioma");
define("LABEL_Fecha","Fecha de creaci�n");
define("LABEL_Keywords","Palabras clave");
define("LABEL_TipoLenguaje","Tipo de lenguaje");
define("LABEL_Cobertura","Cobertura");
define("LABEL_Terminos","t�rminos");
define("LABEL_RelTerminos","relaciones entre t�rminos");
define("LABEL_TerminosUP","t�rminos equivalentes");

define("LABEL_BuscaTermino","Buscar t�rmino");
define("LABEL_Buscar","Buscar");
define("LABEL_Enviar","Enviar");
define("LABEL_Cambiar","Guardar cambios");
define("LABEL_Anterior","anterior");
define("LABEL_AdminUser","Administraci�n de usuarios");
define("LABEL_DatosUser","Datos del usuario");
define("LABEL_Acciones","Acciones realizadas");
define("LABEL_verEsquema","ver esquema");
define("LABEL_actualizar","Actualizar");
define("LABEL_terminosLibres","T�rminos libres");
define("LABEL_busqueda","B�squeda");
define("LABEL_borraRelacion","eliminar relaci�n");

define("MSG_ResultBusca","t�rmino/s encontrados para la b�squeda");
define("MSG_ResultLetra","Letra");
define("MSG_ResultCambios","Los cambios han sido realizados con &eacute;xito.");
define("MSG_noUser","<p>Usuario no registrado</p>");

define("FORM_JS_check","Por favor revise los datos de ");
define("FORM_JS_confirm","�Esta seguro de que desea eliminar el termino o la relaci�n?");
define("FORM_JS_pass","_clave");
define("FORM_JS_confirmPass","_repetir_clave");

define("FORM_LABEL_termino","_termino");
define("FORM_LABEL_buscar","_expresion_de_busqueda");
define("FORM_LABEL_buscarTermino","_termino_relacionado");

define("FORM_LABEL_nombre","_nombre");
define("FORM_LABEL_apellido","_apellido");
define("FORM_LABEL_mail","_correo_electronico");
define("FORM_LABEL_pass","_clave");
define("FORM_LABEL_repass","_confirmar_clave");
define("FORM_LABEL_orga","orga");

define("LABEL_nombre","nombre");
define("LABEL_apellido","apellido");
define("LABEL_mail","correo electr�nico");
define("LABEL_pass","clave");
define("LABEL_repass","confirmar clave");
define("LABEL_orga","organizaci�n");

define("LABEL_lcConfig","configuraci�n");
define("LABEL_lcDatos","datos del vocabulario");

define("LABEL_Titulo","T�tulo");

define("FORM_LABEL_Titulo","_titulo");
define("FORM_LABEL_Autor","_autor");
define("FORM_LABEL_URI","_URI");
define("FORM_LABEL_Idioma","Idioma");
define("FORM_LABEL_FechaDia","dia");
define("FORM_LABEL_FechaMes","mes");
define("FORM_LABEL_FechaAno","ano");
define("FORM_LABEL_Keywords","keywords");
define("FORM_LABEL_TipoLenguaje","language_type");
define("FORM_LABEL_Cobertura","scope");
define("FORM_LABEL_Terminos","terms");
define("FORM_LABEL_RelTerminos","relaciones entre t�rminos");
define("FORM_LABEL_TerminosUP","t�rminos equivalentes");
define("FORM_LABEL_Guardar","Guardar");

define("LABEL_verDetalle","ver detalles de ");
define("LABEL_verTerminosLetra","ver t�rminos iniciados con ");

define("LABEL_NB","Nota bibliogr�fica");
define("LABEL_NH","Nota hist�rica");
define("LABEL_NA","Nota de alcance"); /* version 0.9.1 */
define("LABEL_NP","Nota privada");    /* version 0.9.1 */

define("LABEL_EditorNota","Editor de notas");
define("LABEL_EditorNotaTermino","Notas del t�rmino ");
define("LABEL_tipoNota","tipo de nota");
define("FORM_LABEL_tipoNota","tipo_nota");
define("LABEL_nota","nota");
define("FORM_LABEL_nota","_nota");
define("LABEL_EliminarNota","Eliminar nota");

define("LABEL_OptimizarTablas","Optimizar tablas");
define("LABEL_TotalZthesLine","exportar en Zthes");

/* v 9.2 */
define("LABEL_negrita","negrita");
define("LABEL_italica","it�lica");
define("LABEL_subrayado","subrayado");
define("LABEL_textarea","espacio para notas");
define("MSGL_relacionIlegal","Relaci�n no permitida entre t�rminos");

/* v 9.3 */
define("LABEL_fecha_modificacion","modificaci�n");
define("LABEL_TotalUsuarios","total de usuarios");
define("LABEL_TotalTerminos","total de t�rminos");
define("LABEL_ordenar","ordenar por");
define("LABEL_auditoria","auditor�a de t�rminos");
define("LABEL_dia","d�a");
define("LABEL_mes","mes");
define("LABEL_ano","a�o");
define("LABEL_terminosRepetidos","t�rminos repetidos");
define("MSG_noTerminosLibres","no existen t�rminos libres");
define("MSG_noTerminosRepetidos","no existen t�rminos repetidos");
define("LABEL_TotalSkosLine","exportar en Skos-Core");

$MONTHS=array("01"=>Ene,
              "02"=>Feb,
              "03"=>Mar,
              "04"=>Abr,
              "05"=>May,
              "06"=>Jun,
              "07"=>Jul,
              "08"=>Ago,
              "09"=>Sep,
              "10"=>Oct,
              "11"=>Nov,
              "12"=>Dic
              );

/* v 9.4 */
define("LABEL_SI","SI");
define("LABEL_NO","NO");
define("FORM_LABEL_jeraquico","polijerarquia");
define("LABEL_jeraquico","Polijerarqu�a");
define("LABEL_terminoLibre","t�rmino libre");

/* v 9.5 */
define("LABEL_URL_busqueda","Buscar %s en: ");


/* v 9.6 */
define("LABEL_relacion_vocabulario","relaci�n con otro vocabulario");
define("FORM_LABEL_relacion_vocabulario","equivalencia");
define("FORM_LABEL_nombre_vocabulario","vocabulario de referencia");
define("LABEL_vocabulario_referencia","vocabulario de referencia");
define("LABEL_NO_vocabulario_referencia","no se encuentran vocabularios de referencia para establer relaci�n terminol�gica");
define("FORM_LABEL_tipo_equivalencia","tipo de equivalencia");
define("LABEL_vocabulario_principal","vocabulario");
define("LABEL_tipo_vocabulario","tipo");

define("LABEL_termino_equivalente","equivale");
define("LABEL_termino_parcial_equivalente","equivale parcialmente");
define("LABEL_termino_no_equivalente","no equivale");

define("EQ_acronimo","EQ");
define("EQP_acronimo","EQP");
define("NEQ_acronimo","NEQ");
define("LABEL_NC","Nota de catalogaci�n");

define("LABEL_resultados_suplementarios","resultados suplementarios");
define("LABEL_resultados_relacionados","resultados relacionados");

/* v 9.7 */
define("LABEL_export","exportar");
define("FORM_LABEL_format_export","seleccionar formato");
define("LABEL_siteMap","SiteMap");
define("LABEL_TotalTopicMap","exportar en TopicMap");


/* v 1.0 */
define("LABEL_fecha_creacion","creado");
define("NB_acronimo","NB");
define("NH_acronimo","NH");
define("NA_acronimo","NA");
define("NP_acronimo","NP");
define("NC_acronimo","NC");

define("LABEL_Candidato","t�rmino candidato");
define("LABEL_Aceptado","t�rmino aceptado");
define("LABEL_Rechazado","t�rmino rechazado");
define("LABEL_Ultimos_aceptados","aceptados recientes");
define("MSG_ERROR_ESTADO","Estado no aceptable");

define("LABEL_Candidatos","t�rminos candidatos");
define("LABEL_Aceptados","t�rminos aceptados");
define("LABEL_Rechazados","t�rminos rechazados");

define("LABEL_User_NoHabilitado","no habilitado");
define("LABEL_User_Habilitado","habilitado");

define("LABEL_CandidatearTermino","Pasar a estado candidato");
define("LABEL_AceptarTermino","Aceptar t�rmino");
define("LABEL_RechazarTermino","Rechazar t�rmino");


/* v 1.01 */
define("LABEL_TERMINO_SUGERIDO","quiz�s quiso decir:");


/* v 1.02 */
define("LABEL_esSuperUsuario","es administrador");
define("LABEL_Cancelar","cancelar");
define("LABEL_Guardar","guardar");

/* v 1.033 */
define("MENU_AgregarTEexist","Subordinar un t�rmino libre");
define("MENU_AgregarUPexist","Asociar un t�rmino no-preferido (libre)");
define("LABEL_existAgregarUP","Asociar un t�rmino no-preferido %s");
define("LABEL_existAgregarTE","Subordinar un t�rmino libre %s ");
define("MSG_minCharSerarch","La expresi�n de b�squeda <i>%s</i> tiene s�lo <strong>%s</strong> caracteres. Debe ser mayor a <strong>%s</strong> caracteres");


/* v 1.04 */
define("LABEL_terminoExistente","t�rmino existente");
define("HELP_variosTerminos","Para agregar varios t�rminos a la vez consigne <strong>un t�rmino por l�nea</strong>.");


/* v 1.05 */
$idiomas_disponibles = array(
     "ca"  => array("catal�", "", "ca"),
     "de"  => array("deutsch","", "de"),
     "en"  => array("english", "", "en"),
     "es"  => array("espa�ol", "", "es"),
     "fr"  => array("fran�ais","", "fr"),
     "it"  => array("italiano","", "it"),
     "nl"  => array("nederlands","", "nl"),
     "pt"  => array("portug��s","", "pt")    
    );

/* Install messages */

define("FORM","Form") ;
define("ERROR","Error") ;
define("LABEL_bienvenida","Bienvenido a TemaTres...") ;

// COMMON SQL
define("PARAM_SERVER","Server address") ;
define("PARAM_DBName","Database name") ;
define("PARAM_DBLogin","Database User") ;
define("PARAM_DBPass","Database Password") ;
define("PARAM_DBprefix","Prefix tables") ;


$install_message[101] = "Instalaci�n de TemaTres" ;

$install_message[201] = "No se encuentra el archivo de configuraci�n de la base de datos (/include/db.tematres.php) hay archivo." ;
$install_message[202] = "Archivo de configuraci�n de la base de datos encontrado." ;
$install_message[203] = "No es posible conectar con el servidor <em>%s</em> utilizando el usuario <em>%s</em>. Por favor revise los datos del archivo de configuraci�n de la base de datos (/include/db.tematres.php)" ;
$install_message[204] = "Conexi�n con el servidor <em>%s</em> exitosa" ;
$install_message[205] = "No es posible conectar con la base de datos <em>%s</em> en <em>%s</em>. Por favor revise los datos del archivo de configuraci�n de la base de datos (/include/db.tematres.php)." ;
$install_message[206] = "Conexi�n con la base de datos <em>%s</em> en <em>%s</em> verificada." ;

$install_message[301] = "Parece que las tablas ya han sido creadas para la configuraci�n establecida." ;
$install_message[305] = "Indiaci�n acerca del grado de seguridad de la clave." ;
$install_message[306] = 'Instalaci�n completa, <a href="index.php">comience a utilizar su vocabulario</a>' ;
/* end Install messages */
?>
