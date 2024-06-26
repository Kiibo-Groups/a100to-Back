<div class="tab-content" id="myTabContent1">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-row">
            <input type="hidden" name="store_id" value="{{ $user }}" />
            

            <div class="form-group col-md-6">
                <label for="hora">Dia</label>
                {!! Form::select('day_id', $days->pluck('name', 'id'), null, ['id' => 'id', 'class' => 'form-select', 'required' => 'required']) !!}
            </div>

            <div class="form-group col-md-6">
                <label for="hora">Hora</label>
                {!! Form::select('hora_id', $hours->pluck('name', 'id'), null, ['id' => 'id', 'class' => 'form-select', 'required' => 'required']) !!}
            </div>

            <div class="form-group col-md-6">
                <label for="cashback">Valor de CashBack en (%)</label>
                {!! Form::number('per', null, [
                    'id' => 'cashback',
                    'placeholder' => 'cashback',
                    'class' => 'form-control',
                    'required' => 'required',
                    'min' => 1
                ]) !!}
            </div>

            <div class="form-group col-md-6">
                <label for="estatus">Estatus</label>
                <select name="status" id="estatus" class="form-select">
                    <option value="0" @if($data->status == 0) selected @endif >Activo</option>
                    <option value="1" @if($data->status == 1) selected @endif >Inactivo</option>
                </select>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar</button>
<a href="{{ asset('cashback/deleteCash/'. $data->id) }}" class="btn btn-danger width-xl waves-effect waves-light btn-cta">Eliminar</a>
