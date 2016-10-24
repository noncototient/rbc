<template>
	<div id="customer-search">

		<!-- <notification type="danger">text</notification>
		<notification type="success">text</notification> -->
		<div id="order-details">
			<div class="box">
				<h2 class="title is-5">Order Details</h2>
				<p class="control has-addons has-icon has-icon-left">
					<input class="input is-medium is-expanded" v-model="itemName" type="text" placeholder="Type item name">
					<i class="fa fa-cutlery"></i>
					<button class="button is-primary is-medium" :class="{'is-disabled' : !isEmptyItemField, 'is-loading' : loading}" @click.prevent="searchItems()">
						Search
						<span class="icon">
							<span class="fa fa-search"></span>
						</span>
					</button>
				</p>
			</div>

			<div class="box">
				<h3 class="title is-5">Select Items</h3>
				<ul v-if="items.length">
					<item v-for="(item, index) in items" :item="item" :index="index" v-on:add="add"></item>
				</ul>
				<notification v-else type="warning">No items found.</notification>
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

		// Set initial reactive data properties
		data(){
			return {
				loading: false,
				items: false,
				itemName: '',
				isEmptyItemField: false
			}
		},

		computed: {
			// Corresponds to the isEmptyItemField data property
			isEmptyItemField(){
				return this.itemName;
			}
		},

		methods: {
			// Method to search for an item based on provided name
			searchItems(){
				// Set the button loading state
				this.loading = true;

				// Make an ajax request to the server to retrieve the items
				$.getJSON('/api/searchItems?item=' + this.itemName, (response) => {
					this.loading = false; // Normal button state
					this.items = response; // Items array is set to json returned from the server
				});
			},

			// This is in the codebase in case the process needs to involve more steps than 2
			// next(){
			// 	// Let parent component know the next step
			// 	this.$emit('next', 3);
			// },

			add(item){
				// Let parent component know to add the item to the order object
				this.$emit('add', item);
			}
		}
	}
</script>