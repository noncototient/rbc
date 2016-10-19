@extends('layouts.app')

@section('content')
<div id="create-order">	
	<div class="container">
		<div class="columns">
			<div class="column is-two-thirds">
				<div class="box">
					<h1 class="title">Create Order (888) 430-7463</h1> 
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

					More steps to follow 
					--}}
					<customer-search v-if="step == 1" v-on:next="setStep" v-on:save="setCustomer"></customer-search>
					<order-details v-if="step == 2" v-on:back="setStep" v-on:add="addToOrder"></order-details>
				</div>
			</div>
			<div class="column is-one-third">
				<div class="box">
					<h1 class="title">Customer Details</h1>
					<customer :customer="customer"></customer>
				</div>
				<div class="box">
					<h1 class="title">Order Overview</h1>
					<div class="box">
						<order :items="order" v-on:remove="removeFromOrder"></order>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="columns">
			<div class="column">
				<div class="box">
					<pre>@{{ $data }}</pre>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
