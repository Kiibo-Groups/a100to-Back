@extends('admin.layout.main')

@section('title')
    Agregar Tarjeta
@endsection

@section('content')
    <div class="content-page">       
        <div class="content">
            @include('user.layout.alert')
            {!! Form::model($data, ['url' => [$form_url], 'files' => true],['class' => 'container-fluid']) !!}
                <div class="row">
                        @include('admin.giftcards.form')
                    
                </div>
            </form>
        </div>
    </div>
@endsection
