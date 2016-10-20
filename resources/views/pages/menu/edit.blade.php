@extends('layouts.app')

@section('content')
<div id="orders">
	<div class="container">
		<div class="columns">
			<div class="column is-half is-offset-one-quarter">
				<div class="box">
					<h1 class="title">Edit <b>{{ $item->name }}</b></h1>
					<div class="box">
						@if(Session::has('success'))
							<notification type="success">{{ Session::get('success') }}</notification>
						@endif
						<form method="POST" action="/menu/{{$item->id}}/edit">
							{{csrf_field()}}
							@include('pages.menu.partials.form', $item)
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop