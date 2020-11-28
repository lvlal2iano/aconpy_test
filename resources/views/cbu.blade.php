@extends('layouts.app')

@push('styles')
    <style>
        .loader{
            position : absolute;
            top : 0;
            bottom : 0;
            left : 0;
            right : 0;
            background-color : rgba(0,0,0,0.1);
            display:none;
        }
        .loader > div{
            position : absolute;
            left : 46%;
            top : 45%;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-dark btn-sm mr-3" href="{{route('home')}}"><i class="fa fa-arrow-left"></i></a>{{ 'Razon social: ' . $comercio->razon_social . ' - CUIL:' . $comercio->cuil }}</div>
                <div class="card-body">
                    @include('cbu.datatable')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="form_wrap">
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header" id="form_title"></div>
                <div class="card-body position-relative">
                    @include('cbu.form')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="loader" id="loader">
                        <div class="spinner-border text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        const form_wrap = $('#form_wrap')
        const form_title = $('#form_title')
        const alias = $('#alias')
        const cbu = $('#cbu')
        const cbu_id_input = $('#cbu_id')
        const loader = $('#loader')

        form_wrap.slideUp(300)

        const form = (arr = false) => {
            if(form_wrap.css('display') == 'none'){
                form_wrap.slideDown(300)
                $('html, body').animate({
                    scrollTop:  $(document).height()
                }, 600);
            }

            if(!arr){
                form_title.html('Nuevo CBU');
                cbu_id_input.val(0)
                alias.val('')
                cbu.val('')
            }else{
                form_title.html('Editar CBU');
                cbu_id_input.val(arr[0])
                alias.val(arr[1])
                cbu.val(arr[2])
            }
        }

        const send_form = () => {
            id = cbu_id_input.val();
            let url = ((id == 0)?"{{route('cbu.store')}}":"{{route('cbu.update', ['##'])}}".replace('##', id));
            let data = {_token : "{{csrf_token()}}", alias : alias.val(), cbu : cbu.val(), cbu_id : 0, comercio_id : {{$comercio->id}} };

            if(id != 0){
                data['_method'] = 'PATCH';
            }

            $.ajax({
                url : url,
                type : 'POST',
                data : data,
                beforeSend : function(){
                    loader.css({'display':'block'})
                },
                success : function(data){
                    if(data.status == 'success'){
                        loader.css({'display':'none'})
                        form_wrap.slideUp(300)
                        $('#cbu_table').DataTable().ajax.reload();
                    }else{
                        alert(data.msg);
                    }
                }
            })
        }

        const del = (id) => {
            if(confirm('Esta accion no tiene retroceso, ¿la confirma?')){
                $.ajax({
                    url : "{{route('cbu.destroy', ['##'])}}".replace('##', id),
                    type : 'POST',
                    data : {_token : "{{csrf_token()}}", _method : "DELETE"},
                    success : function(data){
                        if(data.status == 'success'){
                            $('#cbu_table').DataTable().ajax.reload();
                        }
                    }
                })
            }
        }
    </script>
@endpush
