@extends('admin.layout.main')

@section('title')
    Administrar Ciudad
@endsection

@section('icon')
    mdi-map-marker
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
                                        class="btn btn-warning rounded-pill waves-effect waves-light"
                                        style=" margin-right:20px">Agregar
                                        nuevo</a>&nbsp;&nbsp;&nbsp;
                                </div>

                            </div>


                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Ciudad</th>

                                            <th>Status</th>
                                            <th style="text-align: right">Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>
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
                                                <td style="text-align: right">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
