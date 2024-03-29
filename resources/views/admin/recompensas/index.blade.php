@extends('admin.layout.main')

@section('title')
    Administrar recompensas
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
                                {{-- <divclass="col-md-6"style="text-align:right;"><ahref="Asset($link.'add')}}"
                                    class="btn btn-warning rounded-pill waves-effect waves-light" style=" margin-right:20px" >Agregar
                                    nuevo</a>&nbsp;&nbsp;&nbsp;
                                </div> --}}

                            </div>


                            <div class="card-body">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Negocio</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>hora</th>
                                            <th>Cashback</th>
                                            <th>Invitados</th>

                                            <th>Status</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td class="col-md-3">
                                                    @if ($row->id_negocio)
                                                        {{ $row->negocio->name }}
                                                    @else
                                                    {{ $row->descripcion }}
                                                    @endif
                                                </td>
                                                <td class="col-md-2">{{ $row->usuario->name }}</td>
                                                <td class="col-md-2" style="text-align: center;">
                                                    {{ date('d-m-Y', strtotime($row->fecha)) }}</td>
                                                <td class="col-md-1" style="text-align: center">
                                                    {{ Carbon\Carbon::parse($row->hora)->format('h:i  A') }}</td>
                                                <td class="col-md-1" style="text-align: center">$ {{ number_format($row->valor,2) }} </td>
                                                <td class="col-md-1" style="text-align: center">
                                                    @if ($row->reserva)
                                                        {{ $row->reservas->invitados }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>

                                                <td class="col-md-1" style="text-align: center">
                                                    @if ($row->status == 0)
                                                        <span class="badge bg-warning width-lg">Pendiente</span>
                                                    @endif
                                                    @if ($row->status == 1)
                                                        <span class="badge bg-success width-lg">Cumplida</span>
                                                    @endif
                                                    @if ($row->status == 3)
                                                        <span class="badge bg-danger width-lg">Cancelada</span>
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
