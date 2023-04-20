@extends('admin.layout.main')

@section('title')
    Editar oferta
@endsection


@section('content')
    <div class="content-page" id="div2">
        @include('user.layout.alert')
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-10 mx-auto  mt-2">
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}

                        @include('admin.offer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
