/**
 * Funciones generales del sistema
 */

if(typeof(weezer) == 'undefined'){
	weezer = {};
}

if(typeof(bluecare) == 'undefined'){
	bluecare = {};
}


weezer.combos = {}

/**
 * Metodo para selects dependientes
 * id  | es el id para los filtros del select
 * url | cadena concatenada por espacios que contiene Modulo controlador accion
 * select_destino | el select dependiente a modificar
 */
weezer.combos.select = function(id,url,select_destino){
	
	var url_mod_con_accion = url.split(' ');
	
	 $.ajax(
		        {
		            async: true,
		            type: 'GET',
		            url: bluecare.base_url + '/' + url_mod_con_accion[0] + '/' + url_mod_con_accion[1] + '/' + url_mod_con_accion[2],
		            data: "id="+id,
		            dataType: 'json',
		           
		            beforeSend: function(data){
		            	 $("#"+select_destino).html("<select class='span2'><option>Cargando...</option></select>");
		            },
		            success: function(data){
		            	if (data == null){
		            		$("#"+select_destino).html("<select class='span2' name='" + select_destino + "' id='" + select_destino + "'>" +
	    				"						<option value=''>Sin opciones</option></select>");
		            	}else{
		            		$("#"+select_destino).html(data);
		            	}
		            },
		            error: function(requestData, strError, strTipoError){
		               
		            }
		        });
}


weezer.deleteaction = function(url){
	labelAccion = 'Eliminar';
	var delete_dialog = "&iquest;Esta seguro de "+labelAccion+" este registro?";
	
	bootbox.dialog(delete_dialog, [{
        "label" : "Salir",
    }, {
        "label" : labelAccion,
        "class" : "btn-danger",
        "callback": function() {
        	$(location).attr('href',url);
        }
    }]);
}


weezer.popupimage = function(path_image){
         bootbox.modal('<img class="size_img_gallery" src="'+path_image+'" alt=""/>');
}

bluecare.completefieldspaciente = function(id_paciente){
	//console.log(id_paciente);
	
	var fields_disabled = {
			reg_nombre: '#reg_nombre',
			reg_apellidoP: '#reg_apellidoP',
			reg_apellidoM: '#reg_apellidoM'	
	};
	
	$.ajax(
	        {
	            async: true,
	            type: 'GET',
	            url: bluecare.base_url + '/listaEspera/index/ajax',
	            data: "id="+id_paciente,
	            dataType: 'json',
	           
	            beforeSend: function(data){
	            	 //$("#reg_nexpediente").html("<select class='input-medium'><option>Cargando...</option></select>");
	            },
	            success: function(data){
	            	if (data == null){
	            		$('#reg_nombre').attr("value",'');
						$('#reg_apellidoP').attr("value",'');
						$('#reg_apellidoM').attr("value",'');
	            		for (var input in fields_disabled){	
		            		 $(fields_disabled[input]).removeAttr("disabled");
		            	}
	            	}else{
	            		//console.log(data.pac_apellidoM);
	            		
	            		$('#reg_nombre').attr("value",data.pac_nombre);
						$('#reg_apellidoP').attr("value",data.pac_apellidoP);
						$('#reg_apellidoM').attr("value",data.pac_apellidoM);
	            		for (var input in fields_disabled){	
	            		   $(fields_disabled[input]).attr("disabled","disabled");
	            		   $('#reg_nombre').attr("value",data.input);
	            		}
	            	}
	            },
	            error: function(requestData, strError, strTipoError){
	               
	            }
	        });
}

bluecare.setSessionPacient = function(id,url_next){
	$.ajax(
	        {
	            async: true,
	            type: 'GET',
	            url: bluecare.base_url + '/historialClinico/index/ajax',
	            data: "id="+id,
	            dataType: 'json',
	           
	            beforeSend: function(data){
	            	
	            },
	            success: function(data){
	            	if(data){
	            		location.href = bluecare.base_url + url_next
	            	}
	            },
	            error: function(requestData, strError, strTipoError){
	               
	            }
	        });
}

