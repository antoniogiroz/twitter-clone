import Vue from "vue";
import axios from "axios";
import Echo from "laravel-echo";
import Pusher from "pusher-js";
import { ObserveVisibility } from "vue-observe-visibility";
import store from "./store";

Vue.directive("observe-visibility", ObserveVisibility);

Vue.prototype.$user = User;

// Auto register vue components
const files = require.context("./", true, /\.vue$/i);
files
  .keys()
  .map((key) =>
    Vue.component(key.split("/").pop().split(".")[0], files(key).default)
  );

// Axios configuration
window.axios = axios;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.withCredentials = true;

// Web sockets configuration
window.Pusher = Pusher;
window.Echo = new Echo({
  broadcaster: "pusher",
  key: "local",
  encrypted: false,
  disableStats: true,
  wsHost: window.location.hostname,
  wsPort: 6001,
});

const app = new Vue({
  el: "#app",
  store,
});

window.Echo.channel("tweets").listen(".TweetLikeUpdated", (tweet) => {
  if (tweet.user_id === User.id) {
    store.dispatch("likes/syncLike", tweet.id);
  }
  store.commit("timeline/updateLikes", tweet);
});
