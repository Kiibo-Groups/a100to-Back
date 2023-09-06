@extends('admin.layout.main')

@section('title')
    Editar Comercio
@endsection

@section('icon')
    mdi-comment-plus
@endsection


@section('content')
    <div class="content-page" id="div2">
        
        <div class="content">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-lg-12 mx-auto">
                        @include('user.layout.alert')
                        <div class=" py-3 m-b-30">
                      
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}

                        @include('admin.user.form')

                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
