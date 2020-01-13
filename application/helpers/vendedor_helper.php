<script type="text/javascript">
	$(document).ready(function(){
		mostrarVendedor();

		function mostrarVendedor(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('vendedorC/get_vendedor') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla ='';
					var i;
					var n=1;

					for (i = 0; i <datos.length; i++) {
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre+'</td>'+
						'<td>'+datos[i].apellido+'</td>'+
						'<td>'+datos[i].categoria+'</td>'+
						'<td>'+datos[i].sexo+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger borrar" data="'+datos[i].id_vendedor+'">ELIMINAR</a>'+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-primary editar" data="'+datos[i].id_vendedor+'">EDITAR</a>'+'</td>'+
						'</tr>';
						n++;	
					}
					$('#tabla_vendedor').html(tabla);
				}
			});
		};//fin de mostrar

		$('#tabla_vendedor').on('click','.borrar',function(){
			$id = $(this).attr('data');
			
			$('#modalBorrar').modal('show');
			$('#modalBorrar').find('.modal-title').text('Eliminar vendedor');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('vendedorC/eliminar') ?>',
					data:{id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado exitosamente','success',10,null);
							mostrarVendedor();
						}else{
							alertify.notify('Error al eliminar','error',10,null);
						}
					},
					error: function(){
						alertify.notify('Error al eliminar, registro dependiente!!!','error',10,null);	mostrarVendedor();
					}
				});
			});
		});

		$('#nueVendedor').click(function(){
			$('#modalVendedor').modal('show');
			$('#modalVendedor').find('.modal-title').text('Ingresar vendedor');
			$('#formVendedor').attr('action','<?= base_url('vendedorC/ingresar') ?>');
		});

		get_categoria();

		function get_categoria(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('vendedorC/get_categoria') ?>',
				dataType: 'json',

				success: function(datos){
					var op='';
					var i;

					op+="<option value=''>Seleccione un categoria</option>";

					for (i = 0; i <datos.length; i++) {
						op+="<option value='"+datos[i].id_categoria+"'>"+datos[i].categoria+"</option>";
					}

					$('#categoria').html(op);
				}
			});
		};


		get_sexo();

		function get_sexo(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('vendedorC/get_sexo') ?>',
				dataType: 'json',

				success: function(datos){
					var op='';
					var i;

					op+="<option value=''>Seleccione un sexo</option>";

					for (i = 0; i <datos.length; i++) {
						op+="<option value='"+datos[i].id_sexo+"'>"+datos[i].sexo+"</option>";
					}

					$('#sexo').html(op);
				}
			});
		};

		$('#btnGuardar').click(function(){
			$resultado = validarF();

			if($resultado==true){
				$url = $('#formVendedor').attr('action');
				$data = $('#formVendedor').serialize();

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',

					success: function(respuesta){
						$('#modalVendedor').modal('hide');

						if(respuesta=='add'){
							alertify.notify('Ingresado exitosamente','success',10,null);
							mostrarVendedor();
						}else if(respuesta=='edi'){
							alertify.notify('Actualizado exitosamente','success',10,null);
						}else{
							alertify.notify('Error al ingresar','error',10,null);
						}

						$('#formVendedor')[0].reset();
					}
				});

			}
		});//fin del metodo ingresar con ajax

		$('#tabla_vendedor').on('click','.editar',function(){
			$id = $(this).attr('data');
			
			$('#modalVendedor').modal('show');
			$('#modalVendedor').find('.modal-title').text('Actualizar vendedor');
			$('#formVendedor').attr('action','<?= base_url('vendedorC/actualizar') ?>');

			
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('vendedorC/get_datos') ?>',
				data:{id:$id},
				dataType: 'json',

				success: function(datos){
					$('#id').val(datos.id_vendedor);
					$('#nombre').val(datos.nombre);
					$('#apellido').val(datos.apellido);
					$('#categoria').val(datos.id_categoria);
					$('#sexo').val(datos.id_sexo);
				}

			});
			
		});

		function validarF(){
			$nombre = $('#nombre').val();
			$apellido = $('#apellido').val();
			$categoria = $('#categoria').val();
			$sexo = $('#sexo').val();

			if($nombre.length==0 || $nombre.length > 30){
				$('#nombre').css('borderColor','red');
				$('#nombre').attr('placeholder','Campo obligatorio');
				$('#nombre').css('boxShadow','0 0 5px red');
				$('#nombreV').text('Ingresa el nombre >:v');
				return false;
			}else{
				$('#nombre').css('borderColor','green');
				$('#nombre').css('boxShadow','0 0 5px green');
				$('#nombreV').text('');
			}

			if($apellido.length==0){
				$('#apellido').css('borderColor','red');
				$('#apellido').attr('placeholder','Campo obligatorio');
				$('#apellido').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#apellido').css('borderColor','green');
				$('#apellido').css('boxShadow','0 0 5px green');
			}

			if($categoria.length==''){
				$('#categoria').css('borderColor','red');
				$('#categoria').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#categoria').css('borderColor','green');
				$('#categoria').css('boxShadow','0 0 5px green');
			}
			if($sexo.length==''){
				$('#sexo').css('borderColor','red');
				$('#sexo').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#sexo').css('borderColor','green');
				$('#sexo').css('boxShadow','0 0 5px green');
			}


			return true;
		}
	});
</script>