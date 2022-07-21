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
	<title>CRUD</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1 class="text-center">
					Usuarios
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
	</div>
	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!--toastr-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
					if (data.responce == "success"){
					
						toastr["success"](data.message);
					}else{
						toastr["error"](data.message);

					}
					}



				});


				$("#form")[0].reset();
			}

		});
	</script>


</body>

</html>