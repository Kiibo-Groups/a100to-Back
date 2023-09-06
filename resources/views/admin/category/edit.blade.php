@extends('admin.layout.main')

@section('title')
    Editar detalles
@endsection

@section('icon')
    mdi-silverware-fork-knife
@endsection


@section('content')
    <div class="content-page" id="div2">
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12 mx-auto  mt-2">
                        <div class="card py-3 m-b-30">
                            <div class="col-md-12" style="text-align: left;">
                                <b style="margin-left:20px">@yield('title')</b>
                            </div>
                            <div class="card-body">
                                {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}

                                @include('admin.category.form')

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
