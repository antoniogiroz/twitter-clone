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
    addLikes(state, likes) {
      state.likes.push(...likes);
    },

    removeLike(state, tweetId) {
      state.likes = state.likes.filter((id) => id !== tweetId);
    },
  },

  actions: {
    likeTweet(context, tweet) {
      axios.post(`/api/tweets/${tweet.id}/likes`);
    },

    unlikeTweet(context, tweet) {
      axios.delete(`/api/tweets/${tweet.id}/likes`);
    },

    syncLike({ commit, state }, tweetId) {
      if (state.likes.includes(tweetId)) {
        commit("removeLike", tweetId);
        return;
      }

      commit("addLikes", [tweetId]);
    },
  },
};
