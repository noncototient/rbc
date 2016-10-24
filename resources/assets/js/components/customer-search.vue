<template>
	<div id="customer-search">

		<notification v-if="error" type="danger">{{response}}</notification>
		<notification v-if="success" type="success">{{response}}</notification>

		<div class="box">
			<h2 class="title is-5">Search for customer</h2>
			<p class="control has-addons has-icon has-icon-left">
					<input
						class="input is-medium is-expanded" 
						v-model="customerPhone" type="text" 
						placeholder="Type customer phone number">
				<i class="fa fa-mobile"></i>
				<button class="button is-primary is-medium" :class="{'is-disabled' : !isEmptyPhoneSearch, 'is-loading' : loading}" @click.prevent="searchCustomer()">
					Search
					<span class="icon">
						<span class="fa fa-search"></span>
					</span>
				</button>
			</p>
		</div>

		<div class="box" v-if="showCustomerDetails" id="customer-details-form">
			<h2 class="title is-5">Customer Details</h2>
			<label class="label">Customer Name</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="First Name" v-model="customer.first_name">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Last Name" v-model="customer.last_name">
				</p>
			</div>

			<label class="label">Contact Details</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Phone Number"  v-model="customer.phone">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="email" placeholder="Email" v-model="customer.email">
				</p>
			</div>

			<label class="label">Payment Details</label>
			<p class="control">
				<input class="input is-medium" type="text" placeholder="Card Number" v-model="customer.card_number">
			</p>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Expiry Date" v-model="customer.exp_date">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="CVC" v-model="customer.cvc">
				</p>
			</div>

			<label class="label">Address Details</label>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Street" v-model="customer.street">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Suburb" v-model="customer.suburb">
				</p>
			</div>
			<div class="control is-grouped">
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="City" v-model="customer.city">
				</p>
				<p class="control is-expanded">
					<input class="input is-medium" type="text" placeholder="Postal Code" v-model="customer.zip">
				</p>
			</div>
			<button class="button is-primary is-medium is-fullwidth" :class="{'is-disabled' : !isEmptyDetailsForm}" @click="next()">Confirm and Continue <span class="icon"><i class="fa fa-check"></i></span></button>
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
				loading: false,
				customerPhone: '',
				error: false,
				success: false,
				response: '',
				showCustomerDetails: false,
				isEmptyPhoneSearch: true,
				isEmptyDetailsForm: true,
				// Customer details are populated from the form if a customer is found

				customer: {
					first_name: '',
					last_name: '',
					phone: '',
					email: '',
					card_number: '',
					exp_date: '',
					cvc: '',
					street: '',
					suburb: '',
					city: '',
					zip: ''
				}
			}
		},

		computed: {
			// Computed property to prevent form submission if nothing is typed in phone search
			isEmptyPhoneSearch(){
				return this.customerPhone;
			},
			// Computed property to prevent form submission if nothing is typed in customer details form
			isEmptyDetailsForm(){
				// I know, no better/quicker way to perform this check :(
				if(this.customer.first_name && this.customer.last_name && this.customer.email && this.customer.phone && this.customer.email && this.customer.card_number && this.customer.exp_date && this.customer.cvc  && this.customer.street && this.customer.suburb && this.customer.city && this.customer.zip){
					return true;
				} else {
					return false;
				}
			}
		},

		methods: {
			// Method to look up a customer in DB by their phone number
			searchCustomer(){
				// Set the button loading state to true
				this.loading = true; 

				// Make a json request to the server to retrieve a customer
				$.getJSON('/api/searchCustomer?phone=' + this.customerPhone, (response) => {

					// Check if customerPhone field is not empty
					if(this.customerPhone){
						// If no customer found, display the error to the page and clear customer object
						if(response.error){
							this.loading = false;
							this.response = response.error;
							this.success = false;
							this.error = true;
							this.showCustomerDetails = true;
							for (var member in this.customer) this.customer[member] = '';
						}

						// If customer is found, display a success message and assign data to customer object
						if(response.success){
							this.loading = false;
							this.response = response.success;
							this.error = false;
							this.success = true;
							this.showCustomerDetails = true;
							this.customer = response.customer;
						}
					} else {
						// Skip
					}
			});
			},

			save(){
				// Let parent component (app.js) know that save method was called (Vue.js parent-component communication)
 				this.$emit('save', this.customer);
			},

			next(){
				// Call the save method
				this.save();
				// Set current component to order details
				this.$emit('next', 2);
			}
		}
	}
</script>