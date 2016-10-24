<template>
	<div class="notification" :class="'is-' + type">
		<!-- <button class="delete"></button> -->
		<slot></slot>
	</div>
</template>

<script>
	export default {
		// Component to display any error message
		ready() {
			console.log('Component ready.')
		},

		// Accepts type as a prop to determine notification color
		// * success = green
		// * warning = yellow
		// * danger = red
		props: {
			type: {default: ''}
		}
	}
</script>