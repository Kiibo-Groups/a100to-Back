<div class="tab-content" id="myTabContent1">
	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<div class="card py-3 m-b-30">
			<div class="col-md-6" style="text-align: left;">
				<b style="margin-left:20px">@yield('title')</b>
			</div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputEmail6">Nombre</label>
						{!! Form::text('nombre',null,['id' => 'code','class' => 'form-control','required' => 'required'])!!}
					</div>
					<div class="form-group col-md-8">
						<label for="inputEmail6">Descripción</label>
						{!! Form::text('descripcion',null,['id' => 'code','class' => 'form-control'])!!}
					</div>
				</div>

			

			
				
			
			</div>
		</div>
	</div>
</div>

<div class="form-row m-b-30">
    <button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar Cambios</button>
</div>

