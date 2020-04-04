
import Vue from 'vue';
import axios from 'axios';

// Auto register vue components
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Axios configuration
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios = axios;

const app = new Vue({
    el: '#app',
});
