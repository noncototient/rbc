<template>
	<div>
		{{customer}}
		<notification v-else type="warning">No customer has been selected yet. When they are, their details will appear here.</notification>
	</div>
</template>

<script>
	export default {
		ready() {
			console.log('Component ready.')
		},

		props: ['customer']
	}
</script>