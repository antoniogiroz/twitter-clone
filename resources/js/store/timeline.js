export default {
  namespaced: true,

  state: {
    tweets: [],
  },

  getters: {
    tweets(state) {
      return state.tweets.sort((a, b) => b.created_at - a.created_at);
    },
  },

  mutations: {
    pushTweets(state, tweets) {
      const tweetIds = state.tweets.map((tweet) => tweet.id);
      const newTweets = tweets.filter((tweet) => !tweetIds.includes(tweet.id));
      state.tweets.push(...newTweets);
    },
  },

  actions: {
    async getTweets({ commit }, { page }) {
      const { data } = await axios.get(`/api/timeline?page=${page}`);
      commit("pushTweets", data.data);
      commit("likes/pushLikes", data.meta.likes, { root: true });
      return data;
    },
  },
};
