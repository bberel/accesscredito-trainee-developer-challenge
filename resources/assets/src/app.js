require('./bootstrap');

import Vue from 'vue';
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPhoneAlt, faEnvelope, faSearch } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import SweetModal from 'sweet-modal-vue/src/plugin.js';

import App from './App.vue';
import router from '@/router';

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

library.add([faPhoneAlt, faEnvelope, faSearch]);
Vue.use(SweetModal);

Vue.component('font-awesome-icon', FontAwesomeIcon)

const vm = new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
