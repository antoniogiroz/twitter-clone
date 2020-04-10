import Vue from "vue";
import Vuex from "vuex";
import timeline from "./timeline";
import likes from "./likes";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    timeline,
    likes,
  },
});
