
require('./bootstrap');

window.Vue = require('vue');

Vue.component('card-component', require('./components/CardComponent.vue').default);
Vue.component('post-component', require('./components/PostComponent.vue').default);
Vue.component('alert-component', require('./components/AlertComponent.vue').default);
Vue.component('register-form-component', require('./components/RegisterFormComponent.vue').default);
Vue.component('login-form-component', require('./components/LoginFormComponent.vue').default);
Vue.component('btn-form-modal', require('./components/modals/BtnFormModalComponent.vue').default);
Vue.component('input-component', require('./components/form_components/InputComponent.vue').default);
Vue.component('txta-component', require('./components/form_components/TextAreaComponent.vue').default);


const app = new Vue({
    el: '#app'
});
