@extends('admin.layout.main')

@section('title')
    Administrar categorías
@endsection

@section('icon')
    mdi-silverware-fork-knife
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
                            <div class="col-md-6" style="text-align: right;"><a href="{{ Asset($link . 'add') }}" style=" margin-right:20px" 
                                    class="btn btn-warning rounded-pill waves-effect waves-light">Agregar nuevo</a>&nbsp;&nbsp;&nbsp;</div>

                        </div>


                        <div class="card-body">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Status</th>
                                        <th style="text-align: right">Opciones</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($data as $row)
                                        <tr>
                                            <td>
                                                <img src="{{ Asset('upload/categorys/' . $row->img) }}" width="50"
                                                    alt="Icon Category">
                                            </td>
                                            <td>
                                                {{ $row->name }}
                                                <br />
                                                @if ($row->type_cat == 0)
                                                    <small>(Principal)</small>
                                                @elseif($row->type_cat == 1)
                                                    <small>({{ $cats->getCatID($row->id_cp) }})</small>
                                                @else
                                                    <small>({{ $cats->getCatID($row->id_cp) }} >
                                                        {{ $cats->getCatID($row->id_c) }})</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->type_cat == 0)
                                                    Principal
                                                @elseif($row->type_cat == 1)
                                                    Categoria
                                                @else
                                                    SubCategoria
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->status == 0)
                                                    <span class="badge bg-success width-lg"
                                                        onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Activo</span>
                                                @else
                                                    <span class="badge bg-danger width-lg"
                                                        onclick="confirmAlert('{{ Asset($link . 'status/' . $row->id) }}')">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown" style="text-align: right">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
