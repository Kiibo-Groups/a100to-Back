@extends('user.layout.main')

@section('title')
    Actualiza tu información
@endsection

@section('icon')
    mdi-settings
@endsection






@section('content')


    <div class="content-page" id="div2">
        @include('user.layout.alert')
        <div class="content" >
            <!-- Start Content-->
            <div  class="container-fluid">

                <div class="row ">
                    <div class="col-12">




                                          
            

                        {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'POST'], ['class' => 'col s12']) !!}

                        @include('admin.user.form', ['type' => 'user'])

                        </form>

                                             
                                            
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
