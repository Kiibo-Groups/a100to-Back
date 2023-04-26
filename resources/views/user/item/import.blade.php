@extends('user.layout.main')

@section('title')
    Subir archivo de Excel
@endsection

@section('content')
    <div class="content-page" id="div2">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-lg-11 mx-auto  mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">
                            <div class="card-body">
                                {!! Form::open(['url' => [Asset('import')], 'files' => true], ['class' => 'col s12']) !!}
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="import_lbl">
                                            Seleccionel Archivo<br />
                                            <small>(Recuerde ingresar los mismos campos en orden correspondiente)</small>
                                        </label>
                                        <input type="file" id="import_lbl" class="form-control" name="file"
                                            required="required">
                                    </div>
                                </div>
                               
                                <button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Subir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
