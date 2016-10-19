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

Vue.component('notification', require('./components/notification.vue'));
Vue.component('customer-search', require('./components/customer-search.vue'));
Vue.component('order-details', require('./components/order-details.vue'));
Vue.component('item', require('./components/item.vue'));
Vue.component('order', require('./components/order.vue'));
Vue.component('customer', require('./components/customer.vue'));

const app = new Vue({
    el: '#app',

    data: {
        customer: Object,
        step: 1,
        order: []
    },

    methods: {
        setCustomer(customer){
            this.customer = customer;
        },

        setStep(step){
            this.step = step;
        },

        checkIfExists(item){
            var exists = false, index = 0;
            if(this.order.length){
                for (var member in this.order){
                    if(this.order[member].item == item){
                        exists = true;
                        index = member;
                    }
                }
            }

            return {
                'exists': exists, 
                'index': index
            };
        },

        addToOrder(item){
            var check = this.checkIfExists(item);
            if(check.exists){
                this.order[check.index].item = item;
            } else {
                this.order.push({item: item});
            }
        },

        removeFromOrder(item){
            var check = this.checkIfExists(item.item);
            if(!check.exists){
                alert('Critical error. Reloading page.')
                location.reload(true);
                return;
            }
            this.order.splice(check.index, 1);
        }
    }
});
