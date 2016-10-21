@extends('layouts.app')

@section('content')
<div id="orders">
	<div class="container">
		<div class="columns">
			<div class="column"></div>
			<div class="column is-two-thirds">
				<div class="box">
					<h1 class="title">All Menu Items
						<a href="/menu/create" style="font-weight: 500;" class="button is-light is-pulled-right">
							Add New Item
							<span class="icon"><i style="font-size: 12px;" class="fa fa-plus"></i></span>
						</a>
					</h1> 
					<div class="box">
						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Price</th>
									<th>Actions</th>
									<th></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Price</th>
									<th>Actions</th>
									<th></th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($items as $item)
								<tr>
									<td>{{ $item->name }}</td>
									<td>{{ $item->description }}</td>
									<td><b>${{ $item->price }}</b></td>
									<td>
										<p class="control"> {{-- has-addons --}}
											<a href="/menu/{{$item->id}}/edit" class="button">
												<span class="icon is-small">
													<i style="font-size: 12px;" class="fa fa-edit"></i>
												</span>
												<span>Edit</span>
											</a>
											{{-- <a class="button">
												<i style="font-size: 12px;" class="fa fa-times"></i>
											</a> --}}
										</p>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="column"></div>
		</div>
	</div>
</div>
@stop
@section('scripts')

@stop