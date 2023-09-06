@extends('user.layout.main')

@section('title')
    Editar Reserva
@endsection


@section('content')
    <div class="content-page" id="div2">
       
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12 mx-auto  mt-2">
                        @include('user.layout.alert')
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}

                        @include('user.reservas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
