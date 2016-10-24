import Chart from 'chart.js';
import Alert from 'sweetalert';

require('./bootstrap');

// Register all declared components in /assets/js/components
Vue.component('notification', require('./components/notification.vue'));
Vue.component('customer-search', require('./components/customer-search.vue'));
Vue.component('order-details', require('./components/order-details.vue'));
Vue.component('item', require('./components/item.vue'));
Vue.component('order', require('./components/order.vue'));
Vue.component('customer', require('./components/customer.vue'));

// Create the main app for creating an order
const app = new Vue({
    el: '#app',

    // Initial data variables
    data: {
        customer: Object, 
        step: 1, // Initial order process step
        order: [], // Order array
        total: 0, // Total amount in $ for the order
        type: 'takeaway' // Initial order type 
    },

    methods: {
        // Assign customer details from customer-search comp to customer object
        setCustomer(customer){
            this.customer = customer;
        },

        // Update the current order process step (back or next)
        setStep(step){
            this.step = step;
        },

        // Check if an item already exists in the order array
        checkIfExists(item){
            var exists = false, index = 0;

            // Check if array is not empty
            if(this.order.length){
                // Loop through each item and compare
                for (var member in this.order){
                    if(this.order[member].item == item){
                        exists = true; // if exists, return index where in array it is to update the quantity
                        index = member;
                    }
                }
            }

            return {
                'exists': exists, 
                'index': index
            };
        },

        // Method to add an item to the order
        addToOrder(item){
            var check = this.checkIfExists(item); // Call method to check if item exists
            if(check.exists){
                // Update the item if exists
                this.order[check.index].item = item;
            } else {
                // If does not exist, append item to the order object
                this.order.push({item: item});
            }
        },

        // Method to remove an item from the order
        removeFromOrder(item){
            var check = this.checkIfExists(item.item); // Check if item exists
            if(!check.exists){
                alert('Critical error. Reloading page.')
                location.reload(true);
                return;
            }
            // If item is found, remove it from the object
            this.order.splice(check.index, 1);
        },

        // Update the order type from initial value to chosen value
        changeOrderType(type){
            this.type = type;
        },

        // Set the total amount of the order in $ to total variable
        setTotal(total){
            this.total = total;
        },

        // Process the whole order when 'Finish' button is clicked
        processOrder(total){
            this.setTotal(total);

            // Make a POST ajax request to the server with all the order and customer details
            this.$http.post('/api/processOrder', {data: this.$data}).then((response) => {
                // Display success message with options to view all orders or start again
                swal({
                    title: "Good Job!", 
                    text: "Other has been successfully processed!", 
                    type: "success",
                    showCancelButton: true,
                    cancelButtonText: "View All Orders",
                    confirmButtonText: "Create New Order",
                },
                (isConfirm)=> { 
                    if(isConfirm){ // Create new order button
                        location.reload(true); // Reload page from the server (true <-- reload from server)
                    } else { // View all orders button
                        window.location = '/orders'; // View all orders
                    }
                });
            }, (response) => {
                // In case of an error, display an error popup     
                sweetAlert("Oops...", "This order couldn't be processed due to an error. Please try again later.", "error");  
            });
        }
    }
});
