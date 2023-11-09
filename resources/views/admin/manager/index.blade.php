@extends('layouts.app')
  
@section('content')
	
	<section>
		<div class="container">
			<div class="text-end m-2">
				@if(Auth::user()->c_manager == 1)
				<a href="{{ route('create.manager') }}" class="btn btn-sm btn-primary">Create manager</a>
				@endif
			</div>
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="text-light" >manager List</h3>
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
					  	@foreach($managers as $key => $manager)
					    <tr>
					      <th scope="row">{{ ++$key }}</th>
					      <td>{{ $manager->name }}</td>
					      <td>{{ $manager->email }}</td>
					      <td>
					      	@if($manager->manager == 1)
					      		<span class="badge bg-success">Manager</span>
					      	@endif
					      	@if($manager->c_manager == 1)
					      		<span class="badge bg-primary">Manager Create</span>
					      	@endif
					      	@if($manager->e_manager == 1)
					      		<span class="badge bg-info">Manager Edit</span>
					      	@endif
					      	@if($manager->d_manager == 1)
					      		<span class="badge bg-danger">Manager Delete</span>
					      	@endif
					      	@if($manager->employee == 1)
					      		<span class="badge bg-success">employee</span>
					      	@endif
					      	@if($manager->c_employee == 1)
					      		<span class="badge bg-primary">employee Create</span>
					      	@endif
					      	@if($manager->e_employee == 1)
					      		<span class="badge bg-info">employee Edit</span>
					      	@endif
					      	@if($manager->d_employee == 1)
					      		<span class="badge bg-danger">employee Delete</span>
					      	@endif
					      </td>
					      <td>
					      	<form action="{{ route('edit.manager',$manager->id) }}" style="display: inline-block;" method="get">
					      	    @csrf
					      	    <button class="btn btn-sm btn-info" @if(Auth::user()->e_manager == 0) disabled @endif  type="submit">Edit</button>
					      	</form>

					      	<form action="{{ route('delete.manager',$manager->id) }}" style="display: inline-block;" method="get">
					      	    @csrf
					      	    <button class="btn btn-sm btn-danger" @if(Auth::user()->d_manager == 0) disabled @endif type="submit">Delete</button>
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