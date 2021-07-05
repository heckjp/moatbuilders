import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

//import axios from do request to backend
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use (VueAxios,axios);

//import Vue Cookies

import VueCookies from 'vue-cookies';

Vue.use(VueCookies);

import VueLodash from 'vue-lodash'
import lodash from 'lodash'
 
// name is optional
Vue.use(VueLodash, {lodash: lodash })

import VueSweetAlert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetAlert2);

import App from '../js/App';




//import routes
import router from '../js/router/index';

const app = new Vue({
    el: '#app',
    components: { App },
    router
});