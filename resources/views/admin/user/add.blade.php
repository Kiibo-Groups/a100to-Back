@extends('admin.layout.main')

@section('title')
    Agregar Negocio
@endsection

@section('icon')
    mdi-comment-plus
@endsection


@section('content')
    <div class="content-page" id="div2">
        @include('user.layout.alert')
        <div class="content">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-lg-12 mx-auto">

                        {!! Form::model($data, ['url' => [$form_url], 'files' => true], ['class' => 'col s12']) !!}

                        @include('admin.user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
