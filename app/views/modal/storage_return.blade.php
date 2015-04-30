@extends('layout.modal')

@section('body')
	
	{{ Form::open(['method' => 'POST', 'url' => route('user.storageReturnProcess', $storage['id']), 'class' => 'form-horizontal']) }}
		{{ Form::hidden('order_id', $storage['id']) }}

		<h4>1. Schedule</h4>
		<div class="form-group">
			<label class="col-md-3">Return Date</label>
			<div class="col-md-9">
				{{ Form::text('return_date', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Return Time</label>
			<div class="col-md-9">
				{{ Form::text('return_time', null, ['class' => 'form-control']) }}
			</div>
		</div>

		<hr />

		<h4>2. Stuffs</h4>

		<?php $i = 1 ?>
		@foreach( $storage->order_stuff as $stuff )
		@if( $stuff->description )
			<div class="row">
				<div class="col-md-10">
					<div class="well">
						<h4 style="margin: 3px 0px;">
							{{ ucfirst($stuff->type) }} {{ $i++ }} : {{ $stuff->description }}
						</h4>
					</div>
				</div>
				<div class="col-md-2">
					{{ Form::checkbox('stuffs[]', $stuff['id'], false, ['class' => 'form-control']) }}
				</div>
			</div>
		@endif
		@endforeach

		<div class="form-group text-center">
			<button type="submit" class="btn btn-primary">
				Kembalikan
			</button>
		</div>

	{{ Form::close() }}
	
@stop