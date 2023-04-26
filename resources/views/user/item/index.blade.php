@extends('user.layout.main')

@section('title')
    Administrar artículos
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
                    <div class="col-lg-11 mx-auto  mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">

                            <div class="row">
                                <div class="col-md-6" style="text-align: left;">
                                    <b style="margin-left:20px">@yield('title')</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="{{ Asset($link . 'add') }}"
                                        class="btn btn-warning rounded-pill waves-effect waves-light width-md">
                                        Agregar Nuevo
                                    </a>
                                    <a style="margin-left:20px; margin-right:20px" href="{{ Asset('import') }}"
                                        class="btn btn-success rounded-pill waves-effect waves-light width-md">
                                        Importar
                                    </a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>


                            <div class="card-body">

                                {{ Form::open(['route' => 'search_item', 'method' => 'GET', 'class' => 'col s12']) }}
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">

                                        <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label for="inputEmail6">Nombre</label><br />
                                                <input type="text" name="name" id="name"
                                                    value="{{ $name }}"
                                                    placeholder="Busca por nombre y/o Descripción" class="form-control"
                                                    autocomplete="off">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="inputEmail6">Tipo Menu</label>
                                                <select name="cate" class="form-control" id="cate">
                                                    @foreach ($category as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            @if ($cat->id == $cate) selected @endif>
                                                            {{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2" style="text-align: center">
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light  width-md"
                                                    style="margin-top:30px;">Buscar</button>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <a href="{{ Asset($link) }}"
                                                    class="btn btn-success waves-effect waves-light  width-md"
                                                    style="margin-top:30px;">Ver todo</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                {{ Form::close() }}

                                <table class="table table-hover ">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Imagen</th>
                                            <th>Categoría</th>
                                            <th>Nombre</th>
                                            <th>Ordenamiento</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr style="text-align: center">
                                                <td width="15%">
                                                    @if ($row->img)
                                                        <img src="{{ Asset('upload/item/' . $row->img) }}" height="50">
                                                    @endif
                                                </td>
                                                <td width="12%">{{ $row->cate }}</td>
                                                <td width="17%" style="text-align: left">{{ $row->name }}</td>
                                                <td width="12%">{{ $row->sort_no }}</td>
                                                <td width="10%">

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

                                                <td width="24%" style="text-align: right">
                                                    <!-- Complementos -->
                                                    <a href="javascript::void()"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  btn-info waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target="#slideRightModal{{ $row->id }}"><i
                                                            class="mdi mdi-link"></i></a>
                                                    <!-- Tranding -->
                                                    <a href="javascript::void()"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  waves-effect waves-light <?php if ($row->trending == 1) {
                                                            echo 'btn-success';
                                                        } else {
                                                            echo 'btn-warning';
                                                        } ?>"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="<?php if ($row->trending == 1) {
                                                            echo 'En Trending';
                                                        } else {
                                                            echo 'Marcar Trending';
                                                        } ?>"
                                                        onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id . '?type=trend') }}')"><i
                                                            class="mdi mdi-trending-up"></i></a>
                                                    <!-- Editar -->
                                                    <a href="{{ Asset($link . $row->id . '/edit') }}"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  waves-effect waves-light btn-success"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Edit This Entry"><i
                                                            class="mdi mdi-border-color"></i></a>
                                                    <!-- Eliminar -->
                                                    <button type="button"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  waves-effect waves-light btn-danger"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Delete This Entry"
                                                        onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')"><i
                                                            class="mdi mdi-delete-forever"></i></button>


                                                </td>
                                            </tr>

                                            @include('user.item.addon')
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
