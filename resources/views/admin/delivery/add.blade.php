@extends('admin.layout.main')

@section('title')
    Agregar Repartidor
@endsection

@section('icon')
    mdi-calendar
@endsection

@section('content')
    <div class="content-page" id="div2">
        @include('user.layout.alert')
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-10 mx-auto  mt-2">
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true], ['class' => 'col s12']) !!}
                        <div class="card py-3 m-b-30">
                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>
                            <div class="card-body">
                                @include('admin.delivery.form')
                            </div>
                        </div>

                        @include('admin.delivery.comi_staff')

                        <button type="submit" class="btn btn-success btn-cta">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
