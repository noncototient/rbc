@extends('layouts.app')

@section('content')
<div id="create-order">
	<div class="container">
		<div class="columns">
			<div class="column is-two-thirds is-offset-2">
				<div class="box">
					<p class="title">Create a new order</p>

					<form method="POST" action="">
						<label class="label">Customer's Phone Number</label>
						<div class="control is-horizonal">
							<div class="control is-grouped">
								<p class="control is-expanded">
									<input class="input" type="text" v-model="phone" @onchange="clear()" placeholder="045 123 1234">
								</p>
								<p class="control">
									<button @click.prevent="search()" class="button is-primary" :class="{ 'is-loading' : loading }">
										<span>Search</span>
										<span class="icon">
											<i class="fa fa-search"></i>
										</span>
									</button>
								</p>
							</div>
							<transition name="fade" mode="out-in">
								<article v-if="error" class="message is-warning" v-cloak>
									<div class="message-body">
										@{{ error }}
									</div> 
								</article>
								<article v-if="success" class="message is-success" v-cloak>
									<div class="message-body">
										@{{ success }}
									</div> 
								</article>
							</transition>

							<transition name="component-fade" mode="out-in">
							<customer-details :is="current" v-if="searched" v-on:confirm="update" :customer="customer"></customer-details>
							<order-details ></order-details>
							</transition>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
