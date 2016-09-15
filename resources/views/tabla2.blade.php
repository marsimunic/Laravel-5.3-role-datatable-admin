@extends('admin')
@section('content')
<form id="search-form" class="form-inline" role="form" method="POST">
<div class="form-group">
<label for="name">Name</label>
<input id="name" class="form-control" type="text" placeholder="search name" name="name">
</div>
<div class="form-group">
<label for="email">Email</label>
<input id="email" class="form-control" type="text" placeholder="search email" name="email">
</div>
<button class="btn btn-primary" type="submit">Buscar</button>
</form>
<table class="table table-bordered" id="table-sms">
    <thead>
        <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
@stop
@push('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
 $(function() {
    var oTable = $('#table-sms').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('tabla2.data') !!}',
            data: function (d) {
                d.name = $('input[name=name]').val();
                d.email = $('input[name=email]').val();
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
});
</script>
@endpush
