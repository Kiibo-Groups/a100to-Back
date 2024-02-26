@extends('user.layout.main')

@section('title')
    Agregar Nuevo
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
                    <div class="col-lg-12 mx-auto  mt-2">

                        <div class="card py-3 m-b-30">
                            <div class="col-md-12" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>
                            <div class="card-body">
                                {!! Form::model($data, ['url' => [$form_url], 'files' => true], ['class' => 'col s12']) !!}
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="form-row">
                                            <input type="hidden" name="store_id" value="{{ $user }}" />

                                            <div class="form-group col-md-6">
                                                <label for="fecha">Fecha</label>
                                                {!! Form::date('fecha', null, ['id' => 'fecha', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
