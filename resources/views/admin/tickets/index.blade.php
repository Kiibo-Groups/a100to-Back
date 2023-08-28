@extends('admin.layout.main')

@section('title')
    Administrar tickets
@endsection

@section('icon')
    mdi-calendar
@endsection


@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-11 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">

                            <div class="row">
                                <div class="col-md-6" style="text-align: left;">
                                    <b style="margin-left:20px">@yield('title')</b>
                                </div>
                                {{-- <divclass="col-md-6"style="text-align:right;"><ahref="Asset($link.'add')}}"
                                    class="btn btn-warning rounded-pill waves-effect waves-light" style=" margin-right:20px" >Agregar
                                    nuevo</a>&nbsp;&nbsp;&nbsp;
                                </div> --}}

                            </div>


                            <div class="card-body">


                                <div class="row">

                                    <form action="{{ url(env('admin') . '/tickets') }}" method="GET">

                                        <div class=" input-group mb-3">
                                            @include('alerts')

                                            <input type="text" name="filter_from" class="form-control"
                                                @if ($filter_from != null) value="{{ $filter_from }}" @endif
                                                placeholder="Desde" onfocus="(this.type='date')"
                                                onblur="(this.type='text')">


                                            <input type="text" name="filter_even" id="filter_even"
                                                @if ($filter_even != null) value="{{ $filter_even }}" @endif
                                                class="form-control" placeholder="Hasta" onfocus="(this.type='date')"
                                                onblur="(this.type='text')">


                                        </div>
                                        <div class="input-group mb-3">
                                            <select name="filter_negocio" class="form-select" id="filter_negocio">
                                                <option value="" @if ($filter_negocio == '') selected @endif>
                                                    Selecciona un Negocio</option>
                                                @foreach ($negocios as $type)
                                                    <option value="{{ $type->id }}"
                                                        @if ($filter_negocio == $type->id) selected @endif>
                                                        {{ $type->name }}</option>
                                                @endforeach
                                            </select>

                                            <select name="filter_usuario" class="form-select" id="filter_usuario">
                                                <option value="" @if ($filter_usuario == '') selected @endif>Selecciona un Usuario</option>
                                                @foreach ($usuarios as $type)
                                                    <option value="{{ $type->id }}" @if ($filter_usuario == $type->id) selected @endif>
                                                        {{ $type->name }}</option>
                                                @endforeach
                                            </select>

                                            <select name="filter_status" id="filter_status" class="form-select">
                                                <option value="" @if ($status == '') selected @endif>Estatus</option>
                                                <option value="0" @if ($status == '0') selected @endif>Registrada</option>
                                                <option value="1" @if ($status == '1') selected @endif>Pendiente</option>
                                                <option value="2" @if ($status == '2') selected @endif>Aceptada</option>
                                                <option value="3" @if ($status == '3') selected @endif>Rechazada</option>
                                            </select>

                                            <button class="btn btn-outline-primary" type="submit"
                                                id="button-addon2">Buscar</button>
                                        </div>

                                    </form>
                                </div>


                                <table class="table table-hover ">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Negocio</th>
                                            <th>Usuario</th>
                                            <th>Cashback</th>
                                            <th>Fecha</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td class="col-md-3">
                                                    @if (!$row->id_negocio)
                                                    @else
                                                        {{ $row->negocio->name }}
                                                    @endif

                                                </td>
                                                <td class="col-md-3">{{ $row->usuario->name }}</td>
                                                <td class="col-md-1">
                                                    @if (!$row->reserva)
                                                    @else
                                                        {{ $row->reservacion->recompensa }} %
                                                    @endif

                                                </td>
                                                <td class="col-md-2" style="text-align: center">
                                                    {{ date('d-M-Y', strtotime($row->created_at)) }}</td>
                                                <td class="col-md-1" style="text-align: center">
                                                    @if ($row->status == 0)
                                                        <button type="button"
                                                            class="btn btn-info width-xs waves-effect waves-light">Registrada</button>
                                                    @endif
                                                    @if ($row->status == 1)
                                                    <button type="button"
                                                        class="btn btn-warning width-xs waves-effect waves-light">Pendiente</button>
                                                @endif
                                                    @if ($row->status == 2)
                                                        <button type="button"
                                                            class="btn btn-success width-xs waves-effect waves-light">Aceptada</button>
                                                    @endif
                                                    @if ($row->status == 3)
                                                        <button type="button"
                                                            class="btn btn-danger width-xs waves-effect waves-light">Rechazada</button>
                                                    @endif
                                                </td>
                                                </td>
                                                <td class="col-md-2"style="text-align: center">

                                                    <a href="{{ url(env('admin') . '/tickets/file/' . $row->id) }}"
                                                        class="btn btn-warning waves-effect waves-light btn m-b-15 ml-2 mr-2 btn-md"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Descargar Imagen"><i
                                                            class="mdi mdi-image"></i></a>

                                                    <a href="{{ Asset($link . $row->id . '/edit') }}"
                                                        class="btn btn-success waves-effect waves-light btn m-b-15 ml-2 mr-2 btn-md"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Editar"><i
                                                            class="mdi mdi-border-color"></i></a>

                                                    {{--  <button type="button"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  btn btn-danger waves-effect waves-light"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Eliminar"
                                                        onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')"><i
                                                        class="mdi mdi-delete-forever"></i></button> --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
