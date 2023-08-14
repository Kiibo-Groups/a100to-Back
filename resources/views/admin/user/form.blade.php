<div>
    <div class="card py-3 m-b-30">
        <div class="col-md-12" style="text-align: left;">
            <b style="margin-left:20px">@yield('title')</b>
        </div>
        <div class="card-body" style="padding-top:80px;">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail6">Nombre</label>
                    {!! Form::text('name', null, ['required' => 'required', 'placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email (<i>Este será el nombre de usuario</i>)</label>
                    {!! Form::email('email', null, [
                        'required' => 'required',
                        'placeholder' => 'Email Address',
                        'class' => 'form-control',
                    ]) !!}
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail6">Telefono</label>
                    {!! Form::text('phone', null, [
                        'required' => 'required',
                        'placeholder' => 'Contact Number',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                @if (isset($admin))
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Categoria Principal</label>
                        <select name="store_type" class="form-control" id="store_type" required="required">
                            <option value="0">Selecciona una categoria</option>
                            @foreach ($cat_p as $type)
                                <option value="{{ $type->id }}" @if ($data->type == $type->id) selected @endif>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Tipo de negocio</label>
                        <select name="store_subtype" class="form-control" id="store_subtype" >

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">SubTipo de negocio</label>
                        <select name="subsubtype" class="form-control" id="subsubtype" >

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="type_menu">Tipo de menú</label>
                        <select name="type_menu" id="type_menu" class="form-control">
                            <option value="0" @if ($data->type_menu == 0) selected @endif>Cascada
                            </option>
                            <option value="1" @if ($data->type_menu == 1) selected @endif>Slider Vertical
                            </option>
                        </select>
                    </div>
                @else
                    <input type="hidden" name="type_menu" value="{{ $data->type_menu }}">
                    <input type="hidden" name="store_type" value="{{ $data->type }}">
                    <input type="hidden" name="store_subtype" value="{{ $data->subtype }}">
                    <input type="hidden" name="subsubtype" value="{{ $data->subsubtype }}">
                @endif

                <div class="form-group col-md-6">
                    <label for="reservation_available">Reservaciones</label>
                    <select name="reservation_available" id="reservation_available" class="form-control">
                        <option value="1" @if ($data->reservation_available == 1) selected @endif>Disponibles
                        </option>
                        <option value="0" @if ($data->reservation_available == 0) selected @endif>NO Disponibles
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Ciudad</label>
                    <select name="city_id" class="form-control" required="required">
                        <option value="">Selecciona tu ciudad</option>
                        @foreach ($citys as $city)
                            <option value="{{ $city->id }}" @if ($data->city_id == $city->id) selected @endif>
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="img">Imagen de perfil (recomenada 600px * 400px)</label>
                    <input type="file" name="img" id="img" class="form-control"
                        @if (!$data->id) required="required" @endif>
                </div>

                <div class="form-group col-md-6">
                    <label for="logo">Imagen de portada (recomenada 720px * 315px)</label>
                    <input type="file" name="logo" id="logo" class="form-control"
                        @if (!$data->id) required="required" @endif>
                </div>


                @if ($Update)
                    <div class="form-group col-md-6">
                        <label for="inputEmail6">Cambia la contraseña (<small>Ingrese una nueva contraseña si desea
                                cambiar la actual.</small>)</label>
                        <input type="Password" value="{{ $data->shw_password }}" name="password" class="form-control">
                    </div>
                @else
                    <div class="form-group col-md-6">
                        <label for="inputEmail6">Contraseña</label>
                        <input type="Password" name="password" class="form-control"
                            @if (!$data->id) required="required" @endif>
                    </div>
                @endif


                <div class="form-group col-md-6">
                    <label for="inputEmail6">Reward (%)</label>
                    {!! Form::text('reward', null, [
                        'placeholder' => '25 %',
                        'class' => 'form-control',
                    ]) !!}
                </div>



                <div class="form-group col-md-6">
                    <label for="inputEmail4">Status</label>
                    <select name="status" class="form-control">
                        <option value="0" @if ($data->status == 0) selected @endif>Active</option>
                        <option value="1" @if ($data->status == 1) selected @endif>Disbaled</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="numero_reserva">Cupos Máximos de reserva </label>
                    {!! Form::text('numero_reserva', null, [
                        'placeholder' => '50',
                        'class' => 'form-control',
                        'required' => 'required',
                    ]) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="numero_reserva">URL de productos</label>
                    {!! Form::url('urlproductos', null, [
                        'placeholder' => 'Url',
                        'class' => 'form-control',
                        'required' => 'required',
                    ]) !!}
                </div>


                <div class="form-group col-md-6">
                    <label for="sociales">Causas Sociales</label>
                    <select name="sociales[]" class="form-control js-select2" multiple="true">
                        
                        @foreach($social as $soc)
                        <option value="{{ $soc->id }}" @if(in_array($soc->id,$array)) selected @endif>{{ $soc->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail6">Descripción</label>
                    <textarea id="descripcion" name="descripcion"  class="form-control" rows="3" cols="50">{{ $data->descripcion }}</textarea>
                </div>


           





            </div>
        </div>
    </div>


    @if (isset($admin))
        <input type="hidden" name="admin" value="1">

        <h1 style="font-size: 20px">Establecer cargos de comisión por servicio<br />
            <small style="font-size:12px;">(dejar en 0 si no requiere cobrar comisión)</small>
        </h1>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail6">Tipo de Comision</label>
                        <select name="c_type" class="form-control">
                            <option value="0" @if ($data->c_type == 0) selected @endif>Valor fijo
                            </option>
                            <option value="1" @if ($data->c_type == 1) selected @endif>Order %
                            </option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail6">Valor de la comisión</label>
                        {!! Form::text('c_value', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <h1 style="font-size: 20px">Establecer cargos de comisión por Ticket<br />
            <small style="font-size:12px;">(dejar en 0 si no requiere cobrar comisión)</small>
        </h1>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail6">Tipo de Comision</label>
                        <select name="t_type" class="form-control">
                            <option value="0" @if ($data->t_type == 0) selected @endif>Valor fijo
                            </option>
                            <option value="1" @if ($data->t_type == 1) selected @endif>Order %
                            </option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail6">Valor de la comisión</label>
                        {!! Form::text('t_value', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

    {{--    <h1 style="font-size: 20px">Monedero Electronico <small>(CashBack)</small> </h1>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="purse_x_pickup">% a monedero electrónico en tienda:</label>
                        <input type="text" name="purse_x_pickup" id="purse_x_pickup"
                            value="{{ $data->purse_x_pickup }}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="purse_x_table">% a monedero electrónico en mesa:</label>
                        <input type="text" name="purse_x_table" id="purse_x_table"
                            value="{{ $data->purse_x_table }}" class="form-control">
                    </div>
                    <!-- 
                    <div class="form-group col-md-6">
                        <label for="purse_x_delivery">% a monedero electrónico servicio a domicilio:</label>
                        <input type="text" name="purse_x_delivery" id="purse_x_delivery"
                            value="{{ $data->purse_x_delivery }}" class="form-control">
                    </div>-->
                </div>
            </div>
        </div>--}}

    @else
        <input type="text" name="c_type" value="{{ $data->c_type }}" hidden>
        <input type="text" name="c_value" value="{{ $data->c_value }}" hidden>
        <input type="text" name="t_type" value="{{ $data->t_type }}" hidden>
        <input type="text" name="t_value" value="{{ $data->t_value }}" hidden>
    @endif

    <h1 style="font-size: 20px;margin-left: 0px">Tiempos de entrega</h1>
    <div class="card ">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail6">Tiempo de entrega estimado <small>(solo en minutos)</small></label>
                    {!! Form::text('delivery_time', null, ['placeholder' => 'e.g 20-25', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail6">Costo aproximado por persona <small>(no incluya ningún signo de
                            moneda)</small></label>
                    {!! Form::number('person_cost', null, ['placeholder' => 'e.g 200', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group col-12">
                    <input type="text" name="Cuenta_clave" value="0" hidden>
                    <input type="text" name="banco_name" value="0" hidden>
                </div>
            </div>
        </div>
    </div>

    @if (isset($admin))
    <h1 style="font-size: 20px;margin-left: 0px">Valores extra</h1>
    <div class="card ">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail6">Valor mínimo del carrito<br /> <small style="font-size:12px;">
                        (Si se declara un monto a partir de este monto el envio sera gratis.)</small></label>
                    {!! Form::text('min_cart_value', null, [
                        'placeholder' => 'Después de esta cantidad, la entrega será gratuita',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail6">Alcance del servicio en KM <br /> <small style="font-size:12px;">(a
                            cuantos kilometros de distancia realizas entregas a
                            domiclio)</small></label>
                    {!! Form::number('distance_max', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail6">Alcance Minimo del servicio en KM <br />
                        <small style="font-size:12px;">(Si la distancia es menor a esto, se cobrara una tarifa
                            fija)</small></label>
                    {!! Form::number('delivery_min_distance', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    @else
        <input type="text" name="min_cart_value" value="{{ $data->min_cart_value }}" hidden>
        <input type="text" name="distance_max" value="{{ $data->distance_max }}" hidden>
        <input type="text" name="delivery_min_distance" value="{{ $data->delivery_min_distance }}" hidden>
    @endif

    <!--*********** Horario de Atencion *****************-->
    <h1 style="font-size: 20px;margin-left: 0px">
        Horarios de atención
        <br /><small style="font-size:14px;">(Si algun día de la semana marcas como cerrado, deja en blanco el
            horario de atención)</small>
    </h1>
    <div class="card py-3 m-b-30">
        <div class="card-body">
            @if ($times->count() > 0)
                @foreach ($times as $tm)
                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Lunes</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_mon" class="form-control">
                                        @if ($tm->Mon == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input  id="timepickerLA" width="276" name="open_mon" class="form-control"
                                        @if ($tm->Mon != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Mon')['open_time'] }}" @endif>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerLC" width="276" name="close_mon" class="form-control"
                                        @if ($tm->Mon != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Mon')['close_time'] }}" @endif>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Martes</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_tue" class="form-control">
                                        @if ($tm->Tue == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerMA" width="276" name="open_tue" class="form-control"
                                        @if ($tm->Tue != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Tue')['open_time'] }}" @endif>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerMC" width="276" name="close_tue" class="form-control"
                                        @if ($tm->Tue != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Tue')['close_time'] }}" @endif>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Miércoles</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_wed" class="form-control">
                                        @if ($tm->Wed == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerMierA" width="276" name="open_wed" class="form-control"
                                        @if ($tm->Wed != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Wed')['open_time'] }}" @endif>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerMierC" width="276" name="close_wed" class="form-control"
                                        class="form-control without_ampm"
                                        @if ($tm->Wed != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Wed')['close_time'] }}" @endif>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Jueves</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>


                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_thu" class="form-control">
                                        @if ($tm->Thu == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerJA" width="276" name="open_thu" class="form-control"
                                        @if ($tm->Thu != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Thu')['open_time'] }}" @endif>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerJC" width="276" name="close_thu" class="form-control"
                                        @if ($tm->Thu != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Thu')['close_time'] }}" @endif>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Viernes</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_fri" class="form-control">
                                        @if ($tm->Fri == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerVA" width="276" name="open_fri" class="form-control"
                                        @if ($tm->Fri != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Fri')['open_time'] }}" @endif>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerVC" width="276" name="close_fri" class="form-control"
                                        @if ($tm->Fri != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Fri')['close_time'] }}" @endif>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Sábado</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_sat" class="form-control">
                                        @if ($tm->Sat == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerSA" width="276" name="open_sat" class="form-control"
                                        @if ($tm->Sat != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Sat')['open_time'] }}" @endif>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerSC" width="276" name="close_sat" class="form-control"
                                        @if ($tm->Sat != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Sat')['close_time'] }}" @endif>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12" style="margin:0;padding:0 5px;">
                            <h5>Domingo</h5>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Status</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <select name="status_sun" class="form-control">
                                        @if ($tm->Sun == 'closed')
                                            <option value="0">Cerrado</option>
                                            <option value="1">Abierto</option>
                                        @else
                                            <option value="1">Abierto</option>
                                            <option value="0">Cerrado</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de apertura</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerDA" width="276" name="open_sun" class="form-control"
                                        @if ($tm->Sun != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Sun')['open_time'] }}" @endif>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail6">Horario de cierre</label>

                            <div class="form-group col-md-12" style="padding:0;">
                                <div class='input-group'>
                                    <input id="timepickerDC" width="276" name="close_sun" class="form-control"
                                        @if ($tm->Sun != 'closed') value="{{ $opening_time->ViewTimeDate($times, 'Sun')['close_time'] }}" @endif>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!--*********** Horario de Atencion *****************-->

    <!-- Carga de mapas y direcciones --> 
    <div class="card py-3 m-b-30">
        <div class="card-body">
            @if (isset($admin))
                @if (!$data->id)
                    @include('admin.user.newgoogle')
                @else
                    <a href="{{ Asset(env('admin') . '/user/viewmap/' . $data->id) }}"
                        class="btn btn-success width-xl waves-effect waves-light btn-cta">Cargar Mapa y
                        Ubicaciones</a>
                    <input name="address" value="{{ $data->address }}" type="hidden">
                    <input type="hidden" name="lat" id="lat" value="{{ $data->lat }}">
                    <input type="hidden" name="lng" id="lng" value="{{ $data->lng }}">
                @endif
            @else
                <a class="btn btn-success width-xl waves-effect waves-light btn-cta">Mapa y Ubicaciones seran
                    cargadas desde Administración</a>
                <input name="address" value="{{ $data->address }}" type="hidden">
                <input type="hidden" name="lat" id="lat" value="{{ $data->lat }}">
                <input type="hidden" name="lng" id="lng" value="{{ $data->lng }}">
            @endif
        </div>
    </div>
    <!-- Carga de mapas y direcciones -->

</div>
<div class="form-row m-b-30" style="margin-left: 1px">
    <button type="submit" 
        class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar Cambios</button>
</div>
 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<script>
/** Funciones del horario */
    $('#timepickerLA').timepicker({
        timeFormat: 'HH:mm',
       
    });
    $('#timepickerLC').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerMA').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerMC').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerMierA').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerMierC').timepicker({
        timeFormat: 'HH:mm',
    });

    $('#timepickerJA').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerJC').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerVA').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerVC').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerSA').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerSC').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerDA').timepicker({
        timeFormat: 'HH:mm',
    });
    $('#timepickerDC').timepicker({
        timeFormat: 'HH:mm',
    });

/** Funciones del horario */

/** Funciones para las categorias */
    var store_type = document.querySelector('#store_type');
    var store_subtype = document.querySelector('#store_subtype');
    var subsubtype = document.querySelector('#subsubtype');

    var id_subtype = 0;
    var id_subsubtype = 0;
    // obtenemos Categorias en primer instancia
    setTimeout(() => {
        let selectedIndex = store_type.selectedIndex;
        if ("{{ $data->id }}") {
            id_subtype = "{{ $data->subtype }}";
            id_subsubtype = "{{ $data->subsubtype }}";
        }
        if (store_type[selectedIndex].value != 0) GetCats(store_type[selectedIndex].value);
    }, 800);

    // Control de cambios en Cat Principal
    store_type.addEventListener('change', (event) => {
        // Consultamos Categoria Principal y obtenemos Categorias y SubCategorias
        if (event.target.value != 0) GetCats(event.target.value);
    });

    store_subtype.addEventListener('change', (event) => {
        // Consultamos Categoria y obtenemos SubCategorias
        GetSubCats(event.target.value);
    });


// obtenemos Categorias
    const GetCats = ($id) => {
        $.ajax({
            async: true,
            type: 'GET',
            url: 'https://acientos.xedik.com/api/getCategory/' + $id,
            success: function(resp) {
                const request = resp.data;
                // Limpiamos Select 
                CleanSelect(store_subtype);
                // Limpiamos Select 
                CleanSelect(subsubtype);
                // Agregamos
                for (let i = 0; i < request.length; i++) {
                    const element = request[i];
                    var opt = document.createElement('option');
                    opt.value = element.id;
                    opt.innerHTML = element.name;
                    if (element.id == id_subtype) {
                        opt.selected = true;
                    }

                    store_subtype.appendChild(opt);

                    // Agregamos SubCategorias
                    if (element.id == id_subtype) {
                        GetSubCats(element.id);
                    } else {
                        GetSubCats(request[0].id);
                    }
                }
            }
        });
    };

// obtenemos SubCategorias
    const GetSubCats = ($id) => {
        $.ajax({
            async: true,
            type: 'GET',
            url: 'https://acientos.xedik.com/api/getSelectSubCat/' + $id,
            success: function(resp) {
                const request = resp.data;
                // Limpiamos Select 
                CleanSelect(subsubtype);
                // Agregamos
                for (let x = 0; x < request.length; x++) {
                    const subcats = request[x];
                    var opt = document.createElement('option');
                    opt.value = subcats.id;
                    opt.innerHTML = subcats.name;
                    if (subcats.id == id_subsubtype) {
                        opt.selected = true;
                    }
                    subsubtype.appendChild(opt);
                }
            }
        });
    };

// Limpiamos Select
    const CleanSelect = ($select) => {
        for (let i = $select.options.length; i >= 0; i--) {
            $select.remove(i);
        }
    };
/** Funciones para las categorias */
</script>
