<div class="tab-content" id="myTabContent1">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-row">
            <input type="hidden" name="store_id" value="{{ $user }}" />
            <div class="form-group col-md-4">
                <label for="cashback">Valor de CashBack en (%)</label>
                {!! Form::number('per', null, [
                    'id' => 'cashback',
                    'placeholder' => 'cashback',
                    'class' => 'form-control',
                    'required' => 'required',
                    'min' => 1
                ]) !!}
            </div>

            <div class="form-group col-md-4">
                <label for="hora">Dia</label>
                {!! Form::select('day_id', $days->pluck('name', 'id'), null, ['id' => 'id', 'class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group col-md-4">
                <label for="hora">Hora</label>
                {!! Form::select('hora_id', $hours->pluck('name', 'id'), null, ['id' => 'id', 'class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar</button>
