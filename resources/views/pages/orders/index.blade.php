@extends('layouts.app')

@section('content')
<div id="orders">
	<div class="container">
		<div class="columns">
			<div class="column is-two-thirds">
				<div class="box">
					<h1 class="title">All Orders
						<a href="/orders/create" style="font-weight: 500;" class="button is-light is-pulled-right">
							Create Order 
							<span class="icon"><i style="font-size: 12px;" class="fa fa-plus"></i></span>
						</a>
					</h1> 
					<div class="box">
						<table class="table">
							<thead>
								<tr>
									<th>Customer Name</th>
									<th>Type</th>
									<th>Items</th>
									<th>Amount</th>
									<th>Date</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Customer Name</th>
									<th>Type</th>
									<th>Items</th>
									<th>Amount</th>
									<th>Date</th>
									<th>&nbsp;</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($orders as $order)
								<tr>
									<td>
										@foreach($order->customer as $customer)
										{{ $customer->name }}
										@endforeach
									</td>
									<td>
										<span 
										class="tag @if(str_is($order->type, 'takeaway')) is-warning @else is-danger @endif">
										{{ $order->type }}
									</span>
								</td>
								<td class="is-icon">
									<p>
										@foreach($order->items as $item)
										<span class="tag">
											{{$item->name }}
										</span>
										@endforeach
									</p>
								</td>
								<td class="is-icon">
									<p><b>${{ $order->amount }}</b></p>
								</td>
								<td class="is-icon">
									<p>{{ $order->created_at->toFormattedDateString() }}</p>
								</td>
								<td class="is-icon">
									{{-- <a href="#" class="button">View</a> --}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="column is-one-third">
			<div class="box">
				<p class="title">Statistics</p>
				<div class="box">
					<h3 class="title is-5">
						Today's Takings
						<span class="is-pulled-right"><b>${{ $todayTotal }}</b></span>
					</3>
				</div>
				<div class="box">
					<canvas id="myChart" width="400" height="400"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop
@section('scripts')
<script>
	var ctx = document.getElementById('myChart');
	var data = {
		labels: [
		"Delivery",
		"Takeaway",
		],
		datasets: [
		{
			data: [{{$totalDelivery}}, {{$totalTakeaway}}],
			backgroundColor: [
			"#ff3860",
			"#ffdd57",
			],
			hoverBackgroundColor: [
			"#ff3860",
			"#ffdd57",
			]
		}]
	};
	var myPieChart = new Chart(ctx,{
		type: 'doughnut',
		data: data,
		options: {
			elements: {
				points: {
					borderWidth: 1,
					borderColor: 'rgb(0, 0, 0)'
				}
			}
		}
	});
</script>
@stop