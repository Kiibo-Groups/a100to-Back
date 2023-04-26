@extends('user.layout.main')

@section('title')
    Bienvenido(a) ! {{ Auth::user()->name }}
@endsection

@section('icon')
    mdi-home
@endsection


@section('content')
    <div class="content-page" id="div2">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-11 mx-auto mt-2">


                        @include('user.dashboard.overview')

                        @include('user.dashboard.chart')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
