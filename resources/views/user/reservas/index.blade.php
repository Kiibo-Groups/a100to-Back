@extends('user.layout.main')

@section('title')
    Administrar de reservas
@endsection

@section('icon')
    mdi-calendar
@endsection


@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">

                            <div class="row">
                                <div class="col-md-6" style="text-align: left;">
                                    <b style="margin-left:20px">@yield('title')</b>
                                </div>
                            </div>


                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th style="text-align: center">hora</th>
                                            <th style="text-align: center">Invitados</th>
                                            <th>Reserva</th>
                                            <th>Status</th>
                                            <th >Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td>3{{ $row->id }}</td>
                                                <td>{{ $row->usuario->name }}</td>
                                                <td>
                                                    {{ucfirst( Carbon\Carbon::parse($row->fecha)->dayName )}}, {{ date('d-M-Y', strtotime($row->fecha)) }} 
                                                    </td>
                                                <td style="text-align: center">
                                                    {{ Carbon\Carbon::parse($row->hora)->format('h:i  A') }}</td>
                                                <td style="text-align: center">{{ $row->invitados }}</td>
                                                <td>
                                                    @if ($row->reserva == 1)
                                                        <button type="button"
                                                            class="btn btn-warning width-xs waves-effect waves-light">No</button>
                                                    @endif
                                                    @if ($row->reserva == 0)
                                                        <button type="button"
                                                            class="btn btn-success width-xs waves-effect waves-light">Si</button>
                                                    @endif
                                              
                                                </td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <span class="badge bg-warning width-lg">Pendiente</span>
                                                    @endif
                                                    @if ($row->status == 2)
                                                        <span class="badge bg-success width-lg">Cumplida</span>
                                                    @endif
                                                    @if ($row->status == 3)
                                                        <span class="badge bg-danger width-lg">Cancelada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Opciones  
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="{{ Asset($link . $row->id . '/edit') }}" class="dropdown-item">
                                                                    <i class="mdi mdi-border-color"></i> Editar
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
  
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
