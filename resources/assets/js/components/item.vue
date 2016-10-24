<template>
	<li class="box">
		<div class="columns">
			<!-- <div class="column item"><img src="https://placehold.it/75x75" alt=""></div> -->
			<div class="column has-text-centered item"><p><b>{{item.name}}</b></p></div>
			<div class="column is-one-third item">{{item.description}}</div>
			<div class="column has-text-centered item"><p class="title is-5"><b>${{item.price }}</b></p></div>
			<div class="column has-text-centered item">
				<button 
					id="decrement-btn"
					class="button is-small is-light is-pulled-left" :class="{'is-disabled' : disabled}"
					@click.prevent="decrement()">
						-
				</button>
				<p>{{ quantity }}</p>
				<button 
					id="increment-btn"
					class="button is-light is-small is-pulled-right"
					@click.prevent="increment()">
					+
				</button>
			</div>
			<div class="column has-text-centered item">
				<button 
					class="button is-light is-medium"
					@click.prevent="add()">
					Add
				</button>
			</div>
		</div>
	</li>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		// Accept item object for this component
		props: ['item'],

		data(){
			return {
				// Initial item quantity
				quantity: 1,
				// Initial variable value set to disabled to prevent item quantity being less than 1
				disabled: true
			}
		},

		computed: {
			// Correspond to 'disabled' data variable
			disabled(){
				return this.quantity < 2; // returns a boolean according to this comparison
			}
		},

		methods: {
			// Method to reduce quantity of an item being added to the order
			decrement(){
				if(this.quantity < 2){
					this.disabled = true;
				}
				this.quantity--;
			},

			// Method to increase quantity of an item being added to the order
			increment(){
				if(this.quantity > 0){
					this.disabled = false;
				}
				this.quantity++;
			},

			// Method to add an item to the order object
			add(){
				// Append data to the item
				this.$set(this.item, 'amount', this.quantity);
				
				// Let parent component know about this
				this.$emit('add', this.item);

				// Reset the item quantity back to 1
				this.quantity = 1;
			}

		}
	}
</script>