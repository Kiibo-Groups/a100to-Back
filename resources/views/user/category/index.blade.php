@extends('user.layout.main')

@section('title')
    Administrar categorías
@endsection

@section('icon')
    mdi-silverware-fork-knife
@endsection


@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row ">
                    <div class="col-lg-12 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">

                            <div class="row">
                                <div class="col-md-6" style="text-align: left;">
                                    <b style="margin-left:20px">@yield('title')</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="{{ Asset($link . 'add') }}" style=" margin-right:20px" 
                                        class="btn btn-warning rounded-pill waves-effect waves-light">Agregar
                                        nuevo</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>

                            <div class="card-body">

                                {{ Form::open(['route' => 'search', 'method' => 'GET', 'class' => 'col s12']) }}
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">

                                        <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label for="inputEmail6">Nombre</label><br />
                                                <input type="text" name="name" id="name"
                                                    value="{{ $name }}" placeholder="Busca por nombre"
                                                    class="form-control" autocomplete="off">
                                            </div>

                                            @if ($user->subtype == 0)
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail6">Tipo Categoria </label>
                                                    <select name="type" class="form-control" id="type">
                                                        <option value="0"
                                                            @if ($type == 0) selected @endif>De Menú
                                                        </option>
                                                        <option value="1"
                                                            @if ($type == 1) selected @endif>De
                                                            Complementos
                                                        </option>
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="form-group col-md-2" style="text-align: center">
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light  width-md"
                                                    style="margin-top:30px;">Buscar</button>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <a href="{{ Asset($link) }}"
                                                    class="btn btn-success waves-effect waves-light width-md"
                                                    style="margin-top:30px;">Ver todo</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                {{ Form::close() }}


                                {!! $data->links() !!}

                                <table class="table table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th width="15%">Sort Order</th>
                                            <th width="32%">Name</th>
                                            <th width="20%">Tipo</th>
                                            <th width="15%">Status</th>
                                            <th width="19%">Option</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr style="text-align: center">
                                                <td width="15%">{{ $row->sort_no }}</td>
                                                <td width="32%" style="text-align: left">{{ $row->name }}
                                                    @if ($row->id_element != '')
                                                        <small>({{ $row->id_element }})</small>
                                                    @endif
                                                </td>
                                                <td width="20%">
                                                    @if ($user->subtype == 0)
                                                        @if ($row->type == 0)
                                                            De Menú
                                                        @else
                                                            De Complemento
                                                        @endif
                                                    @else
                                                        Producto
                                                    @endif
                                                </td>
                                                <td width="15%">
                                                    @if ($row->status == 0)
                                                        <button type="button"
                                                            class="btn btn-success width-xs waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Activo</button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-danger width-xs waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Inactivo</button>
                                                    @endif

                                                </td>

                                                <td width="19%">

                                                    <a href="{{ Asset($link . $row->id . '/edit') }}"
                                                        class="btn btn-success waves-effect waves-light btn m-b-15 ml-2 mr-2 btn-md"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Editar"><i
                                                            class="mdi mdi-border-color"></i></a>

                                                    <button type="button"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  btn btn-danger waves-effect waves-light"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Eliminar"
                                                        onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')"><i
                                                            class="mdi mdi-delete-forever"></i></button>


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
