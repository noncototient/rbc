@extends('layouts.app')

@section('content')
<div id="create-order">	
	<div class="container">
		<div class="columns">
			<div class="column is-half">
				<div class="box">
					<h1 class="title">Create Order
						<a href="/orders" class="button is-light is-pulled-right" style="font-weight: 500;">
						Cancel
						<span class="icon">
							<i style="font-size: 12px;" class="fa fa-times"></i>
						</span>
						</a>
					</h1> 
					<customer-search v-if="step == 1" v-on:next="setStep" v-on:save="setCustomer"></customer-search>
					<order-details v-if="step == 2" v-on:add="addToOrder"></order-details>
				</div>
			</div>
			<div class="column is-half">
				<div class="box">
					<h1 class="title">Customer Details</h1>
					<customer :customer="customer"></customer>
				</div>
				<div class="box">
					<h1 class="title">Order Overview</h1>
					<div class="box">
						<order :items="order" v-on:remove="removeFromOrder" v-on:finish="processOrder" v-on:change="changeOrderType"></order>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
