@extends('admin.layout.main')

@section('title')
    Código QR
@endsection

@section('icon')
    mdi-chart-line
@endsection


@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mx-auto  mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">
                            <div class="col-md-6" style="text-align: left;">
                                <b style="margin-left:10px">@yield('title')</b>
                            </div>
                            <div class="card-body">
                                <div style="background:#fff;"
                                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0">{{ $data->name }}</h3>
                                        <div class="mb-1 text-muted">Tel: {{ $data->phone }}</div>
                                        <p class="card-text mb-auto">email: {{ $data->email }}</p>
                                    </div>

                                    <div class="col p-4">
                                        <a download="qr_code_{{ $data->name }}"
                                            href="data:image/png;base64,{{ $data->qr_code }}" target="_blank">
                                            <img src="data:image/png;base64,{{ $data->qr_code }}">
                                        </a>
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
