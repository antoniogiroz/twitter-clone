export default {
  namespaced: true,

  state: {
    tweets: []
  },

  getters: {
    tweets(state) {
      return state.tweets;
    }
  },

  mutations: {
    pushTweets(state, tweets) {
      state.tweets.push(...tweets);
    }
  },

  actions: {
    async getTweets({commit}) {
      const { data } = await axios.get('/api/timeline');
      commit('pushTweets', data.data);
    }
  }
}
