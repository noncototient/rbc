<template>
	<div id="customer-search">

		<notification v-if="error" type="danger">{{response}}</notification>
		<notification v-if="success" type="success">{{response}}</notification>

		<div class="box">
			<h2 class="title is-5">Search for customer</h2>
			<p class="control has-addons">
				<input class="input is-medium is-expanded" v-model="customerPhone" type="text" placeholder="Type customer phone number">
				<b class="button is-primary is-medium" @click.prevent="searchCustomer()">
					Search
					<span class="icon">
						<span class="fa fa-search"></span>
					</span>
				</b>
			</p>
		</div>

		<div class="box" v-if="showCustomerDetails" id="customer-details-form">
			<h2 class="title is-5">Customer Details</h2>
			<label class="label">Customer Name</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="First Name" :value="customer.first_name">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Last Name" :value="customer.last_name">
				</p>
			</div>

			<label class="label">Contact Details</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Phone Number"  :value="customer.phone">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="email" placeholder="Email" :value="customer.email">
				</p>
			</div>

			<label class="label">Payment Details</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Card Number" :value="customer.card_number">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Expiry Date" :value="customer.exp_date">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="CVC" :value="customer.cvc">
				</p>
			</div>

			<label class="label">Address Details</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Street" :value="customer.street">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Suburb" :value="customer.suburb">
				</p>
			</div>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="City" :value="customer.city">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Postal Code" :value="customer.zip">
				</p>
			</div>
			<button class="button is-primary is-medium" @click="next()">Confirm and Continue <span class="icon"><i class="fa fa-check"></i></span></button>
		</div>
	</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		data() {
			return {
				customerPhone: '',
				error: false,
				success: false,
				response: '',
				customer: Object, 
				showCustomerDetails: false
			}
		},

		methods: {
			searchCustomer(){
				$.getJSON('/api/searchCustomer?phone=' + this.customerPhone, (response) => {

					if(response.error){
						this.response = response.error;
						this.success = false;
						this.error = true;
						this.showCustomerDetails = true;
						this.customer = Object;
					}

					if(response.success){
						this.response = response.success;
						this.error = false;
						this.success = true;
						this.customer = response.customer;
						this.showCustomerDetails = true;
					}
				});
			},

			save(){
				this.$emit('save', this.customer);
			},

			next(){
				this.save();
				// Set a current component
				this.$emit('next', 2);
			}
		}
	}
</script>