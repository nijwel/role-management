@extends('layouts.app')
  
@section('content')
	
	<section>
		<div class="container">
			<div class="text-end m-2">
				@if(Auth::user()->c_employee == 1)
				<a href="{{ route('create.employee') }}" class="btn btn-sm btn-primary">Create Employee</a>
				@endif
			</div>
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="text-light" >Employee List</h3>
				</div>
				@include('alert')
				<div class="card-body">
					<table class="table table-bordered table-sm">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">User Roll</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($employees as $key => $employee)
					    <tr>
					      <th scope="row">{{ ++$key }}</th>
					      <td>{{ $employee->name }}</td>
					      <td>{{ $employee->email }}</td>
					      <td>
					      	@if($employee->manager == 1)
					      		<span class="badge bg-success">Manager</span>
					      	@endif
					      	@if($employee->c_manager == 1)
					      		<span class="badge bg-primary">Manager Create</span>
					      	@endif
					      	@if($employee->e_manager == 1)
					      		<span class="badge bg-info">Manager Edit</span>
					      	@endif
					      	@if($employee->d_manager == 1)
					      		<span class="badge bg-danger">Manager Delete</span>
					      	@endif
					      	@if($employee->employee == 1)
					      		<span class="badge bg-success">Employee</span>
					      	@endif
					      	@if($employee->c_employee == 1)
					      		<span class="badge bg-primary">Employee Create</span>
					      	@endif
					      	@if($employee->e_employee == 1)
					      		<span class="badge bg-info">Employee Edit</span>
					      	@endif
					      	@if($employee->d_employee == 1)
					      		<span class="badge bg-danger">Employee Delete</span>
					      	@endif
					      </td>
					      <td>
					      	<form action="{{ route('edit.employee',$employee->id) }}" style="display: inline-block;" method="get">
					      	    @csrf
					      	    <button class="btn btn-sm btn-info" @if(Auth::user()->e_employee == 0) disabled @endif type="submit">Edit</button>
					      	</form>

					      	<form action="{{ route('delete.employee',$employee->id) }}" style="display: inline-block;" method="get">
					      	    @csrf
					      	    <button class="btn btn-sm btn-danger" @if(Auth::user()->d_employee == 0) disabled @endif type="submit">Delete</button>
					      	</form>

					      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection