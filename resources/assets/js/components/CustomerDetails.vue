<template>
    <form id="customerDetails" name="input" action="#" method="get">
        <label class="label">Customer's Details</label>
        <div class="control is-horizonal">
            <div class="control is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.first_name" placeholder="First Name">
                </p>
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.last_name" placeholder="Last Name">
                </p>
            </div>
            <div class="control is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.email" placeholder="Email Address">
                </p>
                <p class="control is-expanded">
                <input class="input" type="text" :value="customer.phone" placeholder="Phone Number">
                </p>
            </div>
        </div>
        <label class="label">Customer's Address</label>
        <div class="control is-horizonal">
            <div class="control is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.street" placeholder="Street">
                </p>
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.suburb" placeholder="Suburb">
                </p>
            </div>
        </div>
        <div class="control is-horizonal">
            <div class="control is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.city" placeholder="City">
                </p>
                <p class="control is-expanded">
                    <input class="input" type="text" :value="customer.zip" placeholder="Post Code">
                </p>
            </div>
        </div>
        <div class="control">
            <button @click.prevent="confirm()" class="button is-primary">
                <span>Confirm and Continue</span>
                <span class="icon">
                    <i class="fa fa-arrow-right"></i>
                </span>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.')
        },

        props: ['customer'],

        data: function(){
            return {
                current: 'customer-details'
            }
        },

        methods: {
            confirm: function(){
                console.log('details confirmed');
                this.current = 'order-details';
                this.$emit('confirm', this.current);
            }
        }
    }
</script>
