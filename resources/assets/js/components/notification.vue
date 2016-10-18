<template>
	<div class="notification" :class="'is-' + type">
		<!-- <button class="delete"></button> -->
		<slot></slot>
	</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		props: {
			type: {default: ''}
		}
	}
</script>