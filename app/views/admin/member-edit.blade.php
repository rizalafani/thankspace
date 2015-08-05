@extends('layout.default')


@section('content') 

	<div class="page-header" id="banner">
		<div class="row text-center">
			<h3>Administration Panel</h3>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-12 col-centered">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-lg-12">
						@include('admin._stats')
					</div>
					
					<div class="col-lg-12">
						<hr>
					</div>
					
					<div class="col-lg-12 text-center">
						<h3>Edit Member {{ $user->fullname }}</h3>
						
						@if( Session::has('messages') )
						<p>
							@foreach( Session::get('messages') as $m )
								<span class="error-alert">
									<i class="fa fa-meh-o"></i> {{ $m }}
								</span>
								<br>
							@endforeach
						</p>
						@endif
						
						<br>
						
						{{ Form::open([ 'route' => [ 'user.member_edit.put', $user->id ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}
							<fieldset>
								<div class="form-group">                    
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::text('firstname', $user->firstname, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan nama depan Anda', 'placeholder' => 'Nama Depan', 'required' => true ]) }}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::text('lastname', $user->lastname, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan nama belakang Anda', 'placeholder' => 'Nama Belakang', 'required' => true ]) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
											{{ Form::email('email', $user->email, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukan email yang valid', 'placeholder' => 'Email', 'required' => true ]) }}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
											{{ Form::number('phone', $user->phone, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan nomor yang valid', 'placeholder' => 'Nomor telepon', 'required' => true ]) }}
										</div>
									</div>
								</div>
								<div class="form-group">                    
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::text('address', $user->address, [ 'class' => 'form-control floating-label', 'data-hint' => 'Masukkan Alamat', 'placeholder' => 'Alamat', 'required' => true ]) }}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{ Form::select('city_id', $list_cities, $user->city_id, [ 'class' => 'form-control', 'required' => true, 'style' => 'margin-top: 5px;' ]) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{
												Form::select('gender', [
													'm'	=> 'Male',
													'f'	=> 'Female',
												], $user->gender, [ 'class' => 'form-control' ])
											}}
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
											{{
												Form::select('type', [
													'admin'		=> 'Admin',
													'user'		=> 'Customer',
													'driver'	=> 'Delivery Team',
												], $user->type, [ 'class' => 'form-control' ])
											}}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12 text-center">
										<button type="submit" class="btn btn-primary"><i class="mdi-social-person-add"></i> Edit</button>
										<a href="{{ route('user.member_list') }}" class="btn btn-warning">Batalkan</a>
									</div>
								</div>
							</fieldset>
							{{ Form::hidden('via', 'admin') }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop