<div class="tab-content" id="myTabContent1">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card py-3 m-b-30">
            <div class="col-md-6" style="text-align: left;">
                <b style="margin-left:20px">@yield('title')</b>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail6">Negocio</label>
                        <p style="font-size: 20px">
                            @if (!$data->id_negocio)
                            @else
                                {{ $data->negocio->name }}
                            @endif
                        </p>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail6">Usuario</label>
                        <p style="font-size: 20px">


                            {{ $data->usuario->name }} </p>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail6">Fecha registro</label>
                        <p style="font-size: 20px">{{ date('d-M-Y', strtotime($data->created_at)) }} </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label class="form-label">Negocio</label>
                   
                        <select name="id_negocio" class="form-control" id="id_negocio" required="required">
                            <option value="">Selecciona un Negocio</option>
                            @foreach ($negocios as $type)
                                <option value="{{ $type->id }}" @if ($data->id_negocio == $type->id) selected @endif>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">

                        <label class="form-label">Estado</label>
                        <select name="status" id="type" class="form-select js-example-basic-single" required="required">
                            <option value="" selected>Selecciona un Estado</option>
                            <option value="1" @if ($data->status === '1') selected @endif>
                                Pendiente</option>
                            <option value="2" @if ($data->status === '2') selected @endif>
                                Aceptada</option>
                            <option value="3" @if ($data->status === '3') selected @endif>
                                Rechazada</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea name="descripcion" class="form-control" placeholder="Ingrese el resultado de la recompensa">{{ $data->descripcion }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="form-row m-b-30">
    <button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar Cambios</button>
</div>
