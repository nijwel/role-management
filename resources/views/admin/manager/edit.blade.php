@extends('layouts.app')
  
@section('content')
	
	<section>
		<div class="container">
			<div class="text-end m-2">
				<a href="{{ route('index.manager') }}" class="btn btn-sm btn-primary">Back</a>
			</div>
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="text-light" >Edit Employee</h3>
				</div>
				@include('alert')
				<div class="card-body">
					<form action="{{ route('update.manager',$data->id) }}" method="post">
					@csrf
						<div class="row">
							<div class="col-lg-4">
								<div class="form-floating mb-3">
								  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" value="{{ $data->name }}" placeholder="Name">
								  <label for="floatingInput">Name</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
								  <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{ $data->email }}" placeholder="Email">
								  <label for="floatingInput">Email</label>
								</div>
							</div>
						</div>
						<hr>
						<h4>Employee Access Permission</h4>
						<hr>
						<div class="mt-5 mb-5">
							<table class="table table-bordered" >
								<thead class="table-success">
									<tr>
										<th>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->manager == 1) checked @endif value="1" name="manager" id="flexCheckChecked">
											  <label class="form-check-label" for="flexCheckChecked">
											    Manager
											  </label>
											</div>
										</th>
										<th>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->employee == 1) checked @endif value="1" name="employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Employee
											  </label>
											</div>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->c_manager == 1) checked @endif value="1" name="c_manager" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Create
											  </label>
											</div>
										</td>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->c_employee == 1) checked @endif value="1" name="c_employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Create
											  </label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->e_manager == 1) checked @endif value="1" name="e_manager" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Edit
											  </label>
											</div>
										</td>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->e_employee == 1) checked @endif value="1" name="e_employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Edit
											  </label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->d_manager == 1) checked @endif value="1" name="d_manager" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Delete
											  </label>
											</div>
										</td>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" @if($data->d_employee == 1) checked @endif value="1" name="d_employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Delete
											  </label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div>
							<button type="submit" class="btn btn-success">Update</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
	
@endsection