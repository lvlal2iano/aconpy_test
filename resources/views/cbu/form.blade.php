<div class="row justify-content-left mt-3">
        <div class="col-md-12">
            <input type="hidden" id="cbu_id" value="0">
            <div class="form-group row">
                <label for="alias" class="col-4 col-form-label">Alias</label> 
                <div class="col-8">
                    <input id="alias" name="alias" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="cbu" class="col-4 col-form-label">CBU</label> 
                <div class="col-8">
                    <input id="cbu" name="cbu" type="text" class="form-control" required="required">
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