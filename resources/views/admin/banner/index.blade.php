@extends('admin.layout.main')

@section('title')
    Banners
@endsection

@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">

                <div class="row " style="padding: 20px">
                    <div class="col-lg-12 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">

                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="text-align: right;">
                                    <a href="{{ Asset($link . 'add') }}"
                                        class="btn btn-success rounded-pill waves-effect waves-light" style=" margin-right:20px" >

                                        Agregar Banner</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>


                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Ciudad</th>
                                            <th>Imagen</th>
                                            <th>Posición</th>
                                            <th>Status</th>
                                            <th style="text-align: right">Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td width="17%">
                                                    @if ($row->city)
                                                        {{ $row->city }}
                                                    @else
                                                        All City
                                                    @endif
                                                </td>
                                                <td width="17%"><img src="{{ Asset('upload/banner/' . $row->img) }}"
                                                        height="70"></td>
                                                <td width="17%">{{ $row->getPosition($row->position) }}</td>

                                                <td width="17%">

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

                                                <td width="17%" style="text-align: right">

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
