@extends('admin.layout.main')

@section('title')
    Administrar Causas sociales
@endsection

@section('icon')
    mdi-silverware-fork-knife
@endsection


@section('content')
<div class="content-page" id="div2">
   
    <div class="content">
        <div class="container-fluid">

            <div class="row ">
                <div class="col-lg-11 mx-auto mt-2">
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
                                      
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                       
                                        <th style="text-align: center">Opciones</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="col-md-3">
                                                {{ $row->nombre }}
                                            
                                            </td>
                                            <td>
                                                {{ $row->descripcion }}
                                            
                                            </td>
                                        
                                          
                                            <td class="col-md-2" style="text-align: center">
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
