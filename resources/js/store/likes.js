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
};
