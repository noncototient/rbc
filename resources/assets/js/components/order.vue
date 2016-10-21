<template>
	<div id="order-details">
		<div v-if="total" >
			<p class="title">
				<i class="fa fa-list-alt" aria-hidden="true"></i> Order Total: <b>${{total}}</b>
				<hr>
			</p>
		</div>
		
		<div v-if="items.length">
			<table class="table is-bordered is-striped is-narrow" >
				<thead>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="item in items">
						<td><b>{{item.item.name}}</b></td>
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
				<input type="radio" name="type" value="takeaway" v-model="type" v-on:change="change()">
				Takeaway
			</label>
			<label class="radio">
				<input type="radio" name="type" value="delivery" v-model="type" v-on:change="change()">
				Delivery
			</label>
		</p>
		<button 
		class="button is-primary is-medium is-fullwidth" :class="{'is-loading': loading}"
		@click="finish()">

		Finish 

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

		data(){
			return {
				type: 'takeaway',
				total: 0,
				loading: false,
			}
		},

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
			},

			change(){
				this.$emit('change', this.type);
			},

			finish(){
				this.loading = true;
				this.$emit('finish', this.total);
			}
		}
	}
</script>