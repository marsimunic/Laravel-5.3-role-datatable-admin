@extends('admin')
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Administración de Roles</h2>
	        </div>
	        <div class="pull-right">
	        @if(Entrust::can('role-create'))
	            	<a class="btn btn-success" href="{{ route('roles.create') }}">Crear nuevo Role</a>
	         @endif
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
			@if(Entrust::can('role-edit'))
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
			@endif
			@if(Entrust::can('role-delete'))
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endif
		</td>
	</tr>
	@endforeach
	</table>
	{!! $roles->render() !!}
@endsection