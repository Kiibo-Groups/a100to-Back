@extends('user.layout.main')

@section('title')
    Agregar Nuevo Conductor
@endsection

@section('icon')
    mdi-calendar
@endsection

@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true], ['class' => 'col s12']) !!}
                        @include('user.delivery.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
