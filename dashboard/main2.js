$(document).ready(function() {
	var id, opcion;
	opcion = 4;
		
	exampleinfo = $('#exampleinfo').DataTable({  
		"ajax":{            
			"url": "bd/crud.php", 
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id"},
			{"data": "nombre"},
			{"data": "color"},
			{"data": "marca"},
			{"data": "modelo"},
			{"data": "serie"},
			{"data": "inventario"},
			{"data": "obs"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		],
		language: {
			"lengthMenu": "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar:",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast":"Último",
				"sNext":"Siguiente",
				"sPrevious": "Anterior"
			 },
			 "sProcessing":"Procesando...",
		},
	//para usar los botones   
	responsive: "true",
	dom: 'Bfrtilp',       
	buttons:[ 
		{
			extend:    'excelHtml5',
			text:      '<i class="fas fa-file-excel"> Excel</i> ',
			titleAttr: 'Exportar a Excel',
			className: 'btn btn-success'
		},
		{
			extend:    'pdfHtml5',
			text:      '<i class="fas fa-file-pdf"> PDF </i> ',
			titleAttr: 'Exportar a PDF',
			className: 'btn btn-danger'
		},
		{
			extend:    'print',
			text:      '<i class="fa fa-print"> Imprimir</i> ',
			titleAttr: 'Imprimir',
			className: 'btn btn-info'
		},
	]	        
});     

	  
	
	var fila; //captura la fila, para editar o eliminar
	//submit para el Alta y Actualización
	$('#formInfo').submit(function(e){                         
		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		nombre = $.trim($('#nombre').val());    
		color = $.trim($('#color').val());
		marca = $.trim($('#marca').val());    
		modelo = $.trim($('#modelo').val());    
		serie = $.trim($('#serie').val());
		inventario = $.trim($('#inventario').val());
		obs = $.trim($('#obs').val());                            
			$.ajax({
			  url: "bd/crud.php",
			  type: "POST",
			  datatype:"json",    
			  data:  {id:id, nombre:nombre, color:color, marca:marca, modelo:modelo, serie:serie, inventario:inventario ,obs:obs ,opcion:opcion},    
			  success: function(data) {
				exampleinfo.ajax.reload(null, false);
			   }
			});			        
		$('#modalCRUD').modal('hide');											     			
	});
			
	 
	
	//para limpiar los campos antes de dar de Alta una Persona
	$("#btnNuevo").click(function(){
		opcion = 1; //alta           
		id=null;
		$("#formInfo").trigger("reset");
		$(".modal-header").css( "background-color", "#17a2b8");
		$(".modal-header").css( "color", "white" );
		$(".modal-title").text("ALTA BIEN MUEBLE INFORMÁTICO");
		$('#modalCRUD').modal('show');	    
	});
	
	//Editar        
	$(document).on("click", ".btnEditar", function(){		        
		opcion = 2;//editar
		fila = $(this).closest("tr");	        
		id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
		nombre = fila.find('td:eq(1)').text();
		color = fila.find('td:eq(2)').text();
		marca = fila.find('td:eq(3)').text();
		modelo = fila.find('td:eq(4)').text();
		serie = fila.find('td:eq(5)').text();
		inventario = fila.find('td:eq(6)').text();
		obs = fila.find('td:eq(7)').text();
		$("#nombre").val(nombre);
		$("#color").val(color);
		$("#marca").val(marca);
		$("#modelo").val(modelo);
		$("#serie").val(serie);
		$("#inventario").val(inventario);
		$("#obs").val(obs);
		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("EDITAR BIEN MUEBLE INFORMÁTICO");		
		$('#modalCRUD').modal('show');		   
	});
	
	//Borrar
	$(document).on("click", ".btnBorrar", function(){
		fila = $(this);           
		id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
		opcion = 3; //eliminar        
		var respuesta = confirm("¿Está seguro de borrar el registro "+id +"?");                
		if (respuesta) {            
			$.ajax({
			  url: "bd/crud.php",
			  type: "POST",
			  datatype:"json",    
			  data:  {opcion:opcion, id:id},    
			  success: function() {
				exampleinfo.row(fila.parents('tr')).remove().draw();                  
			   }
			});	
		}
	 });
		 
	});    