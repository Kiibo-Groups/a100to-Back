@extends('admin.layout.main')

@section('title')
    Usuarios Registrados
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

                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Fecha de registro</th>
                                            <th>Pedidos</th>
                                            <th>Estado</th>
                                            <th>Eliminar</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td width="15%">{{ $row->name }}</td>
                                                <td width="20%">{{ $row->email }}</td>
                                                <td width="10%">{{ $row->phone }}</td>
                                                <td width="15%">{{ date('d-M-Y', strtotime($row->created_at)) }}</td>
                                                <td width="10%">{{ $row->countOrder($row->id) }}</td>
                                                <td width="10%">
                                                    @if ($row->status == 0)
                                                        <button type="button"
                                                        class="btn btn-success width-md waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Activo</button>
                                                    @else
                                                        <button type="button"
                                                        class="btn btn-danger width-md waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Bloqueado</button>
                                                    @endif
                                                </td>
                                                <td width="10%">
                                                    <button type="button" class="btn m-b-15 ml-2 mr-2 btn-md  btn btn-danger waves-effect waves-light"
                                                        onclick="confirmAlert('{{ Asset($link . 'trash/' . $row->id) }}')"
                                                        data-original-title="Eliminar">
                                                        
                                                        <i class="mdi mdi-delete-forever" ></i>
                                                    </button>

                                                   
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
