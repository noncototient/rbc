<template>
	<div id="customer-search">

		<!-- <notification type="danger">text</notification>
		<notification type="success">text</notification> -->

		<div id="order-details">
			<div class="box">
				<h2 class="title is-5">Order Details</h2>
				<p class="control has-addons">
					<input class="input is-medium is-expanded" v-model="itemName" type="text" placeholder="Type item name that you want to add to the order">
					<b class="button is-primary is-medium" @click.prevent="searchItems()">
						Search
						<span class="icon">
							<span class="fa fa-search"></span>
						</span>
					</b>
				</p>
			</div>

			<div class="box">
				<h3 class="title is-5">Select Items</h3>
				<ul v-if="items">
					<item v-for="(item, index) in items" :item="item" :index="index" v-on:add="add"></item>
				</ul>
				<notification v-else type="warning">You have not searched for any items yet. When you do, they will appear here.</notification>
			</div>
		</div>
	</div>

</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		data(){
			return {
				items: false,
				itemName: ''
			}
		},

		methods: {
			searchItems(){
				$.getJSON('/api/searchItems?item=' + this.itemName, (response) => {
					this.items = response;
				});
			},

			next(){
				this.$emit('next', 3);
			},

			add(item){
				this.$emit('add', item);
			}
		}
	}
</script>