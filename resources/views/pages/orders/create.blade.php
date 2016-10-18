@extends('layouts.app')

@section('content')
{{-- 
	Step 1: 
		1. Search for a customer
		2. Populate the customer information (with CC details) form if found or let the user populate it if not
		3. Confirm and continue

	Step 2: 
		1. Search for a product (item)
		2. Add product (item) to the order if found or display an error message if not found
		3. Display the total for the order
		4. Confirm and continue

	More steps to follow ...
--}}
<div id="create-order">	
	<div class="container">
		<div class="tile">
			<div class="tile is-parent">
				<div class="tile is-child box">
					<h1 class="title">Create Order (888) 430-7463</h1>
					<customer-search v-if="step == 1" v-on:next="setStep" v-on:save="setCustomer"></customer-search>
					<order-details v-if="step == 2" v-on:back="setStep" v-on:add="addToOrder"></order-details>
				</div>
			</div>
			<div class="tile is-4 is-vertical is-parent">
				<div class="tile is-child box">
					<p class="title">Two</p>
				</div>
				<div class="tile is-child box">
					<div class="box">
						<h1 class="title">Order Overview</h1> 
						<order :items="order"></order>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="columns">
			<div class="column is-two-thirds is-offset-2">
				<div class="box">
					<pre>@{{ $data }}</pre>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
