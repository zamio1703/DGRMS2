$(document).ready(function() {
	var id, opcion;
	opcion = 4;
		
	examplevales = $('#examplevales').DataTable({  
		"ajax":{            
			"url": "bd/crud2.php", 
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id"},
			{"data": "fecha"},
			{"data": "personal"},
			{"data": "curp"},
			{"data": "departamento"},
			{"data": "puesto"},
			{"data": "descripcion"},
			{"data": "serie"},
			{"data": "inventario"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button>"} /* <button class='btn btn-success btn-sm btnImprimir'><i class='material-icons'>print</i></button></div></div> */
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
	$('#formVales').submit(function(e){                         
		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		fecha = $.trim($('#fecha').val());    
		personal = $.trim($('#personal').val());
		curp = $.trim($('#curp').val());    
		departamento = $.trim($('#departamento').val()); 
		puesto = $.trim($('#puesto').val());
		descripcion = $.trim($('#descripcion').val());   
		serie = $.trim($('#serie').val());
		inventario = $.trim($('#inventario').val());                          
			$.ajax({
			  url: "bd/crud2.php",
			  type: "POST",
			  datatype:"json",    
			  data:  {id:id, fecha:fecha, personal:personal, curp:curp, departamento:departamento, puesto:puesto, descripcion:descripcion, serie:serie, inventario:inventario, opcion:opcion},    
			  success: function(data) {
				examplevales.ajax.reload(null, false);
			   }
			});			        
		$('#modalCRUD').modal('hide');											     			
	});
			
	 
	
	//para limpiar los campos antes de dar de Alta una Persona
	$("#btnNuevo").click(function(){
		opcion = 1; //alta           
		id=null;
		$("#formVales").trigger("reset");
		$(".modal-header").css( "background-color", "#17a2b8");
		$(".modal-header").css( "color", "white" );
		$(".modal-title").text("GENERAR VALE DE RESGUARDO");
		$('#modalCRUD').modal('show');	    
	});
	
	//Editar        
	$(document).on("click", ".btnEditar", function(){		        
		opcion = 2;//editar
		fila = $(this).closest("tr");	        
		id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
		fecha = fila.find('td:eq(1)').text();
		/* fecha = Date.now(fila.find('td:eq(1)').text()); */		            
		personal = fila.find('td:eq(2)').text();
		curp = fila.find('td:eq(3)').text();
		departamento = fila.find('td:eq(4)').text();
		puesto = fila.find('td:eq(5)').text();
		descripcion = fila.find('td:eq(6)').text();
		serie = fila.find('td:eq(7)').text();
		inventario = fila.find('td:eq(8)').text();
		$("#fecha").val(fecha);
		$("#personal").val(personal);
		$("#curp").val(curp);
		$("#departamento").val(departamento);
		$("#puesto").val(puesto);
		$("#descripcion").val(descripcion);
		$("#serie").val(serie);
		$("#inventario").val(inventario);
		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("EDITAR VALE DE RESGUARDO");		
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
			  url: "bd/crud2.php",
			  type: "POST",
			  datatype:"json",    
			  data:  {opcion:opcion, id:id},    
			  success: function() {
				examplevales.row(fila.parents('tr')).remove().draw();                  
			   }
			});	
		}
	 });

	 //Imprimir
	 
    
	
		 
	});    