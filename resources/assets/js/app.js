import Chart from 'chart.js';
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('customer-details', require('./components/CustomerDetails.vue'));
Vue.component('order-details', require('./components/OrderDetails.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	searched: false,
    	phone: '',
    	error: '',
    	success: '',
    	loading: false,
    	customer: Object,
    	current: 'customer-details'
    },

    methods: {
    	clear: function(){
    		$('#customerDetails').trigger('reset');
    	},

    	search: function(){
    		this.loading = true;
    		this.error = '';
    		this.success = '';
    		this.clear();
    		

    		var self = this;
    		$.getJSON('/api/searchCustomer?q='+this.phone, function(data){
    			self.loading = false;
    			self.searched = true;


    			if(data.error){
    				self.error = data.error;
    			}

    			if(data.customer){
    				self.customer = data.customer;
    				self.success = data.success;
    			}
    			
    		});
    	},

    	update: function(current){
    		this.current = current;
    	}
    }
});
