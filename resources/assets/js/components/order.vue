<template>
	<div>
		<div v-if="total" >
			<p class="title">
				Order Total: <b>${{total}}</b>
				<hr>
			</p>
		</div>
		
		<div v-if="items.length">
			<table class="table is-bordered" >
				<thead>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="item in items">
						<td class="has-text-centered"><b>{{item.item.name}}</b></td>
						<td class="has-text-centered">{{item.item.amount}}</td>
						<td class="has-text-centered">${{item.item.price}}</td>
						<td class="has-text-centered"><b>${{item.item.amount * item.item.price}}</b></td>
						<td class="has-text-centered">
							<button 
								id="increment-btn"
								class="button is-small"
								@click="remove(item)">
								<i style="font-size: 12px;" class="fa fa-times"></i>
							</button>
					</td>
				</tr>
			</tbody>
		</table>
		<hr>
		<p class="control">
			<label class="radio">
				<input type="radio" name="question">
				Takeaway
			</label>
			<label class="radio">
				<input type="radio" name="question">
				Delivery
			</label>
		</p>
		<button 
		class="button is-primary is-medium is-fullwidth" 
		@click="next()">

		Confirm and Continue 

		<span class="icon">
			<i class="fa fa-check"></i>
		</span>
	</button>
</div>
<notification v-else type="warning">There is no items in this order yet.</notification>
</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		props: ['items'],

		computed: {
			total(){
				var orderTotal = 0, itemTotal = 0;
				for(var i = 0; i < this.items.length; i++){
					itemTotal = this.items[i].item.price * this.items[i].item.amount;
					orderTotal += itemTotal;
				}
				return orderTotal;
			}
		},

		methods: {
			remove(item){
				this.$emit('remove', item)
			}
		}
	}
</script>