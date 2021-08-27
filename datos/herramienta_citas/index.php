<?php
	require_once('../conexion.php');


	$sql = "SELECT id, title, correo, telefono, ficha, start, end, color, permiso FROM obj_events ";

	$req = Conexion::conectar()->prepare($sql);
	$req->execute();
	$events = $req->fetchAll(); 


	$nombre = $_GET['for'];
	$factor = $_GET['factor'];

	$query = "SELECT nombre, cargo FROM obj_registro_sena WHERE nombre = :nombre";

	$resultado = Conexion::conectar()->prepare($query);
	$resultado->bindParam(":nombre",$nombre);
	$resultado->execute();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>



</head>

<body>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Sistema de asignacion de citas</h1><br>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
        <!-- los modales toca quitarlos para la vista de usuario. -->

		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					<input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					</div>
				  </div>

				<!-- yo -->
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
					  <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo">
					</div>
				  </div>

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
					  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono">
					</div>
				  </div>

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Ficha</label>
					<div class="col-sm-10">
					  <input type="text" name="ficha" class="form-control" id="ficha" placeholder="Ficha">
					</div>
				  </div>
				<!-- end yo -->


				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Seleccionar</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000;" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>
 
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->
	
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.js'></script>
	<script src='js/fullcalendar/locale/es.js'></script>
	
	
	<script>

	$(document).ready(function() {

		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				 language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #correo').val(event.correo);
					$('#ModalEdit #telefono').val(event.telefono);
					$('#ModalEdit #ficha').val(event.ficha);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					correo: '<?php echo $event['correo']; ?>',
					telefono: '<?php echo $event['telefono']; ?>',
					ficha: '<?php echo $event['ficha']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},

			<?php endforeach; ?>



			]
		});
		
	});

</script>

            <?php 
	            if($resultado->rowCount()>0)
				{

					$filas = $resultado->fetch();
					$num = $filas['cargo'];

		            if (password_verify($num, $factor)) 
		            {
             
            ?>

		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Nombre">
					</div>
				  </div>

				 
				  <!-- yo -->
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
					  <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo">
					</div>
				  </div>

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
					  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono">
					</div>
				  </div>

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Ficha</label>
					<div class="col-sm-10">
					  <input type="text" name="ficha" class="form-control" id="ficha" placeholder="Ficha">
					</div>
				  </div>
				  <!-- end yo -->


				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
									  <option value="">Seleccionar</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000;" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end">
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<script>
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			// evitar que se guarde al moverlo
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Evento se ha guardado correctamente');
					}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});

		}
		</script>

		<?php 

				}
			} 

		?>

</body>

</html>
