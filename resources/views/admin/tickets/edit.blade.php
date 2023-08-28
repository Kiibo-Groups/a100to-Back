@extends('admin.layout.main')

@section('title')
    Editar Tickets
@endsection


@section('content')
    <div class="content-page" id="div2">

        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-11 mx-auto  mt-2">
                        @include('user.layout.alert')
                        {!! Form::model($data, ['url' => [$form_url], 'files' => true, 'method' => 'PATCH'], ['class' => 'col s12']) !!}

                        @include('admin.tickets.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@parent
<script src="{{ Asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#id_negocio").change(function() {


            $("#reservas").show();

            var negocio_id = $(this).val();
            var user_id = $('#id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: '{{ route('select_reserva') }}',
                data: {
                    'user_id': user_id,
                    'negocio_id': negocio_id
                },
                success: function(data) {

                    var res_select = ''
                    for (var i = 0; i < data.length; i++)
                        res_select += '<option value="' + data[i].id + '">' + data[i]
                        .valor + '</option>';
                    $("#id_reserva").html(res_select);

                },
            });


        });

    });
</script>
