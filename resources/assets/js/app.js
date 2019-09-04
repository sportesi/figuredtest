
require('./bootstrap');

window.Vue = require('vue');

Vue.component('card-component', require('./components/CardComponent.vue').default);
Vue.component('post-component', require('./components/PostComponent.vue').default);
Vue.component('alert-component', require('./components/AlertComponent.vue').default);

const app = new Vue({
    el: '#app'
});
