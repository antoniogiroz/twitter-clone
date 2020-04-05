import Vue from 'vue';
import Vuex from 'vuex';
import timeline from './timeline';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    timeline
  }
});
