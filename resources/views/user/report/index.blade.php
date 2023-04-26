@extends('user.layout.main')

@section('title')
    Reportes
@endsection

@section('icon')
    mdi-send
@endsection


@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row ">
                    <div class="col-lg-11 mx-auto  mt-2">
                        @include('user.layout.alert')
                        <div class="card py-3 m-b-30">
                            <div class="card-body">
                                {!! Form::open(['url' => [$form_url], 'target' => '_blank'], ['class' => 'col s12']) !!}

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="store_id" value="{{ Auth::user()->id }}" hidden>
                                    </div>
                                </div>



                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="form-label">Apartir de la fecha</label>
                                        <input type="text" name="from"  class="form-control datepicker"
                                            required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label">Hasta la fecha</label>
                                        <input type="text" name="to"  class="form-control datepicker " required>
                                    </div>

                           
                                </div>

                                <button type="submit" class="btn btn-success btn-cta">Obtener informe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

<script>

</script>
