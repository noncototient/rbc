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
					<button class="button is-primary is-medium" :class="{'is-disabled' : !isEmptyItemField}" @click.prevent="searchItems()">
						Search
						<span class="icon">
							<span class="fa fa-search"></span>
						</span>
					</button>
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
				itemName: '',
				isEmptyItemField: false
			}
		},

		computed: {
			isEmptyItemField(){
				return this.itemName;
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