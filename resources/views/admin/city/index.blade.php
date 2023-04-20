@extends('admin.layout.main')

@section('title')
    Manage City
@endsection

@section('icon')
    mdi-map-marker
@endsection


@section('content')
    <div class="content-page" id="div2">
        @include('user.layout.alert')
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card py-3 m-b-30">
                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="text-align: right;"><a href="{{ Asset($link . 'add') }}"
                                        class="btn m-b-15 ml-2 mr-2 btn-rounded btn-warning">Add New</a>&nbsp;&nbsp;&nbsp;
                                </div>

                            </div>


                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Ciudad</th>
                                            <th>Cobro</th>
                                            <th>Min/Distancia</th>
                                            <th>Cobro Minimo</th>
                                            <th>Status</th>
                                            <th style="text-align: right">Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>${{ $row->c_value }} / @if ($row->c_type == 0)
                                                        Kilometro
                                                    @else
                                                        Fijo
                                                    @endif
                                                </td>
                                                <td>{{ $row->min_distance }}KM</td>
                                                <td>${{ $row->min_value }}</td>
                                                <td>
                                                    @if ($row->status == 0)
                                                        <button type="button"
                                                            class="btn btn-sm m-b-15 ml-2 mr-2 btn-success"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Active</button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-sm m-b-15 ml-2 mr-2 btn-danger"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Disabled</button>
                                                    @endif
                                                </td>
                                                <td style="text-align: right">
                                                    <a href="{{ Asset($link . $row->id . '/edit') }}"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  btn-rounded-circle btn-success"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Edit This Entry"><i
                                                            class="mdi mdi-border-color"></i></a>
                                                    <button type="button"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  btn-rounded-circle btn-danger"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Delete This Entry"
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
