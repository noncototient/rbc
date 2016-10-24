<template>
	<div id="customer-details">
		<div class="box">
			<div v-if="!customer.length">
				<p class="title">
					<i class="fa fa-user"></i> {{customer.first_name}} {{customer.last_name}}
					<hr>
				</p>

				<h6><b><i class="fa fa-at"></i> Contact Details</b></h6>
				<p>
					<b>Email:</b> {{customer.email}}<br>
					<b>Phone:</b> {{customer.phone}}
				</p><br>

				<h6><b><i class="fa fa-map-marker"></i> Address Details</b></h6>
				<p>
					{{customer.street}}, {{customer.suburb}}, {{customer.city}}, {{customer.zip}}
				</p><br>

				<h6><b><i class="fa fa-credit-card"></i> Payment Details</b></h6>
				<p>
					<b>Card Number: </b>{{customer.card_number}}<br>
					<b>Expiry Date: </b>{{customer.exp_date}}<br>
					<b>CVC: </b>{{customer.cvc}}
				</p>
			</div>
			<notification v-else type="warning">No customer has been selected yet. When they are, their details will appear here.</notification>
		</div>
	</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		// Accept customer object to display their details
		props: ['customer']
	}
</script>