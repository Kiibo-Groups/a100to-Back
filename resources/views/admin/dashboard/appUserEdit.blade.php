@extends('admin.layout.main')

@section('title')
    Editar Usuarios
@endsection

@section('icon')
    mdi-comment-plus
@endsection


@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-lg-12 mx-auto">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">
                            <div class="col-md-12" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>
                            <div class="card-body" style="padding-top:40px;">
                              
                                {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Usuario</label>
                                        {!! Form::text('user_name', null, ['required' => 'required', 'placeholder' => '', 'class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Telefono</label>
                                        {!! Form::text('phone', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Sexo</label>
                                        {!! Form::text('sex_type', null, [
                                            'required' => 'required',
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'disabled' => 'disabled'
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Otp</label>
                                        {!! Form::text('otp', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail6">Nombre</label>
                                        {!! Form::text('name', null, ['required' => 'required', 'placeholder' => 'Nombre', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail6">Apellido</label>
                                        {!! Form::text('last_name', null, [
                                            'required' => 'required',
                                            'placeholder' => 'Apellido',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                  
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail6">Email</label>
                                        {!! Form::text('email', null, [
                                            'required' => 'required',
                                            'placeholder' => 'example@example.com',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail6">Contraseña <span
                                                style="font-size:10px; color:#ff0000";>Dejar en blanco para no
                                                actualizar</span></label>
                                        {!! Form::text('password_change', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Saldo</label>
                                        {!! Form::text('saldo', null, ['required' => 'required', 'placeholder' => '', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Tickets</label>
                                        {!! Form::text('tickets', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Monedero</label>
                                        {!! Form::text('monedero', null, [
                                            'required' => 'required',
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail6">Saldo xp</label>
                                        {!! Form::text('saldo_xp', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="form-row m-b-30" style="margin-left: 1px; padding-top:30px;">
                                    <button type="submit" 
                                        class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar Cambios</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
