<div class="tab-content" id="myTabContent1">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-row">
            <input type="hidden" name="store_id" value="{{ $user }}" />
            <div class="form-group col-md-6">
                <label for="cashback">Valor de CashBack en (%)</label>
                {!! Form::number('cashback', null, [
                    'id' => 'cashback',
                    'placeholder' => 'cashback',
                    'class' => 'form-control',
                    'required' => 'required',
                ]) !!}
            </div>

            <div class="form-group col-md-6">
                <label for="hora">Hora</label>
                {!! Form::time('hora', null, ['id' => 'hora', 'class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar</button>
