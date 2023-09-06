@extends('admin.layout.main')

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
                                        <tr style="text-align: center">
                                            <th>ID</th>
                                            <th>Negocio</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>hora</th>
                                            <th>Cashback</th>
                                            <th>Invitados</th>
                                            <th>Reserva</th>
                                            <th>Status</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            @if ($row->usuario)
                                                <tr>
                                                    <td>#{{ $row->id }}</td>
                                                    <td class="col-md-3">{{ $row->negocio->name }}</td>
                                                    <td class="col-md-2">{{ $row->usuario->name }}</td>
                                                    <td class="col-md-2" style="text-align: center;">
                                                        {{ date('d-m-Y', strtotime($row->fecha)) }}</td>
                                                    <td class="col-md-1" style="text-align: center">
                                                        {{ Carbon\Carbon::parse($row->hora)->format('h:i  A') }}</td>
                                                    <td class="col-md-1" style="text-align: center">{{ $row->recompensa }} %</td>
                                                    <td class="col-md-1" style="text-align: center">{{ $row->invitados }}
                                                    </td>
                                                    <td class="col-md-1" style="text-align: center">
                                                        @if ($row->reserva == 1)
                                                            <span type="button" class="badge bg-warning width-lg">No</span>
                                                        @endif
                                                        @if ($row->reserva == 0)
                                                            <span type="button" class="badge bg-success width-lg">Si</span>
                                                        @endif

                                                    </td>
                                                    <td class="col-md-1" style="text-align: center">
                                                        @if ($row->status == 1)
                                                            <span type="button" class="badge bg-warning width-lg">Pendiente</span>
                                                        @endif
                                                        @if ($row->status == 2)
                                                            <span type="button" class="badge bg-success width-lg">Cumplida</span>
                                                        @endif
                                                        @if ($row->status == 3)
                                                            <span type="button" class="badge bg-danger width-lg">Cancelada</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endif
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
