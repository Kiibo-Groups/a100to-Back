@extends('admin.layout.main')

@section('title')
    Editar Tarjeta
@endsection 
@section('content')
    <div class="content-page">       
        <div class="content">
            @include('user.layout.alert')
            {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'],['class' => 'container-fluid']) !!}
                <div class="row">
                    @include('admin.giftcards.form')
                </div>
            </form>
        </div>
    </div>
@endsection
