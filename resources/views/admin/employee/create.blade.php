@extends('layouts.app')
  
@section('content')
	
	<section>
		<div class="container">
			<div class="text-end m-2">
				<a href="{{ route('index.employee') }}" class="btn btn-sm btn-primary">Employee List</a>
			</div>
			<div class="card">
				<div class="card-header bg-info">
					<h3 class="text-light" >Create New Employee</h3>
				</div>
				@include('alert')
				<div class="card-body">
					<form action="{{ route('store.employee') }}" method="post">
					@csrf
						<div class="row">
							<div class="col-lg-4">
								<div class="form-floating mb-3">
								  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Name">
								  <label for="floatingInput">Name</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
								  <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingPassword" name="email" placeholder="Email">
								  <label for="floatingPassword">Email</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
								  <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" name="password" placeholder="Password">
								  <label for="floatingInput">Password</label>
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
										@if(Auth::user()->manager == 1)
										<th>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="manager" id="flexCheckChecked">
											  <label class="form-check-label" for="flexCheckChecked">
											    Manager
											  </label>
											</div>
										</th>
										@endif
										<th>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Employee
											  </label>
											</div>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										@if(Auth::user()->manager == 1)
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="c_manager" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Create
											  </label>
											</div>
										</td>
										@endif
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="c_employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Create
											  </label>
											</div>
										</td>
									</tr>
									<tr>
										@if(Auth::user()->manager == 1)
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="e_manager" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Edit
											  </label>
											</div>
										</td>
										@endif
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="e_employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Edit
											  </label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="d_manager" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Delete
											  </label>
											</div>
										</td>
										@if(Auth::user()->manager == 1)
										<td>
											<div class="form-check">
											  <input class="form-check-input" type="checkbox" value="1" name="d_employee" id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
											    Delete
											  </label>
											</div>
										</td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
						<div>
							<button type="submit" class="btn btn-success">Submit</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
	
@endsection