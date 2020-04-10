export default {
  namespaced: true,

  state: {
    likes: [],
  },

  getters: {
    likes(state) {
      return state.likes;
    },
  },

  mutations: {
    pushLikes(state, likes) {
      state.likes.push(...likes);
    },
  },

  actions: {
    likeTweet(context, tweet) {
      axios.post(`/api/tweets/${tweet.id}/likes`);
    },

    unlikeTweet(context, tweet) {
      axios.delete(`/api/tweets/${tweet.id}/likes`);
    },
  },
};
