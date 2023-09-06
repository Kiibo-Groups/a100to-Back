@extends('admin.layout.main')

@section('title')
    {{ $title }}
@endsection

@section('icon')
    mdi-cart
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
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Código</th>
                                            <th>Negocio</th>
                                            <th>Usuario</th>
                                            <th>Estado del pedido</th>
                                            <th>Elementos</th>
                                            <th style="text-align: right">Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            @include('admin.order.viewElements')
                                            <tr>

                                                <td width="2%">#{{ $row->id }}</td>
                                                <td width="5%">{{ $row->code_order }}</td>
                                                <td width="15%">{{ $row->store }}</td>
                                                <td width="15%">
                                                    {{ $row->name }}<br>
                                                    <small>Tel: {{ $row->phone }}</small>
                                                </td>
                                                <td width="20%">
                                                    @if ($row->InnStore == 1)
                                                        <span>Pedido en mesa <b>#{{ $row->mesa }}</b></span><br>
                                                    @endif

                                                    @if ($row->status == 0)
                                                        <span class="badge badge-success">Pedido Nuevo</span>
                                                    @elseif($row->status == 1)
                                                        <span class="badge badge-primary">Pedido Aceptado</span>
                                                    @elseif($row->status == 2)
                                                        <span style="font-size: 12px">Cancelado a las
                                                            <br>{{ $row->status_time }}</span>
                                                    @elseif($row->status == 1.5)
                                                        <span class="badge badge-secondary">Buscando Repartidor</span>
                                                    @elseif($row->status == 3)
                                                        <span class="badge badge-info">Repartidor asignado</span>
                                                        <br />
                                                        <small>Repartidor(a): {{ $row->dboy }}</small>
                                                    @elseif($row->status == 4)
                                                        <span class="badge badge-warning">En ruta al destino</span>
                                                        <br />
                                                        <small>Repartidor(a): {{ $row->dboy }}</small>
                                                    @elseif($row->status == 5 || $row->status == 6)
                                                        @if ($row->InnStore == 0)
                                                            <span style="font-size: 12px">
                                                                Entregado por<br />
                                                                {{ $row->dboy }} a las:<br>{{ $row->status_time }}
                                                            </span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td width="20%">
                                                    <button href="javascript::void()" data-toggle="modal"
                                                        data-target="#viewModalElements{{ $row->id }}"
                                                        class="btn btn-secondary">
                                                        Vista de elementos
                                                    </button>
                                                </td>

                                                <td width="23%">
                                                    @include('admin.order.action')
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        {!! $data->appends(request()->except('page'))->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
