<div class="row justify-content-center mt-3">
        <div class="col-md-10">
            <a class="btn btn-info btn-md" onclick="form()"><i class="fa fa-plus"></i> NUEVO</a>
            <table id="cbu_table" class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Alias</th>
                    <th>CBU</th>
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
            var cbu_table = $('#cbu_table').DataTable({
                "paging": false,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    'url':"{{ route('cbu.source', [$comercio->id]) }}",
                },
                "columns": [
                    { data: "id", name: 'id' },
                    { data: "alias", name: 'alias' },
                    { data: "cbu", name: 'cbu' },
                    { data: "actions", name: 'actions' },

                ],
                "columnDefs" : [
                    {
                        "targets":3,
                        "render": function (data) 
                        {
                        d = data.split('%%') //0 = id ; 1 = alias ; 2 = cbu
                        return "<a class='btn btn-success btn-sm' onclick='form("+JSON.stringify(d)+")'><i class='fa fa-pencil '></i> EDIT</a> <a class='btn btn-danger btn-sm' onclick='del("+d[0]+")'><i class='fa fa-trash'></i></a>";
                        }
                    }
                ]
            })
        })
    </script>
@endpush