import Chart from 'chart.js';
import Alert from 'sweetalert';
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
        order: [],
        total: 0,
        type: 'takeaway'
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
        },

        changeOrderType(type){
            this.type = type;
        },

        setTotal(total){
            this.total = total;
        },

        processOrder(total){
            this.setTotal(total);
            console.log(this.$data)
            this.$http.post('/api/processOrder', {data: this.$data}).then((response) => {
                // success
                console.log(response);
                swal({
                    title: "Good Job!", 
                    text: "Other has been successfully processed!", 
                    type: "success",
                    showCancelButton: true,
                    cancelButtonText: "View All Orders",
                    confirmButtonText: "Create New Order",
                },
                (isConfirm)=> {
                    if(isConfirm){
                        location.reload(true); // Reload page from the server (true <-- reload from server)
                    } else {
                        window.location = '/orders';
                    }
                });
                // Display success message with options to view all orders or start again
            }, (response) => {
                // error
                console.log(response)          
                sweetAlert("Oops...", "This order couldn't be processed due to an error. Please try again later.", "error");  
            });
        }
    }
});
