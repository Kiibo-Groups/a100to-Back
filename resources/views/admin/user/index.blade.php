@extends('admin.layout.main')

@section('title')
    Gestion de negocios
@endsection
@section('icon')
    mdi-home
@endsection


@section('content')
    <div class="content-page" id="div2">
       
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-11 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">
                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="text-align: right;"><a href="{{ Asset($link . 'add') }}"
                                    class="btn btn-warning rounded-pill waves-effect waves-light">Agregar
                                        negocio</a>&nbsp;&nbsp;&nbsp;</div>
                            </div>


                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>QR</th>
                                            <th>Nombre</th>
                                            <th>Ciudad</th>
                                            <th>Status</th>
                                            <th>Trending</th>
                                            <th>Comentarios</th>
                                            <th>Saldos</th>
                                            <th >Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td width="5%">
                                                    <a href="{{ Asset($link . $row->id . '/viewqr') }}">
                                                        <img src="data:image/png;base64,{{ $row->qr_code }}"
                                                            style="width:50px;height: 50px;max-width:none !important;">
                                                    </a>
                                                </td>
                                                <td>{{ $row->name }}<br>
                                                    <small>
                                                        {{ $cats->getCatID($row->type) }}
                                                        @if ($row->subtype != 0)
                                                            > {{ $cats->getCatID($row->subtype) }}
                                                        @endif
                                                        @if ($row->subsubtype != 0)
                                                            > {{ $cats->getCatID($row->subsubtype) }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>{{ $row->city }}</td>
                                                <td>
                                                    @if ($row->status == 0)
                                                        <button type="button"  class="btn btn-info width-xs waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Activo</button>
                                                    @else
                                                        <button type="button"
                                                        class="btn btn-danger width-xs waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Inactivo</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row->trending == 0)
                                                        <button type="button" class="btn btn-info width-md waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id . '?type=trend') }}')">Activar</button>
                                                    @else
                                                        <button type="button"
                                                        class="btn btn-success width-md waves-effect waves-light" 
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id . '?type=trend') }}')">Desactivar</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ Asset($link . $row->id . '/rate') }}"
                                                        class="btn m-b-15 ml-2 mr-2 btn btn-success waves-effect waves-light"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Vista de comentarios"><i
                                                            class="mdi mdi-chart-line"></i></a>
                                                </td>
                                                <td>
                                                    @if ($row->saldo == 0)
                                                        <!-- Saldo a favor -->
                                                        <h5 style="color:blue;">
                                                            {{ $currency }}{{ number_format($row->saldo, 2) }}</h5>
                                                    @elseif($row->saldo > 0)
                                                        <!-- Saldo a favor -->
                                                        <h5 style="color:red;" data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Tiene un saldo a favor de:">
                                                            {{ $currency }}{{ number_format($row->saldo, 2) }} <i
                                                                class="mdi mdi-trending-down"></i></h5>
                                                    @else
                                                        <!-- Saldo que debe -->
                                                        <?php
                                                        $sal = str_replace('-', '', $row->saldo);
                                                        ?>
                                                        <h5 style="color:green;" data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Tiene un saldo deudor de:">
                                                            {{ $currency }}{{ number_format($sal, 2) }} <i
                                                                class="mdi mdi-trending-up"></i> </h5>
                                                    @endif
                                                </td>
                                                <td style="text-align: right">
                                                    <div class="btn-group" role="group">

                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Opciones
                                                    </button>

                                                    <ul class="dropdown-menu"
                                                        style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);"
                                                        data-popper-placement="bottom-start">
                                                        <!-- Close/Open -->
                                                        <li>
                                                            <a href="javascript::void()" class="dropdown-item "
                                                                onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id . '?type=open') }}')">
                                                                Abrir/Cerrar
                                                            </a>
                                                        </li>
                                                        <!-- LoginUser -->
                                                        <li>
                                                            <a href="{{ Asset(env('admin') . '/loginWithID/' . $row->id) }}"
                                                                class="dropdown-item" target="_blank">
                                                                Ingresar como
                                                            </a>
                                                        </li>
                                                        <!-- Reset Saldos -->
                                                        <li>
                                                            <a href="{{ Asset($link . 'pay/' . $row->id) }}"
                                                                class="dropdown-item">
                                                                Agregar Pago
                                                            </a>
                                                        </li>
                                                        <!-- ViewInfo -->
                                                        <li>
                                                            <a href="javascript::void()" class="dropdown-item"
                                                                onclick="showMsg('Username : {{ $row->email }}<br>Password : {{ $row->shw_password }}')">
                                                                Ver Accesos
                                                            </a>
                                                        </li>
                                                        <!-- Edit -->
                                                        <!-- QR -->
                                                        <li>
                                                            <a href="{{ Asset($link . $row->id . '/viewqr') }}"
                                                                class="dropdown-item">
                                                                ver QR
                                                            </a>
                                                        </li>
                                                        <!-- QR -->
                                                        <li>
                                                            <a href="{{ Asset($link . $row->id . '/edit') }}"
                                                                class="dropdown-item">
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <!-- Delete -->
                                                        <li>
                                                            <a href="javascript::void()" class="dropdown-item"
                                                                onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')">
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
