@extends('user.layout.main')

@section('title')
    Bienvenido(a) ! {{ Auth::user()->name }}
@endsection

@section('icon')
    mdi-home
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                @include('user.dashboard.overview')

                @include('user.dashboard.chart')


            </div>
        </div>
    </div>
@endsection



