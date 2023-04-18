@extends('user.layout.main')

@section('title')
    Editar Conductor
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
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}
                        @include('user.delivery.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
