<div>


    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <h4 style="color:#000">Sobre nosotros</h4>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail6">Description</label>
                        <textarea class="summernote" name="about_us">{!! $data->about_us !!}</textarea>


                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail6">Image</label>
                        <input type="file" name="about_img" class="form-control">

                        @if ($data->about_img)
                            <br><img src="{{ Asset('upload/page/' . $data->about_img) }}" height="60">

                            <button type="button" class="btn btn-danger width-xs waves-effect waves-light"
                                onclick="confirmAlert('{{ Asset($form_url . '/add?remove=about_img') }}')">Eliminar</button>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        <h4>Cómo funciona</h4>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail6">Description</label>
                        <textarea class="summernote" name="how">{!! $data->how !!}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail6">Image</label>
                        <input type="file" name="how_img" class="form-control"
                            @if (!$data->id) required="required" @endif>

                        @if ($data->how_img)
                            <br><img src="{{ Asset('upload/page/' . $data->how_img) }}" height="60">


                            <button type="button" class="btn btn-danger width-xs waves-effect waves-light"
                                onclick="confirmAlert('{{ Asset($form_url . '/add?remove=how_img') }}')">Eliminar</button>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        <h4>Preguntas frecuentes</h4>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail6">Description</label>
                        <textarea class="summernote" name="faq">{!! $data->faq !!}</textarea>
                    </div>
                </div>

            </div>
        </div>

        <h4>Contacta con nosotros</h4>
        <div class="card py-3 m-b-30">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail6">Description</label>
                        <textarea class="summernote" name="contact_us">{!! $data->contact_us !!}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<button type="submit" class="btn btn-success width-xl waves-effect waves-light btn-cta">Guardar
    Cambios</button><br><br>
