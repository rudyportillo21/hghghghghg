<?php $this->load->helper('vendedor') ?>
<body class="container">
	<button type="button" class="btn btn-outline-success" id="nueVendedor">Nuevo Vendedor</button>
	<table border="1" class="table table-dark table-hover">
		<thead>
			<tr>
				<td>N°</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Categoria</td>
				<td>Sexo</td>
				<td>Eliminar</td>
				<td>Editar</td>
			</tr>
		</thead>
		<tbody id="tabla_vendedor">
			
		</tbody>
	</table>
	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Esta seguro que quiere eliminar este vendedor?<br><p style="color: red; font-size: 75%;">Advertencia!!!!.. esta acción no se podra deshacer!!!</p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnBorrar">Si, Eliminar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					
				</div>
			</div>
		</div>
	</div>
	<div class="modal" tabindex="-1" role="dialog" id="modalVendedor">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formVendedor" action="" method="POST">
						<input type="hidden" name="id_vendedor" id="id">
						<div>
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del vendedor" maxlength="30">
							<div id="nombreV" style="font-size: 75%; font-family: Lucida Calligraphy;color: red;"></div>
						</div>
						<div>
							<label>Apellido</label>
							<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese el apellido del vendedor" maxlength="30">
						</div>
						<div>
							<label>Categoria</label>
							<select id="categoria" name="categoria" class="form-control">
								
							</select>
						</div>
						<div>
							<label>Sexo</label>
							<select id="sexo" name="sexo" class="form-control">
								
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					
				</div>
			</div>
		</div>
	</div>
