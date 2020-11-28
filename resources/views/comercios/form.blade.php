<div class="row justify-content-left mt-3">
        <div class="col-md-12">
            <input type="hidden" id="comercio_id" value="0">
            <div class="form-group row">
                <label for="razon_social" class="col-4 col-form-label">Razon Social</label> 
                <div class="col-8">
                    <input id="razon_social" name="razon_social" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="cuil" class="col-4 col-form-label">CUIL</label> 
                <div class="col-8">
                    <input id="cuil" name="cuil" type="text" class="form-control" required="required">
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <a id="send_comercio" onclick="send_form()" class="btn btn-success">OK!</a>
                    <a id="cerrar" onclick="$('#form_wrap').slideUp(400)" class="btn btn-primary">CERRAR</a>
                </div>
            </div>
        </div>
</div>