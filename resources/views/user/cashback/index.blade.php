@extends('user.layout.main')

@section('title')
    Administrar CashBack
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
                    <div class="col-lg-12 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">

                            <div class="row">
                                <div class="col-md-6" style="text-align: left;">
                                    <b style="margin-left:20px">@yield('title')</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;"><a style=" margin-right:20px" href="{{ Asset($link . 'add') }}"
                                    class="btn btn-warning rounded-pill waves-effect waves-light width-md">
                                    Agregar Nuevo</a>&nbsp;&nbsp;&nbsp;
                                </div>

                            </div>


                            <div class="card-body">


                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>CashBack</th>
                                            <th>Hora</th>
                                            <th>Status</th>
                                            <th >Opciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>#{{ $row->id }}</td>                                             
                                                
                                                <td> {{ $row->cashback }} %</td>
                                                <td>{{ Carbon\Carbon::parse($row->hora)->format('h:i  A') }}</td>
                                                <td>
                                                    @if ($row->status == 0)
                                                        <button type="button" class="btn btn-success width-xs waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Activo</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger width-xs waves-effect waves-light"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Inactivo</button>
                                                    @endif
                                                </td>

                                                <td class="col-md-2">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Opciones  
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a href="{{ Asset($link . $row->id . '/edit') }}" class="dropdown-item">
                                                                <i class="mdi mdi-border-color"></i> Editar
                                                            </a>
                                                            <a href="javascript:void()" onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')" class="dropdown-item">
                                                                <i class="mdi mdi-delete-forever"></i> Eliminar
                                                            </a>
                                                        </div>
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
