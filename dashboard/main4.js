$(document).ready(function() {
	var id, opcion;
	opcion = 4;
		
	examplecabm = $('#examplecabm').DataTable({  
		"ajax":{            
			"url": "bd/crud3.php", 
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id"},
			{"data": "clave"},
			{"data": "partida"},
			{"data": "descripcion"},
			{"data": "factura"},
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
	$('#formCABM').submit(function(e){                         
		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		clave = $.trim($('#clave').val());    
		partida = $.trim($('#partida').val());
		descripcion = $.trim($('#descripcion').val());   
		factura = $.trim($('#factura').val());                         
			$.ajax({
			  url: "bd/crud3.php",
			  type: "POST",
			  datatype:"json",    
			  data:  {id:id, clave:clave, partida:partida, descripcion:descripcion, factura:factura, opcion:opcion},    
			  success: function(data) {
				examplecabm.ajax.reload(null, false);
			   }
			});			        
		$('#modalCRUD').modal('hide');											     			
	});
			
	 
	
	//para limpiar los campos antes de dar de Alta una Persona
	$("#btnNuevo").click(function(){
		opcion = 1; //alta           
		id=null;
		$("#formCABM").trigger("reset");
		$(".modal-header").css( "background-color", "#17a2b8");
		$(".modal-header").css( "color", "white" );
		$(".modal-title").text("GENERAR NUEVO CAMB");
		$('#modalCRUD').modal('show');	    
	});
	
	//Editar        
	$(document).on("click", ".btnEditar", function(){		        
		opcion = 2;//editar
		fila = $(this).closest("tr");	        
		id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
		clave = fila.find('td:eq(1)').text();		            
		partida = fila.find('td:eq(2)').text();
		descripcion = fila.find('td:eq(3)').text();
		factura = fila.find('td:eq(4)').text();
		$("#clave").val(clave);
		$("#partida").val(partida);
		$("#descripcion").val(descripcion);
		$("#factura").val(factura);
		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("EDITAR CABM");		
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
			  url: "bd/crud3.php",
			  type: "POST",
			  datatype:"json",    
			  data:  {opcion:opcion, id:id},    
			  success: function() {
				examplecabm.row(fila.parents('tr')).remove().draw();                  
			   }
			});	
		}
	 });
	
		 
	});    