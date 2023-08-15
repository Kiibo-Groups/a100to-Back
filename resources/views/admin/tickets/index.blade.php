@extends('admin.layout.main')

@section('title')
Administrar tickets
@endsection

@section('icon')
    mdi-calendar
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
                               {{-- <divclass="col-md-6"style="text-align:right;"><ahref="Asset($link.'add')}}"
                                    class="btn btn-warning rounded-pill waves-effect waves-light" style=" margin-right:20px" >Agregar
                                    nuevo</a>&nbsp;&nbsp;&nbsp;
                                </div>--}}

                            </div>


                            <div class="card-body">
                                <table class="table table-hover " >
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Negocio</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>Status</th>
                                            <th >Option</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td class="col-md-4">
                                                    @if (!$row->id_negocio)
                                                  
                                                    @else
                                                    {{ $row->negocio->name }}
                                                    @endif
                                                    
                                                    </td>
                                                <td class="col-md-3">{{ $row->usuario->name }}</td>
                                                <td class="col-md-2"  style="text-align: center">{{ date('d-M-Y', strtotime($row->created_at)) }}</td>
                                                <td class="col-md-1"  style="text-align: center">
                                                    @if ($row->status == 1)
                                                        <button type="button"
                                                            class="btn btn-warning width-xs waves-effect waves-light"
                                                            >Pendiente</button>
                                                    @endif        
                                                    @if($row->status == 2)
                                                        <button type="button"
                                                            class="btn btn-success width-xs waves-effect waves-light"
                                                            >Aceptada</button>
                                                                                                                                                    
                                                    @endif
                                                    @if($row->status == 3)
                                                    <button type="button"
                                                        class="btn btn-danger width-xs waves-effect waves-light"
                                                        >Rechazada</button>
                                                                                                                                                
                                                @endif
                                            </td>
                                                </td>
                                                <td class="col-md-2"style="text-align: center">

                                                    <a href="{{ url(env('admin') . '/tickets/file/' . $row->id) }}"
                                                        class="btn btn-warning waves-effect waves-light btn m-b-15 ml-2 mr-2 btn-md"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Descargar Imagen"><i
                                                        class="mdi mdi-image"></i></a>

                                                    <a href="{{ Asset($link . $row->id . '/edit') }}"
                                                        class="btn btn-success waves-effect waves-light btn m-b-15 ml-2 mr-2 btn-md"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Editar"><i
                                                            class="mdi mdi-border-color"></i></a>    

                                                  {{--  <button type="button"
                                                        class="btn m-b-15 ml-2 mr-2 btn-md  btn btn-danger waves-effect waves-light"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Eliminar"
                                                        onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')"><i
                                                        class="mdi mdi-delete-forever"></i></button>--}}
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
