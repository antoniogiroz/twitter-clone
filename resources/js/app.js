
import Vue from 'vue';
import axios from 'axios';
import { ObserveVisibility } from 'vue-observe-visibility';
import store from './store';

Vue.directive('observe-visibility', ObserveVisibility);

Vue.prototype.$user = User;

// Auto register vue components
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Axios configuration
window.axios = axios;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

const app = new Vue({
    el: '#app',
    store,
});
