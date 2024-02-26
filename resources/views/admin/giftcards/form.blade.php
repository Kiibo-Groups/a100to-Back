<div class="col-lg-7 mx-auto">           
    <div class="card"> 
		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="img">Imagen Descriptiva</label>
					<input type="file" name="img" id="img" class="form-control" @if(!$data->id) required="required" @endif>
				</div>

				<div class="form-group col-md-6">
					<label for="name">Nombre de la tarjeta</label>
					<input type="text" name="name" id="name" class="form-control" required value="{{ $data->name }}"> 
				</div>
			</div>

			<div class="form-row"> 
				<div class="form-group col-md-6">
					<label for="inputEmail6">Status</label>
					<select name="status" class="form-select">
						<option value="0" @if($data->status == 0) selected @endif>Active</option>
						<option value="1" @if($data->status == 1) selected @endif>Disbaled</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="trending">Trending</label>
					<select name="trending" class="form-select" id="trending">
						<option value="0" @if($data->trending == 0) selected @endif>Activo</option>
						<option value="1" @if($data->trending == 1) selected @endif>Inactivo</option>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="descript">Descripción</label>
					<textarea type="text" name="descript" id="descript" class="form-control" required>
						{{ $data->descript }}
					</textarea> 
				</div> 
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="form-row mb-3" id="wrap_code_list">
				<div class="form-group">
					<label for="descript">Códigos de regalo</label>
				</div> 

				<div class="form-row list_awards_code" style="width: 100%;">
					<div class="form-group col-md-5">
						<label for="statu">Status</label>
						<select name="statu[]" class="form-select">
							<option value="0" @if(isset($data->codigos) && $data->codigos[0]['statu'] == 0) selected @endif>Active</option>
							<option value="1" @if(isset($data->codigos) &&  $data->codigos[0]['statu'] == 1) selected @endif>Disbaled</option>
						</select>
					</div>

					<div class="form-group col-md-5">
						<label for="stock">Código</label>
						<input type="text" name="codigo[]" id="codigo" class="form-control" @if($data->codigos) value="{{$data->codigos[0]['codigo']}}" @endif required placeholder="Ingrese el código"> 
					
					</div>

					<div class="form-group col-md-2">
						<label for="inputEmail6">Agregar/Eliminar</label><br />
						<a href="#" id="add_award_code" onclick="addCode()" class="btn btn-success waves-effect waves-light btn-md">
							<i class="mdi mdi-message-plus"></i>
						</a>
						<a href="#" id="del_award_code" onclick="delCode()" class="btn btn-danger waves-effect waves-light btn-md">
							<i class="mdi mdi-trash-can"></i>
						</a>
					</div>
				</div>
				@if($data->id)
				<?php $i =1; ?>
				@for ($i = 1; $i < count($data->codigos); $i++) 
				<div class="form-row list_awards_code" id="award_code_el_{{$i}}" style="width: 100%;">
					<div class="form-group col-md-5">
						<label for="codigo">Código</label>

						<select name="statu[]" id="status" class="form-control" required>
							<option value="0" {{ $data->codigos[$i]['statu'] == 0 ? 'selected' : '' }}>Active</option>
							<option value="1" {{ $data->codigos[$i]['statu'] == 1 ? 'selected' : '' }}>Disbaled</option>
						</select>
					</div>

					<div class="form-group col-md-5">
						<label for="stock">Código</label>
						<input type="text" name="codigo[]" id="codigo" class="form-control" value="{{$data->codigos[$i]['codigo']}}" required placeholder="Ingrese el código"> 
					</div>

					<div class="form-group col-md-2">
						<label for="inputEmail6">Eliminar</label><br />
						<a href="#" id="del_award_code" onclick="delElement('award_code_el_{{$i}}')" class="btn btn-danger waves-effect waves-light btn-md">
							<i class="mdi mdi-trash-can"></i>
						</a>
					</div>
				</div>
				@endfor
				@endif
			</div> 
			
		</div>
	</div>
</div>

<div class="col-lg-5">           
    <div class="card">
		<div class="card-body">
			<div class="form-row mb-3" id="wrap_list">
				<div class="form-group">
					<label for="descript">Recompensas</label>
				</div> 

				<div class="form-row list_awards" style="width: 100%;">
					<div class="form-group col-md-5">
						<label for="amount">Monto</label>
						<input type="text" name="amount[]" id="amount" class="form-control" @if($data->recompensas) value="{{$data->recompensas[0]['amount']}}" @endif required placeholder="Ingresa el monto de la recompensa $100,$200, etc.">
					</div>

					<div class="form-group col-md-5">
						<label for="stock">Stock</label>
						<input type="text" name="stock[]" id="stock" class="form-control" @if($data->recompensas) value="{{$data->recompensas[0]['stock']}}" @endif required placeholder="Ingresa la cantidad en stock"> 
					</div>

					<div class="form-group col-md-2">
						<label for="inputEmail6">Agregar/Eliminar</label><br />
						<a href="#" id="add_award" onclick="addElement()" class="btn btn-success waves-effect waves-light btn-md">
							<i class="mdi mdi-message-plus"></i>
						</a>
						<a href="#" id="del_award" onclick="delElement()" class="btn btn-danger waves-effect waves-light btn-md">
							<i class="mdi mdi-trash-can"></i>
						</a>
					</div>
				</div>
				@if($data->id)
				<?php $i =1; ?>
				@for ($i = 1; $i < count($data->recompensas); $i++) 
				<div class="form-row list_awards" id="award_el_{{$i}}" style="width: 100%;">
					<div class="form-group col-md-5">
						<label for="amount">Monto</label>
						<input type="text" name="amount[]" id="amount" class="form-control" value="{{ $data->recompensas[$i]['amount'] }}" required placeholder="Ingresa el monto de la recompensa $100,$200, etc.">
					</div>

					<div class="form-group col-md-5">
						<label for="stock">Stock</label>
						<input type="text" name="stock[]" id="stock" class="form-control" value="{{ $data->recompensas[$i]['stock'] }}" required placeholder="Ingresa la cantidad en stock"> 
					</div>

					<div class="form-group col-md-2">
						<label for="inputEmail6">Eliminar</label><br />
						<a href="#" id="del_award" onclick="delElement('award_el_{{$i}}')" class="btn btn-danger waves-effect waves-light btn-md">
							<i class="mdi mdi-trash-can"></i>
						</a>
					</div>
				</div>
				@endfor
				@endif
			</div> 

			<div class="form-row mb-3" style="text-align: right;float: right;">
				<button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar Cambios</button>
			</div>
		</div>
	</div>
</div>

@section('js')
<script>
	let container = document.getElementById('wrap_list');
	let tot_list = document.getElementsByClassName('list_awards');
	let postItems = tot_list.length;

	let code_container = document.getElementById('wrap_code_list');
	let code_list = document.getElementsByClassName('list_awards_code');
	let codeItems = code_list.length;

	function addElement() 
	{
		postItems++;
		let theme    = '<div class="form-row list_awards" id="award_el_'+postItems+'" style="width: 100%;">'
			+'<div class="form-group col-md-5">'
					+'<label for="amount">Monto</label>'
					+'<input type="text" name="amount[]" id="amount" class="form-control" required placeholder="Ingresa el monto de la recompensa $100,$200, etc.">'
				+'</div>'
				+'<div class="form-group col-md-5">'
					+'<label for="stock">Stock</label>'
					+'<input type="text" name="stock[]" id="stock" class="form-control" required placeholder="Ingresa la cantidad en stock"> '
				+'</div>'
				+'<div class="form-group col-md-2">'
					+'<label for="inputEmail6">Eliminar</label><br />'
					+'<a href="#" id="del_award" onclick="delElement(`award_el_'+postItems+'`)" class="btn btn-danger waves-effect waves-light btn-md">'
						+'<i class="mdi mdi-trash-can"></i>'
					+'</a>'
			+'</div>'
		+'</div>';
		
		container.insertAdjacentHTML("beforeend",theme);
	}

	function delElement(el)
	{
		let element = document.getElementById(el);
		element.remove();
		postItems--;
	}

	function addCode() 
	{
		codeItems++;
		let themeCode    = '<div class="form-row list_awards_code" id="award_code_el_'+codeItems+'" style="width: 100%;">'
			+'<div class="form-group col-md-5">'
					+'<label for="statu">Status</label>'
					+'<select name="statu[]"class="form-control" required>'
					+'<option value="0">Active</option>'
        			+'<option value="1">Disbaled</option>'
					+'</select>'
				+'</div>'
				+'<div class="form-group col-md-5">'
					+'<label for="codigo">Codigo</label>'
					+'<input type="text" name="codigo[]" id="stock" class="form-control" required placeholder="Ingresa el código"> '
				+'</div>'
				+'<div class="form-group col-md-2">'
					+'<label for="inputEmail6">Eliminar</label><br />'
					+'<a href="#" id="del_award_code" onclick="delElement(`award_code_el_'+codeItems+'`)" class="btn btn-danger waves-effect waves-light btn-md">'
						+'<i class="mdi mdi-trash-can"></i>'
					+'</a>'
			+'</div>'
		+'</div>';
		
		code_container.insertAdjacentHTML("beforeend",themeCode);
	}

	function delCode(el)
	{
		let element = document.getElementById(el);
		element.remove();
		codeItems--;
	}
</script>
@endsection