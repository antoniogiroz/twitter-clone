export default {
  namespaced: true,

  state: {
    tweets: []
  },

  getters: {
    tweets(state) {
      return state.tweets.sort((a, b) => b.created_at - a.created_at);
    }
  },

  mutations: {
    pushTweets(state, tweets) {
      state.tweets.push(...tweets);
    }
  },

  actions: {
    async getTweets({ commit }, { page }) {
      const { data } = await axios.get(`/api/timeline?page=${page}`);
      commit('pushTweets', data.data);
      return data;
    }
  }
}
