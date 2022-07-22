<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- toastr -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- DATATABLES-->

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css" />
	<title>CRUD</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1 class="text-center">
					Registro de Datos 2022
				</h1>
				<hr style="background-color: black; color: black; height: 1px;">
				</hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-2">
				<!-- AÑADIR REGISTROS 	-->
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Agregar
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Registra tus datos</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">


								<form action="" method="post" id="form">
									<div class="form-group">
										<label for="">Nombre</label>
										<input type="text" id="name" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Apellido Paterno</label>
										<input type="text" id="ap" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Apellido Materno</label>
										<input type="text" id="am" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Edad</label>
										<input type="text" id="edad" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Correo</label>
										<input type="email" id="email" class="form-control">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
								<button type="button" class="btn btn-primary" id="add">Guardar</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row">

			<div class="col-md-12 mt-4">
				<div class="table-responsive">

					<table class="table" id="records">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Edad</th>
								<th>Correo Electrónico</th>
								<th>Acción</th>
							</tr>
						</thead>

					</table>
				</div>


			</div>
		</div>


	</div>


	<!-- FORMULAIOS PARA LLENAR CAMPOS DE UPDATE -->
	<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualiza tus Datos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- formularios para edotar dstos -->
					<form action="" method="post" id="edit_form">
						<input type="hidden" id="edit_record_id" name="edit_record_id" value="">
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" id="edit_name" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Apellido Paterno</label>
							<input type="text" id="edit_ap" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Apellido Materno</label>
							<input type="text" id="edit_am" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Edad</label>
							<input type="text" id="edit_edad" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Correo</label>
							<input type="email" id="edit_email" class="form-control">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="update">Guardar Cambios</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!--toastr-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!-- FONT AWSOME-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--datatable-->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.js"></script>

	<!-- sweet alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<!-- AÑADIR DATOS -->
	<script>
		$(document).on("click", "#add", function(e) {
			e.preventDefault();

			var name = $("#name").val();
			var ap = $("#ap").val();
			var am = $("#am").val();
			var edad = $("#edad").val();
			var email = $("#email").val();

			if (name == "" || ap == "" || am == "" || edad == "" || email == "") {
				alert("Todos los datos son necesarios.")
			} else {
				$.ajax({
					url: "<?php echo base_url(); ?>insert",
					type: "post",
					dataType: "json",
					data: {
						name: name,
						ap: ap,
						am: am,
						edad: edad,
						email: email,

					},
					success: function(data) {
						if (data.responce == "success") {
							$('#records').DataTable().destroy();
							fetch();

							toastr["success"](data.message);
						} else {
							toastr["error"](data.message);

						}
					}



				});


				$("#form")[0].reset();
			}

		});

		//obtener registris en tabala cons funcio fetch//

		function fetch() {
			$.ajax({
				url: "<?php echo base_url(); ?>fetch",
				type: "post",
				dataType: "json",
				success: function(data) {
					var i = "1";
					$('#records').DataTable({
						"data": data.posts,
						dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
							"<'row'<'col-sm-12'tr>>" +
							"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

						buttons: [
							'copy', 'excel', 'pdf'
						],
						"columns": [{
								"render": function() {
									return a = i++;
								}
							},

							{
								"data": "name"
							},
							{
								"data": "ap"
							},
							{
								"data": "am"
							},
							{
								"data": "edad"
							},
							{
								"data": "email"
							},
							{
								"render": function(data, type, row, meta) {
									var a = `
	                                          <a href="#" value="${row.id}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a> 
	                                          <a href="#" value="${row.id}" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a> 
	 
	 
	                                         `;

									return a;

								}
							}
						]
					});

				}

			});
		}

		fetch();


		// funcion eliminar registro//

		$(document).on("click", "#del", function(e) {
			e.preventDefault();

			var del_id = $(this).attr("value");

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-success ',
					cancelButton: 'btn btn-danger mr-2'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: '¿Estás seguro de eliminar el Registro?',
				text: "¡No se podrá recuperar después!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Si, ¡Eliminar!',
				cancelButtonText: 'No, ¡Cancelar!',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {


					$.ajax({
						url: "<?php echo base_url(); ?>delete",
						type: "post",
						dataType: "json",
						data: {
							del_id: del_id

						},
						success: function(data) {
							if (data.responce == "success") {
								$('#records').DataTable().destroy();
								fetch();
								swalWithBootstrapButtons.fire(
									'¡Eliminado',
									'con éxito!',
									'success'
								);
							} else {
								swalWithBootstrapButtons.fire(
									'Cancelled',
									'Your imaginary file is safe :)',
									'error'
								)

							}


						}
					});


				} else if (
					/* Read more about handling dismissals below */
					result.dismiss === Swal.DismissReason.cancel
				) {

				}
			})










		});


		// funcion editar registro//

		$(document).on("click", "#edit", function(e) {
			e.preventDefault();

			var edit_id = $(this).attr("value");
			$.ajax({
				url: "<?php echo base_url(); ?>edit",
				type: "post",
				dataType: "json",
				data: {
					edit_id: edit_id

				},
				success: function(data) {
					$('#edit_modal').modal('show');
					$("#edit_record_id").val(data.post.id)
					$("#edit_name").val(data.post.name)
					$("#edit_ap").val(data.post.ap)
					$("#edit_am").val(data.post.am)
					$("#edit_edad").val(data.post.edad)
					$("#edit_email").val(data.post.email)
					console.log(data);

				}
			});

		});

		//funcion para actualizar datos en DB//

		$(document).on("click", "#update", function(e) {
			e.preventDefault();
			var edit_record_id = $("#edit_record_id").val();
			var edit_name = $("#edit_name").val();
			var edit_ap = $("#edit_ap").val();
			var edit_am = $("#edit_am").val();
			var edit_edad = $("#edit_edad").val();
			var edit_email = $("#edit_email").val();


			if (edit_record_id == "" || edit_name == "" || edit_ap == "" || edit_am == "" || edit_edad == "" || edit_email == "") {

				alert("Se requieren llenar todos los datos");

			} else {
				$.ajax({
					url: "<?php echo base_url(); ?>update",
					type: "post",
					dataType: "json",
					data: {

						edit_record_id: edit_record_id,
						edit_name: edit_name,
						edit_ap: edit_ap,
						edit_am: edit_am,
						edit_edad: edit_edad,
						edit_email: edit_email


					},
					success: function(data) {
						
					}
				});

			}


		});
	</script>


</body>

</html>