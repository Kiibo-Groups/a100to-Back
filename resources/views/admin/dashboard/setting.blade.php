@extends('admin.layout.main')

@section('title')
    Información de su cuenta
@endsection

@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-lg-11 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div>

                            <form action="{{ $form_url }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">

                                    <div class="card py-3 m-b-30">
                                        <div class="col-md-12" style="text-align: left;">
                                            <b style="margin-left:20px">@yield('title')</b>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail6">Name</label>
                                                    <input type="text" value="{{ $data->name }}" class="form-control"
                                                        id="inputEmail6" name="name" required="required">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4"
                                                        name="email" value="{{ $data->email }}" required="required">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="asd">Username</label>
                                                    <input type="text" class="form-control" id="asd"
                                                        name="username" value="{{ $data->username }}" required="required">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="asd">Logo</label>
                                                    <input type="file" class="form-control" id="asd"
                                                        name="logo">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="asd">Currency <small>(e.g $, &pound;
                                                            &#8377;)</small></label>
                                                    <input type="text" class="form-control" id="asd"
                                                        name="currency" value="{{ $data->currency }}" required="required">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    @if ($data->logo)
                                                        <img src="{{ Asset('upload/admin/' . $data->logo) }}"
                                                            width="50">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="asd">Recompensas por nuevo usuario </label>
                                                    <input type="number" class="form-control" id="recompensa_nuevo"
                                                        name="recompensa_nuevo" step="0.01" value="{{ $data->recompensa_nuevo }}" required="required">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="asd">Extra  por cada nueva
                                                        referencia en su primera comida. </label>
                                                    <input type="number" class="form-control" id="recompensa_compra"
                                                        name="recompensa_compra" step="0.01" value="{{ $data->recompensa_compra }}" required="required">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h1 style="font-size: 20px">Establecer tiempo para nuevas visitas</h1>
                                    <div class="card py-3 m-b-30">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail6">Tipo de conteo</label>
                                                    <select name="v_count" id="v_count" class="form-control">
                                                        <option value="0"
                                                            @if ($data->v_count == 0) selected @endif>Horas</option>
                                                        <option value="1"
                                                            @if ($data->v_count == 1) selected @endif>Días</option>
                                                        <option value="2"
                                                            @if ($data->v_count == 2) selected @endif>Semanas
                                                        </option>
                                                        <option value="3"
                                                            @if ($data->v_count == 3) selected @endif>Meses</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="v_value">Tiempo</label>
                                                    <input type="text" name="v_value" id="v_value"
                                                        value="{{ $data->v_value }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
   
                                    <h1 style="font-size: 20px">Establecer cargos de comisión por pago con tarjeta</h1>
                                    <div class="card py-3 m-b-30">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail6">Terminal a domicilio</label>

                                                    <select name="send_terminal" class="form-control">
                                                        <option value="0"
                                                            @if ($data->send_terminal == 0) selected @endif>No Brindar
                                                            Servicio</option>
                                                        <option value="1"
                                                            @if ($data->send_terminal == 1) selected @endif>Brindar
                                                            Servicio</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="comm_stripe">Valor de la comisión <small>(% que se
                                                            cobrara)</small> </label>
                                                    <input type="text" name="comm_stripe"
                                                        value="{{ $data->comm_stripe }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 style="">Google ApiKey <br /><small style="font-size: 12px">(Introduce el
                                            ApiKey de tu
                                            cuenta en <a href="https://cloud.google.com/"
                                                target="_blank">https://cloud.google.com/</a> )</small></h4>
                                    <div class="card py-3 m-b-30">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="ApiKey_google">ApiKey</label>
                                                    <input type="text" class="form-control" id="ApiKey_google"
                                                        name="ApiKey_google" value="{{ $data->ApiKey_google }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <h4 style="">Videos de introducción </h4>
                                    <div class="card py-3 m-b-30">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="ApiKey_google">Url #1</label>
                                                    <input type="text" class="form-control" id="url1"
                                                        name="url1" value="{{ $data->url1 }}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="ApiKey_google">Url #2</label>
                                                    <input type="text" class="form-control" id="url2"
                                                        name="url2" value="{{ $data->url2 }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <h4 style="">Social Links</h4>
                                    <div class="card py-3 m-b-30">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="asd">Facebook</label>
                                                    <input type="text" class="form-control" id="asd"
                                                        name="fb" value="{{ $data->fb }}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="asd">Instagram</label>
                                                    <input type="text" class="form-control" id="asd"
                                                        name="insta" value="{{ $data->insta }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="asd">Twitter</label>
                                                    <input type="text" class="form-control" id="asd"
                                                        name="twitter" value="{{ $data->twitter }}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="asd">Youtube</label>
                                                    <input type="text" class="form-control" id="asd"
                                                        name="youtube" value="{{ $data->youtube }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 style="">Change Password</h4>
                                    <div class="card py-3 m-b-30">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Contraseña actual</label>
                                                    <input type="password" class="form-control" id="inputPassword4"
                                                        name="password" required="required"
                                                        placeholder="Ingrese su contraseña actual para guardar la configuración">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Nueva Password <small
                                                            style="color:red">(Si quieres cambiar la contraseña
                                                            actual)</small></label>
                                                    <input type="password" class="form-control" id="inputPassword4"
                                                        name="new_password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row m-b-30" style="margin-left: 1px">
                                        <button type="submit"
                                            class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar
                                            Cambios</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
