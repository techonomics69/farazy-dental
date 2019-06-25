
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
import Paginate from 'vuejs-paginate'
window.axios.defaults.baseURL = document.head.querySelector('meta[name="base-url"]').content;
import vSelect from 'vue-select';
import Datepicker from 'vuejs-datepicker';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('specialist', require('./components/Specialist.vue'));
Vue.component('appointment', require('./components/Appointment.vue'));
Vue.component('create-prescription', require('./components/CreatePrescription.vue'));
Vue.component('appointment-list', require('./components/AppointmentList.vue'));
Vue.component('paginate', Paginate);
Vue.component('v-select', vSelect);
Vue.component('datepicker', Datepicker);

var app = new Vue({
    el: '#app'
});


// var dateInput = document.getElementById("appointment-date");
//
// if(dateInput){
//     console.log(dateInput);
//
//     var ch_id = dateInput.value;
//     if(app.$refs.getAppointmentDates && ch_id){
//         app.$refs.getAppointmentDates.loadItems(ch_id);
//     }
//
//     dateInput.onchange = function () {
//         var ch_id = this.value;
//         if(app.$refs.getAppointmentDates){
//             app.$refs.getAppointmentDates.loadItems(ch_id);
//         }
//     }
// }
