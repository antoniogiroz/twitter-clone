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

    updateLikes(state, { id, count }) {
      state.tweets = state.tweets.map((tweet) => {
        if (tweet.id === id) {
          tweet.likes_count = count;
        }

        if (tweet.original_tweet && tweet.original_tweet.id === id) {
          tweet.original_tweet.likes_count = count;
        }
        return tweet;
      });
    },
  },

  actions: {
    async getTweets({ commit }, { page }) {
      const { data } = await axios.get(`/api/timeline?page=${page}`);
      commit("pushTweets", data.data);
      commit("likes/addLikes", data.meta.likes, { root: true });
      return data;
    },
  },
};
