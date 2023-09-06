@extends('admin.layout.main')

@section('title')
    Calificaciones del Negocio
@endsection

@section('icon')
    mdi-chart-line
@endsection


@section('content')

    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-lg-12 mx-auto mt-2">
                        @include('user.layout.alert')
                        <div class="col-md-12" style="text-align: left;">
                            <b style="margin-left:25px">@yield('title')</b>
                        </div>
                            <div class="col-lg-6" style="float: left">
                             
                                <div class="card-body">
                                    @if (count($rate_data) > 0)
                                        @foreach ($rate_data as $rate)
                                            <div style="background:#fff;"
                                                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                                <div class="col p-4 d-flex flex-column position-static">
                                                    <strong class="d-inline-block mb-2 text-primary">Order ID
                                                        #{{ $rate->id }}</strong>
                                                    <h3 class="mb-0">
                                                        @if ($rate->comment)
                                                            {{ $rate->comment }}
                                                        @else
                                                            No realizo comentarios
                                                        @endif
                                                    </h3>
                                                    <div class="mb-1 text-muted">{{ $rate->created_at }}</div>
                                                    <p class="card-text mb-auto">Usuario: {{ $rate->user }}</p>
                                                    <p class="card-text mb-auto">
                                                        Llego bien el producto: @if ($rate->status_prod == 1)
                                                            SI
                                                        @else
                                                            NO
                                                        @endif
                                                    </p>
                                                    <p class="card-text mb-auto">
                                                        @if ($rate->star == 1)
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        @elseif($rate->star == 2)
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        @elseif($rate->star == 3)
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        @elseif($rate->star == 4)
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star"></span>
                                                        @elseif($rate->star == 5)
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                            <span class="fa fa-star" style="color: orange"></span>
                                                        @else
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        @endif


                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div style="background:#fff;"
                                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                            <div class="col p-4 d-flex flex-column position-static">
                                                <strong class="d-inline-block mb-2 text-primary">Upps!!</strong>
                                                <h3 class="mb-0">No existen Comentarios para este negocio</h3>
                                            </div>
                                        </div>
                                        <a href="../" class="btn btn-success width-xl waves-effect waves-light btn-cta">Volver</a>
                                        
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6" style="float: right">
                                <div class="card-body">
                                    <div style="background:#fff;"
                                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                        <div class="col p-4 d-flex flex-column position-static">
                                            <strong class="d-inline-block mb-2 text-primary">ID
                                                #{{ $data->id }}</strong>
                                            <h3 class="mb-0">{{ $data->name }}</h3>
                                            <div class="mb-1 text-muted">Tel: {{ $data->phone }}</div>
                                            <p class="card-text mb-auto">email: {{ $data->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
