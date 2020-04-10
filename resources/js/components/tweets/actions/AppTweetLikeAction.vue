<template>
  <a
    href="#"
    class="flex items-center text-base text-gray-600"
    :class="{ 'text-pink-600': liked }"
    @click.prevent="toggleLike"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      width="24"
      height="24"
      class="w-5 mr-2 fill-current"
    >
      <path
        d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"
      />
    </svg>
    <span>{{ tweet.likes_count }}</span>
  </a>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  props: {
    tweet: {
      type: Object,
      required: true,
    },
  },

  computed: {
    ...mapGetters({
      likes: 'likes/likes'
    }),

    liked() {
      return this.likes.includes(this.tweet.id);
    }
  },

  methods: {
    ...mapActions({
      likeTweet: 'likes/likeTweet',
      unlikeTweet: 'likes/unlikeTweet',
    }),

    toggleLike() {
      this.liked ? this.unlikeTweet(this.tweet) : this.likeTweet(this.tweet);
    }
  }
};
</script>
