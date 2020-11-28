<div class="row justify-content-center mt-3">
        <div class="col-md-10">
            <a class="btn btn-info btn-md" onclick="form()"><i class="fa fa-plus"></i> NUEVO</a>
            <table id="comercio_table" class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Razon social</th>
                    <th>Cuit</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var comercio_table = $('#comercio_table').DataTable({
                "paging": false,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    'url':"{{ route('comercio.source', [Auth::user()->id]) }}",
                },
                "columns": [
                    { data: "id", name: 'id' },
                    { data: "razon_social", name: 'razon_social' },
                    { data: "cuil", name: 'cuil' },
                    { data: "actions", name: 'actions' },

                ],
                "columnDefs" : [
                    {
                        "targets":3,
                        "render": function (data) 
                        {
                        d = data.split('%%') //0 = id ; 1 = razon_social ; 2 = cuil
                        cbu_lista_url= "{{route('cbu.lista', ['##'])}}".replace('##', d[0])
                        return "<a class='btn btn-success btn-sm' onclick='form("+JSON.stringify(d)+")'><i class='fa fa-pencil '></i> EDIT</a> <a class='btn btn-primary btn-sm' href='"+cbu_lista_url+"'><i class='fa fa-university'></i> CBUS</a> <a class='btn btn-danger btn-sm' onclick='del("+d[0]+")'><i class='fa fa-trash'></i></a>";
                        }
                    }
                ]
            })
        })
    </script>
@endpush