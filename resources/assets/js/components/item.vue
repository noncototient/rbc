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

		props: ['item'],

		data(){
			return {
				quantity: 1,
				disabled: true
			}
		},

		computed: {
			disabled(){
				return this.quantity < 2;
			}
		},

		methods: {

			decrement(){
				if(this.quantity < 2){
					this.disabled = true;
				}
				this.quantity--;
			},

			increment(){
				if(this.quantity > 0){
					this.disabled = false;
				}
				this.quantity++;
			},

			add(){
				this.$set(this.item, 'amount', this.quantity);
				this.$emit('add', this.item);
				this.quantity = 1;
			}

		}
	}
</script>