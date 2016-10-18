<template>
	<div>
		<table class="table is-bordered" v-if="items.length">
			<thead>
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="item in items">
					<td class="has-text-centered"><b>{{item.item.name}}</b></td>
					<td class="has-text-centered">{{item.item.amount}}</td>
					<td class="has-text-centered">${{item.item.price}}</td>
					<td class="has-text-centered"><b>${{item.item.amount * item.item.price}}</b></td>
				</tr>
			</tbody>
		</table>
		<notification v-else type="warning">There is no items in this order yet.</notification>
	</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		props: ['items']
	}
</script>