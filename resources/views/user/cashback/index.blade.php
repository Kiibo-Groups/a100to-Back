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
                <div class="row">
                    <div class="col-md-12">
                        @include('user.layout.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="card pt-2">
                        <div class="row">
                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:20px">Días bloqueados</b>
                            </div>
                            <div class="col-md-6" style="text-align: right;"><a style=" margin-right:20px"
                                    href="{{ asset($link . 'blocked_days') }}"
                                    class="btn btn-warning rounded-pill waves-effect waves-light width-md">
                                    Agregar</a>&nbsp;&nbsp;&nbsp;
                            </div>

                        </div>
                        <div class="card_body">
                            <div class="d-flex flex-wrap mt-4">
                                @foreach ($blocked_days as $day)
                                    <div class="mb-3 mx-2" style="border: solid 2px; width: 180px; padding: 10px;">
                                        <h4>{{ Carbon\Carbon::parse($day->fecha)->format('d-m-Y') }}
                                            <a href="javascript:void()" class="btn btn-danger"
                                                onclick="deleteConfirm('{{ Asset($link . 'delete/' . $day->id) }}')">
                                                <i class="mdi mdi-delete-forever"></i>
                                            </a>
                                        </h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                        <div class="card py-3 m-b-30">

                            <div class="row">
                                <div class="col-md-6" style="text-align: left;">
                                    <b style="margin-left:20px">@yield('title')</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;"><a style=" margin-right:20px"
                                        href="{{ Asset($link . 'add') }}"
                                        class="btn btn-warning rounded-pill waves-effect waves-light width-md">
                                        Agregar Nuevo</a>&nbsp;
                                    <button type="button"
                                        class="btn btn-success rounded-pill width-md waves-effect waves-light mr-2"
                                        onclick="handleImport()">Importar Excel</button>
                                </div>

                            </div>


                            <div class="card-body">
                                <div class="overflow-scroll">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Días</th>
                                            @foreach ($hours as $hour)
                                                <th>{{ $hour->name }}</th>
                                            @endforeach
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $dia => $horas)
                                            <tr>
                                                <td>{{ $dia }}</td>
                                                @foreach ($horas as $hora)
                                                    <td>
                                                        {{-- <button type="button"
                                                            onclick="confirmAlert('{{ Asset($link . 'status/' . $hora['id']) }}')"
                                                            
                                                            >
                                                            {{ $hora['per'] . ' %' }}
                                                        </button> --}}
                                                        
                                                        <a href="{{ Asset($link . $hora['id'] .'/edit') }}" 
                                                        title="{{ is_null($hora['status']) ? 'No definido' : ($hora['status'] == 0 ? 'Activo' : 'inactivo') }}"
                                                        class="badge {{ is_null($hora['status']) ? 'badge-soft-dark' : ($hora['status'] == 0 ? 'badge-soft-success' : 'badge-soft-danger') }}">
                                                            {{ $hora['per'] . ' %' }}
                                                        </a>
                                                    </td>
                                                @endforeach
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

        <form action="{{ route('cashback.import') }}" method="POST" id="import" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import_file" class="d-none" onchange="submitImport()">
        </form>
    @endsection
    @section('js')
        <script>
            function handleImport() {
                $('input[name=import_file]').click();
            }

            // Importar porcentajes de horas
            function submitImport() {
                $('#import').submit();
            }
        </script>
    @endsection
