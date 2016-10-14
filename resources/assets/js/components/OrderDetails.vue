<template>
	<div>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Instrument</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Instrument</th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td>Misty Abbott</td>
					<td>Bass Guitar</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component ready.')
		}
	}
</script>
