@extends('layouts.app')

@section('content')
<div id="orders">
	<div class="container">
		<div class="columns">
			<div class="column is-two-thirds">
				<div class="box">
					<div>
						<p class="title is-pulled-left">
							Orders
						</p>
						<a href="/orders/create" class="button is-primary is-pulled-right">Create Order</a>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>Customer Name</th>
								<th>Type</th>
								<th>Items</th>
								<th>Amount</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Customer Name</th>
								<th>Type</th>
								<th>Items</th>
								<th>Amount</th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>Misty Abbott</td>
								<td>Takeaway</td>
								<td class="is-icon">
									<p>Fried Rice, Orange Juice, Some Soup</p>
								</td>
								<td class="is-icon">
									<p><b>$56.90</b></p>
								</td>
								<td class="is-icon">
									<a href="#" class="button">View</a>
								</td>
							</tr>
							<tr>
								<td>James Franco</td>
								<td>Delivery</td>
								<td class="is-icon">
									<p>Butter Chicken, Naan Bread, Coca Cola</p>
								</td>
								<td class="is-icon">
									<p><b>$74.20</b></p>
								</td>
								<td class="is-icon">
									<a href="#" class="button">View</a>
								</td>
							</tr>
							<tr>
								<td>Charles Xavier</td>
								<td>Takeaway</td>
								<td class="is-icon">
									<p>Charcoal Chicken, Salad, Fries, Pepsi</p>
								</td>
								<td class="is-icon">
									<p><b>$89.50</b></p>
								</td>
								<td class="is-icon">
									<a href="#" class="button">View</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="column is-one-third">
				<div class="box">
					<p class="title">Statistics</p>
					<div class="sidebar-graph">
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
            data: [41, 59],
            backgroundColor: [
                "#00b89c",
                "#DBDBDB",
            ],
            hoverBackgroundColor: [
                "#00b89c",
                "#DBDBDB",
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