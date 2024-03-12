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
                    <div class="col-lg-12 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">
                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>

                            <div class="card-body">
                                <table class="table table-hover " >
                                    <thead>
                                        <tr >
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Registro</th>
                                            <th>Edad</th>
                                            <th>Tickets</th>
                                            <th>6Meses</th>
                                            <th>Reportes</th>
                                           {{-- <th>Estado</th> --}}
                                            <th>Eliminar</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td class="col-md-3">{{ $row->name }} </td>
                                                <td class="col-md-2">{{ $row->email }}</td>
                                                <td class="col-md-1">{{ $row->phone }}</td>
                                               
                                                <td class="col-md-1" style="font-size: 13px">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                <td class="col-md-1" style="text-align: center">{{ $row->Edad($row->birthday)}}</td>
                                                <td class="col-md-1" style="text-align: center">{{ $row->Tickets($row->id) }}</td>
                                                <td class="col-md-1" style="text-align: center">{{ $row->Tickets6Meses($row->id) }}</td>
                                                <td class="col-md-1" style="text-align: center">{{ $row->Reportes($row->id) }}</td>





                                            {{--    <td class="col-md-1">
                                                    @if ($row->status == 0)
                                                        <button type="button"
                                                        class="btn btn-success width-md waves-effect waves-light " title="Usuario Activo"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Activo</button>
                                                    @else
                                                        <button type="button"
                                                        class="btn btn-danger width-md waves-effect waves-light" title="Usuario Bloqueado"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')"> <i class="mdi mdi-mdi-block-helper" ></i></button>
                                                    @endif
                                                </td>--}}
                                                <td class="col-md-1">

                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-success text-white" href="{{  Asset($link . $row->id . '/edit') }}" title="Editar Cuenta de Usuario"><i class="mdi mdi-pencil" ></i></a>
                                                  
                                                        <button type="button" class="btn btn-danger" 
                                                            onclick="confirmAlert('{{ Asset($link . 'trash/' . $row->id) }}')"
                                                            data-original-title="Eliminar" title="Eliminar Cuenta de Usuario"> <i class="mdi mdi-delete-forever" ></i></button>
                                                    </div>
                                                    

                                                   
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
