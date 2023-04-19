@extends('admin.layout.main')

@section('title')
    Página de la app
@endsection

@section('icon')
    mdi-map-marker
@endsection


@section('content')
    <div class="content-page" id="div2">
        @include('user.layout.alert')
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-10 mx-auto  mt-2">

                        {!! Form::model($data, ['url' => [$form_url], 'files' => true], ['class' => 'col s12']) !!}

                        @include('admin.page.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ Asset('assets/vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ Asset('assets/js/summernote-data.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ Asset('assets/vendor/summernote/summernote-bs4.css') }}" />
@endsection
